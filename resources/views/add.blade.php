<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href=""></a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="store" method="POST">
            @csrf
            <input type="text" name="title" placeholder="title">
            <input type="text" name="description" placeholder="description">
            <input type="number" name="priority" placeholder="priority">
            <input type="hidden" name="user_id" value="1">
            <input type="submit" value="Add">
        </form>
    </div>
</body>
</html>
