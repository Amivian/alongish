<?php
// include "../database.php";
    class Property{
        public $con;
        public function __construct(){
            $this->con = new mysqli('localhost', 'root', '', 'homes');
        
        }

        public function addProperty($userid,$staff,$title,$prodesc,$price,$area,$address,$status,$type,$bedrooms,$bathrooms,$furnished,$serviced,$shared,$state,$city,$extra, $images){
            $sql="INSERT INTO property SET agent_id ='$userid',
                                           staff= '$staff',
                                           property_title='$title',
                                           property_description='$prodesc',
                                           property_price='$price',
                                           property_area='$area',
                                           property_address='$address',
                                           pstatus_id= '$status',
                                           ptype_id= '$type',
                                           bedroom_id='$bedrooms',
                                           bathroom_id='$bathrooms',
                                          furnished='$furnished',
                                          serviced='$serviced',
                                          shared='$shared',
                                           states_id='$state',
                                           city_id='$city'";
                                           
                                        //   die($sql);
            	$result= $this->con->query($sql);	
               	$property_id = $this->con->insert_id;




        // //////////////////////////////////////


        if ($result) {
            if ($property_id) {
                $count = 10000;
                $output_dir = "../images/property/"; /* Path for file upload */
                $fileCount = count($images['name']);

                for ($i = 0; $i < $fileCount; $i++) {
                    $RandomNum = time() . "$count";


                    $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
                    $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
                    

                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);
                    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $NewImageName = 'property' . $property_id . '-listing-image-' . $RandomNum . '.' . $ImageExt;

                    $ret[$NewImageName] = $output_dir . $NewImageName;
                    move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);

                    $count++;

                    $sql2 = "INSERT INTO images (property_id, image_url) VALUES ('$property_id', '$NewImageName')";
                    // $result2 = $this->db_conn->query($sql2);
                    $result2 = $this->con->query($sql2);

                    
                }

                
            }
        }

        if ($result) {
            if ($property_id) {
                        if(!empty($extra)){
                            $check ="";
                            foreach ($extra as $add){
                                $check = $add;
                                $sql3="INSERT INTO property_feature SET property_id= '$property_id',
                                                                       pfeature_name='$check'";
                                $result3 = $this->con->query($sql3);
                    
                            }
                        }

                         return true;

                    }

                }




        ////////////////////////////////////////

     
}

//  get state
public function get_state($selected=''){
    $m = "SELECT * FROM states";
  $result = $this->con->query($m);
   echo "<select name='state' id='allstate' class='form-control form-control-lg '>";
   echo "<option value=''>State</option>";
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
   echo "<select name='city' id='citi' class='form-control form-control-lg '>";
   while($data = $result->fetch_assoc()){
       $lga= $data['city_name'];
       $id = $data['city_id'];
   echo "<option value='$id'> $lga </option>";
}echo "</select>";
}



function getBedroom($selected=''){
    $bedroom = "SELECT * FROM bedroom";
   $result = $this->con->query($bedroom);
    echo "<select name='bed' value='bed' id='allbed' class='form-control form-control-lg '>";
    echo "<option value=''>-- Bedroom --</option>";
    while($data = $result->fetch_assoc()){
        $bed = $data['bedroom_no'];
        $id = $data['bedroom_id'];
        if ($selected == $id) {
            echo "<option value='$id' selected>$bed</option>";
        }else{
        echo "<option value='$id'>  $bed </option>";
    }

}echo "</select>";
}

function getBathroom($selected=''){
    $bathroom = "SELECT * FROM bathroom";
   $result = $this->con->query($bathroom);
    echo "<select name='bath' value='bath' id='allbath' class='form-control form-control-lg ' >";
    echo "<option value=''>-- Bathroom --</option>";
    while($data = $result->fetch_assoc()){
        $bath = $data['bathroom_no'];
        $id = $data['bathroom_id'];
        if ($selected == $id) {
            echo "<option value='$id' selected>$bath</option>";
        }else{
        echo "<option value='$id'>  $bath </option>";
    }

}echo "</select>";
}


function getPropertytype($selected=''){
    $type= "SELECT * FROM property_type";
   $result = $this->con->query($type);
    echo "<select name='type' value='type' id='alltype' class='form-control form-control-lg ' >";
    echo "<option value=''>--  Type --</option>";
    while($data = $result->fetch_assoc()){
        $ptype = $data['ptype_name'];
        $id = $data['ptype_id'];
        if ($selected == $id) {
            echo "<option value='$id' selected>$ptype</option>";
        }else{
        echo "<option value='$id'>  $ptype </option>";
    }

}echo "</select>";
}


function getStatus($selected=''){
    $status = "SELECT * FROM property_status";
   $result = $this->con->query($status);
    echo "<select name='status' value='status' id='allstatus' class='form-control form-control-lg ' >";
    echo "<option value=''>-- Purpose --</option>";
    while($data = $result->fetch_assoc()){
        $pstatus = $data['pstatus_name'];
        $id = $data['pstatus_id'];
        if ($selected == $id) {
            echo "<option value='$id' selected>$pstatus</option>";
        }else{
        echo "<option value='$id'>  $pstatus </option>";
    }

}echo "</select>";
}

public function showProperties(){
    $sql= "SELECT * FROM property JOIN agents ON property.agent_id = agents.agent_id JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id ORDER BY date_posted DESC";
    $result = $this->con->query($sql);
    	$data =[];
    	while($row = $result->fetch_assoc()) {
    		$data[] = $row;
    	} 
    	return $data;
}

