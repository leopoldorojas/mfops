<?php

/**
 * This is the model class for table "operation_entity".
 *
 * The followings are the available columns in table 'operation_entity':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class OperationEntity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OperationEntity the static model class
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
		return 'operation_entity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, code', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code', 'safe', 'on'=>'search'),
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
			'operations' => array(self::HAS_MANY, 'Operation', 'entity_id'),
			'documents' => array(self::HAS_MANY, 'Document', 'entity_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Nombre',
			'code' => 'Identificador',
			'user_id' => 'Usuario',
			'createdon' => 'Creada en',
			'updatedon' => 'Actualizada en',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);

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
	            // $this->user_id=Yii::app()->user->id;
	            $this->user_id=1;
	        }
	        else
	            $this->updatedon=time();
	        return true;
	    }
	    else
	        return false;
	}
	
}