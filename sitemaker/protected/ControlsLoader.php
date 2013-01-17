<?php
class ControlsLoader extends Common {
	private $_controls = array();
	
	static function loadControls() {
		$controlList = array();
		if ( is_dir($dir = __DIR__.'/controls') ) {
			// Open directory.
			if ( $dh = opendir($dir) ) {
				// Get file names.
				while( ($file = readdir($dh)) !== false ) {
					if (  preg_match("|([^\.]+)\.php|", $file, $match) !== false
					   && file_exists($dir. $file) ) {
						include_once($dir. $file);
						$className = $match[1];
						$controler = new $className;
						$controlList[] = $controler;
					}
				}
				
				// Close directory.
				closedir($dh);
			}
		}
		
		foreach ($controlList as $controler) {
			if ( method_exists($controler, "getSort") ) {
				if ( isset(self::$_controls[$controler->getSort()]) ) {
					$className = get_class($controler);
					throw new ControlsLoaderException('CONTROLER_CONFLICT', array('::CONTROLER::' => $className));
				}
			} else {
				throw new ControlsLoaderException('CONTROLER_NO_SORT', array('::CONTROLER::' => $className));
			}
		}
		
		
	}
}