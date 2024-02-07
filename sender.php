<?php
//    $name = $_POST['name'];
//    $surname = $_POST['surname'];
//	$phone = $_POST['phone'];
//    $email = $_POST['email'];
//    $text = $_POST['text'];
//
//	$to = "rostikglovac@gmail.com";
//	$date = date ("d.m.Y");
//	$time = date ("h:i");
//	$from = $email;
//	$subject = "Заявка з сайту";
//
//
//	$msg="
//    Ім'я: $name /n
//    Прізвище: $surname /n
//    Телефон: $phone /n
//    Пошта: $email /n
//    Текст: $text";
//	mail($to, $subject, $msg, "From: $from ");
//
//?>

<!--<p>Дякуємо,форма відправлена успішно</p>-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Отримання даних з форми
	$name = $_POST["name"];
//	$email = $_POST["email"];
	$message = $_POST["message"];
    $comment = $_POST["comment"];

	// Підготовка електронного листа
	$to = "rostikglovac@gmail.com";
	$subject = "Нове повідомлення від $name";
//	$headers = "From: $email\r\n";
//	$headers .= "Reply-To: $email\r\n";
//	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$mailBody = "Ім'я: $name<br>";
//	$mailBody .= "Email: $email<br>";
	$mailBody .= "Повідомлення:<br>$message";
	$mailBody .= "Кількість штук:<br>$comment";

	// Відправлення листа
	if (mail($to, $subject, $mailBody)) {
		echo "Лист успішно відправлено.";
	} else {
		echo "Помилка при відправленні листа.";
	}
}
?>