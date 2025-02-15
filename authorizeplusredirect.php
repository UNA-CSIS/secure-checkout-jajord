<?php

function redirect($to){
    header("Location:$to");
    die();
}

#open sesh if not already
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['logged-in'] != 'true') {
    if (filter_input(INPUT_POST, 'username') && filter_input(INPUT_POST, 'password')) {
        # not gonna bother refactoring this, it "works"
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        if ($username === $password) {
            $_SESSION['logged-in'] = 'true'; #string lol
            $_SESSION['username'] = $username;
            redirect($_SESSION['last-page'] ?? 'index.php');
        } else {
            $_SESSION['logged-in'] = 'false'; #is using the session to track auth safe over https?
            redirect('login.php');
        }
    } else {
        redirect('login.php');
    }
} # 3 nested ifs 🤮