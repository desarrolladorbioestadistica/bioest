<?php 
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/datatables/dataTables.bootstrap.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.validate.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/validate.extension.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap-select/css/bootstrap-select.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/bootstrap-select/js/bootstrap-select.js",CClientScript::POS_END);
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/datatables/jquery.dataTables.min.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/datatables/jquery.dataTables.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/datatables/dataTables.bootstrap.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/datatables/dataTables.buttons.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile("https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/SearchData.js",CClientScript::POS_END);
?>
<div id="divSearchTables">
    <div class="block-header">
        <h2>MUESTRA ENTIDADES</h2>
    </div>
    <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Entidades primarias <small>Tablas con información básica</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form id="searchPTables">
                                <div class="form-group">
                                    <?php 
                                        $entidadePrimarias=array(
                                            "clase_prestador"=>"Clase prestador",
                                            "coca_nombre"=>"Capacidad instalada nombre",
                                            "departamento"=>"Departamento",
                                            "genero"=>"Genero",
                                            "grse"=>"Grupo servicio",
                                            "grupo"=>"Grupo",
                                            "grupo_capacidad"=>"Grupo capacidad",
                                            "grupo_poblacional"=>"Grupo poblacional",
                                            "grupo_producto"=>"Grupo Prducto",
                                            "marca"=>"Marca",
                                            "modalidad"=>"Modalidad",
                                            "naturaleza_juridica"=>"Naturaleza jurídica",
                                            "nivel_atencion"=>"Nivel atención",
                                            "proveedor"=>"Proveedor",
                                            "quinquenio"=>"Quinquenio",
                                            "referencia"=>"Referencia",
                                            "regimen_administrador"=>"Régimen administrador",
                                            "seccion"=>"Sección",
                                            "tipo_administrador"=>"Tipo administrador",
                                            "tipo_afiliado"=>"Tipo afiliado",
                                            "tipo_atención"=>"Tipo atención",
                                            "tipo_población"=>"Tipo población",
                                            "tipo_servicio"=>"Tipo servicio",
                                            "tipo_usuario"=>"Tipo usuario",
                                            "zona"=>"Zona"
                                            );
                                        echo CHtml::dropDownList('columnsptables', "", 
                                        $entidadePrimarias,
                                        array('id'=>'columnsdd','title'=>'seleccione una entidad'));
                                    ?>
                                </div>
                                <button type="button" class="btn bg-pink waves-effect m-b-15" id="consultar-primtab">CONSULTAR</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Entidades secundarias <small>Consultas con información compuesta</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form id="searchSTables">
                                <div class="form-group">
                                    <?php 
                                        $entidadesHijas=array(
                                            "municipio"=>"municipio",
                                            "administrador"=>"administrador",
                                            "administrador_regimen"=>"administrador vs regimen",
                                            "administrador_municipio"=>"administrador vs municipio",
                                            "afiliacion"=>"afiliacion",
                                            "prestador"=>"prestador",
                                            "administrador_prestador"=>"administrador vs prestador",
                                            "servicio_prestador"=>"servicio vs prestador",
                                            "capacidad_instalada"=>"capacidad instalada",
                                            "subgrupo_producto"=>"subgrupo producto",
                                            "categoria_producto"=>"categoria producto ",
                                            "producto"=>"producto",
                                            "historico_oferente"=>"historico oferente",
                                            "capitulo"=>"capitulo",
                                            "grupo"=>"grupo",
                                            "subgrupo"=>"subgrupo",
                                            "categoria"=>"categoria",
                                            "procedimiento"=>"procedimiento",
                                            "procedimiento_prestador"=>"procedimiento prestador"
                                            );
                                        echo CHtml::dropDownList('columnsptables', "", 
                                        $entidadesHijas,
                                        array('id'=>'columnsdd','title'=>'seleccione una entidad'));
                                    ?>
                                </div>
                                <button type="button" class="btn bg-pink waves-effect m-b-15" id="consultar-secontab">CONSULTAR</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
    <!-- Default Media -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                </div>
                <div class="body">
                    <table id="dataGeneral" class="table table-bordered table-striped">
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
</div>

 <!-- /.row (main row) -->
