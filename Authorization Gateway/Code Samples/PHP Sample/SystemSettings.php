<?php
// /*----------------------------------------------
// Author: SDK Support Group
// Company: Paya
// Contact: sdksupport@paya.com
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!! Samples intended for educational use only!!!
// !!!        Not intended for production       !!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------------------------------------------*/

/**
 * SystemSettings class
 * @author 
 */
class SystemSettings {

	/**
	 * Returns an array of configuration options set in config.ini
	 * @author 
	 * @return array
	 */
	public static function get() {
		$config = parse_ini_file('config.ini');
		return $config;
	}
}

?>
