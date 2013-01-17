<?php
/**
 * Common class.
 * To use extention.
 */
class Common {
	/**
	 * Getter.
	 * @param string $name Name of getter.
	 * @return mix
	 */
	function __get($name) {
		$method_name = 'get'. $name;
		if ( method_exists($this, $method_name) ) {
			return $this->$method_name();
		} else if (property_exists($this, $name) ) {
			return $this->$name;
		} else {
			throw new CommonException();
		}
	}
	function __set($name, $value) {
		$method_name = 'set'. $name;
		if ( method_exists($this, $method_name) ) {
			return $this->$method_name($value);
		} else if (property_exists($this, $name) ) {
			$this->$name = $value;
		} else {
			throw new ErrorException();
		}
	}
	function __construct() {
		$this->init();
	}
	function __destruct() {
		$this->end();
	}
	
	function init() {}
	function end() {}
	
	function setConfig($name, $value = null) {
		ConfigLoader::setConfig($name, $value);
	}
	function getConfig($name){
		return ConfigLoader::getConfig($name);
	}
}