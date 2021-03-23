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
                <form class="form-horizontal form-material" id="loginform" method="post" action="<?= base_url("login/login_account"); ?>">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <img class="main_logo" src="<?= base_url("assets/images/main-logo.png") ?>" alt="Main logo">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h2 class="title-signin">Login</h2>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="login-input" type="text" required="" name="username" placeholder="Unter Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="login-input" type="password" required="" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group text-center ">
                        <div class="col-xs-12 p-b-20 " style="margin-top:20px;">
                            <button class="login-btn" type="submit">Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>