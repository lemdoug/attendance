<?php 
    $title = 'View Attendees';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    $results = $crud->getAttendees();

?>

    <table class="table table-dark table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <!-- <th scope="col">Date of Birth</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th> -->
            <th scope="col">Specialty</th>
            <th scope="col">Actions</th>
        </tr>
        
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['attendee_id']?></td>
                <td><?php echo $r['firstname']?></td>
                <td><?php echo $r['lastname']?></td>
                <!-- <td><?php //echo $r['dateofbirth']?></td>
                <td><?php //echo $r['emailaddress']?></td>
                <td><?php //echo $r['contactnumber']?></td> -->
                <td><?php echo $r['name']?></td>
                <td>
                    <a href = 'view.php?id=<?php echo $r['attendee_id']?>' class= "btn btn-info" >View</a>
                    <a href = 'edit.php?id=<?php echo $r['attendee_id']?>' class= "btn btn-secondary" >Edit</a>
                    <a href = 'deletecheck.php?id=<?php echo $r['attendee_id']?>' class= "btn btn-danger" >Delete</a>
                </td>
            </tr>
        <?php }?>
    </table>

<br/>
<br/>
<br/>
<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>   
