<?php

/**
 * LibCrypto - A library containing crypto specific funtions. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.4
 * @copyright (c) 2013, James Clayton
 * @package LibCrypto
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2013-06-01 Initial file creation. -JRC
 * 2013-07-01 Added Sha1, Md5, and Rot13 public functions. -JRC
 * 2013-09-12 Added ShowAlgorithms public function. -JRC
 * 2014-01-27 Added extra documentation. -JRC
 * 2014-01-28 Clean up source, format, et al. -JRC
 */

class Crypto {

	/**
	 * The Sha1() function calculates the SHA-1 hash of a string. The Sha1() function uses the US Secure Hash Algorithm 1.
	 * 
	 * From RFC 3174 - The US Secure Hash Algorithm 1: "SHA-1 produces a 160-bit output called a message digest. The message digest can then, for example, be input to a signature algorithm which generates or verifies the signature for the message. Signing the message digest rather than the message often improves the efficiency of the process because the message digest is usually much smaller in size than the message. The same hash algorithm must be used by the verifier of a digital signature as was used by the creator of the digital signature."
	 * @param string $String Required. No default. The string to be calculated
	 * @param boolean $Raw Optional. Default is False. Specify hex or binary output format: TRUE - Raw 20 character binary format. FALSE - Default. 40 character hex number
	 * @return various $Sha1 Returns the calculated SHA-1 hash on success, or FALSE on failure
	 */

	public function Sha1($String, $Raw = False) {
		$Sha1 = sha1($String, $Raw);
		return $Sha1;
	}

	/**
	 * The Md5() function will calculate the MD5 hash of a string. Calculates the MD5 hash of $String using the RSA Data Security, Inc. MD5 Message-Digest Algorithm, and returns that hash. 
	 * @param string $String Required. No default. The string to be calculated.
	 * @param boolean $Raw Optional. Default is False. If the optional $Raw is set to TRUE, then the MD5 digest is instead returned in raw binary format with a length of 16. 
	 * @return various $Md5 Returns the calculated MD5 hash on success, or FALSE on failure
	 */

	public function Md5($String, $Raw = False) {
		$Md5 = md5($String, $Raw);
		return $Md5;
	}

	/**
	 * The Rot13() will perform the ROT13 transform on a string. Performs the ROT13 encoding on the $String argument and returns the resulting string. The ROT13 encoding simply shifts every letter by 13 places in the alphabet while leaving non-alpha characters untouched. Encoding and decoding are done by the same function, passing an encoded string as argument will return the original version. 
	 * @param string $String Required. No default. The string to be calculated.
	 * @return string $Rot13 Returns the ROT13 version of the given string.
	 */

	public function Rot13($String) {
        $Rot13 = str_rot13($String);
        return $Rot13;
    }

    /**
	 * The ShowAlorithms() will return a numerically indexed array containing the list of supported hashing algorithms.
	 * @return string $Rot13 Returns the ROT13 version of the given string.
	 */	

	public function ShowAlgorithms() {
		$ShowHashAlgorithms = hash_algos();
		return $ShowHashAlgorithms;
	}
}

?>
