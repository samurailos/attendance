<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results =$crud->getSpecialties();

    if(!isset($_GET['id']))
        {
           include 'includes/errormessage.php';
           header("Location: viewrecords.php");
        }
    else{

        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
       
?>

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
            <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstname" name= "firstname" placeholder="Enter your first name">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastname" name= "lastname" placeholder="Enter your last name">
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dob" name= "dob">
    </div>

    <div class="form-group">
        <label for="specialty">Area of Proficiency</label>
        <select class="form-control" value="<?php echo $attendee['specialty']?>" id="specialty" name="specialty">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'  ?>>
                    <?php echo $r['name']; ?>
                </option>
            <?php }?>

        </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" value="<?php echo $attendee['emailaddress']?>" name= "email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="email">Contact No.</label>
        <input type="text" class="form-control" id="phone" value="<?php echo $attendee['phonenumber']?>" name= "phone" aria-describedby="phoneHelp" >
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <div class="text-center">
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <button type="submit" name= "submit" class="btn btn-success" class="text-center">Save Changes</button>
    </div>
    
    </form>

    <?php } ?>
<?php require_once 'includes/footer.php'; ?>