<?php

class m121104_135111_dropColumnInputInOperationTable extends CDbMigration
{
	public function up()
	{		
		$this->dropColumn('operation','input');
	}

	public function down()
	{
		$this->addColumn('operation','input','boolean NOT NULL');
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