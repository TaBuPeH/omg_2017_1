@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <ul>
                        <li><a href="{{ url('/admin/allDonations') }}">Виж всички дарения</a></li>
                        <li><a href="{{ url('/admin/donatForThisMonth') }}">Виж дарения за един месец назад</a></li>
                        <li><a href="{{ url('/admin/registerNew') }}">Добави нов администратор</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
