<?php

/**
 * This is the model class for table "afiliacion".
 *
 * The followings are the available columns in table 'afiliacion':
 * @property integer $id_afiliacion
 * @property integer $id_tipoafiliado
 * @property integer $id_genero
 * @property integer $id_admin
 * @property integer $id_quinquenio
 * @property integer $id_tipopoblacion
 * @property integer $id_zona
 * @property integer $id_regimenadmon
 * @property string $anio_afiliacion
 * @property integer $mes_afiliacion
 * @property string $total_poblacion
 *
 * The followings are the available model relations:
 * @property Administrador $idAdmin
 * @property Genero $idGenero
 * @property Mes $mesAfiliacion
 * @property Quinquenio $idQuinquenio
 * @property RegimenAdministrador $idRegimenadmon
 * @property TipoAfiliado $idTipoafiliado
 * @property TipoPoblacion $idTipopoblacion
 * @property Zona $idZona
 */
class Afiliacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'afiliacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('anio_afiliacion, total_poblacion', 'required'),
			array('id_tipoafiliado, id_genero, id_admin, id_quinquenio, id_tipopoblacion, id_zona, id_regimenadmon, mes_afiliacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_afiliacion, id_tipoafiliado, id_genero, id_admin, id_quinquenio, id_tipopoblacion, id_zona, id_regimenadmon, anio_afiliacion, mes_afiliacion, total_poblacion', 'safe', 'on'=>'search'),
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
			'idAdmin' => array(self::BELONGS_TO, 'Administrador', 'id_admin'),
			'idGenero' => array(self::BELONGS_TO, 'Genero', 'id_genero'),
			'mesAfiliacion' => array(self::BELONGS_TO, 'Mes', 'mes_afiliacion'),
			'idQuinquenio' => array(self::BELONGS_TO, 'Quinquenio', 'id_quinquenio'),
			'idRegimenadmon' => array(self::BELONGS_TO, 'RegimenAdministrador', 'id_regimenadmon'),
			'idTipoafiliado' => array(self::BELONGS_TO, 'TipoAfiliado', 'id_tipoafiliado'),
			'idTipopoblacion' => array(self::BELONGS_TO, 'TipoPoblacion', 'id_tipopoblacion'),
			'idZona' => array(self::BELONGS_TO, 'Zona', 'id_zona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_afiliacion' => 'Id Afiliacion',
			'id_tipoafiliado' => 'Id Tipoafiliado',
			'id_genero' => 'Id Genero',
			'id_admin' => 'Id Admin',
			'id_quinquenio' => 'Id Quinquenio',
			'id_tipopoblacion' => 'Id Tipopoblacion',
			'id_zona' => 'Id Zona',
			'id_regimenadmon' => 'Id Regimenadmon',
			'anio_afiliacion' => 'Anio Afiliacion',
			'mes_afiliacion' => 'Mes Afiliacion',
			'total_poblacion' => 'Total Poblacion',
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

		$criteria->compare('id_afiliacion',$this->id_afiliacion);
		$criteria->compare('id_tipoafiliado',$this->id_tipoafiliado);
		$criteria->compare('id_genero',$this->id_genero);
		$criteria->compare('id_admin',$this->id_admin);
		$criteria->compare('id_quinquenio',$this->id_quinquenio);
		$criteria->compare('id_tipopoblacion',$this->id_tipopoblacion);
		$criteria->compare('id_zona',$this->id_zona);
		$criteria->compare('id_regimenadmon',$this->id_regimenadmon);
		$criteria->compare('anio_afiliacion',$this->anio_afiliacion,true);
		$criteria->compare('mes_afiliacion',$this->mes_afiliacion);
		$criteria->compare('total_poblacion',$this->total_poblacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Afiliacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
