<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    $results = $crud->getSpecialty();

?>

<!--
    First Name
    Last name
    Date of Birth (Use Datepicker)
    Specialty (Database admin, Software dev, Web Admin, Other)
    Email Address
    Contact number
-->

    <h1 class="text-center">Registration for IT Conference </h1>

<form method ="post" action="success.php" enctype="multipart/form-data" class="mb-5">
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text"  class="form-control" id="firstname" name="firstname"/>
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname"/>
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob"/>
    </div>

    <div class="mb-3">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select required class="form-select" name="specialty" aria-label="Default select example">
            
           <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value ='<?php echo $r['specialty_id'];?>'><?php echo $r ['name']; ?></option>
            <?php }?>
        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Contact number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <div class="input-group mb-3">
        <input type="file" accept="image/*" class="form-control" name="pic">
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </div>

</form>


<?php require_once 'includes/footer.php'; ?>   
