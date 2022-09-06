@extends('layouts.doctors')

@section('content')
<div class="row justify-content-center py-5">
    <div class="col-6">
        <h2 class="text-center">Đăng nhập dành cho bác sỹ</h2>
        <hr>
        @if (session('msg'))
            <div class="alert alert-danger text-center">{{session('msg')}}</div>
        @endif
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Email bác sỹ</label>
                <input type="text" class="form-control" name="email" placeholder="Email bác sỹ..." value="{{old('email')}}"/>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu..." />
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <p>
                <input type="checkbox" name="remember" value="1"/> Ghi nhớ
            </p>

            <button type="submit" class="btn btn-primary">Đăng nhập</button>

            <hr>

            <p><a href="{{route('doctors.forgot')}}">Quên mật khẩu</a></p>
            @csrf
        </form>
    </div>
</div>
@endsection
