//HAMBURGER MENU
//fonction pour display le menu déroulant
function toggleMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';
}

//fonction pour fermer le menu quand on clique ailleurs
function closeMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = 'none';
}





// TITRES
// ajout d'une class pour ajouter les titres après un certain temps
document.addEventListener('DOMContentLoaded', function () {
    // Ajoutez la classe "show" après un certain délai (par exemple, 500 millisecondes)
    setTimeout(function () {
        document.querySelector('h1').classList.add('show');
        document.querySelectorAll('h2').forEach(function (element) {
            element.classList.add('show');
        });
        document.querySelectorAll('h3').forEach(function (element) {
            element.classList.add('show');
        });   
    }, 500);
});



//Formulaire
//gérer les erreurs coté client

document.getElementById('myForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch('./assets/php/validate-sanitize.php', {
            method: 'POST',
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`Server responded with status: ${response.status}`);
        }

        const result = await response.json();
        handleResponse(result);
    } catch (error) {
        console.error('Error during fetch:', error);
    }
});

function handleResponse(result) {
    if (result && result.success) {
        alert("Bien joué ! Ta demande a bien été envoyée. Je donnerai des nouvelles au plus vite !");
    } else if (result && result.error) {
        const errorContainer = document.getElementById('errorContainer');
        errorContainer.innerHTML = `<p>${result.message}</p>`;
    } else {
        console.error('Réponse inattendue :', result);
    }
}











