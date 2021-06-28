<?php  
$dbHost     = "localhost";  
$dbUsername = $_SERVER['MYSQL_USER']; 
$dbPassword = $_SERVER['MYSQL_PASSWORD']; 
$dbName     = "library";  
   
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($conn->connect_error) 
{  
    die("Connection failed: " . $conn->connect_error);  
}


  // If upload button is clicked 
  if(isset($_POST["new_post"])){ 
    $status = 'error'; 
    $title = $_REQUEST['title'];
    $author = $_REQUEST['author'];
    $content = $_REQUEST['content'];

    /*
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sq = "INSERT INTO book_data(book_name, author_name, descript, img, last_modify) VALUES('$title', '$author', '$content', '$imgContent', NOW())";
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } */
    // Display status message 
    $sq = "INSERT INTO book_data(book_name, author_name, descript, last_modify) VALUES('$title', '$author', '$content', NOW())";
    echo $statusMsg; 

    mysqli_query($conn, $sq);
    echo $sq;

    header("Location: index.php?info=added");
    exit();
} 
 
// If delete button is clicked
if(isset($_POST["delete"])){
    $bid = $_REQUEST['id'];
    $quer = "DELETE FROM book_data where bid = $bid";
    mysqli_query($conn, $quer);
    echo $quer;
    header("Location: index.php?info=deleted");
    exit();
}

?>


