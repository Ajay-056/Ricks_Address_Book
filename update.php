<?php
    session_start();
    $new4 = "";
    if(isset($_SESSION["sesusid"])){
      $new4 = $_SESSION["sesusid"];
    }
    $resname = $phoneno = $email = $sgno = $nocr = $cr = $cr1 = $cr2 = $cr3 = $cr4 = $cr5 = $address = "";
    $wm2 = $wregno2 = $color = $wm4 = $wregno4 = $color4 = $password ="";

    $resname = $_POST["resname"];
    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    $sgno = $_POST["sgno"];
    $nocr = $_POST["nocr"];
    $cr1 = $_POST["cr1"];
    $cr2 = $_POST["cr2"];
    $cr3 = $_POST["cr3"];
    $cr4 = $_POST["cr4"];
    $cr5 = $_POST["cr5"];
    $address = $_POST["address"];
    $wm2 = $_POST["2wm"];
    $wregno2 = $_POST["2wregno"];
    $color = $_POST["color"];
    $wm4 = $_POST["4wm"];
    $wregno4 = $_POST["4wregno"];
    $color4 = $_POST["4color"];
    $password = $_POST["password"];

    $cr = $cr1.",".$cr2.",".$cr3.",".$cr4.",".$cr5;
    
    $conn = new mysqli("localhost", "root", "","ricksab");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo "\n";
    }

    $sql="update personaldetails set residentName = '".$resname."', phoneNumber = '".$phoneno."', email = '".$email."', sgno = '".$sgno."', nocr = '".$nocr."', coResidents = '".$cr."', address = '".$address."', 2wm = '".$wm2."', 2wregno = '".$wregno2."', color = '".$color."', 4wm ='".$wm4."', 4wregno = '".$wregno4."', 4color ='".$color4."' where uid = '".$new4."'";
     
    $result = mysqli_query($conn,$sql);

    $sql1 = "update creditionals set password ='".$password."' where userID = '".$new4."'";
    
    $result1 = mysqli_query($conn,$sql1);

    if($result && $result1){  
        
        echo "<script>alert(\"Update Success!\")</script>";
        header("Location: home.php");
    }
    else 
    {
        echo "<script>alert(\"Update failed!\")</script>";
        header("Location: home.php");
    }  
 	
    mysqli_close($conn);
    

  function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>