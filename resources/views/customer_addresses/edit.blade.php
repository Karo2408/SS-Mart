<h2 style="text-align:center; margin-bottom:25px;">✏️ Edit Alamat</h2>

<style>
    .address-page {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .address-edit-wrapper {
        width: 100%;
        max-width: 720px;
        background: #ffffff;
        padding: 24px;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .address-edit-wrapper input,
    .address-edit-wrapper textarea,
    .address-edit-wrapper select {
        width: 100%;
        padding: 11px 14px;
        margin-bottom: 14px;
        border-radius: 10px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        transition: border-color .2s, box-shadow .2s;
    }

    .address-edit-wrapper input:focus,
    .address-edit-wrapper textarea:focus,
    .address-edit-wrapper select:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.15);
    }

    .address-edit-wrapper textarea {
        resize: vertical;
        min-height: 90px;
    }

    .address-edit-wrapper button {
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

    .address-edit-wrapper button:hover {
        background: #1e40af;
    }
</style>

<div class="address-page">
    <div class="address-edit-wrapper">

        <form action="/addresses/{{ $address->id }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="label" value="{{ $address->label }}" required>

            <input type="text" name="recipient_name" value="{{ $address->recipient_name }}" required>

            <input type="text" name="phone_number" value="{{ $address->phone_number }}" required>

            <textarea name="address_detail" required>{{ $address->address_detail }}</textarea>

            {{-- PROVINSI --}}
            <select name="province_id" id="province" required>
                @foreach ($provinces as $province)
                    <option value="{{ $province->code }}"
                        {{ $province->code == $address->province_id ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                @endforeach
            </select>

            {{-- KOTA --}}
            <select name="city_id" id="city" required>
                <option value="">Pilih Kota</option>
            </select>

            {{-- KECAMATAN --}}
            <select name="district_id" id="district" required>
                <option value="">Pilih Kecamatan</option>
            </select>

            {{-- KELURAHAN --}}
            <select name="village_id" id="village" required>
                <option value="">Pilih Kelurahan</option>
            </select>

            <button type="submit">💾 Update Alamat</button>
        </form>

    </div>
</div>

<script>
const province  = document.getElementById('province');
const city      = document.getElementById('city');
const district  = document.getElementById('district');
const village   = document.getElementById('village');

// 🔑 DATA DARI DATABASE
const selectedCity     = @json($address->city_id);
const selectedDistrict = @json($address->district_id);
const selectedVillage  = @json($address->village_id);

function loadCities(provinceCode, isInit = false) {
    fetch(`/cities/${provinceCode}`)
        .then(r => r.json())
        .then(data => {
            city.innerHTML = '<option value="">Pilih Kota</option>';
            data.forEach(i => {
                city.innerHTML += `
                    <option value="${i.code}" ${isInit && i.code == selectedCity ? 'selected' : ''}>
                        ${i.name}
                    </option>`;
            });

            if (isInit && selectedCity) {
                loadDistricts(selectedCity, true);
            }
        });
}

function loadDistricts(cityCode, isInit = false) {
    if (!cityCode) return;

    fetch(`/districts/${cityCode}`)
        .then(r => r.json())
        .then(data => {
            district.innerHTML = '<option value="">Pilih Kecamatan</option>';
            data.forEach(i => {
                district.innerHTML += `
                    <option value="${i.code}" ${isInit && i.code == selectedDistrict ? 'selected' : ''}>
                        ${i.name}
                    </option>`;
            });

            if (isInit && selectedDistrict) {
                loadVillages(selectedDistrict, true);
            }
        });
}

function loadVillages(districtCode, isInit = false) {
    if (!districtCode) return;

    fetch(`/villages/${districtCode}`)
        .then(r => r.json())
        .then(data => {
            village.innerHTML = '<option value="">Pilih Kelurahan</option>';
            data.forEach(i => {
                village.innerHTML += `
                    <option value="${i.code}" ${isInit && i.code == selectedVillage ? 'selected' : ''}>
                        ${i.name}
                    </option>`;
            });
        });
}

// 🔥 INIT SAAT EDIT
document.addEventListener('DOMContentLoaded', () => {
    loadCities(province.value, true);
});

// 🔄 USER CHANGE
province.addEventListener('change', () => {
    city.innerHTML = '';
    district.innerHTML = '';
    village.innerHTML = '';
    loadCities(province.value);
});

city.addEventListener('change', () => {
    district.innerHTML = '';
    village.innerHTML = '';
    loadDistricts(city.value);
});

district.addEventListener('change', () => {
    village.innerHTML = '';
    loadVillages(district.value);
});
</script>
    