public function getSingleImage($id){
    $sql = "SELECT * FROM images WHERE property_id = $id";
    // die($sql);
    $result = $this->con->query($sql);
    while($row = $result->fetch_assoc()) {
        $singleImage = $row['image_url'];
        return $singleImage;
    } 

}

public function getAllImages($id){
    $sql = "SELECT * FROM images WHERE property_id = $id";
    $result = $this->con->query($sql);
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    } 
    return $data;
}

public function getAllFeatures($id){
    $sql = "SELECT * FROM property_feature WHERE property_id = $id";
    $result = $this->con->query($sql);
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    } 
    return $data;
}

public function showPropertyDetails($id){
    $sql= "SELECT * 
        FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
        JOIN states ON property.states_id = states.states_id 
        JOIN city ON property.city_id = city.city_id 
        LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
        LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
        LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id 
        LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id 
        WHERE property.property_id='$id' 
        ORDER BY date_posted DESC";
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
        
public function getAgentProperties($id){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE property.agent_id = '$id'"); 
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 3;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM property JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id  JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id WHERE property.agent_id ='$id'  ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_three($webpage,$page,$id){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE property.agent_id = '$id'"); 
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 3;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}
// public function getAgentProperties($id){
//         $sql = "SELECT * FROM property JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id  JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id WHERE property.agent_id ='$id' ORDER BY date_posted DESC";
//         // die($sql);
//         $result=$this->con->query($sql);
        
//     	$data = [];
//         // die($sql);
//     	while($row = $result->fetch_assoc()) {
//     		$data[] = $row;
//     	}
//     	return $data;

//     }


    public function deleteAgentProperty($id){
        $sql= "DELETE FROM property WHERE property.property_id = '$id'";
        $detail = $this->con->query($sql);
        // die($sql);
        if ($detail) {            
            $sql1= "DELETE FROM images WHERE images.property_id = '$id'";
            // die($sql1);
            $detail2 = $this->con->query($sql1);
            }
        if($detail){
            $sql2= "DELETE FROM  property_feature WHERE  property_feature.property_id = '$id'";            
            $detail2 = $this->con->query($sql2);
        } 
        return true;
    }




    public function  getRegUsers(){
        // get the pagenum.  If it doesn't exist, set it to 1
    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
    // set the number of entries to appear on the page
    $sql1 = mysqli_query($this->con, "SELECT COUNT(agent_id)  AS total_records FROM agents");
    $total_records= mysqli_fetch_array($sql1);
    $total_records = $total_records['total_records'];
    $entries_per_page = 10;   
    // total pages is rounded up to nearest integer
    $total_pages = ceil($total_records / $entries_per_page); 
    // offset is used by SQL query in the LIMIT
    $offset = (($page * $entries_per_page) - $entries_per_page); 
    
    
    $sql = "SELECT * FROM agents JOIN states ON agents.states_id = states.states_id JOIN city ON agents.city_id = city.city_id ORDER BY datereg DESC LIMIT $offset, $entries_per_page";
    // die($sql);
    $result= $this->con->query($sql);
    $data =[];
        while($row = $result->fetch_array()) {
            $data[] = $row;
        } 
        return $data;
    
    }
    
    
    public function pagination_agents($webpage,$page){ 
    
    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
    $sql1 = mysqli_query($this->con, "SELECT COUNT(agent_id)  AS total_records FROM agents");
    $total_records= mysqli_fetch_array($sql1);
    $total_records = $total_records['total_records'];
    // set the number of entries to appear on the page
    $entries_per_page = 10;   
    // total pages is rounded up to nearest integer
    $total_pages = ceil($total_records/$entries_per_page); 
    // offset is used by SQL query in the LIMIT
    $offset = (($page * $entries_per_page) - $entries_per_page); 
    // Maximum number of links per page.  If exceeded, google style pagination is generated
    $max_links = 10; 
    $h=1; 
    if($page>$max_links){ 
    $h=(($h+$page)-$max_links); 
    } 
    if($page>=1){ 
    $max_links = $max_links+($page-1); 
    } 
    if($max_links>$total_pages){ 
    $max_links=$total_pages+1; 
    } 
    if($page > 1){
    echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
    }
    
    if($total_pages!=1){ 
    for ($i=$h;$i<$max_links;$i++){ 
        if($i==$page){ 
            echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
        } 
        else{ 
            echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
        } 
    } 
    } 
    
    if(($page >=1)&&($page!=$total_pages)){ 
    echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
    } 
    }


    public function agentPropertyCount($id){
        $sql= "SELECT COUNT(property_id) FROM property WHERE property.agent_id ='$id'";
        $result= $this->con->query($sql);
        //  die($sql);
        $row= mysqli_fetch_row($result);
        return $row[0];
    }  

    public function agentMessageCount($id){
        $sql= "SELECT COUNT(message_id) FROM jointventure_message WHERE jointventure_message.agent_id ='$id'";
        $result= $this->con->query($sql);
        //  die($sql);
        $row= mysqli_fetch_row($result);
        return $row[0];
    }  

    public function agentjointVentureCount($id){
        $sql= "SELECT COUNT(jointventure_id) FROM joint_venture WHERE joint_venture.agent_id ='$id'";
        $result= $this->con->query($sql);
        //  die($sql);
        $row= mysqli_fetch_row($result);
        return $row[0];
    }  

    public function agentswapCount($id){
        $sql= "SELECT COUNT(swap_id) FROM swaps WHERE swaps.agent_id ='$id'";
        $result= $this->con->query($sql);
        //  die($sql);
        $row= mysqli_fetch_row($result);
        return $row[0];
    }  

 public function showAgentMessages($id){
        $sql = "SELECT * FROM property_message JOIN agents ON property_message.agent_id = agents.agent_id WHERE property_message.agent_id ='$id'";
        // die($sql);
        $result=$this->con->query($sql);
    	$data = [];
    	while($row = $result->fetch_assoc()) {
    		$data[] = $row;
    	}
    	return $data;

    }

    // public function delete($id){
    //     $sql= "DELETE FROM messages WHERE messages.message_id = '$id'";
    //     $detail = $this->con->query($sql);
    //     // die($sql);
    //     if ($detail) {
    //         $msg= "Delete Successfully";
    //         header("location:dashboard.php?msg=".$msg);
    //     }else{
    //         $mssg= "Error deleting record, try again";
    //         header("location:dashboard.php?mssg=".$mssg);
    //     }
    // }

    
    public function deleteProperty($id){
        $sql= "DELETE FROM property WHERE property.property_id = '$id'";
        $detail = $this->con->query($sql);
        // die($sql);
        
        if ($detail) {            
            $sql1= "DELETE FROM images WHERE images.property_id = '$id'";
            // die($sql1);
            $detail2 = $this->con->query($sql);
            }

        if($detail){
                $sql2= "DELETE FROM  property_feature WHERE  property_feature.property_id = '$id'";            
                $detail2 = $this->con->query($sql2);
            }
            return true;
    }

    public function showRecentProperties(){
        $sql= "SELECT * FROM property JOIN agents ON property.agent_id = agents.agent_id JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id order by date_posted desc limit 3";
        $result = $this->con->query($sql);
        // die($sql);
        $data =[];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        } 
        return $data;

     }

    // public function getAllProperties(){
    //     $sql="SELECT * FROM property JOIN agents ON property.agent_id = agents.agent_id JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id  order by date_posted desc";
    //          $result= $this->con->query($sql);
    //          $data = [];
    //        while($row = $result->fetch_assoc()) {
    //            $data[] = $row;
    //    } 
    //    return $data;
    //    }
     

           
public function getAllProperties(){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(property_id)  AS total_records FROM property");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 3;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM property JOIN agents ON property.agent_id = agents.agent_id JOIN states ON property.states_id = states.states_id JOIN city ON property.city_id = city.city_id JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id JOIN property_status ON property.pstatus_id = property_status.pstatus_id JOIN property_type ON property.ptype_id=property_type.ptype_id JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id  ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_seven($webpage,$page){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(property_id)  AS total_records FROM property");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 3;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}


