<?php 
    $title = 'View Record';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 


    //Get attendee by id

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';

    }else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);


?>

    <div class="card-body text-left">
            <h3 class="card-title text-center" >Attendee details</h3>
        
            <h4 class="card-text"> <?php echo $result['firstname'] . ' ' . $result['lastname']; ?> </h4>
            <h5 class="card-text"> <?php echo $result['name'] ?> </h5>
            <br/>
            <h6 class="card-text"> <?php echo 'Contact details: ' . $result['emailaddress']. ' || ' . $result['contactnumber']; ?> </h6>
            <h6 class="card-text"> <?php echo 'Date of birth: ' . $result['dateofbirth']; ?> </h6>
            
            <br/>
            <a href="viewrecords.php" class="btn btn-primary">Back</a>
            <a href = 'edit.php?id=<?php echo $result['attendee_id']?>' class= "btn btn-secondary" >Edit</a>
            <a href = 'deletecheck.php?id=<?php echo $result['attendee_id']?>' class= "btn btn-danger" >Delete</a>
        </div>
        
        <div class="card-footer text-muted">
    </div>
    
    <?php } ?>

<br/>
<br/>
<br/>
<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>   