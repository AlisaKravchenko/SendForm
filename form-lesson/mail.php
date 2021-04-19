<?php

require('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];

print_r("<pre>");
$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';                // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'robot@allceptik.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'robot235AAmdnJHDs'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('robot@allceptik.ru'); // от кого будет уходить письмо?
$mail->addAddress('alisakravchenko2008@yandex.ru');     // Кому будет уходить письмо
$mail->addAddress('ay232@ya.ru');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body = $body = 'Это не робот ) Это тестовое письмо )))' . $name . ' оставил на сайте заявку с пожеланием связаться с нами по телефону: ' . $phone . '<br>E-mail: ' . $email;
$mail->AltBody = '';

if (!$mail->send()) {
    echo '<h3>Произошла ошибка</h3>';
    echo '<strong>Сообщение:</strong><br>' . $name . ' оставил заявку, его телефон ' . $phone . '<br>Почта этого пользователя: ' . $email . '<br>';
    echo 'Текст письма:<br>';
    echo $body . '<br>';


} else {
    header('location: thank-you.html');
}
?>