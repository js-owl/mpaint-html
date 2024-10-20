<?php header("Content-Type:text/html; charset=UTF-8");
	  $name = htmlspecialchars($_POST["name"]);
	  $phone = htmlspecialchars($_POST["phone"]);
	
	mail('aklimovskikh@yandex.ru', 'Call me', "Please call to $name with phone $phone");