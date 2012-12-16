<?php

class m121203_203303_addColumnCajaOBancosToOperationTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('operation', 'banco', 'boolean NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('operation','banco');
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