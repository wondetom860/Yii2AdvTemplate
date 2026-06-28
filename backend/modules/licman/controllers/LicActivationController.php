<?php

namespace backend\modules\licman\controllers;

use backend\modules\licman\models\LicActivation;
use backend\modules\licman\models\LicActivationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * LicActivationController implements the CRUD actions for LicActivation model.
 */
class LicActivationController extends Controller
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
     * Lists all LicActivation models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LicActivationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LicActivation model.
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
     * Creates a new LicActivation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate(int $app_id)
    {
        $model = new LicActivation();
        $model->lic_app_relId = $app_id;

        $params = json_decode($model->licAppRel->params_string_json, true);
        $model->dec_key = $params['dec_key'];
        $model->active_duration = 365;
        $model->activation_code = $model->generateActivationCode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->suchExists()) {
                    Yii::$app->session->setFlash('error', 'Such entry already exists.');
                } else {
                    $model->activation_date = strtotime($model->activation_date);
                    $model->status = $model->determineStatus();
                    $model->created_at = time();
                    $model->created_by = Yii::$app->user->id;

                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'License Activation Key created.');
                    } else {
                        var_dump($model->errors);exit;
                        Yii::$app->session->setFlash('error', 'License Activation Key creation failed, Error: .' . json_encode($model->errors));
                    }
                }
                return $this->redirect(['/LICMAN/lic-app/view', 'id' => $model->lic_app_relId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return \Yii::$app->request->isAjax ?
            $this->renderAjax('create', [
                'model' => $model,
            ])
            :
            $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing LicActivation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LicActivation model.
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
     * Finds the LicActivation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LicActivation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LicActivation::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
