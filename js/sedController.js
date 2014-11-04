function getQuestions(i){

 var form ='<br> <label id="idDocente'+i+'">'+
    'jose vicnete'+
    '</label>'+
    '<select id="idRespuesta'+i+'" name="Metodologia[1]">'+
    '<option>1</option>'+
    '<option>2</option>'+
    '<option>3</option>'+
    '<option>4</option>'+
    '<option>5</option>'+
    '</select>'+
    '<p align="left">OBSERVACIONES: </p>'+
    '<textarea id="idObservacion'+i+'" name="Observaciones_Metodologia[1]"></textarea> <br>';

    return form;

}
function getCampos(i,NombreDocente){
    var form=
            '<br> <label id="idDocente'+i+'">'+
             NombreDocente+
            '<input type="hidden" name="NombreDocente['+i+']" value="'+NombreDocente+'"/>'+
            '</label>'+
            '<p>'+
            '<input  type = "checkbox"  name = "nota['+i+']"  value = "excelente" /> '+'excelente'+
            '<input  type = "checkbox"  name = "nota['+i+']"  value = "bueno" /> '+'bueno'+
            '<input  type = "checkbox"  name = "nota['+i+']"  value = "regular" /> '+'regular'+
            '<input  type = "checkbox"  name = "nota['+i+']"  value = "malo" /> '+'malo'+
            '</p>'+'<br>';
    return form;            
}

function TotalQuestions( ){
    $.ajax({
        
        url:   'backend/backend.php',
        type:  'post',
        data: {functioncase: 'totalquestions'},

        success:  function (data,textStatus) {

                    var obj =jQuery.parseJSON(data);
                    console.log(data);
                    if (obj.error!=null) {
                      alert(obj.error);
                    }else{
                        for (var i = 0; i < obj.result; i++){
                            console.log(obj.NombreDocente[i]);
                            
                            $( "#container" ).append(getCampos(i,obj.NombreDocente[i]));
                          
                            };
                            $( "#container" ).append('<input id="send"type="submit" value="ENVIAR"/>');

                    }
                    
                
            },

        error: function(e) {
            console.log(e.message);
         return null;
        }


    });

}









