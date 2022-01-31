html,
body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

@font-face {
  font-family: Numans-Regular;
  src: url(./ressourcesimgfond/Numans-Regular.otf);
}
@font-face {
  font-family: segoeprb;
  src: url(/ressourcesimgfond/segoeprb.ttf);
}

@font-face {
  font-family: SF_Arch_Rival_Extended_Italic;
  src: url(/ressourcesimgfond/SF_Arch_Rival_Extended_Italic.ttf);
}

/* pour tout les fichiers */
main {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

:root {
  --ecritureChamp: white;
  --error: red;
  --user: rgb(73, 19, 135);
  --fondInscription: rgb(26, 182, 166);
  --fondConnexion: rgb(16, 81, 150);
  --btnAccueilDeco: rgb(161, 130, 6);
  --btnAccueilDeco1: rgb(179, 72, 131);
  --placeholder: rgb(130, 208, 213);
  --contourlabel: rgb(10, 65, 75);
  --policeLabel: rgb(90, 239, 236);
  --fondSubmit: rgb(20, 160, 111);
  --policeSubmit: white;
  --fondInput: rgba(9, 69, 69, 0.734);
  --couleurContour: rgb(131, 232, 230);
  --couleurContourh4: rgb(7, 49, 49);
  --colorh4: rgba(72, 240, 237, 0.845);
  --colorh3: rgb(5, 43, 22);
  --policeh4: Numans-Regular;
  --policeh3: segoeprb;
  --policeLabelchamp: Numans-Regular;
}

/* les deux formulaires inscription et connection */
#inscription {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  line-height: 2em;
  width: 70vw;
}

/* tout les inputs */
.input {
  width: 30%;
  height: 2.5em;
  height: 4em;
  padding: 1em;
  border-radius: 1em;
  background-color: var(--fondInput);
  color: var(--ecritureChamp);
  outline: none;
}

/* le bouton submit */
.submit {
  width: 15%;
  margin-top: 1em;
  background-color: var(--fondSubmit);
  color: var(--policeSubmit);
  height: 4em;
  cursor: pointer;
  border-radius: 1em;
}

/* placeholder de tout les inputs */
::placeholder {
  color: var(--placeholder);
  font-size: 1.5em;
}

/* les labels de tout dossier */
.label {
  color: var(--policeLabel);
  font-family: var(--policeLabelchamp);
  font-size: 1.5em;
  font-weight: bold;
  margin-bottom: 1em;
  text-shadow: 1px 0 0 var(--contourlabel), 0 1px 0 var(--contourlabel),
    0 -1px 0 var(--contourlabel), -1px 0 0 var(--contourlabel),
    1px 1px 0 var(--contourlabel), 1px -1px 0 var(--contourlabel),
    -1px 1px 0 var(--contourlabel), -1px -1px 0 var(--contourlabel);
}

/* les boutons deconnexion ou accueil */
.index {
  background-color: var(--btnAccueilDeco);
  color: var(--policeSubmit);
  cursor: pointer;
  height: 4em;
  width: 8em;
  margin-top: 2em;
  border-radius: 1em;
}

.deconn {
  background-color: var(--btnAccueilDeco1);
  color: var(--policeSubmit);
  cursor: pointer;
  height: 4em;
  width: 8em;
  margin-top: 2em;
  border-radius: 1em;
}

/* la div ou ya les 2 boutons de la page index */
.boutonIndex {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  height: 25%;
  width: 100%;
  border-radius: 1em;
  cursor: pointer;
}

/* dans index.php le bouton inscription*/
.inscription {
  background-color: var(--fondInscription);
  color: var(--policeSubmit);
  height: 4em;
  width: 10vw;
  margin: 1em;
  cursor: pointer;
  border-radius: 1em;
}

/* dans index.php le bouton connexion */
.connecte {
  background-color: var(--fondConnexion);
  color: var(--policeSubmit);
  height: 4em;
  margin: 1em;
  cursor: pointer;
  width: 10vw;
  border-radius: 1em;
}

/* message erreurs */
.red {
  color: var(--error);
  font-size: 2em;
}

.bord {
  border: 10px double rgba(99, 12, 89, 0.534);
  border-radius: 1em;
  background-color: rgba(191, 191, 191, 0.46);
}

.cadre {
  border: 5px double var(--user);
  border-radius: 1em;
  width: 30vw;
  padding: 1em;
}
/* affichage dans page login.php */
.user {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  line-height: 1.5em;
  font-size: 1.5em;
  font-weight: bold;
  color: var(--user);
  margin: 2em;
}
.bon {
  font-size: 2em;
}
/* le bienvenue etc dans page index.php */
.titre {
  width: 100%;
  height: 100%;
  font-size: 2em;
  text-align: center;
}

/* les titres dans pages index.php */
h2 {
  font-family: var(--policeh3);
  font-size: 3.5em;
  color: var(--colorh3);
  text-decoration-style: solid;
  text-shadow: 1.5px 0 0 var(--couleurContour), 0 1.5px 0 var(--couleurContour),
    0 -1.5px 0 var(--couleurContour), -1.5px 0 0 var(--couleurContour),
    1.5px 1.5px 0 var(--couleurContour), 1.5px -1.5px 0 var(--couleurContour),
    -1.5px 1.5px 0 var(--couleurContour), -1.5px -1.5px 0 var(--couleurContour);
  /* text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
 */
}

/* titres dans page index.php */
h4 {
  font-family: var(--policeh4);
  text-shadow: 1px 0 0 var(--couleurContourh4), 0 1px 0 var(--couleurContourh4),
    0 -1px 0 var(--couleurContourh4), -1px 0 0 var(--couleurContourh4),
    0.5px 1px 0 var(--couleurContourh4), 1px -1px 0 var(--couleurContourh4),
    -1px 1px 0 var(--couleurContourh4), -1px -1px 0 var(--couleurContourh4);
  color: var(--colorh4);
  margin-bottom: 0;
  font-size: 1.2em;
}

/* le main de la page index.php */
#img {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

/* fond page login.php */
#log {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background-image: url(/php-test1/php_commencement_septembre/PDO/exo_inscription/ressourcesimgfond/IMG_3108.JPG);
  background-size: cover;
}

/* fond image de page index, inscription et connexion */
#img,
#imginscription,
#imgconnect {
  background-image: url(/php-test1/php_commencement_septembre/PDO/exo_inscription/ressourcesimgfond/feuille1.png),
    url(/php-test1/php_commencement_septembre/PDO/exo_inscription/ressourcesimgfond/fwa_nordic1280x960.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
