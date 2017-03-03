var addressPattern = /^[\d{1,3}]+\s[a-zA-Z]+\s[a-zA-Z]+$/;
var birthPattern = /^(3[0-1]|2[0-9]|1[0-9]|[0-9])\/(1[0-2]|[0-9])\/(19[0-9]{2}|20[0-1][0-6])+$/;
var cityPattern = /^([a-zA-Z]|[a-zA-Z\sa-zA-Z]|[a-zA-Z\sa-zA-Z\sa-zA-Z])+$/;
var namePattern = /^[a-zA-Z]+$/;
var emailPattern = /^[0-9a-zA-Z._%+-]+@[0-9a-zA-Z._%+-]+\.((biz|com|edu|eu|gov|my|org|net{1})+|(co\.(at|au|cz|de|es|fr|it|il|is|nl|no|nz|se|za){1})+)+$/;
var phonePattern = /^((([0]\d{2})+(\d{8,9}))|([+]\d{2})+(\d{2})+(\d{8,9}))+$/;
var passwordPattern = /^([a-zA-Z]+[\d{1,2}]+[\^\@\#])+$/;
var userPattern = /^([0-9a-zA-Z._%+-]{6,})+$/;
var numericPattern = /^[0-9]+$/;
var alphanumericPattern = /^[0-9a-zA-Z]+$/;

function validateField(fieldID, paragraphID, submitID) {
    var field = document.getElementById(fieldID);
    var paragraph = document.getElementById(paragraphID);
    var submission = document.getElementById(submitID);
    var pattern;
    switch (fieldID) {
        case 'streetAddress':
            pattern = addressPattern;
            paragraph.textContent = "Unfortunately the submitted address appears to be invalid";
            break;
        case 'birthday':
            pattern = birthPattern;
            paragraph.textContent = "Unfortunately the submitted date appears to be invalid";
            break;
        case 'municipality':
            pattern = cityPattern;
            paragraph.textContent = "Unfortunately the submitted city appears to be invalid";
            break;
        case 'email':
            pattern = emailPattern;
            paragraph.textContent = "Unfortunately the submitted email address appears to be invalid";
            break;
        case 'firstName':
            pattern = namePattern;
            paragraph.textContent = "Unfortunately the submitted first name appears to be invalid";
            break;
        case 'lastName':
            pattern = namePattern;
            paragraph.textContent = "Unfortunately the submitted last name appears to be invalid";
            break;
        case 'password':
            pattern = passwordPattern;
            paragraph.textContent = "We would require a password with at least one digit and a special character";
            break;
        case 'phoneNumber':
            pattern = phonePattern;
            paragraph.textContent = "Unfortunately the submitted phone number does not appear to be valid";
            break;
        case 'username':
            pattern = userPattern;
            paragraph.textContent = "We would require a username with a length of at least 6 charaters";
            break;
        case 'model':
            pattern = alphanumericPattern;
            paragraph.textContent = "Unfortunately the submitted model name appears to be invalid";
            break;
        case 'mileage':
            pattern = numericPattern;
            paragraph.textContent = "That field requires only digits";
            break;
        case 'year':
            pattern = numericPattern;
            paragraph.textContent = "That field requires only digits";
            break;
        case 'listing':
            pattern = numericPattern;
            paragraph.textContent = "That field requires only digits";
            break;
        default:
            pattern = namePattern;
            paragraph.textContent = "Please consider to complete all fields properly";
            break;
    }
    if (!pattern.test((field.value))) {
        field.style.color = "rgb(0, 0, 0)";
        field.style.backgroundColor = "rgb(230, 230, 0)";
        paragraph.style.display = "inline-block";
        submission.disabled = true;
    } else {
        field.style.color = "rgb(0, 0, 0)";
        field.style.backgroundColor = "rgb(255, 255, 255)";
        paragraph.style.textContent = "";
        paragraph.style.display = "none";
        submission.disabled = false;
    }
}
