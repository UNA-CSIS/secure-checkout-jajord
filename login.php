<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Sign in</title>
    </head>
    <body>

        <form method="POST" action="authorizeplusredirect.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="enter username..." required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="enter password..." required>
            <br>
            <input type="submit" name="next" value="Next &gt;">
        </form>
    </body>
</html>
