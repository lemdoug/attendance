<?php 
    $title = 'Edit';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 

    $results = $crud->getSpecialty();

    if(!isset($_GET['id']))
    {
        //echo 'Error';
        include 'includes/errormessage.php';
        header("Location viewrecords.php");
    }else
    {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id); 
    
    

?>

<h1 class="text-center">Update Registration Details</h1>

<form method ="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />

    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstname" name="firstname"/>
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastname" name="lastname"/>
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dob" name="dob"/>
    </div>

    <div class="mb-3">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select class="form-select" name="specialty" aria-label="Default select example">
            
           <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value ='<?php echo $r['specialty_id'];?>' <?php if ($r['specialty_id'] == 
                    $attendee['specialty_id']) echo 'selected' ?>>
                    <?php echo $r ['name']; ?>
                </option>
            <?php }?>
        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Contact number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" id="phone" name="phone" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <a class="btn btn-warning" type="submit" name="submit">Save Changes</button>
    <a href="viewrecords.php" class="btn btn-primary">Back to List</a>
    

</form>

<?php }?>

<?php require_once 'includes/footer.php'; ?>   
