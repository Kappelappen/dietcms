<h1>DietCMS</h1>
<ul id="nav">
    <li><a href="../public/index.php" target="_top">Home</a></li>
    <li><a href="../public/articles/index.php">Articles</a></li>
    <li><a href="../public/dashboard/index.php">Dashboard</a></li>

    <?php if (!isset($_SESSION["user_id"])) { ?>

        <li><a href="../public/login.php">Login</a></li>
    
    <?php } ?>

    <?php if (isset($_SESSION["user_id"])) { ?>

        <li><a href="../public/logout.php">Logout</a></li>
    
    <?php } ?>
    

</ul>