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
                // Only allows logged in user to create categories because that is the only
                // functionality we created for categories
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
        // Create a query
        $query = Category::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
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
            // Created the line below for use in SQLite DB
            // $category->create_date = time();
            if ($category->validate()) {
                $category->save();
                // Display message
                Yii::$app->getSession()->setFlash('success', 'Category Added');
                return $this->redirect('index.php?r=category');
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }

}
