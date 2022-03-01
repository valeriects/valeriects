const BOUTON = document.querySelector(".formSubmit");
const INPUT = document.querySelector(".poke");
const AFFICHER = document.querySelector(".view");


// api de pokedex

const API = `https://pokeapi.co/api/v2/pokemon/`;


// fonciton réutilisable qui fait appel à l'API avec un fetch et qui appelle la fonction displayCard()
function getAPI(name) {

    fetch(`${API}${name}`)

    .then(function(response) {

        return response.json();
    })

    .then(function(data) {


        displayCard(data, name);
         
    })
    .catch(function(err) {
        console.error(err);
    })

};


// fonction pour pouvoir afficher les données de l'API dans du HTML
function displayCard(data, name) {

    const cartePoke = `
    <div class="carte">
        <h2>Id: ${data.id}   ${name} </h2>

        
        <section class="male">
        <h3>Male</h3>
            <article class="row">
                <div class="left">
                    <div class="default">
                        <img class="imgPoke" src="${data.sprites.front_default}" alt="image de ${name}">
                        
                        <img class="imgPoke" src="${data.sprites.back_default}" alt="image de ${name}">
                    </div>
                <h4>Normal</h4>
                </div>
                <div class="right">
                    
                        <div class="default">
                            <img class="imgPoke" src="${data.sprites.front_shiny}" alt="image de ${name}">

                            <img class="imgPoke" src="${data.sprites.back_shiny}" alt="image de ${name}">
                        </div>
                    <h4>Shiny</h4>
                </div>
            </article>
        </section>

        
        <section class="female">
        <h3>Female</h3>
            <article class="row">
                <div class="left">
                   
                        <div class="default">
                            <img class="imgPoke" src="${data.sprites.front_female}" alt="image de ${name}">

                            <img class="imgPoke" src="${data.sprites.back_female}" alt="image de ${name}">
                        </div>
                    <h4>Normal</h4>
                </div>
                <div class="right">
                    
                        <div class="default">
                            <img class="imgPoke" src="${data.sprites.front_shiny_female}" alt="image de ${name}">

                            <img class="imgPoke" src="${data.sprites.back_shiny_female}" alt="image de ${name}">
                        </div>
                    <h4>Shiny</h4>
                </div>
            </article>
        </section>
    
    </div>
    `
    AFFICHER.innerHTML = cartePoke;
};



// lorsqu'il y a une entrée dans l'input et à la soumission du formulaire :
BOUTON.addEventListener("submit", function(event) {
    event.preventDefault();

    if (INPUT.value.length > 0) {

        getAPI(INPUT.value);
        INPUT.value = "";

    } else {

        AFFICHER.innerText = `Aucun résultat n'a été trouvé.`;
        console.warn(err);
    }
});