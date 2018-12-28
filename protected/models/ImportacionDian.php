<?php

/**
 * This is the model class for table "importacion_dian".
 *
 * The followings are the available columns in table 'importacion_dian':
 * @property integer $id_importaciondian
 * @property integer $id_oferente
 * @property string $anio_c1
 * @property string $numerod_de_formulario_c4
 * @property string $c24
 * @property integer $c25
 * @property string $c26
 * @property string $c29
 * @property string $c30
 * @property integer $c31
 * @property integer $c33
 * @property string $c34
 * @property integer $c35
 * @property integer $c36
 * @property integer $c37
 * @property string $c38
 * @property string $c39
 * @property string $c40
 * @property integer $c41
 * @property string $c43
 * @property string $c44
 * @property string $c45
 * @property string $c46
 * @property string $c47
 * @property string $c48
 * @property string $c49
 * @property string $c50
 * @property string $c51
 * @property string $c52
 * @property string $c53
 * @property integer $c54
 * @property string $c55
 * @property integer $c56
 * @property string $c57
 * @property string $c58
 * @property string $c59
 * @property string $c60
 * @property string $c61
 * @property string $c62
 * @property integer $c63
 * @property string $c64
 * @property integer $c65
 * @property string $c66
 * @property integer $c67
 * @property integer $c68
 * @property integer $c69
 * @property string $c70
 * @property string $c71
 * @property string $c72
 * @property string $c73
 * @property integer $c74
 * @property integer $c75
 * @property string $c76
 * @property string $c77
 * @property string $c78
 * @property string $c79
 * @property string $c80
 * @property string $c81
 * @property string $c82
 * @property string $c83
 * @property string $c84
 * @property string $c85
 * @property string $c86
 * @property integer $c87
 * @property string $c88
 * @property string $c89
 * @property integer $c90
 * @property string $c91
 * @property string $c92
 * @property integer $c93
 * @property integer $c94
 * @property integer $c95
 * @property string $c96
 * @property string $c97
 * @property integer $c98
 * @property integer $c99
 * @property integer $c100
 * @property string $c101
 * @property integer $c102
 * @property integer $c103
 * @property integer $c104
 * @property integer $c105
 * @property string $c106
 * @property string $c107
 * @property integer $c108
 * @property string $c109
 * @property string $c110
 * @property string $c111
 * @property string $c112
 * @property integer $c113
 * @property integer $c114
 * @property integer $c115
 * @property string $c116
 * @property string $c117
 * @property integer $c118
 * @property string $c119
 * @property string $c120
 * @property string $c121
 * @property string $c122
 * @property string $c123
 * @property string $c124
 * @property string $c125
 * @property string $c127
 * @property string $c128
 * @property string $c129
 * @property string $c131
 * @property string $c132
 * @property string $c133
 * @property string $c134
 * @property string $c135
 * @property string $c980
 * @property string $c997
 * @property string $c996
 * @property string $c32
 * @property string $c42
 * @property string $c126
 * @property string $mes_dian
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property Oferente $idOferente
 */
