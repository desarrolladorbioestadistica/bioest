
var ReportesAf = function(){
    
    /**************************************************************************/
    /******************************* ATTRIBUTES *******************************/
    /**************************************************************************/
    var self = this;
    self.dataTable="";
    self.options=[];
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
    var ReportesAf = function() {
        self.div=$("#divReportAf");
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
        google.charts.load('current', {'packages':['corechart']});
        
        self.div.find("#consultar-reportes").on("click",function(e){
            self.searchForPivot();
        });
        
        self.div.find("#exportarexcel").on('click',function(){
            console.log(self.div.find(".pvtTable").html());
            Bioest.exportaExcel("pvtTable","Reportes")
        });
    };    
    /**************************************************************************/
    /********************************** METHODS *******************************/
    /**************************************************************************/
         
   
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/
    
    
    self.filterAflToSearch=function(){
            self.div.find("#desc-producto").autocomplete({
                source: function(request, response){
                    $.ajax({
                        type: "POST",
                        url:"searchAfl",
                        data: {stringsearch:self.div.find("#desc-producto").val()},
                        beforeSend:function (){
//                            self.div.find("#nombre-producto").val("");
                        },
                        success: response,
                        dataType: 'json',
                        minLength: 1,
                        delay: 100
                    });
                },
                minLength: 1,
                select: function(event, ui) {
//                    if(ui.item.id=="#"){
//                        self.div.find("#desc-producto").val("");
//                    }
//                    else{
//                        
                        self.div.find("#desc-producto").val("");
//                    }
                    $(".ui-helper-hidden-accessible").hide();
                },
                html: true,
                open: function(event, ui) {
                    $(".ui-autocomplete").css("z-index", 1000);
                }
            });
    };
    self.searchForPivot=function(columns){
        var form=self.div.find("#formReport").serialize();
        $.ajax({
            type: "POST",
            dataType:'json',
            data:form,
            url: 'searchForPivotAfl',
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
//                    console.log(response.data);
                    type="info";
                    msn=response.msg;
                    var derivers = $.pivotUtilities.derivers;
                    var renderers = $.extend($.pivotUtilities.renderers,$.pivotUtilities.c3_renderers);
                    $("#output").pivotUI(response.data, {
                        renderers: renderers,
                        rendererName: "Tabla",
                        rowOrder: "value_z_to_a", colOrder: "value_z_to_a",
                        rendererOptions: {
                            c3: { data: {colors: {
                                Liberal: '#dc3912', Conservative: '#3366cc', NDP: '#ff9900',
                                Green:'#109618', 'Bloc Quebecois': '#990099'
                            }}}
                        }
                    });
                }
                else if(response.status=='nsuccess'){
                    type="danger";
                    msn=response.msg; 
                }
            }
//            $.notify({
//                message: msn
//            }       
//            ,{
//                type: type
//            });
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
        
    }
    
    /**************************************************************************/
    /****************************** OTHER METHODS *****************************/
    /**************************************************************************/
} 
$(document).ready(function() {
    window.ReportesAf=new ReportesAf();
});