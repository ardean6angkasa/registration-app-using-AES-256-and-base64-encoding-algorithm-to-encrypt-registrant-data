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
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
      <a class="navbar-brand" href="#page-top"><em>SIPS</em></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/useracc/information'); ?>">Information</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="4000">
      <div class="masthead-subheading">Welcome To The Dashboard</div>
      <div class="masthead-heading text-uppercase">It's Nice To Have You Back</div>
      <button type='button' class="btn btn-warning btn-xl text-uppercase rounded-pill" data-toggle="modal"
        data-target="#editSettings"><i class="fas fa-cogs fa-fw"></i> Main Menu</button>

    </div>
  </header>
  <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
  <div class="flashdata2" data-flashdata2="<?= session()->getFlashdata('msg2') ?>"></div>
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
            <button class="btn btn-outline-success rounded-pill" data-target="#exampleModalToggle4" data-toggle="modal"
              data-dismiss="modal"><i class="fas fa-portrait"></i> My Profile
            </button>
            <br>
            <br>
            <button class="btn btn-outline-success rounded-pill position-relative" data-target="#exampleModalToggle10"
              data-toggle="modal" data-dismiss="modal"><i class="fas fa-envelope-open-text"></i> My Messages
              <?= session()->get('badge') ?>
            </button>
            <br>
            <br>
            <button class="btn btn-outline-success rounded-pill" data-target="#exampleModalToggle3" data-toggle="modal"
              data-dismiss="modal"><i class="fas fa-key"></i> Change Password</button>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-dark rounded-pill" data-toggle="modal" data-dismiss="modal"
            data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sign
            Out</button>
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
          <p class="lead" style="color:black">Username: <?= session()->get('username'); ?>
            <br>
            Full Name: <?= $encrypter->decrypt(base64_decode(session()->get('nama'))); ?>
            <br>
            <?php if (empty(session()->get('tempat_tanggal_lahir'))): ?>
              Birth Place & Date:
              <br>
            <?php else: ?>
              Birth Place & Date: <?= $encrypter->decrypt(base64_decode(session()->get('tempat_tanggal_lahir'))); ?>
              <br>
            <?php endif; ?>
            Email: <?= session()->get('email'); ?>
            <br>
            Phone Number: <?= $encrypter->decrypt(base64_decode(session()->get('phone'))); ?>
          </p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-success rounded-pill" data-target="#exampleModalToggle2" data-toggle="modal"
            data-dismiss="modal"><i class="fas fa-user-edit"></i> Edit Profile</button>
          <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal"
            data-dismiss="modal">Back To Settings</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModalToggle10" aria-hidden="true" aria-labelledby="exampleModalToggleLabel10"
    tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel10" style="color:black">Inbox</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div align="center">
            <div class="col-sm-6">
              <?php if (empty($messaging)): ?>

                <div class="alert alert-dark alert-dismissible d-flex align-items-center fade show" data-aos="fade-down"
                  data-aos-easing="linear" data-aos-duration="2000" role="alert">
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
          <?php foreach ($messaging as $row): ?>
            <?php if (empty($row['chat2'])): ?>
            <?php else: ?>
              <div class="card container">
                <p>
                  <br>
                  <img class="img-thumbnail rounded-circle" src="/img/<?= $row['photo2']; ?>" style="width:6%">
                  <?= $encrypter->decrypt(base64_decode($row['identity2'])); ?>
                </p>
                <p>
                  <?php if (empty($row['certificate'])): ?>
                  <?php else: ?>
                    <img src="/certificate/<?= $row['certificate']; ?>" class='img-thumbnail img-preview2' style='width:16%'>
                  <?php endif; ?>
                  <?= $encrypter->decrypt(base64_decode($row['chat2'])); ?>
                </p>
                <p class="text-muted" align="right">
                  <?= date('F d, Y', $row['date2']); ?> at <?= date('h:i A', $row['date2']); ?>
                  <button type="button" class="btn btn-outline-danger rounded-pill border-0 btn-delete"
                    data-target="#deleteModal<?= $row['id']; ?>" data-toggle="modal" data-dismiss='modal'><i
                      class="fas fa-trash-alt d-inline"></i></button>
                </p>

              </div>
              <br>
            <?php endif; ?>
            <?php if (empty($row['message'])): ?>
            <?php else: ?>
              <div class="card container">
                <p align="right">
                  <br>
                  <?= session()->get('name') ?>
                  <img class="img-thumbnail rounded-circle" src="/img/<?= session()->get('photo') ?>" style="width:6%">
                </p>

                <p align="right">
                  <?= $encrypter->decrypt(base64_decode($row['message'])); ?>
                </p>

                <p class="text-muted" align="right">
                  <?= date('F d, Y', $row['date_created']); ?> at <?= date('h:i A', $row['date_created']); ?>
                <form action="<?= base_url('/useracc/edit/' . $row['token']); ?>">
                  <button type="button" class="btn btn-outline-danger rounded-pill border-0 btn-delete"
                    data-target="#deleteModal<?= $row['id']; ?>" data-toggle="modal" data-dismiss='modal'><i
                      class="fas fa-trash-alt d-inline"></i></button>

                  <button type="submit" class="btn btn-outline-info rounded-pill border-0"><i
                      class="fas fa-edit d-inline"></i></button>
                </form>
                </p>

              </div>
              <br>
            <?php endif; ?>
          <?php endforeach; ?>
          <form action='/useracc/send' method='post'>
            <div class="form-group">

              <input id="desc" type="hidden" name="message" value="<?= old('message'); ?>">
              <trix-editor input="desc" style="color:black"></trix-editor>
              <?php if (isset($validation)): ?>
                <div class="text-danger"> <?= $validation->getError('message'); ?></div>
              <?php endif; ?>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-dark rounded-pill" type='button' data-target="#editSettings"
            data-toggle="modal" data-dismiss="modal">Back To Settings</button>
          <button class="btn btn-outline-success rounded-pill" type="submit"><i class="fas fa-paper-plane"></i>
            Send</button>
          </form>

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
          <form action="<?= base_url('/useracc/editprofile'); ?>" enctype="multipart/form-data" method="POST">
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
                <label class="custom-file-label text-preview2" for="file" style="color:black">My Photo</label>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="email" name="mail" readonly class="form-control" value="<?= session()->get('email'); ?>"
                style="color:black">
              <label style="color:black">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('username2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="username2" value="<?= session()->get('username'); ?>" placeholder="" style="color:black">
              <label style="color:black">Username</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('username2'); ?>
                <?php endif; ?>
              </div>
            </div>

            <?php if (empty(session()->get('tempat_tanggal_lahir'))): ?>
              <div class="form-floating mb-3">
                <input type="text" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('tempat_tanggal_lahir2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="tempat_tanggal_lahir2" value="" placeholder="" style="color:black">
                <label style="color:black">Birth Place & Date</label>
                <div class="invalid-feedback">
                  <?php if (isset($validation)): ?>
                    <?= $validation->getError('tempat_tanggal_lahir2'); ?>
                  <?php endif; ?>
                </div>
              </div>
            <?php else: ?>
              <div class="form-floating mb-3">
                <input type="text" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('tempat_tanggal_lahir2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="tempat_tanggal_lahir2"
                  value="<?= $encrypter->decrypt(base64_decode(session()->get('tempat_tanggal_lahir'))); ?>"
                  placeholder="" style="color:black">
                <label style="color:black">Birth Place & Date</label>
                <div class="invalid-feedback">
                  <?php if (isset($validation)): ?>
                    <?= $validation->getError('tempat_tanggal_lahir2'); ?>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
              <input type="tel" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('phone2')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="phone2" value="<?= $encrypter->decrypt(base64_decode(session()->get('phone'))); ?>"
                placeholder="Phone Number" style="color:black">
              <label style="color:black">Phone Number</label>
              <div class="invalid-feedback">
                <?php if (isset($validation)): ?>
                  <?= $validation->getError('phone2'); ?>
                <?php endif; ?>
              </div>
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
          <button type="submit" class="btn btn-outline-success rounded-pill">Save</button>
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
          <form action="<?= base_url('/useracc/removephoto'); ?>" method="POST">
            <button type="submit" class="btn btn-outline-success rounded-pill">Remove</button>
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
        <div class="container" align="right">
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel3" style="color:black">It's a splendid idea to change your
            password periodically</h5>

        </div>
        <div class="modal-body">
          <form action="<?= base_url('/useracc/password'); ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
            <div class="form-floating mb-3">
              <input type="password" class="form-control <?php if (isset($validation)): ?>
      <?= ($validation->hasError('currentpassword')) ? 'is-invalid' : ''; ?>
      <?php endif; ?>" name="currentpassword" id="CurrentPassword" placeholder="">
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
            <?php endif; ?>" id="InputForPassword2" placeholder="">
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
            <?php endif; ?>" id="InputForConfPassword" placeholder="">
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
            <button type="submit" class="btn btn-outline-success rounded-pill">Save</button>
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
  <form action="<?= base_url('/useracc/deletemsg'); ?>" method="post">
    <?php foreach ($messaging as $row):
      $row['id']; ?>
      <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel3"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel3" style="color:black">Delete a message</h5>
              <button type="button" class="btn-close" data-target="#exampleModalToggle10" data-toggle="modal"
                data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="color:black">Are you sure, you want to delete the message?</p>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id" value="<?= $row['id']; ?>">
              <input type="hidden" name="cert" value="<?= $row['certificate']; ?>">
              <button type="button" class="btn btn-outline-dark rounded-pill" data-target="#exampleModalToggle10"
                data-toggle="modal" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-outline-success rounded-pill">Yes</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </form>


  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:black">Ready to leave?</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="color:black">Select "Sign Out" below if you are ready to end your current session
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-dark rounded-pill" data-target="#editSettings" data-toggle="modal"
            data-dismiss="modal">Cancel</button>
          <a class="btn btn-outline-success rounded-pill" href="<?= base_url('login/logout/'); ?>">Sign Out</a>
        </div>
      </div>
    </div>
  </div>

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
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/myscript.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    document.addEventListener('trix-file-accept', function (e) {
      e.preventDefault();

    })
  </script>



  <script>
    AOS.init();
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

  <script src="/js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>