<?php
include_once("base.php");
include_once("exceptions/Exceptions.php");
include_once("Common.php");
include_once("ControlsLoader.php");

class Starter extends Common {
	function start() {
		try {
			ControlsLoader::loadControls();
		} catch (ErrorException $e) {
			echo $e->getMessage();
		}
	}
}