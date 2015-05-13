<?php

class AnnouncementController extends Controller
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
/*			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
*/			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty'),
				'roles'=>array('Student'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty','admin','delete','postedAnnouncements','waitingAnnouncements','rejectedAnnouncements','Approove','reject'),
				'roles'=>array('Administrator'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty','admin','delete'),
				'roles'=>array('DepartmentHead'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty'),
				'roles'=>array('Teacher'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty'),
				'roles'=>array('Advisor'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','getSelected','setEmpty'),
				'roles'=>array('Methodist'),
				'users'=>array('*'),
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
		$model=new Announcement;
		$model1=new AnnouncementNotice;
		$model11=new AnnouncementNotice;
		$model2=new AnnouncementVisibility;
		$faculties=Faculty::model()->findAll();
		$departments=Department::model()->findAll();
		$groups=Group::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$faculty = new Faculty; $department = array(); $group = array();
		
		if(isset($_POST['Announcement']) && isset($_POST['AnnouncementNotice']))
		{
			if(isset($_POST['Faculty'])){
				$faculty->attributes=$_POST['Faculty'];
				}
			$model->attributes=$_POST['Announcement'];
			$model1->attributes=$_POST['AnnouncementNotice'];
			//$model2->attributes=$_POST['AnnouncementVisibility'];
			$model->DateCreated = date_create()->format('Y-m-d H:i:s');
			$model->users_id = Yii::app()->user->id;
			$temp_date = $model->DateCreated;
			if($faculty->name[0] == 99)
			$model->save();
			
			$model1->announcement_id = Announcement::model()->findByAttributes(array('DateCreated'=>$temp_date))->id;

			if($model1->announcement_publicity_id == 1 && Users::model()->findByPk(Yii::app()->user->id)->roles_id==6){	// if student && general
				$model1->announcement_condition_id = 3;
				}
			elseif($model1->announcement_publicity_id == 2 && Users::model()->findByPk(Yii::app()->user->id)->roles_id==6){ // if student && selected
				$model1->announcement_condition_id = 3;
				}
			else{
				$model1->announcement_condition_id = 1;
				$model2->announcement_id = $model1->announcement_id;
				$model2->group_id = UserData::model()->findByAttributes(array('users_id'=>Yii::app()->user->id))->group_id;
				$model2->save();
				}
				
			$model1->users_id = Yii::app()->user->id;
			$temp_apid = $model1->announcement_publicity_id;
			$temp_aid = $model1->announcement_id;
			$model1->save();
			
			//foreach($faculties as $f){
				//$faculty[$f_i] = $_POST[$f->id];
				//foreach(Department::model()->findAllByAttributes(array('faculty_id'=>$f->id)) as $d){
					//$department[$d_i] = $_POST[$f->id.$d->id];
					// announcement/view&id[0]=1
					// announcement/view&id=group_id
					//foreach(Group::model()->findAllByAttributes(array('department_id'=>$d->id)) as $g){
						//$model2->attributes = $_POST['AnnouncementVisibility'];
						//$model2->group_id = $_POST['AnnouncementVisibility']['group_id'];
						//$model2->announcement_id = 1;
						//$model2->insert();
					if($temp_apid == 2){
						foreach($_POST['AnnouncementVisibility'] as $pos=>$data){
							//$group[$g_i] = $data;
							foreach($data as $dt){
							$model6 = new AnnouncementVisibility;
							if(is_array($data)){
								//$result[$pos] = implode(',', $data);
								//$model6->$pos = $result[$pos];
								//$model6->announcement_id = 1;
								//$model6->insert();
								$model6->announcement_id = $temp_aid;
								$model6->group_id = $dt;
								$model6->save();
								}
							}
							//$g_i++;
						}
					}
							//	}
					//$d_i++;
					//}
				//$f_i++;
				//}
			//if(true)
				$this->redirect(array('view', 'id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'model11'=>$model11,
			'model3'=>$faculties,
			'model4'=>$departments,
			'model5'=>$groups,
			'model10'=>$faculty
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
		$model1=AnnouncementNotice::model()->findByAttributes(array('announcement_id'=>$id));
		$model3=Faculty::model()->findAll();
		$model10=new Faculty;
		AnnouncementVisibility::model()->deleteAllByAttributes(array('announcement_id'=>$id));
		$model2 = new AnnouncementVisibility;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Announcement']) && isset($_POST['AnnouncementNotice']))
		{
			if(isset($_POST['Faculty'])){
				$model10->attributes=$_POST['Faculty'];
			}
			$model->attributes=$_POST['Announcement'];
			$model1->attributes=$_POST['AnnouncementNotice'];
			if($model10->name[0] == 99)
				$model->update();
			$temp_ann_pub_id = $model1->announcement_publicity_id;
			if($temp_ann_pub_id == 1 && Users::model()->findByPk(Yii::app()->user->roles_id == 6)){
				$model1->announcement_condition_id = 3;
			}elseif($temp_ann_pub_id == 2 && Users::model()->findByPk(Yii::app()->user->id)->roles_id==6){
				$model1->announcement_condition_id = 3;
			}else{
				$model1->announcement_condition_id = 1;
				$model2->announcement_id = $id;
				$model2->group_id = UserData::model()->findByAttributes(array('users_id'=>Yii::app()->user->id))->group_id;
				$model2->save();
			}
			$model1->update();
			if($temp_ann_pub_id == 2){
				foreach($_POST['AnnouncementVisibility'] as $pos=>$data){
					foreach($data as $dt){
						$model6=new AnnouncementVisibility;
							if(is_array($data)){
									$model6->announcement_id = $id;
									$model6->group_id = $dt;
									$model6->save();
								}
						}
				}
			}
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'model1'=>$model1,
			'model3'=>$model3,
			'model10'=>$model10,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		$criteria = new CDbCriteria();
		$criteria->alias = 'announcement';
		$criteria->distinct = true;
		$criteria->join='LEFT JOIN `announcement_notice` ON `announcement`.`id` = `announcement_notice`.`announcement_id` LEFT JOIN `announcement_visibility` ON `announcement`.`id` = `announcement_visibility`.`announcement_id`';
		$criteria->together = true;
		$criteria->condition = 'announcement_condition_id = 1 AND announcement_publicity_id = 1 OR announcement_condition_id = 1 AND announcement_publicity_id = 3 AND `announcement`.`users_id`=:usersId OR announcement_condition_id = 1 AND announcement_publicity_id = 2 AND `announcement_visibility`.`group_id`=:groupId';
		$criteria->params = array('usersId'=>Yii::app()->user->id, 'groupId'=>Group::getUserGroup(Yii::app()->user->id));
		$criteria->order = 'DateCreated DESC';
		$dataProvider=new CActiveDataProvider('Announcement', array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Announcement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Announcement']))
			$model->attributes=$_GET['Announcement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Announcement the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Announcement::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Announcement $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='announcement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGetSelected(){
			$faculties = Faculty::model()->findAll();
			$model2 = new AnnouncementVisibility;
			echo '<ul>';
			foreach($faculties as $f){
				echo '<li>'.CHtml::checkBox($f->id, true, array())." ". $f->name.'</li>';
				$departments = Department::model()->findAllByAttributes(array('faculty_id'=>$f->id));
				echo '<ul>';
				foreach($departments as $d){
					echo '<li>'.CHtml::checkBox($f->id.$d->id, true, array())." ".$d->name.'</li>';
					$groups = Group::model()->findAllByAttributes(array('department_id'=>$d->id));
					echo '<ul>';
					foreach($groups as $g){
						echo '<li>'.CHtml::checkBox($f->id.$d->id.$g->id, true, array())." ".$g->name.'</li>';
						}
					echo '</ul>';	
				}
				echo '</ul>';
			}
			echo '</ul>';
	}
		
	public function actionSetEmpty(){
			echo "";
	}
	
	public function actionPostedAnnouncements(){	
		//$model=new Announcement('search');
		//$model->unsetAttributes();  // clear any default values
		
		
		$criteria = new CDbCriteria();
		$criteria->alias = 'announcement';
		$criteria->distinct = true;
		$criteria->join = 'LEFT JOIN `announcement_notice` ON `announcement`.`id` = `announcement_notice`.`announcement_id`';
		$criteria->together = true;
		$criteria->condition = 'announcement_condition_id = 1';
		$criteria->order = 'DateCreated DESC';
		$model = new CActiveDataProvider('Announcement', array('criteria'=>$criteria));
		$this->render('admin', array('model'=>$model,));
		
	}
	
	public function actionWaitingAnnouncements(){	
		$criteria = new CDbCriteria();
		$criteria->alias = 'announcement';
		$criteria->distinct = true;
		$criteria->join = 'LEFT JOIN `announcement_notice` ON `announcement`.`id` = `announcement_notice`.`announcement_id`';
		$criteria->together = true;
		$criteria->condition = 'announcement_condition_id = 3';
		$criteria->order = 'DateCreated DESC';
		$model = new CActiveDataProvider('Announcement', array('criteria'=>$criteria));
		$this->render('admin', array('model'=>$model,));
	}
	
	public function actionRejectedAnnouncements(){	
		$criteria = new CDbCriteria();
		$criteria->alias = 'announcement';
		$criteria->distinct = true;
		$criteria->join = 'LEFT JOIN `announcement_notice` ON `announcement`.`id` = `announcement_notice`.`announcement_id`';
		$criteria->together = true;
		$criteria->condition = 'announcement_condition_id = 2';
		$criteria->order = 'DateCreated DESC';
		$model = new CActiveDataProvider('Announcement', array('criteria'=>$criteria));
		$this->render('admin', array('model'=>$model,));
	}
	
	public function actionApproove($aid){
		$model = AnnouncementNotice::model()->findByAttributes(array('announcement_id'=>$aid));
		$model->announcement_condition_id = 1;
		$model->update();
		
		//$this->refresh();
	}
	
	public function actionReject($aid){
		$model = AnnouncementNotice::model()->findByAttributes(array('announcement_id'=>$aid));
		$model->announcement_condition_id = 2;
		$model->update();
		//$this->refresh();
	}
}
