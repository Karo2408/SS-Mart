<form method="POST" action="{{ route('users.store') }}">
@csrf
<input name="nama" placeholder="Nama">
<input name="email" placeholder="Email">
<input name="password" type="password" placeholder="Password">
<select name="role">
    <option value="admin">Admin</option>
    <option value="customer">Customer</option>
</select>
<button>Simpan</button>
</form>
