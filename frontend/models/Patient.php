<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property string $cid
 * @property string $hn
 * @property string $fullname
 * @property string $birthday
 * @property string $sex
 * @property string $bloodgrp
 * @property string $marrystatus
 * @property string $occupation
 * @property string $religion
 * @property string $nationality
 * @property string $educate
 * @property string $pttype
 * @property string $addrpart
 * @property string $road
 * @property string $addr_soi
 * @property string $moopart
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $hometel
 * @property string $fulladdress
 * @property string $person_disease
 * @property string $clinic
 * @property string $drugallergy
 * @property string $dm
 * @property string $dm_color
 * @property string $dm_text
 * @property string $ht
 * @property string $ht_color
 * @property string $ht_text
 * @property double $gfr
 * @property string $ckd
 * @property string $ckd_color
 * @property string $ckd_text
 * @property double $cvd
 * @property string $cvd_color
 * @property string $cvd_text
 * @property string $cvd_risk
 * @property string $informname
 * @property string $informtel
 * @property integer $height
 * @property double $weight
 * @property double $waist
 * @property double $bmi
 * @property string $bmi_color
 * @property string $bmi_text
 * @property integer $bps
 * @property integer $bpd
 * @property double $temp
 * @property integer $pulse
 * @property integer $rr
 * @property double $fbs
 * @property double $hba1c
 * @property string $fbs_date
 * @property string $hba1c_date
 * @property double $cholesterol
 * @property string $key_id
 * @property string $token
 * @property string $hosp_regis
 * @property string $private_doctor_name
 * @property string $volunteer
 * @property string $eye
 * @property string $kidney
 * @property string $foot
 * @property string $drink
 * @property string $smoke
 * @property string $active
 * @property string $last_update
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid'], 'required'],
            [['birthday', 'fbs_date', 'hba1c_date', 'last_update'], 'safe'],
            [['gfr', 'cvd', 'weight', 'waist', 'bmi', 'temp', 'fbs', 'hba1c', 'cholesterol'], 'number'],
            [['height', 'bps', 'bpd', 'pulse', 'rr'], 'integer'],
            [['cid', 'hn'], 'string', 'max' => 13],
            [['fullname', 'occupation', 'religion', 'educate', 'pttype', 'addr_soi', 'person_disease', 'clinic', 'drugallergy', 'private_doctor_name', 'volunteer'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 10],
            [['bloodgrp', 'marrystatus', 'nationality', 'hometel', 'informtel'], 'string', 'max' => 20],
            [['addrpart', 'road', 'dm_color', 'dm_text', 'ht_color', 'ht_text', 'ckd_color', 'ckd_text', 'cvd_color', 'cvd_text', 'informname', 'bmi_color', 'bmi_text', 'key_id'], 'string', 'max' => 50],
            [['moopart'], 'string', 'max' => 3],
            [['tmbpart', 'amppart', 'chwpart'], 'string', 'max' => 2],
            [['fulladdress'], 'string', 'max' => 200],
            [['dm', 'ht', 'ckd', 'cvd_risk', 'eye', 'kidney', 'foot', 'drink', 'smoke', 'active'], 'string', 'max' => 1],
            [['token'], 'string', 'max' => 1000],
            [['hosp_regis'], 'string', 'max' => 5],
            [['hn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'hn' => 'Hn',
            'fullname' => 'Fullname',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'bloodgrp' => 'Bloodgrp',
            'marrystatus' => 'Marrystatus',
            'occupation' => 'Occupation',
            'religion' => 'Religion',
            'nationality' => 'Nationality',
            'educate' => 'Educate',
            'pttype' => 'Pttype',
            'addrpart' => 'Addrpart',
            'road' => 'Road',
            'addr_soi' => 'Addr Soi',
            'moopart' => 'Moopart',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'hometel' => 'Hometel',
            'fulladdress' => 'Fulladdress',
            'person_disease' => 'Person Disease',
            'clinic' => 'Clinic',
            'drugallergy' => 'Drugallergy',
            'dm' => 'Dm',
            'dm_color' => 'Dm Color',
            'dm_text' => 'Dm Text',
            'ht' => 'Ht',
            'ht_color' => 'Ht Color',
            'ht_text' => 'Ht Text',
            'gfr' => 'Gfr',
            'ckd' => 'Ckd',
            'ckd_color' => 'Ckd Color',
            'ckd_text' => 'Ckd Text',
            'cvd' => 'Cvd',
            'cvd_color' => 'Cvd Color',
            'cvd_text' => 'Cvd Text',
            'cvd_risk' => 'Cvd Risk',
            'informname' => 'Informname',
            'informtel' => 'Informtel',
            'height' => 'Height',
            'weight' => 'Weight',
            'waist' => 'Waist',
            'bmi' => 'Bmi',
            'bmi_color' => 'Bmi Color',
            'bmi_text' => 'Bmi Text',
            'bps' => 'Bps',
            'bpd' => 'Bpd',
            'temp' => 'Temp',
            'pulse' => 'Pulse',
            'rr' => 'Rr',
            'fbs' => 'Fbs',
            'hba1c' => 'Hba1c',
            'fbs_date' => 'Fbs Date',
            'hba1c_date' => 'Hba1c Date',
            'cholesterol' => 'Cholesterol',
            'key_id' => 'Key ID',
            'token' => 'Token',
            'hosp_regis' => 'Hosp Regis',
            'private_doctor_name' => 'Private Doctor Name',
            'volunteer' => 'Volunteer',
            'eye' => 'Eye',
            'kidney' => 'Kidney',
            'foot' => 'Foot',
            'drink' => 'Drink',
            'smoke' => 'Smoke',
            'active' => 'Active',
            'last_update' => 'Last Update',
        ];
    }
}
