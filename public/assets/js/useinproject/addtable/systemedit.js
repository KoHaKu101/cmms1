function deletedata(pm){
  var unid = (pm);
  console.log(unid);
    Swal.fire({
      title: 'ต้องการลบจุดตรวจเช็คมั้ย?',
      text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
    }).then((result) => {
      if (result.isConfirmed) {
      window.location.href = "/machine/pm/template/deletepmdetail/"+unid;
      }

    });
};
function statusmax(){
		if ($('#PM_DETAIL_STATUS_MAX').is(":checked")) {
						$('#PM_DETAIL_STD_MAX').attr('disabled', false);
				}else {
					$('#PM_DETAIL_STD_MAX').attr('disabled', true);
				}
}
function statusmin(){
	if ($('#PM_DETAIL_STATUS_MIN').is(":checked")) {
					$('#PM_DETAIL_STD_MIN').attr('disabled', false);
			}else {
				$('#PM_DETAIL_STD_MIN').attr('disabled', true);
			}
}
	function editdetail(unid,text,std,type,unit,max,min,statusmax,statusmin){
			var detail_unid = (unid) ;
			var text = (text) ;
			var std = (std);
			var type = (type);
			var unit = (unit) ;
			var max = (max);
			var min = (min);
			var url = '/machine/pm/template/storedetailupdate' ;
			var checktype =  type == 'radio' ? true : false ;


		 document.getElementById("PM_DETAIL_NAME").value = text;
		 document.getElementById("PM_DETAIL_STD").value = std;
		 document.getElementById("PM_DETAIL_UNIT").value = unit;
			 $('#PM_DETAIL_STATUS_MIN').prop('disabled', checktype);
			 $('#PM_DETAIL_STATUS_MAX').prop('disabled', checktype);
			 $('#PM_DETAIL_STD_MAX').prop('disabled', checktype);
			 $('#PM_DETAIL_STD_MIN').prop('disabled', checktype);
			 $('#PM_DETAIL_STD').prop('readonly', checktype);
		 if (statusmax == "true") {
			 $('#PM_DETAIL_STATUS_MAX').prop('checked', true);
			 $('#PM_DETAIL_STD_MAX').attr('readonly', false);
	 		}else {
			  $('#PM_DETAIL_STATUS_MAX').prop('checked', false);
				$('#PM_DETAIL_STD_MAX').attr('readonly', true);
	 		}
		document.getElementById("PM_DETAIL_STD_MAX").value = max;
		if (statusmin == "true") {
			$('#PM_DETAIL_STATUS_MIN').prop('checked', true);
			$('#PM_DETAIL_STD_MIN').attr('readonly', false);
	 		}else {
		 		$('#PM_DETAIL_STATUS_MIN').prop('checked', false);
				$('#PM_DETAIL_STD_MIN').attr('readonly', true);
	 		}
		 document.getElementById("PM_DETAIL_STD_MIN").value = min;
		 $('[name=PM_TYPE_INPUT]').val(type)
		 $('#CANCEL_EDIT').prop('hidden',false);
		 $('#FRM_SAVE').attr('action', url);
		 document.getElementById("DETAIL_UNID").value = detail_unid;


		};
	function exiteditdetail(){
		var url 	=  '/machine/pm/template/storedetail';
		document.getElementById("PM_DETAIL_NAME").value = '';
		document.getElementById("PM_DETAIL_STD").value = '';
		document.getElementById("PM_DETAIL_UNIT").value = '';
			 $('#PM_DETAIL_STATUS_MAX').prop('checked', false);
			 $('#PM_DETAIL_STD_MAX').attr('readonly', true);
	 document.getElementById("PM_DETAIL_STD_MAX").value = '';
			 $('#PM_DETAIL_STATUS_MIN').prop('checked', false);
			 $('#PM_DETAIL_STD_MIN').attr('readonly', true);
		document.getElementById("PM_DETAIL_STD_MIN").value = '';
		$('[name=PM_TYPE_INPUT]').val('')
		$('#CANCEL_EDIT').prop('hidden',true);
		$('#FRM_SAVE').attr('action', url);
		$('#PM_DETAIL_STATUS_MIN').prop('disabled', false);
		$('#PM_DETAIL_STATUS_MAX').prop('disabled', false);
		$('#PM_DETAIL_STD_MAX').prop('disabled', false);
		$('#PM_DETAIL_STD_MIN').prop('disabled', false);
		$('#PM_DETAIL_STD').prop('readonly', false);
	};
	function changetype(){
			var select_type = $('#PM_TYPE_INPUT').val();
			if (select_type == "radio") {
				Swal.fire({
							title: 'หากทำการเลือก ผ่าน ไม่ผ่าน',
							text: " ค่า STD จะเป็น ผ่าน = 1",
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'OK',
							timer: 2000
						});

				$('#PM_DETAIL_STD').val('1');
				$('#PM_DETAIL_STD').attr('readonly','true');
				$('#PM_DETAIL_STATUS_MIN').prop('disabled', true);
				$('#PM_DETAIL_STATUS_MAX').prop('disabled', true);
				$('#PM_DETAIL_STD_MAX').prop('disabled', true);
				$('#PM_DETAIL_STD_MIN').prop('disabled', true);
			}else {
				$('#PM_DETAIL_STATUS_MIN').prop('disabled', false);
				$('#PM_DETAIL_STATUS_MAX').prop('disabled', false);
				$('#PM_DETAIL_STD_MAX').prop('disabled', false);
				$('#PM_DETAIL_STD_MIN').prop('disabled', false);
				$('#PM_DETAIL_STD').prop('readonly', false);
			}
	}
