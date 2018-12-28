<?php

/**
 * This is the model class for table "municipio".
 *
 * The followings are the available columns in table 'municipio':
 * @property integer $id_municipio
 * @property integer $id_departamento
 * @property string $nombre_municipio
 * @property string $idvar_municipio
 *
 * The followings are the available model relations:
 * @property Prestador[] $prestadors
 * @property Oferente[] $oferentes
 * @property Administrador[] $administradors
 * @property Departamento $idDepartamento
 */
class Municipio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_departamento, nombre_municipio', 'required'),
			array('id_departamento', 'numerical', 'integerOnly'=>true),
			array('nombre_municipio', 'length', 'max'=>100),
			array('idvar_municipio', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_municipio, id_departamento, nombre_municipio, idvar_municipio', 'safe', 'on'=>'search'),
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
			'prestadors' => array(self::HAS_MANY, 'Prestador', 'id_municipio'),
			'oferentes' => array(self::HAS_MANY, 'Oferente', 'id_municipio'),
			'administradors' => array(self::HAS_MANY, 'Administrador', 'id_municipio'),
			'idDepartamento' => array(self::BELONGS_TO, 'Departamento', 'id_departamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_municipio' => 'Id Municipio',
			'id_departamento' => 'Id Departamento',
			'nombre_municipio' => 'Nombre Municipio',
			'idvar_municipio' => 'Idvar Municipio',
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

		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('id_departamento',$this->id_departamento);
		$criteria->compare('nombre_municipio',$this->nombre_municipio,true);
		$criteria->compare('idvar_municipio',$this->idvar_municipio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Municipio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
