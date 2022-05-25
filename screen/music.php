<?php
require_once "../pdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <meta HTTP-EQUIV="EXPIRES" CONTENT="0">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/music.css">
    <title>My Music</title>
</head>

<body>
    <div class="navigation">
        <a href="./index.html" class="home">
            <p>MY SPACE</p>
        </a>
        <a href="./study.html" class="study">
            <p>&emsp;STUDY</p>
        </a>
        <a href="./music.php" class="music">
            <p>&emsp;MUSIC</p>
        </a>
        <a href="./travel.php" class="travel">
            <p>&emsp;TRAVEL</p>
        </a>
        <a href="./contact.php" class="contact">
            <p>&emsp;CONTACT</p>
        </a>
        <button id="btn" onclick="document.getElementById('id01').style.display='block';" style="width:auto;">Log in</button>
    </div>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="./login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
                <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required>

                <button type="submit">Login</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>
    <div class="music">
        <ul>
            <?php

            $stmt = $pdo->query("SELECT `name` FROM `music` ORDER BY id DESC");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo '<li onclick="playMusic(\'' . $row['name'];
                echo '\')">';
                // echo '<input type="checkbox" value="' . $row['name'];
                // echo '">';
                echo $row['name'];
                echo "</li>";
            };
            ?>
        </ul>
        <audio controls autoplay>
            <source src="" type="audio/mpeg">
        </audio>
    </div>
    <button type="button" id="upload" class="upload">
        <p>+</p><span>upload</span>
    </button>
    <!-- 
    <form id="uploadFile" action="">
        <label class="upload_cover">
            <input id="upload_input" type="file" name="filename">
            <span class="upload_icon">➕</span>
        </label>
        <label class="submit_cover">
            <input id="upload_submit" type="submit">
            <span>upload</span>
        </label>
    </form> -->

    <button type="button" id="BackTop" class="toTop-arrow">︿</button>

    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function playMusic(path) {
            document.getElementsByTagName('audio')[0].src = "../music/" + path;
        }

        $(document).ready(function() {
            $('#BackTop').click(function() {
                $('html,body').animate({
                    scrollTop: 0
                }, 333);
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('#BackTop').fadeIn(222);
                    // 顯示按鈕
                } else {
                    $('#BackTop').stop().fadeOut(222);
                    // 隱藏按鈕
                }
            }).scroll();
        });
    </script>

</body>

</html>