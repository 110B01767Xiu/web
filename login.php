<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 登入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="image/bg.jpg">
    <header>
        <h1>評論系統</h1>
        <nav>
            <ul>
                <li><a href="home.php">首頁</a></li>
                <li><a href="personal.php">個人頁面</a></li>
                <li><a href="assess.php">評論</a></li>
                <li><a href="show.php">歷史評論</a></li>
                <li><a href="contribute.php">投稿</a></li>
                <li><a href="sign_up.php">註冊</a></li>
            </ul>
        </nav>
    </header>
    <center>
        <div class="flex-container">
            <table class="center-table" border="1" width="40%">
                <tr>
                    <td>
                        <center>
                            <h2 style="font-size: 48px;">登入</h2>
                        </center>
                        <form action="check.php" method="post">
                            <center>
                                <table class="center-table" border="0">
                                    <tr>
                                        <td>
                                            <center>
                                                帳號
                                            </center>
                                        </td>
                                        <td>
                                            <input type = "text" name = "account"></input><font color="#DC1B1E">*</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                密碼
                                            </center>
                                        </td>
                                        <td>
                                            <input type = "text" name = "password"></input><font color="#DC1B1E">*</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <center>
                                                <button type="Submit">登入</button>
                                            </center>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
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
