@extends('layouts.doctors')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-6">
            <h2 class="text-center">Lấy lại mật khẩu</h2>
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

                <button type="submit" class="btn btn-primary">Gửi email</button>

                @csrf
            </form>
        </div>
    </div>
@endsection
