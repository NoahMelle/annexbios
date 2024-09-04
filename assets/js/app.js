const hamburgerButton = document.querySelector(".hamburger-button");
const navbar = document.querySelector(".navbar");

hamburgerButton.addEventListener("click", function () {
  navbar.classList.toggle("active");
  navbar.classList.toggle("not-active");
});