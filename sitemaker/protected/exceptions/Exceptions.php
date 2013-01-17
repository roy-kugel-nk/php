<?php
class ExceptionBase extends ErrorException {
	function __construct($message, $parameters = array(), $code = null, $severity = null, $filename = null, $lineno = null, $previous = null) {
		// Get name of sub class.
		$className = get_class($this);
		// Get correct message.
		if (property_exists($this, $message) ) {
			$message = $this->$message;
		}
		// Replace words.
		foreach ($parameters as $key=>$value) {
			$message = str_replace($key, $value, $message);
		}
		
		// Add title to message.
		$message = "{$className}#{$message}";
		// use parent constructer.
		parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
	}
}
class CommonException extends ExceptionBase {
}
class ConfigLoaderException extends ExceptionBase {
	protected $CONTROLER_CONFLICT = "'::CONTROLER::' is conflicted.";
	protected $CONTROLER_NO_SORT = "'::CONTROLER::' has no sort property. Add 'getSort()'.";
	
}
class ControlsLoaderException extends ExceptionBase {
}
class DbException extends ExceptionBase {
}