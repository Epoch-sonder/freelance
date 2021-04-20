<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SortForm extends Model
{
    public $str; // сортировать по правилу

    public function rules()
    {
        return [
            [['str', ], 'trim'],
        ];
    }
}
