<h1>Doctor Dashboard</h1>
<p>Chào bạn: {{$doctor->name}}</p>
<p>Email: {{$doctor->email}}</p>
<p><a href="#" onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">Đăng xuất</a></p>
<form method="post" action="{{route('doctors.logout')}}" id="logout_form" style="display: none">
    @csrf
</form>
