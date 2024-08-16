function CheckForMinus() {
    if(document.getElementById('income').value.split('')[0] == "-") {
        document.getElementById('checkbox1').checked = false;
        document.getElementById('checkbox1').value = 0;
    }
    else {
        document.getElementById('checkbox1').checked = true;
        document.getElementById('checkbox1').value = 1;
    }
}

