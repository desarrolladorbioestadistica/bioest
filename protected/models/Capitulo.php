<?php

/**
 * This is the model class for table "capitulo".
 *
 * The followings are the available columns in table 'capitulo':
 * @property integer $id_capitulo
 * @property string $idvar_capitulo
 * @property integer $id_seccion
 * @property string $nombre_capitulo
 *
 * The followings are the available model relations:
 * @property Seccion $idSeccion
 * @property Grupo[] $grupos
 */
class Capitulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'capitulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idvar_capitulo', 'required'),
			array('id_seccion', 'numerical', 'integerOnly'=>true),
			array('nombre_capitulo', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_capitulo, idvar_capitulo, id_seccion, nombre_capitulo', 'safe', 'on'=>'search'),
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
			'idSeccion' => array(self::BELONGS_TO, 'Seccion', 'id_seccion'),
			'grupos' => array(self::HAS_MANY, 'Grupo', 'id_capitulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_capitulo' => 'Id Capitulo',
			'idvar_capitulo' => 'Idvar Capitulo',
			'id_seccion' => 'Id Seccion',
			'nombre_capitulo' => 'Nombre Capitulo',
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

		$criteria->compare('id_capitulo',$this->id_capitulo);
		$criteria->compare('idvar_capitulo',$this->idvar_capitulo,true);
		$criteria->compare('id_seccion',$this->id_seccion);
		$criteria->compare('nombre_capitulo',$this->nombre_capitulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Capitulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
