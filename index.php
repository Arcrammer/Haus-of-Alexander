<!DOCTYPE html>
<?php
  // Connect to the database so we can fetch site data
  $connection = mysqli_connect("71.76.17.180","Alexander","99=dgXz\@r[HHQ6-Jp&;*5,2F","HoA");
  mysqli_set_charset($connection, "utf8"); // Prevent unknown character glyphs
  $sites = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM Sites ORDER BY date_posted DESC"));
  mysqli_close($connection);
?>
<html>
  <head>
    <title>Haus of Alexander / Home</title>
    <!-- Metadata -->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta id="viewport" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="application-name" content="Haus of Alexander">
      <meta name="description" content="Alexander's portfolio.">
      <meta name="author" content="Alexander Rhett Crammer">
      <meta name="generator" content="Coda 2, Photoshop CS6, PHP, Apache, Windows">
      <meta name="keywords" content="Web Development, Portfolio, Sites, Design">
    <!-- Links -->
      <link rel="shortcut icon" href="Assets/Images/favicon.png">
      <link rel="stylesheet" href="Assets/Stylesheets/Main.css">
      <link rel="stylesheet" href="Assets/Stylesheets/CollectionView.css">
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="/">Portfolio</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="https://www.facebook.com/profile.php?id=100004220954730" target="_blank">Facebook</a></li>
        <li><a href="https://github.com/Arcrammer" target="_blank">GitHub</a></li>
        <li><a href="http://stackoverflow.com/users/1610576/arcrammer" target="_blank">Stack Overflow</a></li>
      </ul>
      <div class="pancake-container">
        <button class="pancake-button">
          <img src="Assets/Images/Pancakes.svg" alt="Pancakes.svg">
        </button>
      </div> <!-- .pancake-container -->
    </nav>
    
    <header class="banner black-radial"><a href="/"><img src="Assets/Images/Logo.png" alt="Logo.png"></a></header>
    <div class="container">
      <?php foreach ($sites as $site => $metadata):
        /* First, we'll seperate the headers and sub-headers */
        $metadata[7] = trim(explode("(", $metadata[1])[1], ")"); ?>
          <div class="site">
        <?php
          if ($metadata[7] != "") {
            $metadata[1] = explode("(", $metadata[1]);
            echo '<a href="' . $metadata[4] . '"><h4>' . $metadata[1][0] . '</h4>';
            echo "<br /><h6>" . $metadata[7] . "</h6>";
          } else {
            echo '<a href="' . $metadata[4] . '"><h4>' . $metadata[1] . '</h4>';
          }
        ?>
          </a>
          <a href="<?= $metadata[4] ?>"><img src="Assets/Thumbnails/<?= $metadata[2] ?>" alt="<?= $metadata[2] ?>"></a>
          <p><?= $metadata[3] ?></p>
        </div> <!-- .site -->
      <?php endforeach; ?>
    </div> <!-- .container -->
    <footer class="black-radial">
      <section>
        <h4>Who are you, Alexander?</h4>
        <p>My name is Alexander and I'm 19. I'm a web developer.</p>
      </section>
      <section>
        <h4>Social</h4>
        <ul>
          <li><a href="http://www.github.com/Arcrammer" target="_blank">GitHub</a></li>
          <li><a href="mailto:Alexander2475914@gmail.com">Email</a></li>
          <li><a href="http://twitter.com/Arcrammer" target="_blank">Twitter</a></li>
        </ul>
      </section>
      <section>
        <h4>What's your experience?</h4>
        <p>I'm most experienced with front-end and back-end web technologies such as HTML, CSS, JavaScript, PHP, Ruby on Rails (a little), and a few other things. I also have experience with Objective-C, Swift, Ruby (a little), and a little of both Java and Python.</p>
      </section>
      <section>
        <h4>Me</h4>
        <img src="Assets/Images/Self.png" alt="Self.png">
      </section>
    </footer>
    <!-- Scripts -->
      <script src="Assets/Scripts/jQuery.min.js"></script>
      <script src="Assets/Scripts/StatCounter.js"></script>
      <script src="Assets/Scripts/Main.js"></script>
  </body>
</html>