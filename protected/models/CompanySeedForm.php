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
	 * @return boolean whether loading of data is successful
	 */
	public function loadData()
	{
		// Copy from $this->source to $this->target
    // return successful_copy or false if not
    $company_logged = Yii::App()->user->company_id;
    Yii::App()->user->company_id = $this->target_company;

    $movementCategories = MovementCategory::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($movementCategories)) return false;
    foreach ($movementCategories as $movementCategory) {
      $newMovementCategory=new MovementCategory;
      $newMovementCategory->attributes=$movementCategory->attributes;
      if (!$newMovementCategory->save())
      	return false;
    }

    $movementTypes = MovementType::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($movementTypes)) return false;
    foreach ($movementTypes as $movementType) {
      $local_category_id = MovementCategory::model()->findByAttributes(array('company_id'=>$this->target_company, 'description'=>$movementType->movement_category->description));

      $newMovementType=new MovementType;
      $newMovementType->attributes=$movementType->attributes;
      $newMovementType->category_id = $local_category_id->id;
      if (!$newMovementType->save())
      	return false;
    }

    $accountingRules = AccountingRule::model()->findAllByAttributes(array('company_id'=>$this->source_company));
    if(empty($accountingRules)) return false;
    foreach ($accountingRules as $accountingRule) {
      $local_movementType_id = MovementType::model()->findByAttributes(array('company_id'=>$this->target_company, 'description'=>$accountingRule->movement_type->description));

      $newAccountingRule=new AccountingRule;
      $newAccountingRule->attributes=$accountingRule->attributes;
      $newAccountingRule->type_id = $local_movementType_id->id;
      if (!$newAccountingRule->save())
      	return false;
    }

    Yii::App()->user->company_id = $company_logged;
    return true;
}