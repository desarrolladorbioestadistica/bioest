<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id_producto
 * @property integer $id_fabricante
 * @property integer $id_marca
 * @property integer $id_referencia
 * @property integer $id_importaciondian
 * @property integer $id_modelo
 * @property integer $id_tecnica
 * @property string $nombre_producto
 * @property string $uso_destino
 * @property string $serial_producto
 * @property string $vencimiento
 * @property string $expediente
 * @property string $cantidad
 * @property string $presentacion
 * @property string $registro_invima
 * @property string $descripcion_producto
 * @property string $pais_origen
 *
 * The followings are the available model relations:
 * @property Fabricante $idFabricante
 * @property ImportacionDian $idImportaciondian
 * @property Marca $idMarca
 * @property Modelo $idModelo
 * @property Referencia $idReferencia
 * @property TecnicaDiagnostico $idTecnica
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_importaciondian, nombre_producto', 'required'),
			array('id_fabricante, id_marca, id_referencia, id_importaciondian, id_modelo, id_tecnica', 'numerical', 'integerOnly'=>true),
			array('nombre_producto, serial_producto', 'length', 'max'=>100),
			array('expediente, registro_invima', 'length', 'max'=>50),
			array('cantidad, presentacion, pais_origen', 'length', 'max'=>20),
			array('uso_destino, vencimiento, descripcion_producto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto, id_fabricante, id_marca, id_referencia, id_importaciondian, id_modelo, id_tecnica, nombre_producto, uso_destino, serial_producto, vencimiento, expediente, cantidad, presentacion, registro_invima, descripcion_producto, pais_origen', 'safe', 'on'=>'search'),
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
			'idFabricante' => array(self::BELONGS_TO, 'Fabricante', 'id_fabricante'),
			'idImportaciondian' => array(self::BELONGS_TO, 'ImportacionDian', 'id_importaciondian'),
			'idMarca' => array(self::BELONGS_TO, 'Marca', 'id_marca'),
			'idModelo' => array(self::BELONGS_TO, 'Modelo', 'id_modelo'),
			'idReferencia' => array(self::BELONGS_TO, 'Referencia', 'id_referencia'),
			'idTecnica' => array(self::BELONGS_TO, 'TecnicaDiagnostico', 'id_tecnica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'Id Producto',
			'id_fabricante' => 'Id Fabricante',
			'id_marca' => 'Id Marca',
			'id_referencia' => 'Id Referencia',
			'id_importaciondian' => 'Id Importaciondian',
			'id_modelo' => 'Id Modelo',
			'id_tecnica' => 'Id Tecnica',
			'nombre_producto' => 'Nombre Producto',
			'uso_destino' => 'Uso Destino',
			'serial_producto' => 'Serial Producto',
			'vencimiento' => 'Vencimiento',
			'expediente' => 'Expediente',
			'cantidad' => 'Cantidad',
			'presentacion' => 'Presentacion',
			'registro_invima' => 'Registro Invima',
			'descripcion_producto' => 'Descripcion Producto',
			'pais_origen' => 'Pais Origen',
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

		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('id_fabricante',$this->id_fabricante);
		$criteria->compare('id_marca',$this->id_marca);
		$criteria->compare('id_referencia',$this->id_referencia);
		$criteria->compare('id_importaciondian',$this->id_importaciondian);
		$criteria->compare('id_modelo',$this->id_modelo);
		$criteria->compare('id_tecnica',$this->id_tecnica);
		$criteria->compare('nombre_producto',$this->nombre_producto,true);
		$criteria->compare('uso_destino',$this->uso_destino,true);
		$criteria->compare('serial_producto',$this->serial_producto,true);
		$criteria->compare('vencimiento',$this->vencimiento,true);
		$criteria->compare('expediente',$this->expediente,true);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('presentacion',$this->presentacion,true);
		$criteria->compare('registro_invima',$this->registro_invima,true);
		$criteria->compare('descripcion_producto',$this->descripcion_producto,true);
		$criteria->compare('pais_origen',$this->pais_origen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
