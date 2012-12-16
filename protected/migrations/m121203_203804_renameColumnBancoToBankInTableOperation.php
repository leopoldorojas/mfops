<?php

class m121203_203804_renameColumnBancoToBankInTableOperation extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('operation', 'banco', 'bank');
	}

	public function down()
	{
		$this->renameColumn('operation', 'bank', 'banco');
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