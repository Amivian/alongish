<?php 
require_once "database.php";
$db = $db;
$contact_us=$nameErr=$emailErr=$phoneErr=$msgErr='';
// set empty input value into the contact field
$set_name=$set_email=$set_phone=$set_msg='';


extract($_POST);
if(isset($contact))
{
   
   //regular expression
   $validName="/^[a-zA-Z ]*$/"; // full Name
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/"; // Email
   
 
    //Full Name Validation
    if(empty($fullname)){
    $nameErr="Full Name is Required"; 
    }
    else if (!preg_match($validName,$fullname)) {
    $nameErr="Only Characters and white spaces are allowed";
    }
    else{
    $nameErr=true;
    }
    //Email Address Validation
    if(empty($email)){
    $emailErr="Email is Required"; 
    }
    else if (!preg_match($validEmail,$email)) {
    $emailErr="Invalid Email Address";
    }
    else{
    $emailErr=true;
    }

    //phone Validation
    if(empty($phone)){
    $phoneErr="Input your Phone Number"; 
    }else{
    $phoneErr=true;
    }
        
    //message Validation
    if(empty($msg)){
    $msgErr="Message is Required"; 
    }else{
    $msgErr=true;
    }

    // user id
    if(empty($a_id)){
     }else{
        $a_id= true;
     }



// check all fields are valid or not
if( $nameErr==1 && $emailErr==1 && $phoneErr==1 && $msgErr==1)
{
 
   //legal input values
   $fullName=  legal_input($fullname);
   $emailAddress=  legal_input($email);
   $phone=  legal_input($phone);
   $message=  legal_input($msg);
   $a_id = $a_id;

   
   // call fucntion to store contact message
   store_message($fullName,$emailAddress,$phone,$message,$a_id);
   // function whic is contained sending mail script
   $contact_us=send_mail($fullName,$emailAddress,$phone,$message);
}
else{
    // set user input value into the contact field

  $set_name    = $fullname;
  $set_email   = $email;
  $set_phone = $phone;
  $set_msg     = $msg;
}
}

// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }
  // function to send mail to the website owner
  function send_mail($fullName,$emailAddress,$phone,$message){
     
    
              $to = 'amiviann@gmail.com'; // Enter Website Owner Email
              $subject = ' Contact Message was sent by ' .$fullName;
              $message = '<h2> Someone Messaged you From alongish.com kindly find their details below</h2>
                        <h3>Full Name</h3>
                        <p>'.$fullName.'</p>
                        <h3>Email Address</h3>
                        <p>'.$emailAddress.'</p>
                        <h3>Phone</h3>
                        <p>'.$phone.'</p>
                        <h3>Message</h3>
                        <p>'.$message.'</p>';
              
              // Set content-type header for sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              $headers .= 'From: '.$emailAddress.'('.$fullName.')'. "\r\n";
              
              // Send email
              if(mail($to,$subject,$message,$headers)){
                   return 'Your Message was sent Successfully, Will we get back to you';
                 
              }else{
                  return 'Message is unable to send, please try again.';
                  
              }
  }
  
  
  // function to insert user data into database table
  function store_message($fullName,$emailAddress,$phone,$message,$a_id){
  
     global $db;
     $sql="INSERT INTO agent_message (fname,email,phone,message_content,agent_id) VALUES('$fullName','$emailAddress','$phone','$message','$a_id')";
    //  die($sql);
     $query=$db->query($sql);
      if($query)
      {
      $_SESSION['response']='Your Message was sent Successfully, Will we get back to you.';
      header("Location:agent-listing.php");
      }
      else
      {
       $_SESSION['response']="message failed";
        header("Location:agent-listing.php");
      }
  }
  
?>