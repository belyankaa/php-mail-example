<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'PHPMailer/language/');
$mail->IsHTMl(true);


$mail->Host = 'ssl://serverXXX.hosting.reg.ru';
$mail->Port = 465;
$mail->Username = 'belyankaa@belyankaa.ru';
$mail->Password = '556123wwE';

//От кого
$mail->setFrom('belyankaa@belyankaa.ru', 'Тест');

//Кому
$mail->addAddress('nbelogurov.04@bk.ru');


$mail->Subject = 'Походу работает';

$body = 'Здравствуйте, <br/> это работает';

$data = json_decode(file_get_contents('php://input'), true);

$body .= 'MAIL:' . $data['email'];
$body .= '<br/>NUMBER:' . $data['number'];
$body .= '<br/>TEXT:' . $data['text'];


$mail->msgHTML($body);

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Готово';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);