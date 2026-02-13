<?php 
error_reporting(0);
include ('includes/header.php');

$table_name = 'update_apk';

$db->exec("CREATE TABLE IF NOT EXISTS {$table_name}(id INTEGER PRIMARY KEY,version TEXT ,apk TEXT,package TEXT)");

$rows = $db->query("SELECT COUNT(*) as count FROM {$table_name}");
$row = $rows->fetchArray();
$numRows = $row['count'];
if ($numRows == 0){
	$db->exec("INSERT INTO {$table_name}(version,apk,package) VALUES('','','')");
}

$res = $db->query("SELECT * FROM {$table_name} WHERE id='1'");
$rowU=$res->fetchArray();

if(isset($_POST['submit'])){
	$db->exec("UPDATE {$table_name} SET	version='{$_POST['version']}', apk='{$_POST['apk']}', package='{$_POST['package']}' WHERE id='1' ");
	header("Location: update.php");
}

?>
<div class="container text-center text-dark mt-5">
  <div class="row">
    <div class="col-lg-4 d-block mx-auto mt-5">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-md-12">
          <div class="card">
            <div class="card-body wow-bg" id="formBg">
              <h3 class="colorboard">Push Update</h3>
              <form  method="post">
                <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg" placeholder="Version Number" name="version" value="<?=$rowU['version'] ?>" > </div>
                <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg" placeholder="Package name" name="package" value="<?=$rowU['package'] ?>" > </div>
                <div class="input-group mb-4"> <input type="text" class="form-control textbox-dg" placeholder="APK URL" name="apk" value="<?=$rowU['apk'] ?>" > </div>
                <div class="row">
                  <div class="col-12"> <button type="submit" name="submit" class="btn btn-primary btn-block logn-btn">Submit</button> </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include ('includes/footer.php');?>