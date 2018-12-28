<?php

/**
 * This is the model class for table "historico_oferente".
 *
 * The followings are the available columns in table 'historico_oferente':
 * @property integer $id_historico_oferente
 * @property integer $id_oferente
 * @property string $h_razon_social
 * @property string $h_direccion
 *
 * The followings are the available model relations:
 * @property Oferente $idOferente
 */
class HistoricoOferente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historico_oferente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('h_razon_social', 'required'),
			array('id_oferente', 'numerical', 'integerOnly'=>true),
			array('h_razon_social', 'length', 'max'=>100),
			array('h_direccion', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_historico_oferente, id_oferente, h_razon_social, h_direccion', 'safe', 'on'=>'search'),
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
			'idOferente' => array(self::BELONGS_TO, 'Oferente', 'id_oferente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_historico_oferente' => 'Id Historico Oferente',
			'id_oferente' => 'Id Oferente',
			'h_razon_social' => 'H Razon Social',
			'h_direccion' => 'H Direccion',
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

		$criteria->compare('id_historico_oferente',$this->id_historico_oferente);
		$criteria->compare('id_oferente',$this->id_oferente);
		$criteria->compare('h_razon_social',$this->h_razon_social,true);
		$criteria->compare('h_direccion',$this->h_direccion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HistoricoOferente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
