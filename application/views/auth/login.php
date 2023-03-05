<?php $query = $this->db->query("SELECT * FROM `info` WHERE 1"); 
$info = $query->row() ?>
<form action="<?= site_url('auth/login') ?>" method="POST">
    <div class="container container-login animated fadeIn">
        <div class="text-center"><img
                src="<?= !empty($info->logo) ? site_url('assets/uploads/system/').$info->logo : site_url('assets/img/loan-logo.png') ?>"
                alt="" width="100"></div>

        <!-- <h3 class="text-center">Loan Application System</h3> -->
        <h5 class="text-center mt-2">Sign In Here</h5>
        <?php if ($message !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
        <?php endif ?>
        <div class="login-form">
            <div class="form-group form-floating-label">
                <input id="username" name="identity" type="text" class="form-control input-border-bottom" required>
                <label for="username" class="placeholder">Username</label>
            </div>
            <div class="form-group form-floating-label">
                <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
                <label for="password" class="placeholder">Password</label>
                <div class="show-password">
                    <i class="icon-eye"></i>
                </div>
            </div>
            <div class="row form-sub m-0">
            </div>
            <div class="form-action mb-3">
                <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
            </div>
            <div class="login-account">
                <span class="msg">Powered by: </span>
                <a href="https://www.facebook.com/softwarezensolution" class="link">Softwarezen</a>
            </div>
        </div>
    </div>
</form>