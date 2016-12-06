
function menge_pruefen(idNummer) {
    "use strict";
    var value = document.getElementById(idNummer).value;
    if (isNaN(value) || (value % 1) !== 0 || value == 0 || value > 9999) {
        document.getElementById(idNummer).value = '1';
    } else {
        document.getElementById(idNummer).value = parseInt(value);
    }
}
function operation(zeichen,idNummer) {
    "use strict";
    var menge = document.getElementById(idNummer).value;
    if (zeichen === '+') {
        document.getElementById(idNummer).value = parseInt(menge) + 1;
    } else
    {
        if (menge > 1) {
            document.getElementById(idNummer).value = parseInt(menge) - 1;
        }
    }
}

