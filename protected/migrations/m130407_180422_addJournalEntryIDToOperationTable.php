<?php

class m130407_180422_addJournalEntryIDToOperationTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('operation', 'journal_entry_id', 'integer');
	}

	public function down()
	{
		$this->dropColumn('operation', 'journal_entry_id');
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