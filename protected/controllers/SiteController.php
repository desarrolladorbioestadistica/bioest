<?php

class SiteController extends Controller{
    /**
     * Declares class-based actions.
     */
    public function actions(){
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
            'class'=>'CCaptchaAction',
                    'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex(){
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError(){
        if($error=Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        /*
         * Select and send secundary files to import to database
         */
        public function actionFormLoadSFiles(){
            $this->render("loadsecundaryfile");
        }
        /*
         * Select and send secundary files to import to database
         */
        public function actionFormLoadPFiles(){
            $this->render("loadprimaryfile");
        }
        
        public function actionFormDisgregateProducts(){
            $this->render("loadfileproducts");
        }
        public function actionCreateExcel(){
            ini_set('post_max_size', '0');
            ini_set('memory_limit', '0');
            ini_set('max_execution_time', '0');
            $dir = Yii::getPathOfAlias('webroot')."/protected/uploads/";
//            print_r($_FILES['inputFile']);exit();
            if($_FILES['inputFile']['name']=="productos.xls" || $_FILES['inputFile']['name']=="productos.xlsx" ){
                 try{
                    move_uploaded_file($_FILES['inputFile']['tmp_name'], Yii::app()->getBasePath().'/uploads/'.$_FILES['inputFile']['name']);
                    $modelLoadFiles=new LoadFiles();
                    $modelLoadFiles->createExcel($dir,$_FILES['inputFile']['name']);
                }
                catch(Exception $e){
                    Yii::app()->user->setFlash('error','El archivo no es accesible, seleccione otro');
                    $this->render("loadfileproducts");
                }
            }
            else{
               Yii::app()->user->setFlash('error','El archivo no coincide con el nombre productos.xls');
                $this->render("loadfileproducts");
            }
//            echo CJSON::encode($response);
        }
        public function actionLoadFileToDb(){
            $fileName=Yii::app()->request->getPost("group5");
            $dir = Yii::getPathOfAlias('webroot')."/protected/uploads/";
            $res="";
//            try{
                move_uploaded_file($_FILES['inputFile']['tmp_name'], Yii::app()->getBasePath().'/uploads/'.$_FILES['inputFile']['name']);
                $modelLoadFiles=new LoadFiles();
                switch ($fileName){
                    case "municipio":
                        $depto=$modelLoadFiles->consultaEntidad("departamento");
                        if(!empty($depto)){
                            $modelLoadFiles->loadMunicipio($dir,$_FILES['inputFile']['name'],$fileName);
                            $response["status"]="success";
                            $response["msg"]="Datos registrados satisfactoriamente";
                        }
                        else{
                            $response["status"]="nsuccess";
                            $response["msg"]="No hay datos registrados en la entidad departamento, cargue primero datos en esta entidad";
                        }
                    break;
                    case "administrador":
                        $tipoAdmin=$modelLoadFiles->consultaEntidad("tipo_administrador");
                        if(!empty($tipoAdmin)){
                            $modelLoadFiles->loadAdministrador($dir,$_FILES['inputFile']['name'],$fileName);
                            $response["status"]="success";
                            $response["msg"]="Datos registrados satisfactoriamente";
                            }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad tipo administrador, cargue primero datos en esta entidad";
                        }
                    break;
                    case "administradorregimen":
                        $administrador=$modelLoadFiles->consultaEntidad("administrador");
                        $regimenAdministrador=$modelLoadFiles->consultaEntidad("regimen_administrador");
                        if(!empty($administrador) && !empty($administrador)){
                            $res=$modelLoadFiles->loadAdministradorRegimen($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorAdministradorRegimen.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en las entidades administrador o regimen_administrador, cargue primero datos en estas entidades";
                        }
                    break;
                    case "afiliacion":
                        $administradorMunicipio=$modelLoadFiles->consultaEntidad("administrador");
                        $regimenAdministrador=$modelLoadFiles->consultaEntidad("regimen_administrador");
                        $genero=$modelLoadFiles->consultaEntidad("genero");
                        $tipoAfiliado=$modelLoadFiles->consultaEntidad("tipo_afiliado");
                        $tipoPoblacion=$modelLoadFiles->consultaEntidad("tipo_poblacion");
                        if(!empty($administradorMunicipio)&&!empty($regimenAdministrador) && !empty($genero)&&!empty($tipoAfiliado) && !empty($tipoPoblacion)){
                            $res=$modelLoadFiles->loadAfiliacion($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorAfiliacion.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad administrador municipio,regimen administrador, genero, tipo afiliado o tipo población, cargue primero datos en estas entidades";
                        }
                    break;
                    case "administradormunicipio":
                        $municipio=$modelLoadFiles->consultaEntidad("municipio");
                        $administrador=$modelLoadFiles->consultaEntidad("administrador");
                        if(!empty($municipio)&&!empty($municipio)){
                            $modelLoadFiles->loadAdministradorMunicipio($dir,$_FILES['inputFile']['name'],$fileName);
                            $response["status"]="success";
                            $response["msg"]="Datos registrados satisfactoriamente";
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad municipio o administrador, cargue primero datos en estas entidades";
                        }
                    break;
                    case "oferente":
                        $municipio=$modelLoadFiles->consultaEntidad("municipio");
                        if(!empty($municipio)){
                            $res=$modelLoadFiles->loadOferente($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorOferente.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad municipio, cargue primero datos en esa entidad";
                        }
                    break;
                    case "importaciondian":
                        $oferente=$modelLoadFiles->consultaEntidad("oferente");
                        if(!empty($oferente)){
                            $res=$modelLoadFiles->loadImportacionDian($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorImportacionDian.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad oferente, cargue primero datos en esa entidad";
                        }
                    break;
                    case "producto":
                        $importacionDian=$modelLoadFiles->consultaEntidad("importacion_dian");
                        if(true){
                            $res=$modelLoadFiles->loadProducto($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorProducto.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad imortacion_dian, cargue primero datos en esa entidad";
                        }
                    break;
                    case "prestador":
                        $municipio=$modelLoadFiles->consultaEntidad("municipio");
                        if(!empty($municipio)){
                            $res=$modelLoadFiles->loadPrestador($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorPrestador.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad administrador o en la entidad municipio, cargue primero datos en estas entidades";
                        }
                    break;
                    case "servicioprestador":
                        $prestador=$modelLoadFiles->consultaEntidad("prestador");
                        $grse=$modelLoadFiles->consultaEntidad("grse");
                        $tipoServicio=$modelLoadFiles->consultaEntidad("tipo_servicio");
                        if(!empty($prestador) && !empty($grse) && !empty($tipoServicio)){
                            $res=$modelLoadFiles->loadServicioPrestador($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorServicioPrestador.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en las entidades prestdor, grse o tipo servicio , cargue primero datos en estas entidades";
                        }
                    break;
                    case "capacidadinstalada":
                        $prestador=$modelLoadFiles->consultaEntidad("prestador");
                        $modalidad=$modelLoadFiles->consultaEntidad("modalidad");
                        $cocaNombre=$modelLoadFiles->consultaEntidad("coca_nombre");
                        $grupoCapacidad=$modelLoadFiles->consultaEntidad("grupo_capacidad");
                        if(!empty($prestador) && !empty($modalidad) && !empty($cocaNombre) && !empty($grupoCapacidad)){
                            $res=$modelLoadFiles->loadCapacidadInstalada($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorCapacidadInstalada.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en las entidades prestdor, modalidad,implemento o tipo implemento , cargue primero datos en estas entidades";
                        }
                    break;
                    case "capitulo":
                        $seccion=$modelLoadFiles->consultaEntidad("seccion");
                        if(!empty($seccion)){
                            $res=$modelLoadFiles->loadCapitulo($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorCapitulo.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad seccion, cargue primero datos en esta entidad";
                        }
                    break;
                    case "grupo":
                        $capitulo=$modelLoadFiles->consultaEntidad("capitulo");
                        if(!empty($capitulo)){
                            $res=$modelLoadFiles->loadGrupo($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorGrupo.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad capitulo, cargue primero datos en esta entidad";
                        }
                    break;
                    case "subgrupo":
                        $grupo=$modelLoadFiles->consultaEntidad("grupo");
                        if(!empty($grupo)){
                            $res=$modelLoadFiles->loadSubgrupo($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorSubgrupo.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad grupo, cargue primero datos en esta entidad";
                        }
                    break;
                    case "categoria":
                        $grupo=$modelLoadFiles->consultaEntidad("subgrupo");
                        if(!empty($grupo)){
                            $res=$modelLoadFiles->loadCategoria($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorCategoria.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad subgrupo, cargue primero datos en esta entidad";
                        }
                    break;
                    case "procedimiento":
                        $categoria=$modelLoadFiles->consultaEntidad("categoria");
                        if(!empty($categoria)){
                            $res=$modelLoadFiles->loadProcedimiento($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorProcedimiento.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad categoria, cargue primero datos en esta entidad";
                        }
                    break;
                    
                    case "subgrupo_producto":
                        $grupoProducto=$modelLoadFiles->consultaEntidad("grupo_producto");
                        if(!empty($grupoProducto)){
                            $res=$modelLoadFiles->loadSubgrupoProducto($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorSubgrupoProducto.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad categoria, cargue primero datos en esta entidad";
                        }
                    break;
                    case "categoria_producto":
                        $subgrupoProducto=$modelLoadFiles->consultaEntidad("subgrupo_producto");
                        if(!empty($subgrupoProducto)){
                            $res=$modelLoadFiles->loadCategoriaProducto($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorCategoriaProducto.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="No hay datos registrados en la entidad categoria, cargue primero datos en esta entidad";
                        }
                    break;
                    case "procedimiento_prestador":
                        $prestador=$modelLoadFiles->consultaEntidad("prestador");
                        $procedimiento=$modelLoadFiles->consultaEntidad("procedimiento");
                        $quinquenio=$modelLoadFiles->consultaEntidad("quinquenio");
                        $tipoUsuario=$modelLoadFiles->consultaEntidad("tipo_usuario");
//                        $tipoAtencion=$modelLoadFiles->consultaEntidad("tipo_atencion");
                        if(!empty($prestador) && !empty($procedimiento) && !empty($quinquenio) && !empty($tipoUsuario) ){
                            $res=$modelLoadFiles->loadProcedimientoPrestador($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorProcedimientoPrestador.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="Por favor revise que haya datos cargados en estas entidades: prestador, procedimiento, quinquenio, tipo usuario y tipo atención";
                        }
                    break;
                    case "administradorvsprestador":
                        $prestador=$modelLoadFiles->consultaEntidad("prestador");
                        $administrador=$modelLoadFiles->consultaEntidad("administrador");
                        if(!empty($prestador) && !empty($administrador)){
                            $res=$modelLoadFiles->loadAdministradorVsPrestador($dir,$_FILES['inputFile']['name'],$fileName);
                            if(empty($res)){
                                $response["status"]="success";
                                $response["msg"]="Datos registrados satisfactoriamente";
                            }
                            else{
                                $response["status"]="nsuccess";
                                $response["msg"]="No se cargaron algunos registros, revise el informe";
                                $fileNameErr="errorAdministradorVsPrestador.txt";
                            }
                        }
                        else{
                            $response["status"]="nosuccess";
                            $response["msg"]="Por favor revise que haya datos cargados en estas entidades: prestador, procedimiento, quinquenio, tipo usuario y tipo atención";
                        }
                    break;
                }
                if(!empty($res)){
                    $dir = Yii::getPathOfAlias('webroot')."/protected/flerror/";
                    $handle = fopen($dir.$fileNameErr, 'w') or die('');
                    fwrite($handle, $res);
                    $response["url"]=Yii::app()->request->baseUrl."/protected/flerror/".$fileNameErr;
                }
//            }
//            catch(Exception $e){
//               $error= "El archivo no es accesible, seleccione otro.";//Yii::app()->errorHandler->error;
//                $response["status"]="nsuccess";
//                $response["msg"]=$e->getMessage();
//            }
            echo CJSON::encode($response);
        }
        public function actionLoadFilePToDb(){
            $fileName=Yii::app()->request->getPost("group5");
            $dir = Yii::getPathOfAlias('webroot')."/protected/uploads/";
            
//            try{
                move_uploaded_file($_FILES['inputFile']['tmp_name'], Yii::app()->getBasePath().'/uploads/'.$_FILES['inputFile']['name']);
                $modelLoadFiles=new LoadFiles();
                switch ($fileName){
                    case "departamento":
                        $modelLoadFiles->loadDepartamento($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                        break;
                    case "proveedor":
                        $modelLoadFiles->loadProveedor($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "genero":
                        $modelLoadFiles->loadGenero($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "grse":
                        $modelLoadFiles->loadGrse($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "grupo":
                        $modelLoadFiles->loadGrupo($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "cocanombre":
                        $modelLoadFiles->loadCocaNombre($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "grupocapacidad":
                        $modelLoadFiles->loadGrupoCapacidad($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "marca":
                        $modelLoadFiles->loadMarca($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "modalidad":
                        $modelLoadFiles->loadModalidad($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "modelo":
                        $modelLoadFiles->loadModelo($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "quinquenio":
                        $modelLoadFiles->loadQuinquenio($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "referencia":
                        $modelLoadFiles->loadReferencia($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "regimenadministrador":
                        $modelLoadFiles->loadRegimenAdministrador($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "seccion":
                        $modelLoadFiles->loadSeccion($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "naturalezajuridica":
                        $modelLoadFiles->loadNaturalezaJuridica($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tecnicadiagnostico":
                        $modelLoadFiles->loadTecnicaDiagnostico($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tipoadministrador":
                        $modelLoadFiles->loadTipoAdministrador($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tipoafiliado":
                        $modelLoadFiles->loadTipoAfiliado($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "zona":
                        $modelLoadFiles->loadZona($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "grupopoblacional":
                        $modelLoadFiles->loadGrupoPoblacional($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tipoimplemento":
                        $modelLoadFiles->loadTipoImplemento($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "nivelatencion":
                        $modelLoadFiles->loadNivelAtencion($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tipopoblacion":
                        $modelLoadFiles->loadTipoPoblacion($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "claseprestador":
                        $modelLoadFiles->loadClasePrestador($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tiposervicio":
                        $modelLoadFiles->loadTipoServicio($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "tipousuario":
                        $modelLoadFiles->loadTipoUsuario($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    case "grupoproducto":
                        $modelLoadFiles->loadGrupoProducto($dir,$_FILES['inputFile']['name'],$fileName);
                        $response["status"]="success";
                        $response["msg"]="Datos registrados satisfactoriamente";
                    break;
                    default :
                        $response["status"]="success";
                        $response["msg"]="archivo no referenciado";
                    break;
                }
                
//            }
//            catch(Exception $e){
//               $error= "El archivo no es accesible, seleccione otro.";//Yii::app()->errorHandler->error;
//                $response["status"]="nsuccess";
//                $response["msg"]=$error;
//            }
            echo CJSON::encode($response);
        }
    public function actionSearchProcedimiento(){
        $this->render("view-secondinfo");
    }    
    public function actionSearchProcedimientoDataTable(){
        $modelLoadFiles=new LoadFiles();
        $procedimiento=$modelLoadFiles->searchProcedimiento();
        echo CJSON::encode($procedimiento);
    }
    public function actionSearchInfoPTables(){
        $nameTable=Yii::app()->request->getPost("table");
        $columns=$this->loadPTableColumns($nameTable);
        $modelLoadFiles=new LoadFiles();
        $infoTables=$modelLoadFiles->searchInfoPTables($nameTable,$columns);
        echo CJSON::encode($infoTables);
    }
    
    public function actionSearchColumns(){
        $nameTable=pg_escape_string(Yii::app()->request->getPost("columnsptables"));
        $tipoTable= Yii::app()->request->getPost("tipetable");
        
            $columns=$this->loadPTableColumns($nameTable);
        
        echo CJSON::encode($columns);
    }
    public function loadPTableColumns($nameTable){
        $conn=Yii::app()->db;
        $sql="select column_name,data_type from information_schema.columns where table_name=:tablename;";
        $query=$conn->createCommand($sql);
        $query->bindParam(":tablename",$nameTable);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        return $res;
    }
}