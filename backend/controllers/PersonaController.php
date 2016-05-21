<?php

namespace backend\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Alumno;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
     * @param integer $nacionalidad
     * @param string $numero_identificacion
     * @return mixed
     */
    public function actionView($nacionalidad, $numero_identificacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($nacionalidad, $numero_identificacion),
        ]);
    }

    /**
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $nacionalidad
     * @param string $numero_identificacion
     * @return mixed
     */
    public function actionUpdate($nacionalidad, $numero_identificacion)
    {
        $model = $this->findModel($nacionalidad, $numero_identificacion);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $nacionalidad
     * @param string $numero_identificacion
     * @return mixed
     */
    public function actionDelete($nacionalidad, $numero_identificacion)
    {
        $this->findModel($nacionalidad, $numero_identificacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $nacionalidad
     * @param string $numero_identificacion
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nacionalidad, $numero_identificacion)
    {
        if (($model = Persona::findOne(['nacionalidad' => $nacionalidad, 'numero_identificacion' => $numero_identificacion])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAlumno()
    {
        $model = new Persona();
        $Alumno = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $modelAlumno = new Alumno();
            $modelAlumno->persona_nacionalidad = $model->nacionalidad;
            $modelAlumno->persona_numero_identificacion = $model->numero_identificacion;
            $modelAlumno->save();
            
            return $this->redirect(['view', 'nacionalidad' => $model->nacionalidad, 'numero_identificacion' => $model->numero_identificacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'Alumno' => $Alumno,
            ]);
        }
    }
}
