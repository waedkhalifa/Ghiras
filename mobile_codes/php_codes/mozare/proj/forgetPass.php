<?php
use PHPMailer\PHPMailer\PHPMailer;


    $myEmail=$_POST['myEmail'];
    $myName=$_POST['myName'];

    $db = new mysqli('localhost', 'root', '', 'mozare');

    $VC=rand(100000,999999);

                require_once "phpMailer/PHPMailer.php";
                require_once "phpMailer/Exception.php";
                require_once "phpMailer/SMTP.php";

                $mail=new PHPMailer();

                $mail->isSMTP();
                $mail->Host ="smtp.gmail.com";
                $mail->SMTPAuth=true;
                $mail->Username="libmastersystem2021@gmail.com";
                $mail->Password="rpgnswafywxouftr";
                $mail->Port=465;
                $mail->SMTPSecure="ssl";

                $sub="password";


                $mail->isHTML(true);
                $mail->setFrom($myEmail,"");
                $mail->addAddress($myEmail);
                $mail->Subject =("Password recovery");
                $mail->Body="Welcome, $myName. It seems that you have forgotten your password.And based on your special request, we have sent this email to help you.\n
                Your verification code is \n $VC \n use it to verify your account.\n \n \n \n With regards \n Green Thumb Family";

                if($mail->send())
                {

                    echo json_encode(array("VC"=>"$VC"));
                }

                else

                {
                    $status="";
                    $response="";
                }

                //exit(json_encode(array("status"=>$status , "respons"=>$response)));

