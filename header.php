<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a> </li>
                <?php
                    //if user is logged in then show extra tabs
                    if(isset($_SESSION['email'])){
                        if(strcmp($_SESSION['type'], "Manager") == 0){
                            echo '
                            	<li><a href="viewUsers.php">Edit Users</a></li>
                                <li><a href="addBook.php">Add Books</a></li>
                                <li><a href="view_books.php">Edit Books</a></li>
				<li><a href="addKey.php">Add Keywords</a></li>
				<li><a href="view_key.php">Edit Keywords</a></li>
                            ';
                        }
                        echo '  <li><a href="userPage.php">User</a> </li>
                                <li><a href="cart.php">Cart</a> </li>';
                    }
                ?>
            </ul>
            <div class="nav-login">
                <?php
                    if(isset($_SESSION['email'])){
                        echo '<form action="includes/logout-inc.php" method="post">
                                <button type="submit" name="submit">Logout</button>
                              </form>';
                    } else {
                        echo '<form action="includes/login-inc.php" method="post">
                                <input type="text" name="email" placeholder="Email">
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" name="submit">Login</button>
                              </form>
                              <a href="signup.php">Sign Up</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>
