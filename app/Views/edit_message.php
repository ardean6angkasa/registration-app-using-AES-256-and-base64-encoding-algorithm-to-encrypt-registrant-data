<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPS</title>
    <link rel="icon" type="image/x-icon" href="/img/logo1.png">

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/e88f737db2.js" crossorigin="anonymous"></script>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <style type="text/css">
        .preloader-single {
            background: #fff;
            width: 100%;
            height: 350px;
            padding: 20px;
        }

        .preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

        .preloader .loading p {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".preloader").fadeOut();

        })
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("InputForPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }
    </script>
</head>

<body style="background-color:#163257;">
    <div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="container">

                                <br>
                                <a href="<?= base_url('/useracc'); ?>">
                                    <button class="btn btn-outline-dark rounded-pill border-0">
                                        <i class="fas fa-arrow-left"></i>
                                    </button>
                                </a>
                                <form action="<?= base_url('/useracc/update'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="token" value="<?= $messaging['token']; ?>">
                                    <div class="form-group">
                                        <label for="desc" style="color:black">Edit my message</label>
                                        <?php if (isset($validation)): ?>
                                            <div class="text-danger"> <?= $validation->getError('message'); ?></div>
                                        <?php endif; ?>
                                        <input id="desc" type="hidden" name="message"
                                            value="<?= (old('message')) ? old('message') : $encrypter->decrypt(base64_decode($messaging['message'])); ?>">
                                        <trix-editor input="desc" style="color:black"></trix-editor>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary rounded-pill">Update</button>

                                </form>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();

        })
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>