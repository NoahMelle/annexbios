const stars = document.querySelector(".stars.filled");
console.log(stars);

if (stars) {
  stars.style.width = stars.dataset.rating + "%";
}
