function cancelback(u){

		Swal.fire({
			title: 'ข้อมูลยังไม่ได้ทำการบันทึก',
			text: "ต้องการกลับไปหน้าก่อนหน้านี้มั้ย",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if (result.isConfirmed) {
					var unid = u;
					// console.log(unid);
					window.location.href = document.referrer;

			}

		})
	};
