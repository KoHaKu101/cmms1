function subminform(){
  $("button[type='submit']").trigger("click");
}
function checkplansparepart(thisdata){
  var plan_unid = $(thisdata).data('planunid');
  var btn_status = $(thisdata).data('btn_status');
  var planusercheck = $(thisdata).data('planusercheck');
  var url = "/machine/spart/report/planmonth/form";
  var data = {PLAN_UNID : plan_unid,
              BTN_STATUS : btn_status};
  var titlename = $(thisdata).data('machine_code');
  var dateToday = new Date();
  $.ajax({
    type: "GET",
    url: url,
    data: data,
    success: function (data) {
      $( document ).ready(function() {
        $("#PLAN_CHANGE").datepicker({
            startDate: new Date()
        });
      });

      $('#BTN_CONFIRM').html(data.btn_confirm);
      $('#FOOTER').html(data.btn_status);
      $('#Title_plansparepartcheck').html('Machine Code : '+titlename);
      $('#USER_CHECK').val(planusercheck);
      $('.modal-planform').html(data.html);
      $('#modal-plansparepartcheck').modal('show');
    }
  });
}


function voidform(thisdata){
  var plan_unid = $(thisdata).data('planunid');
  var btn_status = $(thisdata).data('btn_status');
  var planusercheck = $(thisdata).data('planusercheck');
  var url = "/machine/spart/report/planmonth/form";
  var data = {PLAN_UNID : plan_unid,
              BTN_STATUS : btn_status};
  var titlename = $(thisdata).data('machine_code');
  Swal.fire({
  title: 'คุณต้องการ Void เอกสาร ?',
  showDenyButton: true,
  confirmButtonText: `OK`,
  denyButtonText: `CANCEL`,
}).then((result) => {
  if (result.isConfirmed) {

    $.ajax({
      type: "GET",
      url: url,
      data: data,
      success: function (data) {
        if (data.btn_status) {
          location.reload();
        }
      }
    });
  }
});
}
function viewform(thisdata){
  var plan_unid = $(thisdata).data('planunid');
  var btn_status = $(thisdata).data('btn_status');
  var planusercheck = $(thisdata).data('planusercheck');
  var url = "/machine/spart/report/planmonth/form";
  var data = {PLAN_UNID : plan_unid,
              BTN_STATUS : btn_status};
  var titlename = $(thisdata).data('machine_code');
  $.ajax({
    type: "GET",
    url: url,
    data: data,
    success: function (data) {

      $('#BTN_CONFIRM').html(data.btn_confirm);
      $('#FOOTER').html(data.btn_status);
      $('#Title_plansparepartcheck').html('Machine Code : '+titlename);
      $('#USER_CHECK').val(planusercheck);
      $('.modal-planform').html(data.html);
      $('#modal-plansparepartcheck').modal('show');
    }
  });
}
function saveform(end){
  var url = "/machine/spart/report/planmonth/save";
  var data = $('#FRM_CHECKSPAREPART').serialize();

  $.ajax({
    type: "GET",
    url: url,
    data: data,
    success: function (data) {
      if (data.res) {
      $('#modal-plansparepartcheck').modal('hide');
        Swal.fire({
            title: 'บันทึกข้อมูลสำเร็จ',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Confirm',
            timer: 3000
        }).then(() => {
          location.reload();
          });
      }else{
        Swal.fire({
            title: 'เกิดข้อผิลพลาด',
            text: ''+data.name+'',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Confirm',
            timer: 4000
        });
      }
    }
  });
}


