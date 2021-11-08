<?php 
    
    require_once 'db/conn.php';
    

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $result = $crud->editAttendee($id, $firstname, $lastname, $dob, $email, $contact, $specialty);

        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
            header("Location viewrecords.php");
        }
    }else{
        include 'includes/errormessage.php';
        header("Location viewrecords.php");
    }
?>