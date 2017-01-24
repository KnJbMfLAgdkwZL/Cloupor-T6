<?php
class Users extends CActiveRecord
{
    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('Login, Password, Role', 'required'),
            array('Login', 'unique', 'message' => 'Login already exists.'),
            array('Role', 'numerical', 'integerOnly' => true),
            array('Login, Password, Comments, Requisites, Jabber, Wmid', 'length', 'max' => 255),
            array('Id, Login, Password, Role, Comments, Requisites, Jabber, Wmi', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'users_roles' => array(self::BELONGS_TO, 'UsersRoles', 'Role'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'Login' => 'Login',
            'Password' => 'Password',
            'Role' => 'Role',
            'Comments' => 'Comments',
            'Requisites' => 'Requisites',
            'Jabber' => 'Jabber',
            'Wmid' => 'Wmid',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('Id', $this->Id);
        $criteria->compare('Login', $this->Login, true);
        $criteria->compare('Password', $this->Password, true);
        $criteria->compare('Role', $this->Role);
        $criteria->compare('Comments', $this->Comments, true);
        $criteria->compare('Requisites', $this->Requisites, true);
        $criteria->compare('Jabber', $this->Jabber, true);
        $criteria->compare('Wmid', $this->Wmid, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getAssocList($Role)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("Role = :Role");
        $criteria->order = 'Id ASC';
        $criteria->params = array(':Role' => $Role);
        $models = $this->findAll($criteria);
        return CHtml::listData($models, 'Id', 'Login');
    }
}