<?php
  include 'header.php';
  require "config.php";
  $db        = new mysqli($host, $dbusername, $dbpassword, $database);
  $db->set_charset("utf8");
  if(isset($_POST["en-teacher"])) $tacher_code = $_POST["en-teacher"]; else $tacher_code = "";
  if(isset($_POST["en-date"])) $date = $_POST["en-date"]; else $date = "";
  if(isset($_POST["lesson"])) $lesson_code = $_POST["lesson"]; else $lesson_code = "";
  $fetch_teacher_name = mysqli_fetch_assoc($db->query("SELECT * FROM teachers WHERE teacher_code = '$tacher_code'"));
  $teacher_name = $fetch_teacher_name["fname"]." ".$fetch_teacher_name["lname"];
  $fetch_lesson_name = mysqli_fetch_assoc($db->query("SELECT * FROM lessons WHERE teacher_code = '$tacher_code' AND lesson_code = '$lesson_code'"));
  $lesson_name = $fetch_lesson_name["lesson_name"];
?>
			<div class="row">
				<div class="col-lg-12">
					<p style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on"onselectstart="return false;" onmousedown="return false;">متن پیام:</p>
            <input class="form-control" type="text" id="Input" value="<?php echo "کلاس درس"." ".$lesson_name." استاد".$teacher_name." در تاریخ ".$date." برگزار نمی شود.";?>" readonly>
          </br>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
          <button class="btn btn-success btn-sm btn-block" onclick="copy()">کپی متن</button>
          <script>
            function copy(){
              var copyText = document.getElementById("Input");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy");
              alert("متن موردنظر کپی گردید!");
            }
          </script>
      </div>
				<div class="col-lg-6">
          <form method="post" action="level-two.php">
            <input type="hidden" name="teacher" value="<?php if(isset($_POST["en-teacher"])) echo $_POST["en-teacher"] ?>">
            <input type="hidden" name="date" value="<?php if(isset($_POST["en-date"])) echo $_POST["en-date"] ?>">
            <input type="hidden" name="en-lesson" value="<?php if(isset($_POST["lesson"])) echo $_POST["lesson"] ?>">
            <button type="submit" class="btn btn-secondary btn-sm btn-block">مرحله قبل</button>
        </form>
				</div>
			</div>
      <div class="row">
        <div class="col-lg-12 mt-4">
          <a href="level-one.php" class="btn btn-danger btn-sm btn-block"> ساخت مجدد متن پیامک </a>
        </div>
      </div>
<?php
  include 'footer.php';
?>
