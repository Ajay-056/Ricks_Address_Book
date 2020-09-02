<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Font Awesome/css/all.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body class="homebody">
    <?php 
        session_start();
    
        if($_SESSION["loginstate"] == "true"){
        $new2 = "";
        if(isset($_SESSION["sesusid"])) {
            $new2 = $_SESSION["sesusid"];
        }
        $conn = new mysqli("localhost", "root", "","ricksab");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

    $sql="SELECT * FROM personaldetails where uid = '".$new2."'";
    
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        
    while($rowvalue = mysqli_fetch_assoc($result)) {
 	
    $uid = $rowvalue["uid"];
    $resname = $rowvalue["residentName"];
    $phoneno = $rowvalue["phoneNumber"];
    $email = $rowvalue["email"];
    $sgno = $rowvalue["sgno"];
    $nocr = $rowvalue["nocr"];
    $cr = $rowvalue["coResidents"];
    $address1 = $rowvalue["address"];
    $wm2 = $rowvalue["2wm"];
    $wregno2 = $rowvalue["2wregno"];
    $color = $rowvalue["color"];
    $wm4 = $rowvalue["4wm"];
    $wregno4 = $rowvalue["4wregno"];
    $color4 = $rowvalue["4color"];
        
        }
    $carr = explode(",",$cr);
    
    }
            
    $sql1="SELECT password FROM creditionals where userID = '".$new2."'";
    
    $result1 = mysqli_query($conn,$sql1);

    if(mysqli_num_rows($result1) > 0){
        
    while($rowvalue1 = mysqli_fetch_assoc($result1)) {
 	
    $password = $rowvalue1["password"];
        
        }
    }
    
        }
    else{
        header("Location: index.html");
    }
    mysqli_close($conn);
    ?>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <h3 class="navbar-brand">
                Rick's address book
            </h3>
            <div>
                <span class="d-inline-block font-weight-bold text-white">Welcome, <?php echo $resname ?></span>
                <span class="d-inline-block"><a href="logout.php" class="nav-link text-warning"><i class="fas fa-user-times"></i> &nbsp;Logout</a></span>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5 border border-light">
        <form action="update.php" method="post">
            <h4 class="bg-success py-2 text-white text-center">Personal Details</h4>

            <div class="row px-5 mt-3">
                <div class="col-sm">
                    <label for="resname">Name</label>
                    <input type="text" value="<?php echo $resname ?>" class="form-control" name="resname" id="resname">
                </div>
                <div class="col-sm">
                    <label for="phoneno">Phone Number</label>
                    <input type="text" value="<?php echo $phoneno ?>" class="form-control" pattern="^[6,7,8,9]{1}[0-9]{9}" name="phoneno" id="phoneno">
                </div>
                <div class="col-sm">
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo $email ?>" class="form-control" name="email" id="email">
                </div>

            </div>
            <div class="row px-5 mt-3">
                <div class="col-sm">
                    <label for="sgno">Security/Guardian number</label>
                    <input type="text" value="<?php echo $sgno ?>" pattern="^[6,7,8,9]{1}[0-9]{9}" name="sgno" class="form-control" id="sgno">
                </div>
                <div class="col-sm">
                    <label for="nocr">Number of co-residents (Upto 5)</label>
                    <input type="number" value="<?php echo $nocr ?>" min="0" max="5" name="nocr" class="form-control" id="nocr">
                </div>
            </div>
            <div class="row px-5 mt-3">
                <div class="col-sm">
                    <label for="cr1">Name of co-resident 1</label>
                    <input type="text" class="form-control" name="cr1" id="cr1" value="<?php echo $carr[0] ?>">
                </div>
                <div class="col-sm">
                    <label for="cr2">Name of co-resident 2</label>
                    <input type="text" class="form-control" name="cr2" id="cr2" value="<?php echo $carr[1] ?>">
                </div>
                <div class="col-sm">
                    <label for="cr3">Name of co-resident 3</label>
                    <input type="text" class="form-control" name="cr3" id="cr3" value="<?php echo $carr[2] ?>">
                </div>
                <div class="col-sm">
                    <label for="cr4">Name of co-resident 4</label>
                    <input type="text" class="form-control" name="cr4" id="cr4" value="<?php echo $carr[3] ?>">
                </div>
                <div class="col-sm">
                    <label for="cr5">Name of co-resident 5</label>
                    <input type="text" class="form-control" name="cr5" id="cr5" value="<?php echo $carr[4] ?>">
                </div>
                              
            </div>
            <div class="row px-5">
                <div class="col">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address"><?php echo $address1 ?></textarea>
                </div>
            </div>

            <h4 class="bg-success py-2 text-white text-center mt-5">Vechicle Details</h4>
            <div class="px-5 mt-5 2wheeler">
                <div class="row">
                    <div class="col-sm">
                        <label for="2wm">2 wheeler name/model</label>
                        <input type="text" value="<?php echo $wm2 ?>" class="form-control" name="2wm" id="2wm">
                    </div>
                    <div class="col-sm">
                        <label for="2wregno">2 wheeler register number</label>
                        <input type="text" value="<?php echo $wregno2 ?>" class="form-control" name="2wregno" id="2wregno">
                    </div>
                    <div class="col-sm">
                        <label for="color">2 wheeler color</label>
                        <input type="text" value="<?php echo $color ?>" class="form-control" name="color" id="color">
                    </div>

                </div>
            </div>
            <div class="px-5 mt-5 4wheeler">
                <div class="row">
                    <div class="col-sm">
                        <label for="4wm">4 wheeler name/model</label>
                        <input type="text" value="<?php echo $wm4 ?>" class="form-control" name="4wm" id="4wm">
                    </div>
                    <div class="col-sm">
                        <label for="4wregno">4 wheeler register number</label>
                        <input type="text" value="<?php echo $wregno4 ?>" class="form-control" name="4wregno" id="4wregno">
                    </div>
                    <div class="col-sm">
                        <label for="4color">4 wheeler color</label>
                        <input type="text" value="<?php echo $color4 ?>" class="form-control" name="4color" id="4color">
                    </div>

                </div>
            </div>
            <h4 class="bg-success py-2 mt-5 text-white text-center mt-5">Login Details(Auto Generated)</h4>
            <div class="row px-5 mt-3">
                <div class="col-sm">
                    <label for="usid">User Id</label>
                    <input type="text" name="usid" value="<?php echo $uid ?>" class="form-control" id="usid" readonly>
                </div>
                <div class="col-sm parenteye1">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $password ?>" class="form-control" id="password">
                    <span class="eye1 fas fa-eye toggle-password" toggle="#password"></span>
                </div>
            </div>
            <div class="form-group row justify-content-center mt-5">
                <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function(){
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
    </script>
</body>

</html>
