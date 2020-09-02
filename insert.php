<?php
    $resname = $phoneno = $email = $sgno = $nocr = $cr = $cr1 = $cr2 = $cr3 = $cr4 = $cr5 = $address = "";
    $wheeler2 = $wheeler4 = $wm2 = $wregno2 = $color = $wm4 = $wregno4 = $color4 = $usid = $password ="";

    $resname = test_input($_POST["resname"]);
    $phoneno = test_input($_POST["phoneno"]);
    $email = test_input($_POST["email"]);
    $sgno = test_input($_POST["sgno"]);
    $nocr = test_input($_POST["nocr"]);
    $cr1 = test_input($_POST["h1"]);
    $cr2 = test_input($_POST["h2"]);
    $cr3 = test_input($_POST["h3"]);
    $cr4 = test_input($_POST["h4"]);
    $cr5 = test_input($_POST["h5"]);
    $cr = $cr1 . "," .$cr2 . "," .$cr3 . "," .$cr4 . "," .$cr5;
    $address = test_input($_POST["address"]);
    $wheeler2 = test_input($_POST["2wheeler"]);
    $wheeler4 = test_input($_POST["4wheeler"]);
    $wm2 = test_input($_POST["2wm"]);
    $wregno2 = test_input($_POST["2wregno"]);
    $color = test_input($_POST["color"]);
    $wm4 = test_input($_POST["4wm"]);
    $wregno4 = test_input($_POST["4wregno"]);
    $color4 = test_input($_POST["4color"]);
    $usid = test_input($_POST["usid"]);
    $password = test_input($_POST["password"]);
    
    $conn = new mysqli("localhost", "root", "","ricksab");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo "\n";
    }
    
    $sql = "INSERT INTO creditionals (userID, password) VALUES ('$usid', '$password')";
    
    $sql1 = "INSERT INTO personaldetails (uid, residentName, phoneNumber, email, sgno, nocr, coResidents, address, 2wheeler, 2wm, 2wregno, color, 4wheeler, 4wm, 4wregno, 4color	) VALUES ('$usid' ,'$resname', '$phoneno', '$email', '$sgno', '$nocr', '$cr', '$address', '$wheeler2', '$wm2', '$wregno2', '$color', '$wheeler4', '$wm4', '$wregno4', '$color4')";

    if (mysqli_query($conn, $sql) and mysqli_query($conn, $sql1)) {
            
        echo "<script>alert(\"Registration Success! + $cr1\")</script>";
        echo "<script>window.location = 'index.html' </script>";
        } 
    else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "\n";
        }

    mysqli_close($conn);

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($data == ""){
            return $data = "None";
        }
        else{
            return $data;
        }
    }
?>