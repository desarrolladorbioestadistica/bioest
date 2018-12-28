/**
 * Usuarios v.1.6.2
 * Pseudo-Class to manage all the Procedimientos
 * @changelog
 *      - 1.6.2: Se reduce la cantidad de consultas para el barrio
 *      - 1.6.1: Función lambda para retornar la dirección
 *      - 1.6.0: Se agrega notificaciones y búsqueda de barrios
 *      - 1.5.1: Se agrega la verificación de si un elemento existe
 * @param {object} params Object with the class parameters
 * @param {function} callback Function to return the results
 */
var SearchData = function(params,callback){
    
    /**************************************************************************/
    /******************************* ATTRIBUTES *******************************/
    /**************************************************************************/
    var self = this;
    self.dataTable="";
    
    //DOM attributes
    /**************************************************************************/
    /********************* CONFIGURATION AND CONSTRUCTOR **********************/
    /**************************************************************************/
    //Mix the user parameters with the default parameters
    var def = {
        ajaxUrl:'../'
    };
    var dataTableProcedimiento;
    
    
    /**
     * Constructor Method 
     */
    var SearchData = function() {
        self.div=$("#divSearchTables");
        setDefaults();
    }();
     
    /**************************************************************************/
    /****************************** SETUP METHODS *****************************/
    /**************************************************************************/
    /**
     * Set defaults for Usuarios
     * @returns {undefined}
     */
    function setDefaults(){
        self.div.find("#searchPTables").validate({
            rules: {
                "columnsptables": "required",
            },
            messages: {
                "columnsptables": "Debe seleccionar una tabla",
            },
            errorPlacement: function(error, element){
                if ( element.is(":radio") ){
                    error.appendTo( element.parents('.demo-radio-button') );
                }
                else{ // This is the default behavior 
                    error.insertAfter( element );
                }
            }
        });
        self.div.find("#consultar-primtab").on("click",function(){
            if(self.div.find("#searchPTables").valid()){
                $('#dataGeneral thead tr').html("");
                $('#dataGeneral tfoot tr').html("");
                nameTable=$("#searchPTables #columnsdd").val();
                if (self.dataTable instanceof $.fn.dataTable.Api) {
                    self.dataTable.clear();
                    self.dataTable.destroy();
                }
                self.loadTable(self.div.find("#searchPTables").serialize(),nameTable,"ptables");
            }
        });
        self.div.find("#consultar-secontab").on("click",function(){
            if(self.div.find("#searchSTables").valid()){
                $('#dataGeneral thead tr').html("");
                $('#dataGeneral tfoot tr').html("");
                nameTable=$("#searchSTables #columnsdd").val();
                if (self.dataTable instanceof $.fn.dataTable.Api) {
                    self.dataTable.clear();
                    self.dataTable.destroy();
                }
                self.loadTable(self.div.find("#searchSTables").serialize(),nameTable,"ptables");
            }
        });
        
        /*
         * inicializa el datatable
         */
//         $("#dataGeneral").DataTable({
//            "bProcessing": true,
//            "serverSide": true,
//            fixedHeader: {
//                header: true,
//                footer: true
//            },
//            "ajax":{
//                url :"searchProcedimientoDataTable", // json datasource
//                type: "post",  // type of method  ,GET/POST/DELETE
//                error: function(xhr, error, thrown){
//                    console.log(xhr.responseText);
//                }
//            },
//            oLanguage: Bioest.getDatatableLang(),
//            scrollX: true
//        }); 
       
    };    
    /**************************************************************************/
    /********************************** METHODS *******************************/
    /**************************************************************************/
   
   
    /**************************************************************************/
    /******************************* SYNC METHODS *****************************/
    /**************************************************************************/    
        
    self.buscaUsuario=function(){
        dataTableProcedimiento=self.div.find("#dataTableProcedimiento").DataTable({
            "bProcessing": true,
            "serverSide": true,
            "ajax":{
                url :"searchProcedimientoDataTable", // json datasource
                type: "post",  // type of method  ,GET/POST/DELETE
                error: function(){
                    console.debug("error");
                }
            },
             "dom": 'lBfrtip',
             "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            oLanguage: Bioest.getDatatableLang(),
            scrollX: true
        }); 
    }
    
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/
     
    /**
     * Consume webservice de consulta de usuarios y 
     * devuelve un objeto json con todas ellas
     */
    self.loadTable=function(formSerialized,nameTable,typeTable){
        $('#dataGeneral thead tr').html("");
        $('#dataGeneral tfoot tr').html("");
        $.ajax({
            type: "POST",
            dataType:'json',
            url: 'searchColumns',
            data:formSerialized,
            async:true,
        }).done(function(response) {
//            console.log(response);
            $.each(response,function(key,value){
                $('#dataGeneral thead tr').append('<td>'+value.column_name+'</td>');
                $('#dataGeneral tfoot tr').append('<td>'+value.column_name+'</td>');
            });
            self.dataTable=$("#dataGeneral").DataTable({
                "bProcessing": true,
                "serverSide": true,
                dom: 'lBfrtip',
                buttons: [
                   'copyHtml5',
                   'excelHtml5',
                   'csvHtml5',
                   'pdfHtml5'
               ],
               lengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ],
                fixedHeader: {
                    header: true,
                    footer: true
                },
                "ajax":{
                    url :"searchInfoPTables", // json datasource
                    type: "post",  // type of method  ,GET/POST/DELETE
                    data:{"table":nameTable,"typetable":typeTable},
                    error: function(xhr, error, thrown){
                        console.log(xhr.responseText);
                    }
                },
                "destroy" : true,
                oLanguage: Bioest.getDatatableLang(),
                scrollX: true
            }); 
        }).fail(function(error) {
            if(error.status===403){
//                Usuarios.alertUsuarios("Su sesión ha terminado, por favor ingrese de nuevo.");
//                window.location=User.ajaxUrl;
            }else{
//                if(callback)callback(error);
            }
        }).always(function(){
            //User.hideLoading();
        });
    };
    
    
    /**
     * Consume webservice de consulta local de noticias y 
     * devuelve un objeto json con todas ellas 
     */
    self.buscaUsuariosLocal=function(){
        data=[{"id_user":"296","username":"julian1","pswd":"009d9f1d34cbb1ae66e77fbd114143a85967b77748d68286eaec2cf0d64f1ca1","id_facebook":null,"id_twitter":null,"id_google":null,"numero_documento":"97102414890","email":"montoyacaicedo@gmail.com","id_universidades":"2905","profesion":"ESPECIALIZACION DE CONDUCCION Y ADMINISTRACION DE UNIDADES MILITARES","nacimiento":"8\/30\/2016,","empresa":"","descripcion":null,"puntos":"0","imagen_url":"https:\/\/comunidad.icetex.gov.co\/api\/webservice\/uploads\/Zaz sur scene.jpg","genero":"1","id_tipoDocumento":"1","nombres":"Julian","apellidos":"Montoya","id_rol":null,"geo_posicion":null,"direccion":"","id_convenios":null,"email_solidario":"lozano.cardona@gmail.com","confirmacion":"confirmado","activo":"1","create_ad":"2016-09-13 09:34:15","personal_data_treatment":"1","nombre":"TARJETA DE IDENTIDAD"}];
        self.arrayUsuarios=data;
        $.each(data,function(key,value){
            self.div.find("#dataTableUsuarios tbody").append("\
            <tr>\
                <td><img src="+value.imagen_url+" height='42' width='80'> </td>\
                <td>"+value.nombres+"</td>\
                <td>"+value.apellidos+"</td>\
                <td>"+value.numero_documento+"</td>\
                <td>"+value.nombre+"</td>\
                <td>"+value.email+"</td>\
                <td>"+value.profesion+"</td>\
                <td>"+value.nacimiento+"</td>\
                <td>"+value.activo+"</td>\
                <td><a href='javascript:Usuarios.cargaUsuarioAForm("+value.id_user+");'>Editar</a></td>\
            </tr>");
        });
        self.div.find("#dataTableUsuarios").DataTable({
            oLanguage: IcetexApp.getDatatableLang(),
            scrollX: true,
            scrollY: 400
        });
    };
    
   
    /**************************************************************************/
    /****************************** OTHER METHODS *****************************/
    /**************************************************************************/
   
};
$(document).ready(function() {
    window.SearchData=new SearchData();
    //SearchData.buscaUsuarios();
});