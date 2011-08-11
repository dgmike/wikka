<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo strip_tags($title); ?></title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>static/style.css" />

    <link type="text/css" rel="stylesheet" href="<?php echo BASEURL; ?>static/syntax_highlighter.css"></link>

</head>
<body>
  <header>
      <h1><?php echo $title; ?><?php if (isset($afterTitle)) echo $afterTitle ?></h1>
  </header>

  <?php include 'menu.php' ?>

  <div class="conteudo">
