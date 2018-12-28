<?php

/**
 * This is the model class for table "capacidad_instalada".
 *
 * The followings are the available columns in table 'capacidad_instalada':
 * @property integer $id_capinstalada
 * @property integer $id_implemento
 * @property integer $id_modalidad
 * @property integer $id_prestador
 * @property integer $id_tipoimplemento
 * @property string $cantidad_capinstalada
 *
 * The followings are the available model relations:
 * @property Implemento $idImplemento
 * @property Modalidad $idModalidad
 * @property Prestador $idPrestador
 * @property TipoImplemento $idTipoimplemento
 */
class CapacidadInstalada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'capacidad_instalada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad_capinstalada', 'required'),
			array('id_implemento, id_modalidad, id_prestador, id_tipoimplemento', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_capinstalada, id_implemento, id_modalidad, id_prestador, id_tipoimplemento, cantidad_capinstalada', 'safe', 'on'=>'search'),
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
			'idImplemento' => array(self::BELONGS_TO, 'Implemento', 'id_implemento'),
			'idModalidad' => array(self::BELONGS_TO, 'Modalidad', 'id_modalidad'),
			'idPrestador' => array(self::BELONGS_TO, 'Prestador', 'id_prestador'),
			'idTipoimplemento' => array(self::BELONGS_TO, 'TipoImplemento', 'id_tipoimplemento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_capinstalada' => 'Id Capinstalada',
			'id_implemento' => 'Id Implemento',
			'id_modalidad' => 'Id Modalidad',
			'id_prestador' => 'Id Prestador',
			'id_tipoimplemento' => 'Id Tipoimplemento',
			'cantidad_capinstalada' => 'Cantidad Capinstalada',
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

		$criteria->compare('id_capinstalada',$this->id_capinstalada);
		$criteria->compare('id_implemento',$this->id_implemento);
		$criteria->compare('id_modalidad',$this->id_modalidad);
		$criteria->compare('id_prestador',$this->id_prestador);
		$criteria->compare('id_tipoimplemento',$this->id_tipoimplemento);
		$criteria->compare('cantidad_capinstalada',$this->cantidad_capinstalada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CapacidadInstalada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
