

  <!-- login section -->

  <?php
     session_start();
    include "connection.php";
    include "header.php";
   ?>
    <div id="contents">
		<div id="adbox">
			
		<form action="logincheck.php" method="post">  
        <?php
		if(isset($_GET['msg']))
		 echo  $_GET['msg'];
		 
		 ?>		
			<table width="319" height="90" align="center" cellpadding="7">
			<tr>
			<td width="98" style="font-size:24px">username:</td>
			<td width="185"><input type="text" name="u_nm" placeholder="username"></td>
			</tr>
						<tr>
			<td style="font-size:24px">password:</td>
			<td><input type="password" name="password" placeholder="password"></td>
			</tr>
						<tr>
			<td>&nbsp;</td>
			<td ><input type="submit" value="submit" style="font-size:24px" >
			      <input type="reset" value="reset" style="font-size:24px" >
			</td>
			</tr>
			</tr>
						<tr>
			<td>&nbsp;</td>
			<td ><a href="registration.php" style="font-size:24px">Registration</a></td>
			</tr>
		
</table>
           
		</div>
  <!-- end login section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_menu">
            <h5>
              QUICK LINKS
            </h5>
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="course.html"> Courses </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="wishlist.html"> Wishlist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
             
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_course">
            <h5>
              TOP RATED COURSE
            </h5>
            <p>
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some form, by
              injected humou
            </p>
          </div>
        </div>

        <div class="col-md-5 offset-md-1">
          <div class="info_news">
            <h5>
              FOR ANY QUERY, PLEASE WRITE TO US
            </h5>
            <div class="info_contact">
              <a href="">
                Location
              </a>
              <a href="">
                demo@gmail.com
              </a>
              <a href="">
                Call : +01 1234567890
              </a>
            </div>
            <form action="">
              <input type="text" placeholder="Enter Your email" />
              <button>
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <?php include "footer.php";?>
</body>

</html>