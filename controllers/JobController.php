<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\Job;
use yii\filters\AccessControl;


class JobController extends \yii\web\Controller
{
//    Access Control
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
//                        'actions' => ['create', 'edit', 'delete'],
//                    The @ corresponds to logged in users
                        'roles' => ['@'],
                    ],
                    // everything else is denied by default
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                // form inputs are valid
                $job->save();

                Yii::$app->getSession()->setFlash('success', 'Job Added');

                return $this->redirect('index.php?r=job');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);

        if(Yii::$app->user->identity->id != $job->user_id)
        {
            return $this->redirect('index.php?r=job');
        }

        $job->delete();
        Yii::$app->getSession()->setFlash('success', 'Job Deleted');
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        if(Yii::$app->user->identity->id != $job->user_id)
        {
            return $this->redirect('index.php?r=job');
        }

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                // form inputs are valid
                $job->save();

                Yii::$app->getSession()->setFlash('success', 'Job Updated');

                return $this->redirect('index.php?r=job');
            }
        }

        return $this->render('edit', [
            'job' => $job,
        ]);
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
