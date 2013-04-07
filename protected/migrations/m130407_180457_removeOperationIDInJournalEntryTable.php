<?php

class m130407_180457_removeOperationIDInJournalEntryTable extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('journal_entry', 'operation_id');
	}
	
	public function down()
	{
		$this->addColumn('journal_entry', 'operation_id', 'integer');
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