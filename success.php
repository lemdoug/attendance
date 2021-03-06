<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    
    

    if(isset($_POST['submit'])){
        //extracts values from the $_POST array 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $orig_file = $_FILES["pic"]["tmp_name"];
        $target_dir = 'uploads/';
        $ext = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);
      
        //call funstion to insert and tracks if it was successful or not
        $isSuccess = $crud->insertAttendees($firstname,$lastname,$dob,$email,$contact,$specialty,$destination);
        $specialtyName = $crud->getSpecialtybyID($specialty);

        if($isSuccess){
            SendEmail::SendMail($email,'Welcome to IT Conference 2021','You have been successfully registered for this year\'s IT Conference');
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>


    <!--    
    <div class="card-header text-success text-center">
       <h2>You have been registered! </h2> 
    </div> 
    -->

    <!-- This prints out variables that were passed using the get method -->
    <!-- <div class="card-body text-left">
        <h3 class="card-title text-center" >Registration details</h3>
       
        <h4 class="card-text"> <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?> </h4>
        <h5 class="card-text"> <?php //echo $_GET['specialty'] ?> </h5>
        <br/>
        <h6 class="card-text"> <?php //echo 'Contact details: ' . $_GET['email']. ' || ' . $_GET['phone']; ?> </h6>
        <h6 class="card-text"> <?php //echo 'Date of birth: ' . $_GET['dob']; ?> </h6>
        
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
    <div class="card-footer text-muted">
    </div> -->
    
    <div class="card-body text-left mb-5">
        <h3 class="card-title text-center" >Registration details</h3>
       
        <img class="img-fluid rounded-circle" style ="width:10%; height:10%"src="<?php echo $destination?>"/>
        
        <h4 class="card-text"> <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?> </h4>
        <h5 class="card-text"> <?php echo $specialtyName['name']; ?> </h5>
        <br/>
        <h6 class="card-text"> <?php echo 'Contact details: ' . $_POST['email']. ' || ' . $_POST['phone']; ?> </h6>
        <h6 class="card-text"> <?php echo 'Date of birth: ' . $_POST['dob']; ?> </h6>
        
        <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    <div class="card-footer text-muted">
</div>



<?php require_once 'includes/footer.php'; ?>   