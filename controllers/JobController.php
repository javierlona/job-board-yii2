<?php

namespace app\controllers;

use yii\data\Pagination;
use app\models\Job;
use app\models\Category;


class JobController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        //        Create a query
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);

        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'jobs' => $jobs
            ,'pagination' => $pagination
        ]);

        return $this->render('index');
    }

    public function actionDetails($id)
    {
//        Return the individual job
        $job = Job::find()
            ->where(['id' => $id])
            ->one();
        return $this->render('details', ['job' => $job]);
    }

}
