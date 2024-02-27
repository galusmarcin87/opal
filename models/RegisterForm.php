<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\User;
use kartik\password\StrengthValidator;

class RegisterForm extends Model
{

    public $username;
    public $password;
    public $passwordRepeat;
    public $acceptTerms;
    public $acceptTerms2;
    public $acceptTerms3;
    public $acceptTerms4;
    public $acceptTerms5;
    public $acceptTerms6;
    public $first_name;
    public $last_name;
    public $phone;
    public $agentCode;
    public $isCompany;
    public $birthDate;
    public $street;
    public $house_no;
    public $flat_no;
    public $postcode;
    public $city;
    public $voivodeship;
	public $country;
    public $pesel;
    public $id_document_no;
	
	public $company_name;
	public $company_street;
	public $company_house_no;
	public $company_flat_no;
	public $company_postcode;
	public $company_city;
	public $company_country;
    public $company_nip;
    public $company_regon;
	public $company_krs;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'passwordRepeat', 'first_name', 'last_name'], 'required'],
//            [['password'], StrengthValidator::className(),
//                'min' => 8,
//                'digit' => 1,
//                'upper' => 1,
//                'lower' => 1,
//                'special' => 0,
//                'userAttribute' => 'username'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('db', "Passwords don't match")],
            [['acceptTerms', 'acceptTerms2'], 'required', 'requiredValue' => 1, 'message' => Yii::t('db', 'This field is required')],
            ['username', 'email'],
            [['street', 'flat_no', 'house_no', 'postcode', 'city', 'voivodeship', 'country', 'pesel', 'id_document_no', 'birthDate', 'phone', 'acceptTerms5', 'acceptTerms6', 'agentCode', 'isCompany', 'company_name', 'company_street', 'company_house_no', 'company_flat_no', 'company_postcode', 'company_city','company_country', 'company_nip', 'company_regon', 'company_krs'], 'safe'],
//        [['password'], StrengthValidator::className(), 'min' => 8, 'digit' => 1, 'special' => 1, 'upper' => 1, 'lower' => 1, 'userAttribute' => 'username'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('db', 'E-mail address'),
            'password' => Yii::t('db', 'Password'),
            'first_name' => Yii::t('db', 'First name'),
            'last_name' => Yii::t('db', 'Surname'),
            'phone' => Yii::t('db', 'Phone'),
            'passwordRepeat' => Yii::t('db', 'Repeat password'),
            'agentCode' => Yii::t('db', 'Agent code (if you have)'),
            'isCompany' => Yii::t('db', 'Is company'),
            'acceptTerms' => MgHelpers::getSettingTranslated('register_terms_label1', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'acceptTerms2' => MgHelpers::getSettingTranslated('register_terms_label2', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'acceptTerms3' => MgHelpers::getSettingTranslated('register_terms_label3', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'acceptTerms4' => MgHelpers::getSettingTranslated('register_terms_label4', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'acceptTerms5' => MgHelpers::getSettingTranslated('register_terms_label5', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'acceptTerms6' => MgHelpers::getSettingTranslated('register_terms_label6', 'Akceptuje <a href="#">regulamin</a> serwisu i wyrażamzgode...'),
            'birthDate' => Yii::t('db', 'Birthdate'),
            'street' => Yii::t('db', 'Street'),
            'flat_no' => Yii::t('db', 'Flat number'),
            'house_no' => Yii::t('db', 'House number'),
            'postcode' => Yii::t('db', 'Postal code'),
            'city' => Yii::t('db', 'City'),
            'voivodeship' => Yii::t('db', 'Voivodeship'),
			'country' => Yii::t('db', 'Country'),
            'pesel' => Yii::t('db', 'PESEL'),
            'id_document_no' => Yii::t('db', 'ID number'),
			'company_name' => Yii::t('db', 'company name'),
			'company_street' => Yii::t('db', 'company street'),
			'company_house_no' => Yii::t('db', 'company house no'),
			'company_flat_no' => Yii::t('db', 'company flat no'),
			'company_postcode' => Yii::t('db', 'company postcode'),
			'company_city' => Yii::t('db', 'company city'),
			'company_country' => Yii::t('db', 'company country'),
			'company_nip' => Yii::t('db', 'company nip'),
			'company_regon' => Yii::t('db', 'company regon'),
			'company_krs' => Yii::t('db', 'company krs'),
        ];
    }

    public function register()
    {


        if ($this->validate()) {
            $user = new mgcms\db\User;
            $user->username = $this->username;
            $user->password = $this->password;
            $user->role = User::ROLE_INVESTOR_NOT_EXPERIENCED;
            $user->status = User::STATUS_INACTIVE;
            $user->language = Yii::$app->language;
            $user->first_name = $this->first_name;
            $user->last_name = $this->surname;
            $user->phone = $this->phone;
            $user->acceptTerms5 = (int)$this->acceptTerms5;
            $user->acceptTerms6 = (int)$this->acceptTerms6;
            $user->agent_code = $this->agentCode;

            $user->birthdate = $this->birthDate;
            $user->street = $this->street;
            $user->flat_no = $this->flat_no;
            $user->house_no = $this->house_no;
            $user->postcode = $this->postcode;
            $user->city = $this->city;
            $user->voivodeship = $this->voivodeship;
			$user->country = $this->country;
            $user->pesel = $this->pesel;
            $user->id_document_no = $this->id_document_no;
            $user->is_company = $this->isCompany;
	
            $user->company_name = $this->company_name;
            $user->company_street = $this->company_street;
			$user->company_house_no = $this->company_house_no;			
            $user->company_flat_no = $this->company_flat_no;
            $user->company_postcode = $this->company_postcode;
			$user->company_city = $this->company_city;
			$user->company_country = $this->company_country;
            $user->company_nip = $this->company_nip;
            $user->company_regon = $this->company_regon;
			$user->company_krs = $this->company_krs;

            $saved = $user->save();
            if (!$saved) {
                MgHelpers::setFlashError(Yii::t('db', 'Error during registration:') . MgHelpers::getErrorsString($user->getErrors()));
                return false;
            }

            /* @var $mailer \yii\swiftmailer\Mailer */
            $mailer = Yii::$app->mailer->compose('activation', [
                'model' => $user
            ])
                ->setTo([$user->username])
                ->setFrom([MgHelpers::getSetting('email from') => MgHelpers::getSetting('email from name')])
                ->setSubject(MgHelpers::getSettingTranslated('register_activation_email_subject', 'Activation'));
            $sent = $mailer->send();

            if (!$sent) {
                MgHelpers::setFlashError(Yii::t('db', 'Error during sending activation email'));
            } else {
                MgHelpers::setFlashSuccess(Yii::t('db', 'Account successfully created, check your email for activation link'));
            }

            return true;
        }
        return false;
    }
}
