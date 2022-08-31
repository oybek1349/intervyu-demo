<?php

namespace app\modules\intervyu\controllers;

use Yii;
use yii\web\Controller;
use app\modules\intervyu\models\NomzodlarForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Default controller for the `intervyu` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => [ 'index'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index'],
                            'roles' => ['?', '@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'index' => ['POST', 'GET'],
                    ],
                ],
            ];
        
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {        
        return parent::beforeAction($action); 
    } 
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new NomzodlarForm();

        if ( $model->load(Yii::$app->request->post()) && $model->valForm() ) {
                Yii::$app->session->setFlash('success', "Ma'lumotingiz muvoffaqiyatli yuborildi.");
                return $this->refresh();      
        } else {
            $model->attributes = Yii::$app->request->post('NomzodlarForm');
        }

        return $this->render('index', ['model' => $model]);
    }
}
