<?php

$method = $_SERVER['REQUEST_METHOD'];

var_dump($_POST);
var_dump($_GET);

//Script Foreach
$c = true;
if ( $method === 'POST' ) {
	$admin_email = 'gtasa3box@gmail.com';
	$form_subject = 'Arbitrage52';
	$name = trim($_POST["name"]);
	$number  = trim($_POST["number"]);
	$text = trim($_POST["text"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "") {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

 mail($admin_email, adopt($form_subject), $message, $headers );

 header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
exit;
