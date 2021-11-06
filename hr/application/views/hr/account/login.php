<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>HR || Login || Harold</title>

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
              <form action="<?php echo base_url('account/login'); ?>" method="POST">
                <div class="text-center">
                    <a class="header-brand" href="<?php echo site_url('login'); ?>"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="card-title mt-3">Login to your account</div>
                    <h6 class="mt-3 mb-3">Or</h6>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                </div>
                <div class="form-group">
                    <!--<label class="form-label"><a href="#" class="float-right small">I forgot password</a></label>-->
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
                    <span class="custom-control-label">Remember me</span>
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block" title="">Sign in</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
