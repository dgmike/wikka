<?php include dirname(__FILE__) . '/../header.php'; ?>

<h1>Editar o menu</h1>

<form action="" method="post">
    <textarea name="menu"><?php echo htmlentities($menu) ?></textarea>
    <p class="submit"><button type="submit" class="button submit">Salvar</button></p>
</form>

<?php include dirname(__FILE__) . '/../footer.php'; ?>
