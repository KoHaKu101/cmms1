// ***************************** DeleteTemplate *************************************
function deletecheckboxpm(id){
		Swal.fire({
			title: 'ต้องการลบต้นแบบมั้ย?',
			text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if (result.isConfirmed) {
					var unid = (id);
					window.location.href = '/machine/pm/template/deletepmtemplate/'+unid;
			}
		})
};
//***********************************************************************************
//************************************* DeleteMachine UseTemplate *******************
function deletemachinepm(mccode,id){
	var machinecode = mccode ;
	Swal.fire({
				title: 'ต้องการลบรายการเครื่องจักร'+machinecode+'มั้ย',
				text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
						var mc = (mccode);
						var unid = (id);
						window.location.href = '/machine/pm/template/deletemachinepm/'+mc+'/'+unid;
				}
			})
};
//**************************************************************************************
//****************************** Delete Template List **********************************
function deletecheckbox(id,name){
    		Swal.fire({
    		  title: 'ต้องการลบแบบใด',
    			text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
    			icon: 'warning',
    		  showDenyButton: true,
    		  showCancelButton: false,
    		  confirmButtonText: 'ลบเฉพาะจุดตรวจ',
    		  denyButtonText: 'ลบจุดตรวจและข้อมูลทั้งหมด',
    		}).then((result) => {
    		  if (result.isConfirmed) {
    					var namepm = name;
    				Swal.fire({
    					title: 'ต้องการลบจุดตรวจเช็ค '+namepm+' นี้มั้ย?',
    					text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
    					icon: 'warning',
    					showCancelButton: true,
    					confirmButtonColor: '#3085d6',
    					cancelButtonColor: '#d33',
    					confirmButtonText: 'Yes!'
    				}).then((result) => {
    					if (result.isConfirmed) {
    							var unid = (id);
    							window.location.href = '/machine/pm/template/deletepmlist/'+unid;
    					}
    				})
    		  } else if (result.isDenied) {
    					var namepm = name;
    				Swal.fire({
    					title: 'ต้องการลบจุดตรวจเช็คและข้อมูลทั้งหมดของ '+namepm+' นี้มั้ย?',
    					text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
    					icon: 'warning',
    					showCancelButton: true,
    					confirmButtonColor: '#3085d6',
    					cancelButtonColor: '#d33',
    					confirmButtonText: 'Yes!'
    				}).then((result) => {
    					if (result.isConfirmed) {
    							var unid = (id);
    							window.location.href = '/machine/pm/template/deletepmlistall/'+unid;
    					}
    				})
    		  }
    		})
    	};
//*******************************************************************************************************
//***************************************** Edit Name Template ******************************************
      function datapmachine(unid,name){
    		var unid = (unid) ;
    		var name = (name) ;
    		var _html='<input type="hidden" name="UNID" value="'+unid+'">'+
    		 					'<input type="text" class="form-control" name="PM_TEMPLATE_NAME" value="'+name+'">';

    	$("#sendpmunid").html(_html);
    	}
//*******************************************************************************************************
