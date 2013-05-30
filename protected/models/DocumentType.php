<?php

/**
 * This is the model class for table "document_type".
 *
 * The followings are the available columns in table 'document_type':
 * @property integer $id
 * @property string $description
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class DocumentType extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentType the static model class
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
		return 'document_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>100),
			array('description', 'unique'),
			array('next_number', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description', 'safe', 'on'=>'search'),
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
			'documents' => array(self::HAS_MANY, 'Document', 'documentType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'description' => 'Descripción',
			'next_number' => 'Próximo Número de Documento',
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
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'description',
			),
		));
	}

	protected function beforeDelete()
	{
		if (parent::beforeDelete())
			if (!empty($this->documents)) {
				$this->addError('id','No se puede borrar el Tipo de Documento debido a que tiene Documentos registrados');
				return false;
			}
			else
				return true;
		else
			return false;
	}

}