<?php

/**
 * This is the model class for table "afilicion".
 *
 * The followings are the available columns in table 'afilicion':
 * @property integer $id_afiliacion
 * @property integer $id_tipoafiliado
 * @property integer $id_genero
 * @property integer $id_tipopoblacion
 * @property integer $id_administradormunicipio
 * @property integer $id_regimenadmon
 * @property string $total_poblacion
 *
 * The followings are the available model relations:
 * @property AdministradorMunicipio $idAdministradormunicipio
 * @property Genero $idGenero
 * @property RegimenAdministrador $idRegimenadmon
 * @property TipoAfiliado $idTipoafiliado
 * @property TipoPoblacion $idTipopoblacion
 */
class Afilicion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'afilicion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_poblacion', 'required'),
			array('id_tipoafiliado, id_genero, id_tipopoblacion, id_administradormunicipio, id_regimenadmon', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_afiliacion, id_tipoafiliado, id_genero, id_tipopoblacion, id_administradormunicipio, id_regimenadmon, total_poblacion', 'safe', 'on'=>'search'),
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
			'idAdministradormunicipio' => array(self::BELONGS_TO, 'AdministradorMunicipio', 'id_administradormunicipio'),
			'idGenero' => array(self::BELONGS_TO, 'Genero', 'id_genero'),
			'idRegimenadmon' => array(self::BELONGS_TO, 'RegimenAdministrador', 'id_regimenadmon'),
			'idTipoafiliado' => array(self::BELONGS_TO, 'TipoAfiliado', 'id_tipoafiliado'),
			'idTipopoblacion' => array(self::BELONGS_TO, 'TipoPoblacion', 'id_tipopoblacion'),
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
			'id_tipopoblacion' => 'Id Tipopoblacion',
			'id_administradormunicipio' => 'Id Administradormunicipio',
			'id_regimenadmon' => 'Id Regimenadmon',
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
		$criteria->compare('id_tipopoblacion',$this->id_tipopoblacion);
		$criteria->compare('id_administradormunicipio',$this->id_administradormunicipio);
		$criteria->compare('id_regimenadmon',$this->id_regimenadmon);
		$criteria->compare('total_poblacion',$this->total_poblacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Afilicion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
