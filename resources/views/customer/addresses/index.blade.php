{{-- FLASH MESSAGE --}}
<style>
    .alert {
        padding: 10px 14px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    .alert-error {
        background: #fee2e2;
        color: #7f1d1d;
    }

    .address-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    .address-header {
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 6px;
    }

    .badge-default {
        background: #16a34a;
        color: white;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 20px;
        margin-left: 6px;
    }

    .address-body {
        font-size: 14px;
        color: #374151;
        margin-bottom: 10px;
    }

    .address-actions button,
    .address-actions a {
        font-size: 12px;
        padding: 6px 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        margin-right: 5px;
        display: inline-block;
    }

    .btn-default {
        background: #2563eb;
        color: white;
    }

    .btn-edit {
        background: #f59e0b;
        color: white;
    }

    .btn-delete {
        background: #dc2626;
        color: white;
    }

    .default-text {
        font-size: 13px;
        font-weight: bold;
        color: #16a34a;
    }
</style>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif


{{-- LIST ALAMAT --}}
@foreach ($addresses as $address)
    <div class="address-card">

        <div class="address-header">
            {{ $address->label }}

            @if ($address->is_default)
                <span class="badge-default">Default</span>
            @endif
        </div>

        <div class="address-body">
            {{ $address->recipient_name }} • {{ $address->phone_number }}<br>
            {{ $address->address_detail }}<br>
            {{ $address->village }},
            {{ $address->district }},
            {{ $address->city }},
            {{ $address->province }}
        </div>

        @if ($address->is_default)
            <div class="default-text">
                ⭐ Alamat default
            </div>
        @else
            <div class="address-actions">
                <form action="{{ route('addresses.default', $address->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn-default">
                        Jadikan Default
                    </button>
                </form>

                <a href="{{ route('addresses.edit', $address->id) }}"
                   class="btn-edit">
                    Edit
                </a>

                <form action="{{ route('addresses.destroy', $address->id) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Yakin mau hapus alamat ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        Hapus
                    </button>
                </form>
            </div>
        @endif

    </div>
@endforeach
    