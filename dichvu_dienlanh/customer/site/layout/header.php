<?php
$message = "";
if (!empty($_SESSION["success"])) {
    $message = $_SESSION["success"];
    $messageClass = "alert-success";
    // xóa phần tử dựa vào key
    unset($_SESSION["success"]);
} else if (!empty($_SESSION["error"])) {
    $message = $_SESSION["error"];
    $messageClass = "alert-danger";
    // xóa phần tử dựa vào key
    unset($_SESSION["error"]);
}

?>
<?php if ($message) { ?>
<div class="alert <?= $messageClass ?> mt-4">
    <?= $message ?>
</div>
<?php } ?>