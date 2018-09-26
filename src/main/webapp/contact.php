<?php
// Website Contact Form Generator 
// http://www.tele-pro.co.uk/scripts/contact_form/ 
// This script is free to use as long as you  
// retain the credit link  

// get posted data into local variables
$EmailFrom = Trim(stripslashes($_POST['EmailFrom'])); 
$EmailTo = "support@mgainz.com";
$Subject = "Query from your website - Mgainz Communication";
$Name = Trim(stripslashes($_POST['Name'])); 
$Contact = Trim(stripslashes($_POST['Contact']));
$Query = Trim(stripslashes($_POST['Query'])); 


// validation
$validationOK=true;
if (Trim($EmailFrom)=="Email address") $validationOK=false;
if (Trim($Name)=="Your name") $validationOK=false;
if (Trim($Contact)=="Contact number") $validationOK=false;
if (Trim($Query)=="Your query...") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Your name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "\n";
$Body .= "Contact Number: ";
$Body .= $Contact;
$Body .= "\n";
$Body .= "\n";
$Body .= "Email Address:";
$Body .= $EmailFrom;
$Body .= "\n";
$Body .= "\n";
$Body .= "Your Query: ";
$Body .= $Query;
$Body .= "\n";
$Body .= "\n";


// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=ok.htm\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>
