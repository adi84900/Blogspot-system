<?php
namespace App\Controller;
ob_start();
use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Request;
use Cake\View\Form\EntityContext;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	  

  public function beforeFilter(Event $event)
    {
		$this->loadComponent('Flash');     
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }
	  public function index()
     {
		 $user = $this->Auth->user();
        //$this->set('users', $this->Users->find('all'));
    }

	public function login()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel('Users');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
				
				 $session = $this->request->session();
                $session->write('curUser', $this->Auth->user());
				$user_fetchrecord=$this->Users->find('all')->where(array('id' => $user['id']))->toArray();
				//pr($user_fetchrecord);
				//die;
				$this->redirecturlafterlogin();
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
	 $this->set(compact('user','user_fetchrecord'));
    }
	
	public function redirecturlafterlogin()
    {
		
		//$this->viewBuilder()->layout('');
		 $user = $this->Auth->user();
		 	$this->viewBuilder()->layout('layout');
			  $session = $this->request->session();
			  $sessionexpertprofile = $session->read('curUser');
			  $user_fetchrecord=$this->Users->find('all')->where(array('id' => $user['id']))->toArray();
			  $id=$user['id'];
		 return $this->redirect(['controller'=>'Users','action'=>'userprofile',$id]);
        
    }
	
	  public function logout()
    {
		 $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }
	/**
         * After login user will show his profile data.
  */
	 public function userprofile($id = null)
    {
	$this->viewBuilder()->layout('userlayout');
	 $user_deatil=$this->Users->find('all')->where(array('id' => $id))->toArray();
         
	  $this->set(compact('id','user_deatil'));
		}
	


/**
         * After Supervisor  login it can see  user profile data .
  */
	 public function messages()
    {
	$this->viewBuilder()->layout('backendlayout');
	 $user_detail=$this->Users->find('all')->toArray();
         
	  $this->set(compact('id','user_detail'));
		}


/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function employeeRecords()
    {

                 $this->loadModel('Users');
	$this->viewBuilder()->layout('backendlayout');
                    $username=$this->request->data('username');
	 $user_detail=$this->Users->find('all')->where(['Users.username' =>  $username])->toArray();
         
	  $this->set(compact('user_detail'));
		}

/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function profiles()
    {
                 $this->loadModel('Users');
	$this->viewBuilder()->layout('backendlayout');
                    $username=$this->request->data('username');
	 $user_detail=$this->Users->find('all')->where(['Users.username' =>  $username])->toArray();
         
	  $this->set(compact('user_detail'));
		}

/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function reports()
    {
                 $this->loadModel('Users');
	$this->viewBuilder()->layout('');
                   
	 $user_detail=$this->Users->find('all')->toArray();
         
	  $this->set(compact('user_detail'));
		}






/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function addUser()
    {
                 $this->loadModel('Users');
	$this->viewBuilder()->layout('backendlayout');
                   $name=$this->request->data('name');
$username=$this->request->data('name');
$bu=$this->request->data('bu');
$city=$this->request->data('city');
$work_location=$this->request->data['work_location'];
$empid=$this->request->data['empid'];
$email=$this->request->data('email');
$mobile=$this->request->data('mobile');
$user_type=$this->request->data('user_type');
$position=$this->request->data('position');
	$usersTable = TableRegistry::get('users');
$usersdata = $usersTable->newEntity();

$usersdata->work_location  =$work_location ;
$usersdata->name = $name;
$usersdata->username = $username;
$usersdata->user_type = $user_type;
$usersdata->empid = $empid;
$usersdata->email =$email; 
$usersdata->mobile =$mobile; 
$usersdata->bu =$bu; 
$usersdata->city =$city; 
$usersdata->position =$position; 
         if ($usersTable->save($usersdata)) {
$this->Flash->success(__('User  has been successfully saved.'));
}

	  
		}

/**
         * After Supervisor  login it can see  user profile data .
  */
	 public function employeeReports()
    {
	$this->viewBuilder()->layout('backendlayout');
  $username=$this->request->data('username');
$bu=$this->request->data('bu');
$city=$this->request->data('city');
$work_location=$this->request->data('work_location');
$empid=$this->request->data('empid');
$c_subject=$this->request->data('c_subject');
$email=$this->request->data('email');
$mobile=$this->request->data('mobile');
	 $user_detail=$this->Users->find()->where(['Users.username' =>  $username])
       ->orWhere(['Users.bu' => $bu])->orWhere(['Users.city' => $city])->orWhere(['Users.work_location' => $work_location])->orWhere(['Users.empid' => $empid])
->orWhere(['Users.c_subject' => $c_subject])->orWhere(['Users.email' => $email])->orWhere(['Users.mobile' => $mobile])
->toArray();
	
         
	  $this->set(compact('user_detail'));
		}


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {
		$this->viewBuilder()->layout('');
		
$time1 = Time::now();
$time = Time::now();
$a = (string) microtime();
 if ($this->request->is('post')) {
	 
$bu=$this->request->data('bu');
$city=$this->request->data('city');
$work_location=$this->request->data['work_location'];
$name=$this->request->data('username');
$username=$this->request->data('username');
$user_type=$this->request->data('user_type');
$password=$this->request->data['password'];
$pass=$this->request->data['pass'];
$empid=$this->request->data['empid'];
$email=$this->request->data('email');
$mobile=$this->request->data('mobile');
$first_access=$time;
$confirmed=$this->request->data('confirmed');
$status=$this->request->data('status');
$usersTable = TableRegistry::get('users');
$usersdata = $usersTable->newEntity();
$usersdata->bu =$bu; 
$usersdata->city =$city; 
$usersdata->work_location  =$work_location ;
$usersdata->name = $name;
$usersdata->username = $username;
$usersdata->user_type = $user_type;
$usersdata->password = $password;
$usersdata->pass = $pass;
$usersdata->empid = $empid;
$usersdata->email =$email; 
$usersdata->mobile =$mobile; 

$usersdata->first_access =$first_access; 
$usersdata->confirmed =$confirmed; 
$usersdata->status =$status; 
if ($usersTable->save($usersdata)) {
	$this->Flash->success(__('Your record has been successfully saved.'));
}
}
        $this->set(compact('user','ip','time'));
    }

	 public function add()
    {
		$this->viewBuilder()->layout('');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

	
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userprofile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	
	

   
	
	
	
	
}