<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User_Bibi".
 *
 * @property integer $id
 * @property integer $User_id
 * @property string $description
 * @property string $paper
 */
class UserBibi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User_Bibi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_id', 'description'], 'required'],
            [['User_id'], 'integer'],
            [['description'], 'string', 'max' => 1000],
            [['paper'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'User_id' => 'User ID',
            'description' => 'Description',
            'paper' => 'Paper',
        ];
    }

    public function getAllDisplayUser() {
        return UserBibi::find()->select(['id', 'User_id'])->asArray()->all();
    }
}
