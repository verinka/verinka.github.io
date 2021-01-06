<?php
// Файлы phpmailer
require 'class.phpmailer.php';
require 'class.smtp.php';

$name = $_POST['name'];
$contact = $_POST['contact'];
$text = $_POST['text'];
$budget = $_POST['budget'];

// Настройки
$mail = new PHPMailer;

$mail->isSMTP(); 
$mail->Host = 'smtp.yandex.ru';  
$mail->SMTPAuth = true;                      
$mail->Username = 'temple404'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'PA46G0Gu1hb7leRFznFoNmDOT'; // Ваш пароль
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;
$mail->setFrom('temple404@yandex.ru'); // Ваш Email
$mail->addAddress('kaverintech@gmail.com'); // Email получателя

// Прикрепление файлов
  for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
        $filename = $_FILES['userfile']['name'][$ct];
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }   
                                 
// Письмо
$mail->isHTML(true);
//кодировка
$mail->CharSet = 'UTF-8';
$mail->Encoding = '8bit';
// Заголовок письма
$mail->Subject = "Заявка с портфолио: $name";
$mail->ContentType = "text/html; charset=utf-8\r\n";
$mail->Body    = "<table cellspacing='0' cellpadding='10' rules='rows' border='1' bordercolor='#dddddd'>
    <tr bgcolor='#f5f5f5'>
        <td><strong>Имя</strong></td>
        <td> $name </td>
    </tr>
    <tr>
        <td><strong>Телефон</strong></td>
        <td> $contact </td>
    </tr>
    <tr bgcolor='#f5f5f5'>
        <td width='150'><strong>Текст:</strong></td>
        <td> $text </td>
    </tr>
</table>"; // Текст письма

// Результат
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'ok';
}
?>