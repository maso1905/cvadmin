<?php    
    include("includes/config.php");
    require 'errors.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Admin CV</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu-desktop">
                <li><a href="#" id="bigCv">CV</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Log In</a></li>
            </ul>   

            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="#">CV</a>
                    <a href="#">About</a>
                    <a href="#">Projects</a>
                    <a href="#">Work</a>
                    <a href="#">Education</a>
                    <a href="#">Contact</a>
                    <a href="#">Log In</a>    
                </div>
            </div>
            <span class="menuicon" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <span class="logoicon" style="font-size:30px;cursor:pointer">CV</span>
        </nav>
        <!--/nav-->
    </header>

    <div class="wrapper">
    
        <div id="id01" class="modal"> 
            <form class="modal-content animate" method="post">

            <?php
            // control if logged in 
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Strip html tags 
                $username = strip_tags($username);
                $password  = strip_tags($password);

                // Check if correct username and password (hardcoded)
                if ($username == "admin" && $password == "password") {
                    $_SESSION['username'] = $username;

                    // Sends to admin page 
                    header("Location: admin.php");
                } else {
                    $message = "<h5><br/>Incorrect username or password!</h5>";
                }
            }

            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }
            ?>
                <div class="imgcontainer">
                    <img src="css/images/portrait1.jpg" alt="userphoto" class="avatar">
                </div>
                
                <div class="login-container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required id="username">
                    
                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required  id="password" >
                        
                    <input type="submit" name="loggIn" value="Log in">

                    <?php if (isset($message)) {?> <b style="color: red;"><?php echo $message; ?></b><?php } ?>
                </div>
                    
                <div class="login-container" style="background-color:#f1f1f1">
                </div>
            </form>
        </div>
        <!--/modal-->

        <div class="about-container">
            <div class="aboutme">
                <h2>About Me</h2>
                <p>
                    I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally.
                </p>
            </div>
    
            <div class="circle-section">
                <ul>
                    <li><img src="css/images/portrait1.jpg" alt="Portrait of job applicant"/></li>
                </ul>
            </div>
            <!--/circle-section-->
    
            <div class="mygoals">
                <h2>My goals</h2>
                <p>
                    I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally.
                </p>
            </div>
        </div>
        <!--/about-container-->

        <div class="about-container-small">
            <div class="circle-section">
                <ul>
                    <li><img src="css/images/portrait1.jpg" alt="Portrait of job applicant"/></li>
                </ul>
            </div>
            <!--/circle-section-->

                <div class="aboutme">
                    <h2>About Me</h2>
                    <p>
                        I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally.
                    </p>                
                </div>
        
                <div class="mygoals">
                    <h2>My goals</h2>
                    <p>
                        I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally.
                    </p>
                </div>
        </div>
        <!--/about-container-small-->

        <div class="container">
            <h2>Projects</h2>
            <ul id="websiteList">
                <!--Websites from database--> 
            </ul>
        </div>
        <!--/container-->
        
        <div class="tables">
            <div id="works">
                <h2>Work</h2> 
                <div id="work-table">
                    <!--Work from database--> 
                </div>
            </div>

            <div id="education">
                <h2>Education</h2>
                <div id="edu-table">
                    <!--Education from database--> 
                </div>
            </div>
        </div>
        <!--/tables-->

        <footer id="foo">
            <p>
                <a href="mailto:maso1905@student.miun.se">E-mail: maso1905@student.miun.se</a><br>
                Phone: +46 73 111 11 11<br>
                Adress: Törnby Gård 8, 17965 Stenhamra<br>   
            </p>
            <h6>This website was created by Malin Söderlund</h6>
        </footer>
    </div>
    <!--/wrapper-->
    <script src="js/main.js"></script>
</body>
</html>


