const newUserForm = document.getElementById("new-user-form");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const addUserButton = document.getElementById("add-user-submit");
const permissionCheckboxes = document.querySelectorAll(".permission-checkbox");
const permissionsError = document.getElementById("permissions-error");
const usernameError = document.getElementById("username-error");
const passwordError = document.getElementById("password-error");

let containsErrors = true;

function debounce(func, delay) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), delay);
  };
}

const handlePasswordValidation = (password) => {
  if (!password.length || validatePassword(password)) {
    passwordError.textContent = "";
  } else {
    containsErrors = true;
    passwordError.textContent =
      "Wachtwoord moet minimaal 8 karakters lang zijn en minimaal 1 letter en 1 cijfer bevatten.";
  }
};

const handleUsernameValidation = (username) => {
  if (!username.length || validateUsername(username)) {
    usernameError.textContent = "";
  } else {
    containsErrors = true;
    usernameError.textContent =
      "Gebruikersnaam moet tussen de 3 en 255 karakters lang zijn en mag alleen letters, cijfers en underscores bevatten.";
  }
};

const handlePermissionValidation = () => {
  const isChecked = getCheckboxesChecked().length > 0;
  permissionsError.textContent = isChecked
    ? ""
    : "Selecteer minimaal één permissie.";
};

function checkFullValidation() {
  containsErrors = !(
    validateUsername(usernameInput.value) &&
    validatePassword(passwordInput.value) &&
    getCheckboxesChecked().length > 0
  );
  addUserButton.disabled = containsErrors;
}

const getCheckboxesChecked = () =>
  Array.from(permissionCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.value);

// Add debounced event listeners
passwordInput.addEventListener(
  "input",
  debounce((e) => {
    handlePasswordValidation(e.target.value);
    checkFullValidation();
  }, 300)
);

usernameInput.addEventListener(
  "input",
  debounce((e) => {
    handleUsernameValidation(e.target.value);
    checkFullValidation();
  }, 300)
);

permissionCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", () => {
    handlePermissionValidation();
    checkFullValidation();
  });
});

checkFullValidation();

// Password generation
function generateRandomPassword(element) {
  const randomPassword = generateCustomPassword(32);
  element.parentNode.querySelector('input[name="password"]').value =
    randomPassword;
}

function generateCustomPassword(length) {
  const charSets = [
    [48, 57], // Numbers (0-9)
    [65, 90], // Uppercase letters (A-Z)
    [97, 122], // Lowercase letters (a-z)
    [33, 47], // Special characters (!"#$%&'()*+,-./)
  ];

  let password = "";
  for (let i = 0; i < length; i++) {
    const charSet = charSets[Math.floor(Math.random() * charSets.length)];
    const charCode =
      Math.floor(Math.random() * (charSet[1] - charSet[0] + 1)) + charSet[0];
    password += String.fromCharCode(charCode);
  }
  return password;
}

function validateUsername(username) {
  return /^[a-zA-Z0-9_]{3,255}$/.test(username);
}

function validatePassword(password) {
  return /^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!"#$%&'()*+,-./]{8,}$/.test(
    password
  );
}
