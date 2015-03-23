<?php

namespace Core\DBAL;

class Repository {
	
	/**
	 *
	 * @var Database
	 */
	protected $db;
	
	protected $entityClass;
	
	protected $hydrationMethod;
	
	protected $dehydrationMethod;
	
	protected $table;
	
	public function __construct($table, $entityClass, $hydrationMethod, $dehydrationMethod) {
		$this->db = \Core\ServiceLocator::getInstance('db');
		$this->entityClass = $entityClass;
		$this->hydrationMethod = $hydrationMethod;
		$this->dehydrationMethod = $dehydrationMethod;
		$this->table = $table;
	}
	
	
	public function listItems($where = '', Paginator $paginator = null) {
		
		if ( $paginator === null ) {
			$dbData = $this->db->select($this->table, $where, null, '*', false);
		} else {
			$dbData = $this->db->select($this->table, $where, $paginator->createLimit(), '*', true);
			$paginator->setAllItems($this->db->numFoundRows());
		}
		
		$items = array();
		
		foreach ($dbData as $id => $itemRow) {
			$items[$id] = $this->hydrateEntity($itemRow);
		}
		
		return $items;
	}
	
	
	public function loadById($id) {
		
		$dbData = $this->db->selectById($this->table, $id, '*');
		if (!$dbData) {
			throw new \Exception("Does not exist");
		}
		return $this->hydrateEntity($dbData);
	}
	
	
	public function update($entity) {
		
		$data = $this->deHydrateEntity($entity);
		$id = $data['id'];
		unset($data['id']);
		
		if ( $id === null ) {
			throw new \Exception("Does not exist");
		}
		
		return $this->db->updateById($this->table, $data, $id);
	}
	

	public function delete($entity) {
		
		$data = $this->deHydrateEntity($entity);
		$id = $data['id'];
		
		if ( $id === null ) {
			throw new \Exception("Does not exist");
		}
		
		return $this->db->deleteById($this->table, $id);
		
	}
	

	public function insert($entity) {
		
		$data = $this->deHydrateEntity($entity);
		$id = $data['id'];
		unset($data['id']);
		
		if ( $id !== null ) {
			throw new \Exception("Already exists");
		}
		
		$id = $this->db->insert($this->table, $data);
		
		return $id;
		
		
	}
	
	protected function hydrateEntity($itemRow) {
		return call_user_func(array($this->entityClass, $this->hydrationMethod), $itemRow);
	}
	
	protected function deHydrateEntity($entity) {
		return call_user_func(array($entity, $this->dehydrationMethod));
	}
	
}
