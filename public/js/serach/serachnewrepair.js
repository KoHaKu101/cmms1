$(document).ready(function(){
$('#search').on('keyup',function(){
 var code =$(this).val();
 if(code.length>=3){
   $.ajax({
   url : '/machine/repair/search',
   data:{
     machine_code:code
   },
   dataType:'json',
   beforeSend:function(){
     $("#data").html('<tr><td> Loading ........... </td></tr>')
   },
   success:function(res){
   console.log(res);
    var _html='';

    $.each(res.dataset,function(prepairsearch,dataset){

        _html+='<div class="col-md-6 col-lg-3" >'+
        '<div class="card card-post card-round">'+
        '<div class="card-header bg-primary text-white">'+
        '<center><h4 class="mt-1"><b> '+dataset.MACHINE_CODE+' </b></h4></center>'+
        '</div>'+
        '<div class="card-body">'+
        '<span>Machine Name : '+dataset.MACHINE_NAME+'</span><br/>'+
        '<span class="mt-3"> Line : '+dataset.MACHINE_LINE+'</span><br/>'+
        '<a href="form/'+dataset.MACHINE_CODE+'" class="btn btn-success btn-sm btn-block my-1">'+
        '<span style="font-size:13px">'+
        ' <i class="fas fa-hand-pointer fa-lg mx-2"></i>เลือกรายการ'+
        '  </span>'+
        '</a>'+
        // '<input type="hidden" value="'+data.MACHINE_CODE+'">'+
        '</div>'+
        '</div>'+
        '</div>';
    });
    $("#data").html(_html);
   }

   });
 }else {
   $("#data").html('ไม่พบข้อมูล ');
   return false;
 }
console.log(code);
});
});
