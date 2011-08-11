<?php
$title = 'A página <em>'.$slug.'</em> ainda não foi escrita';
include 'header.php';
?>

  <form method="post" action="<?php echo BASEURL ?>edit/<?php echo $slug; ?>">
  
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

<?php include 'footer.php' ?>