public function createSwaps($userid,$staff,$name,$title,$prodesc,$need,$swapdec,$address,$state,$city,$images,$extra){
           
       $sql="INSERT INTO swaps SET
        agent_id ='$userid',
        staff='$staff',
         swap_name = '$name',
       swap_description='$prodesc',
       sitem_description='$swapdec',
      swap_address='$address',
       swap_item='$title',
       swap_need='$need',
       states_id='$state',
       city_id='$city'";
       
    //   die($sql);
$result= $this->con->query($sql);	
$swap_id = $this->con->insert_id;




// //////////////////////////////////////


if ($result) {
if ($swap_id) {
$count = 10000;
$output_dir = "../images/swaps/"; /* Path for file upload */
$fileCount = count($images['name']);

for ($i = 0; $i < $fileCount; $i++) {
$RandomNum = time() . "$count";


$ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
$ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/


$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
$ImageExt = str_replace('.', '', $ImageExt);
$ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
$NewImageName = 'swap' . $swap_id . '-listing-image-' . $RandomNum . '.' . $ImageExt;

$ret[$NewImageName] = $output_dir . $NewImageName;
move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);

$count++;

$sql2 = "INSERT INTO images (swap_id, image_url) VALUES ('$swap_id', '$NewImageName')";
// die($sql2);
$result2 = $this->con->query($sql2);


}
}
}


if ($result) {
    if ($swap_id) {
                if(!empty($extra)){
                    $check ="";
                    foreach ($extra as $add){
                        $check = $add;
                        $sql3="INSERT INTO swap_document SET swap_id= '$swap_id',
                                                               document_name='$check'";
                        // die($sql3);
                        $result3 = $this->con->query($sql3);
            
                    }
                }

                 return true;

            }

        }
////////////////////////////////////////

        }

