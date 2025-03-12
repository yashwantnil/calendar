<?php
session_start();

function amPmTo24Hour($time, $amPm) {
  $hour = (int)substr($time, 0, 2);
  if ($amPm == "pm" && $hour != 12) {
    $hour += 12;
  } else if ($amPm == "am" && $hour == 12) {
    $hour = 0;
  }
  
  return str_pad($hour, 2, "0", STR_PAD_LEFT) .":". substr($time, 2).":00";
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "testcalendar";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Email account details
$hostname = '{mail.is4sb.com:993/imap/ssl}INBOX'; // IMAP Server (Change for Outlook/Yahoo)
$username = 'sp@is4sb.com';  // Your email address
$password = 'Trythis1233';    // App password (not regular password)

// Connect to IMAP server
$inbox = imap_open($hostname, $username, $password) or die('Cannot connect to IMAP: ' . imap_last_error());

// Fetch emails
$emails = imap_search($inbox, 'UNSEEN'); // Fetch all emails

//echo "<pre>";
//print_r($emails);
//echo "</pre>";
if ($emails) {
    rsort($emails); // Sort from newest to oldest

    foreach ($emails as $email_number) {
		
        $header = imap_headerinfo($inbox, $email_number);
		
		$from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
        $subject1 = $header->subject;
		$calllink="";
		if(str_starts_with($subject1, 'Invitation:') || str_starts_with($subject1, 'Updated invitation:')) { //Updated invitation:
		
		$invitation_content = str_replace("Invitation:","",$subject1);
		$invitation_content = str_replace("Updated invitation:","",$invitation_content);
		$inv_parts = explode(",",$invitation_content);
		$inv_parts1 = explode("@",$inv_parts[0]);
		$inv_parts11 = explode(" ",$inv_parts1[1]);
		$inv_parts2 = explode(" ",$inv_parts[1]);
		
		//echo "<pre>";
		//print_r($inv_parts1);
		//print_r($inv_parts11);
		//print_r($inv_parts2);
		
		echo "</pre>";
		$subject = $inv_parts1[0];
		if($inv_parts11[2]=="Jan")
			$mon="01";
		if($inv_parts11[2]=="Feb")
			$mon="02";
		if($inv_parts11[2]=="Mar")
			$mon="03";
		if($inv_parts11[2]=="Apr")
			$mon="04";
		
		if($inv_parts11[2]=="May")
			$mon="05";
		if($inv_parts11[2]=="Jun")
			$mon="06";
		if($inv_parts11[2]=="Jul")
			$mon="07";
		if($inv_parts11[2]=="Aug")
			$mon="08";
		
		if($inv_parts11[2]=="Sep")
			$mon="09";
		if($inv_parts11[2]=="Oct")
			$mon="10";
		if($inv_parts11[2]=="Nov")
			$mon="11";
		if($inv_parts11[2]=="Dec")
			$mon="12";
		$date = $inv_parts2[1]."-".$mon."-".$inv_parts11[3];
		$start = $date." ".amPmTo24Hour(substr($inv_parts2[2],0,-2),substr($inv_parts2[2],-2));
		//$start = $inv_parts2[2];
		//$end = $inv_parts2[4];
		$end =  $date." ".amPmTo24Hour(substr($inv_parts2[4],0,-2),substr($inv_parts2[4],-2));
		$tz = str_replace("(","",$inv_parts2[5]);
		$tz = str_replace(")","",$tz);
		$to = str_replace("(","",$inv_parts2[6]);
		$to = str_replace(")","",$to);
		// Check if event already exists
    $checkQuery = "SELECT id FROM events WHERE title='".$subject."' AND start_datetime='".$start."' AND end_datetime='".$end."'";
    $result = $conn->query($checkQuery);
    
    if ($result->num_rows == 0) {	
		$insertQuery = "INSERT INTO events (title, calllink,start_datetime, end_datetime,idate,itimezone,iinvite) VALUES ('$subject', '$calllink','$start', '$end','$date', '$tz', '$to')";
       //echo $insertQuery."<br>";
		$conn->query($insertQuery);
	}
        // Uncomment below to delete emails after reading
        // imap_delete($inbox, $email_number);*/
		}
    }
	echo "Process Done...";
} else {
    echo "No emails found.\n<br />";
}

// Close the IMAP connection
imap_close($inbox);
$conn->close();
?>