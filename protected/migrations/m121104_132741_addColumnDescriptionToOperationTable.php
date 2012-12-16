<?php

class m121104_132741_addColumnDescriptionToOperationTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('operation', 'description', 'text');
	}

	public function down()
	{
		$this->dropColumn('user', 'description');
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