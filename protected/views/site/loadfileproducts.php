<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/extras.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.validate.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/validate.extension.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/Procdata/ProcData.js",CClientScript::POS_END);
?>
<div id="divDisPr">
    <div class="block-header">
        <h2>CARGAR ARCHIVO DE PRODUCTOS SIN DESAGREGAR</h2>
    </div>
    <!-- Default Media -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <?php if(Yii::app()->user->hasFlash('error')){
                        echo "<pre>";
                        echo Yii::app()->user->getFlash('error');
                        echo "</pre>";
                    }?>
                </div>
                <div class="body">
                    <form id="load_files" enctype="multipart/form-data" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/createExcel" method="post">
                        <label for="file">Seleccione archivo a desagregar</label>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="inputFile" name="inputFile">
                                <small class="text-muted">Seleccione archivo denominado produtos.xls</small>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" id="importar" value="IMPORTAR"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>