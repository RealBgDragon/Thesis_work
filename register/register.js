// Constants for password match
const password = document.getElementById("password");
const rePassword = document.getElementById("repassword");
const passwordError = document.getElementById("passwordError");
const submit = document.getElementById("submit");
const capitalRequirement = document.getElementById("capitalLetter");
const numberRequirement = document.getElementById("number");
const letters = document.getElementById("letters");
const modalBody = document.querySelector(".modal-body");
// End of constants for password match

function buttonDisable() {
    submit.disabled = true;
}

function buttonEnable() {
    submit.disabled = false;
}

if (password.value === "") {
    buttonDisable();
}

function PasswordCheck() {
    if (/[A-Z]/.test(password.value)) {
        capitalRequirement.style.color = "green";
        buttonEnable();
    } else {
        capitalRequirement.style.color = "red";
        buttonDisable();
    }

    if (/[0-9]/.test(password.value)) {
        numberRequirement.style.color = "green";
        buttonEnable();
    } else {
        numberRequirement.style.color = "red";
        buttonDisable();
    }

    if (password.value.length >= 8) {
        letters.style.color = "green";
        buttonEnable();
    } else {
        letters.style.color = "red";
        buttonDisable();
    }
}

password.addEventListener("focus", handleInput);
password.addEventListener("input", handleInput);
rePassword.addEventListener("focus", handleInput);
rePassword.addEventListener("input", handleInput);

function handleInput() {
    if (password.value === rePassword.value && password.value !== "") {
        passwordError.style.display = "none";
        buttonEnable();
    } else {
        passwordError.textContent = "Passwords do not match!";
        passwordError.style.display;
        passwordError.style.display = "block";
        buttonDisable();
    }
    PasswordCheck();
}

password.addEventListener("focus", showModal);
password.addEventListener("input", showModal);
password.addEventListener("blur", hideModal);
password.addEventListener("mouseout", hideModalOnMouseOut);

function showModal() {
    modalBody.style.display = "block";
    PasswordCheck();
}

function hideModal() {
    if (!isHover(modalBody)) {
        modalBody.style.display = "none";
    }
}

function hideModalOnMouseOut() {
    if (!password.matches(":focus")) {
        modalBody.style.display = "none";
    }
}

function isHover(e) {
    return e.parentElement.querySelector(":hover") === e;
}

submit.addEventListener("click", function (event) {
    console.log("button clicked");
});

// Helper function to add event listeners to multiple events
function addMultipleListeners(element, events, handler) {
    events.forEach((event) => element.addEventListener(event, handler));
}

// Adding event listeners for focus and input
addMultipleListeners(password, ["focus", "input"], showModal);
addMultipleListeners(rePassword, ["focus", "input"], handleInput);

//TODO Email check
