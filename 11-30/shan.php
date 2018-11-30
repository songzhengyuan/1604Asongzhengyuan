<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		window.onload=function(){
		  	var sc=document.getElementById("sc");
		  	sc.onclick=function(){
			    var dd = confirm("确定要删除吗");
			    if(dd){
			    	if(sc.style.display=="none"){  
          				sc.style.display="";  
        			}else{  
           				sc.style.display="none";  
      				}
			    }
			}
		}
	</script> 
</head>
<body>
<input type="button" value="删除" id="sc" />
<div id="sc" style="display:none">
	<font></font>
</div>
</body>
</html>