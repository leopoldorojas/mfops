<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id
 * @property string $name
 * @property string $identifier
 * @property string $id_number
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $country
 * @property string $telephone
 * @property string $email
 * @property string $website
 * @property string $tenant_url
 * @property string $tenant_user
 * @property string $tenant_password
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, identifier, tenant_url, tenant_user, tenant_password', 'required'),
			array('identifier','unique'),
			array('name, identifier, id_number, address_line_1, address_line_2, city, country, telephone, tenant_user, tenant_password', 'length', 'max'=>255),
			array('email', 'email'),
			array('website, tenant_url', 'url'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, identifier, id_number, address_line_1, address_line_2, city, country, telephone, email, website, tenant_url, tenant_user, tenant_password', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'User', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Empresa',
			'identifier'=>'Identificador',
			'id_number' => 'Número Id',
			'address_line_1' => 'Dirección',
			'address_line_2' => 'Dirección segunda línea',
			'city' => 'Ciudad',
			'country' => 'País',
			'telephone' => 'Teléfono',
			'email' => 'Email',
			'website' => 'Sitio Web',
			'tenant_url' => 'Dirección Mambu',
			'tenant_user' => 'User Mambu',
			'tenant_password' => 'Password Mambu',
			'user_id' => 'Usuario',
			'createdon' => 'Creado en',
			'updatedon' => 'Actualizado en',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('identifier',$this->identifier,true);
		$criteria->compare('id_number',$this->id_number,true);
		$criteria->compare('address_line_1',$this->address_line_1,true);
		$criteria->compare('address_line_2',$this->address_line_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('tenant_url',$this->tenant_url,true);
		$criteria->compare('tenant_user',$this->tenant_user,true);
		$criteria->compare('tenant_password',$this->tenant_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}