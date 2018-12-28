<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/extras.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/datatables/dataTables.bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap-select/css/bootstrap-select.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.validate.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/bootstrap-select/js/bootstrap-select.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/autosize/autosize.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/momentjs/moment.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/forms/basic-form-elements.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/datatables/jquery.dataTables.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/datatables/dataTables.bootstrap.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/flot-charts/jquery.flot.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/flot-charts/jquery.flot.pie.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/flot-charts/jquery.flot.tooltip.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/Reportes/Reportes.js",CClientScript::POS_END);
?>
<!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<div id="divReportProduct">
    <div class="block-header">
        <h2>REPORTES</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Entidades disponibles en consulta <small>Seleccione las entidades a consultar</small>
                    </h2>
                </div>
                <div class="body">
                    <form id="formReport">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[marca]', "", 
                                    CHtml::listData($modelMarca,'id_marca', 'nombre_marca'),
                                    array('empty' => '(Seleccione una marca)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[modelo]', "", 
                                    CHtml::listData($modelModelo,'id_modelo', 'nombre_modelo'),
                                    array('empty' => '(Seleccione un modelo)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[referencia]', "", 
                                    CHtml::listData($modelReferencia,'id_referencia', 'nombre_referencia'),
                                    array('empty' => '(Seleccione una referencia)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[fabricante]', "", 
                                    CHtml::listData($modelFabricante,'id_fabricante', 'nombre_fabricante'),
                                    array('empty' => '(Seleccione un fabricante)'));
                                ?>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[tecnicadiag]', "", 
                                    CHtml::listData($modelTecnicaDiagnostico,'id_tecnica', 'nombre_tecnica'),
                                    array('empty' => '(Seleccione una técnica de diagnóstico)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[oferente]', "", 
                                    CHtml::listData($modelOferente,'id_oferente', 'razon_social_oferente'),
                                    array('empty' => '(Seleccione un oferente)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[municipio]', "", 
                                    CHtml::listData($modelMunicipio,'id_municipio', 'nombre_municipio'),
                                    array('empty' => '(Seleccione un municipio)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo CHtml::dropDownList('Report[departamento]', "", 
                                    CHtml::listData($modelDepartamento,'id_departamento', 'nombre_departamento'),
                                    array('empty' => '(Seleccione un departamento)'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-line">
                                    <input class="form-control" placeholder="Digite un producto" id="nombre-producto" name="Report[nombre-producto]" type="text">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn bg-pink waves-effect m-b-15" id="consultar-reporte">CONSULTAR</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <table id="dataProd" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            
                        </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix" id="graphics">
        
    </div>
</div>