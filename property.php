<?php
        // include "database.php";
class Property
{
    public $con;
    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'homes');
    }

    public function addProperty($userid, $title, $prodesc, $price, $area, $address, $status, $type, $bedrooms, $bathrooms, $furnished, $serviced, $shared, $state, $city, $extra, $images)
    {
        $sql = "INSERT INTO property 
        SET agent_id ='$userid',
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
        
        $result = $this->con->query($sql);
        $property_id = $this->con->insert_id;

        if ($result) {
            if ($property_id) {
                $count = 10000;
                $output_dir = "images/property/"; /* Path for file upload */
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
                            // die($sql2);
                    $result2 = $this->con->query($sql2);

                }

            }
        }

        if ($result) {
            if ($property_id) {
                if (!empty($extra)) {
                    $check = "";
                    foreach ($extra as $add) {
                        $check = $add;
                        $sql3 = "INSERT IGNORE INTO featured_amenities SET property_id= '$property_id', pfeature_id='$check'";
                                //    die($sql3);
                        $result3 = $this->con->query($sql3);

                    }
                }

                return true;

            }

        }

    }

        //  get state
    public function get_state($selected = '')
    {
        $m = "SELECT * FROM states";
        $result = $this->con->query($m);
        echo "<select name='state' id='allstate' class='form-control' >";
        echo "<option value=''>Select</option>";
        while ($data = $result->fetch_assoc()) {
            $state = $data['states_name'];
            $id = $data['states_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$state</option>";
            } else {
                echo "<option value='$id'>  $state </option>";
            }

        }echo "</select>";

    }
    public function getAllAmenities(){  
        $sql = "SELECT * FROM `property_feature`";
        $result = $this->con->query($sql);
        return $result;
   }



            // public function getAllAmenities(){  
            //     $sql = "SELECT * FROM `featured_amenities`";
            //     $result = $this->con->query($sql);
            //     if($result->num_rows > 0){
            //         return $result; 
            //     }else{
            //         return false;
            //     }
            // }

   public function propertyAmenities($id){
        $sql1 = "SELECT * FROM featured_amenities WHERE property_id = $id";
        $result1 = $this->con->query($sql1);
                // die($sql1);
        while ($data = $result1->fetch_assoc()) {
            $id = $data['pfeature_id'];
        }
        return $data;
   }

    public function getAllFeatures()
    {
        $sql = "SELECT * FROM `property_feature`";
        $result = $this->con->query($sql);
                // die($sql);     
        $data=[];   
        while ($data = $result->fetch_assoc()) {
            $features = $data['pfeature_name'];
            $id = $data['pfeature_id'];
            echo " <input value='$id' id='$features' type='checkbox' name='extra[]'>";
            echo "<label for='$features'> $features </label>";
        }
        return $data;
    }

        // This shows all the city on select of a state
    public function get_city($id)
    {
        $k = "SELECT * FROM city WHERE states_id='$id'";
        $result = $this->con->query($k);
        echo "<select name='city' id='citi' class='form-control' >";
        while ($data = $result->fetch_assoc()) {
            $lga = $data['city_name'];
            $id = $data['city_id'];
            echo "<option value='$id'> $lga </option>";
        }echo "</select>";
    }

        //GET CITY
    public function city($selected = '')
    {
        $m = "SELECT * FROM city";
        $result = $this->con->query($m);
        echo "<select name='city' id='allcity' class='form-control' >";
        echo "<option value=''> -- choose city -- </option>";
        while ($data = $result->fetch_assoc()) {
            $city = $data['city_name'];
            $id = $data['city_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$city</option>";
            } else {
                echo "<option value='$id'>  $city </option>";
            }

        }echo "</select>";
    }

        // Get number of bedrooms
    public function getBedroom($selected = '')
    {
        $bedroom = "SELECT * FROM bedroom";
        $result = $this->con->query($bedroom);
        echo "<select name='bed' value='bed' id='allbed' class='form-control'>";
        echo "<option value=''>-- Bedroom --</option>";
        while ($data = $result->fetch_assoc()) {
            $bed = $data['bedroom_no'];
            $id = $data['bedroom_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$bed</option>";
            } else {
                echo "<option value='$id'>  $bed </option>";
            }

        }echo "</select>";
    }

    public function getBathroom($selected = '')
    {
        $bathroom = "SELECT * FROM bathroom";
        $result = $this->con->query($bathroom);
        echo "<select name='bath' value='bath' id='allbath' class='form-control' >";
        echo "<option value=''>-- Bathroom --</option>";
        while ($data = $result->fetch_assoc()) {
            $bath = $data['bathroom_no'];
            $id = $data['bathroom_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$bath</option>";
            } else {
                echo "<option value='$id'>  $bath </option>";
            }

        }echo "</select>";
    }

    public function getPropertytype($selected = '')
    {
        $type = "SELECT * FROM property_type";
        $result = $this->con->query($type);
        echo "<select name='type' value='type' id='alltype' class='form-control' >";
        echo "<option value=''>-- Type --</option>";
        while ($data = $result->fetch_assoc()) {
            $ptype = $data['ptype_name'];
            $id = $data['ptype_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$ptype</option>";
            } else {
                echo "<option value='$id'>  $ptype </option>";
            }

        }echo "</select>";
    }

    public function showAgents()
    {
        $sql = "SELECT * FROM agents JOIN states ON agents.states_id = states.states_id JOIN city ON agents.city_id = city.city_id";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getStatus($selected = '')
    {
        $status = "SELECT * FROM property_status";
        $result = $this->con->query($status);
        echo "<select name='status' value='status' id='allstatus' class='form-control'>";
        echo "<option value=''>-- Purpose --</option>";
        while ($data = $result->fetch_assoc()) {
            $pstatus = $data['pstatus_name'];
            $id = $data['pstatus_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$pstatus</option>";
            } else {
                echo "<option value='$id'>  $pstatus </option>";
            }

        }echo "</select>";
    }

    public function getSponsorship($selected = '')
    {
        $sponsor = "SELECT * FROM sponsorship";
        $result = $this->con->query($sponsor);
        echo "<select name='sponsorship' value='sponsorship' id='allsponsorship' class='form-control'>";
        echo "<option value=''>-- Sponsorship Type --</option>";
        while ($data = $result->fetch_assoc()) {
            $sponsorship = $data['sponsorship_name'];
            $id = $data['sponsorship_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$sponsorship</option>";
            } else {
                echo "<option value='$id'>  $sponsorship </option>";
            }

        }echo "</select>";
    }

    public function propertyCount()
    {
        $sql = "SELECT COUNT(property_id) As total_records FROM property";
        $result = $this->con->query($sql);
                // die($sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    public function showProperties($total_records_per_page, $offset)
    {

        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        $total_records_per_page = 10;
        $offset = ($page_no - 1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";
        $total_records = $this->propertyCount();
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;      // total page minus 1

        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
        LEFT JOIN states ON property.states_id = states.states_id 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT  JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
        LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
        LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id 
        LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id 
        WHERE property.delete='0'
        ORDER BY date_posted 
        DESC LIMIT $offset, $total_records_per_page";
        die($sql);
        $result = $this->con->query($sql);
        while ($row = $result->fetch_array()) {
                    // "agent_id "= $row;
        }
        return $data;

    }

    public function property()
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property 
        WHERE property.deleted='0' 
        AND property.feature = 'featured'
             AND property.pstatus='approved'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
        LEFT JOIN states ON property.states_id = states.states_id 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
        LEFT  JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
        LEFT  JOIN property_type ON property.ptype_id=property_type.ptype_id 
        LEFT  JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id 
        WHERE property.pstatus = 'approved'        
        AND property.deleted = '0'
             AND property.feature = 'featured'
        ORDER BY date_posted
        DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_one($webpage, $page)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property
        WHERE property.deleted='0' 
        AND property.pstatus='approved' 
        AND property.feature = 'featured'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
                // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '">Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="page-link">Next</a></li>';
        }
    }
    
    public function showFeaturedProperties()
    {
        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
        LEFT JOIN states ON property.states_id = states.states_id 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
        LEFT  JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
        LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id 
        LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id 
        WHERE property.pstatus = 'approved'        
        AND property.deleted = '0'
        AND property.feature='featured'
        order by date_posted 
        desc limit 4";

        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }

    public function getSingleImage($id)
    {
        $sql = "SELECT * FROM images WHERE property_id = $id";
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $singleImage = $row['image_url'];
            return $singleImage;
        }

    }

    public function getAllImages($id)
    {
        $sql = "SELECT * FROM images WHERE property_id = $id";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllDocuments($id)
    {
        $sql = "SELECT * FROM swap_document WHERE swap_id = $id";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function showAgentDetails($id)
    {
        $sql = "SELECT * FROM agents
         JOIN states ON agents.states_id = states.states_id 
         JOIN city ON agents.city_id = city.city_id 
         WHERE agents.agent_id='$id'";
                // die($sql);
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function showPropertyDetails($id)
    {
        $sql = "SELECT *
        FROM property
        LEFT JOIN agents ON property.agent_id = agents.agent_id
        LEFT JOIN states ON property.states_id = states.states_id
        LEFT JOIN city ON property.city_id = city.city_id
        LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id
        LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id
        LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id
        LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id
        WHERE property.property_id='$id'
        AND property.pstatus = 'approved'
            AND property.deleted = '0'
        ORDER BY date_posted DESC";
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function showAgentProperties($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records 
        FROM property 
        WHERE property.agent_id = '$id' 
        AND property.deleted='0' 
        AND property.pstatus='approved'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM property 
       LEFT  JOIN states ON property.states_id = states.states_id 
       LEFT  JOIN city ON property.city_id = city.city_id  
       LEFT  JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
       LEFT  JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
       LEFT  JOIN property_type ON property.ptype_id=property_type.ptype_id 
       LEFT  JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id
        WHERE property.agent_id ='$id' 
        AND property.pstatus = 'approved'
          AND property.deleted = '0' 
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_agentproperties($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        if (isset($_GET['id']) ? $id = $_GET['id'] : $id = ' property.agent_id ');
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records 
        FROM property 
        WHERE property.agent_id = '$id'
        AND property.pstatus = 'approved'
          AND property.deleted = '0' ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
                // set the number of entries to appear on the page
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
                // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?id=' . ($id) . '&page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?id=' . $id . '&page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?id=' . ($id) . '&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
        }
    }

    public function getAgentProperties($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE property.agent_id = '$id'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT *
    FROM property
    JOIN states ON property.states_id = states.states_id
    JOIN city ON property.city_id = city.city_id
    LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id
    LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id
    LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id
    LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id
    WHERE property.agent_id ='$id'
        AND deleted = '0'
    ORDER BY date_posted DESC
    LIMIT $offset, $entries_per_page";

                // die($sql);
        $result = $this->con->query($sql);
        $data = [];

        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function pagination_three($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE property.agent_id = '$id'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
                // set the number of entries to appear on the page
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
                // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class=" btn btn-common" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="btn btn-common">Next</a></li>';
        }
    }

    public function agentPropertyCount($id)
    {
        $sql = "SELECT COUNT(property_id) FROM property WHERE property.agent_id ='$id'";
        $result = $this->con->query($sql);
                //  die($sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    public function agentSwapCount($id)
    {
        $sql = "SELECT COUNT(swap_id) FROM swaps WHERE swaps.agent_id ='$id'";
        $result = $this->con->query($sql);
                //  die($sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    public function agentMessageCount($id)
    {
        $sql = "SELECT COUNT(message_id) FROM jointventure_message WHERE jointventure_message.agent_id ='$id' AND jmstatus='approved'";
        $result = $this->con->query($sql);
                //  die($sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
    public function agentJointVentureCount($id)
    {
        $sql = "SELECT COUNT(jointventure_id) FROM joint_venture WHERE joint_venture.agent_id ='$id' AND jstatus='approved'";
        $result = $this->con->query($sql);
                //  die($sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    public function getAgentSwaps($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id) As total_records FROM swaps WHERE swaps.agent_id = '$id'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM swaps 
        JOIN states ON swaps.states_id = states.states_id 
        JOIN city ON swaps.city_id = city.city_id  WHERE swaps.agent_id ='$id' ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_two($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(swap_id) As total_records FROM swaps WHERE swaps.agent_id = '$id'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class=" btn btn-common" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="btn btn-common">Next</a></li>';
        }
    }

            // $sql = "SELECT * FROM swaps JOIN states ON swaps.states_id = states.states_id JOIN city ON swaps.city_id = city.city_id  WHERE swaps.agent_id ='$id' ORDER BY date_posted DESC";
            //      // die($sql);
            // $result=$this->con->query($sql);

            // $data = [];
            //      // die($sql);
            // while($row = $result->fetch_assoc()) {
            //     $data[] = $row;
            // }
            // return $data;
            // }

    public function showAgentjointMessage($id)
    {
        $sql = "SELECT * FROM jointventure_message 
        JOIN agents ON jointventure_message.agent_id = agents.agent_id 
        WHERE jointventure_message.agent_id ='$id' 
        AND jointventure_message.jmstatus='approved' 
        ORDER BY date_posted 
        DESC limit 3";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }

    public function showAgentContactMessage($id)
    {
        $sql = "SELECT * FROM agent_message 
        JOIN agents ON agent_message.agent_id = agents.agent_id 
        WHERE agent_message.agent_id ='$id'
        ORDER BY date_posted
        DESC limit 3";
        
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }

    public function delete($id)
    {
         $sql = "DELETE FROM jointventure_message 
                 WHERE jointventure_message.message_id = '$id'";
        $detail = $this->con->query($sql);
                // die($sql);
        return true;
    }

    public function deleteSwap($id)
    {
        $sql = "DELETE FROM swaps WHERE swaps.swap_id = '$id'";
         $detail = $this->con->query($sql);
                // die($sql);
         if ($detail) {
             $sql1 = "DELETE FROM images WHERE images.swap_id = '$id'";
                    // die($sql1);
             $detail2 = $this->con->query($sql);
         }
        return true;
    }

    public function deleteProperty($id)
    {
        $sql = "DELETE FROM property WHERE property.property_id = '$id'";
        $sql = "UPDATE property SET deleted = '1' WHERE property.property_id = '$id'";
        $detail = $this->con->query($sql);
                // die($sql);

                // if ($detail) {
                //     $sql1= "DELETE FROM images WHERE images.property_id = '$id'";
                //     $sql = "UPDATE images SET deleted = '1' WHERE images.property_id = '$id'";
                //          // die($sql1);
                //     $detail2 = $this->con->query($sql);
                // }

                // if($detail){
                //     $sql2= "DELETE FROM  property_feature WHERE  property_feature.property_id = '$id'";
                //     $detail2 = $this->con->query($sql2);
                // }
        return true;
    }

    public function deletejointVenture($id)
    {
        $sql = "DELETE FROM joint_venture WHERE joint_venture.jointventure_id = '$id'";
        $detail = $this->con->query($sql);
                // die($sql);
         if ($detail) {
             $sql1 = "DELETE FROM images WHERE images.jointventure_id = '$id'";
                    // die($sql1);
            $detail1 = $this->con->query($sql1);
        }
        if ($detail) {
            $sql2 = "DELETE FROM  joint_type  WHERE  joint_type.jointventure_id = '$id'";
            $detail2 = $this->con->query($sql2);
        }
        return true;
    }

    public function showRecentProperties()
    {
        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
        JOIN states ON property.states_id = states.states_id 
        JOIN city ON property.city_id = city.city_id 
        JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
        JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
        JOIN property_type ON property.ptype_id=property_type.ptype_id 
        JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id
        WHERE property.pstatus = 'approved'        
        AND property.deleted = '0'
        order by date_posted desc limit 3";
        $result = $this->con->query($sql);
                // die($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }


    public function alongishProperties($search,$type,$city){
               //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
               $where = "WHERE ";

               if (!empty($search)) {
                   $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
               }
               if (!empty($type)) {
                   $where .= " property.ptype_id = " . $type . " AND ";
               }
               if (!empty($city)) {
                   $where .= " property.city_id = " . $city . " AND ";
               }
                       // get the pagenum.  If it doesn't exist, set it to 1
       
               if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
                       // set the number of entries to appear on the page
       
               $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property 
              LEFT JOIN city ON property.city_id = city.city_id 
              LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
               $where property.staff = 'staff'
               AND property.deleted = '0' ");
       
               $total_records = mysqli_fetch_array($sql1);
               $total_records = $total_records['total_records'];
               $entries_per_page = 10;
                       // total pages is rounded up to nearest integer
               $total_pages = ceil($total_records / $entries_per_page);
                       // offset is used by SQL query in the LIMIT
               $offset = (($page * $entries_per_page) - $entries_per_page);
               $sql = "SELECT * FROM property 
               LEFT JOIN city ON property.city_id = city.city_id 
               LEFT JOIN property_type ON property.ptype_id = property_type.ptype_id  
               LEFT JOIN bedroom ON bedroom.bedroom_id=property.bedroom_id 
               LEFT JOIN bathroom ON bathroom.bathroom_id=property.bathroom_id 
               LEFT JOIN agents ON property.agent_id = agents.agent_id  
               LEFT JOIN states ON property.states_id = states.states_id 
               LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
               $where property.deleted = '0'
                AND property.staff = 'staff'
               ORDER BY property_id 
               DESC LIMIT $offset, $entries_per_page";
                       // die($sql);
               $result = $this->con->query($sql);
               $data = [];
               while ($row = $result->fetch_array()) {
                   $data[] = $row;
               }
               return $data;
       
           }

           public function pagination_adminlistings($webpage, $page)
           {
               $where = "WHERE ";
       
               if (!empty($search)) {
                   $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
               }
               if (!empty($type)) {
                   $where .= " property.ptype_id = " . $type . " AND ";
               }
               if (!empty($city)) {
                   $where .= " property.city_id = " . $city . " AND ";
               }
               if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
               $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property   
               LEFT JOIN city ON property.city_id = city.city_id 
               LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id $where property.staff = 'staff'
               AND property.deleted = '0'  ");
               $total_records = mysqli_fetch_array($sql1);
               $total_records = $total_records['total_records'];
                       // set the number of entries to appear on the page
               $entries_per_page = 10;
                       // total pages is rounded up to nearest integer
               $total_pages = ceil($total_records / $entries_per_page);
                       // offset is used by SQL query in the LIMIT
               $offset = (($page * $entries_per_page) - $entries_per_page);
                       // Maximum number of links per page.  If exceeded, google style pagination is generated
               $max_links = 10;
               $h = 1;
               if ($page > $max_links) {
                   $h = (($h + $page) - $max_links);
               }
               if ($page >= 1) {
                   $max_links = $max_links + ($page - 1);
               }
               if ($max_links > $total_pages) {
                   $max_links = $total_pages + 1;
               }
               if ($page > 1) {
                   echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
               }
       
               if ($total_pages != 1) {
                   for ($i = $h; $i < $max_links; $i++) {
                       if ($i == $page) {
                           echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                       } else {
                           echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                       }
                   }
               }
       
               if (($page >= 1) && ($page != $total_pages)) {
                   echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
               }
           }
            

    public function salesProperties($search, $type, $status, $city)
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }
        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
                // get the pagenum.  If it doesn't exist, set it to 1

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
                // set the number of entries to appear on the page

        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property 
       LEFT JOIN city ON property.city_id = city.city_id 
       LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '2' 
        AND property.pstatus='approved'AND property.deleted ='0' ");

        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        $sql = "SELECT * FROM property 
       LEFT JOIN city ON property.city_id = city.city_id 
       LEFT JOIN property_type ON property.ptype_id = property_type.ptype_id  
       LEFT JOIN bedroom ON bedroom.bedroom_id=property.bedroom_id 
       LEFT JOIN bathroom ON bathroom.bathroom_id=property.bathroom_id 
       LEFT JOIN agents ON property.agent_id = agents.agent_id  
       LEFT JOIN states ON property.states_id = states.states_id 
       LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '2' 
        AND property.pstatus='approved' 
            AND property.deleted ='0'        
        ORDER BY property_id 
        DESC LIMIT $offset, $entries_per_page";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_sale($webpage, $page)
    {
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }
        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property   
       LEFT JOIN city ON property.city_id = city.city_id 
       LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id $where property.pstatus_id = '2' AND property.pstatus='approved' AND property.deleted='0' ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
                // set the number of entries to appear on the page
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
                // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }


    public function rentProperties($search, $type, $status, $city)
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }

        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '1' 
        AND property.pstatus='approved'
        AND property.deleted ='0' 
         ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;

        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT

        $offset = (($page * $entries_per_page) - $entries_per_page);
        $sql = "SELECT * FROM property 
        JOIN city ON property.city_id = city.city_id 
        JOIN property_type ON property.ptype_id = property_type.ptype_id  
        JOIN bedroom ON bedroom.bedroom_id=property.bedroom_id 
        JOIN bathroom ON bathroom.bathroom_id=property.bathroom_id 
        JOIN agents ON property.agent_id = agents.agent_id  
        JOIN states ON property.states_id = states.states_id 
        JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '1'
        AND property.pstatus='approved' 
        AND property.deleted ='0' 
        ORDER BY property_id 
        DESC LIMIT $offset, $entries_per_page";

        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_rent($webpage, $page)
    {
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }
        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '1' 
        AND property.pstatus='approved'
           AND property.deleted ='0' 
         ");

        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }

    public function sponsorshipProperties($sponsorship, $city)
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";

        if (!empty($sponsorship)) {
            $where .= "joint_venture.joint_title LIKE '%" . $sponsorship . "%' OR city.city_name LIKE '%" . $sponsorship . "%' AND";
        }
        if (!empty($city)) {
            $where .= " joint_venture.city_id = " . $city . " AND ";
        }
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture 
        LEFT JOIN city ON joint_venture.city_id = city.city_id   $where  joint_venture.jstatus='approved'  AND joint_venture.deleted ='0'  ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        $sql = "SELECT * FROM joint_venture 
        LEFT JOIN city ON joint_venture.city_id = city.city_id    
        LEFT JOIN agents ON joint_venture.agent_id = agents.agent_id  
        LEFT JOIN states ON joint_venture.states_id = states.states_id 
        $where  joint_venture.jstatus='approved' 
        AND joint_venture.deleted='0'
        ORDER BY jointventure_id 
        DESC LIMIT $offset, $entries_per_page";

        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_sponsor($webpage, $page)
    {
        $where = "WHERE ";

        if (!empty($sponsorship)) {
            $where .= "joint_venture.joint_title LIKE '%" . $sponsorship . "%' OR city.city_name LIKE '%" . $sponsorship . "%' AND";
        }

        if (!empty($city)) {
            $where .= " joint_venture.city_id = " . $city . " AND ";
        }
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records 
        FROM joint_venture 
       LEFT JOIN city ON joint_venture.city_id = city.city_id   
       $where  joint_venture.jstatus='approved'
       AND joint_venture.deleted = '0' ");

        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }




    public function shortletProperties($search, $type, $status, $city)
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }

        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records 
        FROM property
        JOIN city ON property.city_id = city.city_id 
        JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '3' 
        AND property.pstatus='approved'
            AND property.deleted ='0' 
        ");

        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM property 
        LEFT JOIN states ON property.states_id = states.states_id   
        LEFT JOIN property_type ON property.ptype_id = property_type.ptype_id  
        LEFT JOIN bedroom ON bedroom.bedroom_id=property.bedroom_id 
        LEFT JOIN bathroom ON bathroom.bathroom_id=property.bathroom_id 
        LEFT JOIN agents ON property.agent_id = agents.agent_id  
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '3' 
        AND property.pstatus='approved' 
        AND property.deleted='0'
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";

        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_shortlet($webpage, $page)
    {
        $where = "WHERE ";

        if (!empty($search)) {
            $where .= "property.property_title LIKE '%" . $search . "%' OR city.city_name LIKE '%" . $search . "%' AND";
        }
        if (!empty($type)) {
            $where .= " property.ptype_id = " . $type . " AND ";
        }
        if (!empty($status)) {
            $where .= " property.pstatus_id = " . $status . " AND ";
        }
        if (!empty($city)) {
            $where .= " property.city_id = " . $city . " AND ";
        }
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records 
        FROM property 
        LEFT JOIN city ON property.city_id = city.city_id 
        LEFT JOIN property_status ON property.pstatus_id=property_status.pstatus_id 
        $where property.pstatus_id = '3' 
        AND property.pstatus='approved' 
        AND property.deleted ='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }

    public function createSwaps($userid, $name, $title, $prodesc, $need, $swapdec, $address, $state, $city, $images, $extra)
    {

        $sql = "INSERT INTO swaps SET
         agent_id ='$userid',
         swap_name = '$name',
        swap_description='$prodesc',
        sitem_description='$swapdec',
       swap_address='$address',
        swap_item='$title',
        swap_need='$need',
        states_id='$state',
        city_id='$city'";

                //    die($sql);
        $result = $this->con->query($sql);
        $swap_id = $this->con->insert_id;

        if ($result) {
            if ($swap_id) {
                $count = 10000;
                $output_dir = "images/swaps/"; /* Path for file upload */
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
        //  die($sql2);
                    $result2 = $this->con->query($sql2);

                }
            }
        }
        if ($result) {
            if ($swap_id) {
                if (!empty($extra)) {
                    $check = "";
                    foreach ($extra as $add) {
                        $check = $add;
                        $sql3 = "INSERT INTO swap_document 
                        SET swap_id= '$swap_id', document_name='$check'";
                        $result3 = $this->con->query($sql3);

                    }
                }

                return true;

            }

        }

    }

    public function showSwaps()
    {
        $sql = "SELECT * FROM swaps 
        LEFT JOIN agents ON swaps.agent_id = agents.agent_id 
        LEFT JOIN states ON swaps.states_id = states.states_id 
        LEFT JOIN city ON swaps.city_id = city.city_id       
        WHERE swaps.deleted = '0'
        order by date_posted desc limit 3";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getSwapImage($id)
    {
        $sql = "SELECT * FROM images WHERE swap_id = $id";
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $singleImage = $row['image_url'];
            return $singleImage;
        }

    }


    public function showSwapsDetails($id)
    {
        $sql = "SELECT * FROM swaps 
        LEFT JOIN agents ON swaps.agent_id = agents.agent_id 
        LEFT JOIN states ON swaps.states_id = states.states_id 
        LEFT JOIN city ON swaps.city_id = city.city_id 
        WHERE swaps.swap_id= '$id'
        AND swap.deleted='0'";
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getSwapImages($id)
    {
        $sql = "SELECT * FROM images WHERE swap_id = '$id'";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function editSwaps($name, $title, $prodesc, $need, $swapdec, $address, $state, $city, $images, $extra, $id)
    {

        $sql = "UPDATE swaps SET
                  swap_name = '$name',
                swap_description='$prodesc',
                sitem_description='$swapdec',
               swap_address='$address',
                swap_item='$title',
                swap_need='$need',
                states_id='$state',
                city_id='$city' WHERE swaps.swap_id='$id'";

                //    die($sql);
        $result = $this->con->query($sql);
                //  $swap_id = $this->con->insert_id;

                //  if ($result) {
        if ($result) {
            $count = 10000;
            $output_dir = "images/swaps/"; /* Path for file upload */
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
                $result2 = $this->con->query($sql2);

            }
        }

        if ($result) {
            if (!empty($extra)) {
                $check = "";
                foreach ($extra as $add) {
                    $check = $add;
                    $sql3 = "UPDATE swap_document SET doument_name='$check' WHERE swap_id= '$id'";
                    $result3 = $this->con->query($sql3);

                }
                return true;

            }

        }
    }

    public function editProperty($title, $prodesc, $price, $area, $address, $status, $type, $bedrooms, $furnished, $serviced, $shared, $bathrooms, $state, $city, $extra, $images, $pid)
    {
        $sql = "UPDATE property SET
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
                city_id= '$city'
                WHERE property_id='$pid'";

                //   die($sql);
        $result = $this->con->query($sql);
        if ($result) {
            $count = 10000;
            $output_dir = "images/property/"; /* Path for file upload */

            foreach ($_FILES['images']['name'] as $key => $value) {
                        // echo'<pre>';var_dump($_FILES); exit;
                if ($_FILES['images']['name'][$key]) {
                    $RandomNum = time() . "$count";

                    $ImageName = str_replace(' ', '-', strtolower($_FILES['images']['name'][$key]));
                    $ImageType = $_FILES['images']['type'][$key]; /*"image/png", image/jpeg etc.*/

                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);
                    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $NewImageName = 'property' . $pid . 'updated-listing-image-' . $RandomNum . '.' . $ImageExt;

                    $ret[$NewImageName] = $output_dir . $NewImageName;
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], $output_dir . $NewImageName);

                    $count++;

                    $sql1 = "SELECT * FROM images WHERE images.image_id= '$key'";
                            // die($sql);
                    $result1 = $this->con->query($sql1);

                    if ($result1) {

                        $sql3 = "UPDATE images  SET image_url= '$NewImageName' WHERE images.image_id= '$key'";
                                // die($sql);
                        $result3 = $this->con->query($sql3);
                    }
                            // else{

                            //     $sql2 = "INSERT INTO images  SET image_url= '$NewImageName' WHERE images.image_id= '$key'";
                            //     die($sql);
                            //     $result2 = $this->con->query($sql2);
                            //     }

                }
            }
        }

        if ($result) {
            if (!empty($extra)) {
                $check = "";
                foreach ($extra as $add) {
                    $check = $add;
                    $sql3 = "UPDATE IGNORE  featured_amenities SET  pfeature_id='$check' WHERE featured_amenities.property_id= '$property_id'";
                    $result3 = $this->con->query($sql3);
                }
            }
            return true;
        }
    }

    public function showAdminProperties()
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
                // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE staff='staff' AND deleted='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
       LEFT JOIN states ON property.states_id = states.states_id 
       LEFT JOIN city ON property.city_id = city.city_id 
       LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
       LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
       LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id 
       LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id 
        WHERE property.staff= 'staff'           
        AND property.deleted = '0'
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_alongishListing($webpage, $page)
    {
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(property_id) As total_records FROM property WHERE staff = 'staff' AND deleted='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
                // set the number of entries to appear on the page
        $entries_per_page = 10;
                // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
                // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
                // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }

    public function showAdminProperty()
    {
        $sql = "SELECT * FROM property 
        JOIN agents ON property.agent_id = agents.agent_id 
       LEFT JOIN states ON property.states_id = states.states_id 
       LEFT JOIN city ON property.city_id = city.city_id 
       LEFT JOIN bathroom ON property.bathroom_id = bathroom.bathroom_id 
       LEFT JOIN property_status ON property.pstatus_id = property_status.pstatus_id 
       LEFT JOIN property_type ON property.ptype_id=property_type.ptype_id 
       LEFT JOIN bedroom ON property.bedroom_id =bedroom.bedroom_id
        WHERE property.staff= 'staff'              
        AND property.deleted = '0'
        order by date_posted desc limit 2";

                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function showAdminSwap()
    {
        $sql = "SELECT * FROM swaps 
        LEFT JOIN agents ON swaps.agent_id = agents.agent_id 
        LEFT JOIN states ON swaps.states_id = states.states_id 
        LEFT JOIN city ON swaps.city_id = city.city_id  
        WHERE swaps.staff= 'staff' 
        AND swap.deleted='0'
        order by date_posted desc limit 2";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function showTeamMembers()
    {
        $sql = "SELECT * FROM team 
        JOIN agents ON team.agent_id=agents.agent_id WHERE team.staff='staff'
        AND team.deleted='0'
        ";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTeamImage($id)
    {
        $sql = "SELECT * FROM images WHERE team_id = $id";
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $singleImage = $row['image_url'];
            return $singleImage;
        }

    }

    public function store_message($fname, $email, $phone, $message, $id)
    {
        $sql = "INSERT INTO property_message (fname,email,phone,message_content,agent_id) VALUES('$fname','$email','$phone','$message','$id')";
                // die($sql);
        $result = $this->con->query($sql);
        return true;

    }

            //  Request property form
    public function propertyRequest($other, $address, $status, $type, $bed, $furnished, $serviced, $shared, $state, $city, $fname, $phone, $email)
    {
        $sql = "INSERT INTO request SET
       other='$other',
       request_address='$address',
        pstatus_id= '$status',
        ptype_id= '$type',
        bedroom_id='$bed',
       furnished='$furnished',
       serviced='$serviced',
       shared='$shared',
        states_id='$state',
        city_id='$city',
        fname='$fname',
        phone ='$phone',
        email='$email'";

                //    die($sql);
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return 0;
        }
    }

        // newsletter subscription
    public function newsLetter($email)
    {
        $sql = "INSERT INTO newsletter SET news_email='$email'";
        $result = $this->con->query($sql);
        if ($result) {
            echo '<script type="text/javascript">
            alert("Subscription successful.");
            </script>';
        }
    }

            //  Joint venture creation
    public function addJointVenture($userid, $title, $prodesc, $offer, $address, $joint, $state, $city, $extra, $images)
    {
        $sql = "INSERT INTO joint_venture SET agent_id ='$userid',
                                       joint_title='$title',
                                       joint_description='$prodesc',
                                       address='$address',
                                       offer= '$offer',
                                       joint_tc= '$joint',
                                       states_id='$state',
                                       city_id='$city'";
        $result = $this->con->query($sql);
        $jointventure_id = $this->con->insert_id;

        if ($result) {
            if ($jointventure_id) {
                $count = 10000;
                $output_dir = "images/sponsor/"; /* Path for file upload */
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
                    $result2 = $this->con->query($sql2);

                }

            }
        }

        if ($result) {
            if ($jointventure_id) {
                if (!empty($extra)) {
                    $check = "";
                    foreach ($extra as $add) {
                        $check = $add;
                        $sql3 = "INSERT INTO joint_type SET jointventure_id= '$jointventure_id', joint_name='$check'";
                        $result3 = $this->con->query($sql3);

                    }
                }

            }

        }
        return true;
    }

    public function getJointVenture($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records 
        FROM joint_venture 
        WHERE joint_venture.agent_id = '$id'
        AND joint_venture.deleted ='0'
        ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM joint_venture 
        JOIN agents ON joint_venture.agent_id = agents.agent_id 
        JOIN states ON joint_venture.states_id = states.states_id 
        JOIN city ON joint_venture.city_id = city.city_id   
        WHERE joint_venture.agent_id ='$id'        
        AND joint_venture.deleted ='0'
        ORDER BY date_posted DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_four($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture 
        WHERE joint_venture.agent_id = '$id'       
        AND joint_venture.deleted ='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class=" btn btn-common" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="btn btn-common">Next</a></li>';
        }
    }


    public function getsponsorshipImage($id)
    {
        $sql = "SELECT * FROM images WHERE jointventure_id = $id";
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $singleImage = $row['image_url'];
            return $singleImage;
        }

    }

    public function getSponsorshipImages($id)
    {
        $sql = "SELECT * FROM images WHERE jointventure_id = $id";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getSponsorshipNeed($id)
    {
        $sql = "SELECT * FROM joint_type WHERE jointventure_id = '$id'";
                // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    public function getSponsorshipMessage($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records 
        FROM jointventure_message 
        WHERE jointventure_message.agent_id ='$id' 
        AND jointventure_message.jmstatus='approved'
            AND jointventure_message.deleted='0'
        ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM jointventure_message 
        JOIN agents ON jointventure_message.agent_id = agents.agent_id 
        WHERE jointventure_message.agent_id ='$id' 
        AND jointventure_message.jmstatus='approved' 
            AND jointventure_message.deleted='0'
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_five($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(message_id) AS total_records FROM jointventure_message 
        WHERE jointventure_message.agent_id ='$id' 
        AND jointventure_message.jmstatus='approved'
            AND jointventure_message.deleted='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class=" btn btn-common" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="btn btn-common">Next</a></li>';
        }
    }

    public function getContactMessage($id)
    {
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(message_id)  AS total_records FROM agent_message 
        WHERE agent_message.agent_id ='$id'
        AND agent_message.deleted ='0' ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);

        $sql = "SELECT * FROM agent_message 
        JOIN agents ON agent_message.agent_id = agents.agent_id
         WHERE agent_message.agent_id ='$id' 
        AND agent_message.deleted ='0'
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_sms($webpage, $page, $id)
    {

        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(message_id) AS total_records FROM agent_message 
        WHERE agent_message.agent_id ='$id'
        AND agent_message.deleted ='0'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class=" btn btn-common" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a href="' . $webpage . '?page=' . ($page + 1) . '" class="btn btn-common">Next</a></li>';
        }
    }

    public function deletesms($id)
    {
        $sql = "DELETE FROM agent_message WHERE agent_message.message_id = '$id'";
        $detail = $this->con->query($sql);
                // die($sql);
        return true;
    }

    public function showVentureDetails($id)
    {
        $sql = "SELECT * FROM joint_venture JOIN  agents ON joint_venture.agent_id = agents.agent_id JOIN states ON joint_venture.states_id = states.states_id JOIN city ON joint_venture.city_id = city.city_id WHERE joint_venture.jointventure_id ='$id'";
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function editJointVenture($title, $prodesc, $offer, $address, $joint, $state, $city, $extra, $images, $pid)
    {
        $sql = "UPDATE joint_venture SET joint_title='$title',
                                       joint_description='$prodesc',
                                       address='$address',
                                       offer= '$offer',
                                       joint_tc= '$joint',
                                       states_id='$state',
                                       city_id='$city'
                                       WHERE jointventure_id= '$pid' ";

                //   die($sql);
        $result = $this->con->query($sql);
        if ($result) {
            $count = 10000;
            $output_dir = "images/sponsor/"; /* Path for file upload */
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
            if (!empty($extra)) {
                $check = [];
                foreach ($extra as $add) {
                    $check = $add;
                    $sql4 = "UPDATE joint_type SET joint_name='$check' WHERE joint_type.jointventure_id= '$pid'";
                            //    die($sql4);
                    $result4 = $this->con->query($sql4);

                }
            }

            return true;

        }

    }


    public function showJointVentures()
    {
                //tHIS IS TO REMOVE EMPTY OR NULL VARIABLES
        $where = "WHERE ";
                // get the pagenum.  If it doesn't exist, set it to 1
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        // set the number of entries to appear on the page
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture 
        WHERE joint_venture.deleted='0' 
        AND joint_venture.jstatus='approved'
        ");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        $entries_per_page = 10;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        $sql = "SELECT * FROM joint_venture 
       LEFT  JOIN agents ON joint_venture.agent_id = agents.agent_id 
       LEFT  JOIN states ON joint_venture.states_id = states.states_id 
       LEFT  JOIN city ON joint_venture.city_id = city.city_id 
       WHERE joint_venture.deleted='0' 
       AND joint_venture.jstatus='approved'
        ORDER BY date_posted 
        DESC LIMIT $offset, $entries_per_page";
        // die($sql);
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }

    public function pagination_joint($webpage, $page)
    {
        if (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $sql1 = mysqli_query($this->con, "SELECT COUNT(jointventure_id) As total_records FROM joint_venture  
        WHERE joint_venture.deleted='0' 
        AND joint_venture.jstatus='approved'");
        $total_records = mysqli_fetch_array($sql1);
        $total_records = $total_records['total_records'];
        // set the number of entries to appear on the page
        $entries_per_page = 2;
        // total pages is rounded up to nearest integer
        $total_pages = ceil($total_records / $entries_per_page);
        // offset is used by SQL query in the LIMIT
        $offset = (($page * $entries_per_page) - $entries_per_page);
        // Maximum number of links per page.  If exceeded, google style pagination is generated
        $max_links = 10;
        $h = 1;
        if ($page > $max_links) {
            $h = (($h + $page) - $max_links);
        }
        if ($page >= 1) {
            $max_links = $max_links + ($page - 1);
        }
        if ($max_links > $total_pages) {
            $max_links = $total_pages + 1;
        }
        if ($page > 1) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page - 1) . '" >Prev</a></li> ';
        }

        if ($total_pages != 1) {
            for ($i = $h; $i < $max_links; $i++) {
                if ($i == $page) {
                    echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a href="' . $webpage . '?page=' . $i . '" class="page-link">' . $i . '</a> </li>';
                }
            }
        }

        if (($page >= 1) && ($page != $total_pages)) {
            echo '<li class="page-item" disabled><a class="page-link" href="' . $webpage . '?page=' . ($page + 1) . '">Next</a></li>';
        }
    }

    public function showRecentJoint()
    {
        $sql = "SELECT * FROM joint_venture 
        JOIN agents ON joint_venture.agent_id = agents.agent_id 
        JOIN states ON joint_venture.states_id = states.states_id 
        JOIN city ON joint_venture.city_id = city.city_id   
        WHERE joint_venture.deleted='0' 
        AND joint_venture.jstatus='approved'
        order by date_posted desc limit 3";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

    }

}
