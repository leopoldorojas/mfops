<?php

class m121215_214956_createTableGLJournalEntry extends CDbMigration
{
	public function up()
	{
		$this->createTable('journal_entry', array(
			'id' => 'pk',
			'debitAccount'=>'string NOT NULL',
			'debitAmount'=>'money NOT NULL',
			'creditAccount'=>'string NOT NULL',
			'creditAmount'=>'money NOT NULL',
			'branchID'=>'integer',
			'journalEntry_date'=>'date NOT NULL',
			'notes'=>'text',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121215_214956_createTableGLJournalEntry does not support migration down.\n";
		// return false;
		$this->dropTable('journal_entry');		
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