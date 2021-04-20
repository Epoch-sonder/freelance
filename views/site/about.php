<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    body{
        background-image: url("public/images/body_reg.png");
        background-size: cover;
        background-position: center;
        background-color: #4285f4!important;
    }
    p{
        color: #fff;
        text-shadow: 2px 2px 7px grey;
    }
   .contacts{
       margin-bottom: 10px;
    }
    .contacts:focus, .contacts:hover{
        color: #fff;
    }
    .contact {
        padding-top: 10px;
    }

</style>
<div style="margin-top: 70px; background: #fff;"><p> </p></div>
<section class="header-section">
    <h1>8решений.рф</h1>
    <h4 class="text-center mb-5">Инструмент формирования единой коммуникационной среды</h4>
</section>
<section class="dark-section">
    <div class="information-block">
        <div class="row p-5">
            <div class="col-12 col-md-8">
                <h4 class="text-white">Скорость взаимодействия</h4>
                <p>
                    В современном мире скорость взаимодействия играет ключевую роль. Скорость принятия управленческого решения зависит от организации коммуникаций в команде. Любые обсуждения не проходят гладко и требуют
                    большого
                    ресурса времени. Если ещё помножить на количество участников диалога, то мы понимаем, что в большинстве случаев упускаем возможность воспользоваться
                    результатами совместного обсуждения.
                </p>
            </div>
            <div class="col-12 col-md-4 centered">
                <i class="fas ion-ios-speedometer fa-9x"></i>
            </div>
        </div>
    </div>

    <div class="information-block">
        <div class="row p-5">
            <div class="col-12 col-md-4 centered">
                <i class="fas ion-ios-chatbubbles fa-9x"></i>
            </div>
            <div class="col-12 col-md-8">
                <h4 class="text-white">Обмен мнениями</h4>
                <p>
                    Коммуникационная-аналитическая платформа 8решений.рф обеспечивает возможность качественного обмена мнениями от большого количества людей при
                    ограниченном
                    ресурсе времени. Каждый имеет возможность определить тему, задать вопросы, ответить на вопросы, предложить идею и обозначить проблему, а также
                    предложить
                    решения совместно, оценив какие есть в этих решениях минусы, плюсы, особенности, риски.
                </p>
            </div>
        </div>
    </div>

    <div class="information-block">
        <div class="row p-5">
            <div class="col-12 col-md-8">
                <h4 class="text-white">Протоколирование</h4>
                <p>
                    Как результат такого обмена мнениями, появляется протокол. В нем отражены все мнения в строго структурированном виде. Тот, кто заинтересован сократить
                    время
                    на поиск качественного управленческого решения сможет воспользоваться коммуникационной-аналитической платформой 8решений.рф
                </p>
            </div>
            <div class="col-12 col-md-4 centered">
                <i class="fas ion-ios-list fa-9x"></i>
            </div>
        </div>
    </div>

    <div class="information-block">
        <div class="row p-5">
            <div class="col-12 col-md-4 centered">
                <i class="fas ion-ios-paper fa-9x"></i>
            </div>
            <div class="col-12 col-md-8">
                <h4 class="text-white">Сценарии использования</h4>
                <p>
                    8решений.рф можно использовать на переговорах, форумах, конференциях, в обучающем процессе, при проведении круглых столов, мозговых штурмах, в работе
                    государственных структур и общественных объединениях, решающие насущные проблемы общества, работы с избирателями. Платформа фиксирует кто, что сказал,
                    создавая доказывание и доказательства.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="text-center">
    <p class="contact">Россия, г. Москва</p>
    <p class="contact">+7 (999) 808-75-05</p>
    <p><a class="contact contacts" href="mailto:contact@8решений.рф">contact@8решений.рф</a></p>
</div>
</div>
