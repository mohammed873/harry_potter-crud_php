<?php
session_start();
include 'config.php';

$update=false;
$id="";
$name="";
$email="";
$phone="";
$picture="";


/* the insertion to database function*/
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $picture=$_FILES['picture']['name'];
    $upload="uploads/".$picture;

    $query= "INSERT INTO crud (name,email,phone,picture) VALUES(?,?,?,?)";
    $stmt=$conix->prepare( $query);
    $stmt->bind_param('ssss',$name, $email,$phone,$upload);
    $stmt->execute();

    //to store pictures to the uploads file
    move_uploaded_file($_FILES['picture']['tmp_name'], $upload);
      
    //To redirect to the main page 
    header('location:index.php');
    //inserting alert
    $_SESSION['response']="Successfully Added to the table of magic";
}


/* the delete function*/
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

/* the delete function for pictures from the directely*/
    $sql="SELECT Picture FROM crud WHERE id =?";
    $stmt2=$conix->prepare($sql);
    $stmt2->bind_param("i",$id);
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $row=$result2->fetch_assoc();
        $picturepath=$row['Picture'];
        unlink($picturepath);

    $query="DELETE FROM crud WHERE id = ?";
    $stmt=$conix->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
     
     header('location:index.php');
     $_SESSION['response']="Successfully Deleted from the table of magic";
}


/* the Edit function*/
if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $query="SELECT * FROM crud WHERE id =?";
    $stmt=$conix->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $id=$row['Id'];
    $name=$row['Name'];
    $email=$row['Email'];
    $phone=$row['phone'];
    $picture=$row['Picture'];

    $update=true;
}
 if(isset($_POST['update'])){
     $id=$_POST['id'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $oldpicture=$_POST['oldpicture'];

     if(isset($_FILES['picture']['name'])&&($_FILES['picture']['name']!="")){
       $newpicture="uploads/".$_FILES['picture']['name'];
       unlink($oldpicture);
       move_uploaded_file($_FILES['picture']['tmp_name'],$newpicture);
     }
     else{
         $newpicture=$oldpicture;
     }
     $query="UPDATE crud SET name=?,email=?,phone=?,picture=? WHERE id=?";
     $stmt=$conix->prepare($query);
     $stmt->bind_param("ssssi",$name,$email,$phone,$newpicture,$id);
     $stmt->execute();

     header('location:index.php');
     $_SESSION['response']="Successfully Updated from the table of magic";
    }

/* the details function*/
if(isset($_GET['details'])){
    $id=$_GET['details'];

    $query="SELECT * FROM crud WHERE id =?";
    $stmt=$conix->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $vid=$row['Id'];
    $vname=$row['Name'];
    $vemail=$row['Email'];
    $vphone=$row['phone'];
    $vpicture=$row['Picture'];

}

?>