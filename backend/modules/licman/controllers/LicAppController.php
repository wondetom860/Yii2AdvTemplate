<?php

namespace backend\modules\licman\controllers;

use backend\modules\licman\models\LicApp;
use backend\modules\licman\models\LicAppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LicAppController implements the CRUD actions for LicApp model.
 */
class LicAppController extends Controller
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
     * Lists all LicApp models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LicAppSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LicApp model.
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
     * Creates a new LicApp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LicApp();

        $orgId = \Yii::$app->request->get('org_id');
        if ($orgId) {
            $model->org_relId = $orgId;
            $model->release_date = date('dMY'); // set default release date to today
            $model->status = 1; // set default status to 1 (active)
            $key_pairs = \Yii::$app->keyGen->keyGenerator();
            $model->enc_key = $key_pairs[0]; // set enc_key to the
            $model->params_string_json = json_encode([
                'organization_name' => $model->orgRel->name ?? '',
                'organization_code' => $model->orgRel->code ?? '',
                'dec_key' => $key_pairs[1], // set dec_key to the generated public key
            ]); // set default params to empty array
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->suchExists()) {
                    \Yii::$app->session->setFlash('error', 'Such app already exists for this organization');
                } else {
                    $model->params_string_json = json_encode([
                        'organization_name' => $model->orgRel->name ?? '',
                        'organization_code' => $model->orgRel->code ?? '',
                        'enc_key' => $model->enc_key,
                        'status' => $model->status,
                        'release_date' => $model->release_date,
                        'dec_key' => $key_pairs[1], // set dec_key to the generated public key
                    ]); // set default params to empty array
                    $model->params_array_serialized = openssl_encrypt($model->params_string_json, 'aes-256-cbc', $model->enc_key, 0, substr($model->enc_key, 0, 16));
                    $model->created_at = time();
                    $model->created_by = \Yii::$app->user->id;
                    $model->getData();
                    $model->release_date = strtotime($model->release_date); // convert release date to timestamp

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

        return \Yii::$app->request->isAjax ?
            $this->renderAjax('create', [
                'model' => $model,
            ]) :
            $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing LicApp model.
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
     * Deletes an existing LicApp model.
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
     * Finds the LicApp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LicApp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LicApp::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
