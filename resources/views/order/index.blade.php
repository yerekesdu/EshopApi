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

      @foreach($carts as $cart)
            <div style="display:flex">
                <div class="ms-5">{{$cart->id}}</div>
                <div class="ms-5">{{$cart->session_id}}</div>
                <div class="ms-5">{{$cart->good_id}}</div>
                <div class="ms-5">{{$cart->price}}</div>
                <div class="ms-5">{{$cart->quantity }}</div>
                <div class="ms-5">
                    <form action="{{route('goods.destroy', $cart->id)}}" method="POST" onsubmit="return beforeDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </div>
                <div class="ms-5">
                    <form action="{{route('carts.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="good_id" value="{{$cart->good_id}}">
                        <button type="submit" class="btn btn-primary">INCREASE</button>
                    </form>

                    <form action="{{route('carts.decrease', $cart->good_id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="good_id" value="{{$cart->good_id}}">
                        <button type="submit" class="btn btn-primary">DECREASE</button>
                    </form>

                </div>
            </div>
        @endforeach
        <a href="{{route('goods.create')}}" class="btn btn-primary">Create good</a>
    </div>
    <script>
        function beforeDelete(){
            return confirm('Confirm delete of good?');
        }
    </script>
</body>
</html>
