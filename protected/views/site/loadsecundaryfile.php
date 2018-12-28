<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/extras.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.validate.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/validate.extension.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/Procdata/ProcData.js",CClientScript::POS_END);
?>
<div id="divLoadData">
    <div class="block-header">
        <h2>CARGAR ARCHIVOS</h2>
    </div>
    <!-- Default Media -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        SELECCIÓN DE ARCHIVOS
                        <small>Seleccione el archivo que va a subir en las siguientes opciones, luego cargue el archivo.</small>
                    </h2>

                </div>
                <div class="body">
                    <form id="load_files">
                        <label for="email_address">Seleccione nombre de archivo</label>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="demo-radio-button">
                                    <input name="group5" type="radio" id="municipio" class="with-gap radio-col-blue-grey" value="municipio" />
                                    <label for="municipio">0-0_municipio</label>
                                    <input name="group5" type="radio" id="administrador" class="with-gap radio-col-blue-grey" value="administrador" />
                                    <label for="administrador">1-0_administrador</label>
                                    <input name="group5" type="radio" id="administradorregimen" class="with-gap radio-col-blue-grey" value="administradorregimen" />
                                    <label for="administradorregimen">1-0-1_administradorregimen</label>
                                    <input name="group5" type="radio" id="administradormunicipio" class="with-gap radio-col-blue-grey" value="administradormunicipio"/>
                                    <label for="administradormunicipio">1-1_administradormunicipio</label>
                                    <input name="group5" type="radio" id="afiliacion" class="with-gap radio-col-blue-grey" value="afiliacion" />
                                    <label for="afiliacion">1-2_afiliacion</label>
                                    <input name="group5" type="radio" id="prestador" class="with-gap radio-col-blue-grey" value="prestador"/>
                                    <label for="prestador">1-3-1_prestador</label>
                                    <input name="group5" type="radio" id="administradorvsprestador" class="with-gap radio-col-blue-grey" value="administradorvsprestador"/>
                                    <label for="administradorvsprestador">1-3-1_1_administrador vs prestador</label>
                                    <input name="group5" type="radio" id="servicioprestador" class="with-gap radio-col-blue-grey" value="servicioprestador"/>
                                    <label for="servicioprestador">1-3-2_servicioprestador</label>
                                    <input name="group5" type="radio" id="capacidadinstalada" class="with-gap radio-col-blue-grey" value="capacidadinstalada"/>
                                    <label for="capacidadinstalada">1-3-3_capacidadinstalada</label>
                                    <input name="group5" type="radio" id="oferente" class="with-gap radio-col-blue-grey" value="oferente"/>                                    
                                    <label for="oferente">2-0_oferente</label>
                                    <input name="group5" type="radio" id="importaciondian" class="with-gap radio-col-blue-grey" value="importaciondian"/>
                                    <label for="importaciondian">2-1_importaciondian</label>
                                    <input name="group5" type="radio" id="subgrupo-producto" class="with-gap radio-col-blue-grey" value="subgrupo_producto"/>
                                    <label for="subgrupo-producto">2-1-1_subgrupo producto</label>
                                    <input name="group5" type="radio" id="categoria-producto" class="with-gap radio-col-blue-grey" value="categoria_producto"/>
                                    <label for="categoria-producto">2-1-2_categoria producto</label>
                                    <input name="group5" type="radio" id="producto" class="with-gap radio-col-blue-grey" value="producto"/>
                                    <label for="producto">2-2_producto</label>
                                    <input name="group5" type="radio" id="historico_oferente" class="with-gap radio-col-blue-grey" value="historico_oferente"/>
                                    <label for="historico_oferente">2-3_historico oferente</label>
                                    <input name="group5" type="radio" id="capitulo" class="with-gap radio-col-blue-grey" value="capitulo"/>
                                    <label for="capitulo">3-0_capitulo</label>
                                    <input name="group5" type="radio" id="grupo" class="with-gap radio-col-blue-grey" value="grupo"/>
                                    <label for="grupo">3-1_grupo</label>
                                    <input name="group5" type="radio" id="subgrupo" class="with-gap radio-col-blue-grey" value="subgrupo"/>
                                    <label for="subgrupo">3-2_subgrupo</label>
                                    <input name="group5" type="radio" id="categoria" class="with-gap radio-col-blue-grey" value="categoria"/>
                                    <label for="categoria">3-3_cetegoria</label>
                                    <input name="group5" type="radio" id="procedimiento" class="with-gap radio-col-blue-grey" value="procedimiento"/>
                                    <label for="procedimiento">3-4_procedimiento</label>
                                    <input name="group5" type="radio" id="procedimiento-prestador" class="with-gap radio-col-blue-grey" value="procedimiento_prestador"/>
                                    <label for="procedimiento-prestador">4-0_procedimiento prestador</label>                                    
                                </div>
                            </div>
                        </div>
                        <label for="password">Seleccione archivo a importar</label>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="inputFile" name="inputFile">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect" id="importar">IMPORTAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>