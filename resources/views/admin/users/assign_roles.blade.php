@extends('admin.layouts.master')

@section('title')
Thêm tài khoản
@endsection

@section('content')

<div class="content container-fluid">
    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'QUẢN LÝ VAI TRÒ CHO TÀI
    KHOẢN'])
    <div class="row">
        <div class="col-sm-12">
            <div class="card radius-15">
                <div class="card-body border-lg-top-danger">
                    <div class="card-body p-1">
                        <div class="form-body">
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            <h3 class="text-danger">Cấp vai trò cho tài khoản: <strong class="text-primary">{{$user->name}}</strong></h3>
                            <hr>
                            <h4>Vai trò hiện tại:
                                <strong style="text-transform:uppercase" class="text-danger font-weight-bold">
                                    @if($user_role)
                                    <!-- <span aria-hidden="true" class="icon-user-following "></span> -->
                                    <i class="bi bi-person-check"></i>
                                    {{$user_role->name}}
                                    @else{
                                    Chưa có
                                    }
                                    @endif
                                </strong>
                            </h4>
                            <form method="POST" action="{{ route('insert-roles', ['id' => $user->id]) }}">
                                @csrf
                                @foreach($role as $key => $r)
                                @if($user_role)
                                <div style="font-size:16px" class="form-check">
                                    <input {{$r->id==$user_role->id ? 'checked' : ''}} class="form-check-input" type="radio" name="role" value="{{$r->name}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <strong class="text-Dark"> {{$r->name}} </strong>
                                    </label>
                                </div>
                                @else
                                <div style="font-size:16px" class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="{{$r->name}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <strong class="text-Dark"> {{$r->name}} </strong>
                                    </label>
                                </div>
                                @endif
                                @endforeach
                                <button type="submit" class="btn btn-info px-5 mt-2">Cấp vai trò</button>
                                <form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>


@endsection

<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input~.checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked~.checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked~.checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}
</style>
