async function loadRecommendedMovies() {
  const apiEndpoint = "https://annexbios.nickvz.nl/api/v1/movieData";

  try {
    const response = await fetch(apiEndpoint, {
      method: "GET",
      headers: {
        'Authorization': `Bearer ${apiToken}`,
        "Content-Type": "application/json",
      },
    });
    if (!response.ok) {
      throw new Error(`Failed to fetch data: ${response.statusText}`);
    }

    const movies = (await response.json()).data;
    const movieContainer = document.querySelector(".recommended-movies");

    // Loop over the movies and create or update movie elements
    movies.forEach((movie, index) => {
      const { title, image, release_date, description, rating } = movie;

      // Check if the element already exists
      let recommendedMovie = movieContainer.querySelectorAll(`.recommended-movie`)[index];

      // If not, create a new one
      if (!recommendedMovie) {
        const templateElement = movieContainer.querySelector(".recommended-movie.template");
        recommendedMovie = templateElement.cloneNode(true);
        recommendedMovie.classList.remove("template");
        movieContainer.appendChild(recommendedMovie);
        // recommendedMovie = document.querySelector(".recommended-movie.template").cloneNode(true);
      }

      // Update the movie details
      const movieTitle = recommendedMovie.querySelector(".rm-title");
      const movieImageContainer = recommendedMovie.querySelector(".rm-img-container");
      const movieReleaseDate = recommendedMovie.querySelector(".rm-release-date");
      const movieDescription = recommendedMovie.querySelector(".rm-description");
      const filledStars = recommendedMovie.querySelector(".stars.filled");

      movieTitle.textContent = title;
      movieReleaseDate.textContent = `Release: ${release_date}`;
      movieDescription.textContent = `${description} ${description} ${description}`;

      if (movieImageContainer.querySelector(".rm-img")) {
        // Update the existing image if it already exists
        const movieImageElement = movieImageContainer.querySelector(".rm-img");
        movieImageElement.src = image;
        movieImageElement.alt = `Poster for ${title}`;
      } else {
        // Create and append a new image if it doesn't exist
        const movieImageElement = document.createElement("img");
        movieImageElement.src = image;
        movieImageElement.alt = `Poster for ${title}`;
        movieImageElement.classList.add("rm-img");
        movieImageContainer.appendChild(movieImageElement);
      }
      

      filledStars.style.width = `${rating * 10}%`;

      // Remove skeleton loader
      recommendedMovie.classList.remove("skeleton");
    });

    // Hide any extra elements if there are more elements than movies
    const allMovieElements = movieContainer.querySelectorAll(".recommended-movie");
    allMovieElements.forEach((element, index) => {
      if (index >= movies.length) {
        element.style.display = "none";
      }
    });
  } catch (error) {
    console.error("Error loading recommended movies:", error);
  }
}

// Simulate loading with a delay
document.addEventListener("DOMContentLoaded", () => {
  loadRecommendedMovies();
});

function duplicateChildNodes (parent){
  NodeList.prototype.forEach = Array.prototype.forEach;
  var children = parent.childNodes;
  children.forEach(function(item){
    var cln = item.cloneNode(true);
    parent.appendChild(cln);
  });
};