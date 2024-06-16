<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 投稿</title>
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
        <h2 style="font-size: 48px;">投稿</h2>
		<table class="flex-container" border="0" width="70%">
			<tr>
                <td>
                    <?php
                        $handle=opendir("picture");
                        while($file = readdir($handle)){
                            if($file!="." and $file!=".." and $file!="show_all.php"){
                                echo "<img src=\"picture\\".$file."\" width=\"30%\" height=\"30%\" <br>";
                            }
                        }
                    ?>
                    <form method="post" action="contribute_receive.php" enctype="multipart/form-data">
			            <input type="file" name="upload_file">
			            <?php
                            if($_SESSION["check_status"]=="login_ok"){
                                echo "<input type=\"submit\" value=\"上傳圖片\">";
                            }
                            else{
                                echo "請先登入才可投稿";
                            }
                        ?>
		            </form>
                </td>
                <tr>
                    <td>
                        備註:
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="remark" cols="48" rows="18"></textarea>
                    </td>
                </tr>
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