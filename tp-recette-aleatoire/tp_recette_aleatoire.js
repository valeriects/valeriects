const recette = Vue.createApp({
    
    data() {
        
        return { 
            div: {
                nomRecette: "",
                categorie: "",
                origineGeo: "",
                preparation: ""
            },
            img: {
                src: "",
                alt: "",
                title: ""
            }
        }
            
    },
    methods: {
            // le bouton est identifié avec "changer"
        changer() {
            // console.log("coucou")

            // on met le fetch dans le bouton car c'est lorsqu'on clic dessus qu'on a besoin de l'API
            fetch(`https://www.themealdb.com/api/json/v1/1/random.php`)
            // on récupère les données
            .then (response =>response.json())
            // puis avec ces données on va :
            .then (response => {
                // faire des console.log pour voir si les données on bien été récupérés et si on peut els atteindre
                console.log(response);
                // console.log(response.meals);
                
                // et un for of, pour pouvoir en disposer comme bon nous semble
                for(item of response.meals) {

                    this.div.nomRecette= item.strMeal,
                    this.div.categorie=item.strCategory,
                    this.div.origineGeo=item.strArea,
                    this.div.preparation=item.strInstructions,                
                    this.img.src=item.strMealThumb,
                    this.img.alt= item.strMeal,
                    this.img.title= item.strMeal
                    // un dernier console.log pour vérifer qu'on peut disposer des données.
                    // console.log(item.strArea)
                }
            })
            .catch(error => console.warn(error))

        }
    }
   
}).mount('#carte')
