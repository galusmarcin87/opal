<?php

namespace app\components\mgcms;
use yii\validators\Validator;
class PeselValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {

        $peselChecker = new PeselChecker();

        $response = $peselChecker->verify($model->$attribute);
        if(!$response['has11Digits'] || !$response['isCheckSumOk'] || !$response['isBirthDateValid'] || !$response['fullAge']){
            $this->addError($model, $attribute, Yii::t('db','PESEL is wrong.'));
        }

    }

}
