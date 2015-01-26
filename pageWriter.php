<?php

if(isset($_POST['page']) === FALSE) {
	echo 'Failure: page variable is not posted';
	exit;
} 
else {
	echo 'success';
}

// Instead of making it this way, make it a page first and just have it called and wrote


/**
$filename = 'test.html';

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in write mode.
    if (!$handle = fopen($filename, 'w')) {
         echo "Failure: Cannot open file ($filename)";
         exit;
    }

	// Write the content to the actual page
    if (fwrite($handle, $_SESSION['page']) === FALSE) {
        echo "Failure: Cannot write to file ($filename)";
        exit;
    }

    echo "Success";

    fclose($handle);

} else {
    echo "Failure: The file $filename is not writable";
}
**/
?>