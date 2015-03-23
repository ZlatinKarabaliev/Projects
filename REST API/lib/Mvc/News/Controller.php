<?php
namespace Mvc\News;

class Controller {
	
	/**
	 *
	 * @var \Core\DBAL\Repository
	 */
	protected $repository;
	
	/**
	 *
	 * @var \Core\Request
	 */
	protected $request;
	
	public function __construct(\Core\Request $request) {
		$this->repository = new \Core\DBAL\Repository('news', '\\Mvc\\News\\NewsEntity', 'hydrate', 'toArray');
		$this->request = $request;
	}
	
	public function listItems() {
		
		if ( $this->request->method() != \Core\Request::METHOD_GET ) {
			return array('error'=>'invalid http verb');
		}
		
		$items = $this->repository->listItems();
		
		$data = array();
		
		foreach ($items as $item) {
			$data[] = $item->toArray();
		}
		
		return $data;
		
	}
	
	public function showItem($id) {
		
		if ( $this->request->method() != \Core\Request::METHOD_GET ) {
			return array('error'=>'invalid http verb');
		}
		
		$item = $this->repository->loadById($id);
		
		return $item->toArray();
		
	}
	
	public function deleteItem($id) {
		
		if ( $this->request->method() != \Core\Request::METHOD_POST ) {
			return array('error'=>'invalid http verb');
		}
		
		$item = $this->repository->loadById($id);
		
		$this->repository->delete($item);
		
		return array('success'=>true);
		
	}
	
	public function updateItem($id) {
		if ( $this->request->method() != \Core\Request::METHOD_POST ) {
			return array('error'=>'invalid http verb');
		}
		
		$item = $this->repository->loadById($id);
		
		$item->setTitle($this->request->post('title',$item->getTitle()));
		$item->setDate($this->request->post('date',$item->getDate()));
		$item->setText($this->request->post('text',$item->getText()));
		
		$this->repository->update($item);
		
		return array('success'=>true);
	}
	
	
}
