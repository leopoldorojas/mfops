<?php 

class LoadNewCompanyCommand extends CConsoleCommand
{
    public function run($args)
    {
        $accountingRules = AccountingRule::model()->findAllByAttributes(array('company_id'=>4), array(),'');

        foreach ($accountingRules as $accountingRule)
        {
            $movementType = MovementType::model()->findByAttributes(array('id'=>$accountingRule->type_id));
            $movementType2 = MovementType::model()->findByAttributes(array('description'=>$movementType->description, 'company_id'=>8));

            $accountingRule2 = AccountingRule::model()->findByAttributes(array('description'=>$accountingRule->description, 'company_id'=>8));
            $accountingRule2->type_id = $movementType2->id;
            $accountingRule2->save();
        }

    }
}

?>