<?php
$this->load->library('form_validation');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Login</title>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="light-form-container card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('http://localhost/rssTec/admin/login/checklogin', array('onsubmit' => 'return validateLogin()')); ?>

                    <div class="form-group">
                        <label for="login-id">Email address/Mobile Number *</label>
                        <input name="email" class="form-control" id="login-id" required type="text" aria-describedby="emailHelp" placeholder="Enter email">
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" required name="password" type="password" placeholder="Password">
                        <span class="error"></span>
                    </div>
                    <input id="hidden" name="type" class="hide"/>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Login" />

                    </form>
                    <div class="text-center">
                        <a class="d-block small" href="http://localhost/rssTec/admin/ForgotPassword">Forgot Password?</a>
                    </div>
                    <p>
                        <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/validate.js"></script>
    </body>

</html>
