<?php
require_once("includes/koneksi.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions

if(isset($_POST['btnResPass'])&&isset($_POST['email'])){
  $emailTo = $_POST['email'];
  $code = uniqid(true);
  $command = "INSERT INTO resetpassword (codeunique, email) VALUES('$code', '$emailTo')";
  $query = mysqli_query($koneksi,$command);
  if($query == false){
    exit("Error");
  }


  $mail = new PHPMailer(true);
  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'suvikovaailio@gmail.com';//ini email khusus untuk tubes ini aja jangan ada diganti passwordnya                     //SMTP username
      $mail->Password   = 'dontusethispass25';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('suvikovaailio@gmail.com', 'Suvikova');
      $mail->addAddress($emailTo);     //Add a recipient
      $mail->addReplyTo('no-reply@gmail.com', 'NAH REPLY');

      //Content
      $url = "http://". $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/resetpass.php?code=$code";
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Orari reset password link';
      $mail->Body    = "<h1>Anda telah menginginkan sebuah reset password.</h1>
                          Klik link <a href='$url'>INI</a> untuk melanjutkan";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Link reset password telah dikirim. Cek email atau folder spam email anda.</div>";
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}




?>
