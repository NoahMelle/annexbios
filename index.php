<?php
$locations = ["Leerdam", "Maarssen", "Leidsche Rijn", "Montfoort", "Breukelen"]
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annexbios</title>
  <link href="./assets/css/style.css?t=<?= time() ?>" rel="stylesheet" />
  <link href="./assets/css/homepage.css?t=<?= time() ?>" rel="stylesheet" />
</head>

<body>
  <nav class="navbar not-active">
    <div class="header-bar-container">
      <div class="header-bar-content">
        <div class="mobile-top">
          <img class="navbar-logo" src="./assets/img/logo/logo_hoofd.png" alt="logo">
          <div class="menu-container">
            <div class="hamburger-button not-active">
              <span class="hamburger-bar bar-top"></span>
              <span class="hamburger-bar bar-middle"></span>
              <span class="hamburger-bar bar-bottom"></span>
            </div>
          </div>
        </div>
        <div class="nav-links">
          <h3 class="kop1">VESTIGINGEN</h3>
          <h3 class="kop2">AANBEVOLEN FILMS</h3>
          <h3 class="kop3">CONTACT</h3>
        </div>
      </div>
    </div>
    <div class="navbar-lower">
      <div class="navbar-purchase">KOOP JE TICKETS</div>
      <div class="location-group">
        <select name="" id="" class="location-selector">
          <option value="" disabled selected>Kies je vestiging</option>
          <?php foreach ($locations as $location) : ?>
            <option value=""><?= $location ?></option>
          <?php endforeach; ?>
        </select>
        <button class="view-tickets">
          Bekijk Tickets
        </button>
      </div>
    </div>
  </nav>
  <main class="">
    <div class="hero">
      <div class="hero-text-container">
        <h2>WELKOM BIJ ANNEXBIOS</h2>
        <p class="hero-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit possimus eos fugit provident, eius perspiciatis facere veritatis rem <br> nihil nulla ullam nemo iusto fugiat excepturi vel velit aspernatur cum recusandae!</p>
      </div>
      <a href="/vestigingen" class="hero-view-locations">
        Bekijk Onze Vestigingen
      </a>
    </div>
    <div class="locations">
      <?php
      foreach ($locations as $location) : ?>
        <div class="location">
          <img class="location-image" src="https://placehold.co/600x200" alt="foto van de film">
          <div class="location-info">
            <h2 class="location-name"><?= $location ?></h2>
            <p class="location-address">Rijksstraatweg 42, 3223 KA</p>
            <a href="#" class="location-button">Bezoek Website</a>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="location new-locations">
        <div class="location-info">
          <h2 class="location-name">Weten waar wij nog meer komen?</h2>
          <p class="location-address">Lorem ipsum dolor sit amet, consectetuer
            adipiscing elit. Aenean commodo ligul.</p>
          <a href="#" class="location-button">Bekijk nieuwe projecten</a>
        </div>
      </div>
    </div>
    <div class="recommended-movies-container">
      <h2>AANBEVOLEN FILMS</h2>


      <div id="recommended-movies">

      </div>
  </main>

  <!-- wij gaan het nieuws kopje overslaan  -->
  <!-- <div class="news_tussenkopje"></div>   
        <div class="news"></div> -->

  <footer class="footer">
    <div class="footer-top-wrapper">
    <img src="./assets/img/footer/tape.png" alt="" class="tape-overlay">
      <div class="footer-top">
        <div class="footer-section main">
          <img class="footer-logo" src="./assets/img/logo/logo_wit.png" alt="logo">
          <div class="footer_tekstcontainer">
            <p class="footer_tekst">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, accusamus! Facilis culpa excepturi commodi, accusantium laborum voluptas vero quas autem aliquam suscipit ipsum esse explicabo, veniam nihil eos eum eligendi.</p>
          </div>
          <a href="#" class="read-more">Lees Meer</a>
        </div>
        <div class="footer-section">
          <div class="footer-heading">
            <h2 class="footer-heading">NAVIGEER</h2>
          </div>
          <ul>
            <li class="list_item">Werken bij</li>
            <li class="list_item">Veelgestelde vragen</li>
            <li class="list_item">Vestigingen</li>
            <li class="list_item">Contact</li>
          </ul>
        </div>
        <div class="footer-section">
          <div class="footer-heading">
            <h2 class="footer-heading">VOLG ONS</h2>
          </div>
          <ul class="icons">
            <li class="icon"><a href="#"><img src="./assets/icons/facebook.png" alt=""></a></li>
            <li class="icon"><a href="#"><img src="./assets/icons/twitter.png" alt=""></a></li>
            <li class="icon"><a href="#"><img src="./assets/icons/instagram.png" alt=""></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="legal-row-container">
      <div class="legal-row">
        <a href="#">Voorwaarden</a> | <a href="#">Privacybeleid</a> | <a href="#">Cookie Disclaimer</a>
      </div>
    </div>
  </footer>
  <script src="js/aanbevolenFilms.js"></script>
  <script src="./assets/js/app.js"></script>
</body>

</html>