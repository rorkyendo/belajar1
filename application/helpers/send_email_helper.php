<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendMail'))
{
  function sendMail($subject, $mailContent, $mailTo, $mailFromId, $mailFromName)
  {
      $CI =& get_instance();
      $CI->load->library('email');

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'mulaiaja96@gmail.com',
      'smtp_pass' => 'doremi1234',
      'mailtype'  => 'html',
      'charset'   => 'iso-8859-1',
      'wordwrap'  => TRUE
    );

      $CI->email->set_newline("\r\n");
      $CI->email->clear(TRUE);
      $CI->email->initialize($config);
      $CI->email->from($mailFromId, $mailFromName);
      $CI->email->to($mailTo);
      $CI->email->subject($subject);
      $CI->email->message($mailContent);
      if(!$CI->email->send()){
        echo $CI->email->print_debugger();die;
      }
  }
}
