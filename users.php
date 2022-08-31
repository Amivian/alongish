<?php
// require "database.php";
    class User{

        public $con;
        public function __construct(){
            $this->con = new mysqli('localhost', 'root', '', 'homes');
        }

        // create user and send verification link to email
        
     	public function registerUser($fname,$lname,$uname,$pwd,$cpwd, $email,$phone,$tstate,$tcity,$activationcode,$status){
   
            if($pwd === $cpwd){
                    $headers="";
                    $ms="";
                    $encpass = md5($pwd);
                    $activationcode=md5($email.time());
                    $status='pending';
                    $sql = "INSERT INTO agents(a_fname,a_lname,a_username,a_pwd,a_email,a_phone,states_id,city_id,activationcode,status) VALUES('$fname','$lname','$uname','$encpass','$email','$phone','$tstate','$tcity','$activationcode','$status')";
                    // die($sql);
                    $result = $this->con->query($sql);    
                        if($result){
                            $to=$email;
                            $msg= "Thanks for new Registration.";
                            $subject="Email verification (alongish.com)";
                            $headers .= "MIME-Version: 1.0"."\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                            $headers .= 'From:Alongish | Real Estate <info@alongish.com>'."\r\n";
                            $ms.="<html></body><div><div>Dear $fname " . " $lname,</div></br></br>";
                            $ms.="<div style='padding-top:8px;'>Please click The following link to verify and activate of your Alongish Account </div>
                            <div style='padding-top:10px;'><a href='http://localhost/homes/verification.php?code=$activationcode'>Click Here</a></div>
                            <div style='padding-top:4px;'>Powered by <a href='alongish.com'>alongish.com</a></div></div>
                            </body></html>";
                            mail($to,$subject,$ms,$headers);
                        	$msg='Registration successful, please verify in the registered Email-Id';
                            }else{
                                $msg="Confirm Password does not Match!";
                            }
                            echo "<script>alert('Data not inserted');</script>";
                            }
                            
                return $msg;
                }
     



        // email link verification confirmation
        public function emailVerification($code){
            $sql= "SELECT * FROM agents WHERE activationcode='$code'";
            $result = $this->con->query($sql);
        $num=mysqli_fetch_array($result);
        if($num>0)
        {
        $st='pending';
        $sql1 ="SELECT agent_id FROM agents WHERE activationcode='$code' and status='$st'";
        // die($sql1);
        $result1 = $this->con->query($sql1);
        $result4=mysqli_fetch_array($result1);
        if($result4>0)
        {
        $st='verified';
        $sql2="UPDATE agents SET status='$st' WHERE activationcode='$code'";
        // die($sql2);
        $result2 = $this->con->query($sql2);
        return true;
        }
        return 0;
        }
        }


// login verified user
public function loginUser($email,$uname,$pwd){
    if($pwd){
        $encpass = md5($pwd);
        $sql = "SELECT * FROM agents WHERE (a_email='$email' OR a_username='$uname') AND a_pwd='$encpass'";
        $result = $this->con->query($sql);
        $num=mysqli_fetch_array($result);
        $status=$num['status'];
        if($num>0){	
            if($status=='pending')
            {
            $_SESSION['action1']="Verify  your Email Id by clicking  the link In your mailbox";
            }
            else {
                $_SESSION['id']=$num['agent_id'];
                $_SESSION['fname']=$num['a_fname'];
                $_SESSION['lname']=$num['a_lname'];
                $_SESSION['username']=$num['a_username'];
                $_SESSION['email']=$num['a_email'];
                $extra="dashboard.php";
                $host=$_SERVER['HTTP_HOST'];
                $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                header("location:http://$host$uri/$extra");
                exit();
                }
                }
                else
                {
                $_SESSION['action1']="Invalid username or password";
                $extra="login.php";
                $host  = $_SERVER['HTTP_HOST'];
                $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                
                header("location:http://$host$uri/$extra");
                
                exit();
                
                }

    }

}


//  get state
public function get_state($selected=''){
    $m = "SELECT * FROM states";
  $result = $this->con->query($m);
   echo "<select name='state' id='allstate' class='form-control form-control-lg wide'>";
   echo "<option value=''>Select State</option>";
   while($data = $result->fetch_assoc()){
       $state = $data['states_name'];
       $id = $data['states_id'];
       if ($selected == $id) {
           echo "<option value='$id' selected>$state</option>";
       }
       else{
            echo "<option value='$id'>  $state </option>";
        }
    }
echo "</select>";

}

// get city
public function get_city($state_id, $city_id){
    $k = "SELECT * FROM city WHERE states_id='$state_id'";
    $result = $this->con->query($k);

    echo "<select name='city' id='citi' class='form-control form-control-lg wide'>";

    while($data = $result->fetch_assoc()){
        $lga= $data['city_name'];
        $id = $data['city_id'];
        if ($city_id == $id) {
            echo "<option value='$id' selected> $lga </option>";
        }
        else{
            echo "<option value='$id'> $lga </option>";
         }
    }
    echo "</select>";
}



// get user details and display on the dashboard
public function getUser($id){
    $sql = "SELECT * FROM agents 
    LEFT JOIN states ON agents.states_id = states.states_id 
    LEFT JOIN city ON agents.city_id = city.city_id 
    WHERE agent_id='$id' 
    AND agents.deleted='0'";
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    
    return $row;
}


// upload of profile image
public function uploadpix($pic_array){
	$filename = $pic_array['name'];
	$tmp_name = $pic_array['tmp_name'];
	$filetype = $pic_array['type'];
	$size = $pic_array['size'];

	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$newfilename = time(). ".$ext";
	// echo $ext;
	// die();
	if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png' || $ext =='jfif' || $ext == 'gif') {
		move_uploaded_file($tmp_name, "images/users/$newfilename");
		$id= $_SESSION['id'];
		$sql = "UPDATE agents SET a_pix = '$newfilename' WHERE agent_id='$id'";
		// die($sql);
		$result=$this->con->query($sql);
		if ($result) {
			$msg="Logo Uploaded successfully";
		header('location:user-profile.php?m='. $msg);
		}else{	
		$msg="Logo Upload Failed";
		header('location:user-profile.php?m='. $msg);
		}
	}
}


