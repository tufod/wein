
function menge_pruefen() {
    "use strict";
    var value = document.getElementById("menge").value;
    if (isNaN(value) || (value % 1) !== 0 || value == 0 || value > 9999) {
        document.getElementById("menge").value = '1';
    } else {
        document.getElementById("menge").value = parseInt(value);
    }
}
function operation(zeichen) {
    "use strict";
    var menge = document.getElementById("menge").value;
    if (zeichen === '+') {
        document.getElementById("menge").value = parseInt(menge) + 1;
    } else
    {
        if (menge > 1) {
            document.getElementById("menge").value = parseInt(menge) - 1;
        }
    }
}

