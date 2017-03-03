function validatePassword(password, passwordConfirmation, paragraphID, submitID) {

    var passwordField = document.getElementById(password);
    var passwordConfirmationField = document.getElementById(passwordConfirmation);
    var paragraph = document.getElementById(paragraphID);
    var submission = document.getElementById(submitID);

    var passwordValue = document.getElementById(password).value;
    var passwordConfirmationValue = document.getElementById(passwordConfirmation).value;

    if (!(String(passwordValue) === String(passwordConfirmationValue))) {

        passwordField.style.color = "rgb(0, 0, 0)";
        passwordConfirmationField.style.color = "rgb(0, 0, 0)";

        passwordField.style.backgroundColor = "rgb(230, 230, 0)";
        passwordConfirmationField.style.backgroundColor = "rgb(230, 230, 0)";

        paragraph.textContent = "Those passwords do not seem to match...";
        paragraph.style.display = "inline-block";
        submission.disabled = true;

    } else if (String(passwordValue) === String(passwordConfirmationValue)) {

        passwordField.style.color = "rgb(0, 0, 0)";
        passwordConfirmationField.style.color = "rgb(0, 0, 0)";

        passwordField.style.backgroundColor = "rgb(255, 255, 255)";
        passwordConfirmationField.style.backgroundColor = "rgb(255, 255, 255)";

        paragraph.style.textContent = "";
        paragraph.style.display = "none";
        submission.disabled = false;
    }
}
