<?php

/**
 * This is the model class for table "grupo_poblacional".
 *
 * The followings are the available columns in table 'grupo_poblacional':
 * @property integer $id_grupopoblacional
 * @property string $nombre_grupopoblacional
 *
 * The followings are the available model relations:
 * @property ProcedimientoPrestador[] $procedimientoPrestadors
 */
class GrupoPoblacional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupo_poblacional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_grupopoblacional', 'required'),
			array('nombre_grupopoblacional', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grupopoblacional, nombre_grupopoblacional', 'safe', 'on'=>'search'),
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
			'procedimientoPrestadors' => array(self::HAS_MANY, 'ProcedimientoPrestador', 'id_grupopoblacional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grupopoblacional' => 'Id Grupopoblacional',
			'nombre_grupopoblacional' => 'Nombre Grupopoblacional',
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

		$criteria->compare('id_grupopoblacional',$this->id_grupopoblacional);
		$criteria->compare('nombre_grupopoblacional',$this->nombre_grupopoblacional,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GrupoPoblacional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
