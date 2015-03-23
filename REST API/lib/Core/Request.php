<?php
namespace Core;

class Request {
	
	protected $get;
	protected $post;
	protected $request;
	protected $cookie;
	protected $url;
	protected $files;
	protected $method;
	
	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';
	
	public function __construct() {
		$this->get = $_GET;
		$this->post = $_POST;
		$this->request = $_REQUEST;
		$this->cookie = $_COOKIE;
		$this->files = $_FILES;
		$this->url = $_SERVER['SCRIPT_NAME'];
		$this->method = $_SERVER['REQUEST_METHOD'];
	}
	
	public function getUrl() {
		return $this->url;
	}
	
	public function get($name = '', $defaultValue = null) {
		return $this->fetchValue($name, $this->get, $defaultValue);
	}
	
	public function post($name = '', $defaultValue = null) {
		return $this->fetchValue($name, $this->post, $defaultValue);
	}
	
	public function request($name = '', $defaultValue = null) {
		return $this->fetchValue($name, $this->request, $defaultValue);
	}
	
	public function cookie($name = '', $defaultValue = null) {
		return $this->fetchValue($name, $this->cookie, $defaultValue);
	}
	
	public function files($name = '', $defaultValue = null) {
		return $this->fetchValue($name, $this->files, $defaultValue);
	}
	
	public function method() {
		return $this->method;
	}
	
	protected function fetchValue( $name, $superGlobal, $default = null ) {
		
		if ( empty($name) ) {
			return $superGlobal;
		}
		
		if ( !array_key_exists($name, $superGlobal) ) {
			return $default;
		}
		
		return $superGlobal[$name];
		
	}
	
}

