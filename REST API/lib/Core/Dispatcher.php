<?php
namespace Core;

class Dispatcher {
	
	protected $routes = array();
	
	public function __construct($routes) {
		foreach ( $routes as $route ) {
			$missingKeys = array_diff(array('route','controller','action'), array_keys($route));
			if ( count($missingKeys) != 0 ) {
				throw new \Exception("There is an error in the route declaration ".json_encode($route));
			}
		}
		
		$this->routes = $routes;
		
		
	}
	
	public function dispatch($url) {
		
		$controller = null;
		$action = null;
		$args = array();
		
		foreach ( $this->routes as $route ) {
			if (preg_match("%^{$route['route']}$%i", $url, $args) ) {
				$controller = $route['controller'];
				$action = $route['action'];
				break;
			}
		}
		
		array_shift($args);
		
		if ( empty($controller) || !class_exists($controller) ) {
			$this->notFound();
		}
		
		$controllerInstance = new $controller(new Request());
		
		try {
			$response = call_user_func_array(array($controllerInstance,$action), $args);
		} catch (\Exception $e) {
			$response = array('error' => $e->getMessage());
		}
		
		$this->respond($response);
		
	}
	
	protected function notFound() {
		header("HTTP/1.0 404");
		exit();
	}
	
	protected function respond($response) {
		echo json_encode($response); 
		exit;
	}
	
}
