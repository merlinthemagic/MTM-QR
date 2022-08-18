<?php
//© 2021 Datacamo, Inc
$appPath	= realpath(__DIR__."/Enable.php");
if ($appPath !== false) {
	require_once $appPath;
	$testObj	= new \MTM\QR\Facts\Test();
	$testObj->execute();
} else {
	die("MTM QR missing");
}
