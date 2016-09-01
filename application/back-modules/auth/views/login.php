
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PT.APEI</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/fonts/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/icheck/flat/green.css'); ?>" rel="stylesheet">


  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <style>
     html{
          height: 100%;
     }
     body{
          height:100%;
     }
  </style>
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background: url(<?php echo base_url('assets/images/loginbg.jpg')?>) no-repeat center center;background-size: 50% / cover;">
     <div style="display:table;height:100%;width:100%">
          <div style="display:table-row">
               <div style="display:table-cell;vertical-align:middle;">
                    <div style="background: rgba(0, 0, 0, 0.7);width:500px;margin:0 auto;padding:30px;">
                         <?php echo form_open("auth/login");?>
                         <h2 style="font-size:30px;font-weight:bold;color:#ffffff;text-align:center;margin:0">Login Panel</h2>
                         <hr>
                         <?php echo $message ? '<div class="alert alert-danger" role="alert">'.$message.'</div>' : '';?>
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?php echo base_url('assets/images/logo.png')?>" class="img-responsive">
                              </div>
                              <div class="col-md-8">
                                   <div class="form-group" style="margin-bottom:20px">
                                        <div class="input-group">
                                             <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                             <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                                        </div>
                                   </div>
                                   <div class="form-group" style="margin-bottom:20px">
                                        <div class="input-group">
                                             <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span> </div>
                                             <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <button class="btn btn-primary submit" type="submit"><i class="glyphicon glyphicon-log-in"></i>  Log in</button>
                                   </div>
                              </div>
                         </div>
                         <?php echo form_close();?>
                    </div>
               </div>
          </div>
     </div>

</body>

</html>
