<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property integer $id
 * @property string $Coupon_name
 * @property string $Coupon_description
 * @property string $expireDatetime
 * @property string $lastModifyDatetime
 * @property integer $requireScore
 * @property string $image
 *
 * @property ParticipantHasCoupon[] $participantHasCoupons
 * @property Participant[] $participants
 */
class Coupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Coupon_name', 'Coupon_description', 'expireDatetime', 'lastModifyDatetime', 'requireScore'], 'required'],
            [['expireDatetime', 'lastModifyDatetime'], 'safe'],
            [['requireScore'], 'integer'],
            [['Coupon_name'], 'string', 'max' => 100],
            [['Coupon_description'], 'string', 'max' => 1000],
            [['image'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Coupon_name' => 'Coupon Name',
            'Coupon_description' => 'Coupon Description',
            'expireDatetime' => 'Expire Datetime',
            'lastModifyDatetime' => 'Last Modify Datetime',
            'requireScore' => 'Require Score',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantHasCoupons()
    {
        return $this->hasMany(ParticipantHasCoupon::className(), ['coupon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::className(), ['id' => 'Participant_id'])->viaTable('participant_has_coupon', ['coupon_id' => 'id']);
    }
}
