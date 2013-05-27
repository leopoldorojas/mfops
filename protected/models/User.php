<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $encrypted_password
 * @property string $email
 * @property string $name
 * @property integer $company_id
 * @property string $permission_level
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, encrypted_password, company_id, user_id, createdon', 'required'),
			array('company_id, user_id, permission_level', 'numerical', 'integerOnly'=>true),
			array('username, encrypted_password, email, name, permission_level', 'length', 'max'=>255),
			array('updatedon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, encrypted_password, email, name, company_id, permission_level, user_id, createdon, updatedon', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'encrypted_password' => 'Encrypted Password',
			'email' => 'Email',
			'name' => 'Name',
			'company_id' => 'Company',
			'permission_level' => 'Permission Level',
			'user_id' => 'User',
			'createdon' => 'Createdon',
			'updatedon' => 'Updatedon',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('encrypted_password',$this->encrypted_password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('permission_level',$this->permission_level);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('updatedon',$this->updatedon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}