<?php

/**
 * This is the model class for table "tipo_prestador".
 *
 * The followings are the available columns in table 'tipo_prestador':
 * @property integer $id_tipoprestador
 * @property string $tipo_prestador
 *
 * The followings are the available model relations:
 * @property Prestador[] $prestadors
 */
class TipoPrestador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_prestador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_prestador', 'required'),
			array('tipo_prestador', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipoprestador, tipo_prestador', 'safe', 'on'=>'search'),
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
			'id_tipoprestador' => 'Id Tipoprestador',
			'tipo_prestador' => 'Tipo Prestador',
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

		$criteria->compare('id_tipoprestador',$this->id_tipoprestador);
		$criteria->compare('tipo_prestador',$this->tipo_prestador,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoPrestador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
