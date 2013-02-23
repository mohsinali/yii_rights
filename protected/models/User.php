<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 */
class User extends CActiveRecord
{
	public $repeat_password;
	public $user_role;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
  * perform one-way encryption on the password before we store it in the database
  */
 	protected function beforeSave(){
   //parent::afterValidate();
   $this->password = $this->encrypt($this->password);
   return true;
   }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
      array('username', 'required'),
			array('first_name, last_name, email, password', 'required', 'message' => '{attribute} is required.'),
			array('first_name, last_name', 'length', 'max'=>200),
			array('email', 'length', 'max'=>100), array('email', 'email'),
      array('city_id', 'required'),
			array('password', 'required'),
        array('password', 'length', 'min' => 6, 'max' => 40),
        array('repeat_password', 'required'),
        array('repeat_password', 'length', 'min' => 6, 'max' => 40),
        array('password', 'compare', 'compareAttribute' => 'repeat_password'),
        array('profile_image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'message' => '{attribute} is required.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
        'city' => array(self::BELONGS_TO, 'City', 'city_id'),
        'salon_type' => array(self::BELONGS_TO, 'SalonType', 'salon_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
      return array(
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'city_id' => 'City',
            'role_id' => 'Role',
            'profile_image' => 'Profile picture',
        );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function encrypt($value) {
    return md5($value);
  }
  
  public function assignUserToRole() {
        $auth = Yii::app()->authManager;
        $auth->assign($this->user_role, $this->id);

//            Some sample code
//            $auth->createRole("Authenticated");
//            $auth->assign('role', 1);
    }
    
    public function getRoleById($user_id){
            $list= Yii::app()->db->createCommand('select * from AuthAssignment where userid=:user_id')->bindValue('user_id', $user_id)->queryAll();

            $rs=array();
            foreach($list as $item){
                //process each item here
                $rs[]=$item;

            }
            return $rs;
        }
}
