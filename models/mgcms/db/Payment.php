<?php

namespace app\models\mgcms\db;

use Yii;
use app\components\mgcms\MgHelpers;
use yii\helpers\Html;

/**
 * This is the base model class for table "payment".
 *
 * @property integer $id
 * @property string $created_on
 * @property integer $user_id
 * @property double $amount
 * @property string $status
 * @property integer $rel_id
 * @property string $type
 * @property integer $rate
 *
 * @property \app\models\mgcms\db\User $user
 */
class Payment extends \app\models\mgcms\db\AbstractRecord
{

    const STATUS_NEW = 4;
    const STATUS_SUSPENDED = 0;
    const STATUS_AFTER_PAYMENT = 1;
    const STATUS_PAYMENT_CONFIRMED = 2;
    const STATUS_PAYMENT_REALISATION = 3;
    const STATUS_UNKNOWN = 5;
    const STATUSES = [
        self::STATUS_NEW => 'Nowy',
        self::STATUS_SUSPENDED => 'Zawieszono',
        self::STATUS_AFTER_PAYMENT => 'Deklaracja inwestycji',
        self::STATUS_PAYMENT_CONFIRMED => 'Potwierdzone',
        self::STATUS_PAYMENT_REALISATION => 'Realizacja zysku',
        self::STATUS_UNKNOWN => 'Nieznany',
    ];

    const TYPE_PRODUCT = 'Product';
    const TYPE_SERVICE = 'Service';
    const TYPES = [
        self::TYPE_PRODUCT => 'Produkt',
        self::TYPE_SERVICE => 'Serwis',
    ];


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'type'], 'safe'],
            [['user_id'], 'required'],
            [['user_id', 'status', 'rate', 'rel_id'], 'integer'],
            [['amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created_on' => Yii::t('app', 'Created On'),
            'project_id' => Yii::t('app', 'Project'),
            'user_id' => Yii::t('app', 'User'),
            'project' => Yii::t('app', 'Project'),
            'user' => Yii::t('app', 'User'),
            'amount' => Yii::t('db', 'Payment value'),
            'status' => Yii::t('app', 'Status'),
            'statusStr' => Yii::t('app', 'Status'),
            'percentage' => Yii::t('app', 'Percentage'),
            'is_preico' => Yii::t('app', 'Is Preico'),
            'user_token' => Yii::t('db', 'ELECTRONIC WALLET NUMBER OF WHICH I SHIP TO ETHEREUM'),
            'amountInDollars' => Yii::t('db', 'AMOUNT IN DOLLARS'),
            'ethereum_buy_date' => Yii::t('db', 'DATE OF ETHEREUM I WILL BUY'),
            'market' => Yii::t('db', 'NAME OF MARKET WHERE I WIIL BUY ETHEREUM'),
            'comments' => 'Komentarz',
            'statusToDisplay' => Yii::t('db', 'Payment status'),
            'benefitWithAmount' => Yii::t('db', 'Expected return with profit'),
            'type'=> Yii::t('app', 'Type'),
            'amount' => Yii::t('db', 'Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\mgcms\db\User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\PaymentQuery(get_called_class());
    }

    public function getStatusStr()
    {
        return array_key_exists($this->status, self::STATUSES) ? self::STATUSES[$this->status] : '';
    }

    public function getTypeStr()
    {
        return array_key_exists($this->type, self::TYPES) ? self::TYPES[$this->type] : '';
    }

    public function getRelLink(){
        $model = false;
        switch($this->type){
            case self::TYPE_PRODUCT:
                $model = Product::findOne($this->rel_id);
                break;
            case self::TYPE_SERVICE:
                $model = Service::findOne($this->rel_id);

        }
        if($model && isset($model->linkUrl)){

            return Html::a(Yii::t('db', $model->name), \yii\helpers\Url::to(['/backend/mgcms/'. strtolower($this->type) .'/view', 'id' => $model->id]));
        }
    }



}
