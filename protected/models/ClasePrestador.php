<?php

/**
 * This is the model class for table "clase_prestador".
 *
 * The followings are the available columns in table 'clase_prestador':
 * @property integer $id_claseprestador
 * @property string $clase_prestador
 *
 * The followings are the available model relations:
 * @property Prestador[] $prestadors
 */
class ClasePrestador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clase_prestador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clase_prestador', 'required'),
			array('clase_prestador', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_claseprestador, clase_prestador', 'safe', 'on'=>'search'),
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
			'prestadors' => array(self::HAS_MANY, 'Prestador', 'id_tipoprestador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_claseprestador' => 'Id Claseprestador',
			'clase_prestador' => 'Clase Prestador',
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

		$criteria->compare('id_claseprestador',$this->id_claseprestador);
		$criteria->compare('clase_prestador',$this->clase_prestador,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClasePrestador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
