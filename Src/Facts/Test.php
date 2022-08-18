<?php
//© 2022 Martin Peter Madsen
namespace MTM\QR\Facts;

class Test extends Base
{
	public function execute()
	{
		$this->receive();
	}
	public function receive()
	{
		
		$sockObj	= socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		socket_bind($sockObj, "0.0.0.0", 5353);
		socket_set_nonblock($sockObj);
		socket_set_option($sockObj, SOL_SOCKET, SO_BROADCAST, 1);
		socket_set_option($sockObj, SOL_SOCKET, SO_REUSEADDR, 1);
		socket_set_option($sockObj, SOL_SOCKET, SO_REUSEPORT, 1);
		socket_set_option($sockObj, IPPROTO_IP, MCAST_JOIN_GROUP, array("group" => "224.0.0.251", "interface" => "vlan3515"));

		$x			= 0;
		$tTime		= time() + 600;
		while (true) {

			$data		= socket_read($sockObj, 1024, PHP_BINARY_READ);
			$dLen		= strlen(trim($data));
			if ($dLen > 0) {
				$x++;
				$hexData	= bin2hex($data);
				echo $x." -- ".(strlen($hexData) / 2)." -- ".$hexData."\n\n";

			} elseif (time() > $tTime) {
				break;
			} else {
// 				if ($x % 150 === 0) {
// 					echo "Nothing: ".$x."\n";
// 				}
				
				usleep(10000);
			}
		}
		
		echo "\n <code><pre> \nClass:  ".__CLASS__." \nMethod:  ".__FUNCTION__. "  \n";
		//var_dump($_SERVER);
		echo "\n 2222 \n";
		//print_r($_GET);
		echo "\n 3333 \n";
		print_r($_POST);
		echo "\n ".time()."</pre></code> \n ";
		die("end");
	}
	public function transmit()
	{
		$ip			= "0.0.0.0";
		$port		= 5353;
		$sockObj	= socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		socket_bind($sockObj, $ip, $port);
		socket_set_nonblock($sockObj);
		
		// 		socket_set_option($sockObj, SOL_SOCKET, SO_BINDTODEVICE, "vlan3515");
		socket_set_option($sockObj, SOL_SOCKET, SO_BROADCAST, 1);
		socket_set_option($sockObj, SOL_SOCKET, SO_REUSEADDR, 1);
		socket_set_option($sockObj, SOL_SOCKET, SO_REUSEPORT, 1);
		socket_set_option($sockObj, IPPROTO_IP, MCAST_JOIN_GROUP, array("group" => "224.0.0.251", "interface" => "vlan3515"));
		// 		socket_set_option($sockObj, IPPROTO_IP, IP_MULTICAST_TTL, 1);
		
		
		
		
		
		$x			= 0;
		$tTime		= time() + 120;
		while (true) {
			$x++;
			
			$data		= socket_read($sockObj, 1024, PHP_BINARY_READ);
			$dLen		= strlen(trim($data));
			if ($dLen > 0) {
				
				echo "\n <code><pre> \nClass:  ".__CLASS__." \nMethod:  ".__FUNCTION__. "  \n";
				var_dump($data);
				echo "\n 2222 \n";
				//print_r($_GET);
				echo "\n 3333 \n";
				print_r($data);
				echo "\n ".time()."</pre></code> \n ";
				die("end");
				
			} elseif (time() > $tTime) {
				throw new \Exception("Read Timeout", 13465);
			} else {
				if ($x % 150 === 0) {
					echo "Nothing: ".$x."\n";
				}
				
				usleep(10000);
			}
		}
		
		echo "\n <code><pre> \nClass:  ".__CLASS__." \nMethod:  ".__FUNCTION__. "  \n";
		//var_dump($_SERVER);
		echo "\n 2222 \n";
		//print_r($_GET);
		echo "\n 3333 \n";
		print_r($_POST);
		echo "\n ".time()."</pre></code> \n ";
		die("end");
	}
}