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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  
  <script src="https://kit.fontawesome.com/e88f737db2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/trix.js"></script>
  <style>
      trix-toolbar [data-trix-button-group='file-tools']{
          display:none;
      }
      </style>
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

<body id="page-top">
<div class="preloader bg-light" id="preloader" align="center">
        <div class="loading">
            <img src="/img/profile.gif" style="width:40%">
            <h6 style="color:black">Processing....</h6>
        </div>
    </div>
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#163257;">

            <a href="<?= base_url('/dashboard');?>">
                <div align="center">
                <img src="/img/logo1.png" alt="logo" style="width:70%"></a>
                </div>
            </a>

            <hr class="sidebar-divider my-0" style="color:white">

            <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/dashboard');?>">
            <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider" style="color:white">

            <div class="sidebar-heading">
                Check Data
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Datatables</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                    <h6 class="collapse-header">List of Data:</h6>
                    <a class="collapse-item" href="<?= base_url('/modalboot');?>">TOEIC Registration</a>
                        <a class="collapse-item" href="<?= base_url('/latihan');?>">Other Registrations</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider" style="color:white">
            <div class="sidebar-heading">
                Utility
            </div>
           
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/activation');?>">
                <i class="fas fa-users-cog"></i>
                    <span>Accounts</span>
                </a>
            </li>
            <hr class="sidebar-divider" style="color:white">
<div class="sidebar-heading">
    Addons
</div>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/addons');?>">
    <i class="fas fa-fw fa-folder"></i>
        <span>Help Center & Information</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/serve');?>">
    <i class="fas fa-headset"></i>
        <span>Customer Service</span>
    </a>
</li>
            <hr class="sidebar-divider d-none d-md-block" style="color:white">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
		<div id="content-wrapper" class="d-flex flex-column">


<div id="content">
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                   

		<ul class="navbar-nav ml-auto">
		
            <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="#"
                    data-toggle="modal" data-target="#exampleModalToggle5">
                    <i class="fas fa-user-plus"></i>
                    </a>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="#"
                    data-toggle="modal" data-target="#exampleModalToggle9">
                    <i class="fas fa-envelope fa-fw"></i>
                    </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">

				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username') ?></span>
					<img class="img-profile rounded-circle"
						src="/img/<?= session()->get('photo') ?>">
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
					aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalToggle4">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Profile
					</a>
          <a class="dropdown-item" href="#"
                    data-toggle="modal" data-target="#editSettings">
						<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
						Settings
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Sign Out
					</a>
				</div>
			</li>
		</ul>
	</nav>
     <!-------------------top bar------------------>

	<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Charts</h1>

<!-- Content Row -->
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total TOEIC registrant</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_registrant?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total other training and certificate registrant
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_receipt?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        </div>
                        <div class="row">
    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total registrant per year</h6>
               
            </div>
            <div class="card-body">
              
                <canvas id="tahun"></canvas>
               
            </div>
        </div>

    </div>
   
       
   
    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total admin & user account</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            
            <canvas id="cari_jumlah"></canvas>
                
            </div>
        </div>
        </div>
   
</div>

</div>
<!-- /.container-fluid -->

</div>


<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; SIPS 2021</span>
		</div>
	</div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel" style="color:black">Ready to Leave?</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body" style="color:black">Select "Sign Out" below if you are ready to end your current session</div>
	<div class="modal-footer">
		<button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Cancel</button>
		<a class="btn btn-outline-primary rounded-pill" href="<?= base_url('login/logout');?>">Sign Out</a>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="editSettings" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"  id="editSettings" style="color:black">General account settings</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    

                                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
                                    <div class="flashdata2" data-flashdata2="<?= session()->getFlashdata('msg2') ?>"></div>

                                    <div align="center">
                                    <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal" data-dismiss="modal"><i class="fas fa-user-edit"></i> Edit Profile</button>
                                    </div>
                                    <br>
                                    <div align="center">
                                    <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle3" data-toggle="modal" data-dismiss="modal"><i class="fas fa-key"></i> Change Password</button>
                                    </div>
                                    <br>
                                    <div align="center">
                                    <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle8" data-toggle="modal" data-dismiss="modal"><i class="far fa-trash-alt"></i> Delete My Account</button>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle9" aria-hidden="true" aria-labelledby="exampleModalToggleLabel9" tabindex="-1"
        data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
  
               
             
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel9" style="color:black">Send a message</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      <form action="<?= base_url('/sendmsg'); ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field();?>

    <div class="form-group" align="center">
     
     <img src="/img/default.png" class='img-thumbnail img-preview4' style='width:24%'>
  
  <br>  <br>
     <div class="custom-file">
      <input type="file" id="file4" name="docum" class="custom-file-input <?php if(isset($validation)):?>
      <?= ($validation->hasError('docum'))?'is-invalid' : ''; ?>
      <?php endif;?>" onchange="previewImg4()">
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('docum');?>
      <?php endif;?>
      </div>
