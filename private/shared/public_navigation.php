<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item"><?php echo "<a href=\"index.php\" class=\"nav-link";
    echo "\">All Sneakers</a>"; ?></li>
    <li class="nav-item"><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"showwatchlist.php\" class=\"nav-link\">My Watchlist</a>" : ""; ?></li>
    <li class="nav-item"><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"myaccount.php\" class=\"nav-link\">My Account</a>" : ""; ?></li>
    <li class="nav-item"><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"logout.php\" class=\"nav-link\">Logout</a>" : "<a href=\"login.php\" class=\"nav-link\">Login</a>"; ?></li>
  </ul>
</nav>
