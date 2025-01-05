<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIPS</title>
    <link rel="icon" type="image/x-icon" href="/img/logo1.png">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

    <script src="https://kit.fontawesome.com/e88f737db2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
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
        function myFunction2() {
            var x = document.getElementById("InputForPassword2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }
    </script>

</head>

<body id="page-top">
    <div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
    </svg>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/useracc'); ?>"><em style="color:white">SIPS</em></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" style="color:#f1c101"
                            href="<?= base_url('/useracc/information'); ?>">Information</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->









    <!-- Services-->

    <section class="page-section bg-dark">

        <div class="container">
            <div class="text-center my-5">
                <h1 class="section-heading fw-bolder" data-aos="fade-down" data-aos-easing="linear"
                    data-aos-duration="4000" style="color:white">Help Center & Information</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->

                    <div align="right">
                        <div class="col-sm-5">
                            <?php if (empty($help_info)): ?>

                                <div class="alert alert-dark alert-dismissible d-flex align-items-center fade show"
                                    data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                        <use xlink:href="#info-fill" />
                                    </svg>
                                    <div>
                                        Data not found!
                                        <button type="button" class="btn-close" data-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php foreach ($help_info as $row): ?>
                        <div class="card mb-4" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="4000">
                            <div style="max-height: 350px; overflow:hidden;">

                                <img class="card-img-top" src="/picture/<?= $row['image']; ?>">
                                >
                            </div>
                            <div class="card-body">
                                <div class="small text-muted">Posted on <?= date('F d, Y', $row['date_created']); ?> by <b
                                        style="color:#ffb900"><?= $row['author']; ?></b></div>
                                <h2 class="card-title"><?= $row['title']; ?></h2>
                                <p class="card-text">
                                    <?= $row['category']; ?><br><?= (strip_tags(word_limiter($encrypter->decrypt(base64_decode($row['information'], 30))))); ?>
                                </p>
                                <a href="<?= base_url('/read/index5/' . $row['id']); ?>"
                                    class="btn btn-outline-dark rounded-pill">Read More →</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <!-- Blog Post -->


                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4" data-aos="fade-down" data-aos-easing="linear"
                        data-aos-duration="2000">
                        <li class="page-item">
                            <?= $pager->links('help_info', 'default_full'); ?>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="4000">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="<?= base_url('/useracc/information'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        placeholder="(Search keyword: category or title)" name="keyword"
                                        value="<?= session()->get('keyword10') ?>" autocomplete="off">
                                    <button class="btn btn-outline-dark" type="submit" name="search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <!-- Portfolio Grid-->



    <!-- Footer-->
    <footer class="footer py-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; SIPS 2021</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/upj_bintaro"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/jcal.upj.9"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/jcal.upj"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>


    </div>

    <!-- Bootstrap core JS-->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>