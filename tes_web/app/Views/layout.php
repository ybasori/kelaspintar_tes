<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
    <div class="phone-container">
        <div class="navbar">
            <div class="back-btn-wrapper">
                <img class="btn-back" onclick="window.location=document.referrer;" src="/assets/svg/mdi_arrow-left-circle.svg" />
            </div>
            <div class="title-page-wrapper">
                <h1>Profile</h1>
            </div>
        </div>
        <div class="container-body">
            <div class="container">
                <div class="user-detail">
                    <div class="empty-photo" onclick="window.location.href='/change-photo'">
                        <?= "<img src='/uploads/photo.jpg?" . date("s") . "' class='photo-profile' onerror=\"this.onerror=null; this.classList.remove('photo-profile'); this.src='/assets/svg/akar-icons_camera.svg'\" />"; ?>
                    </div>
                    <div class="user-summary">
                        <div class="user-name">John Doe</div>
                        <div class="user-classroom">Kelas 10 IPA 8</div>
                    </div>
                </div>
                <div class="empty-content"></div>
                <div class="empty-content"></div>
                <div class="empty-content"></div>
                <div class="empty-content"></div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
</body>

</html>