public function showSwaps(){
            $sql="SELECT * FROM swaps JOIN agents ON swaps.agent_id = agents.agent_id JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id order by date_posted desc limit 3";
            // die($sql);
                 $result= $this->con->query($sql);
                 $data = [];
               while($row = $result->fetch_assoc()) {
                   $data[] = $row;
           } 
           return $data;
           }

           public function showSwapsDetails($id){
            $sql= "SELECT * FROM swaps JOIN agents ON swaps.agent_id = agents.agent_id JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id WHERE swaps.swap_id= '$id'";
            // die($sql);
            $result = $this->con->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
      
        public function editSwaps($name,$title,$prodesc,$need,$swapdec,$address,$state,$city,$images,$extra,$id){
           
            $sql="UPDATE swaps SET
              swap_name = '$name',
            swap_description='$prodesc',
            sitem_description='$swapdec',
           swap_address='$address',
            swap_item='$title',
            swap_need='$need',
            states_id='$state',
            city_id='$city' WHERE swaps.swap_id='$id'";
            
        //    die($sql);
     $result= $this->con->query($sql);	
    //  $swap_id = $this->con->insert_id;
     
     
     
     
     // //////////////////////////////////////
     if ($result) {
     $count = 10000;
     $output_dir = "../images/swaps/"; /* Path for file upload */
     $fileCount = count($images['name']);
     
     for ($i = 0; $i < $fileCount; $i++) {
     $RandomNum = time() . "$count";
     
     
     $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
     $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
     
     
     $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
     $ImageExt = str_replace('.', '', $ImageExt);
     $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
     $NewImageName = 'swap' . $id . '-listing-image-' . $RandomNum . '.' . $ImageExt;
     
     $ret[$NewImageName] = $output_dir . $NewImageName;
     move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);
     
     $count++;
     
     $sql2 = "UPDATE images SET image_url= '$NewImageName' WHERE images.swap_id= '$id'";
    //  die($sql2);
     $result2 = $this->con->query($sql2);
     
     
     }
     }
     
         
     if ($result) {
        if(!empty($extra)){
            $check ="";
            foreach ($extra as $add){
                $check = $add;
                $sql3="UPDATE swap_document SET doument_name='$check' WHERE swap_id= '$id'";
                $result3 = $this->con->query($sql3);
    
            }
         return true;

    }

}
     }
     
     
     
     ////////////////////////////////////////
     
             
     
        // public function getAllSwaps(){
        //     $sql="SELECT * FROM swaps JOIN agents ON swaps.agent_id = agents.agent_id JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id  order by date_posted desc ";
        //          $result= $this->con->query($sql);
        //          $data = [];
        //        while($row = $result->fetch_assoc()) {
        //            $data[] = $row;
        //    } 
        //    return $data;
        //    }

            

public function getContactMessage($id){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records FROM agent_message WHERE agent_message.agent_id ='$id' ");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM agent_message JOIN agents ON agent_message.agent_id = agents.agent_id WHERE agent_message.agent_id ='$id' ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_sms($webpage,$page,$id){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id) AS total_records FROM agent_message WHERE agent_message.agent_id ='$id'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}






        public function getAllSwaps(){
            // get the pagenum.  If it doesn't exist, set it to 1
        if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id)  AS total_records FROM swaps");
        $total_records= mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;   
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page); 
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page); 
        
        
        $sql = "SELECT * FROM swaps JOIN agents ON swaps.agent_id = agents.agent_id JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id  order by date_posted desc LIMIT $offset, $entries_per_page";
        // die($sql);
        $result= $this->con->query($sql);
        $data =[];
            while($row = $result->fetch_array()) {
                $data[] = $row;
            } 
            return $data;
        
        }
        
        
        public function pagination_swaps($webpage,$page){ 
        
        if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id)  AS total_records FROM swaps");
        $total_records= mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;   
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records/$entries_per_page); 
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page); 
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10; 
        $h=1; 
        if($page>$max_links){ 
        $h=(($h+$page)-$max_links); 
        } 
        if($page>=1){ 
        $max_links = $max_links+($page-1); 
        } 
        if($max_links>$total_pages){ 
        $max_links=$total_pages+1; 
        } 
        if($page > 1){
        echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
        }
        
        if($total_pages!=1){ 
        for ($i=$h;$i<$max_links;$i++){ 
            if($i==$page){ 
                echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
            } 
            else{ 
                echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
            } 
        } 
        } 
        
        if(($page >=1)&&($page!=$total_pages)){ 
        echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
        } 
        }
        
        

           public function getSwapImage($id){
            $sql = "SELECT * FROM images WHERE swap_id = $id";
            $result = $this->con->query($sql);
            while($row = $result->fetch_assoc()) {
                $singleImage = $row['image_url'];
                return $singleImage;
            } 
        
        }

        
        public function deleteSwap($id){
            $sql= "DELETE FROM swaps WHERE swaps.swap_id = '$id'";
            $detail = $this->con->query($sql);
            // die($sql);
            if ($detail) {            
                $sql1= "DELETE FROM images WHERE images.swap_id = '$id'";
                // die($sql1);
                $detail2 = $this->con->query($sql);
                }
                return true;
        
        }

        // public function getAgentSwaps($id){
        //     $sql = "SELECT * FROM swaps JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id  WHERE swaps.agent_id ='$id' order by date_posted desc";
        //     // die($sql);
        //     $result=$this->con->query($sql);
            
        //     $data = [];
        //     // die($sql);
        //     while($row = $result->fetch_assoc()) {
        //         $data[] = $row;
        //     }
        //     return $data;
    
        // }
        public function getAgentSwaps($id){
            // get the pagenum.  If it doesn't exist, set it to 1
    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
    // set the number of entries to appear on the page
    $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id) As total_records FROM swaps WHERE swaps.agent_id = '$id'"); 
    $total_records= mysqli_fetch_array($sql1);
    $total_records = $total_records['total_records'];
    $entries_per_page = 1;   
    // total pages is rounded up to nearest integer
    $total_pages = ceil($total_records / $entries_per_page); 
    // offset is used by SQL query in the LIMIT
    $offset = (($page * $entries_per_page) - $entries_per_page); 
    
    
    $sql = "SELECT * FROM swaps JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id  WHERE swaps.agent_id ='$id' ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
    // die($sql);
    $result= $this->con->query($sql);
    $data =[];
            while($row = $result->fetch_array()) {
                $data[] = $row;
            } 
            return $data;
    
    }
    
    
    public function pagination_two($webpage,$page,$id){ 
    
    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
    $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id) As total_records FROM swaps WHERE swaps.agent_id = '$id'"); 
    $total_records= mysqli_fetch_array($sql1);
    $total_records = $total_records['total_records'];
    // set the number of entries to appear on the page
    $entries_per_page = 1;   
    // total pages is rounded up to nearest integer
    $total_pages = ceil($total_records/$entries_per_page); 
    // offset is used by SQL query in the LIMIT
    $offset = (($page * $entries_per_page) - $entries_per_page); 
    // Maximum number of links per page.  If exceeded, google style pagination is generated
    $max_links = 10; 
    $h=1; 
    if($page>$max_links){ 
        $h=(($h+$page)-$max_links); 
    } 
    if($page>=1){ 
        $max_links = $max_links+($page-1); 
    } 
    if($max_links>$total_pages){ 
        $max_links=$total_pages+1; 
    } 
      if($page > 1){
        echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
      }
    
    if($total_pages!=1){ 
        for ($i=$h;$i<$max_links;$i++){ 
            if($i==$page){ 
                echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
            } 
            else{ 
                echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
            } 
        } 
    } 
    
    if(($page >=1)&&($page!=$total_pages)){ 
        echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
    } 
    }
    
        public function deleteAgentSwap($id){
            $sql= "DELETE FROM swaps WHERE swaps.swaps_id = '$id'";
            $detail = $this->con->query($sql);
            // die($sql);
            if ($detail) {            
                $sql1= "DELETE FROM images WHERE images.swap_id = '$id'";
                // die($sql1);
                $detail2 = $this->con->query($sql);
                }
                return true;
        }
      
        
