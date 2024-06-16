<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 投稿圖片接收端</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <?php
		echo "<center>";
		if($_FILES["upload_file"]["type"]!="image/jpg"){
            if($_FILES["upload_file"]["type"]!="image/jpeg"){
                if($_FILES["upload_file"]["type"]!="image/webp"){
                    header("refresh:3;URL=contribute.php");
			        die("上傳檔案僅限 JPG / JPEG / WEBP 格式圖檔");
                }
            }
		}
		if($_FILES["upload_file"]["size"]>100000000){
			die("上傳大小必須小於100MB");
		}
		echo "檔案名稱:".$_FILES['upload_file']['name']."<br>";
		echo "檔案大小:".$_FILES['upload_file']['size']."<br>";
		echo "檔案格式:".$_FILES['upload_file']['type']."<br>";
		echo "檔案名稱:".$_FILES['upload_file']['tmp_name']."<br>";
		echo "檔案代碼:".$_FILES['upload_file']['error']."<br>";
		
		echo $_SERVER["PHP_SELF"]."<br>";
		echo $_SERVER["SCRIPT_FILENAME"."<br>"];
		echo __FILE__."<br>";
		echo dirname(__FILE__)."<br>";
		echo basename(__FILE__)."<br>";
		if(is_dir("contribute_image")){
			echo "contribute_image資料夾存在"."<br>";
            echo "<h2>投稿成功!</h2>";
            header("refresh:3;URL=contribute.php");
		}
		else{
			echo "contribute_image資料夾不存在"."<br>";
            echo "<h2>投稿失敗</h2>";
            header("refresh:3;URL=contribute.php");
		}
		if(is_uploaded_file($_FILES["upload_file"]["tmp_name"])){
			$dest_upload_file=dirname(__FILE__)."\\contribute_image\\".$_FILES["upload_file"]["name"];
			echo $dest_upload_file;
			move_uploaded_file($_FILES["upload_file"]["tmp_name"],$dest_upload_file);
		}
	?>
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