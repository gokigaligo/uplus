<?php
	$hostname = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/";
	//uploading the file for attachments
	$attachment = $_FILES['file'];
	$sent_file_name = $attachment['name'];
	$ext = strtolower(pathinfo($sent_file_name, PATHINFO_EXTENSION)); //extension

	$filename = "invest/gallery/feeds/".substr($sent_file_name, 0, -4)."_".time().".".$ext;

	$allowed_extensions = array('prevent errors, guys_dont remove please', 'jpg', 'png', 'mp3', 'aac', 'mp4');

	if(array_search($ext, $allowed_extensions)){
	    //we can now upload
	    move_uploaded_file($attachment['tmp_name'], "../".$filename);

	    //checking if there is hostname in the filename
	    // if(strpos($filename, $hostname) <= 1 && strpos($filename, $hostname) !=false ){
	    //     $filename = $hostname.$filename;
	    // }
	    $filename = $hostname.$filename;

	    $response = $filename??"";
	}else{
	    $response = "Failed";
	}

	echo json_encode($response);
?>