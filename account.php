<?php
	require 'user.php';
	$error=array();
	if (isset($_POST['submit'])) {		
		$name=isset($_POST['name'])?$_POST['name']:"";
		$mobile=isset($_POST['mobile'])?$_POST['mobile']:"";
		$username=isset($_POST['email'])?$_POST['email']:"";
		$password=isset($_POST['password'])?$_POST['password']:"";
		$confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";	
		$security_question=isset($_POST['question'])?$_POST['question']:"";
		$security_answer=isset($_POST['answer'])?$_POST['answer']:"";	
		date_default_timezone_set("Asia/Calcutta");
		$date=date("Y-m-d h:i:s");
		$user=new user();
		$connection=new Dbconnect();
		$show=$user->register($name,$mobile,$username,$password,$confirmpassword,$security_question,$security_answer,$date,$connection->conn);
		echo $show;
	}
	 
	// require 'header.php';
?>
<?php
	require 'header.php';
?>
	<!---login--->
	<div class="content">
	<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="#" method="post"> 
				 <div class="register-top-grid">
					<h3>Personal Information</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input name="name" type="text" pattern="(^\w+(\s\w+)*$)([a-zA-Z ]*)" title="More than one space not allowed between First name and last name,No numeric data, no special character" placeholder=" Full Name:...."> 
					 </div>
					 <div>
						<span>Mobile No.<label>*</label></span>
						<input name="mobile" type="number" pattern="(^(?!\s|.*\s$).*$)[0-9].{2,10}" title="Only Numbers and must be 10 digit" placeholder=" Mobile No:...."> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <!-- <input name="email" type="email" pattern="(^\w+(\s\w+)*$)" title="Two decimal(.) not allowed together,White spaces no allowed,No special character except @."  placeholder=" Email:.... "> 
						  -->
						 <input name="email" type="email" pattern="(^(?!\s|.*\s$).*$)" title="Two decimal(.) not allowed together,White spaces no allowed,No special character except @."  placeholder=" Email:.... "> 
					
					
						</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Login Information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input name="confirmpassword" type="password" placeholder="Password">
							 </div>
					 </div>
					 <div class="register-bottom-grid">
						    <h3>Security Information</h3>
							 <div>
							 <span>Security Questions<label>*</label></span>
							 <select class="register-sel" name="question" >
                                            <option selected>Security Questions</option>
                                            <option>What was your childhood nickname?</option>
                                            <option>What is the name of your favourite childhood friend?</option>
                                            <option>What was your favourite place to visit as a child?</option> 
											<option>What was your dream job as a child?</option>
											<option>What is your favourite teacher's nickname?</option>
                                        </select>
							 </div>
							 <div>
								<span>Security Answers<label>*</label></span>
								<input name="answers" type="password" pattern="([^\s][A-z0-9À-ž\s]+)" title="Can be alpha-numeric combination / only alphabetic" placeholder="Security Answers">
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				   
					   <input class="button_signup" type="submit" name="submit" value="submit" id="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>		
			<!-- <?php
					echo $name;
					echo $mobile;
					echo $username;
					echo $password;
					echo $confirmpassword;
					echo $date;
				
				?> -->
<!-- registration -->
			</div>
<!-- login -->
<?php
		require 'footer.php';
?>