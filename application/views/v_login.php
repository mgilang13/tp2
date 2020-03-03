<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <?= $this->session->flashdata('message'); ?>
                <form method="POST" action="<?= site_url('auth'); ?>">
                    <h4 class="form-title">LOGIN</h4>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" name="email">
                            <small class="text-danger"><?php echo form_error('email');?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control form-input" name="password">
                            <small class="text-danger"><?php echo form_error('password');?></small>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-login mt-2" value="Login">
                </form>
            </div>
            <div class="col-md-3">
                <img src="<?= base_url('assets/images/login-image.png'); ?>" alt="" class="img-fluid login-image">
            </div>
        </div>
    </div>
</div>