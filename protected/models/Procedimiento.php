<?php

/**
 * This is the model class for table "procedimiento".
 *
 * The followings are the available columns in table 'procedimiento':
 * @property integer $id_procedimiento
 * @property integer $id_categoria
 * @property string $nombre_procedimiento
 * @property integer $idvar_procedimiento
 *
 * The followings are the available model relations:
 * @property Categoria $idCategoria
 * @property ProcedimientoPrestador[] $procedimientoPrestadors
 */
class Procedimiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'procedimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_procedimiento, idvar_procedimiento', 'required'),
			array('id_categoria, idvar_procedimiento', 'numerical', 'integerOnly'=>true),
			array('nombre_procedimiento', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_procedimiento, id_categoria, nombre_procedimiento, idvar_procedimiento', 'safe', 'on'=>'search'),
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
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'procedimientoPrestadors' => array(self::HAS_MANY, 'ProcedimientoPrestador', 'id_procedimiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_procedimiento' => 'Id Procedimiento',
			'id_categoria' => 'Id Categoria',
			'nombre_procedimiento' => 'Nombre Procedimiento',
			'idvar_procedimiento' => 'Idvar Procedimiento',
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

		$criteria->compare('id_procedimiento',$this->id_procedimiento);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('nombre_procedimiento',$this->nombre_procedimiento,true);
		$criteria->compare('idvar_procedimiento',$this->idvar_procedimiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Procedimiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
