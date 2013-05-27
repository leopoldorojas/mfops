<?php

class m130527_213512_addCompanyToAllTables extends CDbMigration
{
	public function up()
	{
		$this->addColumn('accounting_rule', 'company_id', 'integer NOT NULL');
		$this->addColumn('document', 'company_id', 'integer NOT NULL');
		$this->addColumn('document_type', 'company_id', 'integer NOT NULL');
		$this->addColumn('journal_entry', 'company_id', 'integer NOT NULL');
		$this->addColumn('movement_category', 'company_id', 'integer NOT NULL');
		$this->addColumn('movement_type', 'company_id', 'integer NOT NULL');
		$this->addColumn('operation', 'company_id', 'integer NOT NULL');
		$this->addColumn('operation_entity', 'company_id', 'integer NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('accounting_rule', 'company_id');
		$this->dropColumn('document', 'company_id');
		$this->dropColumn('document_type', 'company_id');
		$this->dropColumn('journal_entry', 'company_id');
		$this->dropColumn('movement_category', 'company_id');
		$this->dropColumn('movement_type', 'company_id');
		$this->dropColumn('operation', 'company_id');
		$this->dropColumn('operation_entity', 'company_id');
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