<?php

/**
 * This is the model class for table "movement_type".
 *
 * The followings are the available columns in table 'movement_type':
 * @property integer $id
 * @property integer $movement_category_id
 * @property string $description
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 * @property boolean $with_price
 */
class MovementType extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MovementType the static model class
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
		return 'movement_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('movement_category_id, description', 'required'),
			array('movement_category_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),
			array('description', 'ext.UniqueAttributesValidator', 'with'=>'movement_category_id'),
			array('with_price', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, movement_category_id, description', 'safe', 'on'=>'search'),
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
			'operations' => array(self::HAS_MANY, 'Operation', 'type_id'),
			'movement_category' => array(self::BELONGS_TO, 'MovementCategory', 'movement_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'movement_category_id' => 'Categoría',
			'description' => 'Descripción',
			'with_price' => '¿Utiliza Precio de Referencia?',
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
		$criteria->compare('movement_category_id',$this->movement_category_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('with_price',$this->with_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'description',
			),
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

	protected function beforeDelete()
	{
		if (parent::beforeDelete())
			if (!empty($this->operations)) {
				$this->addError('id','No se puede borrar el Tipo de Movimiento debido a que tiene movimientos registrados');
				return false;
			}
			else
				return true;
		else
			return false;
	}

}