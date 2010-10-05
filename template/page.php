<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $page->title ?> - Wiki</title>
</head>
<body>
    
    <header>
        <h1>
            <?php echo $page->title ?>
            <a href="<?php echo BASEURL ?>edit/<?php echo $page->slug; ?>">editar</a>
            <a href="<?php echo BASEURL ?>remove/<?php echo $page->slug; ?>">remover</a>
        </h1>
    </header>

    <?php include 'menu.php' ?>

    <article>
        <?php echo $page->content ?>
    </article>

    <footer>
        <p><a href="http://textile.thresholdstate.com/">marcação</a></p>
    </footer>

</body>
</html>
