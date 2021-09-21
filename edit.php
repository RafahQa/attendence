<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    if(!isset($_GET['id']))
    {
        //print error
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
?>

    <h1 class ="text-center">Edit Record</h1>

    
    <form method="post" action="editpost.php">

        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>"/>
        <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $attendee['firstname']?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname']?>">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date Of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofbirth']?>">
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Area Of Expertise</label>
                <input class="form-control" list="datalistOptions" id="specialty" name= "specialty" value="<?php echo $attendee['specialty_id']?>" >
                <datalist id="datalistOptions" >
                    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $r['specialty_id'] ?>">
                                <?php echo $r['name'] ?>
                        </option>
                     <?php }?>
                </datalist>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $attendee['emailaddress']?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $attendee['contactnumber']?>">
                <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
                <a class="btn btn-dark" href="viewrecords.php">Back to list</a>
            </div>
        
    </form>
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>