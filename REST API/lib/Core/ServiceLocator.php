<?php
namespace Core;

class ServiceLocator {
	
	protected static $instances = array();
	
	public static function registerInstance($name, $instace) {
		
		self::$instances[$name] = $instace;
		
	}
	
	public static function getInstance($name) {
		
		if (!array_key_exists($name, self::$instances) ) {
			throw new \Exception("$name is not registered in service locator");
		}
		
		return self::$instances[$name];
		
	}
	
}
