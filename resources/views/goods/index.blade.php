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

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif

      @foreach($goods as $good)
            <div style="display:flex">
                <div class="ms-5">{{$good->id}}</div>
                <div class="ms-5">{{$good->name}}</div>
                <div class="ms-5">{{$good->description}}</div>
                <div class="ms-5">{{$good->slug}}</div>
                <div class="ms-5">{{$good->category_id}}</div>
                <div class="ms-5">{{$good->price}}</div>
                <div class="ms-5"><a href="{{route('goods.show', $good->id)}}" class="btn btn-secondary">Details</a></div>
                <div class="ms-5"><a href="{{route('goods.edit', $good->id)}}" class="btn btn-primary">Edit</a></div>
                <div class="ms-5">
                    <form action="{{route('goods.destroy', $good->id)}}" method="POST" onsubmit="return beforeDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>
                <div class="ms-5">
                    <form action="{{route('carts.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="good_id" value="{{$good->id}}">
                        <button type="submit" class="btn btn-primary">ADD TO CART</button>
                    </form>
                </div>
            </div>
        @endforeach
        <a href="{{route('goods.create')}}" class="btn btn-primary">Create good</a>
        <a href="{{route('carts.index')}}" class="btn btn-secondary">Go to CART</a>
    </div>
    <script>
        function beforeDelete(){
            return confirm('Confirm delete of good?');
        }
    </script>
</body>
</html>
