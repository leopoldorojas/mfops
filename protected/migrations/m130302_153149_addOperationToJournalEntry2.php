<?php

class m130302_153149_addOperationToJournalEntry2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('journal_entry', 'operation_id', 'integer');
	}

	public function down()
	{
		$this->dropColumn('journal_entry', 'operation_id');
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