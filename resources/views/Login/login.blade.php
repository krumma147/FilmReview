<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb46d8f343.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>

    <div class="d-flex justify-content-center mt-4">
        <div class="d-inline">
            <form action="login.php" method="Post">

                <h1 class="text-center">Choose Account Type</h1>

                <div class="form-group d-flex p-2">
                    <div class="p-1 border border-info border-4 m-1 rounded text-center">
                        <label for="isUser">
                            <img style="height: 200px; width: 200px" src="{{url('../images/user.png')}" alt="admin_image">
                            <p>User</p>
                            <input type="radio" id="isUser" name="logintype" value="User" checked   >
                        </label>
                    </div>

                    <div class="p-1 border border-info border-4 m-1 rounded text-center">
                        <label for="isAdmin">
                            <img style="height: 200px; width: 200px" src="../images/admin.png" alt="admin_image">
                            <p>Admin</p>
                            <input type="radio" id="isAdmin" name="logintype" value="Admin">
                        </label>
                    </div>
                </div>

                <div class="form-group p-2">
                    <Label>UserName</Label>
                    <input type="text" name="usn" value="" class="form-control">
                </div>

                <div class="form-group p-2">
                    <Label>Password</Label>
                    <input type="password" name="psw" value="" class="form-control">
                </div>

                <div class="form-group p-2 text-center">
                    <button type="submit" class="btn btn-primary btn-lg mb-3 " name="LoginBtn" value="Go">Login</button>
                    <p>Do not have an account?<a href="register.php">Click here.</a></p>
                    <p>Go back to <a href="index.php">home page.</a></p>
                    <?php
                        if(isset($_POST["LoginBtn"])){
                            if(isset($_POST["usn"]) && isset($_POST["psw"])){
                                $isAdmin = $_POST["logintype"] == "Admin" ? 1 : 0;
                                $usn=$_POST["usn"];
                                $psw=$_POST["psw"];
                                $sql = "select * from account where Username = '" .$usn ."' and Password = '" .$psw."' and isAdmin = '" .$isAdmin ."' ";
                                $users= query($sql);
                                if($_POST['logintype']=="Admin" && count($users)>0){
                                    $_SESSION['AdminId']=$users[0][0];
                                    $_SESSION['AdminName']=$users[0][1];
                                    $_SESSION['UserType']="Admin"; 
                                    header("Location:./admin/manageForm.php?manage=product");
                                }else if(count($users)>0){
                                    $_SESSION['UserId']=$users[0][0];
                                    $_SESSION['UserName']=$users[0][1];
                                    $_SESSION['UserType']="User";
                                    // setcookie("UserName",$users[0][1]);
                                    // setcookie("AdminName","");
                                    header("Location:./index.php");
                                }else{
                                    echo '<script>alert("Invalid account! Check your type of account again!")</script>';
                                }
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
        
    </div>

    
</body>
</html>

