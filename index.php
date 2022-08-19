
<?php

session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="disdription" content="">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/centerStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<img style="position: absolute" src="Image/BG.jpg" width="100%">


<div class="slideshow-container">

    <div class="mySlides fade">
        <!--        <div class="numbertext">1 / 3</div>-->
        <img src="Image/BG.jpg" style="width:100%; position: absolute">
        <!--        <div class="text">Caption Text</div>-->
    </div>

    <div class="mySlides fade">
        <!--        <div class="numbertext">2 / 3</div>-->
        <img src="Image/1.jpg" style="width:100%; position: absolute">
        <!--        <div class="text">Caption Two</div>-->
    </div>

    <div class="mySlides fade">
        <!--        <div class="numbertext">3 / 3</div>-->
        <img src="Image/2.jpg" style="width:100%; position: absolute">
        <!--        <div class="text">Caption Three</div>-->
    </div>

    <a class="prev" style="margin-top: 25%; position: absolute" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" style="margin-top: 25%; position: absolute" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center; margin-top: 45%; position: absolute;  float: left; margin-left: 50%">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<div class="header" style="color: black">
    <div class="logo" style="position: fixed; float: left; margin-left: 1%" >
        <a href="index.php"><img src="Image/Logo.png" width="8%" alt="Atlas Awards"/> </a>
    </div>

    <nav style="position: fixed; width: 100%; float: left; margin-left: 12%">
        <ul class="menu">
            <a href="index.php">HOME</a>
            <a href="voteList.php">VOTE</a>
            <?php if (isset($_SESSION['name']) and ($_SESSION['user_type'] == 'admin' or $_SESSION['user_type'] == 'org')){
                    echo '<a href="artistListOrg.php">NOMINEES</a>';
                } ?>

            <a href="winners.php">WINNERS</a>
            <a href="#!">NEWS</a>
            <a href="About.html">ABOUT</a>
            <?php if (isset($_SESSION['name']) and $_SESSION['user_type'] == 'admin'){
                    echo '<a href="admin.php">ADMIN</a>';
                } ?>
            
            <div class="line"></div>
        </ul>
        <ul class="reg">
            <?php
                if (!isset($_SESSION['name'])){
                    echo '<a class="btn log" style="margin-right:4px" href="Login.php">Log in</a>
            <a class="btn sign" style="margin-right:4px" href="signupCtg.php">Sign up</a>';
                }

                else{
                    echo '<a href="artistProfile.php" style="color: white; margin-right: 10px">'.$_SESSION['name'].'</a>';
                    echo '<a class="btn sign" style="margin-right:4px" href="logOut.php">Log out</a>';
                }


            ?>
                        
        </ul>
    </nav>
</div>

<div class="wrapper" style=" position: absolute; margin-top: 68%; width: 100%">
    <h2 style="margin-top: 60px">Atlas Awards 2020</h2>
    <div class="line"></div>
        <div class="awardDetails" style="margin-left: 6%">
        <div class="Details"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
        <span></span>
        <h3 style="margin-top: 30px">Date</h3>
        <p>10th October, 2020</p>
    </div>

    <div class="awardDetails">
        <div class="Details"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
        <span></span>
        <h3 style="margin-top: 30px">Location</h3>
        <p>Nelum Pokuna Mahinda Rajapaksa Theatre</p>
    </div>

    <div class="awardDetails">
        <div class="Details"><i class="fa fa-user" aria-hidden="true"></i></div>
        <span></span>
        <h3 style="margin-top: 30px">Atlas Award 2020</h3>
        <p>20+ Awards</p>
    </div>

    <div class="awardDetails">
        <div class="Details"><i class="fa fa-comments-o" aria-hidden="true"></i></div>
        <span></span>
        <h3 style="margin-top: 30px">Vote</h3>
        <p>Starting from 1st October, 2020</p>
    </div>
</div>

<footer style="position: absolute; margin-top: 115%">

    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>Atlas Awards 2020</h1>
                <p>Atlas Award proudly announce that this is the only singing awarding ceremony in the region held
                    within the 1st quarter immediately after the end of year under review. No doubt that both
                    artists and television viewers will welcome this move to evaluate the TV program while they
                    are still live in good memories of them, despite the challenges in evaluating and organizing
                    the event in such a short span of time.</p>
            </div>

            <div class="footer-items">
                <h2>quick links</h2>
                <div class="border"></div>
                <ul style="margin-top: 5px">
                    <a href=""><li>Winners</li></a>
                    <a href=""><li>Nominees</li></a>
                    <a href=""><li>Vote</li></a>
                    <a href=""><li>Contact</li></a>
                    <a href=""><li>News</li></a>
                    <a href=""><li>Home</li></a>
                </ul>
            </div>

            <div class="footer-items">
                <h2>Follow Us</h2>
                <div class="border"></div>
                <div class="social-media">
                    <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="footer-items">
                <h2>Contact Us</h2>
                <div class="border"></div>
                <ul style="margin-top: 5px">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Nelum Pokuna Mahinda Rajapaksa Theatre</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>+94771234567</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>evoting@gmail.com</li>
                </ul>
            </div>
            <div class="footer-bottom">
                Copyright &copy; ATLAS AWARDS 2020. All rigths reserved.
            </div>
        </div>
    </div>

</footer>


</body>
</html>