<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Announcement_has_Participant".
 *
 * @property integer $Accouncement_id
 * @property integer $Participant_id
 * @property integer $is_read
 */
class AnnouncementHasParticipant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Announcement_has_Participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Accouncement_id', 'Participant_id', 'is_read'], 'required'],
            [['Accouncement_id', 'Participant_id', 'is_read'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Accouncement_id' => 'Accouncement ID',
            'Participant_id' => 'Participant ID',
            'is_read' => 'Is Read',
        ];
    }
}