class ImportacionDian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'importacion_dian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('anio_c1, numerod_de_formulario_c4', 'required'),
			array('id_oferente, c25, c31, c33, c35, c36, c37, c41, c54, c56, c63, c65, c67, c68, c69, c74, c75, c87, c90, c93, c94, c95, c98, c99, c100, c102, c103, c104, c105, c108, c113, c114, c115, c118', 'numerical', 'integerOnly'=>true),
			array('c26, c30, c47, c50, c51, c57, c86, c32', 'length', 'max'=>50),
			array('c29, c44, c45, c52, c133, c135, c997', 'length', 'max'=>20),
			array('c46, c49', 'length', 'max'=>100),
			array('c48, c53, c55, c66, c70, c73', 'length', 'max'=>3),
			array('c62, c76, c85', 'length', 'max'=>5),
			array('c88', 'length', 'max'=>4),
			array('c89', 'length', 'max'=>10),
			array('c131', 'length', 'max'=>500),
			array('mes_dian', 'length', 'max'=>15),
			array('c24, c34, c38, c39, c40, c43, c58, c59, c60, c61, c64, c71, c72, c77, c78, c79, c80, c81, c82, c83, c84, c91, c92, c96, c97, c101, c106, c107, c109, c110, c111, c112, c116, c117, c119, c120, c121, c122, c123, c124, c125, c127, c128, c129, c132, c134, c980, c996, c42, c126', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_importaciondian, id_oferente, anio_c1, numerod_de_formulario_c4, c24, c25, c26, c29, c30, c31, c33, c34, c35, c36, c37, c38, c39, c40, c41, c43, c44, c45, c46, c47, c48, c49, c50, c51, c52, c53, c54, c55, c56, c57, c58, c59, c60, c61, c62, c63, c64, c65, c66, c67, c68, c69, c70, c71, c72, c73, c74, c75, c76, c77, c78, c79, c80, c81, c82, c83, c84, c85, c86, c87, c88, c89, c90, c91, c92, c93, c94, c95, c96, c97, c98, c99, c100, c101, c102, c103, c104, c105, c106, c107, c108, c109, c110, c111, c112, c113, c114, c115, c116, c117, c118, c119, c120, c121, c122, c123, c124, c125, c127, c128, c129, c131, c132, c133, c134, c135, c980, c997, c996, c32, c42, c126, mes_dian', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'id_importaciondian'),
			'idOferente' => array(self::BELONGS_TO, 'Oferente', 'id_oferente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_importaciondian' => 'Id Importaciondian',
			'id_oferente' => 'Id Oferente',
			'anio_c1' => 'Anio C1',
			'numerod_de_formulario_c4' => 'Numerod De Formulario C4',
			'c24' => 'C24',
			'c25' => 'C25',
			'c26' => 'C26',
			'c29' => 'C29',
			'c30' => 'C30',
			'c31' => 'C31',
			'c33' => 'C33',
			'c34' => 'C34',
			'c35' => 'C35',
			'c36' => 'C36',
			'c37' => 'C37',
			'c38' => 'C38',
			'c39' => 'C39',
			'c40' => 'C40',
			'c41' => 'C41',
			'c43' => 'C43',
			'c44' => 'C44',
			'c45' => 'C45',
			'c46' => 'C46',
			'c47' => 'C47',
			'c48' => 'C48',
			'c49' => 'C49',
			'c50' => 'C50',
			'c51' => 'C51',
			'c52' => 'C52',
			'c53' => 'C53',
			'c54' => 'C54',
			'c55' => 'C55',
			'c56' => 'C56',
			'c57' => 'C57',
			'c58' => 'C58',
			'c59' => 'C59',
			'c60' => 'C60',
			'c61' => 'C61',
			'c62' => 'C62',
			'c63' => 'C63',
			'c64' => 'C64',
			'c65' => 'C65',
			'c66' => 'C66',
			'c67' => 'C67',
			'c68' => 'C68',
			'c69' => 'C69',
			'c70' => 'C70',
			'c71' => 'C71',
			'c72' => 'C72',
			'c73' => 'C73',
			'c74' => 'C74',
			'c75' => 'C75',
			'c76' => 'C76',
			'c77' => 'C77',
			'c78' => 'C78',
			'c79' => 'C79',
			'c80' => 'C80',
			'c81' => 'C81',
			'c82' => 'C82',
			'c83' => 'C83',
			'c84' => 'C84',
			'c85' => 'C85',
			'c86' => 'C86',
			'c87' => 'C87',
			'c88' => 'C88',
			'c89' => 'C89',
			'c90' => 'C90',
			'c91' => 'C91',
			'c92' => 'C92',
			'c93' => 'C93',
			'c94' => 'C94',
			'c95' => 'C95',
			'c96' => 'C96',
			'c97' => 'C97',
			'c98' => 'C98',
			'c99' => 'C99',
			'c100' => 'C100',
			'c101' => 'C101',
			'c102' => 'C102',
			'c103' => 'C103',
			'c104' => 'C104',
			'c105' => 'C105',
			'c106' => 'C106',
			'c107' => 'C107',
			'c108' => 'C108',
			'c109' => 'C109',
			'c110' => 'C110',
			'c111' => 'C111',
			'c112' => 'C112',
			'c113' => 'C113',
			'c114' => 'C114',
			'c115' => 'C115',
			'c116' => 'C116',
			'c117' => 'C117',
			'c118' => 'C118',
			'c119' => 'C119',
			'c120' => 'C120',
			'c121' => 'C121',
			'c122' => 'C122',
			'c123' => 'C123',
			'c124' => 'C124',
			'c125' => 'C125',
			'c127' => 'C127',
			'c128' => 'C128',
			'c129' => 'C129',
			'c131' => 'C131',
			'c132' => 'C132',
			'c133' => 'C133',
			'c134' => 'C134',
			'c135' => 'C135',
			'c980' => 'C980',
			'c997' => 'C997',
			'c996' => 'C996',
			'c32' => 'C32',
			'c42' => 'C42',
			'c126' => 'C126',
			'mes_dian' => 'Mes Dian',
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

		$criteria->compare('id_importaciondian',$this->id_importaciondian);
		$criteria->compare('id_oferente',$this->id_oferente);
		$criteria->compare('anio_c1',$this->anio_c1,true);
		$criteria->compare('numerod_de_formulario_c4',$this->numerod_de_formulario_c4,true);
		$criteria->compare('c24',$this->c24,true);
		$criteria->compare('c25',$this->c25);
		$criteria->compare('c26',$this->c26,true);
		$criteria->compare('c29',$this->c29,true);
		$criteria->compare('c30',$this->c30,true);
		$criteria->compare('c31',$this->c31);
		$criteria->compare('c33',$this->c33);
		$criteria->compare('c34',$this->c34,true);
		$criteria->compare('c35',$this->c35);
		$criteria->compare('c36',$this->c36);
		$criteria->compare('c37',$this->c37);
		$criteria->compare('c38',$this->c38,true);
		$criteria->compare('c39',$this->c39,true);
		$criteria->compare('c40',$this->c40,true);
		$criteria->compare('c41',$this->c41);
		$criteria->compare('c43',$this->c43,true);
		$criteria->compare('c44',$this->c44,true);
		$criteria->compare('c45',$this->c45,true);
		$criteria->compare('c46',$this->c46,true);
		$criteria->compare('c47',$this->c47,true);
		$criteria->compare('c48',$this->c48,true);
		$criteria->compare('c49',$this->c49,true);
		$criteria->compare('c50',$this->c50,true);
		$criteria->compare('c51',$this->c51,true);
		$criteria->compare('c52',$this->c52,true);
		$criteria->compare('c53',$this->c53,true);
		$criteria->compare('c54',$this->c54);
		$criteria->compare('c55',$this->c55,true);
		$criteria->compare('c56',$this->c56);
		$criteria->compare('c57',$this->c57,true);
		$criteria->compare('c58',$this->c58,true);
		$criteria->compare('c59',$this->c59,true);
		$criteria->compare('c60',$this->c60,true);
		$criteria->compare('c61',$this->c61,true);
		$criteria->compare('c62',$this->c62,true);
		$criteria->compare('c63',$this->c63);
		$criteria->compare('c64',$this->c64,true);
		$criteria->compare('c65',$this->c65);
		$criteria->compare('c66',$this->c66,true);
		$criteria->compare('c67',$this->c67);
		$criteria->compare('c68',$this->c68);
		$criteria->compare('c69',$this->c69);
		$criteria->compare('c70',$this->c70,true);
		$criteria->compare('c71',$this->c71,true);
		$criteria->compare('c72',$this->c72,true);
		$criteria->compare('c73',$this->c73,true);
		$criteria->compare('c74',$this->c74);
		$criteria->compare('c75',$this->c75);
		$criteria->compare('c76',$this->c76,true);
		$criteria->compare('c77',$this->c77,true);
		$criteria->compare('c78',$this->c78,true);
		$criteria->compare('c79',$this->c79,true);
		$criteria->compare('c80',$this->c80,true);
		$criteria->compare('c81',$this->c81,true);
		$criteria->compare('c82',$this->c82,true);
		$criteria->compare('c83',$this->c83,true);
		$criteria->compare('c84',$this->c84,true);
		$criteria->compare('c85',$this->c85,true);
		$criteria->compare('c86',$this->c86,true);
		$criteria->compare('c87',$this->c87);
		$criteria->compare('c88',$this->c88,true);
		$criteria->compare('c89',$this->c89,true);
		$criteria->compare('c90',$this->c90);
		$criteria->compare('c91',$this->c91,true);
		$criteria->compare('c92',$this->c92,true);
		$criteria->compare('c93',$this->c93);
		$criteria->compare('c94',$this->c94);
		$criteria->compare('c95',$this->c95);
		$criteria->compare('c96',$this->c96,true);
		$criteria->compare('c97',$this->c97,true);
		$criteria->compare('c98',$this->c98);
		$criteria->compare('c99',$this->c99);
		$criteria->compare('c100',$this->c100);
		$criteria->compare('c101',$this->c101,true);
		$criteria->compare('c102',$this->c102);
		$criteria->compare('c103',$this->c103);
		$criteria->compare('c104',$this->c104);
		$criteria->compare('c105',$this->c105);
		$criteria->compare('c106',$this->c106,true);
		$criteria->compare('c107',$this->c107,true);
		$criteria->compare('c108',$this->c108);
		$criteria->compare('c109',$this->c109,true);
		$criteria->compare('c110',$this->c110,true);
		$criteria->compare('c111',$this->c111,true);
		$criteria->compare('c112',$this->c112,true);
		$criteria->compare('c113',$this->c113);
		$criteria->compare('c114',$this->c114);
		$criteria->compare('c115',$this->c115);
		$criteria->compare('c116',$this->c116,true);
		$criteria->compare('c117',$this->c117,true);
		$criteria->compare('c118',$this->c118);
		$criteria->compare('c119',$this->c119,true);
		$criteria->compare('c120',$this->c120,true);
		$criteria->compare('c121',$this->c121,true);
		$criteria->compare('c122',$this->c122,true);
		$criteria->compare('c123',$this->c123,true);
		$criteria->compare('c124',$this->c124,true);
		$criteria->compare('c125',$this->c125,true);
		$criteria->compare('c127',$this->c127,true);
		$criteria->compare('c128',$this->c128,true);
		$criteria->compare('c129',$this->c129,true);
		$criteria->compare('c131',$this->c131,true);
		$criteria->compare('c132',$this->c132,true);
		$criteria->compare('c133',$this->c133,true);
		$criteria->compare('c134',$this->c134,true);
		$criteria->compare('c135',$this->c135,true);
		$criteria->compare('c980',$this->c980,true);
		$criteria->compare('c997',$this->c997,true);
		$criteria->compare('c996',$this->c996,true);
		$criteria->compare('c32',$this->c32,true);
		$criteria->compare('c42',$this->c42,true);
		$criteria->compare('c126',$this->c126,true);
		$criteria->compare('mes_dian',$this->mes_dian,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImportacionDian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
