<?php

class ReportesController extends Controller{
    

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex(){
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->actionReportesProducto();
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
    public function actionReportesDian(){
        $conn=Yii::app()->db;
        $sql="SELECT
            cols.ordinal_position,cols.column_name,
            (
                SELECT
                    pg_catalog.col_description(c.oid, cols.ordinal_position::int)
                FROM pg_catalog.pg_class c
                WHERE
                    c.oid     = (SELECT cols.table_name::regclass::oid) AND
                    c.relname = cols.table_name
            ) as column_comment
        FROM information_schema.columns cols
        WHERE cols.table_name    = 'importacion_dian'";
        $query=$conn->createCommand($sql);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        $this->render('reportes-dian',array("columnname"=>$res));
    }
    public function actionReportesAdmon(){
        $conn=Yii::app()->db;
        $sql="select distinct(mes_afiliacion),nombre_mes from afiliacion as af left join mes as m on m.id_mes=af.mes_afiliacion order by mes_afiliacion asc;";
        $query=$conn->createCommand($sql);
        $read=$query->query();
        $resMes=$read->readAll();
        $read->close();
        
        $sql="select distinct(anio_afiliacion) from afiliacion order by anio_afiliacion asc;";
        $query=$conn->createCommand($sql);
        $read=$query->query();
        $resAnio=$read->readAll();
        $read->close();
        $this->render('reportes-admon',array("mes"=>$resMes,"anio"=>$resAnio));
    }
    
    public function actionReportesAfiliacion(){
        $conn=Yii::app()->db;
        $sql="select distinct(anio_afiliacion) from afiliacion order by anio_afiliacion asc";
        $query=$conn->createCommand($sql);
        $read=$query->query();
        $resAnio=$read->readAll();
        $read->close();
        $sql="select * from mes";
        $query=$conn->createCommand($sql);
        $read=$query->query();
        $resMes=$read->readAll();
        $read->close();
        $this->render("reportes-afiliacion",array("anio"=>$resAnio,"mes"=>$resMes));
    }
    public function actionReportesProcedimiento(){
        $this->render("reportes-procedimiento");
    }
    public function actionReportesProducto(){
        if(!empty($_POST)){
            
        }
        else{
            $modelMarca= Marca::model()->findAll();
            $modelProveedor= Proveedor::model()->findAll();
            $modelMunicipio= Municipio::model()->findAll();
            $modelDepartamento= Departamento::model()->findAll();
            $modelOferente= Oferente::model()->findAll();
            $this->render("reportes-producto",array(
                "modelMarca"=>$modelMarca,
                "modelProveedor"=>$modelProveedor,
                "modelMunicipio"=>$modelMunicipio,
                "modelDepartamento"=>$modelDepartamento,
                "modelOferente"=>$modelOferente,
            ));
        }
    }
    public function actionReportesCapInstalada(){
        $this->render("reportes-capinstalada");
    }
    public function actionSearchCapInst(){
        ini_set('memory_limit', '-1');
        $dataPivot=Yii::app()->request->getPost("Report");
//        print_r($dataPivot);
        $conn=Yii::app()->db;
        $sql='select *  from view_capinstalada';
        $query=$conn->createCommand($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        unset($query);
        unset($read);
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
    }
    public function actionReportesServicios(){
        $this->render("reportes-servicios");
    }
    public function actionSearchServ(){
        ini_set('memory_limit', '-1');
        $dataPivot=Yii::app()->request->getPost("Report");
//        print_r($dataPivot);
        $conn=Yii::app()->db;
        $sql='select *  from view_servicio';
        $query=$conn->createCommand($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        unset($query);
        unset($read);
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
    }
    public function actionSearchForPivotAfl(){
        ini_set('memory_limit', '-1');
        $dataPivot=Yii::app()->request->getPost("Report");
//        print_r($dataPivot);
        $conn=Yii::app()->db;
        $sql='select * from view_afiliacion';
        $query=$conn->createCommand($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        unset($query);
        unset($read);
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
    }
    public function actionSearchForPivotProc(){
        ini_set('memory_limit', '-1');
        $dataPivot=Yii::app()->request->getPost("Report");
//        print_r($dataPivot);
        $conn=Yii::app()->db;
        $sql='select * from view_procedimiento;';
        $query=$conn->createCommand($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        unset($query);
        unset($read);
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
    }
    public function actionSearchProdPivot(){
        ini_set('memory_limit', '-1');
        $dataPivot=Yii::app()->request->getPost("Report");
//        print_r($dataPivot);
        $conn=Yii::app()->db;
        $sql='select * from search_infoprod;';
        $query=$conn->createCommand($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        unset($query);
        unset($read);
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
    }
    
    public function actionSearchForPivot(){
        $dataPivot=Yii::app()->request->getPost("Report");
        $conn=Yii::app()->db;
        if (in_array("id_oferente",$dataPivot["columns"])){
            $clave=array_search("id_oferente",$dataPivot["columns"]);
            unset($dataPivot["columns"][$clave]);//="of.id_oferente";
        };
        if (in_array("mes_dian",$dataPivot["columns"])){
            $clave=array_search("mes_dian",$dataPivot["columns"]);
            $dataPivot["columns"][$clave]="m.nombre_mes ";//="of.id_oferente";
        };
//        print_r($dataPivot["columns"]);exit();
        $columnsPivot=pg_escape_string(implode(",",$dataPivot["columns"]));
        $sql= "select ".$columnsPivot." from oferente as of left join importacion_dian as id on id.id_oferente=of.id_oferente"
                . " left join mes as m on m.id_mes=id.mes_dian "
                . "where id.id_importaciondian is not null";
       
        if(!empty($dataPivot["desc-producto"])){
            $descProducto= explode("||", $dataPivot["desc-producto"]);
            $searchItem=trim(mb_strtoupper($descProducto[0]));
            $sql.=" and ((c91 LIKE :param1)
                or (c91 LIKE :param2)
                or (c91 LIKE :param3)
                or (c91 LIKE :param4)) order by m.id_mes asc; ";
            $query=$conn->createCommand($sql);
            $param1='%%'.$searchItem.'%%';
            $param2='%%'.$searchItem;
            $param3=$searchItem.'%%';
            $query->bindParam(':param1',$param1,PDO::PARAM_STR);
            $query->bindParam(':param2',$param2,PDO::PARAM_STR);
            $query->bindParam(':param3',$param3,PDO::PARAM_STR);
            $query->bindParam(':param4',$searchItem,PDO::PARAM_STR);
        }
        else{
            $sql.=" order by m.id_mes asc; ";
            $query=$conn->createCommand($sql);
        }
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        $resJson=json_encode($res);
        foreach($dataPivot["columns"] as $col){
            $colComment=$this->columnComment($col);
             $resJson = str_replace('"'.$col.'":', '"'.$colComment["column_comment"].'":', $resJson);
        }
        $resJson = str_replace('"nombre_mes":', '"MES IMPORTACIÓN":', $resJson);
        $res=json_decode($resJson);
        $response["data"]=$res;
        $response["status"]="success";
//        print_r($response["data"]);
        echo CJSON::encode($response);
    }
    public function columnComment($columnName){
        $conn=Yii::app()->db;
         $sqlCC="SELECT 
            (
                SELECT
                    pg_catalog.col_description(c.oid, cols.ordinal_position::int)
                FROM pg_catalog.pg_class c
                WHERE
                    c.oid     = (SELECT cols.table_name::regclass::oid) AND
                    c.relname = cols.table_name
            ) as column_comment
        FROM information_schema.columns cols
        WHERE cols.table_name    = 'importacion_dian' and cols.column_name='".$columnName."'";
        $queryCC=$conn->createCommand($sqlCC);
        $readCC=$queryCC->query();
        $colCC=$readCC->read();
        $readCC->close();
        return $colCC;
    }
     public function actionSearchForPivotAdmon(){
        $dataSearch=Yii::app()->request->getPost("Report");
        $conn=Yii::app()->db;
        $sql="select 
            nombre_admin as administradora,nombre_departamento as departamento,nombre_municipio as municipio,
            anio_afiliacion as \"año afiliacion\",nombre_mes as \"mes afiliacion\",
            regimen_administrador as regimen,nombre_genero as genero, tipo_afiliado,tipo_poblacion, total_poblacion
             from administrador as ad 
            left join municipio as mn on mn.id_municipio=ad.id_municipio
            left join departamento as dpto on dpto.id_departamento=mn.id_departamento
            left join afiliacion as af on af.id_admin=ad.id_admin
            left join mes as m on m.id_mes=af.mes_afiliacion
            left join regimen_administrador as ra on ra.id_regimenadmon=af.id_regimenadmon
            left join genero as gn on gn.id_genero=af.id_genero
            left join tipo_afiliado as ta on ta.id_tipoafiliado=af.id_tipoafiliado
            left join tipo_poblacion as tp on tp.id_tipopoblacion=af.id_tipopoblacion where mn.id_municipio is not null ";
        if(!empty($dataSearch["anio"])){
            $sql.=" and anio_afiliacion=:anio";
        }
        if(!empty($dataSearch["mes"])){
            if(count($dataSearch["mes"])==1){
                $sql.=" and mes_afiliacion=:mes";
            }
            elseif(count($dataSearch["mes"])>1){
                $sql.=" and mes_afiliacion >= :mesi and mes_afiliacion <=:mesii ";
            }
        }
        $query=$conn->createCommand($sql);
        if(!empty($dataSearch["anio"])){
            $query->bindParam(':anio',$dataSearch["anio"]);
        }
        if(!empty($dataSearch["mes"])){
            if(count($dataSearch["mes"])==1){
                $query->bindParam(':mes',$dataSearch["mes"][0]);
            }
            elseif(count($dataSearch["mes"])>1){
                $query->bindParam(':mesi',$dataSearch["mes"][0]);
                $query->bindParam(':mesii',$dataSearch["mes"][count($dataSearch["mes"])-1]);
                $sql.=" and mes_afiliacion >= ".$dataSearch["mes"][0]." and mes_afiliacion <= ".$dataSearch["mes"][count($dataSearch["mes"])-1];
            }
        }
        $read=$query->query();
        $res=$read->readAll();
        $read->close();
        $response["data"]=$res;
        $response["status"]="success";
        echo CJSON::encode($response);
     }
    public function actionGetReport(){
        $conn=Yii::app()->db;
        $data=Yii::app()->request->getPost("Report");
        $columns="";
        $sql="select pr.nombre_producto,mr.nombre_marca,ml.nombre_modelo,rf.nombre_referencia,td.nombre_tecnica as tecnica_diagnostico,fb.nombre_fabricante,id.c132 as numero_aceptacion_tributaria,ofr.razon_social_oferente,mn.nombre_municipio,dp.nombre_departamento from producto as pr "
            ."left join marca as mr on pr.id_marca=mr.id_marca "
            ."left join modelo as ml on pr.id_modelo=ml.id_modelo "
            ."left join referencia as rf on pr.id_referencia=rf.id_referencia "
            ."left join tecnica_diagnostico as td on pr.id_tecnica=td.id_tecnica "
            ."left join fabricante as fb on pr.id_fabricante=fb.id_fabricante "
            ."left join importacion_dian as id on pr.id_importaciondian=id.id_importaciondian "
            ."left join oferente ofr on id.id_oferente=ofr.id_oferente "
            ."left join municipio as mn on ofr.id_municipio=mn.id_municipio "
            ."left join departamento as dp on mn.id_departamento=dp.id_departamento ";
        $cond=false;
        $sqlCond="";
        $andi=$andii=$andiii=$andiv=$andv=$andvi=$andvii=$andviii="";
        if(!empty($data)){
            $dataC=$data;
            foreach($data as $pk=>$dt){
                if(!empty($dt)){
                    if($pk=="marca"){ $sqlCond.=" mr.id_marca=:id_marca ";$andi=$dataC[$pk]=" AND "; }
                    if($pk=="modelo"){$sqlCond.=$andi." ml.id_modelo=:id_modelo ";$andii=$dataC[$pk]=" AND "; }
                    if($pk=="referencia"){if(array_search(" AND ", $dataC)){$andii=" AND ";} $sqlCond.=$andii." rf.id_referencia=:id_referencia ";$andiii=$dataC[$pk]=" AND "; }
                    if($pk=="tecnicadiag"){if(array_search(" AND ", $dataC)){$andiii=" AND ";} $sqlCond.=$andiii." td.id_tecnica=:id_tecnica ";$andiv=$dataC[$pk]=" AND "; }
                    if($pk=="fabricante"){if(array_search(" AND ", $dataC)){$andiv=" AND ";} $sqlCond.=$andiv." fb.id_fabricante=:id_fabricante ";$andv=$dataC[$pk]=" AND "; }
                    if($pk=="oferente"){if(array_search(" AND ", $dataC)){$andv=" AND ";} $sqlCond.=$andv." ofr.id_oferente=:id_oferente ";$andvi=$dataC[$pk]=" AND "; }
                    if($pk=="municipio"){if(array_search(" AND ", $dataC)){$andvi=" AND ";} $sqlCond.=$andvi." mn.id_municipio=:id_municipio ";$andvii=$dataC[$pk]=" AND "; }
                    if($pk=="departamento"){if(array_search(" AND ", $dataC)){$andvii=" AND ";} $sqlCond.=$andvii." dp.id_departamento=:id_departamento ";$andvii=$dataC[$pk]=" AND ";}
                    if($pk=="nombre-producto"){if(array_search(" AND ", $dataC)){$andviii=" AND ";} $sqlCond.=$andviii." pr.nombre_producto=:nombreproducto ";}
                    $cond=true;
                }
            }
        }
        if($cond==true){
           $sql.=" where ".$sqlCond;
           
        }
        $query=$conn->createCommand($sql);
        if(!empty($data)){
            foreach($data as $pk=>$dt){
                if(!empty($dt)){
                    if($pk=="marca"){ $query->bindValue(":id_marca",$dt); }
                    if($pk=="modelo"){$query->bindValue(":id_modelo",$dt);}
                    if($pk=="referencia"){$query->bindValue(":id_referencia",$dt); }
                    if($pk=="tecnicadiag"){$query->bindValue(":id_tecnica",$dt);}
                    if($pk=="fabricante"){$query->bindValue(":id_fabricante",$dt); }
                    if($pk=="oferente"){$query->bindValue(":id_oferente",$dt); }
                    if($pk=="municipio"){$query->bindValue(":id_municipio",$dt); }
                    if($pk=="departamento"){$query->bindValue(":id_departamento",$dt);}
                    if($pk=="nombre-producto"){$query->bindValue(":nombreproducto",$dt);}
                }
            }
        }
        $read=$query->query();
        $res=$read->readAll();
//        $res[1]=$res[0];
        $read->close();
        $response["data"]=$res;
        $sqlCols="select column_name from information_schema.columns where table_name='search_infoprod';";
        $queryCols=$conn->createCommand($sqlCols);
        $readCols=$queryCols->query();
        $resCols=$readCols->readAll();
        $readCols->close();
        $response["columns"]=$resCols;
        $statColumns=array();
        if(!empty($res) && !empty($resCols)){
            foreach($resCols as $keyCol=>$valueCol){
                $statColumns[$valueCol["column_name"]]=array();
//                echo $valueCol["column_name"];
            }
//            $statColumns=array_fill_keys($resCols,"");
            foreach($res as $key=>$value){
                foreach($statColumns as $keyColumn=>$valueColumn){
                    $keyColumnSearch=array_search($value[$keyColumn], array_column($statColumns[$keyColumn],'label'));
                    if(is_int($keyColumnSearch)){
                        $statColumns[$keyColumn][$keyColumnSearch]['data']+=1;
                    }
                    else{
                        array_push($statColumns[$keyColumn],array('label'=>$value[$keyColumn],'data'=>1));
                    }
                }
            }
        }
        $response["statistics"]=$statColumns;
        echo CJSON::encode($response);
    }
    public function actionSearchProduct(){
        $stringSearch=Yii::app()->request->getPost("stringproducto");
        $json_arr=[];
        $display_json=[];
//        $model= Beca::model();
        $continents=$this->searchProductScript($stringSearch);//->searchCountryScript($_POST["stringtitulo"]);
        if(!empty($continents)){
            foreach($continents as $continent){
                $json_arr["id"] = $continent["id_producto"];
                $json_arr["value"] = $continent["nombre_producto"];
                $json_arr["label"] = $continent["nombre_producto"];
                array_push($display_json, $json_arr);
            }
        }
        else{
            $json_arr["id"] = "#";
            $json_arr["value"] = "No hay resultados";
            $json_arr["label"] = "No hay resultados";
            array_push($display_json, $json_arr);
        }
        echo CJSON::encode($display_json);
    }
    public function searchProductScript($product){
        $conect= Yii::app()->db;
        $searchItem=  strtoupper($product);
        $sql="SELECT * FROM producto WHERE (nombre_producto LIKE :param1)
            or (nombre_producto LIKE :param2)
            or (nombre_producto LIKE :param3)
            or (nombre_producto LIKE :param4) order by nombre_producto asc limit 10";
        $query=$conect->createCommand($sql);
        $param1='%%'.$product.'%%';
        $param2='%%'.$product;
        $param3=$product.'%%';
        $query->bindParam(':param1',$param1,PDO::PARAM_STR);
        $query->bindParam(':param2',$param2,PDO::PARAM_STR);
        $query->bindParam(':param3',$param3,PDO::PARAM_STR);
        $query->bindParam(':param4',$product,PDO::PARAM_STR);
        $read=$query->query();
        $result=$read->readAll();
        $read->close();			
        return $result;
    }
    public function actionSearchDian(){
        $stringSearch=Yii::app()->request->getPost("stringsearch");
        $json_arr=[];
        $display_json=[];
//        $model= Beca::model();
        $getResp=$this->searchDianScript(mb_strtoupper($stringSearch));//->searchCountryScript($_POST["stringtitulo"]);
        if(!empty($getResp)){
            foreach($getResp as $resp){
                $json_arr["id"] = $resp["id_importaciondian"];
                $json_arr["value"] =$stringSearch."||".$resp["c91"];
                $json_arr["label"] = $resp["c91"];
                array_push($display_json, $json_arr);
            }
        }
        else{
            $json_arr["id"] = "#";
            $json_arr["value"] = "No hay resultados";
            $json_arr["label"] = "No hay resultados";
            array_push($display_json, $json_arr);
        }
        echo CJSON::encode($display_json);
    }
    public function searchDianScript($desc){
        $conect= Yii::app()->db;
        $searchItem=  strtoupper($desc);
        $sql="SELECT id_importaciondian,c91 FROM importacion_dian WHERE (c91 LIKE :param1)
            or (c91 LIKE :param2)
            or (c91 LIKE :param3)
            or (c91 LIKE :param4) order by c91 asc limit 10";
        $query=$conect->createCommand($sql);
        $param1='%%'.$desc.'%%';
        $param2='%%'.$desc;
        $param3=$desc.'%%';
        $query->bindParam(':param1',$param1,PDO::PARAM_STR);
        $query->bindParam(':param2',$param2,PDO::PARAM_STR);
        $query->bindParam(':param3',$param3,PDO::PARAM_STR);
        $query->bindParam(':param4',$desc,PDO::PARAM_STR);
        $read=$query->query();
        $result=$read->readAll();
        $read->close();			
        return $result;
    }
}