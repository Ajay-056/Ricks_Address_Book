<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Font%2520Awesome/css/all.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    session_start();
    
    $new5 = "";
    if(isset($_SESSION["sesusid"])){
      $new5 = $_SESSION["sesusid"];
    }
    $conn = new mysqli("localhost", "root", "","ricksab");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
    
        
    $res=mysqli_query($conn,"select * from personaldetails");
    
    while($rowvalue = mysqli_fetch_assoc($res)) {
 	$rid = $rowvalue["rid"];
    $uid = $rowvalue["uid"];
    $residentName = $rowvalue["residentName"];
    $phoneNumber = $rowvalue["phoneNumber"];
    $email = $rowvalue["email"];
    $sgno = $rowvalue["sgno"];
    $nocr = $rowvalue["nocr"];
    $coResidents = $rowvalue["coResidents"];
    $address = $rowvalue["address"];
    $wm2 = $rowvalue["2wm"];
    $wregno2 = $rowvalue["2wregno"];
    $color = $rowvalue["color"];
    $wm4 = $rowvalue["4wm"];
    $wregno4 = $rowvalue["4wregno"];
    $color4 = $rowvalue["4color"];
    
    echo "<script>
        $(document).ready(function(){
                    $(\".tb\").append(`<tr> <td>$rid</td><td>$uid</td><td>$residentName</td><td>$phoneNumber</td><td>$email</td><td>$sgno</td><td>$nocr</td><td>$coResidents</td><td>$address</td><td>$wm2</td><td>$wregno2</td><td>$color</td><td>$wm4</td><td>$wregno4</td><td>$color4</td> </tr>`);
    });
    </script>";
    }


    ?>

    <table class="table table-striped table-responsive-sm mb-5">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>User ID</th>               
                <th>residentName</th>
                <th>phoneNumber</th>
                <th>email</th>
                <th>Security/Guardian number</th>
                <th>No of co-residents</th>
                <th>coResidents name</th>
                <th>address</th>
                <th>2 wheeler model</th>
                <th>2 wheeler reg no</th>
                <th>2 wheeler color</th>
                <th>4 wheeler model</th>
                <th>4 wheeler reg no</th>
                <th>4 wheeler color</th>
            </tr>
        </thead>
        <tbody class="tb">

        </tbody>
    </table>
</body>
</html>