<?php

/**
 * This is the model class for table "oferente".
 *
 * The followings are the available columns in table 'oferente':
 * @property integer $id_oferente
 * @property integer $id_municipio
 * @property string $nit_oferente
 * @property string $razon_social_oferente
 * @property string $direccion_oferente
 *
 * The followings are the available model relations:
 * @property HistoricoOferente[] $historicoOferentes
 * @property Municipio $idMunicipio
 * @property ImportacionDian[] $importacionDians
 */
class Oferente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oferente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_municipio, nit_oferente, razon_social_oferente, direccion_oferente', 'required'),
			array('id_municipio', 'numerical', 'integerOnly'=>true),
			array('nit_oferente', 'length', 'max'=>20),
			array('razon_social_oferente', 'length', 'max'=>100),
			array('direccion_oferente', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_oferente, id_municipio, nit_oferente, razon_social_oferente, direccion_oferente', 'safe', 'on'=>'search'),
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
			'historicoOferentes' => array(self::HAS_MANY, 'HistoricoOferente', 'id_oferente'),
			'idMunicipio' => array(self::BELONGS_TO, 'Municipio', 'id_municipio'),
			'importacionDians' => array(self::HAS_MANY, 'ImportacionDian', 'id_oferente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_oferente' => 'Id Oferente',
			'id_municipio' => 'Id Municipio',
			'nit_oferente' => 'Nit Oferente',
			'razon_social_oferente' => 'Razon Social Oferente',
			'direccion_oferente' => 'Direccion Oferente',
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

		$criteria->compare('id_oferente',$this->id_oferente);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('nit_oferente',$this->nit_oferente,true);
		$criteria->compare('razon_social_oferente',$this->razon_social_oferente,true);
		$criteria->compare('direccion_oferente',$this->direccion_oferente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Oferente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
