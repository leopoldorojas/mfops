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
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class User extends CActiveRecord
{
	public $password = '';
	public $password_confirmation = '';
	public $rol = '';
	private $_oldRol = '';

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
			array('username, company_id, rol', 'required'),
			array('password, password_confirmation', 'required', 'on' => 'create'),
			array('password_confirmation', 'compare', 'compareAttribute'=>'password'),
			array('company_id', 'numerical', 'integerOnly'=>true),
			array('email', 'email'),
			array('username, password, password_confirmation, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, name, company_id, rol', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Usuario',
			'password' => 'Contraseña',
			'password_confirmation' => 'Confirmación de Contraseña',
			'encrypted_password' => 'Encrypted Password',
			'email' => 'Email',
			'name' => 'Nombre completo',
			'company_id' => 'Empresa',
			'rol' => 'Rol',
			'user_id' => 'Usuario',
			'createdon' => 'Creado en',
			'updatedon' => 'Actualizado en',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company_id',$this->company_id);
		//$criteria->compare('rol',$this->rol);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            // $this->createdon=$this->updatedon=time();
	            $this->user_id = (empty(Yii::app()->user->id) ? 999999 : Yii::app()->user->id);
	            $this->encrypted_password=crypt($this->password, $this->password);
	            if (!Yii::app()->user->checkAccess('arckanto-admin'))
	            	$this->company_id = (empty(Yii::app()->user->company_id) ? 999999 : Yii::app()->user->company_id);
	        }
	        else
	        {
	            $this->updatedon=time();
	            if ($this->password)
	            	$this->encrypted_password=crypt($this->password, $this->password);
	        }

	        return true;
	    }
	    else
	        return false;
	}

	protected function afterSave()
	{
	    parent::afterSave();

	    if ($this->rol != $this->_oldRol)
	    {
	    	if (!$this->isNewRecord)
	    		Yii::app()->authManager->revoke($this->_oldRol,$this->id);
	    	Yii::app()->authManager->assign($this->rol,$this->id);
	    }
	}

	protected function afterDelete()
	{
	    parent::afterDelete();
	    Yii::app()->authManager->revoke($this->_oldRol,$this->id);
	}
	 	 
	protected function afterFind()
	{
	    parent::afterFind();

	    foreach (Yii::app()->params['roles'] as $rol => $description)
    		if ($authAssignment=Yii::app()->authManager->getAuthAssignment($rol, $this->id))
    		{
    			$this->rol=$authAssignment->itemName;
    			break;
    		}

	    $this->_oldRol=$this->rol;
	}

}