<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\CustomController;
use app\models\SignupForm;
use app\models\News;
use app\models\search\TeamSearch;
use app\models\search\TrainingSearch;
use app\models\search\GameSearch;

class SiteController extends CustomController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionTeam()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('team', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   
    
    public function actionTraining()
    {
        $searchModel = new TrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('training', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionGame()
    {
        $searchModel = new GameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('game', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionTeamView($id)
    {
        return $this->render('viewTeam', [
            'model' => \app\models\Team::findOne(['id' => $id]),
        ]);
    }
    
    public function actionTrainingView($id)
    {
        return $this->render('viewTraining', [
            'model' => \app\models\Training::findOne(['id' => $id]),
        ]);
    }
    
    public function actionGameView($id)
    {
        return $this->render('viewGame', [
            'model' => \app\models\Game::findOne(['id' => $id]),
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $this->setMeta('Basketball.ru', 'blog', 'Надеюсь потянем');
        return $this->render('index',[
            'model' => News::find()->all()
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionHello() {
        return $this->renderContent('Hello World');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
    /**
     * Displays contact page.
     *
     * @return Response|string
     
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     
    public function actionAbout() {
        return $this->render('about');
    }
*/
