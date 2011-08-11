<?php
$title = 'Editando <em>'.$page->title.'</em>';
include 'header.php';
?>

  <form method="post" action="<?php echo BASEURL; ?>edit/<?php echo $slug; ?>">
  
    <label>
        <span>Título</span>
        <input type="text" name="title" value="<?php echo $page->title; ?>" />
    </label>

    <label>
        <span>slug</span>
        <input type="text" class="text" value="<?php echo $slug; ?>" name="slug" readonly="readonly" />
    </label>

    <label>
        <span>Conteúdo</span>
        <textarea name="content"><?php echo $page->content; ?></textarea>
    </label>

    <p class="submit">
        <input type="submit" class="submit" value="Salvar" />
    </p>

  </form>

<?php include 'footer.php' ?>
