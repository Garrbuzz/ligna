<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$product = $_POST['product'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.adm.tools';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sellligna@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'TempLigna20'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('sellligna@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('sale@ligna.com');     // Кому будет уходить письмо 
$mail->isHTML(true);                     // Set email format to HTML

$mail->Subject = 'Заявка на покупку з сайту';
$mail->Body    = '' .$name . ' залишив заявку на покупу товару : '.$product. '<br> Телефон : ' .$phone;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: Thank_page.html');
}
?>