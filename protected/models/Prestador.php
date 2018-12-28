<?php

/**
 * This is the model class for table "prestador".
 *
 * The followings are the available columns in table 'prestador':
 * @property integer $id_prestador
 * @property integer $id_claseprestador
 * @property integer $id_nivelatencion
 * @property integer $id_naturalezajuridica
 * @property integer $id_municipio
 * @property string $codigo_prestador
 * @property string $nit_prestador
 * @property string $nombre_prestador
 * @property string $direccion_prestador
 * @property string $telefono_prestador
 * @property string $latitud_prestador
 * @property string $longitud_prestador
 *
 * The followings are the available model relations:
 * @property CapacidadInstalada[] $capacidadInstaladas
 * @property ServicioPrestador[] $servicioPrestadors
 * @property Administrador[] $administradors
 * @property ProcedimientoPrestador[] $procedimientoPrestadors
 * @property Municipio $idMunicipio
 * @property NaturalezaJuridica $idNaturalezajuridica
 * @property NivelAtencion $idNivelatencion
 * @property ClasePrestador $idClaseprestador
 */
class Prestador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_prestador', 'required'),
			array('id_claseprestador, id_nivelatencion, id_naturalezajuridica, id_municipio', 'numerical', 'integerOnly'=>true),
			array('codigo_prestador', 'length', 'max'=>15),
			array('nombre_prestador, direccion_prestador', 'length', 'max'=>500),
			array('telefono_prestador', 'length', 'max'=>150),
			array('nit_prestador, latitud_prestador, longitud_prestador', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_prestador, id_claseprestador, id_nivelatencion, id_naturalezajuridica, id_municipio, codigo_prestador, nit_prestador, nombre_prestador, direccion_prestador, telefono_prestador, latitud_prestador, longitud_prestador', 'safe', 'on'=>'search'),
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
			'capacidadInstaladas' => array(self::HAS_MANY, 'CapacidadInstalada', 'id_prestador'),
			'servicioPrestadors' => array(self::HAS_MANY, 'ServicioPrestador', 'id_prestador'),
			'administradors' => array(self::MANY_MANY, 'Administrador', 'administrador_prestador(id_prestador, id_admin)'),
			'procedimientoPrestadors' => array(self::HAS_MANY, 'ProcedimientoPrestador', 'id_prestador'),
			'idMunicipio' => array(self::BELONGS_TO, 'Municipio', 'id_municipio'),
			'idNaturalezajuridica' => array(self::BELONGS_TO, 'NaturalezaJuridica', 'id_naturalezajuridica'),
			'idNivelatencion' => array(self::BELONGS_TO, 'NivelAtencion', 'id_nivelatencion'),
			'idClaseprestador' => array(self::BELONGS_TO, 'ClasePrestador', 'id_claseprestador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_prestador' => 'Id Prestador',
			'id_claseprestador' => 'Id Claseprestador',
			'id_nivelatencion' => 'Id Nivelatencion',
			'id_naturalezajuridica' => 'Id Naturalezajuridica',
			'id_municipio' => 'Id Municipio',
			'codigo_prestador' => 'Codigo Prestador',
			'nit_prestador' => 'Nit Prestador',
			'nombre_prestador' => 'Nombre Prestador',
			'direccion_prestador' => 'Direccion Prestador',
			'telefono_prestador' => 'Telefono Prestador',
			'latitud_prestador' => 'Latitud Prestador',
			'longitud_prestador' => 'Longitud Prestador',
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

		$criteria->compare('id_prestador',$this->id_prestador);
		$criteria->compare('id_claseprestador',$this->id_claseprestador);
		$criteria->compare('id_nivelatencion',$this->id_nivelatencion);
		$criteria->compare('id_naturalezajuridica',$this->id_naturalezajuridica);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('codigo_prestador',$this->codigo_prestador,true);
		$criteria->compare('nit_prestador',$this->nit_prestador,true);
		$criteria->compare('nombre_prestador',$this->nombre_prestador,true);
		$criteria->compare('direccion_prestador',$this->direccion_prestador,true);
		$criteria->compare('telefono_prestador',$this->telefono_prestador,true);
		$criteria->compare('latitud_prestador',$this->latitud_prestador,true);
		$criteria->compare('longitud_prestador',$this->longitud_prestador,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prestador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
