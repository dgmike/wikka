<?php
$title = $page->title;
$afterTitle = '
    <a href="'.BASEURL.'edit/'.$page->slug.'">editar</a>
    <a href="'.BASEURL.'remove/'.$page->slug.'">remover</a>
';
include 'header.php';
?>

    <article>

        <h1 class="title"><?php echo $page->title ?></h1>

        <?php echo $page->content ?>


    </article>

<?php include 'footer.php' ?>
