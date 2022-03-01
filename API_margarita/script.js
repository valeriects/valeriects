const API = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";


const AFFICHE = document.querySelector('#affichage');
const BTN = document.querySelector('#btn');


BTN.addEventListener("click", () => {


    fetch(`${API}`)
        .then(response => {
            return response.json();
        })
        .then(data => {

            for (item of data.drinks) {
                console.log(item);
                card();
            }
        })
        .catch(err => {
            console.error(err);
        });

    AFFICHE.innerHTML = "";

});



function card() {
    let card = `<div class="card"> 
                <p class="name">${item.strDrink} </p>

                <img  class="imgCocktail" src="${item.strDrinkThumb}" alt="image du cocktail ${item.strDrink}">

                <ul class="ingredient"><p>Ingrédients : </p>
                    <li class="liste">${item.strIngredient1} en proportion : ${item.strMeasure1}</li>
                    <li class="liste">${item.strIngredient2} en proportion : ${item.strMeasure2}</li>
                    <li class="liste">${item.strIngredient3} en proportion : ${item.strMeasure3}</li>
                    <li class="liste">${item.strIngredient4} en proportion : ${item.strMeasure4}</li>
                    <li class="liste">${item.strIngredient5} en proportion : ${item.strMeasure5}</li>
                    <li class="liste">${item.strIngredient6} en proportion : ${item.strMeasure6}</li>
                    <li class="liste">${item.strIngredient7} en proportion : ${item.strMeasure7}</li>
                  
                </ul>

                <p class="preparation">Préparation : ${item.strInstructions}</p>

                </div>`

    AFFICHE.innerHTML += card;
}