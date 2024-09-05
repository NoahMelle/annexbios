async function loadRecommendedMovies() {
  const dummyDataEndpoint = "./dummy_data/movie-data_dummy.json";

  try {
    const response = await fetch(dummyDataEndpoint);
    if (!response.ok) {
      throw new Error(`Failed to fetch data: ${response.statusText}`);
    }

    const movies = await response.json();
    console.log(movies);

    const recommendedMovies = document.querySelectorAll(".recommended-movie");

    recommendedMovies.forEach((recommendedMovie, index) => {
      if (index < movies.length) {
        const { title, image, release_date, description, rating } = movies[index];
        
        const movieTitle = recommendedMovie.querySelector(".rm-title");
        const movieImageContainer = recommendedMovie.querySelector(".rm-img-container");
        const movieReleaseDate = recommendedMovie.querySelector(".rm-release-date");
        const movieDescription = recommendedMovie.querySelector(".rm-description");
        const filledStars = recommendedMovie.querySelector(".stars.filled");

        // Set movie details
        movieTitle.textContent = title;
        movieReleaseDate.textContent = `Release: ${release_date}`;
        movieDescription.textContent = `${description} ${description} ${description}`;

        // Update the image only if necessary
        if (!movieImageContainer.querySelector(".rm-img")) {
          const movieImageElement = document.createElement("img");
          movieImageElement.src = image;
          movieImageElement.alt = `Poster for ${title}`;
          movieImageElement.classList.add("rm-img");
          movieImageContainer.appendChild(movieImageElement);
        }

        // Update the star rating
        filledStars.style.width = `${rating * 10}%`;

        // Remove skeleton loaders
        recommendedMovie.classList.remove("skeleton");
      } else {
        // Hide extra recommended movie elements
        recommendedMovie.style.display = "none";
      }
    });
  } catch (error) {
    console.error("Error loading recommended movies:", error);
  }
}

// Simulate loading with a delay
setTimeout(loadRecommendedMovies, 2000);
