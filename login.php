<!--HEADER-->
<div>
    <img class="logo" src="assets/img/about.png" alt="logo" widht="400" height="282">
</div>

<!--LOGIN SECTION-->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <span>Login</span>
            <h2>login</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 align-items">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-sign-in-alt"></i></div>
                    <form action="http://localhost:944/core/authentication/verification.php" method="POST">
                        <div>
                            <label for="username">Username :</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div>
                            <label for="password">Password :</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div>
                            <input type="checkbox" id="remember" name="remember" checked>
                            <label for="remember">Remember me</label>
                        </div>
                        <?
                        ?>
                        <div>
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</section>
<!--END LOGIN SECTION-->