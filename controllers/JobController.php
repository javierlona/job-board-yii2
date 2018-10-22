<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\Job;


class JobController extends \yii\web\Controller
{
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
        $job->delete();
        Yii::$app->getSession()->setFlash('success', 'Job Deleted');
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

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
