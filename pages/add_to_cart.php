<?php

session_start();

if (!isset($_SESSION["user_id"])) {
  header("Location: main.php");
  exit;
}

require_once "../database/connect.php";

$pizza_id = 0;
if (isset($_POST["pizza_id"])) {
  $pizza_id = intval($_POST["pizza_id"]);
}

if ($pizza_id <= 0) {
  header("Location: main.php");
  exit;
}

$quantity = 1;
if (isset($_POST["quantity"])) {
  $quantity = intval($_POST["quantity"]);
}


if ($quantity <= 0) {
  header("Location: main.php");
  exit;
}


$sql = "SELECT id FROM cart WHERE user_id = " . $_SESSION["user_id"] . " AND pizza_id = " . $pizza_id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Cart already exists, update the quantity
  $cart_id = mysqli_fetch_assoc($result)["id"];
  $sql = "UPDATE cart SET quantity = quantity + " . $quantity . " WHERE id = " . $cart_id;
} else {
  // Cart does not exist, create a new one
  $user_id = $_SESSION["user_id"];
  $sql = "INSERT INTO cart (pizza_id, quantity, user_id) VALUES (" . $pizza_id . ", " . $quantity . ", " . $user_id . ")";
}


mysqli_query($conn, $sql);


mysqli_close($conn);


header("Location: main.php");
exit;

?>