<?php
/**
 * Copyright 2009-2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2009-2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('TagsAppController', 'Tags.Controller');

/**
 * Tags Controller
 *
 * @package tags
 * @subpackage tags.controllers
 */
class TagsController extends TagsAppController {

/**
 * Uses
 *
 * @var array
 */
	public $uses = array(
		'Tags.Tag'
	);

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Session',
		'Paginator'
	);

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array(
		'Html', 'Form'
	);

	public $paginate = array();

/**
 * Ajaxlist action
 *
 * @return void
 */
	public function ajaxlist() {
		$this->autoRender = false;
		$this->{$this->modelClass}->recursive = 0;
		$options = array('fields'=>array('Tag.id','Tag.name','Tag.keyname'),'conditions'=>array('Tag.name LIKE' => '%'.$this->request->query['term'].'%'));
		$tags = $this->Tag->find('all',$options);
		$x = 0;
		$data = array();
		foreach($tags as $tag){
			$data[$x]['id'] = trim($tag['Tag']['id']);
			$data[$x]['name'] = trim($tag['Tag']['name']);
			$data[$x]['value'] = trim($tag['Tag']['keyname']);
			$x++;
		}
		echo json_encode($data);
	}

/**
 * Index action
 *
 * @return void
 */
	public function index() {
		$this->{$this->modelClass}->recursive = 0;
		$this->set('tags', $this->Paginator->paginate());
	}

/**
 * View
 *
 * @param string $keyName Tag key name
 * @return void
 */
	public function view($keyname = null) {
		if(empty($keyname)){
			$keyname = $this->request->params['keyname'];
		}
		//try {
			$this->set('tag', $this->{$this->modelClass}->find('first',array(
				'contain'=>array('Tagged'),
				'conditions'=>array('Tag.keyname'=>$keyname)
				)));
			//$articles = $this->Tag->Tagged->find('tagged', array(
			//	'contain'=>array('Tag','Article.User'),
			//	'by' => $keyname,
			//	'model' => 'Article'));

            $this->paginate['Tagged'] = array(
            	'order' => 'created DESC',
				'paramType' => 'querystring',
				'contain'=>array('Tag','Article.User','Article.Channel'),
                'model' => 'Article',
                'tagged',
                'by' => $keyname,
                );
            $this->Paginator->settings = $this->paginate;
            $articles = $this->Paginator->paginate('Tagged');

			$x = 0;
			foreach($articles as $article){
				$articles[$x]['Article'] = $article['Article']['Article'];
				$articles[$x]['Channel'] = $article['Article']['Article']['Channel'];
				$articles[$x]['User'] = $article['Article']['Article']['User'];
				unset($articles[$x]['Article']['User']);
				unset($articles[$x]['Article']['Channel']);
				$x++;
			}
			$this->set('articles', $articles);
            
            $tvs = $this->Tag->Tagged->find('tagged', array(
                'contain'=>array('Tag','Tv.Channel'),
                'by' => $keyname,
                'model' => 'Tv'));
            $x = 0;

            foreach($tvs as $tv){
                $tvs[$x]['Tv'] = $tv['Tv']['Tv'];
				$tvs[$x]['Channel'] = $tv['Tv']['Tv']['Channel'];
				unset($tvs[$x]['Tv']['Channel']);
                $x++;
            }
            $this->set('tvs', $tvs);
            
            $events = $this->Tag->Tagged->find('tagged', array(
                'contain'=>array('Tag','Event', 'Event.Genre', 'Event.Venue'),
                'by' => $keyname,
                'model' => 'Event'));
                
            $x = 0;
            foreach($events as $event){
                $events[$x]['Event'] = $event['Event']['Event'];
                $events[$x]['Genre'] = $event['Event']['Event']['Genre'];
                $events[$x]['Venue'] = $event['Event']['Event']['Venue'];
                unset($events[$x]['Event']['Genre']);
                unset($events[$x]['Event']['Venue']);
                $x++;
            }
            
            $this->set('events', $events);
            
            $competitions = $this->Tag->Tagged->find('tagged', array(
                'contain'=>array('Tag','Competition'),
                'by' => $keyname,
                'model' => 'Competition'));
           
			$x = 0;
			foreach($competitions as $competition){
                $competitions[$x]['Competition'] = $competition['Competition'];
                $x++;
            }
            
            $this->set('competitions', $competitions);
            
            //echo "<pre>";
            //print_r($events);
            //echo "</pre>";
		//} catch (Exception $e) {
		//	$this->Session->setFlash($e->getMessage());
		//	$this->redirect('/');
		//}
	}

/**
 * Admin Index
 *
 * @return void
 */
	public function admin_index() {
		$this->{$this->modelClass}->recursive = 0;
		$this->set('tags', $this->Paginator->paginate());
	}

/**
 * Views a single tag
 *
 * @param string $keyName Tag key name
 * @return void
 */
	public function admin_view($keyName) {
		try {
			$this->set('tag', $this->{$this->modelClass}->view($keyName));
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
	}

/**
 * Adds one or more tags
 *
 * @return void
 */
	public function admin_add() {
		if (!empty($this->request->data)) {
			if ($this->{$this->modelClass}->add($this->request->data)) {
				$this->Session->setFlash(__d('tags', 'The Tags has been saved.'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

/**
 * Edits a tag
 *
 * @param string $tagId Tag UUID
 * @return void
 */
	public function admin_edit($tagId = null) {
		try {
			$result = $this->{$this->modelClass}->edit($tagId, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__d('tags', 'Tag saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->request->data = $result;
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->{$this->modelClass}->data;
		}
	}

/**
 * Deletes a tag
 *
 * @param string $tagId Tag UUID
 * @return void
 */
	public function admin_delete($tagId = null) {
		if ($this->{$this->modelClass}->delete($tagId)) {
			$this->Session->setFlash(__d('tags', 'Tag deleted.'));
		} else {
			$this->Session->setFlash(__d('tags', 'Invalid Tag.'));
		}
		$this->redirect(array('action' => 'index'));
	}
}
