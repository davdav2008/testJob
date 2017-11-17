<!doctype html>
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
<div class="row">
    <div class="col-md-offset-1">
        <form class="form-horizontal" id="create_car" method="post" action="{{route('car.create')}}">
            <fieldset>

                <!-- Form Name -->
                <legend style="text-align: center">Добавление Новой Машины</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Имя</label>
                    <div class="col-md-4">
                        <input id="name" name="name" type="text" placeholder="Имя" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="year">Год выпуска</label>
                    <div class="col-md-4">
                        <input id="year" name="year" type="text" placeholder="Год выпуска" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="price">Цена</label>
                    <div class="col-md-4">
                        <input id="price" name="price" type="text" placeholder="Цена" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Brand">Марка</label>
                    <div class="col-md-4">

                        <select id="Brand" name="Brand" class="form-control">
                            @foreach(\App\Model\Brand::all() as $brand)
                                <option>{{$brand->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Model">Модель</label>
                    <div class="col-md-4">
                        <select id="Model" name="Model" class="form-control">
                            <option disabled selected name="empty">Выберите модель</option>
                            @foreach(\App\Model\CarModel::all() as $model)
                                <option id="{{ DB::table('brands')->whereId($model->brand_id)->get()->pluck('name')[0]}}">{{$model->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </fieldset>
            {{ csrf_field() }}
            <a href="{{route('cars')}}" class="btn btn-default col-md-offset-3" style="margin-left: 28%;">К списку</a>
            <button type="submit" class="btn btn-default col-md-offset-4" style="    margin-left: 27.7%;">Сохранить</button>
        </form>

    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#Model').find('option[id!="BMW"]').hide();

    });
    $('#create_car').change(function (e) {

        var selected_brand = $('#Brand option:selected').text();
        $('#Model option').hide();
//        $("#Model option[name='empty']").show().prop("selected", "selected");
        $("#Model option[id='" + selected_brand + "']").show();

    })

</script>
</html>
