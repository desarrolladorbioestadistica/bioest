<?php

/**
 * This is the model class for table "subgrupo".
 *
 * The followings are the available columns in table 'subgrupo':
 * @property integer $id_subgrupo
 * @property integer $id_grupo
 * @property integer $idvar_subgrupo
 * @property string $nombre_subgrupo
 *
 * The followings are the available model relations:
 * @property Categoria[] $categorias
 * @property Grupo $idGrupo
 */
class Subgrupo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subgrupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idvar_subgrupo, nombre_subgrupo', 'required'),
			array('id_grupo, idvar_subgrupo', 'numerical', 'integerOnly'=>true),
			array('nombre_subgrupo', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_subgrupo, id_grupo, idvar_subgrupo, nombre_subgrupo', 'safe', 'on'=>'search'),
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
			'categorias' => array(self::HAS_MANY, 'Categoria', 'id_subgrupo'),
			'idGrupo' => array(self::BELONGS_TO, 'Grupo', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_subgrupo' => 'Id Subgrupo',
			'id_grupo' => 'Id Grupo',
			'idvar_subgrupo' => 'Idvar Subgrupo',
			'nombre_subgrupo' => 'Nombre Subgrupo',
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

		$criteria->compare('id_subgrupo',$this->id_subgrupo);
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('idvar_subgrupo',$this->idvar_subgrupo);
		$criteria->compare('nombre_subgrupo',$this->nombre_subgrupo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subgrupo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
