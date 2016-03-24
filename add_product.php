<?php
  session_start();

  $content = $_POST;

  $id = uniqid();

  array_push($_SESSION['winkelmand'], [
    'id'      => $id,
    'product' => $_POST['product'],
    'image'   => $_POST['image'],
    'prijs'   => $_POST['prijs']
  ]);

  header("Location: {$_SERVER['HTTP_REFERER']}");
?>
