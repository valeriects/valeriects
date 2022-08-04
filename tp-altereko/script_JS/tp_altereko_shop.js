// sélectionne le bouton "nous contacter" de la boutique
const BUTTONNAVSHOP = document.querySelector("#btnShopNav");
// sélectionne popup contact id="popupShop"
const POPSHOP = document.querySelector('#popupShop');
// sélectionne la section id="popup1" de contact
const POPNAVACCUEIL = document.querySelector("#popupShop");

// au clic, la fonction toggleHidden s'applique pour faire apparaitre le popup
BUTTONNAVSHOP.addEventListener("click", toggleHidden);

// fonction toggleHidden qui ajoute la class .hidden a la section id="popup1"
function toggleHidden() {
    POPNAVACCUEIL.classList.toggle('hidden');
}

// pour croix popup contact
// je sélectionne l'élément où je veux qu'on insère le HTML du js
const ICONCROIX = document.querySelector("#croix");
// je crée le html du js
const ICONHTML = `
<i id="croixCreuse" class="far fa-times-circle"></i>
<i id="croixPleine" class="fas fa-times-circle cache"></i>`
// j'insère le html du js dans l'élément #croix
ICONCROIX.innerHTML = ICONHTML;
// au survol, on applique la fonction toggle
ICONCROIX.addEventListener("mouseover", toggle);

ICONCROIX.addEventListener("click", function() {
    POPNAVACCUEIL.classList.toggle('hidden');
});

// quand on sort du survol, on applique la fonction toggle
ICONCROIX.addEventListener("mouseout", toggle);

// fonction toggle qui ajoute ou enleve la class .cache sur les deux icones
function toggle() {
    document.querySelector("#croixCreuse").classList.toggle('cache');
    document.querySelector("#croixPleine").classList.toggle('cache');
}


