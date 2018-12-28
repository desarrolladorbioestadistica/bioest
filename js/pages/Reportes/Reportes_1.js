
var Reportes = function(){
    
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
    var Reportes = function() {
        self.div=$("#divReportProduct");
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
        self.options = {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: false,
                        radius: 0.1,
                        threshold: 0.1
                        //formatter: "labelFormatter"
                    }
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                cssClass: "flotTip",
                content: "%p.0%, %s",
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        };
        self.div.find("#nombre-producto").on("keydown",function(e){
             if(e.which==8){
//                self.div.find("#nombre-producto").val("");
                localStorage.setItem("saveContinent", 0);
             }
        });
        
        self.div.find("#consultar-reporte").on("click",function(){
//            console.log(self.div.find("#formReport").serialize());
            $('#dataProd thead tr').html("");
            $('#dataProd tfoot tr').html("");
            if (self.dataTable instanceof $.fn.dataTable.Api) {
                self.dataTable.clear();
                self.dataTable.destroy();
            }
            self.getReport(self.div.find("#formReport").serialize());
        });
    };    
    /**************************************************************************/
    /********************************** METHODS *******************************/
    /**************************************************************************/
         
   
    /**************************************************************************/
    /******************************* DOM METHODS ******************************/
    /**************************************************************************/
    self.getReport=function(dataFormReport){
        //User.showLoading();
        $('#dataGeneral thead tr').html("");
        $('#dataGeneral tfoot tr').html("");
        $.ajax({
            type: "POST",
            dataType:'json',
            url: 'getReport',
            data:dataFormReport,
            async:true,
        }).done(function(response) {
//            console.log(response.data);
            
            $('#dataProd thead tr').html("");
            $('#dataProd tfoot tr').html("");
            $.each(response.columns,function(key,value){
                $('#dataProd thead tr').append('<td>'+value.column_name+'</td>');
                $('#dataProd tfoot tr').append('<td>'+value.column_name+'</td>');
            });
            $.each(response.data,function(key,value){
                $("#dataProd tbody").append("\
                <tr>\
                    <td>"+value.nombre_producto+"</td>\
                    <td>"+value.nombre_marca+"</td>\
                    <td>"+value.nombre_modelo+"</td>\
                    <td>"+value.nombre_referencia+"</td>\
                    <td>"+value.tecnica_diagnostico+"</td>\
                    <td>"+value.nombre_fabricante+"</td>\
                    <td>"+value.numero_aceptacion_tributaria+"</td>\
                    <td>"+value.razon_social_oferente+"</td>\
                    <td>"+value.nombre_municipio+"</td>\
                    <td>"+value.nombre_departamento+"</td>\
                </tr>");
            });
            
               self.dataTable=$("#dataProd").DataTable({
                "destroy" : true,
                oLanguage: Bioest.getDatatableLang(),
                scrollX: true
            }); 
            
                
             self.div.find("#graphics").html("");
            $.each(response.statistics,function(key,value){
                self.div.find("#graphics").append('\n\
                    <div class="col-lg-3 col-md-3 co-sm-3 col-xs-12">\n\
                        <div class="card">\n\
                            <div class="header">\n\
                                '+key+'\n\
                            </div>\n\
                            <div class="body">\n\
                                <div id="'+key+'" class="flot"></div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
'               );
                $.plot($("#"+key), value, self.options);
            });
//            data=[response.statistics];
//            var data = [{
//                label: "Pause",
//                data: 150
//            }, {
//                label: "No Pause",
//                data: 100
//            }, {
//                label: "Sleeping",
//                data: 40
//            }];
//            self.div.find("#pie-oferente").css("display","block");
//            $.plot($("#pie-placeholder"), response.statistics, self.options);

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
    }
    self.filterProductToSearch=function(){
//        console.log("pasa");
        
            self.div.find("#nombre-producto").autocomplete({
                source: function(request, response){
                    $.ajax({
                        type: "POST",
                        url:"searchProduct",
                        data: {stringproduct:self.div.find("#nombre-producto").val()},
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
                    if(ui.item.id=="#"){
                        self.div.find("#nombre-producto").val("");
                    }
                    else{
                        self.div.find("#nombre-producto").val(ui.item.value);
                    }
                    $(".ui-helper-hidden-accessible").hide();
                },
                html: true,
                open: function(event, ui) {
                    $(".ui-autocomplete").css("z-index", 1000);
                }
            });
    };

    /**************************************************************************/
    /****************************** OTHER METHODS *****************************/
    /**************************************************************************/
} 
$(document).ready(function() {
    window.Reportes=new Reportes();
    Reportes.filterProductToSearch();
});