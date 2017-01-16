<?php

/**
 * This is the model class for table "skup".
 *
 * The followings are the available columns in table 'skup':
 * @property integer $Id
 * @property string $Goods
 * @property string $Comment
 * @property integer $No1
 * @property integer $No2
 * @property integer $No3
 * @property integer $Skupforever
 */
class Skup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Goods, Comment', 'required'),
			array('No1, No2, No3, Skupforever', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Goods, Comment, No1, No2, No3, Skupforever', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Goods' => 'Goods',
			'Comment' => 'Comment',
			'No1' => 'No1',
			'No2' => 'No2',
			'No3' => 'No3',
			'Skupforever' => 'Skupforever',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Goods',$this->Goods,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('No1',$this->No1);
		$criteria->compare('No2',$this->No2);
		$criteria->compare('No3',$this->No3);
		$criteria->compare('Skupforever',$this->Skupforever);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
