<?php
class Setup extends Controller {

	function __construct() {
	   parent::__construct();
	}

	function index() {
	$this->view->title = 'setup';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/index');
	}

    function step1() 
	{
	$this->view->title = 'step1';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step1');    
	}
	
	function step2() 
	{
	$this->view->title = 'step2';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step2');    
	}
	
	function step3() 
	{
	$this->view->title = 'step3';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step3');    
	}
	
	function step4() 
	{
	$this->view->title = 'step4';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step4');    
	}
	
	function step5() 
	{
	$this->view->title = 'step5';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step5');    
	}
	function step6() 
	{
	$this->view->title = 'step6';
	$this->view->msg = 'Installation steps';
	$this->view->render('setup/step6');    
	}
	
	
	
}