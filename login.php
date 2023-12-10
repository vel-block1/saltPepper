<?php
require 'header.php';
?>

<body>

    <div class="header-login">
        <?php
        if (isset($_SESSION['id'])) {
            echo
            '<form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button>
                        </form>';
        } else {
            echo
            '
            <main> 
            <h1>Login</h1>
            <br>
            <div class="signup-box mx-auto">
                <form action="includes/login.inc.php" method="post">
                
                <div class="form-group ">
                <label for="username_email" class="form-label">Username</label>
                <input type="text" class="form-control" name="username_email" placeholder="Username or E-mail" required>
                </div>
                <div class="form-group ">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                            
                            <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
                            <a href="signup.php" class="btn btn-primary">Signup</a>
                </form>
            </div>
            </main>';
        }
        ?>
    </div>

    <?php
    require 'footer.php';
    ?>