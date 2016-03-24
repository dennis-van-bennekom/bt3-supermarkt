<?php
  session_start();

  $content = $_POST;

  $id = $content['id'];

  foreach($_SESSION['winkelmand'] as $key => $product) {
    if ($id === $product['id']) {
      unset($_SESSION['winkelmand'][$key]);
    }
  }

  header("Location: {$_SERVER['HTTP_REFERER']}");
?>
