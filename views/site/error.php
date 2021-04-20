<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<style>
    header, footer{
        background: #fff;
    }
    h1{
        font-size: 2.4em;
        font-weight: 700!important;
    }
    body{
        background: #4285f4;
        background-image: url("/web/public/images/body_all2.png");
    }
    .read-more-btn{ clear: both; margin-top: 15px; margin-bottom: 30px;box-shadow: 1px 10px 15px rgba(0,0,0, .15);
        border: 1px solid #4285f4; background: #fff; color: #4285f4; }

    .read-more-btn:hover{ box-shadow: 1px 3px 15px rgba(0,0,0, .15); background: #4285f4; color: #fff; border: 1px solid #fff;}

</style>
<div class=" my-5 pt-sm-5">
    <div class="">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mt-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-6">
                            <img style="margin-top: 45px;" src="/web/public/images/error-img.png" >
                        </div>
                    </div>

                    <h1 class="mt-5 text-uppercase text-white font-weight-bold mb-3">Извините, <br>эта страница не найдена</h1>
                    <h5 class="text-white-50"></h5>
                    <div class="mt-5">
                        <a class="btn read-more-btn" href="/">Вернуться на сайт</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
