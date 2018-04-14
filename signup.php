<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Sign Up</h2>
            <form class="signup-form" action="includes/signup-inc.php" method="post">
                <input type="text" name="first" placeholder="First Name*">
                <input type="text" name="middle" placeholder="Middle Name">
                <input type="text" name="last" placeholder="Last Name*">
                <input type="email" name="email" placeholder="Email*">
                <input type="password" name="password" placeholder="Password*">
                <input type="password" name="password2" placeholder="Confirm Password*">
                <input type="text" name="age" placeholder="Age*">
                <div class="signup-radio">
                    <p>Gender:</p>
                    <input type="radio" id="gender1" name="gender" value="M">
                    <label for="gender1">Male</label>
                    <input type="radio" id="gender2" name="gender" value="F">
                    <label for="gender2">Female</label>
                    <button type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </section>

<?php
include_once 'footer.php';
?>