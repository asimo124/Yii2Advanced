<?php
namespace app\controllers;

use yii\rest\ActiveController;

class PatientController extends ActiveController
{
    public $modelClass = 'app\models\Patient';
}