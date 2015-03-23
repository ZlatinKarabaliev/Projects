<?php
$routes = [
	['route'=>'news','controller'=>'\\Mvc\\News\\Controller','action'=>'listItems'],
	['route'=>'news/(\d+)','controller'=>'\\Mvc\\News\\Controller','action'=>'showItem'],
	['route'=>'news/(\d+)/update','controller'=>'\\Mvc\\News\\Controller','action'=>'updateItem'],
	['route'=>'news/(\d+)/delete','controller'=>'\\Mvc\\News\\Controller','action'=>'deleteItem'],
];
