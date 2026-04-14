<button class="btn text-color" type="submit" onclick="window.location.href='teacher/add'" >New Teacher</button>
<table >
    <tr>
        <td>ID</td>
        <td>Fist Name</td>
        <td>Last Name</td>
        <td>Action</td>
    </tr>
    <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td><?= $teacher['id'] ?></td>
            <td><?= $teacher['first_name'] ?></td>
            <td><?= $teacher['last_name'] ?></td>
            <td>
                <a href="teacher/delete/<?=$teacher['id']?>">Delete</a>
                <a href="teacher/<?=$teacher['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>