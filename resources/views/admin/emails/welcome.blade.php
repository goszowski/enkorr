@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.articleStart')

        <h4 class="secondary"><strong>Вітаємо!</strong></h4>
        <p>Для Вас щойно було створено аккаунт в адмін панелі на сайті http://runsite.com.ua/panel-admin</p>
        <p>
          Логін: goszowski@gmail.com<br>
          Пароль: as7sss
        </p>

    @include('beautymail::templates.widgets.articleEnd')

@stop
