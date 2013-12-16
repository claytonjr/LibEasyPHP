<?php

/**
 * LibCrypto - A library containing crypto specific funtions. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibCrypto
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Crypto {

	/**
	 * The Sha1() function calculates the SHA-1 hash of a string. The Sha1() function uses the US Secure Hash Algorithm 1.
	 * 
	 * From RFC 3174 - The US Secure Hash Algorithm 1: "SHA-1 produces a 160-bit output called a message digest. The message digest can then, for example, be input to a signature algorithm which generates or verifies the signature for the message. Signing the message digest rather than the message often improves the efficiency of the process because the message digest is usually much smaller in size than the message. The same hash algorithm must be used by the verifier of a digital signature as was used by the creator of the digital signature."
	 *
	 * @param string $String Required. No default. The string to be calculated
	 * @param boolean $Raw Optional. Default is False. Specify hex or binary output format: TRUE - Raw 20 character binary format. FALSE - Default. 40 character hex number
	 * @return various $Sha1 Returns the calculated SHA-1 hash on success, or FALSE on failure
	 */

	public function Sha1($String, $Raw = False) {
		$Sha1 = sha1($String, $Raw);
		return $Sha1;
	}

	public function Md5($String, $Raw = False) {
		$Md5 = md5($String, $Raw);
		return $Md5;
	}

	public function Rot13($String) {
        $Rot13 = str_rot13($String);
        return $Rot13;
    }	

	public function ShowAlgorithms() {
		$ShowHashAlgorithms = hash_algos();
		return $ShowHashAlgorithms;
	}
}

?>
