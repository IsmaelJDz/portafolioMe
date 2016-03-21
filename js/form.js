$(function(){
  $('#frm_contacto .submit').on('click', function(event) {
    event.preventDefault();
      enviar();
  });
});


function validar(){
  i=1;
  $("#frm_contacto :input").each(function(index, item){
    //console.log(item.type+ " " + item.value.length );
    if($(item).val().length==0 &&  item.type != "submit"){
      i=0;
      return false;
    }
    //console.log(i); 
  }); 
  return i;
  
}

function errors(){
    $("#frm_contacto :input").each(function(index, el) {
        if ($(el).val().length == 0)
            {
                $(el).css('border', '1px solid red');
                setTimeout(function(){ $('.error').fadeOut(2000) }, 2000);
            }
            else
            {
                $(el).css('border', '1px solid #65C765');
            }       
    });
}

function enviar(){
  if(validar()==1){
    $.post("scripts/enviar.php",$("#frm_contacto").serialize(),function(){
      //alert("Tus datos se han enviado correctamente en breve nos prondremos en contacto contigo, gracias !");
      $('.error').css('display', 'none');
      $('.ok').css('display', 'block');
      setTimeout(function(){ $('.ok').fadeOut(3000) }, 3000);
      resetfrm();
      $("#frm_contacto :input").css('border', '1px solid #ddd');
    });
  }else{
    errors();
    $('.error').css('display', 'block',function(){
        $('.error').show( 'slow' );
    });
    //alert("Todos los campos son obligatorios");
  } 
}
function resetfrm(){
    $("#frm_contacto :input").each(function(index, item){
      if(item.type!="submit")
        $(item).val("");
    });
}