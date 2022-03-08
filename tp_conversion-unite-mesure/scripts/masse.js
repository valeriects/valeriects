const INPUTMASSE = document.querySelector('#mesureMasse');
const SELECTMASSE = document.querySelector('#selectMasse');
const INPUTMAS2 = document.querySelector('#mesureMasse2');
const SELECTMAS2 = document.querySelector('#selectMasse2');


function convertMasse() {
    let input1 = INPUTMASSE.value;
    let select1 = SELECTMASSE.value;
    let select2 = SELECTMAS2.value;

    let champ1;
    let champ2;

    switch (select1) {
        case "kg":
            champ1 = input1 * 1000;
            break;
        case "hg":
            champ1 = input1 * 100;
            break;
        case "dag":
            champ1 = input1 * 10;
            break;
        case "dg":
            champ1 = input1 / 10;
            break;
        case "cg":
            champ1 = input1 / 100;
            break;
        case "mg":
            champ1 = input1 / 1000;
            break;
        default:
            champ1 = input1;
    }


    switch (select2) {
        case "kg":
            champ2 = champ1 / 1000;
            break;
        case "hg":
            champ2 = champ1 / 100;
            break;
        case "dag":
            champ2 = champ1 / 10;
            break;
        case "dg":
            champ2 = champ1 * 10;
            break;
        case "cg":
            champ2 = champ1 * 100;
            break;
        case "mg":
            champ2 = champ1 * 1000;
            break;
        default:
            champ2 = champ1;
    }

    INPUTMAS2.value = champ2;
}


INPUTMASSE.addEventListener('input', convertMasse);

SELECTMAS2.addEventListener('change', convertMasse);

SELECTMASSE.addEventListener('change', convertMasse);