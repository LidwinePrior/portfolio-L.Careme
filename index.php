<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lidwine Carême</title>
    <meta name="author" content="Lidwine">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/scss/style.css">

</head>

<body>

    <header id="Home">
        <div class="top">
            <div class="logo" id="logo">
                <img src="./assets/images//logo-brume.png" class="mylogo-header" alt="my logo">
            </div>
            <div class="navigation">
                <div class="hamburger-menu" onclick="toggleMobileMenu(event)">
                    <img class="hamburger" src="./assets/images/hamburger-menu.svg" alt="hamburger-menu">
                </div>


                <!-- La navigation mobile en dehors de la div .hamburger-menu -->
                <div class="mobile-nav">
                    <a href="#Home" onclick="closeMobileMenu()">Accueil</a>
                    <a href="#Portfolio" onclick="closeMobileMenu()">Portfolio</a>
                    <a href="#About" onclick="closeMobileMenu()">A propos</a>
                    <a href="#Contact" onclick="closeMobileMenu()">Contact</a>
                </div>


                <nav class="desktop-nav">
                    <a href="#Home">Accueil</a>
                    <a href="#Portfolio">Portfolio</a>
                    <a href="#About">A propos</a>
                    <a href="#Contact">Contact</a>
                </nav>
            </div>
        </div>

        <div class="presentation">
            <h1 class="my-name">Lidwine Carême</h1>
            <h2 class="junior">Junior Developer</h2>
            <h2 class="back">Back-end</h2>
            <div class="button">
                <button class="show-more"><a href="#About">En savoir plus</a></button>
            </div>
        </div>

        <img class="ordi" src="./assets/images/ordi.jpg" alt="ordinateur">


    </header>




    <main>
        <section class="portfolio" id="Portfolio">

            <h3>Portfolio</h3>


            <div class="projects">
                <div class="proj">
                    <a href="https://lidwineprior.github.io/weather-app/" target="_blank"><img src="./assets/images/meteo.jpg" alt="weather" class="weather"></a>
                    <div class="text-overlay">
                        <h4>Weather app</h4>
                        <p>Application météo liée à une API.</p>
                        <p>Languages: HTML, SASS, Javascript.</p>
                    </div>
                </div>
                <div class="proj">
                    <a href="https://elibbth.github.io/Kabibi-Food/" target="_blank"><img src="./assets/images/food.jpg" alt="food" class="food"></a>
                    <div class="text-overlay">
                        <h4>Kabibi-Food</h4>
                        <p>Création d'une interface à partir d'un template imposé.</p>
                        <p>Languages: HTML, SASS.</p>
                    </div>
                </div>
                <div class="proj">
                    <a href="https://github.com/LidwinePrior/Pokedex" target="_blank"><img src="./assets/images/pikachu.jpg" alt="pokemon" class="pokemon"></a>
                    <div class="text-overlay">
                        <h4>Pokedex</h4>
                        <p>Création d'un pokédex repertoriant les pokémons, leurs pouvoirs, ... avce la possibilité de
                            se connecter/créer son compte pour en mettre en favoris </p>
                        <p>Concepts: Sanitisation, validation, session, favoris</p>
                        <p>Languages Back-end: PHP, MySQL.</p>
                    </div>
                </div>
                <div class="proj">
                    <a href="https://github.com/LidwinePrior/back-end_cogip?tab=readme-ov-file" target="_blank"><img src="./assets/images/database.jpg" alt="database" class="database"></a>
                    <div class="text-overlay">
                        <h4>Cogip</h4>
                        <p>Création d'un API avec tous les paths pour les front-ends afin de créer une interface qui
                            affiche les entreprises, leurs factures ainsi que leurs contacts</p>
                        <p>Languages Back-end: PHP, MySQL.</p>
                        <p>Concepts: API, MVC, CRUD, Router, namespace, sanitisation, validation.</p>
                        <p>Outils: db4free, heroku.</p>
                    </div>
                </div>
            </div>
        </section>




        <section class="about" id="About">

            <h3>A propos</h3>

            <div class="description">
                <img src="./assets/images/moi.jpg" alt="lidwine" class="picture-of-me">

                <p class="text-about">
                    Avide de connaissances et de nouveaux défis, je me suis aventurée dans le développement web et
                    plus
                    précisément en back-end. Quelle aventure!</p>
                <p class="text-about">Empathique, sociable et généreuse, qualités qui m'aident à m'intégrer dans un
                    groupe et à
                    comprendre mon
                    environnement.
                    Organisée et "légèrement" perfectionniste, j'aime le travail bien fait. Je peux même parfois être
                    drôle! </p>
                <p class="text-about">
                    Pour le moment, j’apprends le développement web chez <a href="https://becode.org/fr/les-formations/junior-developer/" target="_blank">BeCode</a>.
                    Vous trouverez mes travaux réalisés lors de cette formation sur <a href="https://github.com/LidwinePrior" target="_blank">Github</a>. Si vous voulez en savoir
                    plus
                    sur moi, vous pouvez consulter mon <a href="https://www.linkedin.com/in/lidwine-careme/" target="_blank">linkedIn</a> et pour des infos sur mon parcours, c’est par <a href="./assets/images/CV Lidwine Carême.pdf" target="_blank">ICI</a>.
                </p>


            </div>
        </section>




        <section class="contact" id="Contact">

            <h3>Contact</h3>

            <form class="form" id="myForm" method="post">
                <div class="nom">
                    <input type="text" id="lastname" name="lastname" placeholder="Nom" required>
                </div>
                <div class="prenom">
                    <input type="text" id="firstname" name="firstname" placeholder="Prénom" required>
                </div>
                <div class="mail">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="gsm">
                    <input type="tel" id="phone" name="phone" placeholder="Téléphone" required>
                </div>
                <div class="message">
                    <textarea id="msg" name="msg" placeholder="Message" required></textarea>
                </div>
                <div class="bouton">
                    <button class="send" id="submit" type="submit">Envoyer</button>
                </div>
                <!-- Espace pour afficher les erreurs côté client -->
                <div id="errorContainer"></div>
            </form>
        </section>
    </main>




    <footer>
        <div class="logo">
            <img src="./assets/images/logo-brume.png" class="mylogo-footer" alt="my logo">
        </div>
        <div class="reseaux">
            <div class="div-github">
                <a href="https://github.com/LidwinePrior" target="_blank"><img src="./assets/images/github.svg" alt="github"></a>
            </div>
            <div class="div-linkedIn">
                <a href="https://www.linkedin.com/in/lidwine-careme/" target="_blank"><img src="./assets/images/linkedin-in.svg" alt="linkedIn"></a>
            </div>
        </div>
        <div class="arrow">
            <a href="#Home"><img src="assets/images/arrow-up-solid.svg" alt="arrow-up"></a>
        </div>
    </footer>

    <script src="./assets/js/script.js"></script>

</body>

</html>