function btnconfirm(){
  var changedate = $('#PLAN_CHANGE').val();
  var planunid   = $('#PLAN_UNID').val();

  Swal.fire({
  title: 'ยืนยันการเลื่อนแผน?',
  showCancelButton: true,
  confirmButtonText: 'ยืนยัน',
}).then((result) => {
  if (result.isConfirmed) {
    var url = '/machine/spart/reportplanmonth/change';
    var data = { CHANGE_DATE : changedate,
                  PLAN_UNID : planunid};
    $.ajax({
      type: "GET",
      url: url,
      data: data,
      success: function (data) {
        if (data.res) {
        $('#modal-plansparepartcheck').modal('hide');
          Swal.fire({
              title: 'เลื่อนแผนสำเร็จ',
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Confirm',
              timer: 3000
          }).then(() => {
            location.reload();
            });
        }else{
          Swal.fire({
              title: 'เกิดข้อผิลพลาด',
              text: ''+data.name+'',
              icon: 'error',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Confirm',
              timer: 4000
          });
        }
      }
    });
  }
})
}

function imgform(thisdata){
  var machine_code = $('#Title_plansparepartcheck').html();
  var btn_status = $(thisdata).data('btn_status');
  var plan_sparepartunid = $(thisdata).data('plan_sparepartunid');
  var url = '/machine/spart/report/planmonth/formimg'
  var data = { SPAREPART_PLAN_UNID:plan_sparepartunid,
               BTN_STATUS: btn_status}
               console.log(machine_code);
  $.ajax({
    type: "GET",
    url: url,
    data: data,
    success: function (data) {
      if (btn_status != '') {
        $('#BTN_UPLOAD').hide();
      }else {
        $('#BTN_UPLOAD').show();
      }
      $('#Title_IMG').html(machine_code);
      $('#IMG_SPAREPART_UNID').val(plan_sparepartunid);
      $('#IMG_SHOW').html(data.html);
      $('#modal-plansparepartcheck-img').modal('show');
    }
  });

}
function deleteimg(thisdata){
  var unidimg = $(thisdata).data('imgunid');
  var url = '/machine/spart/planmonth/deleteimg';
  var data = {IMGUNID:unidimg};
  Swal.fire({
      title: 'ต้องการลบรูปนี้มั้ย?',
      icon: 'warning',
      showCancelButton:true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {

          if (data.res) {
            var plan_sparepartunid = data.planunidref;
            var status = 'delete';
            reload_dataimg(plan_sparepartunid,status);

          }else{
            Swal.fire({
                title: 'เกิดข้อผิลพลาด',
                text: 'ไม่พบข้อมูล',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Confirm',
                timer: 4000
            });
          }
        }
      });
       }

  });


}
function reload_dataimg(plan_sparepartunid,status){
  var machine_code = $('#Title_plansparepartcheck').html();
  var url = '/machine/spart/report/planmonth/formimg'
  var data = { SPAREPART_PLAN_UNID:plan_sparepartunid}
  $.ajax({
    type: "GET",
    url: url,
    data: data,
    success: function (data) {
      if (status == 'save') {
        var title_check = 'อัปโหลดรูปภาพสำเร็จ';
        var icon_check = 'success';
      }else if (status == 'delete') {
        var title_check = 'ลบรายการสำเร็จ';
        var icon_check = 'success';
      }
      Swal.fire({
          title: title_check,
          icon: icon_check,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Confirm',
          timer: 1000
      }).then(() => {
        $('#Title_IMG').html(machine_code);
        $('#BTN_UPLOAD').attr("disabled", false);
        $('#IMG_SPAREPART_FILE_NAME').val('');
        $('#IMG_SPAREPART_UNID').val(plan_sparepartunid);
        $('#IMG_SHOW').html(data.html);
        if ($('#modal-plansparepartcheck-img').hasClass('in') == false) {
          $.magnificPopup.close();
          $('#modal-plansparepartcheck-img').modal('show');
        }
        });


    }
  });


};
$(document).on("submit", "#FRM_SPAREPART_UPLOAD", function(event)
{
    event.preventDefault();
    $('#BTN_UPLOAD').attr("disabled", true);
    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        dataType: "JSON",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data)
        {
                 if (data.res) {
                   var plan_sparepartunid = data.planunid;
                   var status = 'save';
                    reload_dataimg(plan_sparepartunid,status);
                 }
        }
    });

});
