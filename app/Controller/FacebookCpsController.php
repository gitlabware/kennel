<?php
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
App::uses('Controller', 'Controller');
App::import('Vendor', 'Facebook',array('file'=>'Facebook'.DS.'facebook.php'));	


class FacebookCpsController extends AppController {
	
	public $name = 'FacebookCps';
	public $uses=array('Propietario','User');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
	public function index(){
		$this->layout=false;
	}
	function login()
	{
		Configure::load('facebook');
		$appId=Configure::read('Facebook.appId');
		$app_secret=Configure::read('Facebook.secret');
		$facebook = new Facebook(array(
				'appId'		=>  $appId,
				'secret'	=> $app_secret,
				));
		$loginUrl = $facebook->getLoginUrl(array(
			'scope'			=> 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
			'redirect_uri'	=> BASE_URL.'FacebookCps/facebook_connect',
			'display'=>'popup'
			));
		$this->redirect($loginUrl);
   	}
	function facebook_connect()
	{
	    Configure::load('facebook');
	    $appId=Configure::read('Facebook.appId');
	    $app_secret=Configure::read('Facebook.secret');
	   
	   	 $facebook = new Facebook(array(
		'appId'		=>  $appId,
		'secret'	=> $app_secret,
		));
	    $user = $facebook->getUser();
		if($user){
	     	try{
					$user_profile = $facebook->api('/me');
					$params=array('next' => BASE_URL.'FacebookCps/facebook_logout');
					$logout =$facebook->getLogoutUrl($params);
			        $this->Session->write('User',$user_profile);
					$this->Session->write('logout',$logout);
                    $usuario = $this->User->findByusername($this->Session->read('User.email'),null,null,null,null,-1);
                    if(empty($usuario))
                    {
                        $this->Propietario->create();
                        $this->request->data['Propietario']['nombre'] = $this->Session->read('User.name');
                        $this->request->data['Propietario']['email1'] = $this->Session->read('User.email');
                        $this->Propietario->save($this->request->data['Propietario']);
                        $idPropietario = $this->Propietario->getLastInsertID();
                        $this->User->create();
                        $this->request->data['User']['username'] = $this->request->data['Propietario']['email1'];
                        $this->request->data['User']['password'] = $this->Session->read('User.id');
                        $this->request->data['User']['nombre'] = $this->request->data['Propietario']['nombre'];
                        $this->request->data['User']['propietario_id'] = $idPropietario;
                        $this->User->save($this->request->data['User']);
                        if ($this->Auth->login())
                        {
                            $this->Session->setFlash('Se registro  correctamente','msgbueno');
                        }
                    }
                    else{
                        $this->User->create();
                        $this->request->data['User']['username'] = $usuario['User']['username'];
                        $this->request->data['User']['password'] = $this->Session->read('User.id');
                        if ($this->Auth->login())
                        {
                            $this->Session->setFlash('Ingreso correctamente','msgbueno');
                        }
                    }
                    
                    
			}
			catch(FacebookApiException $e){
					error_log($e);
					$user = NULL;
			}		
		}
		
	   else
	   {
		    $this->Session->setFlash('Sorry.Please try again','default',array('class'=>'msg_req'));   
		   $this->redirect(array('action'=>'index'));
	   }
   }
   
   function facebook_logout(){
	$this->Session->delete('User');
	$this->Session->delete('logout');   
	   $this->redirect(array('action'=>'index'));
   }
	
}
