<h1>Manage student</h1>
<table style="border:1px solid black;">
    <tr style="padding: 8px">
        <td >ID</td>
        <td>Name</td>
        <td>Score A</td>
        <td>Score B</td>
        <td>Score C</td>
        <td>Action</td>
    </tr>
    <?php foreach ($students_a as $student): ?>
        <tr>
            <td><?= $student['id']?></td>
            <td><?= $student['name']?></td>
            <td><?= $student['score_a']?></td>
            <td><?= $student['score_b']?></td>
            <td><?= $student['score_c']?></td>
            <td>
                <a href="">Delete</a>
                <a href="">Edit</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>