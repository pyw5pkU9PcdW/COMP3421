<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $department
 * @property string $organization
 * @property integer $mobile_number
 * @property integer $fax_number
 * @property integer $rewardPoint
 * @property integer $payment_status
 * @property string $remark
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Administrator $administrator
 * @property Message[] $messages
 * @property Participant $participant
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'title', 'first_name', 'last_name', 'email', 'address', 'city', 'country', 'department', 'organization', 'mobile_number', 'rewardPoint', 'payment_status'], 'required'],
            [['mobile_number', 'fax_number', 'rewardPoint', 'payment_status'], 'integer'],
            [['username', 'first_name', 'last_name', 'email', 'authKey', 'accessToken'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 255],
            [['password'], 'required', 'on' => 'create'],
            ['email', 'email'],
            [['title'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 100],
            [['city', 'country', 'department'], 'string', 'max' => 50],
            [['organization', 'remark'], 'string', 'max' => 200],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'department' => 'Department',
            'organization' => 'Organization',
            'mobile_number' => 'Mobile Number',
            'fax_number' => 'Fax Number',
            'rewardPoint' => 'Reward Point',
            'payment_status' => 'Payment Status',
            'remark' => 'Remark',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrator::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['User_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'id']);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return password_verify($password, $this->password);
    }

    private function encryptedPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->password = $this->encryptedPassword($this->password);
            return true;
        } else {
            return false;
        }
    }

    public function getUserFullNameById($id) {
        $raw = User::findOne($id);
        return Title::getTitleById($raw['title']).' '.$raw['first_name'].' '.$raw['last_name'];
    }
}