<label class="custom-file-label text-preview4" for="file4" style="color:black">Send a certificate (only for a registered account)</label>
      </div>
      </div> 
      
    <div class="form-floating mb-3">
                        <input type="email" style="color:black"  name="to" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('to'))?'is-invalid' : ''; ?>
            <?php endif;?>" value="<?= old('to'); ?>" placeholder=''>
            <label for="InputForName" class="form-label" style="color:black">Receiver Email</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('to');?>
            <?php endif;?>
            </div>
          </div>

            <div class="form-group">
                    <label for="desc" style="color:black">Message</label>
                    <?php if(isset($validation)):?>
                    <div class="text-danger"> <?=$validation->getError('message');?></div>
                <?php endif;?>
                    <input id="desc" type="hidden" name="message" value="<?= old('message'); ?>">
                    <trix-editor input="desc" style="color:black"></trix-editor>
                </div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-outline-primary rounded-pill"><i class="fas fa-paper-plane fa-lg"></i> Send</button>
                    </form>
      </div>
    </div>
  </div>
</div>

        <div class="modal fade" id="exampleModalToggle5" data-backdrop="static" data-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
                
             
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel5" style="color:black">Create an account for admin</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="<?= base_url('/register/registration'); ?>" method="POST">
    <?= csrf_field();?>
    <div class="form-floating mb-3">
       
                        <input type="text" style="color:black"  name="username" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('username'))?'is-invalid' : ''; ?>
            <?php endif;?>" value="<?= old('username'); ?>" placeholder=''>
            <label for="InputForName" class="form-label" style="color:black">Username</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('username');?>
            <?php endif;?>
            </div>
          </div>

          <div class="form-floating mb-3">
                        <input type="email" style="color:black" name="email" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('email'))?'is-invalid' : ''; ?>
            <?php endif;?>" id="InputForEmail" value="<?= old('email'); ?>" placeholder=''>
            <label for="InputForEmail" class="form-label" style="color:black">Email address</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('email');?>
            <?php endif;?>
            </div>
            </div>              
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-outline-primary rounded-pill">Sign Up</button>
                    </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle8" aria-hidden="true" aria-labelledby="exampleModalToggleLabel8" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
   
                
              
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel8" style="color:black">Are you sure, you want to delete your account? This action is permanent</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-footer">
      <div>
      <button class="btn btn-outline-primary rounded-pill" data-target="#commitDelete" data-toggle="modal" data-dismiss="modal">Yes I'm Sure</button>
      </div>
      <div>
        <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal" data-dismiss="modal">Back To Settings</button>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="commitDelete" aria-hidden="true" aria-labelledby="exampleDelete" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleDelete" style="color:black">Confirm your password</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                    <form action="<?= base_url('/modalboot/delete3'); ?>" method="post">
    <?= csrf_field();?>
    <input type="hidden" name="user_id" value="<?= session()->get('user_id')?>">
    <div class="form-floating mb-3">
              <input type="password" class="form-control <?php if(isset($validation)):?>
      <?= ($validation->hasError('currentpassword2'))?'is-invalid' : ''; ?>
      <?php endif;?>" name="currentpassword2"  id="InputForPassword3" placeholder=''>
      <label style="color:black" class="form-label" for="InputForPassword3">Current Password</label>
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('currentpassword2');?>
      <?php endif;?>
      </div>
          </div>
                    <div class="container" style="color:black">
                            <input type="checkbox" onclick="myFunction3()" class="form-check-input"> Show Password
                            </div>
      </div>
      <div class="modal-footer">
      <div>
      <button type="submit" class="btn btn-outline-primary rounded-pill">Commit</button>
                    </form>
                    </div>
        <div>
        <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal" data-dismiss="modal">Back To Settings</button>
      </div>
      </div>
    </div>
  </div>
