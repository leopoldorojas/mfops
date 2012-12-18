<?php

class m121218_153251_addColumnsToAccountingRuleTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('accounting_rule', 'description', 'string');
	}

	public function down()
	{
		$this->dropColumn('accountin_rule', 'description');
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