<?php
require 'header.php';
?>

<main class="text-center">
    <h1>Signup</h1>
    <br>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo "<p class='error-text'>Fill in all fields</p><br>";
        } elseif ($_GET['error'] == "invaliduid") {
            echo "<p class='error-text'>Invalid username</p><br>";
        }
        // and so on
    } elseif (isset($_GET['signup']) && $_GET['signup'] == "success") {
        echo "<p class='success'>Signup successful</p><br>";
    }

    if (isset($_GET['newpassword'])) {
        if ($_GET['newpassword'] == "updated") {
            echo "<p class='success'>Password change successful</p><br>";
        }
    }
    ?>
    <form action="includes/signup.inc.php" method="post">
        <div class="signup-box mx-auto">

            <div class="form-group ">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group   ">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password2" placeholder="Confirm your password" required>
            </div>

            <button type="submit" name="signup-submit" class="btn btn-primary">Sign Up</button>
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    </form>

</main>

<?php
require 'footer.php';
?>