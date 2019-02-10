<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>
<?php
include ('server.php');
include ('proces.php');
?>
<div class="form_box">
    <form method="post" action="index.php">
        <input type="text" name="saxeli" placeholder="სახელი / გვარი">
        <br>
        <input type="text" name="mobiluri" placeholder="მობილური">
        <br>
        <button name="save">შენახვა</button>
        <br>
        <input type="text" name="sax" placeholder="სახელი / გვარი ძიება">
        <br>
        <button name="saxsearch">ძიება</button>
        <br>
        <input type="text" name="mob" placeholder="მობილურის ნომრით ძიება">
        <br>
        <button name="mobsearch">ძიება</button>
        <div class="raodenoba">
            <?php

            $sql = "SELECT COUNT(id)  AS list FROM phones";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows($res)) {
                $row = mysqli_fetch_assoc($res);
                echo 'რაოდენობა: ( '.$row['list'].' )';
            }
            ?>
        </div>
        <div class="msgs">
            <?php echo $msgs;?>
        </div>
        <div class="msg">
            <?php echo $msg;?>
        </div>
        <div class="error">
            <?php include ('error.php')?>
        </div>
    </form>
</div>
<script>
    setTimeout(function() {
        $('.msg').slideToggle()
    }, 2000);

    setTimeout(function() {
        $('.error').slideToggle()
    }, 2000);
</script>
</body>
</html>