<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Admin || Create an Account || Harold</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Core css -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/css/style.min.css"/>

</head>
<body class="font-muli theme-cyan gradient">

<div class="auth option2">
    <div class="auth_left">
        <div class="card">
            <div class="card-body">
              <form action="<?php echo base_url('account/register'); ?>" method="POST">
                <div class="text-center">
                    <a class="header-brand" href="<?php echo site_url('account/login'); ?>"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="card-title mt-3">Create an account</div>
                    <h6 class="mt-3 mb-3">Or</h6>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="cpassword" required placeholder="Confirm Password">
                </div>
                <div class="text-center">
                    <button type="submit" name="register" class="btn btn-primary btn-block" title="">Register</button>
                </div>
              </form>
              <?php
            	echo $this->session->flashdata('msg');
            	echo $this->session->flashdata('msgError');
            ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
