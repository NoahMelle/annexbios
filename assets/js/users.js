const newUserForm = document.getElementById("new-user-form");

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
