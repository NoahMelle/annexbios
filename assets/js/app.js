const hamburgerButton = document.querySelector(".menu-container");
const navbar = document.querySelector(".navbar");
const locationSelector = document.querySelector("#location-selector");
const viewTicketsButton = document.querySelector("#view-tickets");

if (locationSelector) {
  locationSelector.addEventListener("change", function (e) {
    const location = e.target.value;
    changeLocationHref(location);
  });

  changeLocationHref(locationSelector.value);
}

if (hamburgerButton) {
  hamburgerButton.addEventListener("click", function () {
    navbar.classList.toggle("active");
    navbar.classList.toggle("not-active");
    hamburgerButton.classList.toggle("active");
    hamburgerButton.classList.toggle("not-active");
  });
}

function changeLocationHref(location) {
  viewTicketsButton.setAttribute("href", `${location}`);
}
