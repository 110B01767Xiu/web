<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 提交結果回傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <center>
        <?php
	        $check_assess_status=false;
            $_SESSION["check_assess_status"]="assess_ok";
            echo "提交成功, 3秒後跳轉至首頁";
            header("refresh:5;URL=home.php");
            $score=$_GET["star"] * $_GET["evaluation"] * 2;
            $word;
            if ($_GET["evaluation"] == 10) {
                $word="十分中肯可以當人生里程碑";
            }
            elseif ($_GET["evaluation"] == 9) {
                $word="蠻有道理的生活中很常去";
            }
            elseif ($_GET["evaluation"] == 8) {
                $word="普普通通沒啥感覺";
            }
            elseif ($_GET["evaluation"] == 7) {
                $word="沒啥邏輯但也一點點道理在";
            }
            elseif ($_GET["evaluation"] == 6) {
                $word="狗屁不通不知道哪個SB發明的";
            }
            $w=fopen("show.txt","a");
            fputs($w,"地點:".$_GET["location"].", "."推薦星數:".$_GET["star"].", "."評比:".$word.", "."評論內容:".$_GET['remark'].", "."綜合評分:".$score."\r\n");
            fclose($w);
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