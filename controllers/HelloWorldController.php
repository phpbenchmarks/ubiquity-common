<?php
namespace PhpBenchmarksUbiquity\HelloWorld\controllers;
 /**
 * Controller HelloWorldController
 **/
class HelloWorldController extends \Ubiquity\controllers\Controller{

	/**
	* @route("/benchmark/helloworld")
	**/
	public function index(){
		echo "Hello World !";
	}

}
