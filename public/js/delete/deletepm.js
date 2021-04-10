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
					window.location.href = '/machine/pm/template/deletecheckbox/'+unid;
			}

		})
	};
