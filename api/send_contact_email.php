<?php
require_once('apilib.php');
require_once('../PHPMailer-master/src/PHPMailer.php');

$message = var_check("message", true);
send_email(render_body($message, 'User'));
//work in progress
function render_body($message,$name){
    $data = array('message'=>$message,'name'=>$name);
    if($GLOBALS['Setting_instance']!=null) $data['instance'] = $GLOBALS['Setting_instance'];
    $file_path = '../html/contact_email.php';
    $html_body = html_template($file_path,$data);

    return $html_body;
}
function send_email($body){
    $to = 'bebelthomaz@gmail.com';
    $from = var_check("email", true);
    $subject = var_check("subject", true);

    $mail = new PHPMailer;

    $mail->isHTML(true);

    $mail->setFrom($from, 'User');
    $mail->addAddress($to, 'Admin');

    $mail->Subject = $subject;
    $mail->Body = $body;

    if(!$mail->send()) {
         echo 'Message could not be sent. ';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.<br>';
        echo "Thank you for your feedback! We'll get back to you as soon as possible!";
    }
}
?>
