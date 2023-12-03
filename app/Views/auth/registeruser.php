<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Coffeeshopadmin - Register</title>
    <link href="<?php echo base_url('css/styles.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-default">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                    <?php endif; ?>
                                    <form action="/register/saveuser" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" class="form-control" id="InputForName" value="<?= set_value('username') ?>">
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control" id="InputForPassword">
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                                            <label for="inputPassword">Confirm Password</label>
                                        </div>
                                        <div class="d-grid gap-2 mt-4 mb-0">
                                            <button type="submit" class="btn btn-warning text-white">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Back to <a href="<?php echo base_url('/login') ?>" class="text-decoration-none text-warning">Sign in</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-default mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/scripts.js') ?>"></script>
</body>

</html>