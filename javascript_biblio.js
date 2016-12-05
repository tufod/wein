
function menge_pruefen() {
    "use strict";
    var value = document.getElementById("menge").value;
    if (isNaN(value) || (value % 1) !== 0 || value == 0 || value > 9999) {
        document.getElementById("menge").value = '1';
    } else {
        document.getElementById("menge").value = parseInt(value);
    }
}
function operation(zeichen,id) {
    "use strict";
    var menge = document.getElementById(id).value;
    if (zeichen === '+') {
        document.getElementById(id).value = parseInt(menge) + 1;
    } else
    {
        if (menge > 1) {
            document.getElementById("menge").value = parseInt(menge) - 1;
        }
    }
}

