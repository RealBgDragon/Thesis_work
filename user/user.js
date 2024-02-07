// Cache DOM elements
const formElements = {
    password: document.getElementById("password"),
    rePassword: document.getElementById("repassword"),
    passwordError: document.getElementById("passwordError"),
    submit: document.getElementById("submit"),
    requirements: {
        capitalLetter: document.getElementById("capitalLetter"),
        number: document.getElementById("number"),
        letters: document.getElementById("letters"),
    },
    modalBody: document.querySelector(".modal-body"),
};

// Function to check password complexity
function checkPasswordComplexity(password) {
    const rules = [
        { test: /[A-Z]/, element: formElements.requirements.capitalLetter },
        { test: /[0-9]/, element: formElements.requirements.number },
        { test: /.{8,}/, element: formElements.requirements.letters },
    ];

    let passed = true;
    rules.forEach((rule) => {
        if (rule.test.test(password)) {
            rule.element.classList.add("pass");
        } else {
            rule.element.classList.remove("pass");
            passed = false;
        }
    });

    return passed;
}

// Unified input handler
function handleInput() {
    const passwordMatch =
        formElements.password.value === formElements.rePassword.value;
    const complexityPassed = checkPasswordComplexity(
        formElements.password.value
    );

    // Display password mismatch error
    if (!passwordMatch) {
        formElements.passwordError.textContent = "Passwords do not match!";
        formElements.passwordError.style.display = "block";
    } else {
        formElements.passwordError.style.display = "none";
    }

    // Enable or disable the submit button based on conditions
    formElements.submit.disabled = !(passwordMatch && complexityPassed);
}

// Attach event listeners
["input", "focus"].forEach((event) => {
    formElements.password.addEventListener(event, handleInput);
    formElements.rePassword.addEventListener(event, handleInput);
});

// Show and hide modal on focus and blur
formElements.password.addEventListener(
    "focus",
    () => (formElements.modalBody.style.display = "block")
);
formElements.password.addEventListener(
    "blur",
    () => (formElements.modalBody.style.display = "none")
);
