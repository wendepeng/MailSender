<?php 
require 'PHPMailer\PHPMailerAutoload.php';

function postmail($server,$port,$username,$password,$to,$subject,$body){
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $server;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $username;                 // SMTP username
    $mail->Password = $password;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $port;                                    // TCP port to connect to

    $mail->From = $username;
    $mail->FromName = '';
    $mail->addAddress($to);     // Add a recipient
    //$mail->addReplyTo('wendepeng@jeemoo.net', 'wendepeng');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
}

//postmail('smtp.163.com',25,'13671339869@163.com','5iportal','970211002@qq.com','Here is the subject','This is the HTML message body <b>in bold!</b>');