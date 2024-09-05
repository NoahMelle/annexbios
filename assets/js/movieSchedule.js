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
    .then(playingMovies => {
      const recommendedMovies = document.querySelectorAll(".playing-movie");

      recommendedMovies.forEach((playingMovie, index) => {
        if (index < playingMovies.length) {
          const moviedataEndpoint = `http://localhost/school/jaar2/periode1/annexBios/api/v1/movieData/${playingMovies[index].movie_id}`;

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
            .then(movie => {
              const {
                title,
                image_path,
                rating
              } = movie[0];

              const movieTitle = playingMovie.querySelector(".rm-title");
              const movieImageContainer = playingMovie.querySelector(".rm-img-container");
              const moviePlayTime = playingMovie.querySelector(".rm-play-time");
              const moviePlacesAvailable = playingMovie.querySelector(".rm-places-available");
              const filledStars = playingMovie.querySelector(".stars.filled");
              const movieEdit = playingMovie.querySelector(".rm-edit");
              const movieDelete = playingMovie.querySelector(".rm-delete");

              // Set movie details
              movieTitle.textContent = title;
              moviePlayTime.textContent = 'speelt op: ' + playingMovies[index].play_time;

              movieEdit.href = movieEdit.href + playingMovies[index].location_movie_id;
              movieDelete.href = movieDelete.href + playingMovies[index].location_movie_id;


              $availablePlaces = 0;
              playingMovies[index].place_data.forEach((place) => {
                if (place.available) {
                  $availablePlaces++;
                }
              });
              moviePlacesAvailable.textContent = 'plekken beschikbaar: ' + $availablePlaces;

              // Update the image only if necessary
              if (!movieImageContainer.querySelector(".rm-img")) {
                const movieImageElement = document.createElement("img");
                movieImageElement.src = image_path;
                movieImageElement.alt = `Poster for ${title}`;
                movieImageElement.classList.add("rm-img");
                movieImageContainer.appendChild(movieImageElement);
              }

              // Update the star rating
              filledStars.style.width = `${rating * 10}%`;

              // Remove skeleton loaders
              playingMovie.classList.remove("skeleton");
            })
            .catch(error => {
              // Handle errors
              console.error('There was a problem with the fetch operation:', error);
            });
        } else {
          // Hide extra recommended movie elements
          playingMovie.style.display = "none";
        }
      });
    })
    .catch(error => {
      // Handle errors
      console.error('There was a problem with the fetch operation:', error);
    });



  // const recommendedMovies = document.querySelectorAll(".playing-movie");

  // recommendedMovies.forEach((recommendedMovie, index) => {
  //   console.log(recommendedMovie);

  //   if (index < movieData.length) {
  //     const {
  //       title,
  //       image,
  //       rating
  //     } = movieData[index];

  //     const movieTitle = recommendedMovie.querySelector(".rm-title");
  //     const movieImageContainer = recommendedMovie.querySelector(".rm-img-container");
  //     const moviePlayTime = recommendedMovie.querySelector(".rm-play-time");
  //     const moviePlacesAvailable = recommendedMovie.querySelector(".rm-places-available");
  //     const filledStars = recommendedMovie.querySelector(".stars.filled");

  //     // Set movie details
  //     movieTitle.textContent = title;

  //     // Update the image only if necessary
  //     if (!movieImageContainer.querySelector(".rm-img")) {
  //       const movieImageElement = document.createElement("img");
  //       movieImageElement.src = image;
  //       movieImageElement.alt = `Poster for ${title}`;
  //       movieImageElement.classList.add("rm-img");
  //       movieImageContainer.appendChild(movieImageElement);
  //     }

  //     // Update the star rating
  //     filledStars.style.width = `${rating * 10}%`;

  //     // Remove skeleton loaders
  //     recommendedMovie.classList.remove("skeleton");
  //   } else {
  //     // Hide extra recommended movie elements
  //     recommendedMovie.style.display = "none";
  //   }
  // });
}

loadPlayingMovies();
