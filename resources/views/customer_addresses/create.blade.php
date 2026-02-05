<h2 style="text-align:center; margin-bottom:25px;">➕ Tambah Alamat</h2>

<style>
    .address-page {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .address-wrapper {
        width: 100%;
        max-width: 720px;
        background: #ffffff;
        padding: 24px;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .address-wrapper input,
    .address-wrapper textarea,
    .address-wrapper select {
        width: 100%;
        padding: 11px 14px;
        margin-bottom: 14px;
        border-radius: 10px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        transition: border-color .2s, box-shadow .2s;
    }

    .address-wrapper input:focus,
    .address-wrapper textarea:focus,
    .address-wrapper select:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.15);
    }

    .address-wrapper textarea {
        resize: vertical;
        min-height: 90px;
    }

    .address-wrapper button {
        width: 100%;
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 10px;
    }

    .address-wrapper button:hover {
        background: #1e40af;
    }
</style>

<div class="address-page">
    <div class="address-wrapper">

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

            {{-- KOTA --}}
            <select name="city_id" id="city" required>
                <option value="">Pilih Kota / Kabupaten</option>
            </select>

            {{-- KECAMATAN --}}
            <select name="district_id" id="district" required>
                <option value="">Pilih Kecamatan</option>
            </select>

            {{-- KELURAHAN --}}
            <select name="village_id" id="village" required>
                <option value="">Pilih Kelurahan / Desa</option>
            </select>

            <button type="submit">💾 Simpan Alamat</button>
        </form>

    </div>
</div>

<script>
    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    province.addEventListener('change', function() {
        fetch(`/cities/${this.value}`)
            .then(res => res.json())
            .then(data => {
                city.innerHTML = '<option value="">Pilih Kota / Kabupaten</option>';
                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    city.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });

    city.addEventListener('change', function() {
        fetch(`/districts/${this.value}`)
            .then(res => res.json())
            .then(data => {
                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    district.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });

    district.addEventListener('change', function() {
        fetch(`/villages/${this.value}`)
            .then(res => res.json())
            .then(data => {
                village.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';

                data.forEach(item => {
                    village.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });
    });
</script>
