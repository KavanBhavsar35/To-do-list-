<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new task</title>
</head>

<body>
    <div class="container">
        <form action="../backend/newtask.php" method="post">
            <label for="task_title">Title</label>
            <input type="text" name="task_title" id="task_title" placeholder="Title">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="1" placeholder="Description"></textarea>
            <button type="submit">Add Task</button>
        </form>
    </div>
</body>

</html>