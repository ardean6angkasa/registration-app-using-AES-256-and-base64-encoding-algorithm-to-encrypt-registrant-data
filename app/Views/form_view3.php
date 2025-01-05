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
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles3.css" rel="stylesheet" />
    <script src="/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
</head>

<body>
    <div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">


            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
                    <h1 class="fw-bolder mb-1">
                        <a href="<?= base_url('/addons'); ?>">
                            <button class="btn btn-outline-dark rounded-pill border-0">
                                <i class="fas fa-arrow-left"></i>
                            </button></a> <?= $help_info['title']; ?>
                        <button class="btn btn-outline-primary border-0 rounded-pill" data-toggle="modal"
                            data-target="#addModal" type="button">
                            <i class="fas fa-edit d-inline fa-lg"></i>
                        </button>
                    </h1>
                    <div class="text-muted fst-italic mb-2">Posted on <?= date('F d, Y', $help_info['date_created']); ?>
                        at <?= date('h:i A', $help_info['date_created']); ?> by <?= $help_info['author']; ?> <img
                            class="img-thumbnail rounded-circle" src="/img/<?= $help_info['picture'] ?>"
                            style="width:4%"></div>
                </header>
                <div align="center">
                    <div style="max-height: 400px; overflow:hidden;">
                        <figure class="mb-4"><img class="img-fluid rounded"
                                src="/picture/<?= $help_info['image']; ?>" /></figure>
                    </div>
                </div>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"> <?= $help_info['category']; ?>
                        <?= $encrypter->decrypt(base64_decode($help_info['information'])); ?>
                    </p>
                </section>
            </article>
        </div>
    </div>




    <form action="<?= base_url('/addons/update'); ?>" enctype="multipart/form-data" method="POST">
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Edit a data</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $help_info['id']; ?>">
                        <div class="form-group" align="center">
                            <img src="/picture/<?= $help_info['image']; ?>" class='img-thumbnail img-preview'
                                style='width:24%'>
                            <br> <br>
                            <div class="custom-file">
                                <input type="file" id="file" name="file" class="custom-file-input <?php if (isset($validation)): ?>
      <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?php if (isset($validation)): ?>
                                        <?= $validation->getError('file'); ?>
                                    <?php endif; ?>
                                </div>
                                <label class="custom-file-label" for="file"
                                    style="color:black"><?= $help_info['image']; ?></label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" style="color:black" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('title2')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" name="title2" value="<?= (old('title2')) ? old('title2') : $help_info['title']; ?>"
                                placeholder="">
                            <label style="color:black">Title</label>
                            <div class="invalid-feedback">
                                <?php if (isset($validation)): ?>
                                    <?= $validation->getError('title2'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select style="color:black" class="form-select <?php if (isset($validation)): ?>
            <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" name="category">
                                <option selected value="">Open this select menu</option>
                                <option value="Help Center" style="color:black" <?= $help_info['category'] == 'Help Center' ? "selected" : "" ?>>Help Center</option>
                                <option value="Information" style="color:black" <?= $help_info['category'] == 'Information' ? "selected" : "" ?>>Information</option>
                            </select>
                            <label style="color:black">Category</label>
                            <div class="invalid-feedback">
                                <?php if (isset($validation)): ?>
                                    <?= $validation->getError('category'); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inf" style="color:black">Information</label>
                            <?php if (isset($validation)): ?>
                                <div class="text-danger"><?= $validation->getError('information'); ?></div>
                            <?php endif; ?>
                            <input id="inf" type="hidden" name="information"
                                value="<?= (old('information')) ? old('information') : $encrypter->decrypt(base64_decode($help_info['information'])); ?>">
                            <trix-editor input="inf" style="color:black"></trix-editor>
                        </div>



                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="auth" value="<?= $help_info['author']; ?>"
                                readonly>
                            <label style="color:black">Author</label>
                        </div>

                        <input type="hidden" class="form-control" name="title" value="<?= $help_info['title']; ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger rounded-pill" data-toggle="modal"
                            data-dismiss="modal" data-target="#deleteModal"><i class="fas fa-trash-alt d-inline"></i>
                            Delete</button>
                        <button type="submit" class="btn btn-outline-primary rounded-pill">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?= base_url('/addons/delete'); ?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3" style="color:black">Delete a data</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:black">Are you sure, you want to delete this permanently?</p>

                        <input type="text" style="color:black" class="form-control" value="<?= $help_info['title']; ?>"
                            readonly>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $help_info['id']; ?>">
                        <button class="btn btn-outline-dark rounded-pill" data-target="#addModal" data-toggle="modal"
                            data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary rounded-pill">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();

        })
    </script>
    <script>
        function previewImg() {
            const file = document.querySelector('#file');
            const prevFile = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            prevFile.textContent = file.files[0].name;

            const filePict = new FileReader();
            filePict.readAsDataURL(file.files[0]);

            filePict.onload = function (e) {
                imgPreview.src = e.target.result;
            }

        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/myscript.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts3.js"></script>
</body>

</html>