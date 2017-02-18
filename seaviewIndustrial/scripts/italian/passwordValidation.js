function validatePassword(password, passwordConfirmation, paragraphID) {

    var passwordField = document.getElementById(password);
    var passwordConfirmationField = document.getElementById(passwordConfirmation);
    var paragraph = document.getElementById(paragraphID);

    var passwordValue = document.getElementById(password).value;
    var passwordConfirmationValue = document.getElementById(passwordConfirmation).value;

    if (!(String(passwordValue) === String(passwordConfirmationValue))) {

        passwordField.style.color = "rgb(0, 0, 0)";
        passwordConfirmationField.style.color = "rgb(0, 0, 0)";

        passwordField.style.backgroundColor = "rgb(230, 230, 0)";
        passwordConfirmationField.style.backgroundColor = "rgb(230, 230, 0)";

        paragraph.textContent = "Quelle password non sembrano essere uguali...";
        paragraph.style.display = "inline-block";

    } else if (String(passwordValue) === String(passwordConfirmationValue)) {

        passwordField.style.color = "rgb(0, 0, 0)";
        passwordConfirmationField.style.color = "rgb(0, 0, 0)";

        passwordField.style.backgroundColor = "rgb(255, 255, 255)";
        passwordConfirmationField.style.backgroundColor = "rgb(255, 255, 255)";

        paragraph.style.textContent = "";
        paragraph.style.display = "none";
    }
}
