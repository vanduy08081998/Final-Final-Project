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
                            <h4 class="text-dark">Vai trò hiện tại:
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
                                        <strong class="text-dark"> {{$r->name}} </strong>
                                    </label>
                                </div>
                                @else
                                <div style="font-size:16px" class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="{{$r->name}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <strong class="text-dark"> {{$r->name}} </strong>
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

