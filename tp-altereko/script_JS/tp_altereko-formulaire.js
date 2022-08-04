// je sélectionne le formulaire
const FORM = document.querySelector("form");
const INPUT = document.querySelector("input");


// je lui passe un évènement qui au clic envois le formulaire
FORM.addEventListener("submit", function(event) {
    // j'enlève la fonction par défaut de l'évent
    event.preventDefault();

    console.log("coucou");

    if (INPUT.value.lenght = "") {
        console.log(INPUT.value);
        alert("Veuillez saisir vos données.")
    } else {

        alert("Vos données ont bien été entrée.")
    }

    // je réinitialise les inputs quand je soumets le formulaire 
    INPUT.value = "";

})