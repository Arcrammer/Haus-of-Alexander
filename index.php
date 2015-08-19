<!DOCTYPE html>
<html>
<?php
  // Connect to the database so we can fetch site data
  $connection = mysqli_connect("71.76.17.180","alexander","AXnR4xpyE5kWMew6tR","HoA");
  mysqli_set_charset($connection, "utf8"); // Prevent unknown character glyphs
  $sites = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM Sites ORDER BY date_posted DESC"));
  mysqli_close($connection);
?>
  <head>
    <title>Alexander Rhett Crammer</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="Assets/Stylesheets/Main.css">
  </head>
  <body>
    <div class="container">
      <header>Alexander Rhett Crammer</header>
      <?php foreach ($sites as $site => $metadata):
        /* First, we'll seperate the headers and sub-headers */
        $metadata[7] = trim(explode("(", $metadata[1])[1], ")"); ?>
        <div class="site">
        <?php
          if ($metadata[7] != "") {
            $metadata[1] = explode("(", $metadata[1]);
            echo '<a href="' . $metadata[4] . '"><h1>' . $metadata[1][0] . '</h1>';
            echo "<br /><h4>" . $metadata[7] . "</h4>";
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
  </body>
</html>