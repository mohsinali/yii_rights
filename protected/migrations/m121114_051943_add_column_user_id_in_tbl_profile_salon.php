<?php

class m121114_051943_add_column_user_id_in_tbl_profile_salon extends CDbMigration
{
	public function up()
	{
            $this->addColumn('tbl_profile_salon', 'user_id', 'INTEGER');
	}

	public function down()
	{
            $this->dropColumn('tbl_profile_salon', 'user_id');
	}

}