<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');


require __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../../');
$dotenv->load();


class Validator
{
    public static function validateAndSanitize($value, $minLength = null, $maxLength = null, $type = null)
    {
        // utiliser condition ternaire pour vérifier si la valeur est définie et non vide
        $sanitizedValue = isset($value) && !empty($value) ? htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8') : null;

        // si la valeur est vide ou null alors ->message d'erreur
        if ($sanitizedValue === null) {
            throw new InvalidArgumentException("La valeur ne peut pas être vide.");
        }

        // valider en fonction du type
        if ($type !== null) {
            switch ($type) {
                case 'name':
                    self::validateName($sanitizedValue, $minLength, $maxLength);
                    break;
                case 'email':
                    self::validateEmail($sanitizedValue);
                    break;
                case 'phone':
                    self::validatePhone($sanitizedValue);
                    break;
                default:
                    break;
            }
        }
        return $sanitizedValue;
    }

    // valider les names
    private static function validateName($value, $minLength = 3, $maxLength = 50)
    {
        if (strlen($value) < $minLength || strlen($value) > $maxLength) {
            throw new InvalidArgumentException("La longueur du nom doit être entre $minLength et $maxLength caractères.");
        }
    }

    //valider email
    private static function validateEmail($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("L'adresse e-mail n'est pas valide.");
        }
    }
    //valider le phone number
    private static function validatePhone($value)
    {
        // Valider que le numéro de téléphone suit le format souhaité
        if (!preg_match('/^[0-9\+\-\(\)\/\s]*$/', $value)) {
            throw new InvalidArgumentException("Le numéro de téléphone n'est pas valide.");
        }
    }

    // Méthode pour générer des messages d'erreur
    public static function getValidationError($fieldName, $message)
    {
        return [
            'field' => $fieldName,
            'message' => $message,
        ];
    }
}



// Exemple d'utilisation dans le script de traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $lastname = Validator::validateAndSanitize($_POST['lastname'], 2, 50, 'name');
        $firstname = Validator::validateAndSanitize($_POST['firstname'], 2, 50, 'name');
        $email = Validator::validateAndSanitize($_POST['email'], null, null, 'email');
        $phone = Validator::validateAndSanitize($_POST['phone'], null, null, 'phone');
        $msg = Validator::validateAndSanitize($_POST['msg']);

        // Construction du message quand tout est validé
        $message = "Nom: $lastname\n";
        $message .= "Prénomom: $firstname\n";
        $message .= "Email: $email\n";
        $message .= "Téléphone: $phone\n";
        $message .= "Message: $msg\n";

        // Adresse e-mail de réception
        $to = "lili-p@hotmail.com";

        // Sujet de l'e-mail
        $subject = "Nouveau formulaire de contact";

        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'in-v3.mailjet.com'; // Vérifiez si c'est correct pour Mailjet
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAILJET_SMTP_USERNAME'];
        $mail->Password = $_ENV['MAILJET_SMTP_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; // Utilisez le port approprié pour Mailjet
        $mail->SMTPDebug = 2; // Niveau de débogage : 2 pour les messages détaillés, 3 pour les messages SMTP


        // Construction du message PHPMailer
        $mail->setFrom($email, 'Sender Name');
        $mail->addAddress($to, 'Receiver Name');
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Envoi de l'e-mail
        $mail->send();

        // Debug pour voir ce qui se passe
        var_dump($mail);

        // Envoyer une réponse JSON avec succès
        echo json_encode(['success' => true, 'message' => 'Well done bro!']);
        exit;
    } catch (InvalidArgumentException $e) {
        // Gérer les erreurs de validation ici
        $errorMessage = $e->getMessage();
        // Envoyer une réponse JSON avec erreur
        echo json_encode(['error' => true, 'message' => $errorMessage]);
        exit;
    } catch (Exception $e) {
        // Gérer les autres exceptions ici
        $errorMessage = $e->getMessage();
        // Envoyer une réponse JSON avec erreur
        echo json_encode(['error' => true, 'message' => $errorMessage]);
        exit;
    }
}



if (isset($errorMessage)) {
    echo "<p>Erreur: $errorMessage</p>";
}
