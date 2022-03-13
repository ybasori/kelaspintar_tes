<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="/assets/css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css" integrity="sha512-5ZQRy5L3cl4XTtZvjaJRucHRPKaKebtkvCWR/gbYdKH67km1e18C1huhdAc0wSnyMwZLiO7nEa534naJrH6R/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="phone-container change-photo">
        <div class="navbar">
            <div class="back-btn-wrapper">
                <img class="btn-back" onclick="window.location=document.referrer;" src="/assets/svg/mdi_arrow-left-circle.svg" />
            </div>
            <div class="title-page-wrapper">
                <h1>Ganti Photo Profil</h1>
            </div>
        </div>
        <div class="container-body">
            <div class="container">
                <div class="empty-display-photo">
                    <img id="previewImg" class="hide" />
                    <?= "<img src='/uploads/photo.jpg?" . date("s") . "' id=\"previewImg\" onerror=\"this.onerror=null; this.classList.add('hide'); this.src=''\" />"; ?>
                </div>
                <button class="btn mt-34" type="button" onclick="document.getElementById('browse-camera').click()">Ambil Dari kamera</button>
                <input type="file" class="hide" id="browse-camera" accept="image/*" capture="camera" />
                <button class="btn" type="button" onclick="document.getElementById('browse-file').click()">Ambil dari Gallery</button>
                <input type="file" class="hide" id="browse-file" accept="image/*" />
            </div>
        </div>
        <div class="footer">
            <button class="btn-footer" id="btn-upload" type="button" disabled="">Simpan</button>
        </div>
    </div>

    <div class="phone-container crop-photo hide">
        <div class="navbar">
            <div class="back-btn-wrapper">
                <img class="btn-back btn-back-crop-photo" src="/assets/svg/mdi_arrow-left-circle.svg" />
            </div>
            <div class="title-page-wrapper">
                <h1>Potong Gambar</h1>
            </div>
        </div>
        <div class="container-body">
            <div class="container h100p">
                <div class="empty-display-photo-2nd">
                    <img id="previewImg-crop-photo" class="hide" />
                </div>
                <button type="button" class="btn-crop-photo">Simpan</button>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" integrity="sha512-IlZV3863HqEgMeFLVllRjbNOoh8uVj0kgx0aYxgt4rdBABTZCl/h5MfshHD9BrnVs6Rs9yNN7kUQpzhcLkNmHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        (function() {
            var photo = "";
            var croppedPhoto = "";
            var croppedPhotoBlob;
            var photoName = "";
            var cropper;
            var extension = "";

            $("input[type=file]").on("change", function(e) {
                var file = $(this).get(0).files[0];

                if (file) {
                    photoName = file.name;
                    extension = file.name.split('.').pop().toLowerCase()
                    var reader = new FileReader();

                    reader.onload = function() {
                        photo = reader.result;
                        $("#previewImg-crop-photo").attr("src", reader.result);
                        $("#previewImg-crop-photo").removeClass("hide")
                        $(".crop-photo").removeClass("hide");
                        $(".change-photo").addClass("hide");

                        var image = document.getElementById('previewImg-crop-photo');
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                        });
                    }

                    reader.readAsDataURL(file);
                }
            });

            function onCloseCrop() {
                cropper.destroy();
                $("#previewImg-crop-photo").addClass("hide");
                $(".crop-photo").addClass("hide");
                $(".change-photo").removeClass("hide");
            }

            $(".btn-crop-photo").on("click", function() {
                if (cropper) {
                    var canvas = cropper.getCroppedCanvas({
                        width: 512,
                        height: 512
                    });

                    canvas.toBlob(function(blob) {
                        croppedPhotoBlob = blob;
                        var url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            croppedPhoto = reader.result;
                            $("#previewImg").remove();
                            $("#previewImg").attr("src", reader.result);
                            $("#previewImg").removeClass("hide");

                            $("#btn-upload").removeAttr("disabled");

                            onCloseCrop();
                        }
                    });
                }
            });
            $(".btn-back-crop-photo").on("click", onCloseCrop);
            $("#btn-upload").on("click", function() {

                var formData = new FormData();
                formData.append("file", croppedPhotoBlob, photoName);


                $.ajax({
                    url: '/change-photo',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: (res) => {
                        window.location = document.referrer;
                    },
                });
            });
        })();
    </script>
</body>

</html>