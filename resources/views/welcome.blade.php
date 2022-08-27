@if (\Auth::check())
<p style="text-align: center;">
    Chào mừng bạn: {{\Auth::user()->name}}
    <a href="{{route('custom-logout')}}">Đăng xuất</a>
</p>
@else
    <p style="text-align: center;">
        <a href="{{route('login')}}">Đăng nhập</a>
        <a href="{{route('register')}}">Đăng ký</a>
    </p>
@endif
<h1 style="text-align: center;">TRANG CHỦ UNICODE</h1>
