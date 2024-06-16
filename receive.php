<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 註冊接收端</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <?php
        echo "INSERT INTO users (username, account, password) VALUES ('$username', '$account', '$password')";
        $servername = "127.0.0.1";
        $username = "root";
        $password = "kennis0808";
        $dbname = "user_registration";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $account = $_POST['account'];
            $password = $_POST['password'];
        
            if (empty($username) || empty($account) || empty($password)) {
                die("Please fill in all fields.");
            }
        
            $stmt = $conn->prepare("INSERT INTO users (username, account, password) VALUES (?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
        
            $stmt->bind_param("sss", $username, $account, $password);
        
            if ($stmt->execute() === false) {
                die("Execute failed: " . $stmt->error);
            }
    
            $stmt->close();
            $conn->close();
            echo "<center><h2><i>註冊成功!</i></h2></center>";
            header("refresh:1;URL=login.php");
            exit();
        }
        else {
            die("Invalid request method.");
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