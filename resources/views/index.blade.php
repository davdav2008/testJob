<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-hover">
    <thead>
    <tr>
        <th>
            <a href="{{route('cars',['sort'=>'id'])}}">
                <div> ID</div>
            </a>
        </th>
        <th>
            {{--            <a href="{{route('car.sort_by_brand')}}">--}}
            <a href="{{route('cars')}}">
                <div> Марка</div>
            </a>
        </th>
        <th>
            {{--<a href="{{route('car.sort_by_model')}}">--}}
            <a href="{{route('cars')}}">
                <div> Модель</div>
            </a>
        </th>
        <th>
            {{--            <a href="{{route('car.sort_by_cat')}}">--}}
            <a href="{{route('cars')}}">
                <div> Категория</div>
            </a>
        </th>
        <th>
            {{--            <a href="{{route('car.sort_by_price')}}">--}}
            <a href="{{route('cars')}}">
                <div> Цена</div>
            </a>
        </th>
    </tr>
    </thead>
    <tbody>

    @foreach($cars as $car)
        <tr>
            <td>
                {{$car->id}}
            </td>
            <td>
                {{$car->brand->name}}
            </td>
            <td>
                {{$car->model->name}}
            </td>
            <td>
                @if($car->category_id==1)
                    До 1990 года выпуска
                @elseif($car->category_id==2)
                    От 1990 до 2000 года выпуска
                @elseif($car->category_id==3)
                    От 2000 до 2010 года выпуска
                @elseif($car->category_id==4)
                    После 2010 года выпуска
                @endif
            </td>
            <td>
                {{$car->price}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="/create" class="btn btn-default">Добавить новую машину</a>

<form action="{{route('car.filter')}}">
    <div class="form-group">
        <label for="start">Фильтровать от</label>
        <input name="start" id="start" class="form-control" style="width: 15%">
    </div>
    <div class="form-group">
        <label for="end">Фильтровать до</label>
        <input name="end" id="end" class="form-control" style="width: 15%">
    </div>
    <button type="submit" class="btn btn-default">Фильтровать</button>
</form>
</body>
</html>
