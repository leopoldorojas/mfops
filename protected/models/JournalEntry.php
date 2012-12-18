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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'debitAccount' => 'Debit Account',
			'debitAmount' => 'Debit Amount',
			'creditAccount' => 'Credit Account',
			'creditAmount' => 'Credit Amount',
			'branchID' => 'Branch',
			'journalEntry_date' => 'Journal Entry Date',
			'notes' => 'Notes',
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

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
			include('httpful-0.2.0.phar');
			$uri = 'https://danta.sandbox.mambu.com//api/gljournalentries';
			$response = \Httpful\Request::post($uri)
				->sendsJson()              
				->authenticateWith('api', 'api1234')
				->body("{
					'date'			:'$this->journalEntry_date',
					'debitAccount1'	:'$this->debitAccount',
					'debitAmount1'	:'$this->debitAmount',
					'creditAccount1':'$this->creditAccount',
					'creditAmount1'	:'$this->creditAmount',
					'notes'			:'$this->notes'
					}")
				->send();

			// echo "La respuesta fue " . $response->body->returnCode . " " . $response->body->returnStatus;
			// echo "La respuesta fue " . var_dump($response);
			// Yii::app()->end();

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