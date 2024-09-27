<?php
include "connection.php";
include "header.php";

?>
<script type="text/javascript">
function validate(frm)
{
	if(frm.u_nm.value == "")
	{
		alert("enter user name");
		frm.u_nm.focus();
		return false;
	}
	else if(frm.password.value == "")
	{
		alert("enter user password");
		frm.password.focus();
		return false;
	}
	else if(frm.cpwd.value == "")
	{
		alert("enter user confirm password");
		frm.cpwd.focus();
		return false;
	}
	else if(frm.address.value == "")
	{
		alert("enter user address");
		frm.address.focus();
		return false;
	}
	else if(frm.city.value == "")
	{
		alert("enter user city name");
		frm.city.focus();
		return false;
	}
	else if(frm.state.value == "")
	{
		alert("enter user state name");
		frm.state.focus();
		return false;
	}
	else if(frm.pno.value == "")
	{
		alert("enter user contact no");
		frm.pno.focus();
		return false;
	}
	else if(frm.email.value == "")
	{
		alert("enter user email id");
		frm.email.focus();
		return false;
	}
	else if(frm.password.value!=frm.cpwd.value)
	{
		alert("reenter your correct password");
		frm.password.focus();
		return false;
	}
	
	/*else if(frm.cap.value != frm.h1.value)
	{
		document.write(frm.h1.value);
		var b= <?php echo $a; ?>;
		alert(b);
		alert("enter right code");
		frm.cap.focus();
		return false;
	}*/
	return true;	
}


function onlyNumbers(e)
{
	var charCode=e.which || e.keyCode;
	//8-back space 9-tab key 48-57 0 to 9
	if((charCode >= 48 && charCode <=57) || charCode==9 || charCode==8)
	return true;
	
	return false;
}


function onlyChar(e)
{
	var charCode=e.which || e.keyCode;
	if((charCode >= 65 && charCode <=90)|| (charCode >= 97 && charCode <=122) || charCode==9 || charCode==46 || charCode==8)
	return true;
	
	return false;
}

function email1()
{
	var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(frm.email.value) == false)
	{
		alert ('invalid email address');
		frm.email.focus();
		return false;
		
	}
}
</script>

	


	<div id="contents">
		<div id="adbox">
			<!--<img src="image/indian-sweets.jpg" height="300" width="600" alt="Img">-->



<table width="600" height="450" align="center" cellpadding="7">

<form  action="reg.php"  name="frm" method="POST"  onsubmit="return validate(this)">
			<?php
			if(isset($_GET['msg']))
			echo $_GET['msg'];
			?><br />

<tr> <td colspan="2" align="center"><h1>Registration</h1></td>
</tr>

<tr>
  <td style="font-size:24px" width="200">Username  : </td>
 	<td width="0"><input type="text" name="u_nm" style="font-size:20px" height="50" width="52" onkeydown="return onlyChar(event);"/></td>
	</tr>
<tr> 
  <td style="font-size:24px">Password  :</td>
	
	<td><input type="password" name="password" style="font-size:20px" height="50" width="50"/></td>
</tr>
	
<tr>
    <td style="font-size:24px">ConfirmPassword  :</td>
	
	<td><input type="password" name="c_pass" style="font-size:20px" height="50" width="50"/></td>
</tr>

<tr>
    <td style="font-size:24px">Birth_date :</td>
	
	<td><input type="date" name="birth_dt" style="font-size:20px" height="50" width="50"/></td>
</tr>

<tr>
<td style="font-size:24px">Address  :</td>

<td><textarea name="address" rows="5" cols="20" style="font-size:18px" height="50" width="50"></textarea></td>
</tr>
<tr>
<td style="font-size:24px">City  :</td>

<td><input type="text" name="city" style="font-size:20px" height="50" width="50"/></td>
</tr>
<tr>
<td style="font-size:24px">state  :</td>

<td><input name="state" rows="5" cols="20" style="font-size:20px" height="50" width="50"></td>
</tr>

<tr>
	  <td style="font-size:24px">Phone No  :</td>
  		
    <td><input type="text" name="pno"  style="font-size:20px" height="50" width="50" onkeydown="return onlyNumbers(event);"/></td>
</tr>
<tr>
	  <td style="font-size:24px">Email id  :</td>
  		
    <td><input type="text" name="email" style="font-size:20px" height="50" width="50" onBlur="return email1();"/></td>
</tr>
<!--<tr>
	  <td style="font-size:24px"><img src="captcha.php"/></td>
	<input type="hidden" name="h1" value="/>
	
 <td><input type="text" name="cap" style="font-size:20px" height="50" width="150" onkeydown="return validate(this);"/></td>
</tr>-->

<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Register now" style="font-size:24px"/></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancle" style="font-size:24px"/></td></tr>
</form>	
</table>
</div>
</div>
<?php include "footer.php"; ?>
		




