@extends('admin.layouts.user')


@section('title', 'Đăng nhập')

@section('content')
		<div class="login-form form-authetication">
				<form action="{{ route('login') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-icon">
								<span><i class="icon icon-user"></i></span>
						</div>
						<div class="text-center">
								<div class="text-title">
										<p>Đăng nhập để trở thành thành viên</p>
								</div>
						</div>
						<div class="form-group">
								<input type="text" class="form-control item" name="email" id="email" placeholder="Email">
								@error('email')
										<div class="text-error"><i class="icon icon-exclamation"></i> {{ $message }}</div>
								@enderror
						</div>
						<div class="form-group">
								<input type="password" class="form-control item password" mame="password" id="password"
										placeholder="Mật khẩu">
								@error('password')
										<div class="text-error"><i class="icon icon-exclamation"></i> {{ $message }}</div>
								@enderror
						</div>
						<div class="form-group">
								<div class="text-primary"><a href="#!" class="text__forget__password">Quên mật khẩu ?</a>
								</div>
						</div>
						<div class="form-group">
								<button type="submit" class="btn btn-block create-account">Tạo tài khoản</button>
						</div>
				</form>
				<div class="social-media">
						<h5>Đăng nhập bằng mạng xã hội !</h5>
						<div class="social-icons">
								<a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
								<a href="#"><i class="icon-social-google" title="Google"></i></a>
								<a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
						</div>
				</div>
		</div>
@endsection
