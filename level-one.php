<?php
  include 'header.php';
  require "config.php";
  if(isset($_POST["en-teacher"])) $en_teacher = $_POST["en-teacher"]; else {$en_teacher = "";}
  if(isset($_POST["en-date"])) $en_date = $_POST["en-date"]; else {$en_date = "";}
  $db        = new mysqli($host, $dbusername, $dbpassword, $database);
  $db->set_charset("utf8");
  $fetch_teachers        = $db->query("SELECT * FROM teachers");
  $teachers     = "";
  while ($teachers_row = mysqli_fetch_array($fetch_teachers))
  {
    if($en_teacher == $teachers_row[1])
      $selected = "selected";
    else
      $selected = "";
    $teachers = $teachers . "<option value=$teachers_row[1] $selected>$teachers_row[2] $teachers_row[3]</option>";
  }

?>
  <form method="post" action="level-two.php">

  <div class="form-group">
    <label for="date">تاریخ:</label>
    <span class="required" >*</span>
    <input name="date" type="text" id="date" class="form-control" value="<?php if(isset($en_date)) echo $en_date ?>" required>

      <label for="teacher-name">نام استاد:</label>
      <span class="required" >*</span>
      <select name="teacher" class="form-control select" required>
        <option selected disabled>نام استاد را انتخاب نمایید.</option>
        <?php echo $teachers ?>
      </select>
  </div>
  <div class="row">
    <div class="col-lg-6">
    <button type="submit" class="btn btn-primary btn-sm btn-block">مرحله بعد</a>
  </div>
  </div>
</form>
<?php
  include 'footer.php';
?>
