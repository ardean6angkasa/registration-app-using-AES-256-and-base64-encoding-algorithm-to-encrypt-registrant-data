<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPS</title>
  <link rel="icon" type="image/x-icon" href="/img/logo1.png">
  <!-- Bootstrap Core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/e88f737db2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
      trix-toolbar [data-trix-button-group='file-tools']{
          display:none;
      }
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="/css/stylish-portfolio.min.css" rel="stylesheet">
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

<body id="page-top">
<div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
</svg>
  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#help_center">Help Center & Information</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#register">Registration</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#signin">Sign In</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact Us</a>
      </li>
    </ul>
  </nav>

 
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
       
        
      <h1 class="mb-1" style="color: #FFB900" data-aos="flip-down"
    data-aos-easing="linear"
     data-aos-duration="4000">SIPS</h1>
  
      <h3 class="mb-5" style="color: #FFB900" data-aos="flip-down"
    data-aos-easing="linear"
     data-aos-duration="4000">
        <em>Sistem Informasi Pelatihan & Sertifikasi</em>
      </h3>

      <a class="btn btn-outline-warning btn-xl js-scroll-trigger rounded-pill" href="#register" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">Registrasi Sekarang</a>
    </div>
    <div class="overlay"></div>
  </header>

  <section class="content-section bg-warning text-black" id="help_center">
  <div class="container">
  <div class="text-center my-5">
                    <h1 class="section-heading fw-bolder" data-aos="fade-down"
                data-aos-easing="linear"
     data-aos-duration="4000" style="color:white">Help Center & Information</h1>
                </div>
                </div>
       
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
<div align="right">
  <div class="col-sm-5">
<?php if(empty($help_info)):?>

        <div class="alert alert-dark alert-dismissible d-flex align-items-center fade show" data-aos="fade-down"
                data-aos-easing="linear"
     data-aos-duration="2000" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                    <div>
                                   Data not found!
                                     <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                     </div>
                                    </div>
                                    <?php endif;?>
                                    </div>
                                    </div>       
                <?php foreach($help_info as $row):?>
                <div class="card mb-4" data-aos="fade-down"
                data-aos-easing="linear"
     data-aos-duration="4000">
     <div style="max-height: 350px; overflow:hidden;">
                <img class="card-img-top" src="/picture/<?= $row['image'];?>">
                </div> 
                <div class="card-body">
          <div class="small text-muted">Posted on <?= date('F d, Y', $row['date_created']);?> by <b style="color:#ffb900"><?= $row['author']; ?></b></div>
            <h2 class="card-title"><?= $row['title'];?></h2>
            <p class="card-text"><?= $row['category'];?><br><?= (strip_tags(word_limiter($encrypter->decrypt(base64_decode($row['information'], 30)))));?></p>
            <a href="<?= base_url('/read/index4/' . $row['id']); ?>" class="btn btn-outline-dark rounded-pill">Read More →</a>
          </div>
          </div>
   
        <?php endforeach;?>
        <!-- Blog Post -->
   

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4" data-aos="fade-down"
                data-aos-easing="linear"
     data-aos-duration="2000">
        <li class="page-item">
        <?= $pager->links('help_info', 'default_full');?>
                </li> 
      </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-lg-4">
        <div class="card mb-4" data-aos="fade-down"
                data-aos-easing="linear"
     data-aos-duration="4000">
     <div class="card-header">Search</div>
          <div class="card-body">
          <form action="<?= base_url('/login'); ?>" method="post">
            <div class="input-group">   
            <?= csrf_field();?>
            <input type="text" class="form-control" placeholder="(Search keyword: category or title)" name="keyword" value="<?= session()->get('keyword2')?>" autocomplete="off">
            
                            </div>
                            <br>  
                            <div align="center">
                                <button class="btn btn-outline-dark rounded-pill" type="submit" name="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </form>
            </div>
          </div>
        </div>
        </div>
      

      </div>

    </div>
    <!-- /.row -->

  </div>
  </section>
  <section class="content-section bg-dark" id="register">
  <div class="container">
  <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
  <h2 class="mx-auto mb-5" align="center" data-aos="fade-down"
     data-aos-duration="4000" data-aos-easing="linear" style="color:white">
        Registrasi Pendaftaran Pelatihan <br>untuk <br> <em>Persiapan ataupun Ujian Sertifikasi</em>
      </h2>
     
                                    
                                    <div align="center">
                                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                        <button type="button" class="btn btn-outline-light mb-2 rounded-pill btn-xl" data-toggle="modal" data-target="#addModal" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">Test of English for International Communication</button>
     </div>
     <div class="col-md-6">
                        <button type="button" class="btn btn-outline-light mb-2 rounded-pill btn-xl" data-toggle="modal" data-target="#addModal2" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">Pelatihan/Sertifikasi Lainnya</button>
     </div>
     </div>
      </div>
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pendaftaran TOEIC</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
      <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                   
                                    <form action="<?= base_url('/registration/save'); ?>" enctype="multipart/form-data" method="POST">
                        <?= csrf_field();?>
                        
                        <div class="form-group" align="center">
     <img src="/img/default.png" class='img-thumbnail img-preview' style='width:24%'>
  <br>  <br>
     <div class="custom-file">
      <input type="file" id="file" name="file" class="custom-file-input <?php if(isset($validation)):?>
      <?= ($validation->hasError('file'))?'is-invalid' : ''; ?>
      <?php endif;?>" onchange="previewImg()">
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('file');?>
      <?php endif;?>
      </div>
