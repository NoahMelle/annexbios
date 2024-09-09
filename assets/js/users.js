const newUserForm = document.getElementById("new-user-form");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const addUserButton = document.getElementById("add-user-submit");
const permissionCheckboxes = document.querySelectorAll(".permission-checkbox");
const permissionsError = document.getElementById("permissions-error");
let containsErrors = true;

const onPasswordChange = (event) => {
  const password = event.target.value;
  const passwordError = document.getElementById("password-error");
  if (validatePassword(password)) {
    // if password valid
    passwordError.textContent = "";
    checkFullValidation();
  }
  else if (password.length === 0) {
    // if password is empty, still not valid
    containsErrors = true;
    passwordError.textContent = "";
  } else {
    // if password invalid
    containsErrors = true;
    passwordError.textContent =
      "Wachtwoord moet minimaal 8 karakters lang zijn en minimaal 1 letter en 1 cijfer bevatten.";
  }
}

const onCheckboxChange = (event) => {
  const checkboxesChecked = Array.from(permissionCheckboxes).some(
    (checkbox) => checkbox.checked
  );
  if (checkboxesChecked) {
    permissionsError.textContent = "";
    checkFullValidation();
  } else {
    permissionsError.textContent = "Selecteer minimaal één permissie.";
    containsErrors = true;
  }
}

const onUsernameChange = (event) => {
  const username = event.target.value;
  const usernameError = document.getElementById("username-error");
  if (validateUsername(username)) {
    // if username valid
    usernameError.textContent = "";
    checkFullValidation();
  } else if (username.length === 0) {
    // if username is empty, still not valid
    containsErrors = true;
    usernameError.textContent = "";
  } else {
    // if username invalid
    containsErrors = true;
    usernameError.textContent =
    "Gebruikersnaam moet tussen de 3 en 255 karakters lang zijn en mag alleen letters, cijfers en underscores bevatten.";
  }
};

function checkFullValidation() {
  if (validateUsername(usernameInput.value) && validatePassword(passwordInput.value)) {
    containsErrors = false;
  } else {
    containsErrors = true;
  }
  addUserButton.disabled = containsErrors
  console.log(containsErrors);
}

passwordInput.addEventListener("input", onPasswordChange);
usernameInput.addEventListener("input", onUsernameChange);
permissionCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", onCheckboxChange);
});
checkFullValidation();

function generateRandomPassword(element) {
  const randomPassword = generateCustomPassword(32);
  element.parentNode.querySelector('input[name="password"]').value =
    randomPassword;
}

function generateCustomPassword(length) {
  const getRandomChar = () => {
    const charSets = [
      [48, 57], // Numbers (0-9)
      [65, 90], // Uppercase letters (A-Z)
      [97, 122], // Lowercase letters (a-z)
      [33, 47], // Special characters (!"#$%&'()*+,-./)
      // [91, 96],  // Special characters ([\]^_`)
    ];

    // Select a random character set
    const charSet = charSets[Math.floor(Math.random() * charSets.length)];
    // Generate a random character code from the selected set
    const charCode =
      Math.floor(Math.random() * (charSet[1] - charSet[0] + 1)) + charSet[0];
    // Convert the character code to a character
    return String.fromCharCode(charCode);
  };

  let password = "";
  for (let i = 0; i < length; i++) {
    password += getRandomChar();
  }

  return password;
}

function validateUsername(username) {
  return /^[a-zA-Z0-9_]{3,255}$/.test(username);
}

function validatePassword(password) {
  return /^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!"#$%&'()*+,-./]{8,}$/.test(password);
}