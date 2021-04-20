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
