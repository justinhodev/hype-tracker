<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <ul>
    <li><?php echo "<a href=\"index.php\">All Sneakers</a>" ?></li>
    <li><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"logout.php\">Logout</a>" : "<a href=\"login.php\">Login</a>"; ?></li>
    <li><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"showwatchlist.php\">My Watchlist</a>" : ""; ?></li>
    <li><?php echo (!empty($_SESSION['member_id'])) ? "<a href=\"myaccount.php\">My Account</a>" : ""; ?></li>
  </ul>
</nav>
