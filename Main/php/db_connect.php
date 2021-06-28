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


