<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $patient_cid
 * @property string $chat_text
 * @property string $doctor_or_patient
 * @property string $hospcode
 * @property string $send_date
 * @property string $read
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['send_date', 'default', 'value' => date("Y-m-d H:i:s")],
             //['send_date', 'in', 'value' => date("Y-m-d H:i:s")],
            [['doctor_or_patient'], 'string'],
            [['send_date'], 'safe'],
            [['patient_cid'], 'string', 'max' => 13],
            [['chat_text'], 'string', 'max' => 1000],
            [['hospcode'], 'string', 'max' => 5],
            [['read'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_cid' => 'Patient Cid',
            'chat_text' => 'Chat Text',
            'doctor_or_patient' => 'Doctor Or Patient',
            'hospcode' => 'Hospcode',
            'send_date' => 'Send Date',
            'read' => 'Read',
        ];
    }
}
