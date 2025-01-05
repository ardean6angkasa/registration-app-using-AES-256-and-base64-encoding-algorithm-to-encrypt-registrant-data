<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIPS</title>
  <link rel="icon" type="image/x-icon" href="/img/logo1.png">
        <script src="https://kit.fontawesome.com/e88f737db2.js" crossorigin="anonymous"></script>
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles3.css" rel="stylesheet"/>
        <script src="/js/jquery-3.3.1.min.js"></script>
    <style type="text/css">
    	.preloader-single{
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
		    transform: translate(-50%,-50%);
		    font: 14px arial;
		}
		.preloader .loading p {
		    font-size: 16px;
		    font-weight: bold;
        }
        </style>
        <script>
  		$(document).ready(function(){
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
        <!-- Responsive navbar-->
       
      
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
       
       
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">
                            <a href="<?= base_url('/useracc/information'); ?>">
                            <button class="btn btn-outline-dark rounded-pill border-0">
        <i class="fas fa-arrow-left"></i>
        </button></a> <?= $help_info['title']; ?>
                        </h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?= date('F d, Y', $help_info['date_created']); ?> at <?= date('h:i A', $help_info['date_created']); ?> by <?= $help_info['author']; ?> <img class="img-thumbnail rounded-circle"
						src="/img/<?= $help_info['picture'] ?>" style="width:4%"></div>
                            <!-- Post categories-->
                         
                        </header>
                        <!-- Preview image figure-->
                        <div align="center">
                        <div style="max-height: 400px; overflow:hidden;">
                        <figure class="mb-4"><img class="img-fluid rounded" src="/picture/<?= $help_info['image']; ?>" /></figure>
                        </div>
                        </div>
                        <!-- Post content-->
                        <section class="mb-5">
                       
                                <p class="fs-5 mb-4"> <?= $help_info['category']; ?><?= $encrypter->decrypt(base64_decode($help_info['information'])); ?>
        </p>
                        
                        </section>
                    </article>
                    <!-- Comments section-->
                  
                </div>
                <!-- Side widgets-->
                </div>
        

     <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts3.js"></script>
    </body>
</html>