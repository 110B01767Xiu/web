<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 評論</title>
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
    <center>
        <h2 style="font-size: 48px;">評論</h2>
        <table>
        <a href="assess.php?table_color=red"><img src="image/red.png"></a>&nbsp;&nbsp;
        <a href="assess.php?table_color=green"><img src="image/green.png"></a>&nbsp;&nbsp;
        <a href="assess.php?table_color=blue"><img src="image/blue.png"></a>&nbsp;&nbsp;
        <form action="assess_receive.php" method="get">
        <?php
            if($_GET['table_color']=="red"){
                $table_color = "red";
            }
            elseif($_GET['table_color']=="green"){
                $table_color = "green";
            }
            elseif($_GET['table_color']=="blue"){
                $table_color = "blue";
            }
            echo "<font size=\"+1\"><font color=$table_color><b><i>表格框線顏色</i></b></font></font>";
            echo "<table border=\"1\" bordercolor= $table_color>";
        ?>
        <tr><td>地點</td><td><input type = "text" name = "location"></input><font color="#DC1B1E">*</font></td></tr>
        <tr>
            <td>推薦星數</td>
            <td>
                <input type = "radio" name = "star" value="1" checked>1星</input>
                <input type = "radio" name = "star" value="2">2星</input>
                <input type = "radio" name = "star" value="3">3星</input>
                <input type = "radio" name = "star" value="4">4星</input>
                <input type = "radio" name = "star" value="5">5星</input>
            </td>
        </tr>
        <tr>
            <td>評比</td>
            <td>
                <select name = "evaluation">
                    <option value="10">十分中肯可以當人生里程碑</option>
                    <option value="9">蠻有道理的生活中很常去</option>
                    <option value="8">普普通通沒啥感覺</option>
                    <option value="7">沒啥邏輯但也一點點道理在</option>
                    <option value="6">狗屁不通不知道哪個SB發明的</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    評論內容
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <textarea name="remark" cols="48" rows="18"></textarea>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <?php
                        if($_SESSION["check_status"]=="login_ok"){
                            echo "<Button Type=\"Submit\">提交</Button>";
                        }
                        else{
                            echo "請先登入才可評論";
                        }
                    ?>
                </center>
            </td>
        </tr>
    </table>
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