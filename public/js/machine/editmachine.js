$(document).ready(function() {
$('.pmlistdetail').addClass('hide');
  unidpmtemplate = $('#count').val();
//รายละเอียด
  $(".detail").each(function(){

    $(this).click(function(){
      id = $(this).attr('id');

      console.log(unidpmtemplate);
      // $('.pmlistdetailshow').addClass('hide');
      $('.pmlistdetail').addClass('hide');
      $("#"+id+"-1").removeClass("hide");
;
      return false;
    });
  });





// เซฟวันที่และแสดงผล
$(document).on('change','.changedate',function(){
  var parentObjmain = $(this).closest('#datadate');
  var unid = parentObjmain.find('#PM_LAST_DATE').attr('rel');
  var date = parentObjmain.find('#PM_LAST_DATE').val();
  var rank = $('#MACHINE_RANK_MONTH').val();
  var month = moment(date);
  var nextdate = month.add(rank,'M').format("DD/MM/YYYY");
  parentObjmain.find('#PM_NEXT_DATE').val(nextdate);
  $('#PM_LAST_DATE').val(date);
  });
$(document).on('click','#savedate',function(event){
  event.preventDefault();
  var parentObj = $(this).closest('#datadate');
  var unid = parentObj.find('#PM_LAST_DATE').attr('rel');
  var date = parentObj.find('#PM_LAST_DATE').val();
  var rank = $('#MACHINE_RANK_MONTH').val();

  $.ajax({
    type:'POST',
    url: '/machine/system/check/storedate',
    datatype: 'json',
    data: {
      "_token": "{{ csrf_token() }}",
      "unid" : unid,
      "date" : date,
      "rank" : rank,
    } ,
    success:function(data){
    }
  });
});
//ยืนยันการลบ PM Template
$(document).on('click','.delete-confirm', function (event) {
      Swal.fire({
          title: 'คุณต้องการลบข้อมูลหรือไม่?',
          text: 'หากลบข้อมูลแล้วจะไม่สามารถกู้คืนมาได้!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
      }).then(function(result) {
        if (result.isConfirmed) {
          var id = [];
          $('#MACHINE_CODE').each(function(){
              var mc = $(this).val();
              $('#PM_TEMPLATE_UNID_REF:checked').each(function(){
                  id.push($(this).val());
                  window.location.href = '/machine/system/remove/'+id+'/'+mc;
              });
          });
        }
      });
  });
// ปริ้นประวัติการซ่อม
function printhistory(u){
  var unid = (u);
  window.open('/machine/repairhistory/pdf/'+unid,'RepairHistory','width=1000,height=1000,resizable=yes,top=100,left=100,menubar=yes,toolbar=yes,scroll=yes');
}


//storetabe
  $(".tabselect").each(function(){
    $(this).click(function(){
      id = $(this).attr('id');
      url = window.location.href;
      localStorage.selectedTab = id;
      localStorage.url = url;
      $(".tabselect").removeClass("active show");
      $(this).addClass("active show");
      $('.tab-pane').removeClass("active");
      $("#"+id+"-1").addClass("active")
      return false;
    });
  });
  if (window.location.href == localStorage.url) {
    if (localStorage.selectedTab) {
      $('#tabLink').find("#"+(localStorage.selectedTab)+"").click();
      }
  }else {
    $("#home").addClass("active show");
    $("#home-1").addClass("active")
    }

});
