<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Nova página: <?php echo $slug ?></title>
</head>
<body>
  <header>
      <h1>A página <em><?php echo $slug ?></em> ainda não foi escrita</h1>
  </header>

  <?php include 'menu.php' ?>

  <form method="post" action="/edit/<?php echo $slug; ?>">
  
    <label>
        <span>Título</span>
        <input type="text" name="title" value="<?php echo $slug; ?>" />
    </label>

    <label>
        <span>slug</span>
        <input type="text" class="text" value="<?php echo $slug; ?>" name="slug" disabled="disabled" />
    </label>

    <label>
        <span>Conteúdo</span>
        <textarea name="content"></textarea>
    </label>

    <p class="submit">
        <input type="submit" class="submit" value="Salvar" />
    </p>

  </form>

</body>
</html>