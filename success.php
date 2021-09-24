<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';
    


    if(isset($_POST['submit']))
    {
        //set params from the $_POST
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //save the choosen file
        $origin_File = $_FILES["avatar"]["tmp_name"];
        $extention = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $targer_Dir = 'uploads/';
        $destination = $targer_Dir.$contact.".".$extention;
        move_uploaded_file($origin_File,$destination);
        
        //call insert function
        $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty,$destination);
        
        if($isSuccess)
        {
            $sendEmail = new SendEmail();
            $sendEmail->sendMail($email,'Welcome to IT conference','You have been successfully registerted for IT conference');
            //print success
            include 'includes/successmessage.php';
        }
        else
        {
            //print error
            include 'includes/errormessage.php';
        }
    }
?>
    
    
    <br>
    <!-- print out values using get -->
    <!-- <div class="card" style="width: 25rem;">
        <div class="card-body">
        <h5 class="card-title">
             <?php// echo $_GET['firstname']." ".$_GET['lastname'];?> 
        </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <?php //echo "Date of Birth: ".$_GET['dob'] ;?>
            </li>
            <li class="list-group-item">
                <?php //echo "Area Of Expertise: ".$_GET['specialty'] ;?>
            </li>
            <li class="list-group-item">
                <?php //echo "Email: ".$_GET['email'] ;?>
            </li>
            <li class="list-group-item">
                <?php //echo "Contact Number: ".$_GET['phone'] ;?>
            </li>
        </ul>
    </div> -->


    <!-- print out values using post -->
    <div class="card" style="width: 25rem;">
        <img src="<?php echo $destination;?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">
                 <?php echo $_POST['firstname']." ".$_POST['lastname'];?> 
            </h5>
        </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <?php echo "Date of Birth: ".$_POST['dob'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Area Of Expertise: ".$_POST['specialty'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Email: ".$_POST['email'] ;?>
            </li>
            <li class="list-group-item">
                <?php echo "Contact Number: ".$_POST['phone'] ;?>
            </li>
        </ul>
        </div>
    </div>
<?php
    require_once 'includes/footer.php';
?>