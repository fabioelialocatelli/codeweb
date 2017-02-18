var addressPattern = /^[\d{1,3}]+\s[a-zA-Z]+\s[a-zA-Z]+$/;
var birthPattern = /^(3[0-1]|2[0-9]|1[0-9]|[0-9])\/(1[0-2]|[0-9])\/(19[0-9]{2}|20[0-1][0-6])+$/;
var cityPattern = /^([a-zA-Z]|[a-zA-Z\sa-zA-Z]|[a-zA-Z\sa-zA-Z\sa-zA-Z])+$/;
var namePattern = /^[a-zA-Z]+$/;
var emailPattern = /^[0-9a-zA-Z._%+-]+@[0-9a-zA-Z._%+-]+\.((biz|com|edu|eu|gov|my|org|net{1})+|(co\.(at|au|cz|de|es|fr|it|il|is|nl|no|nz|se|za){1})+)+$/;
var passwordPattern = /^([a-zA-Z]+[\d{1,2}]+[\^\@\#])+$/;
var userPattern = /^([0-9a-zA-Z._%+-]{6,})+$/;

function validateField(fieldID, paragraphID) {
    var field = document.getElementById(fieldID);
    var paragraph = document.getElementById(paragraphID);
    var pattern;
    switch (fieldID) {
        case 'streetAddress':
            pattern = addressPattern;
            paragraph.textContent = "L'indirizzo immesso non sembra essere valido";
            break;
        case 'birthday':
            pattern = birthPattern;
            paragraph.textContent = "La data di nascita immessa non sembra essere valida";
            break;
        case 'municipality':
            pattern = cityPattern;
            paragraph.textContent = "Il comune immesso non sembra essere valido";
            break;
        case 'email':
            pattern = emailPattern;
            paragraph.textContent = "L'indirizzo e-mail immesso non sempbra essere valido";
            break;
        case 'firstName':
            pattern = namePattern;
            paragraph.textContent = "Il nome immesso non sembra essere valido";
            break;
        case 'lastName':
            pattern = namePattern;
            paragraph.textContent = "Il cognome immesso non sembra essere valido";
            break;
        case 'password':
            pattern = passwordPattern;
            paragraph.textContent = "Richiediamo una password con almeno un carattere numerico ed uno speciale";
            break;
        case 'username':
            pattern = userPattern;
            paragraph.textContent = "Richiediamo un nome utente di lunghezza di almeno 6 caratteri";
            break;
        default:
            break;
    }
    if (!pattern.test((field.value))) {
        field.style.color = "rgb(0, 0, 0)";
        field.style.backgroundColor = "rgb(230, 230, 0)";
        paragraph.style.display = "inline-block";
    } else {
        field.style.color = "rgb(0, 0, 0)";
        field.style.backgroundColor = "rgb(255, 255, 255)";
        paragraph.style.textContent = "";
        paragraph.style.display = "none";
    }
}
