<?php
session_start();
require 'Dbconnect.php';
class user
{
    public $name;    
    public $mobile;
    public $email;
    public $password;
    public $confirmpassword;
    public $userid;
    public $date;
    public $isadmin;
    public $email_approved;
    public $phone_approved;
    public $active;

        function Login($email,$password,$conn)
        {
        $error=array();
        $password=md5($password);

            if ($email=="" || $password=="") {
            $error[]=array("id"=>'form','msg'=>"Field cant be empty");
            }
            if (count($error)==0) {
            $sql = "SELECT * FROM `tbl_user` WHERE `email`='".$email."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {         

            if ($row['email']==$email && $row['password']==$password) {
                if ($row['is_admin']==1) {
                    $_SESSION['userdata']=array('userid'=>$row['email'],
                    'email'=>$row['user_name'],'name'=>$row['name']);  
                    
                    header('Location:./admin/index.php'); 
                } 
                else if($row['is_admin']==0 && $row['active']==1){

                    $_SESSION['userdata']=array('userid'=>$row['email'],
                    'email'=>$row['user_name'],'name'=>$row['name'],'userno'=>$row['mobile']);  
                    echo  "<script>alert('Email/Mobile No. Verification needed, With Out verify no access for LogIn');window.location='newotp.php';</script>";
                    
                    // header('Location:');
                }else if($row['is_admin']==0 && $row['active']==0){

                    $_SESSION['userdata']=array('userid'=>$row['email'],
                    'email'=>$row['user_name'],'name'=>$row['name'],'userno'=>$row['mobile']);  
                    header('Location:./admin/addprod.php');
                }

            } else {
              echo "<p style='color:red;margin:10px 0px 0px 30%;'>Sorry, we couldn't find account with this Username or Password does'nt match</p>";
            }
            }
            } 
            } 
            else {
            foreach ($error as $err) {
            $display=$err['msg'];
            }
            }
        }
        
        function register($name,$mobile,$email,$password,$confirmpassword,$security_question,$security_answer,$date,$conn)
        {       
            $error=array();
            if ($name=="" ||$mobile=="" || $email=="" || $password=="" || $confirmpassword=="") {
                $error[]=array("id"=>'form','msg'=>"Field cant be empty");
            }
            if ($password!=$confirmpassword) {
                $error[]=array("id"=>'form','msg'=>"Password does not matches ");
            }
            $sql1 = "SELECT * FROM tbl_user WHERE email='".$email."'";
            $result = $conn->query($sql1);

            if ($result->num_rows > 0) {
                $error[]=array("id"=>'form','msg'=>"Username/Email already present");
            }            

            if (count($error)==0) {
                $password=md5($password);
                    // $sql = "INSERT INTO tbl_user (email, name, mobile, email_approved, phone_approved, active, is_admin, sign_up_date, password)
                    // VALUES ('".$email."','".$name."','".$mobile."',0,0,0,1,'".$date."','".$password."',)";

                    $sql = "INSERT INTO tbl_user (email, name, mobile, email_approved, phone_approved, active, is_admin, sign_up_date, password, security_question, security_answer)
                    VALUES ('".$email."','".$name."','".$mobile."',0,0,0,0,'".$date."','".$password."','".$security_question."','".$security_answer."')";
                if ($conn->query($sql) === true) {
                     echo  "<script>alert('Registration done successfully');</script>";
                    echo  "<script>alert('Please verify your Email/Mobile No. to LogIn');window.location='newotp.php';</script>";
                    
                } else {
                     echo '<p style="color:red;margin-left:30%;font-size:20px;
                    margin-top:10px">Registration Unsuccesful<p>';    
                }
            } else {
                foreach ($error as $err) {
                    $display=$err['msg'];
                }
            }
        }    
        
        
        public function generateRandomString($length = 6)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            
            return $randomString;
        }





        
       
}


    

?>