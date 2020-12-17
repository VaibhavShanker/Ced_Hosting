<?php	
	require 'classes/user.php';
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
?>
	<?php require 'header1.php'; ?>

	<!---login--->
	<div class="content">
	<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="account.php" method="post"> 
				 <div class="register-top-grid">
					<h3>Personal Information</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input name="name" type="text" pattern="(^\w+(\s\w+)*$)([a-zA-Z ]*)" title="More than one space not allowed between First name and last name,No numeric data, no special character" placeholder=" Full Name:...." required> 
					 </div>
					 <div>
						<span>Mobile No.<label>*</label></span>
						<!-- <input name="mobile" type="number" pattern="(^(?!\s|.*\s$).*$)[0-9].{2,10}" title="Only Numbers and must be 10 digit" placeholder=" Mobile No:...." required> 
					 -->
					 <input type="text" name="mobile" id="mobile" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <!-- <input name="email" type="email" pattern="(^\w+(\s\w+)*$)" title="Two decimal(.) not allowed together,White spaces no allowed,No special character except @."  placeholder=" Email:.... "> 
						  -->
						 <input name="email" type="email" pattern="(^(?!\s|.*\s$).*$)" title="Two decimal(.) not allowed together,White spaces no allowed,No special character except @."  placeholder=" Email:.... " required> 
					
					
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
								<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input name="confirmpassword" type="password" placeholder="Password" required>
							 </div>
					 </div>
					 <div class="register-bottom-grid">
						    <h3>Security Information</h3>
							 <div>
							 <span>Security Questions<label>*</label></span>
							 <select class="register-sel" name="question" required>
                                            <option>Security Questions</option>
                                            <option>What was your childhood nickname?</option>
                                            <option>What is the name of your favourite childhood friend?</option>
                                            <option>What was your favourite place to visit as a child?</option> 
											<option>What was your dream job as a child?</option>
											<option>What is your favourite teacher's nickname?</option>
                             </select>
							 </div>
							 <div>
								<span>Security Answers<label>*</label></span>
								<input name="answer" type="password" pattern="([^\s][A-z0-9À-ž\s].{2,})" title="Min 3 alphabetic, OR Can be alpha-numeric combination" placeholder="Security Answers" required>
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


<script>

	var count_mob=0;
	var count_mob2=0;
	var count_pass=0;
	var count_cpass=0;
	var c=0;
	function validate() {
		
		if (Number.isInteger(parseInt($('#sans').val()))) {
			alert('Enter Security Answer in Correct Fornat');
			$('#sans').val("");
			return false;
		}
		else {
			return true;
		}
	}
		$('#email').bind("keypress keyup keydown", function (e){
		var email = $('#email').val();
		var regtwodots = /^(?!.*?\.\.).*?$/;
		var lemail = email.length;
		if ((email.indexOf(".") == 0) || !(regtwodots.test(email))) {
			alert("invalid email address");
			$('#email').val("");
			return;
		}
		});
		$("#mobile").bind("keypress", function (e) {			
			var keyCode = e.which ? e.which : e.keyCode
			if (!(keyCode >= 48 && keyCode <= 57)) {
				return false;
			}	
		});

		$('#mobile').on("cut copy paste drag drop",function(e) {
			e.preventDefault();
		});
		$("#mobile").bind("keyup", function (e) {
			mobile_no=$("#mobile").val();
			count_mob+=$("#mobile").length;
			var fchar=$("#mobile").val().substr(0, 1);
			var schar=$("#mobile").val().substr(1,1);
			if(fchar==0) {
				$('#mobile').attr('maxlength','11');
				$('#mobile').attr('minlength','11');
				if(count_mob==12) {
					for(i=1;i<11;i++) {
						var a=$("#mobile").val().substr(i,1);
						var b=$("#mobile").val().substr(i+1,1);
						if(a==b) {
							$("#mobile").val("");
							count_mob=0;
						}
					}
				}
				if(schar==0)
				{
					$("#mobile").val(0);				
					count_mob=0;
					
					if(fchar=="")
					{
						$("#mobile").val("");
						count_mob=0;					}
					
				}
			} else {
				$('#mobile').attr('maxlength','10');
				$('#mobile').attr('minlength','10');
				console.log(count_mob);
				if(count_mob==11) {
				for(i=0;i<=10;i++) {
					var a=$("#mobile").val().substr(i,1);
					var b=$("#mobile").val().substr(i+1,1);
					if(a==b) {
						$("#mobile").val("");
						count_mob=0;
						
					}
				}
			}
			}
		});
</script>

<?php
		require 'footer.php';
?>
