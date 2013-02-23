<?php

/**
 * This is the model class for table "{{profile_salon}}".
 *
 * The followings are the available columns in table '{{profile_salon}}':
 * @property integer $id
 * @property string $salon_name
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $contact_person
 * @property string $contact_email
 * @property integer $salon_type
 * @property string $salon_picture
 * @property string $business_description
 * @property string $services_offered
 * @property string $lattitude
 * @property string $longitude
 * @property integer $user_id
 */
class ProfileSalon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProfileSalon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile_salon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('salon_name', 'required'),
			array('salon_type, user_id', 'numerical', 'integerOnly'=>true),
			array('salon_name, salon_picture', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>100),
			array('address1, address2, contact_person, contact_email', 'length', 'max'=>255),
			array('lattitude, longitude', 'length', 'max'=>10),
			array('business_description, services_offered', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, salon_name, phone, address1, address2, contact_person, contact_email, salon_type, salon_picture, business_description, services_offered, lattitude, longitude, user_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'salon_name' => 'Salon Name',
			'phone' => 'Phone',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'contact_person' => 'Contact Person',
			'contact_email' => 'Contact Email',
			'salon_type' => 'Salon Type',
			'salon_picture' => 'Salon Picture',
			'business_description' => 'Business Description',
			'services_offered' => 'Services Offered',
			'lattitude' => 'Lattitude',
			'longitude' => 'Longitude',
			'user_id' => 'User',
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
		$criteria->compare('salon_name',$this->salon_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('salon_type',$this->salon_type);
		$criteria->compare('salon_picture',$this->salon_picture,true);
		$criteria->compare('business_description',$this->business_description,true);
		$criteria->compare('services_offered',$this->services_offered,true);
		$criteria->compare('lattitude',$this->lattitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}