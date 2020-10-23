  <?php include("includes/config.php")?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Malins CV</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu-desktop">
                <li style="float: left;"><h4>Welcome, Admin.</h4></li>
                <li style="float: right;"><a href="logout.php">Logga ut</a></li>
            </ul>     
        </nav>
        <!--/nav-->
    </header>
    <div class="wrapper">

        <?php
            // Kontrollerar om besökaren är inloggad, skickar till logga in 
            if (!isset($_SESSION['username'])) {
                header("Location: login.php"); 
            }
        ?>
        
        
        <div class="tables">
            <div id="works">
                <h2>Work</h2> 
                <div id="work-table">
                    <!--Courses from database--> 
                </div>
                <form>
                    <h2>Add job:</h2>
                    <label for="company">Company:</label>
                    <br>
                    <input type="text" name="company" id="company">
                    <br>
                    <label for="title">Title:</label>
                    <br>
                    <input type="text" name="title" id="title">
                    <br>
                    <label for="workstart">Start:</label>
                    <br>
                    <input type="text" name="workstart" id="workstart">
                    <br>
                    <label for="workend">End:</label>
                    <br>
                    <input type="text" name="workend" id="workend">
                    <br>
                    <input type="button" value="Add Work" id="addWork">
                </form>
            </div>

            <div id="education">
                <h2>Education</h2>
                <div id="edu-table">
                    <!--Courses from database--> 
                </div>
                <form>
                    <h2>Add Education</h2>
                    <label for="school">School:</label>
                    <br>
                    <input type="text" name="school" id="school">
                    <br>
                    <label for="program">Program:</label>
                    <br>
                    <input type="text" name="program" id="program">
                    <br>
                    <label for="edustart">Start:</label>
                    <br>
                    <input type="text" name="edustart" id="edustart">
                    <br>
                    <label for="eduend">End:</label>
                    <br>
                    <input type="text" name="eduend" id="eduend">
                    <br>
                    <input type="button" value="Add Education" id="addEducation">
                </form>
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

</body>
<script src="js/main.js"></script>
</html>