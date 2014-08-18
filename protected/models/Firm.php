<?php

/**
 * This is the model class for table "firm".
 *
 * The followings are the available columns in table 'firm':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $timetable
 * @property string $contacts
 * @property integer $owner
 * @property boolean $confirm
 * @property double $longitude
 * @property double $latitude
 *
 * The followings are the available model relations:
 * @property User $owner0
 */
class Firm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'firm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner', 'numerical', 'integerOnly'=>true),
			array('longitude, latitude', 'numerical'),
			array('name, address, timetable, contacts, confirm', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, timetable, contacts, owner, confirm, longitude, latitude', 'safe', 'on'=>'search'),
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
			'owner0' => array(self::BELONGS_TO, 'User', 'owner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'address' => 'Address',
			'timetable' => 'Timetable',
			'contacts' => 'Contacts',
			'owner' => 'Owner',
			'confirm' => 'Confirm',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('timetable',$this->timetable,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('confirm',$this->confirm);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('latitude',$this->latitude);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Firm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
