
<?php

    $html = '<div class="error-message">' . "\n";

    foreach ($login as $item) {

        $html .= $item;

    }

    $html .= '</div>' . "\n";
    echo $html;
    

?>

<form name="loginForm" id="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<p id="login-info">Please sign in with your username and password<br />to access the content management system.</p>
<label>Username:</label>
<input type="text" name="username" value=""><br><br>
<label>Password:</label>
<input type="password" name="password">
<button type="submit" id="login-btn" name="btn-login">Login</button>
</form>