public function getSponsorshipMessage($id){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records FROM jointventure_message WHERE jointventure_message.agent_id ='$id' AND jmstatus='approved'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM jointventure_message JOIN agents ON jointventure_message.agent_id = agents.agent_id WHERE jointventure_message.agent_id ='$id' AND jointventure_message.jmstatus='approved' ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_five($webpage,$page,$id){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id) AS total_records FROM jointventure_message WHERE jointventure_message.agent_id ='$id' AND jmstatus='approved'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}

    
        // public function getSponsorshipMessage($id){
        //     $sql = "SELECT * FROM jointventure_message JOIN agents ON jointventure_message.agent_id = agents.agent_id WHERE jointventure_message.agent_id ='$id' ORDER BY date_posted DESC ";
        //     // die($sql);
        //     $result=$this->con->query($sql);
            
        //     $data = [];
        //     // die($sql);
        //     while($row = $result->fetch_assoc()) {
        //         $data[] = $row;
        //     }
        //     return $data;
    
        // }

        
        public function editProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$images,$pid){
            $sql="UPDATE property SET 
                                           property_title='$title',
                                           property_description='$prodesc',
                                           property_price='$price',
                                           property_area='$area',
                                           property_address='$address',
                                           pstatus_id= '$status',
                                           ptype_id= '$type',
                                           bedroom_id='$bedrooms',
                                          furnished='$furnished',
                                          serviced='$serviced',
                                          shared='$shared',                                          
                                          bathroom_id='$bathrooms',
                                           states_id='$state',
                                           city_id= '$city' WHERE property_id='$pid'" ;
                                           
                                          die($sql);
                       $result= $this->con->query($sql);	




        // //////////////////////////////////////


        // if ($result) {
            if ($result) {
                $count = 10000;
                $output_dir = "../images/property/"; /* Path for file upload */
                $fileCount = count($images['name']);

                for ($i = 0; $i < $fileCount; $i++) {
                    $RandomNum = time() . "$count";


                    $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
                    $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
                    

                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);
                    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $NewImageName = 'property' . $pid . '-listing-image-' . $RandomNum . '.' . $ImageExt;

                    $ret[$NewImageName] = $output_dir . $NewImageName;
                    move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);

                    $count++;

                    $sql2 = "UPDATE images  SET image_url= '$NewImageName' WHERE images.property_id= '$pid'";
                    die($sql);
                    $result2 = $this->con->query($sql2);

                    
                }

                
            }
                
            if ($result) {
                        if(!empty($extra)){
                            $check ="";
                            foreach ($extra as $add){
                                $check = $add;
                                $sql3="UPDATE property_feature SET pfeature_name='$check' WHERE property_id= '$pid'";
                                die($sql3);
                                $result3 = $this->con->query($sql3);
                    
                            }
                        }

                         return true;

                    }
                }

                    public function editAgentProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$featured,$images,$pid){
                        $sql="UPDATE property SET 
                                                       property_title='$title',
                                                       property_description='$prodesc',
                                                       property_price='$price',
                                                       property_area='$area',
                                                       property_address='$address',
                                                       pstatus_id= '$status',
                                                       ptype_id= '$type',
                                                       bedroom_id='$bedrooms',
                                                      furnished='$furnished',
                                                      serviced='$serviced',
                                                      shared='$shared',                                          
                                                      bathroom_id='$bathrooms',
                                                       states_id='$state',
                                                       city_id= '$city' WHERE property_id='$pid'" ;
                                                       
                                                      die($sql);
                                   $result= $this->con->query($sql);	
            
            
            
            
                    // //////////////////////////////////////
            
            
                    // if ($result) {
                        if ($result) {
                            $count = 10000;
                            $output_dir = "../images/property/"; /* Path for file upload */
                            $fileCount = count($images['name']);
            
                            for ($i = 0; $i < $fileCount; $i++) {
                                $RandomNum = time() . "$count";
            
            
                                $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
                                $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
                                
            
                                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                                $ImageExt = str_replace('.', '', $ImageExt);
                                $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                                $NewImageName = 'property' . $pid . '-listing-image-' . $RandomNum . '.' . $ImageExt;
            
                                $ret[$NewImageName] = $output_dir . $NewImageName;
                                move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);
            
                                $count++;
            
                                $sql2 = "UPDATE images  SET image_url= '$NewImageName' WHERE images.property_id= '$pid'";
                                die($sql);
                                $result2 = $this->con->query($sql2);
            
                                
                            }
            
                            
                        }
                        if ($result) {
                                    $sql1="UPDATE featured SET  featured='$featured' WHERE property_id= '$pid'";
                                    // die($sql1);
                                    $result3 = $this->con->query($sql1);
                        
                            }
                            
                        if ($result) {
                                    if(!empty($extra)){
                                        $check ="";
                                        foreach ($extra as $add){
                                            $check = $add;
                                            $sql3="UPDATE property_feature SET pfeature_name='$check' WHERE property_id= '$pid'";
                                            die($sql3);
                                            $result3 = $this->con->query($sql3);
                                
                                        }
                                    }
            
                                     return true;
            
                                }
            
            
            
        ////////////////////////////////////////

     
}

