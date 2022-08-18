<?php
//© 2022 Martin Peter Madsen
namespace MTM\QR;

class Facts
{
	//USE: $aFact		= \MTM\QR\Facts::__METHOD_();
	
	protected static $_s=array();
	
	public static function getCodes()
	{
		if (array_key_exists(__FUNCTION__, self::$_s) === false) {
			self::$_s[__FUNCTION__]	=	new \MTM\QR\Facts\Codes();
		}
		return self::$_s[__FUNCTION__];
	}
}