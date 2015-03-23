<?php

namespace Mvc\News;

class NewsEntity {
	
	protected $id = null;
	
	protected $title;
	
	protected $date;
	
	protected $text;
	
	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getDate() {
		return $this->date;
	}

	public function getText() {
		return $this->text;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	public function setText($text) {
		$this->text = $text;
		return $this;
	}
	
	public static function hydrate($data) {
		$entity = new NewsEntity();
		
		foreach ( $data as $name=>$value ) {
			if (property_exists(__CLASS__, $name) ) {
				$entity->$name = $value;
			}
		}
		
		return $entity;
		
	}
	
	public function toArray() {
		
		$data = array();
		
		foreach ( $this as $prop=>$value ) {
			$data[$prop] = $value;
		}
		
		return $data;
		
	}


	
}
