
<style>
    .title-signin {
        font-size: 24px;
        color: #10359A;
        font-weight: 400;
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #10359A;
        font-weight: 600;
    }

    .login-box.card {
        top: -10%;
        border: 1px solid #0c2873;
        border-radius: 30px;
        width: 550px;
        
        
    }
    .login-register {
    overflow: scroll;
    }
</style>
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">BRK Psychiatric Mental Health Services LLCp</p>
    </div>
</div>
<section id="wrapper">
    <div class="login-register">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="register" method="post" action="<?= base_url("register/signup"); ?>">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <img class="main_logo" src="<?= base_url("assets/images/main-logo.png") ?>" alt="Main logo">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h2 class="title-signin">Registration</h2>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12 mb-3">
                            <label for="email_address">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="phone_number">Phone</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12 mb-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                        </div>
                    </div>
                    <div class="form-group text-center ">
                        <div class="col-xs-12 p-b-20 " style="margin-top:20px;">
                            <button class="login-btn" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Already have an account? <a href="<?php echo base_url('login') ?>" class="text-info m-l-5"><b>Sign In</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>