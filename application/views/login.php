<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-wrapper">
                <div class="box">
                    <div class="content-wrap">
                        <h6>Sign In</h6>
                        <div class="social">
                            <a class="face_login" href="#">
                                <span class="face_icon">
                                    <img src="<?php echo base_url('assets/admin/images/facebook.png'); ?>" alt="fb">
                                </span>
                                <span class="text">Sign in with Facebook</span>
                            </a>
                            <div class="division">
                                <hr class="left">
                                <span>or</span>
                                <hr class="right">
                            </div>
                        </div>
                        <?php echo validation_errors(); ?>

                        <?php echo  form_open('admin/login'); ?>
                            
                        <input class="form-control" type="text" name="email" placeholder="E-mail address">
                        
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        
                        <div class="action">
                            <input type="submit" class="btn btn-primary signup" value="Login">
                        </div>                
                    </div>
                </div>
                
                <?php echo  form_close(); ?>
                
                <div class="already">
                    <p>Don't have an account yet?</p>
                    <a href="signup.html">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

