<?php
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "kennis0808";
    $dbname = "user_registration";
    $conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 登入結果回傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <center>
        <?php
	        $check_status=false;
            $admin=false;
            $_SESSION["check_status"]="login_not_ok";
            $_SESSION["admin"]="admin_not_ok";
            //echo "檢查:".$_SESSION["check_status"];
            $account = $_POST['account'];
            $password = $_POST['password'];
            $stmt = $conn->prepare("SELECT id, username FROM users WHERE account = ? AND password = ?");
            $stmt->bind_param("ss", $account, $password);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $username);
                $stmt->fetch();
                
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION["check_status"]="login_ok";
                $_SESSION["name"]=$_POST['account'];
                //echo "檢查:".$_SESSION["check_status"];
                echo "<h2><i>歡迎   ".$_SESSION["username"]."<br>"."   成功登入, 5秒後跳轉至首頁</i></h2>";
                header("refresh:5;URL=home.php");
            }
            elseif ($_POST['account']=="admin_account" and $_POST['password']=="admin_password") {
                //$check_status=true;
                $_SESSION["check_status"]="login_ok";
                $_SESSION["admin"]="admin_ok";
                $_SESSION['user_id'] = 0;
                $_SESSION["name"]=$_POST['account'];
                $_SESSION["username"]="東太平洋漁場時價分析師兼操盤手暨洋流講師海龍王 彼得";
                echo "<h2><i>歡迎   ".$_SESSION["username"]."<br>"."   成功登入, 5秒後跳轉至首頁</i></h2>";
                header("refresh:5;URL=admin.php");
            }
            else {
                echo "<h2><i>帳號或密碼錯誤，請重新輸入。</i></h2>";
                header("refresh:3;URL=login.php");
            }
            $stmt->close();
            $conn->close();
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