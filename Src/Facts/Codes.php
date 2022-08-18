<?php
//© 2022 Martin Peter Madsen
namespace MTM\QR\Facts;

class Codes extends Base
{
	public function getV1()
	{
		if (array_key_exists(__FUNCTION__, $this->_s) === false) {
			$this->_s[__FUNCTION__]		= new \MTM\QR\Models\V1\Zulu();
		}
		return $this->_s[__FUNCTION__];
	}
}