<h2>Edit Alamat</h2>

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

    <button type="submit">Update Alamat</button>
</form>

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
