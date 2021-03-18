$(document).ready(function(){
  var notifitysystemcheckmonthly = function (){
    $.ajax({
      url:'/machine/monthly/notificaiton',
      method:'GET',
      dataType:'json',
      success:function(resu){
        if (resu != null) {
          var _html='';

          $.each(resu.datamonth,function(systemcheckmonthly,datamonth){
            var url = '/machine/syscheck/edit/'+datamonth.MACHINE_UNID_REF;
            _html += '<a href="'+url+'">'+
                '<div class="notif-icon notif-danger"> <i class="fa fa-wrench"></i> </div>'+
                '<div class="notif-content">'+
                '<span class="block" >Line :'+datamonth.MACHINE_LINE+' MC: '+datamonth.MACHINE_CODE+ '</span>' +
                  '<span class="time">'+datamonth.SYSTEM_NAME+'</span>'+
                '</div>'+
              '</a>';
          });

        }else {
          var _html='';
           _html +=
           '<center> <div class="notif-content">'+
            '<span class="block" >' +'รายการตรวจเช็คเครื่องจักร'+ '</span>' +
            '</div> </center>'+
            '<center> <div class="notif-content">'+
            '<span class="block" >' +'0 รายการ'+ '</span>' +
            '</div> </center>';  }
        $("#monthly").html(_html);
     // Ask for new notifications every second
      }
      });
    }
    setInterval(notifitysystemcheckmonthly,20000);

    var count = function (){
      $.ajax({
        url:'/machine/monthly/notificaitoncount',
        method:'GET',
        dataType:'json',

        success:function(data){

            var datamonthcount = '<span class="notification">' +data.datamonthcount+ '</span>';
            $("#monthlycount").html(datamonthcount);




        }
        });
      }
      setInterval(count,20000);
  });
