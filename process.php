<?php

    //To avoid " Ignoring session_start() because a session is already active " error
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$conn= new mysqli('localhost','root','','storage management') or die(mysqli_error($conn));

//To make inputs empty 
      $id = '';
      $item ='';
      $price ='';
      $storage = '';
      $description = '';
      $update = false;

//Insert
if(isset($_POST['save'])){
       $item=$_POST["item"];
       $description=$_POST["description"];
       $price=$_POST["price"];
       $storage=$_POST["storage"];

$conn->query("INSERT INTO products (`item`, `description`, `price`, `storage`) VALUES ('$item','$description','$price','$storage')") or die($conn->error);

       $_SESSION['message'] = "Record has been saved!!";
       $_SESSION['msg_type'] = "success";

       header("location: form.php");
}
//Delete
if(isset($_GET['delete'])){
       $id = $_GET['delete'];
       $conn->query("DELETE FROM products WHERE id=$id");

       $_SESSION['message'] = "Record has been deleted!!!";
       $_SESSION['msg_type'] ="danger";

       header("location: form.php");
}
//Edit
if(isset($_GET['edit'])){
       $id = $_GET['edit'];
       $update = true;
       $result= $conn->query("SELECT * FROM products WHERE id=$id");
       $row = $result->fetch_array();
       $item = $row['item'];
       $price =$row['price'];
       $storage =$row['storage'];
       $description =$row['description'];
}
//Update
if(isset($_POST['update'])){
       $id = $_POST['id'];
       $item = $_POST['item'];
       $price =$_POST['price'];
       $storage =$_POST['storage'];
       $description =$_POST['description'];

    $conn->query("UPDATE products SET item='$item', price='$price', storage='$storage', description='$description' WHERE id=$id");

       $_SESSION['message'] = "Record has been Updated!!!";
       $_SESSION['msg_type'] ="Warning";

       header("location: form.php");
}
//Sign-up
if(isset($_POST['sign-up'])){
       $username=$_POST["username"];
       $email=$_POST["email"];
       $password=$_POST["password"];

$conn->query("INSERT INTO users (`username`, `email`, `password`) VALUES ('$username','$email','$password')") or die($conn->error);

       $_SESSION['message'] = "Record has been saved!!";
       $_SESSION['msg_type'] = "success";

       header("location: form.php");
}
?>