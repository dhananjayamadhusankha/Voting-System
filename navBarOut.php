<div class="header" style="color: black">
    <div class="logo" style="position: fixed; float: left;background-color:black"" >
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
            <a href="News.php">NEWS</a>
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