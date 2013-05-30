<?php

class m130530_135110_addIdentifierToCompany extends CDbMigration
{
	public function up()
	{
		$this->addColumn('company', 'identifier', 'string NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('company', 'identifier');
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