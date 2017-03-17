<?PHP
//Gets form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone1 = $_POST["areaCode"];
$phone2 = $_POST["phoneMiddle"];
$phone3 = $_POST["phoneEnding"];
$message = $_POST["message"];

//Formates Email message
$emailBodyHost = "Name: ".$name."\nPhone Number: ".$phone1."-".$phone2."-".$phone3."\nMessage: ".$message;
$emailBodyUser = "Dear ".$name.",\n\nThank you for your inquiry.  We will contact you soon. \n\nSincerely,\nMaster Painting and Maintenance";
$header = 'From: accounts@masterpaintinginc.net' . "\r\n" . 'Reply-To: accounts@masterpaintinginc.net' . "\r\n" . 'X-Mailer: PHP/'.phpversion();

//Sends Email
mail("ginachoioi@gmail.com","MasterPainting Inquiry",$emailBodyHost,$header);
mail($email,"Thank You For Your Inquiry",$emailBodyUser,$header);

//Message After submitting
echo "Thank you for your inquiry. \nWe will contact you shortly and an email confirmation has been sent to you.";

//Writes data to text document
$myFile = fopen("userData.txt","a") or die("Failed to open file");
$date = "Date: ".date("F d Y H:i:s.");
$text = $date."\n".$emailBodyHost;

fwrite($myFile,$text) or die("Could not write to file");
fclose($myFile);


?>