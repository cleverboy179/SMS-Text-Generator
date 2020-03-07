<?php
  include 'header.php';
  require "config.php";
  $db        = new mysqli($host, $dbusername, $dbpassword, $database);
  $db->set_charset("utf8");
  if(isset($_POST['en-lesson'])) $en_lesson = $_POST['en-lesson']; else $en_lesson = "";
  if(isset($_POST['teacher'])) $teacher_code = $_POST['teacher']; else $teacher_code = "";
  $fetch_lessons        = $db->query("SELECT * FROM lessons WHERE teacher_code = '$teacher_code'");
  $lessons     = "";
  $selected = "";
  while ($lessons_row = mysqli_fetch_array($fetch_lessons))
  {
    if($en_lesson == $lessons_row[1])
      $selected = "selected";
    $lessons = $lessons . "<option value=$lessons_row[1] $selected>$lessons_row[2]</option>";
  }
?>
      <form method="post" action="level-tree.php">
				<div class="form-group">
					<label for="lesson-name">نام درس:</label>
          <span class="required" >*</span>
					<select name="lesson" class="form-control select" required>
						<option selected disabled>نام درس را انتخاب نمایید.</option>
						<?php echo $lessons ?>
					</select>
				</div>

				<div class="row">
					<div class="col-lg-6">
            <input type="hidden" name="en-teacher" value="<?php if(isset($_POST["teacher"])) echo $_POST["teacher"] ?>">
            <input type="hidden" name="en-date" value="<?php if(isset($_POST["date"])) echo $_POST["date"] ?>">
            <button type="submit" class="btn btn-primary btn-sm btn-block">مرحله بعد</button>
					</div>
      </form>


					<div class="col-lg-6">
            <form method="post" action="level-one.php">
            <input type="hidden" name="en-teacher" value="<?php if(isset($_POST["teacher"])) echo $_POST["teacher"] ?>">
            <input type="hidden" name="en-date" value="<?php if(isset($_POST["date"])) echo $_POST["date"] ?>">
            <button type="submit" class="btn btn-secondary btn-sm btn-block">مرحله قبل</button>
			     </form>
           </div>
      </div>
<?php
  include 'footer.php';
?>
