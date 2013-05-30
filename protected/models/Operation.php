<?php

/**
 * This is the model class for table "operation".
 *
 * The followings are the available columns in table 'operation':
 * @property integer $id
 * @property boolean $input
 * @property boolean $bank
 * @property integer $type_id
 * @property string $operation_date
 * @property string $amount
 * @property integer $entity_id
 * @property string $entity_name
 * @property string $reference_price
 * @property text $description
 * @property integer $document_id
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class Operation extends BaseModel
{
	public $documentNumber = "";

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Operation the static model class
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
		return 'operation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, operation_date, input, bank, amount, document_id', 'required'),
			array('type_id, entity_id', 'numerical', 'integerOnly'=>true),
			//array('operation_date', 'date', 'format'=>'dd-MM-yyyy'),
			array('amount, reference_price', 'numerical'),
			array('amount, reference_price', 'length', 'max'=>19),
			array('entity_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, operation_date, input, bank, amount, entity_id, entity_name, reference_price, description, document_id, user_id, createdon, updatedon, documentNumber, journal_entry_id', 'safe',),
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
			'movement_type' => array(self::BELONGS_TO, 'MovementType', 'type_id'),
			'document' => array(self::BELONGS_TO, 'Document', 'document_id'),
			// 'accountingRule' => array(self::BELONGS_TO, 'AccountingRule', 'input, type_id, bank'),
			'journalEntry' => array(self::BELONGS_TO, 'JournalEntry', 'journal_entry_id'),
		);
	}

	public function accountingRule()
	{
		return AccountingRule::model()->findByAttributes(array('input'=>$this->input, 'type_id'=>$this->type_id, 'bank'=>$this->bank));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'type_id' => 'Tipo',
			'input' => '¿Entrada o Salida?',
			'bank' => '¿Caja o Bancos?',
			'operation_date' => 'Fecha del Movimiento',
			'amount' => 'Monto',
			'entity_id' => 'Entidad operación',
			'entity_name' => 'Notas o Entidad',
			'reference_price' => 'Precio unitario',
			'description' => 'Descripción',
			'document_id' => 'Número de Documento',
			'documentNumber' => 'Número de Documento',
			'journal_entry_id' => 'Asiento Diario',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('input',$this->input);
		$criteria->compare('bank',$this->bank);
		$criteria->compare('operation_date',$this->operation_date,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('t.entity_id',$this->entity_id);
		$criteria->compare('t.entity_name',$this->entity_name,true);
		$criteria->compare('reference_price',$this->reference_price,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('document_id',$this->document_id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.createdon',$this->createdon,true);
		$criteria->compare('t.updatedon',$this->updatedon,true);
		$criteria->compare('journal_entry_id',$this->journal_entry_id,true);		

		if ($this->documentNumber) {
			$criteria->with='document';
			$criteria->compare('document.number',$this->documentNumber,true);			
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'t.id DESC',
			),
		));
	}

	public function validateDetail()
	{
		return (!($this->bank=="") || !($this->input=="") || !empty($this->type_id));
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