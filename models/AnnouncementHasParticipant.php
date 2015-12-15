<?php

namespace app\models;

use Yii;
use app\models\User;

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

    public function registerAllUsersToAnnouncement($announcement_id) {
        $users = User::getAllUsersId();
        foreach($users as $user) {
            $model = new AnnouncementHasParticipant();
            $model->Participant_id = $user;
            $model->Accouncement_id = $announcement_id;
            $model->is_read = 0;
            $model->save();
        }

    }

    public function getUnreadAnnouncementByUserId($id) {
        $sql = 'SELECT id, title, datetime
                FROM 13027272d.Announcement, 13027272d.Announcement_has_Participant WHERE
                13027272d.Announcement_has_Participant.Accouncement_id = 13027272d.Announcement.id
                AND 13027272d.Announcement_has_Participant.Participant_id = '.$id.'
                AND Announcement_has_Participant.Participant_id <> Announcement.Administrator_id
                AND is_read = 0
                ORDER BY datetime ASC;';
        return AnnouncementHasParticipant::findBySql($sql)->asArray()->all();
    }

}
