<button type="submit" class="btn" onclick="window.location.href='<?= BASE_URL ?>/user/add'">Add new User</button>
<table>
    <tr>
        <td>ID</td>
        <td>User Name</td>
        <td>Pass Word</td>
        <td>Action</td>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['user_name'] ?></td>
            <td><?= $user['pass_word'] ?></td>
            <td>
                <a href="<?= BASE_URL?>/user/delete/<?= $user['id']?>">Delete</a>
                <a href="<?= BASE_URL?>/user/<?= $user['id']?>">Edit</a>
            </td>
        </tr>
    <?php endforeach ;?>
</table>