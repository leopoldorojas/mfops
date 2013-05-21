<?php

/**
 * This is the model class for table "accounting_rule".
 *
 * The followings are the available columns in table 'accounting_rule':
 * @property integer $id
 * @property integer $input
 * @property integer $type_id
 * @property string $debitAccount1
 * @property string $creditAccount1
 * @property string $description
 * @property boolean $bank
 * @property integer $user_id
 * @property string $createdon
 */
class AccountingRule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountingRule the static model class
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
		return 'accounting_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('input, bank, type_id, debitAccount1, creditAccount1, description', 'required'),
			array('type_id', 'numerical', 'integerOnly'=>true),
			array('debitAccount1, creditAccount1, description', 'length', 'max'=>255),
			array('type_id', 'ext.UniqueAttributesValidator', 'with'=>'input,bank', 'message'=>'Ya existe regla contable para este Tipo de Movimiento en conjunto con esta Entrada/Salida de dinero y Caja/Bancos'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, input, type_id, bank, debitAccount1, creditAccount1, description, user_id', 'safe', 'on'=>'search'),
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
			'movement_type' => array(self::BELONGS_TO, 'MovementType', 'type_id'),
			//'operations' => array(self::HAS_MANY, 'Operation', 'input, type_id, bank'),
		);
	}

	public function operations()
	{
		return Operation::model()->findAllByAttributes(array('input'=>$this->input, 'type_id'=>$this->type_id, 'bank'=>$this->bank));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'input' => '¿Entrada o Salida de dinero?',
			'type_id' => 'Tipo de Movimiento',
			'bank' => '¿Caja o Bancos?',
			'debitAccount1' => 'Cuenta a Debitar',
			'creditAccount1' => 'Cuenta a Acreditar',
			'description' => 'Descripción',
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
		$criteria->compare('input',$this->input);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('bank',$this->bank);
		$criteria->compare('description',$this->description, true);
		$criteria->compare('debitAccount1',$this->debitAccount1,true);
		$criteria->compare('creditAccount1',$this->creditAccount1,true);
		$criteria->compare('user_id',$this->user_id);

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
		{
			$operations = $this->operations();
			if (!empty($operations)) {
				$this->addError('id','No se puede borrar la Regla Contable debido a que tiene Movimientos registrados');
				return false;
			}
			else
				return true;
		}
		else
			return false;
	}

}