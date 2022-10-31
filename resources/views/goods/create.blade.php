<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('goods.store')}}" method="POST">
            @csrf
            <label class="form-label">name</label>
            <input type="text" name="name" class="form-control" required>
            <label class="form-label">description</label>
            <textarea cols="30" rows="5" name="description" class="form-control" required></textarea>
            <label class="form-label">category</label>
            <input type="number" name="category_id" class="form-control" required>
            <label class="form-label">price</label>
            <input type="number" name="price" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary mt-3">Add good</button>
        </form>
    </div>
</body>
</html>
