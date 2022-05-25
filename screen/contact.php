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
    <link rel="stylesheet" href="../style/conact.css">
    <title>My Contact</title>
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

    <div class="" id="Contact">
        <div class="info">
            <h2 class="">CONTACT</h2>
            <p class="">send a massage for me</p>
            <form action="./action_page.php" target="_self" method="get">
                <p><input class="" type="text" placeholder="Your Name" required name="name"></p>
                <p><input class="" type="email" placeholder="Your Email" required name="email"></p>
                <p><input class="date" type="datetime-local" placeholder="Date and time" required name="date" value=""></p>
                <p><textarea class="" type="text" placeholder="Write something..." required name="msg"></textarea></p>
                <p><button class="" type="submit" onclick="thanks()">Submit</button></p>
                <!-- <p id="thank" class="view" >Thank you for your submmision!<br>We have received your massage.</p> -->
            </form>
        </div>
    </div>
    <div class="massage">
        <ul>
            <?php
            $stmt = $pdo->query("SELECT `name`, `messages`, `email`, `date`, `id` FROM `msg` 
                           ORDER BY id DESC Limit 3");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                echo '<li>';
                echo "<h4>" . $row['name'] . "</h4>";
                echo "<p>" . $row['messages'] . "</p>";
                echo "<i>" . $row['date'] . "</i>";
                echo "</li>";
            };
            ?>
        </ul>
    </div>

    <script>
        // document.getElementsByClassName("date").innerHTML = Date();
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function thanks() {
            alert("Thank you for your submmision!\nWe have received your massage.")
        }
    </script>
</body>

</html>