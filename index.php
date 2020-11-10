<?php 
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results =$crud->getSpecialties();

?>

<h1 class="text-center">Registration for IT Conference</h1>

<form method="post" action="success.php">
    
<div class="form-group">
    <label for="firstname">First Name</label>
    <input required type="text" class="form-control" id="firstname" name= "firstname" placeholder="Enter your first name">
</div>

<div class="form-group">
    <label for="lastname">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name= "lastname" placeholder="Enter your last name">
</div>

<div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name= "dob">
</div>

<div class="form-group">
    <label for="specialty">Area of Proficiency</label>
      <select class="form-control" id="specialty" name="specialty">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
        <?php }?>

      </select>
</div>

<div class="form-group">
    <label for="email">Email address</label>
    <input required type="email" class="form-control" id="email" name= "email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
    <label for="email">Contact No.</label>
    <input type="text" class="form-control" id="phone" name= "phone" aria-describedby="phoneHelp" >
    <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
</div>
<br/>
<div class="custom-file">
   
    <input type="file" accept="image/*" class="custom-file-input" id="avatar" name= "avatar">
    <label class="custom-file-label" for="avatar">Choose File</label>
    <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
</div>


<div class="text-center">
    <button type="submit" name= "submit" class="btn btn-primary" class="text-center">Submit</button>
</div>
  
</form>

<?php require_once 'includes/footer.php'; ?>