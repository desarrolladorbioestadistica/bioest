<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/extras.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.validate.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/validate.extension.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/pages/Procdata/ProcData.js",CClientScript::POS_END);
?>
<div id="divLoadDataP">
    <div class="block-header">
        <h2>CARGAR ARCHIVOS</h2>
    </div>
    <!-- Default Media -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        SELECCIÓN DE ARCHIVOS PRIMARIOS
                        <small>Seleccione el archivo que va a subir en las siguientes opciones, luego cargue el archivo.</small>
                    </h2>

                </div>
                <div class="body">
                    <form id="load_files">
                        <label for="email_address">Seleccione nombre de archivo primario</label>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="demo-radio-button">
                                    <input name="group5" type="radio" id="departamento" class="with-gap radio-col-blue-grey" value="departamento" />
                                    <label for="departamento">departamento</label>
                                    <input name="group5" type="radio" id="proveedor" class="with-gap radio-col-blue-grey" value="proveedor"/>
                                    <label for="proveedor">proveedor</label>
                                    <input name="group5" type="radio" id="genero" class="with-gap radio-col-blue-grey" value="genero"/>
                                    <label for="genero">genero</label>
                                    <input name="group5" type="radio" id="grse" class="with-gap radio-col-blue-grey" value="grse"/>
                                    <label for="grse">grse</label>
                                    <input name="group5" type="radio" id="grupo" class="with-gap radio-col-blue-grey" value="grupo"/>
                                    <label for="grupo">grupo</label>
                                    <input name="group5" type="radio" id="grupoproducto" class="with-gap radio-col-blue-grey" value="grupoproducto"/>
                                    <label for="grupoproducto">grupoproducto</label>
                                    <input name="group5" type="radio" id="cocanombre" class="with-gap radio-col-blue-grey" value="cocanombre"/>
                                    <label for="cocanombre">coca nombre</label>
                                    <input name="group5" type="radio" id="grupocapacidad" class="with-gap radio-col-blue-grey" value="grupocapacidad"/>
                                    <label for="grupocapacidad">grupo capacidad</label>
                                    <input name="group5" type="radio" id="marca" class="with-gap radio-col-blue-grey" value="marca"/>
                                    <label for="marca">marca</label>
                                    <input name="group5" type="radio" id="modalidad" class="with-gap radio-col-blue-grey" value="modalidad"/>
                                    <label for="modalidad">modalidad</label>
                                    <input name="group5" type="radio" id="quinquenio" class="with-gap radio-col-blue-grey" value="quinquenio"/>
                                    <label for="quinquenio">quinquenio</label>
                                    <input name="group5" type="radio" id="referencia" class="with-gap radio-col-blue-grey" value="referencia"/>
                                    <label for="referencia">referencia</label>
                                    <input name="group5" type="radio" id="regimenadministrador" class="with-gap radio-col-blue-grey" value="regimenadministrador"/>
                                    <label for="regimenadministrador">régimen administrador</label>
                                    <input name="group5" type="radio" id="seccion" class="with-gap radio-col-blue-grey" value="seccion"/>
                                    <label for="seccion">seccion</label>
                                    <input name="group5" type="radio" id="naturalezajuridica" class="with-gap radio-col-blue-grey" value="naturalezajuridica"/>
                                    <label for="naturalezajuridica">naturaleza jurídica</label>
                                    <input name="group5" type="radio" id="tiposervicio" class="with-gap radio-col-blue-grey" value="tiposervicio"/>
                                    <label for="tiposervicio">tipo servicio</label>
                                    <input name="group5" type="radio" id="tipoadministrador" class="with-gap radio-col-blue-grey" value="tipoadministrador"/>
                                    <label for="tipoadministrador">tipo administrador</label>
                                    <input name="group5" type="radio" id="tipoafiliado" class="with-gap radio-col-blue-grey" value="tipoafiliado"/>
                                    <label for="tipoafiliado">tipo afiliado</label>
                                    <input name="group5" type="radio" id="zona" class="with-gap radio-col-blue-grey" value="zona"/>
                                    <label for="zona">zona</label>
                                    <input name="group5" type="radio" id="grupopoblacional" class="with-gap radio-col-blue-grey" value="grupopoblacional"/>
                                    <label for="grupopoblacional">grupo poblacional</label>
                                    <input name="group5" type="radio" id="tipoimplemento" class="with-gap radio-col-blue-grey" value="tipoimplemento"/>
                                    <label for="tipoimplemento">tipo implemento</label>
                                    <input name="group5" type="radio" id="nivelatencion" class="with-gap radio-col-blue-grey" value="nivelatencion"/>
                                    <label for="nivelatencion">nivel atención</label>
                                    <input name="group5" type="radio" id="tipopoblacion" class="with-gap radio-col-blue-grey" value="tipopoblacion"/>
                                    <label for="tipopoblacion">tipo población</label>
                                    <input name="group5" type="radio" id="claseprestador" class="with-gap radio-col-blue-grey" value="claseprestador"/>
                                    <label for="claseprestador">clase prestador</label>
                                    <input name="group5" type="radio" id="tipousuario" class="with-gap radio-col-blue-grey" value="tipousuario"/>
                                    <label for="tipousuario">tipo usuario</label>
                                </div>
                            </div>
                        </div>
                        <label for="password">Seleccione archivo a importar</label>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="inputFile" name="inputFile" value="CARGAR">
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