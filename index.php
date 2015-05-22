<!DOCTYPE html>
<?php
  // Connect to the database so we can fetch site data
  $connection = pg_connect("host=ec2-23-21-96-129.compute-1.amazonaws.com port=5432 dbname=d7cicvktqgqgub user=msnofwbhiewurk password=RMsUusgai5qv3wli6E1XlHncGI");
  $sites = pg_fetch_all(pg_query("SELECT * FROM Sites ORDER BY date_posted DESC"));
  pg_close($connection);
?>
<html>
  <head>
    <?php include "Assets/Inclusions/Main.php" ?>
    <title><?= $title ?> / Home</title>
    <!-- Metadata -->
      <?= $metadata ?>
    <!-- Links -->
      <link rel="shortcut icon" href="../Images/favicon.png">
      <link rel="stylesheet" href="Assets/Stylesheets/Main.css">
      <link rel="stylesheet" href="Assets/Stylesheets/CollectionView.css">
  </head>
  <body>
    <header class="banner black-radial"><a href="/"><img src="Assets/Images/Logo.png" alt="Logo.png"></a></header>
    <div class="container">
      <?php foreach ($sites as $site => $metadata):
        /* First, we'll seperate the headers and sub-headers */
        $metadata["subheader"] = trim(explode("(", $metadata["name"])[1], ")"); ?>
          <div class="site">
        <?php
          if ($metadata["subheader"] != "") {
            $metadata["name"] = explode("(", $metadata["name"]);
            echo '<a href="' . $metadata["link"] . '"><h4>' . $metadata["name"][0] . '</h4>';
            echo "<br /><h6>" . $metadata["subheader"] . "</h6>";
          } else {
            echo '<a href="' . $metadata["link"] . '"><h4>' . $metadata["name"] . '</h4>';
          }
        ?>
          </a>
          <a href="<?= $metadata["link"] ?>"><img src="Assets/Thumbnails/<?= $metadata["image"] ?>" alt="<?= $metadata["image"] ?>"></a>
          <p><?= $metadata["brief"] ?></p>
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
        <p>I'm mostly experienced with front-end and back-end web technologies such as HTML, CSS, JavaScript, PHP, Ruby on Rails, and a few other things. I also have good experience with Objective-C, Swift, Ruby, and both Java and Python.</p>
      </section>
      <section>
        <h4>Me</h4>
        <img src="Assets/Images/Self.png" alt="Self.png">
      </section>
    </footer>
    <!-- Scripts -->
      <script src="Assets/Scripts/StatCounter.js"></script>
  </body>
</html>