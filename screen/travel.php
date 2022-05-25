<?php
require_once "../pdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <meta HTTP-EQUIV="EXPIRES" CONTENT="0">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <link rel="stylesheet" href="../style/travel.css">
    <title>My Travel</title>
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

    <div id="main">
        <?php
        $stmt = $pdo->query("SELECT `name`, `id` FROM `image` ORDER BY id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo '<a href="javascript:void(0)" class="image" onclick="viewControl(' . ($row['id'] - 1);
            echo ')"><img src="../image/xuesifu/' . $row['name'];
            echo '.jpg"/></a>';
        };
        ?>
    </div>
    <div id="image__view" class="view">
        <div class="top" style="text-align: right;">
            <span class="close" onclick="viewControl()">X</span>
        </div>
        <div class="bottom">
            <span class="left" onclick="left()">&lt;</span>
            <img id="image" class="" src="" alt="xuesifu_img" />
            <span class="right" onclick="right()">&gt;</span>
        </div>
    </div>
    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function viewControl(num) {
            var x = document.getElementById("image__view");
            if (x.className.indexOf("show") == -1) {
                document.getElementById("image").src = "../image/xuesifu/xuesifu_img" + num + ".jpg";
                document.getElementById("image").className = num;
                x.className = "show";
            } else {
                x.className = x.className.replace("show", "view");
            }
        }

        function left() {
            let num = document.getElementById("image").className
            if (parseInt(num) > 0) {
                document.getElementById("image").src = "../image/xuesifu/xuesifu_img" + String(parseInt(num) - 1) + ".jpg";
                document.getElementById("image").className = String(parseInt(num) - 1);
            }
        }

        function right() {
            let num = document.getElementById("image").className
            if (parseInt(num) < 25) {
                document.getElementById("image").src = "../image/xuesifu/xuesifu_img" + String(parseInt(num) + 1) + ".jpg";
                document.getElementById("image").className = String(parseInt(num) + 1);
            }
        }
    </script>
</body>

</html>