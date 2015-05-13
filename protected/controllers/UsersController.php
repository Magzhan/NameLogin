<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','changeSub','changeGroup'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;
		$model1 = new Faculty;
		$model2 = new Department;
		$model3 = new Group;
		$model4 = new UserData;
		$model5 = new Authassignment;
		$temp_email = "";
		$temp_password = "";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']) && isset($_POST['UserData']))
		{
			$model->attributes=$_POST['Users'];
			$temp_password = $this->passwordGenerator();
			$model->password = crypt($temp_password, 'salt');
			$model->DateCreated = date_create()->format('Y-m-d H:i:s');
			$temp_date = $model->DateCreated;
			$temp_role_id = $model->roles_id;
			$temp_email = $model->email;
			$temp_name = $model->username;
			$model4->attributes=$_POST['UserData'];
			if($model4->group_id !== null){
			if($model->save()){
				$model4->users_id = Users::model()->findByAttributes(array('DateCreated'=>$temp_date))->id;
				$temp_id = $model4->users_id;
				$model4->name = "Null";
				$model4->surname = "Null";
				$model4->gender = "Null";
				$model4->course = 0;
				$model5->itemname = Roles::model()->findByPk($temp_role_id)->description;
				$model5->userid = $temp_id;
				$model5->save();
				$model4->insert();
				$recipientEmail = $temp_email;
        		$recipientName  = $temp_name;
        		$emailSubject   = 'SDU.kz';
        		$emailBody      = '<h1>Hello '.$model->username.'</h1><p>Your login:'.$model->username.'.<br>Password: '.$temp_password.'</p>';
        
        		$mailer = Yii::app()->MultiMailer->to($recipientEmail, $recipientName);
        		$mailer->subject($emailSubject);
        		$mailer->body($emailBody);
				$mailer->send();
				//$this->sendMailNotification($temp_email, $temp_name, $temp_password);
				$this->redirect(array('view','id'=>$model->id));
			}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model4 = UserData::model()->findByAttributes(array('users_id'=>$id));
		$model5 = Authassignment::model()->findByAttributes(array('userid'=>$id));
		$temp_password = '';
		//$model4 = new UserData;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']) && isset($_POST['UserData']))
		{
			$model->attributes=$_POST['Users'];
			$model->password=crypt($model->password, 'salt');
			$model5->itemname=Roles::model()->findByPk($model->roles_id)->description;
			$model4->attributes=$_POST['UserData'];
			if($model->update()){
				$model4->update();
				$model5->update();
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model4'=>$model4,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		Authassignment::model()->deleteAllByAttributes(array('userid'=>$id));
		UserData::model()->deleteAllByAttributes(array('users_id'=>$id));
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionChangeSub(){
			
			//$selected = $_POST['UserData']['faculty_id'];
			$selected = Yii::app()->request->getParam('faculty_id');
			//$this->redirect(array('admin'));
			$data = Faculty::getDepartments($selected);
			foreach($data as $value=>$subcategory){
					echo CHtml::tag('option', array('value'=>$value), CHtml::encode($subcategory), true);
				}
		}
		
	public function actionChangeGroup(){
			$selected = Yii::app()->request->getParam('department_id');
			//$this->redirect(array('admin'));
			$data = Department::getGroups($selected);
			foreach($data as $value=>$subcategory){
					echo CHtml::tag('option', array('value'=>$value), CHtml::encode($subcategory), true);
				}
		}
	
	public function sendMailNotification($st_email, $st_name, $st_surname){
			$header = 'MIME-Version: 1.0' . '\r\n';
			$header = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
			$subject = 'Welcome to Portal';
			$message = '<html> <header><h3>Welcome to the Portal</h3><header><br/><body> Your login: ' .$st_email. '<br/>' . 'Your password: ' . $st_name . $st_surname. '</body></html>';
			mail($st_email, $subject, $message, $header);
			
			return true;
		}
		
	public function passwordGenerator(){
			$l1 = rand(1,9); $l2 = rand(1,9); $l3 = rand(1,9);
			$gen_pass = '';
	for($i=0;$i<$l1;$i++){
		$gen_pass = $gen_pass.chr(rand(65,90));
		}
	for($i=0;$i<$l2;$i++){
		$gen_pass = $gen_pass.rand(0,9);
		}
	for($i=0;$i<$l3;$i++){
		$gen_pass = $gen_pass.chr(rand(97,122));
		}
	return $gen_pass;
		}
}
