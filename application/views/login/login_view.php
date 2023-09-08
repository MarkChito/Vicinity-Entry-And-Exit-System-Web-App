<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Vicinity Entry and Exit System | Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>dist/img/logo.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php if ($this->session->userdata('login_error')) : ?>
            <div class="alert alert-danger text-center" role="alert" id="notification">
                <strong><?= $this->session->userdata('login_error'); ?></strong>
            </div>

            <?php $this->session->unset_userdata('login_error'); ?>
        <?php endif; ?>

        <div class="card">
            <center style="background-color: #FFFFFF;" class="mt-3">
                <img src="<?= base_url() ?>dist/img/logo.png" style="width: 50%;">
            </center>
            <div class="card-header text-center">
                <span class="h3">Vicinity Entry and Exit System</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url() ?>login/login_admin" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="login_username" placeholder="Username" value="<?php if ($this->session->userdata('remember_me')) {
                                                                                                                        echo $this->session->userdata('login_username');
                                                                                                                    } ?>" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="login_password" placeholder="Password" value="<?php if ($this->session->userdata('remember_me')) {
                                                                                                                            echo $this->session->userdata('login_password');
                                                                                                                        } ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="login_remember_me" <?php if ($this->session->userdata('remember_me')) {
                                                                                                    echo "checked";
                                                                                                } ?>>
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>

</body>

</html>