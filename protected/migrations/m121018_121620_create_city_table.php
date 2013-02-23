<?php

class m121018_121620_create_city_table extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_city', array(
                'id' => 'pk',
                'name' => 'varchar(150) NOT NULL',
                'country_id' => 'integer NOT NULL'
            ), 'ENGINE InnoDB');            
	}

	public function down()
	{
            $this->dropTable('tbl_city');
	}	
}