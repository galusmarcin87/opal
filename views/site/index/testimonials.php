<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;

$testimonials = MgHelpers::getSettingOptionArray('testimonials '. Yii::$app->language);
if(count($testimonials) == 0){
    return false;
}

?>

<section class="testimonials-container">
    <div class="container">
        <div
                class="testimonials"
                style="background-image: url('./img/testimonials-bg.png')"
        >
            <div id="TESTIMONIALS" class="owl-carousel owl-theme">
                <?foreach($testimonials as $testimonial):?>
                    <div class="item testimonials__item">
                        <img
                                class="testimonials__quote"
                                src="./svg/cudzyslow.svg"
                                alt=""
                        />
                        <p>
                            <?=$testimonial?>
                        </p>
                    </div>
                <?endforeach;?>

            </div>
        </div>
    </div>
</section>
