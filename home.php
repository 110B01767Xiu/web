<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論系統 - 首頁</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }
    
        body {
            background-image: url(image/bg.jpg);
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        }
    
        .swiper {
            width: 100%;
            height: 70%;
        }
    
        .swiper-slide {
            text-align: center;
            font-size: 64px;
            background: #fff;
            color: #977C00;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 600px;
            object-fit: cover;
        }
    </style>
</head>
<body>
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
    <center><h2 style="font-size: 48px;">首頁</h2></center>
    <marquee bgcolor = #FFE66F scrollamount = "10" behavior = "alternate" style="font-size: 24px; color:#977C00">預覽圖</marquee>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="https://www.cjcu.edu.tw/" target="blank" title="長榮大學 - 點擊圖片可以開啟【長榮大學】相關網頁(另外開啟新分頁)">
                    <img src="image/cjcu.jpg" alt="長榮大學">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.taipei-101.com.tw/tw/" target="blank" title="台北101 - 點擊圖片可以開啟【台北101】相關網頁(另外開啟新分頁)">
                    <img src="image/101.jpg" alt="台北101">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.discoverhongkong.com/tc/explore/attractions/best-ways-to-marvel-at-iconic-victoria-harbour.html" target="blank" title="香港 維多利亞港 - 點擊圖片可以開啟【香港 維多利亞港】相關網頁(另外開啟新分頁)">
                    <img src="image/hongkong.jpg" alt="香港 維多利亞港">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.google.com/maps/place/320%E6%A1%83%E5%9C%92%E5%B8%82%E4%B8%AD%E5%A3%A2%E5%8D%80%E9%BE%8D%E5%B7%9D%E4%BA%8C%E8%A1%97134%E8%99%9F/@24.937238,121.2482266,3a,75y,33.43h,90.42t/data=!3m7!1e1!3m5!1sjOVeCPcMsa7Mb-hBsseg5A!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fpanoid%3DjOVeCPcMsa7Mb-hBsseg5A%26cb_client%3Dmaps_sv.share%26w%3D900%26h%3D600%26yaw%3D33.43004143062386%26pitch%3D-0.41825623665970113%26thumbfov%3D90!7i16384!8i8192!4m15!1m8!3m7!1s0x34682264588f99e3:0x37ba2e3745660510!2zMzIw5qGD5ZyS5biC5Lit5aOi5Y2A6b6N5bed5LqM6KGXMTM06Jmf!3b1!8m2!3d24.9374333!4d121.2482643!16s%2Fg%2F11c21kyhvp!3m5!1s0x34682264588f99e3:0x37ba2e3745660510!8m2!3d24.9374333!4d121.2482643!16s%2Fg%2F11c21kyhvp?coh=205410&entry=ttu" target="blank" title="霸主樹屋 - 點擊圖片可以開啟【霸主樹屋】相關網頁(另外開啟新分頁)">
                    <img src="image/tree.jpg" alt="霸主樹屋">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.google.com/maps/@25.1708744,121.6762048,3a,75y,280.43h,70.18t/data=!3m7!1e1!3m5!1s49hdFKK5IRQZ_Ye55h2u_Q!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fpanoid%3D49hdFKK5IRQZ_Ye55h2u_Q%26cb_client%3Dmaps_sv.share%26w%3D900%26h%3D600%26yaw%3D280.4308965747753%26pitch%3D19.822605229733924%26thumbfov%3D90!7i13312!8i6656?coh=205410&entry=ttu" target="blank" title="賴皮寮 - 點擊圖片可以開啟【賴皮寮】相關網頁(另外開啟新分頁)">
                    <img src="image/green.webp" alt="賴皮寮">
                </a>
            </div>
            <div class="swiper-slide">待投稿...</div>
            <div class="swiper-slide">待投稿...</div>
            <div class="swiper-slide">待投稿...</div>
            <div class="swiper-slide">待投稿...</div>
            <div class="swiper-slide">待投稿...</div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
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