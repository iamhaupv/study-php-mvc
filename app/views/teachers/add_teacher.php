<button class="btn text-color" type="submit" onclick="window.location.href='<?= BASE_URL ?>/teachers'">Back</button>
<form method="post" action="<?= BASE_URL; ?>/teacher/add">
    <input type="text" name="first_name" placeholder="First Name" />
    <input type="text" name="last_name"  placeholder="Last Name"/>
    <button class="btn text-color" type="submit">Add</button>
</form>