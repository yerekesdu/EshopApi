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
            <div style="display:flex">
                <div class="ms-5">{{$good->id}}</div>
                <div class="ms-5">{{$good->name}}</div>
                <div class="ms-5">{{$good->description}}</div>
                <div class="ms-5">{{$good->slug}}</div>
                <div class="ms-5">{{$good->category_id}}</div>
                <div class="ms-5">{{$good->price}}</div>
            </div>
        <a href="{{route('goods.index')}}" class="btn btn-primary">Go to index</a>
    </div>
</body>
</html>