public function showAgentDetails($id){
    $sql= "SELECT * FROM agents JOIN states ON agents.states_id = states.states_id JOIN city ON agents.city_id = city.city_id WHERE agents.agent_id='$id'";
    // die($sql);
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


// public function showRequest(){
//     $sql= "SELECT * FROM request JOIN states ON request.states_id = states.states_id JOIN city ON request.city_id = city.city_id  JOIN property_status ON request.pstatus_id = property_status.pstatus_id JOIN property_type ON request.ptype_id=property_type.ptype_id JOIN bedroom ON request.bedroom_id =bedroom.bedroom_id";
//     // die($sql);
//     $result = $this->con->query($sql);
//         $data =[];
//         while($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         } 
//         return $data;

//  }
public function showRequest(){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(request_id)  AS total_records FROM request ");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM request JOIN states ON request.states_id = states.states_id JOIN city ON request.city_id = city.city_id  JOIN property_status ON request.pstatus_id = property_status.pstatus_id JOIN property_type ON request.ptype_id=property_type.ptype_id JOIN bedroom ON request.bedroom_id =bedroom.bedroom_id ORDER BY sent DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_request($webpage,$page){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(request_id)  AS total_records FROM request ");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}



public function addTeam($agent_id,$staff,$fname,$position,$email,$image){
   $sql="INSERT INTO team SET agent_id ='$agent_id',
                              staff = '$staff',
                                t_fname='$fname',
                                position_held='$position',
                                email='$email'";
                                // die($sql);
            	$result= $this->con->query($sql);	
                $team_id = $this->con->insert_id;
                
                                // die($sql);

                if($result) {
                    $filename = $image['name'];
            $tmp_name = $image['tmp_name'];
            $filetype = $image['type'];
            $size = $image['size'];
        
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newfilename = time(). ".$ext";
            if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png' || $ext=='jfif') {
                move_uploaded_file($tmp_name, "../images/team/$newfilename");
                $sql2 = "INSERT INTO images(image_url, team_id) VALUES('$newfilename','$team_id')";

                // die($sql2);

                $result2 = $this->con->query($sql2);
                }
                }
                
                return true;

}

// public function getTeamMembers($id){
//     $sql = "SELECT * FROM team WHERE team.agent_id ='$id'";
//     // die($sql);
//     $result=$this->con->query($sql);    
//     $data = [];
//     // die($sql);
//     while($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     return $data;

// }
        
