<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Participant".
 *
 * @property integer $id
 * @property string $title
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
 *
 * @property GuestSpeaker $guestSpeaker
 * @property NormalPeople $normalPeople
 * @property User $id0
 * @property ParticipantHasActivity[] $participantHasActivities
 * @property ParticipantHasCoupon[] $participantHasCoupons
 * @property Coupon[] $coupons
 * @property Post[] $posts
 * @property SectionChair $sectionChair
 * @property SurveyHasParticipant[] $surveyHasParticipants
 * @property Survey[] $surveys
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'city', 'country', 'department', 'organization', 'mobile_number', 'rewardPoint', 'payment_status'], 'required'],
            [['id', 'mobile_number', 'fax_number', 'rewardPoint', 'payment_status'], 'integer'],
            [['title'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 45],
            [['city', 'country', 'department', 'organization'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuestSpeaker()
    {
        return $this->hasOne(GuestSpeaker::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNormalPeople()
    {
        return $this->hasOne(NormalPeople::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantHasActivities()
    {
        return $this->hasMany(ParticipantHasActivity::className(), ['Participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantHasCoupons()
    {
        return $this->hasMany(ParticipantHasCoupon::className(), ['Participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupons()
    {
        return $this->hasMany(Coupon::className(), ['id' => 'coupon_id'])->viaTable('Participant_has_coupon', ['Participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['Participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionChair()
    {
        return $this->hasOne(SectionChair::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyHasParticipants()
    {
        return $this->hasMany(SurveyHasParticipant::className(), ['Participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Survey::className(), ['id' => 'Survey_id'])->viaTable('Survey_has_Participant', ['Participant_id' => 'id']);
    }
}
