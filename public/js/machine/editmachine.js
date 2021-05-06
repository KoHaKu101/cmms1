$(document).ready(function() {
$('.pmlistdetail').addClass('hide');
  unidpmtemplate = $('#count').val();
//รายละเอียด
  $(".detail").each(function(){
    $(this).click(function(){
      id = $(this).attr('id');
      console.log(unidpmtemplate);
      $('.pmlistdetail').addClass('hide');
      $("#"+id+"-1").removeClass("hide");
;
      return false;
    });
  });

// เซฟวันที่และแสดงผล
$(document).on('change','.changedate',function(){

  var unid = $(this).data('dataunidpmlist');
  var lastdate = $('#PM_LAST_DATE_'+unid).val();
  var rank = $('#MACHINE_RANK_MONTH').val();
  if (rank) {
    var nextdate = moment(lastdate).add(rank,'M').format("DD/MM/YYYY");
    $('#PM_NEXT_DATE_'+unid).val(nextdate);
  }else {
    Swal.fire({
        title: 'กรุณาระบุ Rank',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        timer: 2000,
    });
  }
  });
$(document).on('click','#savedate',function(event){
  event.preventDefault();
  var pmmaster_template_unid         = $('.changedate').data('dataunidpmlist');
  var pmmaster_template_lastdate     = $('#PM_LAST_DATE_'+pmmaster_template_unid).val();
  var machine_rank_month                   = $('#MACHINE_RANK_MONTH').val();
  var machine_unid                   = $('#MACHINE_UNID').val();
  if (machine_rank_month) {
  $.ajax({
    type:'POST',
    url: '/machine/system/check/storedate',
    datatype: 'json',
    data: {
      "_token": "{{ csrf_token() }}",
      "machine_unid"                : machine_unid,
      "pmmaster_template_unid"      : pmmaster_template_unid,
      "pmmaster_template_lastdate"  : pmmaster_template_lastdate,
      "machine_rank_month"          : machine_rank_month,
    } ,
    success:function(data){
      Swal.fire({
          title: 'บันทึกระยะเวลาสำเร็จ',
          icon: 'success',
          confirmButtonColor: '#3085d6',
          timer: 2000,
      });
    }
  });
  }else {
    Swal.fire({
        title: 'กรุณาระบุ Rank',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
    });
  }
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
          var pmmaster_template_unid = [];
          $('#MACHINE_UNID').each(function(){
              var machineunid = $(this).val();
              $('#PM_TEMPLATE_UNID_REF:checked').each(function(){
                  pmmaster_template_unid.push($(this).val());
                  window.location.href = '/machine/system/remove/'+pmmaster_template_unid+'/'+machineunid;
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
