<?php
function back_call(){
			
		
		if($_POST['lastname']) $arr['lastname'] = trim($_POST['lastname']);			
		if($_POST['email']) $arr['email'] = trim($_POST['email']);					
		if($_POST['phone']) $arr['phone'] = trim($_POST['phone']);	
		if($_POST['comment']) $arr['comment'] = trim($_POST['comment']);	



		if( empty($arr['lastname']) ) {
			$arr['res'] = "Не заполнено поле Имя!";
			echo json_encode($arr);
			 exit;
		}
			
		if( empty($arr['phone']) ) {
			$arr['res'] = "Не заполнено поле Телефон!";
			echo json_encode($arr);
			exit;
		}

		if( empty($arr['email']) ) {
			$arr['res'] = "Не заполнено поле E-mail!";
			echo json_encode($arr);
			exit;
		}		
			
		if( preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $arr['email']) )
		{

			$to = 'myboxspb@mail.ru'; /* 21arenda@gmail.com */
			$sitename = $_SERVER['HTTP_HOST'];
			$subject = "Заявка от клиента (Тротуарные плитки)";
			$message = "Имя: " .$arr['lastname'].  "\r\nТелефон: " . $arr['phone']."\r\nКомментарий: \r\n" . $arr['comment']."\r\n";
			$headers = "From: {$sitename} <" .$arr['email']. ">\r\nContent-type:text/plain; charset=utf-8\r\n";
			mail($to,$subject,$message,$headers);
			$arr['res'] = 'success';
			echo json_encode($arr); 
		}
		else{
			$arr['res'] = 'Некоректный e-mail!'; 
			echo json_encode($arr);
		 }
}
back_call();
?>