// public function updateAgent($id,$fname,$lname,$phone,$tstate, $tcity, $business, $pix){
public function updateAgent($id,$fname,$lname,$phone, $business, $about, $pix){
    // $pwd = md5('pwd');
//    $sql="UPDATE agents SET a_fname='$fname',a_lname='$lname', a_phone='$phone',states_id='$tstate', city_id='$tcity',businessname='$business' WHERE agent_id = '$id' ";
   $sql="UPDATE agents SET a_fname='$fname',a_lname='$lname', a_phone='$phone',businessname='$business', about = '$about' WHERE agent_id = '$id' ";
  
   $result= $this->con->query($sql);
//   
      if($result === true) {
        $filename = $pix['name'];
        $tmp_name = $pix['tmp_name'];
        $filetype = $pix['type'];
        $size = $pix['size'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION); 
            $newfilename = time(). ".$ext";
        if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'jfif') {
            echo "Uploaded successfully";
            move_uploaded_file($tmp_name, "images/users/$newfilename"); 
            $sql2 = "UPDATE agents SET a_pix = '$newfilename' WHERE agent_id='$id'";
            // die($sql2);
            $this->con->query($sql2);  
            $msg = " Record Updated";
            header("location: user-profile.php?msg=".$msg);
            }else{
            $mssg= "Error updating record, try again";
            header("location: details.php?mssg=".$mssg);
        }
        return true;
    }
        }


        // Change password
   public function changePassword( $id, $pwd, $npwd){   
        if ($pwd) {
            $pwd = md5($pwd);
        $sql="SELECT a_pwd FROM agents WHERE (agent_id= '$id' AND a_pwd = '$pwd')";
        // die($sql);
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();

            if($row['a_pwd'] == $pwd){
            // if($result){
            $npwd = md5($npwd);
            $sql2="UPDATE agents SET a_pwd = '$npwd' WHERE agent_id = '$id'";
            // die($sql2);
            $result2 = $this->con->query($sql2);

            
            return true;
            }
            

        }

            
            
        
   }


   // register admin
function add_admin($username,$password){
    $password = md5($password);
$sql = " SELECT * FROM agents WHERE a_email='$username' AND a_pwd='$password' AND role = 'admin'";
// die($sql);
$result= $this->con->query($sql);
if($result->num_rows  > 0){
  $rows = $result->fetch_array();
        session_start();
    $_SESSION['id'] = $rows['agent_id'];
              $_SESSION['fname'] = $rows['a_fname'];
              $_SESSION['lname'] = $rows['a_lname'];
              $_SESSION['uname'] = $rows['a_username'];
              $_SESSION['email'] = $rows['a_email'];
  

        header('location:../dashboard.php');
        return true;

        }else{
            $msg="Invalid Username or Password";

                header('location:../admin/index.php?'. $msg);
        }
}

public function getAdmin(){
    $sql = "SELECT about, vision, mission FROM  agents 
    LEFT JOIN states ON agents.states_id = states.states_id 
    LEFT JOIN city ON agents.city_id = city.city_id 
    WHERE role ='admin'
    AND  deleted='0'";
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    
    return $row;
}


}
?>