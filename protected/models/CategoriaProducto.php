<?php

/**
 * This is the model class for table "categoria_producto".
 *
 * The followings are the available columns in table 'categoria_producto':
 * @property integer $id_categoriaproducto
 * @property integer $id_subgrupoproducto
 * @property string $nombre_categoriaproducto
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property SubgrupoProducto $idSubgrupoproducto
 */
class CategoriaProducto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_categoriaproducto', 'required'),
			array('id_subgrupoproducto', 'numerical', 'integerOnly'=>true),
			array('nombre_categoriaproducto', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_categoriaproducto, id_subgrupoproducto, nombre_categoriaproducto', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'id_categoriaproducto'),
			'idSubgrupoproducto' => array(self::BELONGS_TO, 'SubgrupoProducto', 'id_subgrupoproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_categoriaproducto' => 'Id Categoriaproducto',
			'id_subgrupoproducto' => 'Id Subgrupoproducto',
			'nombre_categoriaproducto' => 'Nombre Categoriaproducto',
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

		$criteria->compare('id_categoriaproducto',$this->id_categoriaproducto);
		$criteria->compare('id_subgrupoproducto',$this->id_subgrupoproducto);
		$criteria->compare('nombre_categoriaproducto',$this->nombre_categoriaproducto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaProducto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
