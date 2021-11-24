@extends('admin.layouts.master')

@section('title')
Thêm tài khoản
@endsection

@section('content')

<div class="content container-fluid">
    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'QUẢN LÝ QUYỀN QUA VAI TRÒ'])
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
                            <h3 class="text-primary">Cấp quyền cho vai trò:
                                <button class="btn btn-danger"><strong style="text-transform:uppercase">
                                        <i class="bi bi-person-check"></i>
                                        {{$role->name}}
                                    </strong></button>
                                <div class="row pl-5">
                                    @foreach($all_permissions as $key => $per)
                                    @if($per->parent==0)

                                    <div class="card text-dark mt-3 mr-5" style="max-width: 18rem;">
                                        <div class="card-header">
                                            <label class="container mt-2 font-weight-bold"> {{$per->name}}
                                                <input value="{{$per->id}}" data-id="{{$per->id}}" class="select-all"
                                                    name="permission[]"
                                                    {{in_array($per->id,$permissions_by_role) ? 'checked' : '' }}
                                                    type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <ul class="card-text list-group list-group-flush">
                                            @foreach($all_permissions as $key => $perchil)
                                            @if($perchil->parent==$per->id)
                                            <li class="list-group-item">
                                                <label class="container"> {{$perchil->name}}
                                                    <input value="{{$perchil->id}}" class="chil_{{$perchil->parent}}"
                                                        name="permission[]"
                                                        {{in_array($perchil->id,$permissions_by_role) ? 'checked' : '' }}
                                                        type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>

                                    </div>

                                @endif
                                @endforeach
                                </div>
                            </h3>
                            <hr>

                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>

<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 17px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input~.checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked~.checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked~.checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
@endsection

@push('script')
<script>
$('.select-all').click(function(event) {
    var id = $(this).data('id');
    if (this.checked) {
        $('.chil_' + id).each(function() {
            this.checked = true;
        });
    } else {
        $('.chil_' + id).each(function() {
            this.checked = false;
        });
    }
});
</script>
@endpush
