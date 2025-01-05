<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIPS</title>
    <link rel="icon" type="image/x-icon" href="/img/logo1.png">
    <link href="/css/styles2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

        @media print {

            .instruct,
            .steps,
            .searching,
            .glass,
            .arrow {
                display: none;
            }
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".preloader").fadeOut();

        })
    </script>
</head>

<body class="sb-nav-fixed">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
    </svg>
    <div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="instruct">How to download this document? follow these steps below.</h2>
                <h6 class='steps'>
                    1. Open the print menu on your browser,
                    <br>
                    2. Set destination: microsoft print to PDF,
                    <br>
                    3. Set orientation: landscape,
                    <br>
                    4. Set paper size: A3,
                    <br>
                    5. Set margins: default or custom it, if you wish,
                    <br>
                    6. Set options: print backgrounds,
                    <br>
                    and then click on the print button.
                </h6>
                <a href="<?= base_url('/serve'); ?>">
                    <button class="btn btn-outline-dark rounded-pill border-0 arrow">
                        <i class="fas fa-arrow-left"></i>
                    </button></a>
                <div align='right'>
                    <img src='/img/SIPS.png' class='img-thumbnail rounded-circle' style="width:7%">
                </div>

                <h1 align="center"><b>Customer Service</i></b></h1>
                <div align='right'>
                    <form action="<?= base_url('/read/form3'); ?>" method="post" class="col-sm-4">
                        <?= csrf_field(); ?>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light small searching"
                                placeholder="(Search keyword: email or role)" aria-label="Search"
                                aria-describedby="basic-addon2" name="keyword" value="<?= session()->get('keyword03') ?>"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark glass" type="submit" name="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <h6 style="color:black">
                    <i>Jaya Center for Advanced Learning</i><br>
                    Tangerang Selatan, Indonesia
                </h6>
                <hr>
                <div class="row">
                    <div align='center'>
                        <div class="table-responsive">
                            <table class="table table-hover table-dark table-sm">
                                <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Role</th>
                                        <th>Posted on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($customer_service as $row): ?>
                                        <tr align="center">
                                            <td scope="row"><?= $i++; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $encrypter->decrypt(base64_decode($row['phone_number'])); ?></td>
                                            <td><?= $encrypter->decrypt(base64_decode($row['message'])); ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td><?= date('F d, Y', $row['date_created']); ?> at
                                                <?= date('h:i A', $row['date_created']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div align="center">
                                <div class="col-sm-4">
                                    <?php if (empty($customer_service)): ?>
                                        <div class="alert alert-dark alert-dismissible d-flex align-items-center fade show"
                                            role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                                aria-label="Info:">
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
                        </div>
                    </div>
                </div>
        </main>
    </div>

    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>