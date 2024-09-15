const newUserForm = document.getElementById("new-user-form");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const addUserButton = document.getElementById("add-user-submit");
const permissionCheckboxes = document.querySelectorAll(".permission-checkbox");
const permissionsError = document.getElementById("permissions-error");
const usernameError = document.getElementById("username-error");
const passwordError = document.getElementById("password-error");
const deleteUserForm = document.getElementById("delete-user-form");
const editUsernameInput = document.getElementById("edit-username");
const editPasswordInput = document.getElementById("edit-password");
const editUsernameButton = document.getElementById("edit-username-submit");
const editPasswordButton = document.getElementById("edit-password-submit");
const editPermissionsButton = document.getElementById(
  "edit-permissions-submit"
);

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
  if (passwordInput && usernameInput) {
    containsErrors = !(
      validateUsername(usernameInput.value) &&
      validatePassword(passwordInput.value) &&
      getCheckboxesChecked().length > 0
    );
    addUserButton.disabled = containsErrors;
  } else if (editPasswordInput && editUsernameInput) {
    editUsernameButton.disabled = !validateUsername(editUsernameInput.value);
    editPasswordButton.disabled = !validatePassword(editPasswordInput.value);
    editPermissionsButton.disabled = !getCheckboxesChecked().length > 0;
  }
}

const getCheckboxesChecked = () =>
  Array.from(permissionCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.value);

if (passwordInput && usernameInput) {
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
} else if (editPasswordInput && editUsernameInput) {
  editPasswordInput.addEventListener(
    "input",
    debounce((e) => {
      handlePasswordValidation(e.target.value);
      checkFullValidation();
    }, 300)
  );

  editUsernameInput.addEventListener(
    "input",
    debounce((e) => {
      handleUsernameValidation(e.target.value);
      checkFullValidation();
    }, 300)
  );
}

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
  element.parentNode.querySelector('input[name="password"]')
    ? (element.parentNode.querySelector('input[name="password"]').value =
        randomPassword)
    : (element.parentNode.querySelector('input[name="edit-password"]').value =
        randomPassword);

  handlePasswordValidation(randomPassword);
  checkFullValidation();
}

function generateCustomPassword(length) {
  const numbers = "0123456789";
  const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  const lowercase = "abcdefghijklmnopqrstuvwxyz";
  const special = "!@#$%^&*";

  const allChars = numbers + uppercase + lowercase + special;

  // To ensure better balance, decide how much of each character set to include
  const numSpecialChars = Math.floor(length * 0.2); // 20% special characters
  const numNumbers = Math.floor(length * 0.2); // 20% numbers
  const numLetters = length - numSpecialChars - numNumbers; // Remaining 60% for letters

  let password = "";

  // Helper function to get random character from a string
  function getRandomChar(str) {
    return str[Math.floor(Math.random() * str.length)];
  }

  // Add special characters
  for (let i = 0; i < numSpecialChars; i++) {
    password += getRandomChar(special);
  }

  // Add numbers
  for (let i = 0; i < numNumbers; i++) {
    password += getRandomChar(numbers);
  }

  // Add letters (upper + lower case)
  for (let i = 0; i < numLetters; i++) {
    const isUppercase = Math.random() < 0.5;
    password += getRandomChar(isUppercase ? uppercase : lowercase);
  }

  // Shuffle the password to make it more random
  password = password
    .split("")
    .sort(() => 0.5 - Math.random())
    .join("");

  return password;
}

function validateUsername(username) {
  return /^[a-zA-Z0-9_]{3,255}$/.test(username);
}

function validatePassword(password) {
  return /^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!@#$%^&*]{8,}$/.test(password);
}

function deleteUser(element) {
  deleteUserForm.classList.toggle("active");
  const usernameConfirm = deleteUserForm.querySelector(".username-confirm");
  const id = element.getAttribute("data-id");
  const username = element.getAttribute("data-username");
  usernameConfirm.textContent = username;

  deleteUserForm.querySelector('input[name="delete-user-id"]').value = id;
}

function cancelDelete(element) {
  deleteUserForm.classList.remove("active");
  deleteUserForm.querySelector(".username-confirm").textContent = "";
}

function copyToClipboard(element) {
  const elementToCopy = element.parentNode.querySelector(".entered");
  navigator.clipboard.writeText(elementToCopy.innerText);
  const copyIcon = element.querySelector(".copy-icon");
  const checkIcon = element.querySelector(".check-icon");

  copyIcon.classList.add("hidden");
  checkIcon.classList.remove("hidden");

  const copyTimeout = setTimeout(() => {
    copyIcon.classList.remove("hidden");
    checkIcon.classList.add("hidden");
    clearTimeout(copyTimeout);
  }, 2000);
}