public function getTeamMembers($id){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(team_id)  AS total_records FROM team WHERE team.agent_id ='$id'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM team WHERE team.agent_id ='$id' ORDER BY date_add DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_six($webpage,$page,$id){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(team_id)  AS total_records FROM team WHERE team.agent_id ='$id'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}

public function getTeamImage($id){
    $sql = "SELECT * FROM images WHERE team_id = $id";
    // die($sql);
    $result = $this->con->query($sql);
    while($row = $result->fetch_assoc()) {
        $singleImage = $row['image_url'];
        return $singleImage;
    } 

}

public function deleteTeam($id){
    $sql= "DELETE FROM team WHERE team.team_id = '$id'";
    $detail = $this->con->query($sql);
    // die($sql);
    if ($detail) {            
        $sql1= "DELETE FROM images WHERE images.team_id = '$id'";
        // die($sql1);
        $detail2 = $this->con->query($sql);
        }
        return true;
}

    public function showTeamDetails($id){
        $sql= "SELECT * FROM team JOIN agents ON team.agent_id = agents.agent_id  WHERE team.team_id= '$id'";
        // die($sql);
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function editTeam($name,$position,$email,$tid,$image){           
        $sql="UPDATE team SET
          t_fname = '$name',
        position_held='$position',
        email='$email' WHERE team.team_id='$tid'";
        
    //    die($sql);
     $result= $this->con->query($sql);	  
    if($result) {
        $filename = $image['name'];
$tmp_name = $image['tmp_name'];
$filetype = $image['type'];
$size = $image['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$newfilename = time(). ".$ext";
if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png' || $ext=='jfif') {
    move_uploaded_file($tmp_name, "../images/team/$newfilename");
    $sql2 = "UPDATE images SET image_url = '$newfilename' WHERE images.team_id='$tid'";
    // die($sql2);
    $result2 = $this->con->query($sql2);
    }
    }
    return true;
    }
 
 public function statusProperty($id,$status){
    if ($status == 'approved') {
        $status = 'pending';
        }elseif ($status == 'pending'){
            $status = 'approved';
        }
    $sql= "UPDATE property SET pstatus='$status' WHERE property_id='$id'";
    // die($sql);
    $result = $this->con->query($sql);
    return true;

 }
 
public function delete($id){
    $sql= "DELETE FROM jointventure_message WHERE jointventure_message.message_id = '$id'";
    $detail = $this->con->query($sql);
    // die($sql);
   return true;
    }

    public function deletesms($id){
        $sql= "DELETE FROM agent_message WHERE agent_message.message_id = '$id'";
        $detail = $this->con->query($sql);
        // die($sql);
       return true;
        }

        
    public function deletejointVenture($id){
        $sql= "DELETE FROM joint_venture WHERE joint_venture.jointventure_id = '$id'";
        $detail = $this->con->query($sql);
        // die($sql);
        if ($detail) {            
            $sql1= "DELETE FROM images WHERE images.jointventure_id = '$id'";
            // die($sql1);
            $detail1 = $this->con->query($sql1);
            }
            if($detail){
                    $sql2= "DELETE FROM  joint_type  WHERE  joint_type.jointventure_id = '$id'";            
                    $detail2 = $this->con->query($sql2);
                }
                return true;
    }

    public function addJointVenture($userid,$staff,$title,$prodesc,$offer,$address,$joint,$state,$city,$extra,$images){
        $sql="INSERT INTO joint_venture SET agent_id ='$userid',
                                        staff ='$staff',
                                       joint_title='$title',
                                       joint_description='$prodesc',
                                       address='$address',
                                       offer= '$offer',
                                       joint_tc= '$joint',
                                       states_id='$state',
                                       city_id='$city'";
                                       
                                    //   die($sql);
            $result= $this->con->query($sql);	
               $jointventure_id = $this->con->insert_id;




    // //////////////////////////////////////


    if ($result) {
        if ($jointventure_id) {
            $count = 10000;
            $output_dir = "../images/sponsor/"; /* Path for file upload */
            $fileCount = count($images['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                $RandomNum = time() . "$count";


                $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
                $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
                

                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt = str_replace('.', '', $ImageExt);
                $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = 'sponsor' . $jointventure_id . '-listing-image-' . $RandomNum . '.' . $ImageExt;

                $ret[$NewImageName] = $output_dir . $NewImageName;
                move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);

                $count++;

                $sql2 = "INSERT INTO images (jointventure_id, image_url) VALUES ('$jointventure_id', '$NewImageName')";
                // $result2 = $this->db_conn->query($sql2);
                // die($sql2);
                $result2 = $this->con->query($sql2);

                
            }

            
        }
    }

    if ($result) {
        if ($jointventure_id) {
                    if(!empty($extra)){
                        $check ="";
                        foreach ($extra as $add){
                            $check = $add;
                            $sql3="INSERT INTO joint_type SET jointventure_id= '$jointventure_id',
                                                                   joint_name='$check'";
                                                                //    die($sql3);
                            $result3 = $this->con->query($sql3);
                
                        }
                    }

                     

                }

            }
            return true;



    ////////////////////////////////////////

 
}

// public function getJointVenture($id){
//     $sql = "SELECT * FROM joint_venture JOIN agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id   WHERE joint_venture.agent_id ='$id' ";
//     // die($sql);
//     $result=$this->con->query($sql);
    
//     $data = [];
//     // die($sql);
//     while($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     return $data;

// }



public function getJointVenture($id){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture WHERE joint_venture.agent_id = '$id'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 3;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM joint_venture JOIN agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id   WHERE joint_venture.agent_id ='$id' ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_four($webpage,$page,$id){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture WHERE joint_venture.agent_id = '$id'");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 1;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}

 

public function getsponsorshipImage($id){
    $sql = "SELECT * FROM images WHERE jointventure_id = $id";
    $result = $this->con->query($sql);
    while($row = $result->fetch_assoc()) {
        $singleImage = $row['image_url'];
        return $singleImage;
    } 

}

public function getSponsorshipImages($id){
    $sql = "SELECT * FROM images WHERE jointventure_id = $id";
    $result = $this->con->query($sql);
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    } 
    return $data;
}

public function getSponsorshipNeed($id){
    $sql = "SELECT * FROM joint_type WHERE jointventure_id = '$id'";
    // die($sql);
    $result = $this->con->query($sql);
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    } 
    return $data;
}

public function showVentureDetails($id){
    $sql= "SELECT * FROM joint_venture JOIN  agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id WHERE joint_venture.jointventure_id ='$id'";
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


    public function editJointVenture($title,$prodesc,$offer,$address,$joint,$state,$city,$extra,$images,$pid){
        $sql="UPDATE joint_venture SET joint_title='$title',
                                       joint_description='$prodesc',
                                       address='$address',
                                       offer= '$offer',
                                       joint_tc= '$joint',
                                       states_id='$state',
                                       city_id='$city' 
                                       WHERE jointventure_id= '$pid' " ;
                                       
                                    //   die($sql);
            $result= $this->con->query($sql);	
    // //////////////////////////////////////
    if ($result) {
            $count = 10000;
            $output_dir = "../images/sponsor/"; /* Path for file upload */
            $fileCount = count($images['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                $RandomNum = time() . "$count";


                $ImageName = str_replace(' ', '-', strtolower($images['name'][$i]));
                $ImageType = $images['type'][$i]; /*"image/png", image/jpeg etc.*/
                

                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt = str_replace('.', '', $ImageExt);
                $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = 'sponsor-' . $pid . '-updated-listing-image-' . $RandomNum . '.' . $ImageExt;

                $ret[$NewImageName] = $output_dir . $NewImageName;
                move_uploaded_file($images["tmp_name"][$i], $output_dir . $NewImageName);

                $count++;
                $sql2 = "UPDATE images SET  image_url = '$NewImageName'  WHERE images.jointventure_id='$pid'";
                // die($sql2);
                $result2 = $this->con->query($sql2);
            
        }
    }
     if ($result) {
                    if(!empty($extra)){
                        $check ='';
                        foreach ($extra as $add){
                            $check = $add;
                            $sql4="UPDATE joint_type SET joint_name='$check' WHERE joint_type.jointventure_id= '$pid'";
                        //    die($sql4);
                            $result4 = $this->con->query($sql4);
                
                        }
                    }

                     return true;

                }
    ////////////////////////////////////////

 
    }


    
// public function showJointVentures(){
//     $sql= "SELECT * FROM joint_venture JOIN agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id ORDER BY date_posted DESC";
//     // die($sql);
//     $result = $this->con->query($sql);
//     	$data =[];
//     	while($row = $result->fetch_assoc()) {
//     		$data[] = $row;
//     	} 
//     	return $data;
// }

public function  showJointVentures(){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id)  AS total_records FROM joint_venture");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM joint_venture JOIN agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_jointventure($webpage,$page){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id)  AS total_records FROM joint_venture");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}



// public function showJointMessage(){
//     $sql = "SELECT * FROM jointventure_message JOIN agents ON jointventure_message.agent_id = agents.agent_id  ";
//     // die($sql);
//     $result=$this->con->query($sql);
//     $data = [];
//     while($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     return $data;

// }
    

public function showJointMessage(){
    // get the pagenum.  If it doesn't exist, set it to 1
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
// set the number of entries to appear on the page
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records FROM jointventure_message");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records / $entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 


$sql = "SELECT * FROM jointventure_message JOIN agents ON jointventure_message.agent_id = agents.agent_id  ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
// die($sql);
$result= $this->con->query($sql);
$data =[];
    while($row = $result->fetch_array()) {
        $data[] = $row;
    } 
    return $data;

}


public function pagination_messages($webpage,$page){ 

if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
$sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records FROM jointventure_message");
$total_records= mysqli_fetch_array($sql1);
$total_records = $total_records['total_records'];
// set the number of entries to appear on the page
$entries_per_page = 10;   
// total pages is rounded up to nearest integer
$total_pages = ceil($total_records/$entries_per_page); 
// offset is used by SQL query in the LIMIT
$offset = (($page * $entries_per_page) - $entries_per_page); 
// Maximum number of links per page.  If exceeded, google style pagination is generated
$max_links = 10; 
$h=1; 
if($page>$max_links){ 
$h=(($h+$page)-$max_links); 
} 
if($page>=1){ 
$max_links = $max_links+($page-1); 
} 
if($max_links>$total_pages){ 
$max_links=$total_pages+1; 
} 
if($page > 1){
echo '<li class="page-item" disabled><a class=" btn btn-common" href="'.$webpage.'?page='.($page-1).'" >Prev</a></li> '; 
}

if($total_pages!=1){ 
for ($i=$h;$i<$max_links;$i++){ 
    if($i==$page){ 
        echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>'; 
    } 
    else{ 
        echo '<li class="page-item"><a href="'.$webpage.'?page='.$i.'" class="page-link">'.$i.'</a> </li>'; 
    } 
} 
} 

if(($page >=1)&&($page!=$total_pages)){ 
echo '<li class="page-item" disabled><a href="'.$webpage.'?page='.($page+1).'" class="btn btn-common">Next</a></li>';
} 
}

// public function getAllJointVentures(){
//     $sql="SELECT * FROM joint_venture JOIN agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id ";
//          $result= $this->con->query($sql);
//          $data = [];
//        while($row = $result->fetch_assoc()) {
//            $data[] = $row;
//    } 
//    return $data;
//    }

public function statusJointVenture($id,$status){
    if ($status == 'approved') {
        $status = 'pending';
        }elseif ($status == 'pending'){
            $status = 'approved';
        }
    $sql= "UPDATE joint_venture SET jstatus='$status' WHERE jointventure_id='$id'";
    // die($sql);
    $result = $this->con->query($sql);

    return true;

 }

 public function statusVentureM($id,$status){
    if ($status == 'approved') {
        $status = 'pending';
        }elseif ($status == 'pending'){
            $status = 'approved';
        }
    $sql= "UPDATE jointventure_message SET jmstatus='$status' WHERE message_id='$id'";
    // die($sql);
    $result = $this->con->query($sql);

    return true;

 }

    }
?>