</div>
          <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2" style="color:black">Edit my profile</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('/profile'); ?>" enctype="multipart/form-data" method="POST">
    <?= csrf_field();?>
    <input type="hidden" name="user_id" value="<?= session()->get('user_id')?>"> 
    <div class="form-group" align="center">
     
     <img src="/img/<?= $display = session()->get('photo'); ?>" class='img-thumbnail img-preview' style='width:24%'>
  
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
<label class="custom-file-label" for="file" style="color:black">My Photo</label>
      </div>
      </div>  
  
      <div class="form-floating mb-3">
            
              <input type="text" class="form-control <?php if(isset($validation)):?>
      <?= ($validation->hasError('username2'))?'is-invalid' : ''; ?>
      <?php endif;?>" name="username2" value="<?= session()->get('username') ?>" placeholder="" style="color:black">
      <label style="color:black">Username</label>
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('username2');?>
      <?php endif;?>
      </div>
          </div>

          <div class="form-floating mb-3">
            
              <input type="email" class="form-control" value="<?= session()->get('email') ?>" placeholder="" style="color:black" readonly>
              <label style="color:black">Email</label>
          </div>
          
      </div>
      <div class="modal-footer">
      <button type='button' class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal" data-dismiss="modal">Back To Settings</button>
      <?php if($display!='default.svg'):?>
      <button type='button' class="btn btn-outline-danger rounded-pill" data-target="#removePict" data-toggle="modal" data-dismiss="modal">Remove Photo</button>
      <?php else:?>
          <?php endif;?>
      <button type="submit" class="btn btn-outline-primary rounded-pill">Save</button>
                    </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="removePict" aria-hidden="true" aria-labelledby="removePicture" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="removePicture" style="color:black">Remove your profile photo?</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer border-0">
      <form action="<?= base_url('/removephoto'); ?>" method="POST">
      <button type="submit" class="btn btn-outline-primary rounded-pill">Remove</button>
                    </form>
        <button class="btn btn-outline-dark rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel3" style="color:black">It's a splendid idea to change your password periodically</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('/editpass'); ?>" method="POST">
    <?= csrf_field();?>
    <input type="hidden" name="user_id" value="<?= session()->get('user_id')?>">  
    <div class="form-floating mb-3">
              <input type="password" class="form-control <?php if(isset($validation)):?>
      <?= ($validation->hasError('currentpassword'))?'is-invalid' : ''; ?>
      <?php endif;?>" name="currentpassword"  id="CurrentPassword" placeholder=''>
      <label style="color:black" class="form-label" for="CurrentPassword">Current Password</label>
      <div class="invalid-feedback">
      <?php if(isset($validation)):?>
      <?=$validation->getError('currentpassword');?>
      <?php endif;?>
      </div>
          </div>

          <div class="form-floating mb-3">
                        <input type="password" name="newpassword" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('newpassword'))?'is-invalid' : ''; ?>
            <?php endif;?>" id="InputForPassword2" placeholder=''>
            <label style="color:black" for="InputForPassword2" class="form-label">New Password</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('newpassword');?>
            <?php endif;?>
            </div>
            </div>

            <div class="form-floating mb-3">
                        <input type="password" name="confpassword2" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('confpassword2'))?'is-invalid' : ''; ?>
            <?php endif;?>" id="InputForConfPassword" placeholder=''>
            <label style="color:black" class="form-label" for="InputForConfPassword">Re-type New Password</label>
                        <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('confpassword2');?>
            <?php endif;?>
            </div>
                    </div>
                    <div class="container">
                            <input type="checkbox" onclick="myFunction2()" class="form-check-input" style="color:black"> Show Password
                            </div>
      </div>
      <div class="modal-footer">
      <div>
      <button type="submit" class="btn btn-outline-primary rounded-pill">Save</button>
                    </form>
      </div>
      <div>
        <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal" data-dismiss="modal">Back To Settings</button>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel4" style="color:black">My profile</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div align="center">
                   
                <img src="/img/<?= session()->get('photo')?>" class='img-responsive img-thumbnail' style="width:40%">
            </div>  
           
                <br>
                    <p class="lead" style="color:black">Username: <?= session()->get('username')?>
                    <br>
                    Email: <?= session()->get('email')?></p>
            </div>
    </div>
  </div>
</div>


<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/sweetalert2.all.min.js"></script>
<script src="/js/myscript.js"></script>
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
function previewImg4(){
    const file = document.querySelector('#file4');
const prevFile = document.querySelector('.text-preview4');
const imgPreview=document.querySelector('.img-preview4');

prevFile.textContent= file.files[0].name;

const filePict=new FileReader();
filePict.readAsDataURL(file.files[0]);

filePict.onload = function(e){
    imgPreview.src= e.target.result;
}

}
</script>
<script>
function myFunction2() {
  var x = document.getElementById("InputForPassword2");
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
}
</script>
<script>
function myFunction3() {
  var x = document.getElementById("InputForPassword3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
}
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
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();

    })
    </script>
<script>
   var cari_jumlah = document.getElementById('cari_jumlah');
        var data_cari_jumlah = [];
        var label_cari_jumlah = [];

        <?php foreach($registrant->getResult() as $key=>$value): ?>
            data_cari_jumlah.push(<?= $value->jumlah ?>);
            label_cari_jumlah.push('<?= $value->kategori ?>');
        <?php endforeach ?>

        var data_registrant = {
            datasets:[{
              label : 'Total user & admin',
                data : data_cari_jumlah,
                backgroundColor:[
                    'rgba(255,185,0)',
                    'rgba(51,51,255)',
                
                ],
                hoverOffset: 4
            }],
            labels: label_cari_jumlah,
        }
        var chart_cari_jumlah = new Chart(cari_jumlah,{
            type: 'doughnut',
            data : data_registrant
        });
        </script>

<script>
        var tahun = document.getElementById('tahun');
        var data_tahun = [];
        var label_tahun = [];

        <?php foreach($detail2->getResult() as $key=>$value): ?>
            data_tahun.push(<?= $value->jumlah ?>);
            label_tahun.push('<?= $value->jenis ?>');
        <?php endforeach ?>

        var data_grow2 = {
            datasets:[{
                label: 'Total registrant',
                data: data_tahun,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
            }],
            labels: label_tahun,
        }

        var chart_tahun = new Chart(tahun,{
            type:'bar',
            data: data_grow2,
            options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
        });

    </script>
</body>
</html>