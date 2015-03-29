<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CompanySeedForm extends CFormModel
{
	public $source_company;
	public $target_company;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('source_company, target_company', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'source_company'=>'Empresa Origen',
			'target_company'=>'Empresa Destino',
		);
	}


/**
   * Do the copy of seed data from a company to another.
   */
  public function loadData()
  {
    $user_id = Yii::app()->user->id;

    // Copy from $this->source to $this->target
    $transaction = Yii::app()->db->beginTransaction();
    try {
      $sql = "INSERT INTO document_type (company_id, user_id, description, next_number) VALUES (:company_id, :user_id, :description, :next_number)";
      $command = Yii::app()->db->createCommand($sql);
      $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
      $command->bindParam(":user_id", $user_id, PDO::PARAM_STR);
      $command->bindValue(":description", "Factura", PDO::PARAM_STR);
      $command->bindValue(":next_number", 0, PDO::PARAM_STR);
      $command->execute();

      $command->bindValue(":description", "Recibo", PDO::PARAM_STR);
      $command->bindValue(":next_number", 1, PDO::PARAM_STR);
      $command->execute();

      // Copy MovementCategories Table
      $sql = "SELECT * FROM movement_category WHERE company_id = :company_id";
      $command = Yii::app()->db->createCommand($sql);
      $command->bindParam(":company_id", $this->source_company,PDO::PARAM_STR);
      $movementCategories = $command->query();
      while(($movementCategory = $movementCategories->read()) != false) {
        $sql = "INSERT INTO movement_category (company_id, user_id, description) VALUES (:company_id, :user_id, :description)";
        $command = Yii::app()->db->createCommand($sql); 
        $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
        $command->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $command->bindParam(":description", $movementCategory['description'], PDO::PARAM_STR);
        $command->execute();
      } 

      // Copy MovementType Table
      $sql = "SELECT * FROM movement_type WHERE company_id = :company_id";
      $command = Yii::app()->db->createCommand($sql);
      $command->bindParam(":company_id", $this->source_company,PDO::PARAM_STR);
      $movementTypes = $command->query();
      while(($movementType = $movementTypes->read()) != false) {
        $sql = "SELECT description FROM movement_category WHERE id = :movement_category_id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":movement_category_id", $movementType['movement_category_id'], PDO::PARAM_STR);
        $description = $command->queryScalar();

        $sql = "SELECT id FROM movement_category WHERE company_id = :company_id AND description = :description";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
        $command->bindParam(":description", $description, PDO::PARAM_STR);
        $movement_category_id = $command->queryScalar();

        $sql = "INSERT INTO movement_type (company_id, user_id, description, with_price, movement_category_id) VALUES (:company_id, :user_id, :description, :with_price, :movement_category_id)";
        $command = Yii::app()->db->createCommand($sql); 
        $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
        $command->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $command->bindParam(":description", $movementType['description'], PDO::PARAM_STR);
        $command->bindParam(":with_price", $movementType['with_price'], PDO::PARAM_STR);
        $command->bindParam(":movement_category_id", $movement_category_id, PDO::PARAM_STR);
        $command->execute();
      }

      // Copy AccountingRule Table
      $sql = "SELECT * FROM accounting_rule WHERE company_id = :company_id";
      $command = Yii::app()->db->createCommand($sql);
      $command->bindParam(":company_id", $this->source_company,PDO::PARAM_STR);
      $accountingRules = $command->query();
      while(($accountingRule = $accountingRules->read()) != false) {
        $sql = "SELECT description FROM movement_type WHERE id = :type_id";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":type_id", $accountingRule['type_id'], PDO::PARAM_STR);
        $description = $command->queryScalar();

        $sql = "SELECT id FROM movement_type WHERE company_id = :company_id AND description = :description";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
        $command->bindParam(":description", $description, PDO::PARAM_STR);
        $type_id = $command->queryScalar();

        $sql = "INSERT INTO accounting_rule (company_id, user_id, description, input, type_id, debitAccount1, creditAccount1, bank) VALUES (:company_id, :user_id, :description, :input, :type_id, :debitAccount1, :creditAccount1, :bank)";
        $command = Yii::app()->db->createCommand($sql); 
        $command->bindParam(":company_id", $this->target_company, PDO::PARAM_STR);
        $command->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $command->bindParam(":description", $accountingRule['description'], PDO::PARAM_STR);
        $command->bindParam(":input", $accountingRule['input'], PDO::PARAM_STR);
        $command->bindParam(":type_id", $type_id, PDO::PARAM_STR);
        $command->bindParam(":debitAccount1", $accountingRule['debitAccount1'], PDO::PARAM_STR);
        $command->bindParam(":creditAccount1", $accountingRule['creditAccount1'], PDO::PARAM_STR);
        $command->bindParam(":bank", $accountingRule['bank'], PDO::PARAM_STR);
        $command->execute();
      }
    }
    catch(Exception $e)
    {
      $transaction->rollback();
      return 9999;
    }

    return 99;
  }

	/**
	 * Do the copy of seed data from a company to another.
	 */
	public function loadDataOld()
	{
		// Copy from $this->source to $this->target
    // return successful_copy or false if not
    $company_logged = Yii::App()->user->company_id;
    Yii::App()->user->company_id = $this->target_company;

    $movementCategories = MovementCategory::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($movementCategories)) return 1;
    foreach ($movementCategories as $movementCategory) {
      $newMovementCategory=new MovementCategory;
      $newMovementCategory->attributes=$movementCategory->attributes;
      if (!$newMovementCategory->save())
      	return 2;
    }

    $movementTypes = MovementType::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($movementTypes)) return 3;
    foreach ($movementTypes as $movementType) {
      $local_category_id = MovementCategory::model()->findByAttributes(array('company_id'=>$this->target_company, 'description'=>$movementType->movement_category->description));

      $newMovementType=new MovementType;
      $newMovementType->attributes=$movementType->attributes;
      $newMovementType->category_id = $local_category_id->id;
      if (!$newMovementType->save())
      	return 4;
    }

    $accountingRules = AccountingRule::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($accountingRules)) return 5;
    foreach ($accountingRules as $accountingRule) {
      $local_movementType_id = MovementType::model()->findByAttributes(array('company_id'=>$this->target_company, 'description'=>$accountingRule->movement_type->description));

      $newAccountingRule=new AccountingRule;
      $newAccountingRule->attributes=$accountingRule->attributes;
      $newAccountingRule->type_id = $local_movementType_id->id;
      if (!$newAccountingRule->save())
      	return 6;
    }

    Yii::App()->user->company_id = $company_logged;
    return 99;
  }
}