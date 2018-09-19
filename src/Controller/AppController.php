<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use MyClass\MyClass;
use MyClass\Exception;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     
     
     
     
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    $this->set('BASE_URL', Configure::read('BASE_URL')); 
    $this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email','password'=>'password']
            ]
        ],
    
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
                $this->loadComponent('Cookie');

    }
    

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
       if(isset($this->request->params['prefix']) && $this->request->params['prefix']="admin"){
            $this->layout='admin'; 
        }

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
     public function beforeFilter() {
		 if($this->Cookie->read('lang')==""){ 
		$this->Cookie->write('lang','eng', false, '20 days');
		}
		$this->_setLanguage();
		$locale=$this->Cookie->read('lang');
		I18n::locale($locale);	
	

}
    private function _setLanguage() {
		
	 $this->request->session()->read('Config.language');
	if($this->Cookie->read('lang') && !($this->request->session()->check('Config.language'))) { 
                //echo "1";die;
		$this->request->session()->write('Config.language', $this->Cookie->read('lang'));
		$this->Cookie->write('lang', $this->Cookie->read('lang'), false, '20 days');


	    }
	else if (isset($this->params['language']) && ($this->params['language']!=$this->Session->read('Config.language'))) {
 //echo "2";die;
	        $this->Session->write('Config.language', $this->params['language']);
	  	    $this->Cookie->write('lang', $this->params['language'], false, '20 days');
  
	    }else if($this->request->session()->read('Config.language'))
	    	{
				//pr($this->request->params);
 //echo "3";die;
              if($this->request->params['language']){
             $this->Cookie->write('no', $this->request->params['language']);	
			 $this->Cookie->write('lang', $this->request->params['language'], false, '20 days');
			 
				}else if($this->Cookie->read('no')){
            $this->Cookie->write('lang', $this->Cookie->read('no'), false, '20 days');
			}else{
 //echo "4";die;
	        $this->Cookie->write('lang', 'eng', false, '20 days');

			}

	    }

	}
    
    
    
}
