<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 管理員模式</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <header>
        <h1>評論系統</h1>
        <nav>
            <ul>
                <li><a href="home.php">首頁</a></li>
                <li><a href="personal.php">個人頁面</a></li>
                <?php
                    if($_SESSION["admin"]=="admin_ok"){
                        echo "<li><a href=\"admin.php\">管理員介面</a></li>";
                    }
                ?>
                <li><a href="assess.php">評論</a></li>
                <li><a href="show.php">歷史評論</a></li>
                <li><a href="contribute.php">投稿</a></li>
                <?php
                    if($_SESSION["check_status"]=="login_ok"){
                        echo "<li><a href=\"logout.php\">登出</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
    <form action="assess.php" method="get">
    <center> 
    <?php
        if($_SESSION["admin"]=="admin_ok"){
            echo "<h2>很空的管理者介面，暫時拿來放投稿的圖片</h2>";
            $handle=opendir("contribute_image");
            while ($file = readdir($handle)) 
            { 
                if ($file!="." and $file!="..") {
                    echo "<a href=\"contribute_image\\" .$file. "\"><img src=\"contribute_image\\".$file."\" width=\"15%\" height=\"15%\"></a><br>";
                }

            }
        }
        else{
            echo "<h2>你不是管理者，這頁不是你該看的</h2>";
        }
    ?>
    </center>    
    <footer>
        <center>
            <?php
                date_default_timezone_set('Asia/Taipei');
                $current_time = date('Y-m-d H:i:s');
            ?>
            <div class="clock" id="clock"></div>
            <script>
                function updateClock() {
                    var currentTime = new Date();
                    var year = currentTime.getFullYear();
                    var month = currentTime.getMonth();
                    var date = currentTime.getDate();
                    var hours = currentTime.getHours();
                    var minutes = currentTime.getMinutes();
                    var seconds = currentTime.getSeconds();

                    minutes = (minutes < 10 ? "0" : "") + minutes;
                    seconds = (seconds < 10 ? "0" : "") + seconds;

                    var formattedTime = year + "/" + (month + 1) + "/" + date + " " + hours + ":" + minutes + ":" + seconds;

                    var clockElement = document.getElementById('clock');
                    clockElement.innerHTML = formattedTime + " 動態網頁設計 - 評論系統";
                }
                setInterval(updateClock, 1000) 
            </script>
        </center>
    </footer>
</body>
</html>