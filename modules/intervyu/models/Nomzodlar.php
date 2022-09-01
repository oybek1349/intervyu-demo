<?php

namespace app\modules\intervyu\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%nomzodlar}}".
 *
 * @property int $id
 * @property string $name
 * @property string $familyName
 * @property string $address
 * @property string|null $countryOfOrigin
 * @property string $emailAddress
 * @property string $phoneNumber
 * @property int $age
 * @property int|null $hired
 * @property int|null $status
 * @property string|null $note
 * @property string|null $dateTimeInterview
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Nomzodlar extends \yii\db\ActiveRecord
{
    const STS_YANGI = 1;
    const STS_INTERVYU_BELGILANGAN = 3;
    const STS_QABUL_QILINGAN = 5;
    const STS_QABUL_QILINMAGAN = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nomzodlar}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'familyName', 'address', 'emailAddress', 'phoneNumber', 'age'], 'required'],
            [['age', 'hired', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'familyName', 'address', 'countryOfOrigin', 'emailAddress'], 'string', 'max' => 50],
            [['name', 'familyName'], 'string', 'min' => 5],
            [['name'], 'match', 'pattern' => '/^[A-Z]{1}+[a-z]+[a-z\']{1}+[a-z]+$/', 'message' => "Ismingizni bosh harf bilan boshlanishi zarur. Kiritishda [A-Za-z] lotin harflari va (') belgisidan foydalanishingiz mumkin."],
            [['familyName'], 'match', 'pattern' => '/^[A-Z]{1}+[a-z]+[a-z\']{1}+[a-z]+$/', 'message' => "Familiyangizni bosh harf bilan boshlanishi zarur. Kiritishda [A-Za-z] lotin harflari va (') belgisidan foydalanishingiz mumkin."],
            [['address'], 'string', 'min' => 10],
            [['phoneNumber'], 'string', 'max' => 13],
            [['phoneNumber'], 'match', 'pattern' => '/^\+998+[\d]{9}+$/', 'message' => "+998XXxxxxxxx -tartibida kiriting"],
            [['emailAddress'], 'email'],
            [['note'], 'string', 'max' => 200],
            [['hired'], 'default', 'value' => false],
            [['dateTimeInterview'], 'datetime', 'format'=>'php:Y-m-d H:i:s', 'message' => "yyyy-mm-dd hh:mm -tartibida kiriting yoki bo'sh qoldiring" ],
            [['status'], 'in', 'range' => [self::STS_YANGI, self::STS_INTERVYU_BELGILANGAN, self::STS_QABUL_QILINGAN, self::STS_QABUL_QILINMAGAN]],
            [['status'], 'default', 'value' => self::STS_YANGI ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'familyName' => 'Family Name',
            'address' => 'Address',
            'countryOfOrigin' => 'Country Of Origin',
            'emailAddress' => 'Email Address',
            'phoneNumber' => 'Phone Number',
            'age' => 'Age',
            'hired' => 'Hired',
            'status' => 'Status',
            'note' => 'Note',
            'dateTimeInterview' => 'Date Time Interview',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }
}
