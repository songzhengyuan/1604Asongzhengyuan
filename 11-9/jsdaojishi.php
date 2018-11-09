<html>
<head>
<meta charset="UTF-8">
<title>简单时长倒计时</title>
<SCRIPT type="text/javascript">        
            var maxtime = 60 * 60; //一个小时，按秒计算，自己调整!   
            function CountDown() {
                if (maxtime >= 0) {
                    minutes = Math.floor(maxtime / 60);
                    seconds = Math.floor(maxtime % 60);
                    msg = "距离结束还有" + minutes + "分" + seconds + "秒";
                    document.all["timer"].innerHTML = msg;
                    if (maxtime == 5 * 60)alert("还剩5分钟");
                        --maxtime;
                } else{
                    clearInterval(timer);
                    alert("时间到，结束!");
                }
            }
            timer = setInterval("CountDown()", 1000);                
        </SCRIPT>
</head>
<body>
<div id="timer" style="color:red"></div>
<div id="warring" style="color:red"></div>
</body>
</html>




<html>  
<head>  
    <meta charset="UTF-8">  
    <title>js简单时分秒倒计时</title>  
    <script type="text/javascript">  
        function countTime() {  
            //获取当前时间  
            var date = new Date();  
            var now = date.getTime();  
            //设置截止时间  
            var str="2018/11/11 00:00:00";
            var endDate = new Date(str); 
            var end = endDate.getTime();  
            
            //时间差  
            var leftTime = end-now; 
            //定义变量 d,h,m,s保存倒计时的时间  
            var d,h,m,s;  
            if (leftTime>=0) {  
                d = Math.floor(leftTime/1000/60/60/24);  
                h = Math.floor(leftTime/1000/60/60%24);  
                m = Math.floor(leftTime/1000/60%60);  
                s = Math.floor(leftTime/1000%60);                     
            }  
            //将倒计时赋值到div中  
            document.getElementById("_d").innerHTML = d+"天";  
            document.getElementById("_h").innerHTML = h+"时";  
            document.getElementById("_m").innerHTML = m+"分";  
            document.getElementById("_s").innerHTML = s+"秒";  
            //递归每秒调用countTime方法，显示动态时间效果  
            setTimeout(countTime,1000);  
  
        }  
    </script>  
</head >  
<body onload="countTime()" >  
    <div>  
        <span id="_d">00</span>  
        <span id="_h">00</span>  
        <span id="_m">00</span>  
        <span id="_s">00</span>  
    </div>  
</body>  
</html>