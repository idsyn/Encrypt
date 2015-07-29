<?php 

final class Des {
	var $iv;

	function Des($k) {
		$this->iv = $this->getDesKey($k);
	}

	//加密
	public function Encrypt($data, $k) {
		if (empty($k) || empty($data)) {
			return '';
		}

		try {
			$size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_CBC);
	        $str = $this->pkcs5Pad($data, $size);
	        return strtoupper(bin2hex(mcrypt_cbc(MCRYPT_DES, $this->iv, $str, MCRYPT_ENCRYPT, $this->iv)));
		} catch (Exception $e) {
			return '加密失败';
		}
	}

	//解密
	public function Decrypt($data, $k) {
		if (empty($k) || empty($data)) {
			return '';
		}
		
		try {
			$strBin = $this->hex2bin(strtolower($data));
        	$str = mcrypt_cbc(MCRYPT_DES, $this->iv, $strBin, MCRYPT_DECRYPT, $this->iv);
        	return $this->pkcs5Unpad($str);
		} catch (Exception $e) {
			return '解密失败';
		}		
	}

	function getDesKey($k) {
		return substr(strtoupper(hash('md5', $k)), 0, 8);
	}

	function hex2bin($hexData) {
        $binData = '';  
        for ($i = 0; $i < strlen($hexData); $i += 2) {
            $binData .= chr(hexdec(substr($hexData, $i, 2)));
        }
        return $binData;
    }  

	function pkcs5Pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text.str_repeat(chr($pad), $pad);
    }

    function pkcs5Unpad($text) {
        $pad = ord($text {strlen($text) - 1});
        if ($pad > strlen($text))
            return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
            return false;
        return substr($text, 0, -1 * $pad);
    }
}

?>