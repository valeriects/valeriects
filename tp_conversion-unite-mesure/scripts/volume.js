const INPUTVOLUME = document.querySelector('#mesureVolume');
const SELECTVOLUME = document.querySelector('#selectVolume');
const INPUTVOL2 = document.querySelector('#mesureVolume2');
const SELECTVOL2 = document.querySelector('#selectVolume2');


function convertVolume() {
    let input1 = INPUTVOLUME.value;
    let select1 = SELECTVOLUME.value;
    let select2 = SELECTVOL2.value;

    let valeur1;
    let valeurConvertie;

    switch (select1) {
        case "kl":
            valeur1 = input1 * 1000;
            break;
        case "hl":
            valeur1 = input1 * 100;
            break;
        case "dal":
            valeur1 = input1 * 10;
            break;
        case "dl":
            valeur1 = input1 / 10;
            break;
        case "cl":
            valeur1 = input1 / 100;
            break;
        case "ml":
            valeur1 = input1 / 1000;
            break;
        default:
            valeur1 = input1;
        
    }

    switch (select2) {
        case "kl":
            valeurConvertie = valeur1 / 1000;
            break;
        case "hl":
            valeurConvertie = valeur1 / 100;
            break;
        case "dal":
            valeurConvertie = valeur1 / 10;
            break;
        case "dl":
            valeurConvertie = valeur1 * 10;
            break;
        case "cl":
            valeurConvertie = valeur1 * 100;
            break;
        case "ml":
            valeurConvertie = valeur1 * 1000;
            break;
        default:
            valeurConvertie = valeur1;
    }

    INPUTVOL2.value = valeurConvertie;

}


INPUTVOLUME.addEventListener("input", convertVolume);

SELECTVOLUME.addEventListener('change', convertVolume);

SELECTVOL2.addEventListener('change', conversion);