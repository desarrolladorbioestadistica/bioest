<?php

/**
 * This is the model class for table "tipo_implemento".
 *
 * The followings are the available columns in table 'tipo_implemento':
 * @property integer $id_tipoimplemento
 * @property string $tipo_implemento
 *
 * The followings are the available model relations:
 * @property CapacidadInstalada[] $capacidadInstaladas
 */
class TipoImplemento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_implemento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_implemento', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipoimplemento, tipo_implemento', 'safe', 'on'=>'search'),
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
			'capacidadInstaladas' => array(self::HAS_MANY, 'CapacidadInstalada', 'id_tipoimplemento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipoimplemento' => 'Id Tipoimplemento',
			'tipo_implemento' => 'Tipo Implemento',
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

		$criteria->compare('id_tipoimplemento',$this->id_tipoimplemento);
		$criteria->compare('tipo_implemento',$this->tipo_implemento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoImplemento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
