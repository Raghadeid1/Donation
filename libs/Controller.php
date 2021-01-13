<?php

class Controller {
	
	function __construct($modelName='Model') {
	
			$this->viewLoader = new LoadView();
			$this->model=new $modelName();
	}

}
