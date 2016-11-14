<?php
/**
 *
 * @author Vũ Bắc
 * @since 2012-05-12
 * @version 1.0
 */
require_once( get_template_directory() . '/inc/phpmailer/class.phpmailer.php' );

if( !class_exists( 'SendEmailEDM' ) ){

  class SendEmailEDM {
    function SendEmailEDM(){
      $this->__construct();
    }

    /**
    * PHP 5 Constructor
    */
    function __construct($exceptions = false) {
      $this->exceptions = ($exceptions == true);
    }

    function _init() {
      // Add admin submit handling.
      //$this->SendEDM();
    }

    public function SendEDM( $to, $result = array() ){
      $mail = new PHPMailer();

      $mail->IsSMTP();
      $mail->IsHTML(true);
      $mail->Host       = SMTP_HOST;
      $mail->SMTPDebug  = 1;
      $mail->SMTPAuth   = SMTP_AUTH;
      $mail->Port       = 25;
      $mail->Username   = SMTP_USER;
      $mail->Password   = SMTP_PASSWORD;

      // Thông tin nguoi gui và Email nguoi gui
      $mail->SetFrom("noreply@byallamoda.com","Byallamoda");

      //Thiet lap thông tin nguoi nhan
      $mail->AddAddress($to, "Member");
      $mail->CharSet = "utf-8";

      $subject  = "Contact Us From Byallamoda";
      $body = file_get_contents("edm/contactus.html");
      $body = str_replace('_#username#_', 'Admin', $body);
      $body = str_replace('_#fullname#_', $result['fullname'], $body);
      $body = str_replace('_#email#_', $result['email'], $body);
      $body = str_replace('_#message#_', $result['message'], $body);

      $mail->Subject  = $subject;
      $mail->Body = $body;
      $mail->Send();
    }
  }
}
?>