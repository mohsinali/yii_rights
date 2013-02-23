<?php

class m121102_085249_add_column_profile_image extends CDbMigration
{
	public function up()
	{
            $this->addColumn('tbl_user', 'profile_image', 'VARCHAR(200)');
	}

	public function down()
	{
		$this->dropColumn('tbl_user', 'profile_image');
	}
	
}