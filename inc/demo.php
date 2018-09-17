<?php
require("includes/db.php");


if(isset($_POST['Submit']))
{
    $cityname=$_POST['cityname'];
    $cityimage=$_FILES['cityimage'];

if (isset($_FILES ["cityimage"]) and isset($_POST ["cityname"]))
{

  $stmt=$con->prepare("select name from pasistence_city where name=?");
                $stmt->bind_param("s",$cityname);
                $stmt->execute();
              
echo "1";
                if($stmt->num_rows>0)
                {
                    $stmt->close();
                    echo 'Repeated name';
                    
                }
                else
                {
                            
                 if (($_FILES ["cityimage"] != "") and ($_POST ["cityname"] != ""))
                  { 
                          $filenm = $_FILES["cityimage"]["name"]; //name of file
                                    $tempnm = $_FILES["cityimage"]["tmp_name"]; // temp name of file

                                    $folder="img/city/".time().$filenm;
                                    move_uploaded_file($tempnm,$folder);

                                    print_r($folder);

echo "2";               

                          $sql = "INSERT INTO   pasistence_city(name,image) values ($cityname,$folder)";
    mysqli_query($con,$sql);
    if (mysqli_errno())
    {
            echo "<script>alert('License already registered');location.replace('customerform.html');</script>";
    }   
                        // $stmt1=$con->prepare("insert into pasistence_city(name,image) values (?,?)");
                        // $stmt1->bind_param("ss",$cityname,$folder);
                        // echo "3";  
                        // $result=$stmt1->execute();

                        // echo "4";  
                        // $stmt1->close();
                  }
                  else if(empty($cityname) or empty($cityimage))
                    {
                       $error_message=" All (*) fields are required !";
                       

                    }
                } 


}
}
?>

