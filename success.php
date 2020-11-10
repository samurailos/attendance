<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        
        $target_dir = 'uploads/';
        $file = $target_dir . basename($_FILES["avatar"]["name"]);
        
        
        //Call the function to insert and track if successful or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty); 
        $specialtyName = $crud->getSpecialtyById($specialty);


    if($isSuccess){
      SendEmail::SendMail($email, 'Welcome to IT Conference 2020', 
      'You have been successfully registered for this year\'s I.T Conference');
      include 'includes/successmessage.php';
    }
    else{

      include 'includes/errormessage.php';
    }
  }


?>

<!-- Original code that prints out valuues that were passed to the aciton page using method ="get"-->
<!--<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name:<?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?></h5>
    
    <h6 class="card-subtitle mb-2 text-muted">Expertise:<?php //echo $_GET['speciality']; ?></h6>
    
    <p class="card-text">Date of Birth: <?php //echo $_GET['dob']; ?></p>
    
    <p class="card-text">Email:<?php //echo $_GET['email']; ?></p>
    
    <p class="card-text">Phone No.<?php //echo $_GET['phone']; ?></p>
  </div>
</div> -->

 
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name:<?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
    
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name']; ?></h6>
    
    <p class="card-text">Date of Birth: <?php echo $_POST['dob']; ?></p>
    
    <p class="card-text">Email:<?php echo $_POST['email']; ?></p>
    
    <p class="card-text">Phone No.<?php echo $_POST['phone']; ?></p>
  </div>
</div>  


<?php require_once 'includes/footer.php'; ?>