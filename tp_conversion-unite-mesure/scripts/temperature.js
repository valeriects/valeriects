const INPUTTEMP = document.querySelector('#mesureTemp');
const SELECTTEMP = document.querySelector('#selectTemp');
const INPUTTEMP2 = document.querySelector('#mesureTemp2');
const SELECTTEMP2 = document.querySelector('#selectTemp2');


function convertTemp() {
    let input1 = Number(INPUTTEMP.value);
    let select1 = SELECTTEMP.value;
    let select2 = SELECTTEMP2.value;

    let champ1;
    let convertValue;
    let kelvin = 273.15;


    switch (select1) {
        case "Thermostats":
            champ1 = (input1 * 3) * 10;
            break;
        case "°F":
            champ1 = (input1 - 32) / (9/5);
            break;
        case "K":
            champ1 = input1 - kelvin;
            break;
        default:
            champ1 = input1;
    }


    switch (select2) {
        case "Thermostats":
            convertValue = (champ1/10) / 3;
            break;
        case "°F":
            convertValue = champ1 * (9/5) + 32 ;
            break;
        case "K":
            convertValue = champ1 + kelvin;
            break;
        default:
            convertValue = champ1;
    }

    INPUTTEMP2.value = convertValue;
}


INPUTTEMP.addEventListener("input", convertTemp);

SELECTTEMP.addEventListener('change', convertTemp);

SELECTTEMP2.addEventListener('change', convertTemp);