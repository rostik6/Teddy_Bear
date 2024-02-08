<?php
////    $name = $_POST['name'];
////    $surname = $_POST['surname'];
////	$phone = $_POST['phone'];
////    $email = $_POST['email'];
////    $text = $_POST['text'];
////
////	$to = "rostikglovac@gmail.com";
////	$date = date ("d.m.Y");
////	$time = date ("h:i");
////	$from = $email;
////	$subject = "Заявка з сайту";
////
////
////	$msg="
////    Ім'я: $name /n
////    Прізвище: $surname /n
////    Телефон: $phone /n
////    Пошта: $email /n
////    Текст: $text";
////	mail($to, $subject, $msg, "From: $from ");
////
////?>
<!---->
<!--<!--<p>Дякуємо,форма відправлена успішно</p>-->-->
<!---->
<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//	// Отримання даних з форми
//	$name = $_POST["name"];
////	$email = $_POST["email"];
//	$message = $_POST["message"];
//    $comment = $_POST["comment"];
//
//	// Підготовка електронного листа
//	$to = "rostikglovac@gmail.com";
//
//	$subject = "Нове повідомлення від $name";
////	$headers = "From: $email\r\n";
////	$headers .= "Reply-To: $email\r\n";
////	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//
//	$mailBody = "Ім'я: $name<br>";
////	$mailBody .= "Email: $email<br>";
//	$mailBody .= "Повідомлення:<br>$message";
//	$mailBody .= "Кількість штук:<br>$comment";
//
//	// Відправлення листа
//	if (mail($to, $subject, $mailBody)) {
//		echo "Лист успішно відправлено.";
//	} else {
//		echo "Помилка при відправленні листа.";
//	}
//}
//?>



<?php

/* https://api.telegram.org/bot6400834996:AAE2HdNEdx4QyPS__sHqJxSDG78uC5F3WNQ/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$order= $_POST['order'];
//$email = $_POST['user_email'];
$token = "6400834996:AAE2HdNEdx4QyPS__sHqJxSDG78uC5F3WNQ";
$chat_id = "6735144234";

    switch ($order) {
        case 1:
            $order = "1 штука, ціна - 799 грн";
            break;
        case 2:
            $order = "2 штуки, ціна - 1520 грн";
            break;
        case 3:
            $order = "3 штуки, ціна- 2128 грн ";
            break;
        default:
            $order = "Виникла помилка замовлення, або значення не обрано";
            break;
}

$arr = array(
    'Имя користувача: ' => $name,
    'Телефон: ' => $phone,
    'Замовлення:' => $order
//    'Email' => $email
);

foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
    header('Location: thank-you.html');
} else {
    echo "Error";
}
?>
