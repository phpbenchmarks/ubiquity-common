<?php
namespace PhpBenchmarksUbiquity\RestApi\controllers\rest;

use Ubiquity\controllers\rest\RestController;
use Ubiquity\events\EventsManager;
use Ubiquity\contents\normalizers\NormalizersManager;
use PhpBenchmarksUbiquity\RestApi\normalizer\UserNormalizer;
use PhpBenchmarksUbiquity\RestApi\normalizer\CommentNormalizer;
use PhpBenchmarksUbiquity\RestApi\normalizer\CommentTypeNormalizer;
use PhpBenchmarksUbiquity\RestApi\eventListener\DefineLocaleEventListener;
use PhpBenchmarksRestData\User;
use PhpBenchmarksRestData\CommentType;
use PhpBenchmarksRestData\Comment;
use PhpBenchmarksRestData\Service;

/**
 * @route("/benchmark/rest","inherited"=>false,"automated"=>false)
 * @rest("resource"=>"")
 */
class RestApiController extends RestController{
	public function initialize(){
		
	}
	
	/**
	 * Returns all objects for the resource $model
	 * @route("cache"=>false)
	 */
	public function index() {
		EventsManager::trigger(DefineLocaleEventListener::EVENT_NAME,$this->translator);
		NormalizersManager::registerClasses([User::class=>UserNormalizer::class,CommentType::class=>CommentTypeNormalizer::class,Comment::class=>CommentNormalizer::class]);
		$datas=NormalizersManager::normalizeArray_(Service::getUsers());
		echo $this->_getResponseFormatter()->toJson($datas);
	}
}

