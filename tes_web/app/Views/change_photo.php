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
                <img class="btn-back" onclick="history.back()" src="/assets/svg/mdi_arrow-left-circle.svg" />
            </div>
            <div class="title-page-wrapper">
                <h1>Ganti Photo Profil</h1>
            </div>
        </div>
        <div class="container-body">
            <div class="container">
                <div class="empty-display-photo">
                    <img id="previewImg" class="hide" />
                </div>
                <button class="btn mt-34" type="button" onclick="document.getElementById('browse-camera').click()">Ambil Dari kamera</button>
                <input type="file" class="hide" id="browse-camera" accept="image/*" capture="camera" />
                <button class="btn" type="button" onclick="document.getElementById('browse-file').click()">Ambil dari Gallery</button>
                <input type="file" class="hide" id="browse-file" accept="image/*" />
            </div>
        </div>
        <div class="footer">
            <button class="btn-footer" type="button" disabled="">Simpan</button>
        </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        (function() {
            $("input[type=file]").on("change", function(e) {
                var file = $(this).get(0).files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function() {
                        $("#previewImg").attr("src", reader.result);
                        $("#previewImg").removeClass("hide")
                    }

                    reader.readAsDataURL(file);
                }
            });
        })();
    </script>
</body>

</html>