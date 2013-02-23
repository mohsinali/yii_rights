<?php

class m121018_111031_create_user_table extends CDbMigration
{
	public function up()
	{
            $this->createTable("tbl_user", array(
                'id' => 'pk',
                'first_name' => 'varchar(200) NOT NULL',
                'last_name' => 'varchar(200) NOT NULL',
                'email' => 'varchar(100) NOT NULL',
                'password' => 'varchar(255) NOT NULL',
                'UNIQUE KEY `email` (`email`)',
            ), 'ENGINE InnoDB');
	}

	public function down()
	{
		$this->dropTable("tbl_user");
	}
}