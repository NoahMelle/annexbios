async function loadRecommendedMovies() {
  const dummyDataEndpoint = "./dummy_data/movie-data_dummy.json";
  const response = await fetch(dummyDataEndpoint);
  const movies = await response.json();
  console.log(movies);
  const recommendedMovies = document.querySelectorAll(".recommended-movie");

  movies.forEach((movie, index) => {
    const recommendedMovie = recommendedMovies[index];
    const movieTitle = recommendedMovie.querySelector(".rm-title");
    const movieRating = recommendedMovie.querySelector(".rm-rating");
    const movieImageContainer =
      recommendedMovie.querySelector(".rm-img-container");

    const movieImageElement = document.createElement("img");
    movieImageElement.src = movie.image;
    movieImageElement.alt = `Poster for ${movie.title}`;
    movieImageElement.classList.add("rm-img");
    movieImageContainer.appendChild(movieImageElement);

    movieTitle.textContent = movie.title;

    const filledStars = recommendedMovie.querySelector(".stars.filled");
    filledStars.style.width = `${movie.rating * 10}%`;

    const skeletonLoaders = recommendedMovie.querySelectorAll(".skeleton");
    skeletonLoaders.forEach((skeletonLoader) => {
      skeletonLoader.classList.remove("skeleton");
    });
  });

  for (let i = movies.length; i < recommendedMovies.length; i++) {
    const recommendedMovie = recommendedMovies[i];
    recommendedMovie.style.display = "none";
  }
}

loadRecommendedMovies();