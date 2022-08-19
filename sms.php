<!DOCTYPE html>
<html>
<head>
    <title>Vote Message</title>

    <link rel="stylesheet" type="text/css" href="CSS/voteMessageStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">

</head>
<body>
<?php require_once('navBarIn.php');?>


<div class="status">
    <table class="status_table" cellspacing="1%">
        <tr>
            <td>
                <div class="artistPic">
                    <div class="artistImg" style="padding: 1%">
                        <img src="img/1.jpg" width="100%" class = "Details" style="border-radius: 50%; border: 2px solid white">
                    </div>
                </div>
            </td>

            <td class="artistDetails" style="padding: 1%">
                <h3>Vote Successfully!</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                <table class="artistVote">
                    <tr>
                        <td class="bold">ID No.</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td class="bold">Name</td>
                        <td>Dhana</td>
                    </tr>
                    <tr>
                        <td class="bold">Date</td>
                        <td>2020/10/5</td>
                    </tr>
                    <tr>
                        <td class="bold">Time</td>
                        <td>5.51 PM</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>

<div class="ok_div" >

    <h4 class="ok" >Return to Home</h4>
    <button class="ok_btn">Home</button>
</div>

</body>
</html>
