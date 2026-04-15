<button class="btn" type="submit">Back</button>
<form action="<?= BASE_URL; ?>/user/edit/<?= $user['id']?>" method="post">
    <input type="text" name="user_name" value="<?= $user['user_name'] ?>"/>
    <input type="text" name="pass_word" value="<?= $user['pass_word'] ?>"/>
    <button class="btn text-color" type="submit">Add</button>
</form>
