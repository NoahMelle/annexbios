async function loadPlayingMovies() {
  const playingMoviedataEndpoint = "http://localhost/school/jaar2/periode1/annexBios/api/v1/playingMovies";
  const apiToken = "1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t";

  fetch(playingMoviedataEndpoint, {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${apiToken}`,
        'Content-Type': 'application/json'
      }
    })
    .then(response => {
      if (response.ok) {
        return response.json();
      }
      throw new Error('Network response was not ok.');
    })
    .then(playingMoviesData => {
      playingMoviesData.forEach((playingMovieData) => {
        const moviedataEndpoint = `http://localhost/school/jaar2/periode1/annexBios/api/v1/movieData/${playingMovieData.movie_id}`;

        fetch(moviedataEndpoint, {
            method: 'GET',
            headers: {
              'Authorization': `Bearer ${apiToken}`,
              'Content-Type': 'application/json'
            }
          })
          .then(response => {
            if (response.ok) {
              return response.json();
            }
            throw new Error('Network response was not ok.');
          })
          .then(movieData => {
            console.log(movieData);

            const playingMovies = document.querySelectorAll(".playing-movie");

            movieData.forEach((movie, index) => {
              const playingMovie = playingMovies[index];
              const movieTitle = playingMovie.querySelector(".rm-title");
              const moviePlayDate = playingMovie.querySelector(".rm-play-date");
              const moviePlacesAvailable = playingMovie.querySelector(".rm-places-available");
              const movieImageContainer =
                playingMovie.querySelector(".rm-img-container");

              const movieImageElement = document.createElement("img");
              movieImageElement.src = movie.image_path;
              movieImageElement.alt = `Poster voor ${movie.title}`;
              movieImageElement.classList.add("rm-img");
              movieImageContainer.appendChild(movieImageElement);

              movieTitle.textContent = movie.title;
              moviePlayDate.textContent = `Speelt op: ${playingMovieData.play_time}`;

              let placesAvailable = 0;
              playingMovieData.place_data.forEach((place) => {
                if (place.available == true) {
                  placesAvailable++;
                }
              });
              moviePlacesAvailable.textContent = `Plaatsen beschikbaar: ${placesAvailable}`;

              const filledStars = playingMovie.querySelector(".stars.filled");
              filledStars.style.width = `${movie.rating * 10}%`;

              const skeletonLoaders = playingMovie.querySelectorAll(".skeleton");
              skeletonLoaders.forEach((skeletonLoader) => {
                skeletonLoader.classList.remove("skeleton");
              });
            });

            for (let i = movieData.length; i < playingMovies.length; i++) {
              const playingMovie = playingMovies[i];
              playingMovie.style.display = "none";
            }
          })
          .catch(error => {
            // Handle errors
            console.error('There was a problem with the fetch operation:', error);
          });
      });
    })
    .catch(error => {
      // Handle errors
      console.error('There was a problem with the fetch operation:', error);
    });
}

loadPlayingMovies();
