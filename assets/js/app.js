const hamburgerButton = document.querySelector(".hamburger-button");
const navbar = document.querySelector(".navbar");
const locationSelector = document.querySelector("#location-selector");
const viewTicketsButton = document.querySelector("#view-tickets");

locationSelector.addEventListener("change", function (e) {
  const location = e.target.value;
  changeLocationHref(location);
});

hamburgerButton.addEventListener("click", function () {
  navbar.classList.toggle("active");
  navbar.classList.toggle("not-active");
});

function changeLocationHref(location) {
  viewTicketsButton.setAttribute("href", `${location}`);
}

changeLocationHref(locationSelector.value);