<?php
session_start();
if (!isset($_SESSION['id']) ){
    echo '<script type="text/javascript"> document.location = "Login.php";</script>';
    //   header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="disdription" content="">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/profileStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/serviceStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/SlideStyle.css">
    <script src="js/myScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php require_once('navBarOut.php');?>

<div class="header" style="color: black">
    <div class="logo" style="position: fixed; float: left;  background-color:black" >
        <a href="https://www.atlasawards.lk/"><img src="Image/Logo.png" style="margin-left: 1%;" width="8%" alt="Atlas Awards"/> </a>
    </div>

    <nav style="position: fixed; width: 100%; float: left; margin-left: 12%">
        <ul class="menu">
            <a href="#!">HOME</a>
            <a href="#!">VOTE</a>
            <a href="#!">NOMINEES</a>
            <a href="#!">WINNERS</a>
            <a href="#!">NEWS</a>
            <a href="#!">ABOUT</a>
            <div class="line"></div>
        </ul>
        <ul class="reg">
            <a class="btn log" href="artistEditForm.php">Profile</a>
            <a class="btn sign"  href="signupCtg.php">Sign out</a>
        </ul>
    </nav>
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