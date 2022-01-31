// on fetch l'url menant au site TMVB
// cle API : 6583016544e750a9c37302ea6bb34712

// on créé la constante API pour sauvegarder la clef API du site
const API= "6583016544e750a9c37302ea6bb34712";
const INSERER= document.querySelector("#insertion");

// lien image  on a pas besoind e laisser le .jpg, pas besoin non plus des chiffre supplémentaire après le w500/ car c'est le code pour chaque image
const IMGFILM= "https://image.tmdb.org/t/p/w500/";

// on fait le fetch lien de antho auquel on aura mi notre propre clé API enl'intégrant dans une constante pour faire plus clair et propre
fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=${API}`) 
// on demande une réponse en json()
.then(response => response.json())
// avec cete réponse, on la console.log pour voir si cela marche, ensuite, on met notre fonction ici "carteFilm(response)" pour dire qu'avec la réponse du fetch on fait notre fonction
.then(response => { 
    console.log(response)
    carteFilm(response)

})
.catch(error => console.error(error))


// je dois créer une fonction dans laquelle on va mettre le html des sections 

function carteFilm(response){
    for (element of response.results) {
        // pour intégrer l'affiche du film, on doit dans le src mettre le lien ici c'est ma constante "IMGFILM" puis on met l'élément du tableau que l'on veut prendre ici "element.poster_path" ***important***
        // avec operateur conditionnel ternaire pour le vote_average
        const CARDHTML = `<section>         
            <img class="imgFilm" src="${IMGFILM}${element.poster_path}" alt="">
            <article>
                <h2>${element.title}</h2>
                
                <div class="koi">
                    <h3>Description :</h3>
                    <p>${element.overview}</p>
                </div>

                <div class="rond ${element.vote_average > 7.5 ? "up" : "down"}">${element.vote_average}</div> 
            </article>
        </section>`
        
        // mettre le += pour avoir la totalité des cartes de l'api qui s'affiche, sinon, nous n'aurions uniquement la dernière
        INSERER.innerHTML += CARDHTML;
    }

    
    console.log(INSERER);

}


