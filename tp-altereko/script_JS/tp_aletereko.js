// sélecionne le bouton "nous contacter" du nav accueil
const BUTTONNAVACCUEIL = document.querySelector("#buttonNav");
// sélectionne le bouton "nos engaements" en fin de page
const BUTTONENGAGEMENT = document.querySelector(".btnEng");
// // sélectionne le bouton "nous contacter" de la boutique
// const BUTTONNAVSHOP = document.querySelector("#btnShopNav");

// sélectionne la section id="popup1" de contact
const POPNAVACCUEIL = document.querySelector("#popup1");
// sélectionne la section id="popup2" labels
const POPLABELS = document.querySelector("#popup2");




// au clic sur le bouton "nous contacter" active la fonction toggleHidden (pour faire apparaitre le popup contact)
BUTTONNAVACCUEIL.addEventListener("click", toggleHidden);

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
// quand on clique sur l'icone croix, la section pop-up redevient cachée
ICONCROIX.addEventListener("click", function() {
    POPNAVACCUEIL.classList.toggle('hidden');
});
// quand on sort du survol, on applique la fonction toggle
ICONCROIX.addEventListener("mouseout", toggle);

// fonction toggle qui ajoute ou enleve la class .cache sur les deux icones en fonction du survol et de l'arret du survol.
function toggle() {
    document.querySelector("#croixCreuse").classList.toggle('cache');
    document.querySelector("#croixPleine").classList.toggle('cache');
}



// second popUp :

// au clic, on va appliquer la fonction toggle2Hidden
BUTTONENGAGEMENT.addEventListener("click", toggle2Hidden);
// fonction qui ajoute la class hiddenLabels pour faire apparaitre ou pas le popup engagements
function toggle2Hidden() {
    POPLABELS.classList.toggle('hiddenLabels');
}

// icones nos engagements 
const ICONLABEL = document.querySelector("#croixLabels");

// on crée le html du js pour les icones
const ICONLABELHTML = `
    <i id="labelCroixCreuse" class="far fa-times-circle"></i>
    <i id="labelCroixPleine" class="fas fa-times-circle cache2"></i>
`
    // on l'insère dans la const ICONLABEL qui sélectionne la section id="croixLabels" de la page hmtl
ICONLABEL.innerHTML = ICONLABELHTML;

// on fait addEventListener sur la div id="croixLabels"; au survol, cela active la fonction togglePop2
ICONLABEL.addEventListener("mouseover", togglePop2);
// à la fin du survol, la fonction se réactive pour réinitialiser en gros
ICONLABEL.addEventListener("mouseout", togglePop2);
// lorsqu'on clique sur la croix on ferme la fenetre (ie: la section popup2)
ICONLABEL.addEventListener("click", function() {
    POPLABELS.classList.toggle('hiddenLabels');
});


// on créé la fonction
function togglePop2() {
    // sur l'icone croix déjà visible on la fait devenir invisible lorqu'on survol l'icone et quand on enleve du survol, cela redevient visible
    document.querySelector("#labelCroixCreuse").classList.toggle('cache2');
    // sur l'icone invisible, on la fait apparaitre au survol et disparaitre lorsqu'on arrete le survol.
    document.querySelector("#labelCroixPleine").classList.toggle('cache2');
}