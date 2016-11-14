<?php

function submitContact(){
  global $wpdb;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $return_data = array();
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $hasError = 0;
    $msg = 'Success';

    if( empty($fullname) || empty($email) || empty($message) ){
      $hasError = 1;
      $msg = 'Please input content';
    }elseif( !is_email($email) ){
      $hasError = 1;
      $msg = 'Email address invalid';
    } else {
      //Insert To DB video log
      $data = array(
        'fullname' => $fullname,
        'email' => $email,
        'message' => $message,
        'created' => date('Y-m-d H:i:s')
      );

      $wpdb->insert($wpdb->prefix . 'contacts', $data);
      $wpdb->insert_id;

      //Send Email
      $emailAdmin = 'vubactest1@gmail.com';
      $result = array( "fullname" => $fullname, "email" => $email, "message" => $message );
      //$send = new SendEmailEDM();
      //$send->SendEDM($emailAdmin, $result);

      $hasError = 0;
      $msg = 'Success';
      wp_redirect(home_url('/'));exit;
    }

    $return_data['error_code'] = $hasError;
    $return_data['msg'] = $msg;
    return $return_data;
  }
}