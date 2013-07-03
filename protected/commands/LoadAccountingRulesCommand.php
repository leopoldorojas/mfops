<?php 

class LoadAccountingRulesCommand extends CConsoleCommand
{
    public function run($args)
    {
        $accountingRules = AccountingRule::model()->findAll();

        foreach ($accountingRules as $accountingRule)
        {
            $movementType = MovementType::model()->findByAttributes(array('id'=>$accountingRule->type_id));
            $movementTypes = MovementType::model()->findAllByAttributes(array('description'=>$movementType->description),array(),'ORDER BY id');
            $companies = array(1,3,4,5);
            $i = 1;

            foreach ($companies as $company)
            {
                $newAccountingRule = new AccountingRule;
                $newAccountingRule->input=$accountingRule->input;
                $newAccountingRule->debitAccount1=$accountingRule->debitAccount1;
                $newAccountingRule->creditAccount1=$accountingRule->creditAccount1;
                $newAccountingRule->description=$accountingRule->description;
                $newAccountingRule->bank=$accountingRule->bank;
                $newAccountingRule->user_id=$accountingRule->user_id;
                $newAccountingRule->company_id = $company;
                $newAccountingRule->type_id = $movementTypes[$i]->id;
                if (!$newAccountingRule->save())
                    echo var_dump($newAccountingRule->errors);
                $i++;
            }

        }

    }
}

?>