<?php

/**
 * This is the model class for table "servicio_prestador".
 *
 * The followings are the available columns in table 'servicio_prestador':
 * @property integer $id_servicio
 * @property integer $id_tiposervicio
 * @property integer $id_prestador
 * @property integer $id_grse
 * @property string $ese
 * @property string $nivel
 * @property string $caracter
 * @property string $habilitado
 * @property string $ambulatorio
 * @property string $hospitalario
 * @property string $unidad_movil
 * @property string $domiciliario
 * @property string $otras_extramural
 * @property string $centro_referencia
 * @property string $institucion_remisora
 * @property string $complejidad_baja
 * @property string $complejidad_media
 * @property string $complejidad_alta
 * @property string $fecha_apertura
 * @property string $fecha_cierre
 * @property string $numero_distintivo
 * @property string $numero_sede_principal
 * @property string $fecha_corte_resp
 *
 * The followings are the available model relations:
 * @property Grse $idGrse
 * @property Prestador $idPrestador
 * @property TipoServicio $idTiposervicio
 */
class ServicioPrestador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio_prestador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tiposervicio, id_prestador, id_grse', 'numerical', 'integerOnly'=>true),
			array('ese', 'length', 'max'=>10),
			array('nivel, caracter, fecha_corte_resp', 'length', 'max'=>50),
			array('habilitado, ambulatorio, hospitalario, unidad_movil, domiciliario, otras_extramural, centro_referencia, institucion_remisora, complejidad_baja, complejidad_media, complejidad_alta', 'length', 'max'=>5),
			array('numero_distintivo', 'length', 'max'=>30),
			array('fecha_apertura, fecha_cierre, numero_sede_principal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_servicio, id_tiposervicio, id_prestador, id_grse, ese, nivel, caracter, habilitado, ambulatorio, hospitalario, unidad_movil, domiciliario, otras_extramural, centro_referencia, institucion_remisora, complejidad_baja, complejidad_media, complejidad_alta, fecha_apertura, fecha_cierre, numero_distintivo, numero_sede_principal, fecha_corte_resp', 'safe', 'on'=>'search'),
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
			'idGrse' => array(self::BELONGS_TO, 'Grse', 'id_grse'),
			'idPrestador' => array(self::BELONGS_TO, 'Prestador', 'id_prestador'),
			'idTiposervicio' => array(self::BELONGS_TO, 'TipoServicio', 'id_tiposervicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio' => 'Id Servicio',
			'id_tiposervicio' => 'Id Tiposervicio',
			'id_prestador' => 'Id Prestador',
			'id_grse' => 'Id Grse',
			'ese' => 'Ese',
			'nivel' => 'Nivel',
			'caracter' => 'Caracter',
			'habilitado' => 'Habilitado',
			'ambulatorio' => 'Ambulatorio',
			'hospitalario' => 'Hospitalario',
			'unidad_movil' => 'Unidad Movil',
			'domiciliario' => 'Domiciliario',
			'otras_extramural' => 'Otras Extramural',
			'centro_referencia' => 'Centro Referencia',
			'institucion_remisora' => 'Institucion Remisora',
			'complejidad_baja' => 'Complejidad Baja',
			'complejidad_media' => 'Complejidad Media',
			'complejidad_alta' => 'Complejidad Alta',
			'fecha_apertura' => 'Fecha Apertura',
			'fecha_cierre' => 'Fecha Cierre',
			'numero_distintivo' => 'Numero Distintivo',
			'numero_sede_principal' => 'Numero Sede Principal',
			'fecha_corte_resp' => 'Fecha Corte Resp',
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

		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('id_tiposervicio',$this->id_tiposervicio);
		$criteria->compare('id_prestador',$this->id_prestador);
		$criteria->compare('id_grse',$this->id_grse);
		$criteria->compare('ese',$this->ese,true);
		$criteria->compare('nivel',$this->nivel,true);
		$criteria->compare('caracter',$this->caracter,true);
		$criteria->compare('habilitado',$this->habilitado,true);
		$criteria->compare('ambulatorio',$this->ambulatorio,true);
		$criteria->compare('hospitalario',$this->hospitalario,true);
		$criteria->compare('unidad_movil',$this->unidad_movil,true);
		$criteria->compare('domiciliario',$this->domiciliario,true);
		$criteria->compare('otras_extramural',$this->otras_extramural,true);
		$criteria->compare('centro_referencia',$this->centro_referencia,true);
		$criteria->compare('institucion_remisora',$this->institucion_remisora,true);
		$criteria->compare('complejidad_baja',$this->complejidad_baja,true);
		$criteria->compare('complejidad_media',$this->complejidad_media,true);
		$criteria->compare('complejidad_alta',$this->complejidad_alta,true);
		$criteria->compare('fecha_apertura',$this->fecha_apertura,true);
		$criteria->compare('fecha_cierre',$this->fecha_cierre,true);
		$criteria->compare('numero_distintivo',$this->numero_distintivo,true);
		$criteria->compare('numero_sede_principal',$this->numero_sede_principal,true);
		$criteria->compare('fecha_corte_resp',$this->fecha_corte_resp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicioPrestador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
