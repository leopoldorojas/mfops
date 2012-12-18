<?php

class m121218_154108_addColumnsBankToAccountingRuleTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('accounting_rule', 'bank', 'boolean NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('accountin_rule', 'bank');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}