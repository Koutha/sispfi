<?php //frontController
if (!empty($_POST['submit'])) {
    $action = $_POST['submit'];
} else if (!empty($_GET['do'])) {
    $action = $_GET['do'];
} else {
    $action = "index";
}
htmlspecialchars($action,ENT_QUOTES);
$action = strval(str_replace("\0", "", $action));
if (is_file("controller/".$action."Controller.php")) {
    require_once("controller/".$action."Controller.php");
} else {
    require_once("controller/404Controller.php");
}
?>
