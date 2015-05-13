<?php

/**
 * This is the model class for table "announcement_notice".
 *
 * The followings are the available columns in table 'announcement_notice':
 * @property integer $id
 * @property string $DateCreated
 * @property string $LastUpdate
 * @property integer $announcement_id
 * @property integer $announcement_publicity_id
 * @property integer $announcement_condition_id
 * @property integer $users_id
 *
 * The followings are the available model relations:
 * @property Announcement $announcement
 * @property AnnouncementPublicity $announcementPublicity
 * @property AnnouncementCondition $announcementCondition
 * @property Users $users
 */
class AnnouncementNotice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'announcement_notice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('announcement_id, announcement_publicity_id, announcement_condition_id, users_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, DateCreated, LastUpdate, announcement_id, announcement_publicity_id, announcement_condition_id, users_id', 'safe', 'on'=>'search'),
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
			'announcement' => array(self::BELONGS_TO, 'Announcement', 'announcement_id'),
			'announcementPublicity' => array(self::BELONGS_TO, 'AnnouncementPublicity', 'announcement_publicity_id'),
			'announcementCondition' => array(self::BELONGS_TO, 'AnnouncementCondition', 'announcement_condition_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'DateCreated' => 'Date Created',
			'LastUpdate' => 'Last Update',
			'announcement_id' => 'Announcement',
			'announcement_publicity_id' => 'Announcement Publicity',
			'announcement_condition_id' => 'Announcement Condition',
			'users_id' => 'Users',
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
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('LastUpdate',$this->LastUpdate,true);
		$criteria->compare('announcement_id',$this->announcement_id);
		$criteria->compare('announcement_publicity_id',$this->announcement_publicity_id);
		$criteria->compare('announcement_condition_id',$this->announcement_condition_id);
		$criteria->compare('users_id',$this->users_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AnnouncementNotice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
