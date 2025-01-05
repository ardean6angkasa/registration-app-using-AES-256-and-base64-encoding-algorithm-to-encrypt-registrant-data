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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        .copyButton{
          background-color: #007bff;
          padding: 5px 15px;
          border: none;
          color: white;
          font-size: 18px;
          border-radius: 2px;
          cursor:pointer;
      }
.alert2{
    position: absolute;
    margin:auto;
    background-color:#212529;
    color: white;
    padding:10px 0;
    font-size:16px;
    font-family:'Poppins', sans-serif;
    text-align:center;
    left:0;
    right:0;
    bottom:0;
    display:none;
}
        </style>
        <script>
  		$(document).ready(function(){
  			$(".preloader").fadeOut();
              
          })
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
            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('msg') ?>"></div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    <div class="card-footer align-items-center justify-content-between">
                        <div align='left'>
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#exitModal" class="btn btn-outline-danger rounded-pill border-0"> 
                                <i class="fas fa-door-open"></i> Exit
</a>
</div>
</div>
<div align="center">
                            <div class="col-lg-11">
                                <div class="p-5">
                               
                                    <div class="text-center">
                                    <?php if(empty(session()->get('type'))):?>
                                        <h1 class="h4 mb-2" style="color:black">Encrypt a Text</h1>
                                        <?php else:?>
                                            <h1 class="h4 mb-2" style="color:black">decrypt a Text</h1>
                                            <?php endif;?>
                                    </div>
                                    <form action="<?= base_url('/cryptography/index2'); ?>" method="post">
                                    <?= csrf_field();?>
                                    <div class="form-floating mb-3">
            <textarea type="text" class="form-control <?php if(isset($validation)):?>
            <?= ($validation->hasError('text'))?'is-invalid' : ''; ?>
            <?php endif;?>" name="text" placeholder="" style="height: 6rem; color:black"><?= old('text'); ?></textarea>
            <label style="color:black">Text</label>
            <div class="invalid-feedback">
            <?php if(isset($validation)):?>
            <?=$validation->getError('text');?>
            <?php endif;?>
            </div>
                </div>
                
                
        <?php if(empty(session()->get('type'))):?>
            <?php foreach($cryptool as $row):?>
            <h6 style="color:black"><?= $row->text;?></h6>
        <input type="hidden" name="id" value='<?= $row->id;?>'>
        <?php endforeach;?>
     <button type="submit" class="btn btn-outline-primary rounded-pill">Encrypt</button>
     </form>
     <?php else:?>
        <?php foreach($cryptool as $row):?>
        <input type="hidden" name="id" value='<?= $row->id;?>'>
                                 <h6 id="text1" style="color:black"><?= $row->text;?></h6>
                                
                                    <button class="copyButton" id="copyButton1" type='button'>
                                        Copy To Clipboard
        </button>
        <span class="alert2">Copied!</span>
                            <div align ="right">
                            <button type="submit" class="btn btn-outline-primary rounded-pill">Decrypt</button>
                            </div>
                            <?php endforeach;?>
                            </form>
                           
                            <?php endif;?>
    
                                   
          
            <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
    function copy(copyId){
        var $inp=$("<input>");
        $("body").append($inp);
        $inp.val($(""+copyId).text()).select();
        document.execCommand("copy");
        $inp.remove();
        $(".alert2").fadeIn(1000,function(){
            $(".alert2").fadeOut();
        });
    }
    $(document).ready(function(){
        $("#copyButton1").click(
            function(){
                copy('#text1');
            });
    });
    </script>
    <div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3"  style="color:black">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <p  style="color:black">Select "Exit" below if you are ready to end your current session</p>               
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-dark rounded-pill" data-dismiss="modal">Cancel</button>
                <a class="btn btn-outline-primary rounded-pill" href="<?= base_url('/login/logout');?>">Exit</a>
            </div>
            </div>
        </div>
        </div>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
        <script src="/js/myscript.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>
</html>