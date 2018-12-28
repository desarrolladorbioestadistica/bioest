<?php

/**
 * This is the model class for table "regimen_administrador".
 *
 * The followings are the available columns in table 'regimen_administrador':
 * @property integer $id_regimenadmon
 * @property string $regimen_administrador
 *
 * The followings are the available model relations:
 * @property Administrador[] $administradors
 */
class RegimenAdministrador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regimen_administrador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('regimen_administrador', 'required'),
			array('regimen_administrador', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_regimenadmon, regimen_administrador', 'safe', 'on'=>'search'),
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
			'administradors' => array(self::HAS_MANY, 'Administrador', 'id_regimenadmon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_regimenadmon' => 'Id Regimenadmon',
			'regimen_administrador' => 'Regimen Administrador',
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

		$criteria->compare('id_regimenadmon',$this->id_regimenadmon);
		$criteria->compare('regimen_administrador',$this->regimen_administrador,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegimenAdministrador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
