<?php

class m121203_210007_addColumnInputInOperationTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('operation', 'input', 'boolean NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('operation','input');
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