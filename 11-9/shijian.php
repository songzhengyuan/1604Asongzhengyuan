<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>服务器倒计时</title>
          <script type="text/javascript">
  get=function (id){return document.getElementById(id)}
  if(document.all){
      window.XMLHttpRequest=function(){
          var get=['Microsoft.XMLHTTP','Msxml2.XMLHTTP'];
      for(var i=0;i<get.length;i++){try{return new ActiveXObject(get[i])}catch(e){}};
      };
  }
  webDate=function(fn){
    var Htime=new XMLHttpRequest();
    Htime.onreadystatechange=function(){Htime.readyState==4&&(fn(new Date(Htime.getResponseHeader('Date'))))};
    Htime.open('HEAD', '/?_='+(-new Date));
    Htime.send(null);
  }
  window.time=new Date();
  targetTime=new Date();
  time2String=function (t){
      with(t)return [getFullYear(),'年'
        ,('0'+(getMonth()+1)).slice(-2),'月'
        ,('0'+getDate()).slice(-2),'日 '
        ,('0'+getHours()).slice(-2),': '
        ,('0'+getMinutes()).slice(-2),': '
        ,('0'+getSeconds()).slice(-2)].join('')
  }
  int2time=function (m){
    m-=(D=parseInt(m/86400000))*86400000;
    m-=(H=parseInt(m/3600000))*3600000;
    S=parseInt((m-=(M=parseInt(m/60000))*60000)/1000);
    return D+'天'+H+'小时'+M+'分'+S+'秒'
  }
  setInterval(function (){
    webDate(function (webTime){
      get('web').innerHTML=time2String(time=webTime);
    })
    get('locale').innerHTML=time2String(new Date);
    get('time').innerHTML=int2time(targetTime-time);
    if ((targetTime-time)<0) {
      get('time').innerHTML = 'Game Over';
    }
  },1000)
 </script> 
    </head>
    <body>
        设定时间：2018年11月9日13时31分30秒<br>
        服务器时间:<span id='web'>loading...</span><br>
        本地时间:<span id="locale">loading...</span><br>
        倒计时时间:<span id="time">loading...</span>
        <script type="text/javascript" charset="utf-8">
          targetTime=new Date(2020,5,20,00,00,00);
        </script>
    </body>
</html>
