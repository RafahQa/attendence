<?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class ="text-center">Regestration for IT Conference</h1>

    
    <form method="post" action="success.php" enctype='multipart/form-data'>
    <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area Of Expertise</label>
            <input required class="form-control" list="datalistOptions" id="specialty" name= "specialty" placeholder="Type to search...">
            <datalist id="datalistOptions" >
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                 <?php }?>
            </datalist>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="phone" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Upload Image (Optional)</label>
            <input type="file" accept="image/*" class="form-control" id="avatar" name="avatar">
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
        
    </form>

<?php
    require_once 'includes/footer.php';
?>