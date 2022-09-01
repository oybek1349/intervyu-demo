<?php

namespace app\modules\intervyu\models;

use Yii;
use yii\base\Model;
use app\modules\intervyu\models\Nomzodlar;


class NomzodlarForm extends Model
{
    public  $name,
            $familyName,
            $address,
            $countryOfOrigin,
            $age,
            $emailAddress,
            $phoneNumber;
     /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'familyName', 'address', 'emailAddress', 'phoneNumber', 'age'], 'required'],
            [['name'], 'match', 'pattern' => '/^[A-Z]{1}+[a-z]+[a-z\']{1}+[a-z]+$/', 'message' => "Ismingizni bosh harf bilan boshlanishi zarur. Kiritishda [A-Za-z] lotin harflari va (') belgisidan foydalanishingiz mumkin."],
            [['familyName'], 'match', 'pattern' => '/^[A-Z]{1}+[a-z]+[a-z\']{1}+[a-z]+$/', 'message' => "Familiyangizni bosh harf bilan boshlanishi zarur. Kiritishda [A-Za-z] lotin harflari va (') belgisidan foydalanishingiz mumkin."],
            [['name', 'familyName'], 'string', 'min' => 5, 'max' => 50],
            [['address'], 'string', 'min' => 10, 'max' => 50],
            [['countryOfOrigin'], 'string', 'max' => 50],
            [['age'], 'integer', 'min' => 18 , 'max'=> 55, 'message' => "Yoshingiz 18-55 oralig'ida bo'lishi zarur"],
            [['emailAddress'], 'email', 'message' => "Email adresingizda xatolik"],
            [['emailAddress'], 'valEmail'],            
            [['phoneNumber'], 'match', 'pattern' => '/^998+[\d]{9}+$/', 'message' => "Telefon raqamingizni xato kiritdingiz. Raqamingizni ushbu (998XXxxxxxxx) ko'inishda kiriting"],
            [['phoneNumber'], 'valPhone'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
       return [
            'name' => "Ismingiz",
            'familyName' => "Familiyangiz",
            'address' => "Yashash joyingiz",
            'countryOfOrigin' => "Fuqorologingiz",
            'emailAddress' => "Email",
            'phoneNumber' => "Telefon raqamingiz",
            'age' => "Yoshingiz",
       ];   
    }
    /**
     * {@inheritdoc}
     */
    public function valEmail($attribute)
    {
         if ( Nomzodlar::findOne(['emailAddress' => $this->emailAddress]) )
         {
            $this->addError($attribute, "Ushbu email adress ro'yxatdan o'tgan");
         }
    }
    /**
     * {@inheritdoc}
     */
    public function valPhone($attribute)
    {
         if ( Nomzodlar::findOne(['phoneNumber' => '+' . $this->phoneNumber]) )
         {
            $this->addError($attribute, "Ushbu telefon raqam ro'yxatdan o'tgan");
         }
    }
    public function valForm()
    {
        if ( !$this->validate() ) {
            return null;
        }
          
        $nomzod = new Nomzodlar();
        $nomzod->name = $this->name;
        $nomzod->familyName = $this->familyName;
        $nomzod->address = $this->address;
        $nomzod->countryOfOrigin = $this->countryOfOrigin;
        $nomzod->emailAddress = $this->emailAddress;
        $nomzod->phoneNumber = '+' . $this->phoneNumber;
        $nomzod->age = $this->age;      
        
        return $nomzod->save();
    }
}
