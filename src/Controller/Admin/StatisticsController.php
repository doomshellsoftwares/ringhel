<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class StatisticsController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public function index(){ 
	}
	public function add(){ 
	}
	public function edit(){ 
	}

	public function search_word(){ 
	}
	public function failed_searches(){ 
	}

	public function view_articles(){ 
	}	
		
}
