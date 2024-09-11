document.querySelector('#movies_form').addEventListener('submit', function (e) {
  e.preventDefault(); // Prevent the form from submitting the traditional way

  // Show the loading screen
  document.querySelector('.movies-loading-screen').style.display = 'flex';
  document.body.style.overflow = 'hidden';

  // Get the form data
  let formData = new FormData();
  formData.append('imdb_id', document.querySelector('#imdb_id').value);

  fetch('../../core/xml/uploadMovieToDB.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        return response.text();
      }
      throw new Error('Network response was not ok.');
    })
    .then(responseData => {
      console.log(responseData);

      // document.querySelector('.movies-loading-screen').style.display = 'none';
      // document.body.style.overflow = 'auto';

      // if (responseData['success'] === true) {
      //   // Show success message
      //   document.querySelector('.hero-text-alert').style.display = 'flex';
      //   document.querySelector('.hero-text-alert').classList.add('success');
      //   document.querySelector('.hero-text-alert').classList.remove('error');
      //   document.querySelector('.hero-text-alert').textContent = 'toegevoegd aan de database';
      // } else {
      //   // Show error message
      //   document.querySelector('.hero-text-alert').style.display = 'flex';
      //   document.querySelector('.hero-text-alert').classList.add('error');
      //   document.querySelector('.hero-text-alert').classList.remove('success');
      //   document.querySelector('.hero-text-alert').textContent = 'error: ' + responseData['error_message'];
      // }
    })
    .catch(error => {
      // Handle errors
      console.error('There was a problem with the fetch operation:', error);
    });
});
