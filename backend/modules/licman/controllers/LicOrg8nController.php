<?php

namespace backend\modules\licman\controllers;

use backend\modules\licman\models\LicOrg8n;
use backend\modules\licman\models\LicOrg8nSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LicOrg8nController implements the CRUD actions for LicOrg8n model.
 */
class LicOrg8nController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],

                'access' => [
                    'class' => \yii\filters\AccessControl::class,
                    // We will override the default rule config with the new AccessRule class
                    'ruleConfig' => [
                        'class' => \yii\filters\AccessRule::class,
                    ],
                    'rules' => [
                        [
                            'actions' => [],
                            'allow' => true,
                            // Allow  admins to create, update, and delete, and view (index)
                            'roles' => ['@'],
                        ],
                    ]
                ]
            ]
        );
    }

    /**
     * Lists all LicOrg8n models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LicOrg8nSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index_lv', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LicOrg8n model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LicOrg8n model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LicOrg8n();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->suchExists()) {
                    // $this->addError('code', 'Such code already exists');
                    \Yii::$app->session->setFlash('error', 'Such code already exists');
                } else {
                    $model->created_at = time();
                    $model->created_by = \Yii::$app->user->id;
                    $model->getData();

                    if ($model->save()) {
                        \Yii::$app->session->setFlash('success', 'Saved');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                    \Yii::$app->session->setFlash('error', 'Error saving: ' . json_encode($model->getErrors()));
                }
                // return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LicOrg8n model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->suchExists($id)) {
                $this->addError('code', 'Such code already exists');
                \Yii::$app->session->setFlash('error', 'Such code already exists');
            } else {
                $model->getData();
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', 'Saved');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                \Yii::$app->session->setFlash('error', 'Error saving: ' . json_encode($model->getErrors()));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LicOrg8n model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LicOrg8n model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LicOrg8n the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LicOrg8n::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
