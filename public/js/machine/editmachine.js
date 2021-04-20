$(document).on('click','#savedate',function(event){
  event.preventDefault();
  var parentObj = $(this).closest('#datadate');
  var unid = parentObj.find('#PM_LAST_DATE').attr('rel');
  var date = parentObj.find('#PM_LAST_DATE').val();
    $.ajax({
      type:'POST',
      url: '/machine/system/check/storedate',
      datatype: 'json',
      data: {
        "_token": "{{ csrf_token() }}",
        "unid" : unid,
        "date" : date,
      } ,
      success:function(data){
                   parentObj.find('#PM_NEXT_DATE').val(data.PM_NEXT_DATE);
      console.log(unid);

      }
    });
  });
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
              console.log(mc);
              $('#PM_TEMPLATE_UNID_REF:checked').each(function(){
                  id.push($(this).val());
                  console.log(id);
                  window.location.href = '/machine/system/remove/'+id+'/'+mc;
              });
          });
        }
      });
  });
  function printhistory(u){
    console.log(u);
    var unid = (u);
    window.open('/machine/repairhistory/pdf/'+unid,'RepairHistory','width=1000,height=1000,resizable=yes,top=100,left=100,menubar=yes,toolbar=yes,scroll=yes');
  }
