<form method="POST" action="{{ route('users.update',$user->id_user) }}">
@csrf @method('PUT')
<input name="nama" value="{{ $user->nama }}">
<input name="email" value="{{ $user->email }}">
<select name="role">
    <option {{ $user->role=='admin'?'selected':'' }}>admin</option>
    <option {{ $user->role=='customer'?'selected':'' }}>customer</option>
</select>
<button>Update</button>
</form>
