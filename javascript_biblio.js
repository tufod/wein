
function menge_pruefen(idNummer) {
    "use strict";
    var value = document.getElementById(idNummer).value;
    if (isNaN(value) || (value % 1) !== 0 || value == 0 || value > 9999) {
        document.getElementById(idNummer).value = '1';
    } else {
        document.getElementById(idNummer).value = parseInt(value);
    }
}
function operation(zeichen, idNummer) {
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

function BildAnpassen(Bild) {
    var AngezeigteBreite = 500;
    var GespeicherteBreite = 0;

    if (Bild.width > AngezeigteBreite || GespeicherteBreite > AngezeigteBreite)
    {
        if (Bild.width == AngezeigteBreite)
        {
            Bild.width = GespeicherteBreite;
        }
        else
        {
            GespeicherteBreite = Bild.width;
            Bild.style.cursor = "pointer";
            Bild.width = AngezeigteBreite;
        }
    }
}
function vergleichung() {
    "use strict";
    var pass1 = document.getElementById("password1").value;
    var pass2 = document.getElementById("password2").value;
    if (pass1 !== pass2) {
        document.getElementById("password2").value = '';
        document.getElementById("pass").innerHTML = 'Password nicht gleich';

    }
}