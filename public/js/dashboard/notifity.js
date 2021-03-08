$(document).ready(function(){
  var notifity = function (){
    $.ajax({
      url:'/machine/repair/notificaiton',
      method:'GET',
      dataType:'json',
      success:function(res){
        if (res != null) {
          var _html='';
          $.each(res.datarepair,function(notificaiton,datarepair){
            _html += '<a href="#">'+
                '<div class="notif-icon notif-danger"> <i class="fa fa-wrench"></i> </div>'+
                '<div class="notif-content">'+
                '<span class="block" >Line :'+datarepair.MACHINE_LINE+' MC: '+datarepair.MACHINE_CODE+ '</span>' +
                  '<span class="time">'+datarepair.MACHINE_DOCDATE+'</span>'+
                '</div>'+
              '</a>';
          });

        }else { $('#loaddatacode').html('0 รายการ')  }
        $("#loaddatacode").html(_html);
     // Ask for new notifications every second
      }
      });
    }
    setInterval(notifity,5000);

    var count = function (){
      $.ajax({
        url:'/machine/repair/notificaitoncount',
        method:'GET',
        dataType:'json',

        success:function(data){
          var datacount = '<span class="notification">' +data.datacount+ '</span>';
          $("#count").html(datacount);
        }
        });
      }
      setInterval(count,5000);
  });