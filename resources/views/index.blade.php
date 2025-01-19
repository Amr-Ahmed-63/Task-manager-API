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
        <a href="add" class="btn btn-dark">Add Task</a>
        {{-- <a href="tasks" class="btn btn-dark">Show Tasks</a> --}}
        {{-- <a href="edit/5" class="btn btn-dark">Update Task</a> --}}
        <form action="show.9" method="post">
            @csrf
         @method("PUT")
         <input type="submit" value="Show Task">
        </form>

    </div>
<a href="pro">Go to profile</a>

    @if (isset($tasks_string))
    <table>
        <thead>
            <tr>
               <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $tasks = json_decode($tasks_string);
    ?>
    @foreach ($tasks as $key=>$val)


            <tr>
                <td>{{++$key}}</td>
                <td>{{$val->title}}</td>
                <td>{{$val->description}}</td>
                <td>{{$val->priority}}</td>
                <td>
                    <form action="edit.{{$val->id}}" method="post">
                        @csrf
                     @method("PUT")
                     <input type="submit" value="Update Task">
                    </form>
                    <form action="destroy.{{$val->id}}" method="post">
                        @csrf
                     @method("DELETE")
                     <input type="submit" value="Delete Task">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
    @endif
</body>
</html>
