<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <ul>
    <li><?php echo "<a href=http://" .$_SERVER['HTTP_HOST'] .$doc_root ."/index.php" .">All Sneakers</a>" ?></li>
    <li><?php echo (empty($_SESSION['member_id'])) ? "<a href=\"login.php\">Login</a>" : "<a href=\"logout.php\">Logout</a>"; ?></li>
    <li><?php echo (!empty($_SESSION['username'])) ? "User: " .$_SESSION['username'] : ""; ?></li>
  </ul>
</nav>
