<form action="/addresses" method="POST">
    @csrf

    <input type="text" name="label" placeholder="Label (Rumah / Kantor)" required>
    <input type="text" name="recipient_name" placeholder="Nama Penerima" required>
    <input type="text" name="phone_number" placeholder="No HP" required>
    <textarea name="address_detail" placeholder="Alamat Lengkap" required></textarea>

    {{-- PROVINSI --}}
    <select name="province_id" id="province" required>
        <option value="">Pilih Provinsi</option>
        @foreach ($provinces as $province)
            <option value="{{ $province->code }}">{{ $province->name }}</option>
        @endforeach
    </select>

    <select name="city_id" id="city" required>
        <option value="">Pilih Kota / Kabupaten</option>
    </select>

    <select name="district_id" id="district" required>
        <option value="">Pilih Kecamatan</option>
    </select>

    <select name="village_id" id="village" required>
        <option value="">Pilih Kelurahan / Desa</option>
    </select>


    <button type="submit">Simpan Alamat</button>
</form>

<script>
    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    province.addEventListener('change', function() {
        console.log('province_code:', this.value);

        fetch(`/cities/${this.value}`)
            .then(res => res.json())
            .then(data => {
                console.log('cities:', data);

                city.innerHTML = '<option value="">Pilih Kota / Kabupaten</option>';
                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    city.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });

    city.addEventListener('change', function() {
        console.log('city_code:', this.value);

        fetch(`/districts/${this.value}`)
            .then(res => res.json())
            .then(data => {
                console.log('districts:', data);

                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    district.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });

    district.addEventListener('change', function() {
        console.log('district_code:', this.value);

        fetch(`/villages/${this.value}`)
            .then(res => res.json())
            .then(data => {
                console.log('villages:', data);

                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    village.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });
</script>
