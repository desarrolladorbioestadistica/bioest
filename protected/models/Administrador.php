<?php

/**
 * This is the model class for table "administrador".
 *
 * The followings are the available columns in table 'administrador':
 * @property integer $id_admin
 * @property integer $id_tipoadministrador
 * @property string $codigo_eps
 * @property string $nit_admin
 * @property string $nombre_admin
 *
 * The followings are the available model relations:
 * @property TipoAdministrador $idTipoadministrador
 * @property AdministradorMunicipio[] $administradorMunicipios
 * @property Prestador[] $prestadors
 */
class Administrador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'administrador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipoadministrador', 'numerical', 'integerOnly'=>true),
			array('codigo_eps', 'length', 'max'=>10),
			array('nombre_admin', 'length', 'max'=>500),
			array('nit_admin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_admin, id_tipoadministrador, codigo_eps, nit_admin, nombre_admin', 'safe', 'on'=>'search'),
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
			'idTipoadministrador' => array(self::BELONGS_TO, 'TipoAdministrador', 'id_tipoadministrador'),
			'administradorMunicipios' => array(self::HAS_MANY, 'AdministradorMunicipio', 'id_admin'),
			'prestadors' => array(self::HAS_MANY, 'Prestador', 'id_admin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_admin' => 'Id Admin',
			'id_tipoadministrador' => 'Id Tipoadministrador',
			'codigo_eps' => 'Codigo Eps',
			'nit_admin' => 'Nit Admin',
			'nombre_admin' => 'Nombre Admin',
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

		$criteria->compare('id_admin',$this->id_admin);
		$criteria->compare('id_tipoadministrador',$this->id_tipoadministrador);
		$criteria->compare('codigo_eps',$this->codigo_eps,true);
		$criteria->compare('nit_admin',$this->nit_admin,true);
		$criteria->compare('nombre_admin',$this->nombre_admin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Administrador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
