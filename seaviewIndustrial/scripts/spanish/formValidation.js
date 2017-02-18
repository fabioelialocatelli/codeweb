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
            paragraph.textContent = "La direccion sometida no parece ser valida";
            break;
        case 'birthday':
            pattern = birthPattern;
            paragraph.textContent = "La fecha de nacimiento sometida no parece ser valida";
            break;
        case 'municipality':
            pattern = cityPattern;
            paragraph.textContent = "La poblacion sometida no parece ser valida";
            break;
        case 'email':
            pattern = emailPattern;
            paragraph.textContent = "El correo electronico sometido no parece ser valido";
            break;
        case 'firstName':
            pattern = namePattern;
            paragraph.textContent = "El nombre sometido no parece ser valido";
            break;
        case 'lastName':
            pattern = namePattern;
            paragraph.textContent = "El apellido sometido no parece ser valido";
            break;
        case 'password':
            pattern = passwordPattern;
            paragraph.textContent = "Necesitamos una contraseña que tenga almenos una caracter numerico y uno especial";
            break;
        case 'username':
            pattern = userPattern;
            paragraph.textContent = "Necesitamos un nombre de usuario que tenga un tamaño de almenos 6 caracteres";
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
