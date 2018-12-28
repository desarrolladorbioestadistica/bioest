/**
 * procData v.1.0.0
 * Pseudo-Class to manage all the Actividad process
 * @changelog
 *      - 1.6.2: Se reduce la cantidad de consultas para el barrio
 *      - 1.6.1: Función lambda para retornar la dirección
 *      - 1.6.0: Se agrega notificaciones y búsqueda de barrios
 *      - 1.5.1: Se agrega la verificación de si un elemento existe
 * @param {object} params Object with the class parameters
 * @param {function} callback Function to return the results
 */
var ProcData = function(){
    
    /**************************************************************************/
    /******************************* ATTRIBUTES *******************************/
    /**************************************************************************/
    var self = this;
    self.arrayDevice=[];
    //DOM attributes
    /**************************************************************************/
    /********************* CONFIGURATION AND CONSTRUCTOR **********************/
    /**************************************************************************/
    //Mix the user parameters with the default parameters
    var def = {
        ajaxUrl:'../'
    };
   
    /**
     * Constructor Method 
     */
    var ProcData = function() {
        self.div=$("#divLoadData");
        self.divi=$("#divLoadDataP");
        self.divii=$("#divDisPr");
        setDefaults();
    }();
     
    /**************************************************************************/
    /****************************** SETUP METHODS *****************************/
    /**************************************************************************/
    /**
     * Set defaults for Actividad
     * @returns {undefined}
     */
    function setDefaults(){
        self.div.find("#load_files").validate({
            rules: {
                    group5: "required",
                    inputFile: {
                        required: true,
                        extension: "xls"
                    }
            },
            messages: {
                    group5: "seleccione nombre de archivo",
                    inputFile:{
                        required: "Seleccione un archivo",
                        extension: "Solo se permite archivos con extensión .xls"
                    }
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
        self.divi.find("#load_files").validate({
            rules: {
                    group5: "required",
                    inputFile: {
                        required: true,
                        extension: "xls"
                    }
            },
            messages: {
                    group5: "seleccione nombre de archivo",
                    inputFile:{
                        required: "Seleccione un archivo",
                        extension: "Solo se permite archivos con extensión .xls"
                    }
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
        self.divii.find("#load_files").validate({
            rules: {
                    inputFile: {
                        required: true,
                        extension: "xls|xlsx"
                    }
            },
            messages: {
                    inputFile:{
                        required: "Seleccione un archivo",
                        extension: "Solo se permite archivos con extensión .xls"
                    }
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
        self.div.find("#importar").on('click',function(){
            if(self.div.find("#load_files").valid()){
                self.loadSData();
            }
        });
        self.divi.find("#importar").on('click',function(){
            if(self.divi.find("#load_files").valid()){
                self.loadPData();
            }
        });
//        self.divii.find("#importar").on('click',function(){
//            if(self.divii.find("#load_files").valid()){
//                self.disData();
//            }
//        });
    };    
    /**************************************************************************/
    /********************************** METHODS *******************************/
    /**************************************************************************/
         
    

   
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/
    self.loadSData=function (){
        var msn="";
        var elementForm = document.getElementById("load_files");
        var form = new FormData(elementForm);
        var elementFile=document.getElementById("inputFile");
        var filename = elementFile.files[0].name.split(".");
        var filenameComp=filename[0];
        filenameComp=filenameComp.split("_")
        var nameFileId= self.div.find("input[name='group5']:checked").attr("id");
        nameFileId=nameFileId.replace("-"," ");
        var nameFileVal= self.div.find("input[name='group5']:checked").val();
        console.log(filenameComp[1]+"  "+nameFileId);
        if(filenameComp[1]!==nameFileId){
            $.notify({
                message: 'El archivo seleccionado y el nombre de archivo no coinciden, intente de nuevo' 
            }       
            ,{
                type: 'danger'
            });
            return;
        }
       
        //new Response(form).text().then(console.log);
//        return;
        $.ajax({
            type: "POST",
            dataType:'json',
            data:form,
            url: 'loadFileToDb',
            cache: false,
            contentType: false,
            processData: false,
            //async:false,
            beforeSend: function(){
                $.preloader.start({
                    modal: true,
                    src : 'sprites.png'
                });
            }
        }).done(function(response) {
            if(response.status=='nosession'){
                setTimeout(function(){document.location.href="site/login";}, 3000);
                return;
            }
            else{
                if(response.status=='success'){
                     type="info";
                     msn=response.msg;
                }
                else if(response.status=='nsuccess'){
                    type="warning";
                    msn="Hubo algunos registros que no cargaron, revise el archivo que se descarga"; 
//                    console.log(response.msg);
                    window.open(response.url,'_blank');
                }
                else if(response.status=='nosuccess'){
                    type="warning";
                    msn=response.msg; 
//                    console.log(response.msg);
                }
            }
            $.notify({
                message: msn
            }       
            ,{
                type: type
            });
        }).fail(function(xhr, status, error) {
//            msn=Object.values(error);
//            console.log(Object.values(error));
            type="danger";
            $.notify({
                message: xhr.responseText
            }       
            ,{
                type: type
            });
        }).always(function(){
            $.preloader.stop();
        });
         
    };
     self.loadPData=function (){
        var msn="";
        var elementForm = document.getElementById("load_files");
        var form = new FormData(elementForm);
        var elementImage=document.getElementById("inputFile");
        var filename = elementImage.files[0].name.split(".");
        var nameFile= self.divi.find("input[name='group5']:checked").val();
        console.log(filename[0]);
        if(filename[0]!==nameFile){
            $.notify({
                message: 'El archivo seleccionado y el nombre de archivo no coinciden, intente de nuevo' 
            }       
            ,{
                type: 'danger'
            });
            return;
        }
        //form.append( "filecsv", $(elementImage)[0].files[0]);
        //new Response(form).text().then(console.log);
        $.ajax({
            type: "POST",
            dataType:'json',
            data:form,
            url: 'loadFilePToDb',
            cache: false,
            contentType: false,
            processData: false,
            //async:false,
            beforeSend: function(){
                $.preloader.start({
                    modal: true,
                    src : 'sprites.png'
                });
            }
        }).done(function(response) {
            if(response.status=='nosession'){
                setTimeout(function(){document.location.href="site/login";}, 3000);
                return;
            }
            else{
                if(response.status=='success'){
                     type="info";
                     msn=response.msg;
                }
                else if(response.status=='nsuccess'){
                    type="danger";
                    msn=response.msg; 
                }
            }
            $.notify({
                message: msn
            }       
            ,{
                type: type
            });
        }).fail(function(error) {
            msn=Object.values(error);
            console.log(Object.values(error));
            type="error";
            $.notify({
                message: msn
            }       
            ,{
                type: type
            });
        }).always(function(){
            $.preloader.stop();
        });
        
    };   
        
}
    /**************************************************************************/
    /****************************** OTHER METHODS *****************************/
    /**************************************************************************/
    
$(document).ready(function() {
    window.ProcData=new ProcData();
});