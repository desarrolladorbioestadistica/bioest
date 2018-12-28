<?php

/**
 * This is the model class for table "grupo".
 *
 * The followings are the available columns in table 'grupo':
 * @property integer $id_grupo
 * @property integer $idvar_grupo
 * @property integer $id_capitulo
 * @property string $nombre_grupo
 *
 * The followings are the available model relations:
 * @property Subgrupo[] $subgrupos
 * @property Capitulo $idCapitulo
 */
class Grupo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idvar_grupo, nombre_grupo', 'required'),
			array('idvar_grupo, id_capitulo', 'numerical', 'integerOnly'=>true),
			array('nombre_grupo', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grupo, idvar_grupo, id_capitulo, nombre_grupo', 'safe', 'on'=>'search'),
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
			'subgrupos' => array(self::HAS_MANY, 'Subgrupo', 'id_grupo'),
			'idCapitulo' => array(self::BELONGS_TO, 'Capitulo', 'id_capitulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grupo' => 'Id Grupo',
			'idvar_grupo' => 'Idvar Grupo',
			'id_capitulo' => 'Id Capitulo',
			'nombre_grupo' => 'Nombre Grupo',
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

		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('idvar_grupo',$this->idvar_grupo);
		$criteria->compare('id_capitulo',$this->id_capitulo);
		$criteria->compare('nombre_grupo',$this->nombre_grupo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grupo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
