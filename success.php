<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    
    

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $isSuccess = $crud->insertAttendees($firstname,$lastname,$dob,$email,$contact,$specialty);
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
    
    <div class="card-body text-left">
        <h3 class="card-title text-center" >Registration details</h3>
       
        <h4 class="card-text"> <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?> </h4>
        <h5 class="card-text"> <?php echo $specialtyName['name']; ?> </h5>
        <br/>
        <h6 class="card-text"> <?php echo 'Contact details: ' . $_POST['email']. ' || ' . $_POST['phone']; ?> </h6>
        <h6 class="card-text"> <?php echo 'Date of birth: ' . $_POST['dob']; ?> </h6>
        
        <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    <div class="card-footer text-muted">
</div>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>   