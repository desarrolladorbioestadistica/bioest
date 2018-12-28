<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $id_categoria
 * @property integer $id_subgrupo
 * @property integer $idvar_categoria
 * @property string $nombre_categoria
 *
 * The followings are the available model relations:
 * @property Procedimiento[] $procedimientos
 * @property Subgrupo $idSubgrupo
 */
class Categoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idvar_categoria, nombre_categoria', 'required'),
			array('id_subgrupo, idvar_categoria', 'numerical', 'integerOnly'=>true),
			array('nombre_categoria', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_categoria, id_subgrupo, idvar_categoria, nombre_categoria', 'safe', 'on'=>'search'),
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
			'procedimientos' => array(self::HAS_MANY, 'Procedimiento', 'id_categoria'),
			'idSubgrupo' => array(self::BELONGS_TO, 'Subgrupo', 'id_subgrupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_categoria' => 'Id Categoria',
			'id_subgrupo' => 'Id Subgrupo',
			'idvar_categoria' => 'Idvar Categoria',
			'nombre_categoria' => 'Nombre Categoria',
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

		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_subgrupo',$this->id_subgrupo);
		$criteria->compare('idvar_categoria',$this->idvar_categoria);
		$criteria->compare('nombre_categoria',$this->nombre_categoria,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
