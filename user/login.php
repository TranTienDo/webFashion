<link rel="stylesheet" href="asset/css/styleLogin.css">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem có thông báo lỗi không
$error = isset($_GET['error']) ? $_GET['error'] : '';

// Biến để giữ thông báo lỗi
$errorMessage = "";

// Xử lý lỗi "invalid_credentials"
if ($error === 'invalid_credentials') {
    $errorMessage = "Email hoặc mật khẩu không chính xác";
}
?>


<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='<?= PATH ?>page=doLogin' method="POST" id='formLogin' />
            <fieldset>
                <div id="legend">
                    <legend class="Namelogin">
                        <h2>Login</h2>
                    </legend>
                </div>

                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="Enter email" class="input-xlarge"
                            value="" />

                    </div>
                </div>
                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="Enter Password"
                            class="input-xlarge" value="" />
                    </div>
                </div>

               <div class="ErrorMessage">
               <?php
                if (isset($errorMessage)) {
                    echo "<p class='text-danger'>$errorMessage</p>";
                    
                }
                ?>
               </div>

                <div class="form-check mb-3">
                    <label class="form-check-label"></label>
                    <input class="form-check-input" type="checkbox" name="remember" /> remember

                </div>

                <div class=" Forgot-password mb-3">
                    <a href="">Forgot password?</a>

                </div>


                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-primary btn-block btn-large">Login</button>
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>