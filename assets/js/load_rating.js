const stars = document.querySelectorAll(".stars.filled");

stars.forEach((stars) => {
  if (stars) {
    stars.style.width = stars.dataset.rating + "%";
  }
});
