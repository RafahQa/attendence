<?php
    $title = 'View Details';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get Details By ID
    if (!isset($_GET['id']))
    {
         //print error
         include 'includes/errormessage.php';
    }
    else {
        $id = $_GET['id'];
        $result=$crud->getAttendeeDetails($id);
?>

        <div class="card" style="width: 25rem;">
        <img class="card-img-top rounded" src="<?php echo empty($result['avatarpath']) ? "uploads/blank.png" : $result['avatarpath'];?>">
        <div class="card-body">
            <h5 class="card-title">
                 <?php echo $result['firstname']." ".$result['lastname'];?> 
            </h5>
        </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <?php echo "Date of Birth: ".$result['dateofbirth'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Area Of Expertise: ".$result['name'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Email: ".$result['emailaddress'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Contact Number: ".$result['contactnumber'] ;?>
            </li>
        </ul>
        </div>
    </div>
    </br>
    <a class="btn btn-info" href="viewrecords.php">Back to list</a>
    <a class="btn btn-warning"  href="edit.php?id=<?php echo $result['attendee_id'] ?>">Edit</a>
    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');"  href="delete.php?id=<?php echo $result['attendee_id'] ?>">Delete</a>
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>