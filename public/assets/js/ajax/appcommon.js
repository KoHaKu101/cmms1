
var popupWindow = null;

  function positionedPopup(url,winName,w,h,t,l,scroll){
    var scroll='yes';
    var l='200';
    var t='100';
    var h='500';
    var w='800';
    var scroll='yes';

    settings ='height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
    popupWindow = window.open(url,winName,settings)
  }
