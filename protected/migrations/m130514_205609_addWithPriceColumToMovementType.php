<?php

class m130514_205609_addWithPriceColumToMovementType extends CDbMigration
{
	public function up()
	{
		$this->addColumn('movement_type', 'with_price', 'boolean');
	}

	public function down()
	{
		$this->dropColumn('movement_type', 'with_price');
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