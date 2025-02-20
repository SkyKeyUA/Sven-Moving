<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     //SMTP username
	$mail->Password   = 'secret';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	//От кого письмо
	$mail->setFrom('veremiienkoov96@hirewebdeveloperincanada.com', 'hirewebdeveloperincanada'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('veremiienkoov96@gmail.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'hirewebdeveloperincanada! It is "hirewebdeveloperincanada"';


	//Тело письма
	$body = '<h1>Somebody needs Moving services!</h1>';
	
	if(trim(!empty($_POST['firstname']))){
		$body.='<p><strong>First name:</strong> '.$_POST['firstname'].'</p>';
	}	
	if(trim(!empty($_POST['lastname']))){
		$body.='<p><strong>Last name:</strong> '.$_POST['lastname'].'</p>';
	}	
	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Phone number:</strong> '.$_POST['phone'].'</p>';
	}	
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['location']))){
		$body.='<p><strong>Calgary or outside Calgary:</strong> '.$_POST['location'].'</p>';
	}	
	if(trim(!empty($_POST['propertyType']))){
		$body.='<p><strong>Private or commercial, if private, then how many bedrooms:</strong> '.$_POST['propertyType'].'</p>';
	}		
	if(trim(!empty($_POST['residence']))){
		$body.='<p><strong>House or apartment:</strong> '.$_POST['residence'].'</p>';
	}	
	if(trim(!empty($_POST['floor']))){
		$body.='<p><strong>What floor (is there an elevator or not):</strong> '.$_POST['floor'].'</p>';
	}	
	if(trim(!empty($_POST['weight']))){
		$body.='<p><strong>Heavy items (more than 220lb):</strong> '.$_POST['weight'].'</p>';
	}	
	

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'The data has been sent!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>