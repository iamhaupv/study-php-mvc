<button  type="submit" onclick="window.location.href='<?= BASE_URL ?>/teachers'">Back</button>
<form method="post" action="<?= BASE_URL?>/teacher/edit/<?= $teacher['id'] ?>">
    <input type="text" name="first_name" value="<?= $teacher['first_name'] ?>"/>
    <input type="text" name="last_name" value="<?= $teacher['last_name'] ?>"/>
    <button type="submit" >Save</button>
    <?php if (!empty($error)):?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
</form>
