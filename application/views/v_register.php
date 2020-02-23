<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <form action="<?= site_url('auth/register'); ?>" method="POST">
                    <h4 class="form-title">Register</h4>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-input" name="fullname"
                                value="<?= set_value('fullname'); ?>">
                            <small class="text-danger"><?php echo form_error('fullname');?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-input" name="email"
                                value="<?= set_value('email'); ?>">
                            <small class="text-danger"><?php echo form_error('email');?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputJob" class="col-sm-4 col-form-label">Job</label>
                        <div class="col">
                            <select name="job" class="form-input col">
                                <option value="researcher">Botanical Researcher</option>
                                <option value="biologist">Biologist</option>
                                <option value="forestry">Forestry Expert</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword1" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-input" name="password1">
                            <small class="text-danger"><?php echo form_error('password1');?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword2" class="col-sm-4 col-form-label">Re-Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-input" name="password2">
                            <small class="text-danger"><?php echo form_error('password2');?></small>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-login mt-2" value="Register">
                </form>
            </div>
            <div class="col-md-3">
                <img src="<?= base_url('assets/images/register-image.png'); ?>" alt="" class="img-fluid register-image">
            </div>
        </div>
    </div>
</div>