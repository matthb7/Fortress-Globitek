<?php
require_once('../../../private/initialize.php');
require_login();

$key = '';
$secret_value = '';

if(is_post_request()) {
  if(isset($_POST['key'])) { $key = $_POST['key']; }

  $secrets_result = find_secrets_by_key($key);
  $secret = db_fetch_assoc($secrets_result);
  if($secret) {
    $secret_value = $secret['secret'];
  }
}

?>

<?php $page_title = 'Staff: Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">

  <h1>Secret Info</h1>

  <form action="index.php" method="post">
    Please Enter Secret Key to View Secret:<br />
    <input type="text" name="key" value="" /><br />
     <input type="submit" name="submit" value="Submit"  />
  </form>

  <?php echo $secret_value ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
