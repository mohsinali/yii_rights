<?php

class m121031_104521_create_role_table extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_role', array(
                'id' => 'pk',
                'name' => 'varchar(150) NOT NULL',
            ), 'ENGINE InnoDB');
	}

	public function down()
	{
            $this->dropTable('tbl_role');
	}
}