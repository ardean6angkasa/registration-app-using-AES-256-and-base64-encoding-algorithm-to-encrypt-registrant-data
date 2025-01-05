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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
  <div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#163257;">
      <a href="<?= base_url('/dashboard'); ?>">
        <div align="center">
          <img src="/img/logo1.png" alt="logo" style="width:70%">
      </a>
  </div>
  </a>

  <hr class="sidebar-divider my-0" style="color:white">

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/dashboard'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Dashboard</span></a>
  </li>

  <hr class="sidebar-divider" style="color:white">

  <div class="sidebar-heading">
    Check Data
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-table"></i>
      <span>Datatables</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-light py-2 collapse-inner rounded">
        <h6 class="collapse-header">List of Data:</h6>
        <a class="collapse-item" href="<?= base_url('/modalboot'); ?>">TOEIC Registration</a>
        <a class="collapse-item" href="<?= base_url('/latihan'); ?>">Other Registrations</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider" style="color:white">
  <div class="sidebar-heading">
    Utility
  </div>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/activation'); ?>">
      <i class="fas fa-users-cog"></i>
      <span>Accounts</span>
    </a>
  </li>
  <hr class="sidebar-divider" style="color:white">
  <div class="sidebar-heading">
    Addons
  </div>
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('/addons'); ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Help Center & Information</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/serve'); ?>">
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


        <form action="<?= base_url('/addons'); ?>" method="post"
          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <?= csrf_field(); ?>
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small"
              placeholder="(Search keyword: title or category)" aria-label="Search" aria-describedby="basic-addon2"
              name="keyword" value="<?= session()->get('keyword5') ?>" autocomplete="off" autofocus>
            <div class="input-group-append">
              <button class="btn btn-outline-dark" type="submit" name="search">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
              aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search" action="/addons" method="post">
                <?= csrf_field(); ?>
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small"
                    placeholder="(Search keyword: title or category)" aria-label="Search"
                    aria-describedby="basic-addon2" name="keyword" value="<?= session()->get('keyword5') ?>"
                    autocomplete="off">
                  <div class="input-group-append">
                    <button class="btn btn-outline-dark" type="submit" name="search">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalToggle5">
              <i class="fas fa-user-plus"></i>
            </a>
          </li>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalToggle9">
              <i class="fas fa-envelope fa-fw"></i>
            </a>
          </li>
          <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username') ?></span>
              <img class="img-profile rounded-circle" src="/img/<?= session()->get('photo') ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalToggle4">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>

              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editSettings">
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
      <!----batas akhir top bar---------------->
      <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Help Center & Information</h1>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
            <h6 class="m-0 font-weight-bold text-primary">Announcement</h6>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal"><i
                class="fas fa-plus"></i></button>
            <div align="center">
              <div class="col-sm-5">
                <?php if (empty($help_info)): ?>

                  <div class="alert alert-dark alert-dismissible d-flex align-items-center fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                      <use xlink:href="#info-fill" />
                    </svg>
                    <div>
                      Data not found!
                      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($help_info as $row): ?>
                <div class="col">
                  <div class="card h-100">
                    <img src="/picture/<?= $row['image']; ?>" class="card-img-top"
                      style="max-height: 350px; overflow:hidden;">
                    <div class="card-body">
                      <h5 class="card-title" style="color:black" align='center'><?= $row['title']; ?>
                      </h5>
                      <div align='center'>
                        <a href="<?= base_url('/read/index3/' . $row['id']); ?>" class="btn btn-warning btn-sm"><i
                            class="fas fa-external-link-alt"></i></a>
                      </div>
                      <p class="card-text" style="color:black"><?= $row['category']; ?> - <?= $row['author']; ?></p>
                      <div class="card-text" style="color:black">
                        <?= (strip_tags(word_limiter($encrypter->decrypt(base64_decode($row['information'], 30))))); ?>
                      </div>

                      <p class="card-text"><small class="text-muted">Date posted
                          <?= date('F d, Y', $row['date_created']); ?>
                        </small></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <br>
            <?= $pager->links('help_info', 'default_full'); ?>

          </div>
        </div>
      </div>
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

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/js/sb-admin-2.min.js"></script>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:black">Ready to Leave?</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="color:black">Select "Sign Out" below if you are ready to end your current session
        </div>

        <div class="modal-footer">
          <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-outline-primary rounded-pill" href="<?= base_url('login/logout/'); ?>">Sign Out</a>
        </div>
      </div>
    </div>
  </div>
  <form action="<?= base_url('/addons/save'); ?>" enctype="multipart/form-data" method="POST">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
      data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">



          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:black">Add a new data</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>


          <div class="modal-body">
            <?= csrf_field(); ?>
            <div class="form-group" align="center">

              <img src="/img/default.png" class='img-thumbnail img-preview' style='width:24%'>

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
                <label class="custom-file-label" for="file" style="color:black">Image (optional)</label>
              </div>
            </div>
            <div class="form-group">
              <label style="color:black">Title</label>
              <input type="text" style="color:black" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" name="title" value="<?= old('title'); ?>">
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('title'); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label style="color:black">Category</label>
              <select style="color:black" class="form-select <?php if (isset($validation)): ?>
            <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" name="category">
                <option selected value="">Open this select menu</option>
                <option value="Help Center" style="color:black" <?= old('category') == 'Help Center' ? "selected" : "" ?>>
                  Help Center</option>
                <option value="Information" style="color:black" <?= old('category') == 'Information' ? "selected" : "" ?>>
                  Information</option>
              </select>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('category'); ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inf" style="color:black">Information</label>
              <?php if (isset($validation)): ?>
                <div class="text-danger"> <?= $validation->getError('information'); ?></div>
              <?php endif; ?>
              <input id="inf" type="hidden" name="information" value="<?= old('information'); ?>">
              <trix-editor input="inf" style="color:black"></trix-editor>
            </div>
            <input type="hidden" name="author_name" value="<?= session()->get('username') ?>">
            <input type="hidden" name="author_pict" value="<?= session()->get('photo') ?>">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark rounded-pill" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary rounded-pill">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="modal fade" id="editSettings" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">



        <div class="modal-header">
          <h5 class="modal-title" id="editSettings" style="color:black">General account settings</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div align="center">
            <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal"
              data-dismiss="modal"><i class="fas fa-user-edit"></i> Edit Profile</button>
          </div>
          <br>

          <div align="center">
            <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle3" data-toggle="modal"
              data-dismiss="modal"><i class="fas fa-key"></i> Change Password</button>
          </div>
          <br>
          <div align="center">
            <button class="btn btn-outline-primary rounded-pill" data-target="#exampleModalToggle8" data-toggle="modal"
              data-dismiss="modal"><i class="far fa-trash-alt"></i> Delete My Account</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle9" aria-hidden="true" aria-labelledby="exampleModalToggleLabel9"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel9" style="color:black">Send a message</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('/sendmsg/send4'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group" align="center">

              <img src="/img/default.png" class='img-thumbnail img-preview4' style='width:24%'>

              <br> <br>
              <div class="custom-file">
                <input type="file" id="file4" name="docum" class="custom-file-input <?php if (isset($validation)): ?>
      <?= ($validation->hasError('docum')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" onchange="previewImg4()">
                <div class="invalid-feedback">
                  <?php if (isset($validation)): ?>
                    <?= $validation->getError('docum'); ?>
                  <?php endif; ?>
                </div>
                <label class="custom-file-label text-preview4" for="file4" style="color:black">Send a certificate (only
                  for a registered account)</label>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="email" style="color:black" name="to" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('to')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" value="<?= old('to'); ?>" placeholder=''>
              <label for="InputForName" class="form-label" style="color:black">Receiver Email</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('to'); ?>
                <?php endif; ?>
              </div>
            </div>


            <div class="form-group">
              <label for="desc" style="color:black">Message</label>
              <?php if (isset($validation)): ?>
                <div class="text-danger"> <?= $validation->getError('message'); ?></div>
              <?php endif; ?>
              <input id="desc" type="hidden" name="message" value="<?= old('message'); ?>">
              <trix-editor input="desc" style="color:black"></trix-editor>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary rounded-pill"><i class="fas fa-paper-plane fa-lg"></i>
            Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  </div>
  </div>
  </div>
  </div>

  <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel5" style="color:black">Create an account for admin</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('/addons/registration'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="form-floating mb-3">
              <input type="text" style="color:black" name="username" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" value="<?= old('username'); ?>" placeholder=''>
              <label for="InputForName" class="form-label" style="color:black">Username</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('username'); ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-floating mb-3">

              <input type="email" style="color:black" name="email" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" id="InputForEmail" value="<?= old('email'); ?>" placeholder=''>
              <label for="InputForEmail" class="form-label" style="color:black">Email address</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('email'); ?>
                <?php endif; ?>
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
  <div class="modal fade" id="exampleModalToggle8" aria-hidden="true" aria-labelledby="exampleModalToggleLabel8"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel8" style="color:black">Are you sure, you want to delete
            your account? This action is permanent</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <div>
            <button class="btn btn-outline-primary rounded-pill" data-target="#commitDelete" data-toggle="modal"
              data-dismiss="modal">Yes I'm Sure</button>
          </div>
          <div>
            <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal"
              data-dismiss="modal">Back To Settings</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="commitDelete" aria-hidden="true" aria-labelledby="exampleDelete" tabindex="-1"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">



        <div class="modal-header">
          <h5 class="modal-title" id="exampleDelete" style="color:black">Confirm your password</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('/addons/delete2'); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
            <div class="form-floating mb-3">
              <input type="password" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('currentpassword2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="currentpassword2" id="InputForPassword3" placeholder=''>
              <label style="color:black" class="form-label" for="InputForPassword3">Current Password</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('currentpassword2'); ?>
                <?php endif; ?>
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
            <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal"
              data-dismiss="modal">Back To Settings</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2" style="color:black">Edit my profile</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('/profile/editprofile4'); ?>" enctype="multipart/form-data" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">

            <div class="form-group" align="center">

              <img src="/img/<?= $display = session()->get('photo'); ?>" class='img-thumbnail img-preview2'
                style='width:24%'>

              <br> <br>
              <div class="custom-file">
                <input type="file" id="file2" name="pict" class="custom-file-input <?php if (isset($validation)): ?>
      <?= ($validation->hasError('pict')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" onchange="previewImg2()">
                <div class="invalid-feedback">
                  <?php if (isset($validation)): ?>
                    <?= $validation->getError('pict'); ?>
                  <?php endif; ?>
                </div>
                <label class="custom-file-label text-preview2" for="file2" style="color:black">My Photo</label>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('username2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="username2" value="<?= session()->get('username') ?>" placeholder="" style="color:black">
              <label style="color:black">Username</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('username2'); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-floating mb-3">

              <input type="email" class="form-control" value="<?= session()->get('email') ?>" placeholder=""
                style="color:black" readonly>
              <label style="color:black">Email</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type='button' class="btn btn-outline-dark rounded-pill" data-target="#editSettings"
            data-toggle="modal" data-dismiss="modal">Back To Settings</button>
          <?php if ($display != 'default.svg'): ?>
            <button type='button' class="btn btn-outline-danger rounded-pill" data-target="#removePict"
              data-toggle="modal" data-dismiss="modal">Remove Photo</button>
          <?php else: ?>
          <?php endif; ?>
          <button type="submit" class="btn btn-outline-primary rounded-pill">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="removePict" aria-hidden="true" aria-labelledby="removePicture" tabindex="-1"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="removePicture" style="color:black">Remove your profile photo?</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer border-0">
          <form action="<?= base_url('/removephoto/remove4'); ?>" method="POST">
            <button type="submit" class="btn btn-outline-primary rounded-pill">Remove</button>
          </form>
          <button class="btn btn-outline-dark rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal"
            data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel3" style="color:black">It's a splendid idea to change your
            password periodically</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('/editpass/password4'); ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
            <div class="form-floating mb-3">
              <input type="password" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('currentpassword')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="currentpassword" id="CurrentPassword" placeholder=''>
              <label style="color:black" class="form-label" for="CurrentPassword">Current Password</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('currentpassword'); ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="password" name="newpassword" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('newpassword')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" id="InputForPassword2" placeholder=''>
              <label style="color:black" for="InputForPassword2" class="form-label">New Password</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('newpassword'); ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="password" name="confpassword2" class="form-control <?php if (isset($validation)): ?>
            <?= ($validation->hasError('confpassword2')) ? 'is-invalid' : ''; ?>
            <?php endif; ?>" id="InputForConfPassword" placeholder=''>
              <label style="color:black" class="form-label" for="InputForConfPassword">Re-type New Password</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('confpassword2'); ?>
                <?php endif; ?>
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
            <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal"
              data-dismiss="modal">Back To Settings</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel4" style="color:black">My profile</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div align="center">

            <img src="/img/<?= session()->get('photo') ?>" class='img-responsive img-thumbnail' style="width:40%">
          </div>
          <br>
          <p class="lead" style="color:black">Username: <?= session()->get('username') ?>
            <br>
            Email: <?= session()->get('email') ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/myscript.js"></script>
  <script>
    document.addEventListener('trix-file-accept', function (e) {
      e.preventDefault();

    })
  </script>
  <script>
      < script >
      function myFunction2() {
        var x = document.getElementById("InputForPassword2");
        if (x.type === "password") {
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
  <script>
    function previewImg4() {
      const file = document.querySelector('#file4');
      const prevFile = document.querySelector('.text-preview4');
      const imgPreview = document.querySelector('.img-preview4');

      prevFile.textContent = file.files[0].name;

      const filePict = new FileReader();
      filePict.readAsDataURL(file.files[0]);

      filePict.onload = function (e) {
        imgPreview.src = e.target.result;
      }

    }
  </script>
  <script>
    function previewImg2() {
      const file = document.querySelector('#file2');
      const prevFile = document.querySelector('.text-preview2');
      const imgPreview = document.querySelector('.img-preview2');

      prevFile.textContent = file.files[0].name;

      const filePict = new FileReader();
      filePict.readAsDataURL(file.files[0]);

      filePict.onload = function (e) {
        imgPreview.src = e.target.result;
      }

    }
  </script>

</body>

</html>