<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Participant_has_coupon".
 *
 * @property integer $Participant_id
 * @property integer $coupon_id
 * @property integer $is_used
 * @property integer $is_read
 *
 * @property Participant $participant
 * @property Coupon $coupon
 */
class ParticipantHasCoupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Participant_has_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Participant_id', 'coupon_id', 'is_used', 'is_read'], 'required'],
            [['Participant_id', 'coupon_id', 'is_used', 'is_read'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Participant_id' => 'Participant ID',
            'coupon_id' => 'Coupon ID',
            'is_used' => 'Is Used',
            'is_read' => 'Is Read',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'Participant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['id' => 'coupon_id']);
    }
}
