<?php

class m121018_121209_create_country_table extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_country', array(
                'id' => 'pk',
                'name' => 'varchar(150) NOT NULL'
                
            ), 'ENGINE InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_country');
	}
}