<?php

require_once('Password.php');
$password = new Password(array(
				'count' => (int)$_GET['wordCount'],
				'maxLen' => (int)$_GET['maxLength'],
				'digit' => (bool)$_GET['includeDigit'],
				'symbol' => (bool)$_GET['includeSymbol'],
				'case' => (int)$_GET['wordCase']
			));

die(json_encode(array('type' => 'message', 'text' => $password->generatePassword())));
