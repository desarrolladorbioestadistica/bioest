<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/extras.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/datatables/dataTables.bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/pivot/c3.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/pivot/dist/pivot.css');
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
    Yii::app()->clientScript->registerScriptFile("https://www.gstatic.com/charts/loader.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/pivot/d3.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/pivot/c3.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/pivot/dist/pivot.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/pivot/dist/c3_renderers.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/pivot/dist/gchar_renderers.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/Reportes/ReportesDian.js",CClientScript::POS_END);
?>
<!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<div id="divReport">
    <div class="block-header">
        <h2>REPORTES DIAN</h2>
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
                                <?php echo CHtml::dropDownList('Report[columns]', "", 
                                    CHtml::listData($columnname,'column_name', 'column_comment'),
                                    array('id'=>'columnsdd','multiple'=>'multiple','title'=>'seleccione uno o varios campos'));
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-line">
                                    <input class="form-control" placeholder="Digite una palabra descriptiva" id="desc-producto" name="Report[desc-producto]" type="text">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn bg-pink waves-effect m-b-15" id="consultar-reportedian">CONSULTAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Reportes <small>Seleccione las entidades a consultar</small>
                    </h2>
                </div>
                <div class="body" style="overflow-x: scroll">
                    <div id="output"></div>
                    <div id="export-button">
                        <button type="button" class="btn bg-pink waves-effect m-b-15" id="exportarexcel">EXPORTAR CONSULTA</button>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>