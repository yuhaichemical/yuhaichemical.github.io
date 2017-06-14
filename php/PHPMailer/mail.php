<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yu Hai Chemical Mailer</title>
<style type="text/css">
<!--
body {
	font-size: 12px;
	color: #006600;
	text-align: center;
}
-->
</style>
</head>
<body>

<?php
header("Content-Type: text/html;charset=utf-8"); 
//error_reporting(E_ALL);
error_reporting(E_STRICT);

//date_default_timezone_set('America/Toronto');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$mail->CharSet = 'utf-8';

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);
$name    = trim($_POST['name']);
$email   = trim($_POST['email']);
$url     = trim($_POST['url']);
$message = trim($_POST['message']);

$lang = trim($_POST['lang']);

$contents = "<h1>服务咨询信息</h1>" . "姓名：" . $name . "<br>E-mail:" . $email . "<br>网站：" . $url . "<br>内容：" . $message;


$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "yuhaiinfo@gmail.com";  // GMAIL username
$mail->Password   = "yuhaichem";            // GMAIL password

$mail->SetFrom('info@yuhaichemical.cn', '服务咨询');

$mail->AddReplyTo('info@yuhaichemical.cn', '服务咨询');

$mail->Subject    = "服务咨询信息 - " . $name;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($contents);

$address = "info@yuhaichemical.cn";
$mail->AddAddress($address, "Yu Hai Chemical");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	if (!strcmp($lang, "chs"))
		echo "您的信息已发出，我们会尽快答复，请耐心等候。";
	else if (!strcmp($lang, "cht"))
		echo "您的資訊已發出，我們會儘快答覆，請耐心等候。";
	else if (!strcmp($lang, "en"))
  		echo "Message sent, we will reply as soon as possible.";
}

?>

</body>
</html>