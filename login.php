<?php
    session_start();

    $lusid = $lpass = "";

    $lusid = test_input($_POST["uid"]); 
    $lpass =  test_input($_POST["password"]);
    
    if(isset($lusid)){
        
        $_SESSION["sesusid"] = $lusid;
    }
    else{
        $_SESSION["sesusid"] = "";
    }
    
    

    $conn = new mysqli("localhost", "root", "","ricksab");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
    

    $sql="SELECT userID,password,userType FROM creditionals where userID='".$lusid."' and password='".$lpass."'";
     
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        
    while($rowvalue = mysqli_fetch_assoc($result)) {
 	$dbusid= $rowvalue['userID'];
 	$dbpass= $rowvalue['password'];
    $dbuserType = $rowvalue['userType'];
        
    if($dbuserType == "admin" && $lusid == $dbusid && $lpass == $dbpass){
        
        $_SESSION["loginstate"] = "true";
        header("Location: admin.php");
    }
 	else if ($lusid == $dbusid && $lpass == $dbpass) 
    {
        $_SESSION["loginstate"] = "true";
        header("Location: home.php");
     }
    
    }
   }
    else 
    {
        $_SESSION["loginstate"] = "false";
        echo "<script>alert(\"Invalid Creditionals! Please try again...\")</script>";
        echo "<script>window.location = 'index.html' </script>";
    }  
 	
    mysqli_close($conn);

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
