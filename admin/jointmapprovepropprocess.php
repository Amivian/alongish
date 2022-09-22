<?php 
if (isset($_POST['jmstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
    $sponsorSms = new admin\Property;
    $output= $sponsorSms->approveStatusVenture($iddd,$staty);

    if($output) 
    {
      $_SESSION['message'] = "Property Status Changed Successfully"; 
    }else
    {
      $_SESSION['message'] = "Failed to Approve Property, Try again";
    }

}

 ?>