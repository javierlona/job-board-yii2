<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        Create a query
        $query = Category::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);

        $categories = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'categories' => $categories
            ,'pagination' => $pagination
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

}
