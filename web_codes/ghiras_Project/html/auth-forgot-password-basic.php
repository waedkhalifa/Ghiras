<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Forgot Password | Ghiras - Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../planting.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <img src="../assets/img/avatars/logo.png" alt style="height: 90px;width: 200px;margin-left: 75px;margin-bottom: 20px"/>
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                  />
                </div>
                <button class="btn btn-primary d-grid w-100"  name="sub" type="submit">Send Reset Link</button>
              </form>
              <div class="text-center">
                <a href="auth-login-basic.php" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sub'])) {

    $db = new mysqli('localhost', 'root', '', 'mozare');
    $qrystr = "select * from users";
    $res = $db->query($qrystr);
    $e = $_POST['userz'];
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_object();
        if ($row->email == $e)
        {
            $pass=$row->pssword;
            $n=$row->fname;

            require_once "phpMailer/PHPMailer.php";
            require_once "phpMailer/Exception.php";
            require_once "phpMailer/SMTP.php";

            $mail=new PHPMailer();

            $mail->isSMTP();
            $mail->Host ="smtp.gmail.com";
            $mail->SMTPAuth=true;
            $mail->Username="danianazzal118@gmail.com";
            $mail->Password="dania11820498";
            $mail->Port=465;
            $mail->SMTPSecure="ssl";

            $sub="password";


            $mail->isHTML(true);
            $mail->setFrom($e,"");
            $mail->addAddress($e);
            $mail->Subject =("Password recovery");
            $mail->Body="Welcome, $n. It seems that you have forgotten your password.And based on your special request, we have sent this email to help you. Your password is: $pass";

            if($mail->send())
            {
                $status="";
                $response="";
            }

            else

            {
                $status="";
                $response="";
            }

            exit(json_encode(array("status"=>$status , "respons"=>$response)));

        }

        else
        {
            ?>
            <div style="width:300px;height:0;z-index: 1;font-size: 15px;color: red;position: relative;top: -370px;left: 600px">There is an error in the entered e-mail</div>
            <?php
        }
    }


}
?>