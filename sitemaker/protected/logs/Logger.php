<?php
class Logger extends Common {
	const INFO = 0;
	const WARNING = 1;
	const ERROR = 2;
	const NOTICE = 3;
	
	private $_levels = array('info', 'warning', 'error', 'notice');
	private $_admin = s_prop('AdminMail');
	
	public function init() {
		foreach ($this->_levels as $level) {
			$file = $level. '.log';
			$content = "";
			file_add_contents($file, $content);
		}
	}
	
	public function log($message, $levelNum = 0) {
		if ( !isset($this->_levels[$level]) ) {
			$levelNum = 0;
		}
		$file = $this->_levels[$levelNum];
		file_add_contents($file, $message);
		
	}
}