<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style></style>
</head>
<body onload="birthVerify()">
	<form action="" method="post" onsubmit="return checkForm()">
	 用户名<input type="text" id='uname' onblur="show()">
		<span id='u_info'></span>
	<p>
		密码<input type="text" id='upwd' onblur="checkPwd()">
		<span id='p_info'></span>
	</p>
	<p>
		确认密码<input type="text" id='upwd1' onblur="checkPwd1()">
		<span id='p1_info'></span>
	</p>
	<p>
		性别
		<input type="radio" name="sex" value="1" onchange="checkSex()">男
		<input type="radio" name='sex' value="0" onchange="checkSex()">女
		<span id='s_info'></span>
	</p>
	<p>
		邮箱<input type="text" id='uemail' onblur="checkEmail()">
		<span id='e_info'></span>
	</p>
	<p>
		城市
		<select name="" id="ucity" onchange="checkCity()">
			<option value="请选择">请选择</option>
			<option value="bj">bj</option>
			<option value="sh">sh</option>
		</select>
		<span id='c_info'></span>
	</p>
	<p>
		手机号<input type="text" id='uphone' onblur="checkPhone()">
		<span id='h_info'></span>
	</p>
	<p>
		座机<input type="text" id='utel' onblur="checkTel()">
		<span id='t_info'></span>
	</p>
	<p>
		身份 <input type="text" id='ucard' onblur="checkCard()">
		<span id='a_info'></span>
	</p>
	<p>
		级别
		<input type="text" id="ucontent" onblur="checkContent()">
		<span id='n_info'></span>
	</p>
	<p>
		<input type="submit" value="提交">
	</p>
	</form>

</body>
</html>
<script>
	 //验证码
   function birthVerify(){
   		//26英文字母
   		var n = '';
   		for(var i= 65;i<91;i++){
   			 n+= String.fromCharCode(i)+',';
   		}
   		//console.log(n);
   		var big = n;
   		//大写转小写
   		var small = n.toLowerCase();
   		//console.log(small);
   		//大写小写拼接
   		var sum1 = big.concat(small);
   		//console.log(sum1);
   		//转数组
   		var arr = sum1.split(',');
   		//去除最后的空格
   		arr.pop();
   		//console.log(arr);
   		var str = '';
   		for(var j=0;j<4;j++){
   			str+=arr[Math.floor(Math.random()*arr.length)];
   		}
   		//console.log(str);
   		document.getElementById('verify').innerHTML = str;

   }
	//验证账号
	function show(){
		//用户的输入的值
		var uname = document.getElementById('uname').value;
		var reg = /^[a-z_]\w{5,9}$/;
		var reg = new RegExp(/^[a-z_]\w{5,9}$/);
		if(reg.test(uname)){
			document.getElementById('u_info').innerHTML = "<font color='green'>√</font>";
			return true;
		}else{
			document.getElementById('u_info').innerHTML = "<font color='red'>以数字，字母，下划线组成，不能以数字开头，长度6-10</font>";
			return false;
		}

	}
	//密码必须在6位以上
	function checkPwd(){
		show();
		//用户输入的密码
		var upwd = document.getElementById('upwd').value;
		var reg = /^.{6,11}$/;
		if(reg.test(upwd)){
			document.getElementById('p_info').innerHTML = "<font color='green'>√</font>";
			return true;
		}else{
			document.getElementById('p_info').innerHTML = "<font color='red'>密码必须在6位以上，11位以下</font>";
			return false;
		}
	}
	//确认密码  跟密码一致,且不为空
	function checkPwd1(){
		checkPwd()
		//用户输入的密码
		var upwd = document.getElementById('upwd').value;
		//确认密码
		var upwd1 = document.getElementById('upwd1').value;
		var reg = /^.{6,11}$/;
		if(upwd==upwd1 && reg.test(upwd1)){
			document.getElementById('p1_info').innerHTML = "<font color='green'>√</font>";
			return true;
		}else{
			document.getElementById('p1_info').innerHTML = "<font color='red'>跟密码一致,且6位以上11位以下</font>";
			return false;
		}
	}
    //性别
    function checkSex(){
    	checkPwd1();
    	var sex = document.getElementsByName('sex');
    	if(sex[0].checked==true || sex[1].checked==true){
    	
    		document.getElementById('s_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('s_info').innerHTML = "<font color='red'>必选一项</font>";
			return false;
    	}
    }
    //邮箱
    function checkEmail(){
    	checkSex();
    	var uemail = document.getElementById('uemail').value;
    	//fdfdf@qq.com
    	var reg = /^\w+@\w+\.(com|cn|net)$/;
    	if(reg.test(uemail)){
    		document.getElementById('e_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('e_info').innerHTML = "<font color='red'>邮箱格式不对</font>";
			return false;
    	}
    }
    //城市
    function checkCity(){
    	checkEmail()
    	var ucity = document.getElementById('ucity').value;
    	var reg = /^请选择$/;
    	if(!reg.test(ucity)){
    		document.getElementById('c_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('c_info').innerHTML = "<font color='red'>请选择</font>";
			return false;
    	}
    }
    //手机
    function checkPhone(){
    	checkCity()
    	var uphone = document.getElementById('uphone').value;
    	var reg = /^1[358]\d{9}$/;
    	if(reg.test(uphone)){
    		document.getElementById('h_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('h_info').innerHTML = "<font color='red'>13,15,18开头11位数字</font>";
			return false;
    	}
    }
    //座机
    function checkTel(){
    	checkPhone()
    	var utel = document.getElementById('utel').value;
    	var reg = /^010-\d{8}$/;
    	if(reg.test(utel)){
    		document.getElementById('t_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('t_info').innerHTML = "<font color='red'>010-电话号</font>";
			return false;
    	}
    }
    //身份证号
    function checkCard(){
    	checkTel()
    	var ucard = document.getElementById('ucard').value;
    	//17位数字+x 或者18位数字 或者15位数字
    	var reg = /^(\d{17}x|\d{18}|\d{15})$/i;
    	//var reg = /^(\d{17}[x\d]|\d{15})$/i;
    	if(reg.test(ucard)){
    		document.getElementById('a_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('a_info').innerHTML = "<font color='red'>17位数字+x 或者18位数字 或者15位数字</font>";
			return false;
    	}
    }
    function checkContent(){
    	checkCard()
    	var ucontent = document.getElementById('ucontent').value;
    	var reg = /^[\u4e00-\u9fa5]{1,20}$/;
    	if(reg.test(ucontent)){
    		document.getElementById('n_info').innerHTML = "<font color='green'>√</font>";
			return true;
    	}else{
    		document.getElementById('n_info').innerHTML = "<font color='red'>1到20位汉字</font>";
			return false;
    	}
    }
    //表单
    function checkForm(){
    	checkContent()
    	if(checkPwd() && checkPwd1() && checkSex() && checkContent() && checkPhone() && checkCity() && checkEmail() && checkTel() && checkCard()){
 			return true;
    	}else{
    		return false;
    	}
    }
</script>