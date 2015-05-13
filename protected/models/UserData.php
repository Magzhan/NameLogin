<?php

/**
 * This is the model class for table "user_data".
 *
 * The followings are the available columns in table 'user_data':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property integer $course
 * @property string $LastUpdate
 * @property integer $users_id
 * @property integer $department_id
 * @property integer $group_id
 * @property integer $faculty_id
 *
 * The followings are the available model relations:
 * @property Users $users
 * @property Department $department
 * @property Group $group
 * @property Faculty $faculty
 */
class UserData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, surname, gender, course, LastUpdate, users_id, department_id, group_id, faculty_id', 'required'),
			array('course, users_id, department_id, group_id, faculty_id', 'numerical', 'integerOnly'=>true),
			array('name, surname, gender', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, surname, gender, course, LastUpdate, users_id, department_id, group_id, faculty_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'faculty' => array(self::BELONGS_TO, 'Faculty', 'faculty_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'surname' => 'Surname',
			'gender' => 'Gender',
			'course' => 'Course',
			'LastUpdate' => 'Last Update',
			'users_id' => 'Users',
			'department_id' => 'Department',
			'group_id' => 'Group',
			'faculty_id' => 'Faculty',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('course',$this->course);
		$criteria->compare('LastUpdate',$this->LastUpdate,true);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('faculty_id',$this->faculty_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
