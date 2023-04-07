<header>
  <nav class="wrapper">
    <span>
      <img src="img/tubes.png" class="logo">POTION PARLOR
    </span>

    <ul class="navigation">
      <li><a href="home.php">HOME</a></li>
      <li><a href="dashboard.php" class="active">DASHBOARD</a></li>
      <li><a href="logbook.php">LOG BOOK</a></li>
      <li><a href="aboutus.php">ABOUT US</a></li>
      <li><a href="profile.php">
          <?php echo $_SESSION['aptk_name'] ?>
        </a></li>
      <span><a href="home.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a></span>
    </ul>
  </nav>
</header>