<label class="custom-file-label" for="file">Pas foto Anda</label>
      </div>
      </div>
      <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('id_number'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="id_number" placeholder="" value="<?= old('id_number'); ?>">
            <label>Nomor identitas Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('id_number');?>
            <?php endif;?>
            </div>
                </div>
      <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('nama'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="nama" placeholder="" value="<?= old('nama'); ?>">
            <label>Nama lengkap Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('nama');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('tanggal_lahir'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="tanggal_lahir" placeholder="" value="<?= old('tanggal_lahir'); ?>">
            <label>Tanggal lahir Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('tanggal_lahir');?>
            <?php endif;?>
            </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="tel" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('nomor_telepon'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="nomor_telepon" placeholder="" value="<?= old('nomor_telepon'); ?>">
            <label>Nomor telepon Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('nomor_telepon');?>
            <?php endif;?>
            </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email3'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="email3" placeholder="" value="<?= old('email3'); ?>">
            <label>Email Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email3');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('program_studi'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="program_studi" placeholder="" value="<?= old('program_studi'); ?>">
            <label>Program studi Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('program_studi');?>
            <?php endif;?>
            </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group" align=center>
                    <img src="/img/default.png" class='img-thumbnail img-preview2' style='width:24%'>
  <br>  <br>
  <div class="custom-file">
      <input type="file" id="file2" name="pict" class="custom-file-input <?php if(isset($validation)):?>
      <?= ($validation->hasError('pict'))?'is-invalid' : ''; ?>
      <?php endif;?>" onchange="previewImg2()">
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('pict');?>
      <?php endif;?>
      </div>
<label class="custom-file-label text-preview2" for="file2">Struk Pembayaran Anda</label>
      </div>
    </div>
    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('account'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="account" placeholder="" value="<?= old('account'); ?>">
            <label>Nama pentransfer di rekening?</labe>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('account');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('bank_name'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="bank_name" placeholder="" value="<?= old('bank_name'); ?>">
            <label>Transfer melalui bank?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('bank_name');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="date" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('transaction'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="transaction" value="<?= old('transaction'); ?>">
            <label>Tanggal transfer</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('transaction');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('nominal'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="nominal" placeholder="" value="<?= old('nominal'); ?>">
            <label>Nominal transfer?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('nominal');?>
            <?php endif;?>
            </div>
                </div>

                    </div>
               
    </div>
    </div>
    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-dark rounded-pill"><i class="fas fa-paper-plane fa-lg"></i> Submit</button>
                        </form>
                    </div>
                    </div>
  </div>
</div>
<div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Pendaftaran Pelatihan Persiapan atau Ujian Sertifikasi Lainnya</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
      <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                   
                                    <form action="<?= base_url('/registration/save2'); ?>" enctype="multipart/form-data" method="POST">
                        <?= csrf_field();?>
                        <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('id_number2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="id_number2" placeholder="" value="<?= old('id_number2'); ?>">
            <label>Nomor identitas Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('id_number2');?>
            <?php endif;?>
            </div>
                </div>
                        <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('nama2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="nama2" placeholder="" value="<?= old('nama2'); ?>">
            <label>Nama lengkap Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('nama2');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('instansi'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="instansi" placeholder="" value="<?= old('instansi'); ?>">
            <label>Nama instansi?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('instansi');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('pekerjaan'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="pekerjaan" placeholder="" value="<?= old('pekerjaan'); ?>">
            <label>Pekerjaan Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('pekerjaan');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('prodi'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="prodi" placeholder="" value="<?= old('prodi'); ?>">
            <label>Program studi Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('prodi');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('telepon'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="telepon" placeholder="" value="<?= old('telepon'); ?>">
            <label>Nomor telepon Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('telepon');?>
            <?php endif;?>
            </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email4'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="email4" placeholder="" value="<?= old('email4'); ?>">
            <label>Email Anda?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email4');?>
            <?php endif;?>
            </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group" align=center>
                    <img src="/img/default.png" class='img-thumbnail img-preview3' style='width:24%'>
  <br>  <br>
  <div class="custom-file">
      <input type="file" id="file3" name="pict2" class="custom-file-input <?php if(isset($validation)):?>
      <?= ($validation->hasError('pict2'))?'is-invalid' : ''; ?>
      <?php endif;?>" onchange="previewImg3()">
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('pict2');?>
      <?php endif;?>
      </div>
<label class="custom-file-label text-preview3" for="file3"><p>Struk Pembayaran Anda</p></label>
      </div>
    </div>
    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('account2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="account2" placeholder="" value="<?= old('account2'); ?>">
            <label>Nama pentransfer di rekening?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('account2');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('bank_name2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="bank_name2" placeholder="" value="<?= old('bank_name2'); ?>">
            <label>Transfer melalui bank?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('bank_name2');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="date" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('transaction2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="transaction2" value="<?= old('transaction2'); ?>">
            <label>Tanggal transfer</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('transaction2');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('nominal2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="nominal2" placeholder="" value="<?= old('nominal2'); ?>">
            <label>Nominal transfer?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('nominal2');?>
            <?php endif;?>
            </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('inform2'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="inform2" placeholder="" value="<?= old('inform2'); ?>">
            <label>Nama pelatihan/sertifikasi?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('inform2');?>
            <?php endif;?>
            </div>
                </div>

                    </div>
               
    </div>
    </div>
    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-dark rounded-pill"><i class="fas fa-paper-plane fa-lg"></i> Submit</button>
                        </form>
                    </div>
                    </div>
  </div>
</div>
</div>
  </section>

  <!-- Services -->
  
  
   <!-- Callout -->


  <section class="content-section bg-light" id="signin">
    <div class="container">
      <div class="content-section-heading text-center" data-aos="flip-down"  data-aos-duration="4000" data-aos-easing="linear">
        <h3 class="text-secondary mb-0">Already Have an Account?</h3>
        <h2 class="mb-5">Sign In Here</h2>
      </div>
      <div align="center">
        <div class="col-lg-6"  >
          <div class="portfolio-item" data-aos="fade-down"  data-aos-duration="4000" data-aos-easing="linear">
          <a class="portfolio-link" data-toggle="modal" href="#" data-target="#portfolioModal">
                              
                              
                                <img class="img-fluid" src="/img/RA.jpg" alt="" >
                                <div class="caption">
              <div class="caption-content"  align="center" data-aos="zoom-out-down"  data-aos-duration="4000" data-aos-easing="linear">
                <div class="h2">Welcome Back!!!!</div>
                <p class="mb-0">Sign In! To Access The Dashboard</p>
             
            </div>
            </div>
          </a>
                            </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="content-section bg-primary text-white" id="contact" align="center" style="background-image: url('/img/mapimage.png');">
  <div class="col-lg-8 mx-auto">
  <div class="container">
  
                <div class="text-center" data-aos="flip-left"
                data-aos-easing="linear"
     data-aos-duration="4000">
                    <h2 class="section-heading">Customer Service</h2>
                    <h3 class="section-subheading" style="color: black">Need Help?</h3>
                </div>
  
  <form action="<?= base_url('/serve/save'); ?>" method="POST">
  <?= csrf_field();?>
                    <div class="row align-items-stretch mb-5" data-aos="flip-left"
                    data-aos-easing="linear"
     data-aos-duration="4000">
                        <div class="col-md-6">
                        <div class="form-floating mb-3 rounded" style="background-color:white">
                        <input type="text" name="name" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('name'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="" value="<?= old('name'); ?>">
            <label class="form-label" style="color:black">Your name?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('name');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3 rounded" style="background-color:white">
                        <input type="email" name="email5" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email5'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="" value="<?= old('email5'); ?>">
            <label class="form-label" style="color:black">Your email?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email5');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3 rounded" style="background-color:white">
                            <input type="tel" name="phone_number" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('phone_number'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="" value="<?= old('phone_number'); ?>">
            <label class="form-label" style="color:black">Your phone number?</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('phone_number');?>
            <?php endif;?>
            </div>
                            </div>
                        </div>
                        <div class="col-md-6 rounded" style="background-color:white">
                        <div class="form-group">
                    <label for="desc" style="color:black">Message</label>
                    <?php if(isset($validation)):?>
                    <div class="text-danger"> <?=$validation->getError('message');?></div>
                <?php endif;?>
                    <input id="desc" type="hidden" name="message" value="<?= old('message'); ?>">
                    <trix-editor input="desc" style="color:black"></trix-editor>
                </div>
                    </div>
              
                    <div class="text-center">
                    <br>
                        <button class="btn btn-outline-light rounded-pill btn-xl" type="submit" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000"><i class="fas fa-paper-plane fa-lg" ></i> Send Message</button>
     </form>
                    </div>
                </div>
  </section>

  <!-- Map -->
  <div class="map" data-aos="fade-down"
     data-aos-duration="4000" data-aos-easing="linear">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.781438310159!2d106.72326231476957!3d-6.292430295445794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f007dedc7de1%3A0x70288cde58f42a97!2sUniversitas%20Pembangunan%20Jaya!5e0!3m2!1sen!2sid!4v1620091574130!5m2!1sen!2sid"></iframe>
    <br>
    <small>
      <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.781438310159!2d106.72326231476957!3d-6.292430295445794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f007dedc7de1%3A0x70288cde58f42a97!2sUniversitas%20Pembangunan%20Jaya!5e0!3m2!1sen!2sid!4v1620091574130!5m2!1sen!2sid"></a>
    </small>
  </div>

  <!-- Footer -->
  <footer class="footer text-center bg-light" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">
    <div class="container">
      <ul class="list-inline mb-5">
      <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/jcal.upj.9"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/upj_bintaro"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="https://www.instagram.com/jcal.upj"><i class="fab fa-instagram"></i></a>
                    </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; SIPS 2021</p>
    </div>
  </footer>
  
  <div class="modal fade" id="portfolioModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div align="right" class="container">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-header">
                    <h5 class="modal-title"  id="exampleModalToggleLabel">Sign In</h5>
                                    <img class="img-fluid d-block mx-auto" data-tilt data-tilt-max="26" data-tilt-speed="4000" data-tilt-scale="1.2" src="/img/logo1.png" />
                                   
                                    </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('/login/auth'); ?>" method="post">
                                    <?= csrf_field();?>
                                    <div class="form-floating mb-3">
                        <input type="email" name="email2" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email2'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="">
            <label>Your Email</label>
               <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email2');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('password'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="" id="InputForPassword">
            <label>Your Password</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('password');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="container">
                            <input type="checkbox" class="form-check-input" onclick="myFunction()"> Show Password
                           
                            </div>
                            </div>
                            <div class="modal-footer">
                            <div>
                    <button type="submit" class="btn btn-outline-primary rounded-pill"><i class="fas fa-sign-in-alt"></i> Sign In</button>
                    </form>   
                    </div>

                    <div>
                    <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal" data-dismiss="modal">Forgot Your Password?</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div align="right" class="container">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Fill out your email address, you'll receive instructions to reset your password</h5>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('/register/forgotpassword'); ?>" method="post">
                                    <?= csrf_field();?>
                                    <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email'))?'is-invalid' : ''; ?>
            <?php endif;?>" placeholder="">
            <label>Your Email</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email');?>
            <?php endif;?>
            </div>
                    </div>
      </div>
      <div class="modal-footer">
      <div>
      <button type="submit" class="btn btn-outline-primary rounded-pill">Reset Password</button>
                    </form>
                  
      </div>
      <div>
        <button class="btn btn-outline-primary rounded-pill" data-target="#portfolioModal" data-toggle="modal" data-dismiss="modal">Back To Sign In</button>
      </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/sweetalert2.all.min.js"></script>
<script src="/js/myscript.js"></script>
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();

    })
    </script>
        <script>
function previewImg(){
    const file = document.querySelector('#file');
const prevFile = document.querySelector('.custom-file-label');
const imgPreview=document.querySelector('.img-preview');

prevFile.textContent= file.files[0].name;

const filePict=new FileReader();
filePict.readAsDataURL(file.files[0]);

filePict.onload = function(e){
    imgPreview.src= e.target.result;
}

}
</script>
<script>
function previewImg2(){
    const file = document.querySelector('#file2');
const prevFile = document.querySelector('.text-preview2');
const imgPreview=document.querySelector('.img-preview2');

prevFile.textContent= file.files[0].name;

const filePict=new FileReader();
filePict.readAsDataURL(file.files[0]);

filePict.onload = function(e){
    imgPreview.src= e.target.result;
}

}
</script>
<script>
function previewImg3(){
    const file = document.querySelector('#file3');
const prevFile = document.querySelector('.text-preview3');
const imgPreview=document.querySelector('.img-preview3');

prevFile.textContent= file.files[0].name;

const filePict=new FileReader();
filePict.readAsDataURL(file.files[0]);

filePict.onload = function(e){
    imgPreview.src= e.target.result;
}

}
</script>
<script type="text/javascript" src="/js/vanilla-tilt.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/stylish-portfolio.min.js"></script>
</body>
</html>