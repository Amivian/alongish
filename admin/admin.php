<?php
include "add-database.php";
    class Admin{
        public $con;
        public function __construct(){
            $this->con = new mysqli('localhost', 'root', '', 'homes');
        }

                // Login admin
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


 
        public function getAdmin($id){
            $sql = "SELECT * FROM  agents JOIN states ON agents.states_id = states.states_id JOIN city ON agents.city_id = city.city_id WHERE agent_id='$id' AND role ='admin'";
            // die($sql);
            $result = $this->con->query($sql);
            $row = $result->fetch_assoc();
            
            return $row;
        }
        
        
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


       public function propertyCount(){
        $sql= "SELECT COUNT(property_id) FROM property WHERE deleted='0'";
        $result= $this->con->query($sql);
        // die($sql);
        $row= mysqli_fetch_row($result);
        return $row[0];
         }
    
    
        public function agentCount(){
            $sql= "SELECT COUNT(agent_id) FROM agents WHERE deleted='0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
        }
         
        public function swapCount(){
            $sql= "SELECT COUNT(swap_id) FROM swaps WHERE deleted='0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
        }

        public function jointVentureCount(){
            $sql= "SELECT COUNT(jointventure_id) FROM joint_venture WHERE deleted='0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
        }

        public function teamCount(){
            $sql= "SELECT COUNT(team_id) FROM team WHERE deleted='0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
        }
    
        public function jointMessageCount(){
            $sql= "SELECT COUNT(message_id) FROM jointventure_message WHERE deleted='0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
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
       }else{
       echo "<option value='$id'>  $state </option>";
   }

}echo "</select>";

}

// get city
public function get_city($id){
    $k = "SELECT * FROM city WHERE states_id='$id'";
  $result = $this->con->query($k);
   echo "<select name='city' id='citi' class='form-control form-control-lg wide'>";
   while($data = $result->fetch_assoc()){
       $lga= $data['city_name'];
       $id = $data['city_id'];
   echo "<option value='$id'> $lga </option>";
}echo "</select>";
}


// get user details and display on the dashboard
public function getUser($id){
    $sql = "SELECT * FROM agents 
    JOIN states ON agents.states_id = states.states_id 
    JOIN city ON agents.city_id = city.city_id 
    WHERE agent_id='$id' 
    AND agents.deledted='0' ";
    // die($sql);
    // $sql = "SELECT * FROM agents WHERE agent_id='$id'";
    $result = $this->con->query($sql);
    // die($sql);
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
	if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png') {
		move_uploaded_file($tmp_name, "../images/users/$newfilename");
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
        public function deleteUser($id){
            $sql= "DELETE FROM agents WHERE agents.agent_id = '$id'";
            $sql="UPDATE agents SET deleted='1' WHERE agents.agent_id = '$id'";   
            // die($sql);         
            $result= $this->con->query($sql);
            return true;
        }

        public function updateAgent($id,$fname,$lname,$phone,$state, $city, $business, $pix,$mission, $vision,$about  ){
       $sql="UPDATE agents SET 
       a_fname='$fname',
       a_lname='$lname', 
       a_phone='$phone',
       states_id ='$state',
       city_id ='$city',
       businessname='$business', 
       about = '$about',
       mission='$mission',
       vision='$vision'
       WHERE agent_id ='$id'";
  
// die($sql);
   $result= $this->con->query($sql);
      if($result === true) {
        $filename = $pix['name'];
        $tmp_name = $pix['tmp_name'];
        $filetype = $pix['type'];
        $size = $pix['size'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION); 
            $newfilename = time(). ".$ext";
        if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'jfif') {
            echo "Uploaded successfully";
            move_uploaded_file($tmp_name, "../images/users/$newfilename"); 
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


         
         public function requestCount(){
            $sql= $sql= "SELECT COUNT(request_id) FROM request WHERE request.request_id = '0'";
            $result= $this->con->query($sql);
            // die($sql);
            $row= mysqli_fetch_row($result);
            return $row[0];
        } 
        
      
        public function deleteRequest($id){
            $sql= "DELETE FROM request WHERE request_id = '$id'";
            $sql = "UPDATE request SET deleted = '1' WHERE request.request_id = '$id'";
            $result= $this->con->query($sql);
            // die($sql)
            return true;

        }

    }




?>

