<?

use app\models\mgcms\db\Project;
use yii\web\View;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Project */

if(!$model->money_full){
    return false;
}
?>

<div class="campaign-progress">
    <div class="row">
        <div class="col-6">
            <p class="label">Zebrane (50%):</p>
            <p class="amount amount--current">167 tys. PLN</p>
        </div>
        <div class="col-6 text-end">
            <p class="label">Cel:</p>
            <p class="amount amount--target">700 tys. PLN</p>
        </div>
    </div>
    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50"
         aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar" style="width: 50%"></div>
    </div>

</div>
