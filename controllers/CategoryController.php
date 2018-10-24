<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\Category;
use yii\filters\AccessControl;

class CategoryController extends \yii\web\Controller
{
    //    Access Control
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
//                        'actions' => ['create', 'edit', 'delete'],
                        'roles' => ['@'],
                    ],
                    // everything else is denied by default
                ],
            ],
        ];
    }

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
        $category = new Category();

        if ($category->load(Yii::$app->request->post())) {
//            $category->create_date = time();
            if ($category->validate()) {
                $category->save();
//                Display message
                Yii::$app->getSession()->setFlash('success', 'Category Added');
                return $this->redirect('index.php?r=category');
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }

}
