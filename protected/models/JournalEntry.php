<?php

/**
 * This is the model class for table "journal_entry".
 *
 * The followings are the available columns in table 'journal_entry':
 * @property integer $id
 * @property string $debitAccount
 * @property string $debitAmount
 * @property string $creditAccount
 * @property string $creditAmount
 * @property integer $branchID
 * @property string $journalEntry_date
 * @property string $notes
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class JournalEntry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JournalEntry the static model class
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
		return 'journal_entry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('debitAccount, debitAmount, creditAccount, creditAmount, journalEntry_date', 'required'),
			array('branchID', 'numerical', 'integerOnly'=>true),
			array('debitAccount, creditAccount', 'length', 'max'=>255),
			array('debitAmount, creditAmount', 'length', 'max'=>19),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, debitAccount, debitAmount, creditAccount, creditAmount, branchID, journalEntry_date, notes, user_id, createdon, updatedon', 'safe', 'on'=>'search'),
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
			'operation' => array(self::HAS_ONE, 'Operation', 'journal_entry_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'debitAccount' => 'Cuenta de Débito',
			'debitAmount' => 'Monto debitado',
			'creditAccount' => 'Cuenta de Crédito',
			'creditAmount' => 'Monto acreditado',
			'branchID' => 'Sucursal',
			'journalEntry_date' => 'Fecha del asiento',
			'notes' => 'Notas',
			'user_id' => 'Usuario',
			'createdon' => 'Registrado en',
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
		$criteria->compare('debitAccount',$this->debitAccount,true);
		$criteria->compare('debitAmount',$this->debitAmount,true);
		$criteria->compare('creditAccount',$this->creditAccount,true);
		$criteria->compare('creditAmount',$this->creditAmount,true);
		$criteria->compare('branchID',$this->branchID);
		$criteria->compare('journalEntry_date',$this->journalEntry_date,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('updatedon',$this->updatedon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function saveOperation($operation)
	{
		if ($accountingRule=AccountingRule::model()->findByAttributes(array('input'=>$operation->input, 'type_id'=>$operation->type_id, 'bank'=>$operation->bank)))
		{
			$this->debitAccount = $accountingRule->debitAccount1;
			$this->debitAmount = $operation->amount;
			$this->creditAccount = $accountingRule->creditAccount1;
			$this->creditAmount = $operation->amount;
			$this->journalEntry_date = $operation->operation_date;
			$this->notes = $operation->description;
			if ($this->save()) {
				return array('journal_entry_id' => $this->id, 'status'=>'success', 'message'=>"Operación grabada exitosamente");
			} else {
				return array('journal_entry_id' => 0, 'status'=>'error', 'message'=>"No se pudo grabar la transacción. Intente más tarde");;
			}
		} else {
			return array('status'=>'error', 'message'=>'La regla contable no existe. No se pudo grabar');
		}		
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->user_id=1;

		        if (Yii::app()->mambu->isInitialized && Yii::app()->mambu->connect())
		        {
			    	Yii::app()->mambu->postBody = "{
						'date'			:'$this->journalEntry_date',
						'debitAccount1'	:'$this->debitAccount',
						'debitAmount1'	:'$this->debitAmount',
						'creditAccount1':'$this->creditAccount',
						'creditAmount1'	:'$this->creditAmount',
						'notes'			:'$this->notes'
						}";

					return Yii::app()->mambu->post();
			    } else
			    	return false;
		    } else
	            $this->updatedon=time();
	    }
	    else
	        return false;
	}

}