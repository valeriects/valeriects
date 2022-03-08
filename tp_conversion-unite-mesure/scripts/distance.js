const INPUTDISTANCE = document.querySelector('#mesureLongueur');
const SELECTDISTANCE = document.querySelector('#selectLongueur');
const INPUTDIS2 = document.querySelector('#mesureLongueur2');
const SELECTDIS2 = document.querySelector('#selectLongueur2');


// console.log('hello');
// console.log(INPUTLEFT.value);


function conversion() {

    // console.log('helloBIs');

    let input1 = INPUTDISTANCE.value;
    let select1 = SELECTDISTANCE.value;
    let select2 = SELECTDIS2.value;


    // les valeurs converties:
    let getValue;
    let converValue;


    switch (select1) {
        case "km":
            getValue = input1 * 1000;
            break;
        case "hm":
            getValue = input1 * 100;
            break;
        case "dam":
            getValue = input1 * 10;
            break;
        case "dm":
            getValue = input1 / 10;
            break;
        case "cm":
            getValue = input1 / 100;
            break;
        case "mm":
            getValue = input1 / 1000;
            break;
        case "µm":
            getValue = input1 / 1000000;
            break;
        case "nm":
            getValue = input1 / 1000000000;
            break;
        case "pm":
            getValue = input1 / 1000000000000;
            break;
        default:
            // c'est la valeur du mètre
            getValue = input1; 
    };


    
    switch (select2) {
        case "km":
            converValue = getValue / 1000;
            break;
        case "hm":
            converValue = getValue / 100;
            break;
        case "dam":
            converValue = getValue / 10;
            break;
        case "dm":
            converValue = getValue * 10;
            break;
        case "cm":
            converValue = getValue * 100;
            break;
        case "mm":
            converValue = getValue * 1000;
            break;
        case "µm":
            converValue = getValue * 1000000;
            break;
        case "nm":
            converValue = getValue * 1000000000;
            break;
        case "pm":
            converValue = getValue * 1000000000000;
            break;
        default:
            // c'est la valeur du mètre
            converValue = getValue; 
    };

    // on dit que la valeur du secnd input équivaut à converValue
    INPUTDIS2.value = converValue;
};


// si on entre une donnée dans l'input 1, alors on fait ceci
INPUTDISTANCE.addEventListener("input", conversion);

SELECTDIS2.addEventListener('change', conversion);

SELECTDISTANCE.addEventListener('change', conversion);
// BTN.addEventListener("click", conversion);

