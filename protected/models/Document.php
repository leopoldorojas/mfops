<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property integer $documentType_id
 * @property string $number
 * @property string $document_date
 * @property integer $entity_id
 * @property string $entity_name
 * @property string $description
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class Document extends CActiveRecord
{
	public $totalAmount = 0;
	public $calculatedTotalAmount = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return 'document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('documentType_id, number, document_date, totalAmount', 'required'),
			array('documentType_id, entity_id', 'numerical', 'integerOnly'=>true),
			array('number, entity_name', 'length', 'max'=>100),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, documentType_id, number, document_date, entity_id, entity_name, description, user_id', 'safe', 'on'=>'search'),
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
			'entity' => array(self::BELONGS_TO, 'OperationEntity', 'entity_id'),
			'document_type' => array(self::BELONGS_TO, 'DocumentType', 'documentType_id'),
			'operations' => array(self::HAS_MANY, 'Operation', 'document_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'documentType_id' => 'Tipo de Documento',
			'number' => 'Número de Documento',
			'document_date' => 'Fecha de Operación',
			'entity_id' => 'Entidad de Operación',
			'entity_name' => 'Nota acerca de la Entidad',
			'description' => 'Descripción del Documento',
			'user_id' => 'Usuario',
			'createdon' => 'Creado en',
			'updatedon' => 'Actualizado en',
			'totalAmount' => 'Monto total',
			'calculatedTotalAmount' => 'Total calculado',
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
		$criteria->compare('documentType_id',$this->documentType_id);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('document_date',$this->document_date,true);
		$criteria->compare('entity_id',$this->entity_id);
		$criteria->compare('entity_name',$this->entity_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);

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