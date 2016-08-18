<?php
define('admin_email','your@domain.com'); // Change admin email here for example admin@yoursite.com
define('website_name','Vapour'); // Change website name here for example yoursite.com
define('website_url', 'http://'.$_SERVER['HTTP_HOST']);
define('EMAIL_FROM', 'noreply@'.$_SERVER['HTTP_HOST']);

function strict_secure($str){
	$str = strip_tags(trim($str));
	return $str;
}
function sendEmail($to,$from,$subject,$message,$headname){
	$headers="MIME-Version: 1.0" . "\r\n";
	$headers.="Content-type: text/html; charset=utf-8" . "\r\n";
	$headers.="From: ".$headname.'<'.$from.'>';
	return mail ($to,$subject,$message,$headers);
}


if(isset($_POST['action']) && $_POST['action']=='submitform')
{
	$N = array();
	$N = $_POST['formInput'];	
	$path =  $_SERVER['HTTP_REFERER'];

	$admin_message = '<p>Dear Admin, Form submitted on '.website_url.'<br>Detail is as following.</p>';
	foreach( $N as $label => $value ){
		$admin_message .= '<p>'.ucwords($label).' : '.$value.'</p>';	
	}
	$admin_message .= '<p>Form submitted on URL:<a href="'.$path.'">'.$path.'</a></p>';
	$admin_message .= '<br><br>';
	$admin_message .= 'Regards,<br />
	'.website_name.'<br />
	'.website_url.'
	';

	
	$user_message = 'Dear '.strict_secure($N['name']).',<br>';
	$user_message .= 'Thank you very much for submitting information. We will contact you shortly.';
	$user_message .= 'Regards,<br />
	'.website_name.'<br />
	'.website_url.'
	';

	$admin_subject = 'Form Received From '.website_name;
	$user_subject = 'Thank you - '.website_name;
	
	$sendToAdmin = $sendToUsers = '';

	$sendToAdmin = sendEmail(admin_email,EMAIL_FROM,$admin_subject,$admin_message,website_name);
	if( isset( $N['email'] ) && ! empty( $N['email'] ) ){
		$sendToUsers = sendEmail(strict_secure($N['email']),EMAIL_FROM,$user_subject,$user_message,website_name);
	}
	
	
	if($sendToAdmin || $sendToUsers)
	{
		$message ='Success::<div class="alert alert-success"><strong><i class="fa fa-info message-icon"></i>Message Sent Successfully.</strong></div>';		
	}else{
		$message ='Error::<div class="alert alert-danger"><strong><i class="fa fa-info message-icon"></i>Something Went Wrong While Sending Message.</strong></div>';
	}
	echo $message;
}
exit();
?>