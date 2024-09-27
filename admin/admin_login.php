 <?php
include "admin/connection.php";
session_start();
//include "header.php";
?>
	<div id="contents">
		<div id="adbox">

		<form action="admin_logincheck.php" method="post">  
        <?php
		if(isset($_GET['msg']))
		 echo  $_GET['msg'];
		 
		 ?>		
		
			<table width="319" height="90" align="center" cellpadding="7">
			<tr>
			<td width="98" style="font-size:24px">username:</td>
			<td width="185"><input type="text" name="a_nm" placeholder="adminname"></td>
			</tr>
						<tr>
			<td style="font-size:24px">password:</td>
			<td><input type="password" name="a_pass" placeholder="password"></td>
			</tr>
						<tr>
			<td>&nbsp;</td>
			<td ><input type="submit" value="submit" style="font-size:24px" >
			      <input type="reset" value="reset" style="font-size:24px" >
			</td>
			</tr>
			</tr>
						<tr>
			
		
</table>
           
		</div>
  <!-- end login section -->


</body>

</html>