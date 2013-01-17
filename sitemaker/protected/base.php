<?php
function s_prop($name) {
	static $prop = array(
		'AdminMail' => 'admin@localhost',
	);
	if ( !isset($prop[$name]) ) {
		return null;
	}
	return $prop[$name];
}
function file_add_contents($file, &$content) {
	try {
		$string = "";
		if (is_readable($file) ) {
			$string = file_get_contents($file);
			$content = $string. $content;
		}
		file_put_contents($file, $content);
		return true;
		
	} catch (Exception $e) {
		return false;
	}
}