<?php

/**
 * This is the model class for table "procedimiento_prestador".
 *
 * The followings are the available columns in table 'procedimiento_prestador':
 * @property integer $id_prestador
 * @property integer $id_procedimiento
 * @property integer $id_quinquenio
 * @property integer $id_tipousuario
 * @property integer $mes
 * @property string $anio
 * @property integer $id_grupopoblacional
 * @property string $numero_atenciones
 * @property string $numero_personas_atendidas
 * @property string $costo_procedimiento
 *
 * The followings are the available model relations:
 * @property Prestador $idPrestador
 * @property Procedimiento $idProcedimiento
 * @property Quinquenio $idQuinquenio
 * @property TipoUsuario $idTipousuario
 * @property Mes $mes0
 * @property GrupoPoblacional $idGrupopoblacional
 */
class ProcedimientoPrestador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'procedimiento_prestador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_prestador, id_procedimiento, id_quinquenio, id_tipousuario, mes, anio, id_grupopoblacional', 'required'),
			array('id_prestador, id_procedimiento, id_quinquenio, id_tipousuario, mes, id_grupopoblacional', 'numerical', 'integerOnly'=>true),
			array('anio', 'length', 'max'=>4),
			array('numero_atenciones, numero_personas_atendidas, costo_procedimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_prestador, id_procedimiento, id_quinquenio, id_tipousuario, mes, anio, id_grupopoblacional, numero_atenciones, numero_personas_atendidas, costo_procedimiento', 'safe', 'on'=>'search'),
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
			'idPrestador' => array(self::BELONGS_TO, 'Prestador', 'id_prestador'),
			'idProcedimiento' => array(self::BELONGS_TO, 'Procedimiento', 'id_procedimiento'),
			'idQuinquenio' => array(self::BELONGS_TO, 'Quinquenio', 'id_quinquenio'),
			'idTipousuario' => array(self::BELONGS_TO, 'TipoUsuario', 'id_tipousuario'),
			'mes0' => array(self::BELONGS_TO, 'Mes', 'mes'),
			'idGrupopoblacional' => array(self::BELONGS_TO, 'GrupoPoblacional', 'id_grupopoblacional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_prestador' => 'Id Prestador',
			'id_procedimiento' => 'Id Procedimiento',
			'id_quinquenio' => 'Id Quinquenio',
			'id_tipousuario' => 'Id Tipousuario',
			'mes' => 'Mes',
			'anio' => 'Anio',
			'id_grupopoblacional' => 'Id Grupopoblacional',
			'numero_atenciones' => 'Numero Atenciones',
			'numero_personas_atendidas' => 'Numero Personas Atendidas',
			'costo_procedimiento' => 'Costo Procedimiento',
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

		$criteria->compare('id_prestador',$this->id_prestador);
		$criteria->compare('id_procedimiento',$this->id_procedimiento);
		$criteria->compare('id_quinquenio',$this->id_quinquenio);
		$criteria->compare('id_tipousuario',$this->id_tipousuario);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('anio',$this->anio,true);
		$criteria->compare('id_grupopoblacional',$this->id_grupopoblacional);
		$criteria->compare('numero_atenciones',$this->numero_atenciones,true);
		$criteria->compare('numero_personas_atendidas',$this->numero_personas_atendidas,true);
		$criteria->compare('costo_procedimiento',$this->costo_procedimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProcedimientoPrestador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
