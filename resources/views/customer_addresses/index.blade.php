@foreach ($addresses as $address)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">

        <strong>
            {{ $address->label }}
            @if ($address->is_default)
                ⭐
            @endif
        </strong><br>

        {{ $address->recipient_name }} - {{ $address->phone_number }}<br>
        {{ $address->address_detail }}<br>
        {{ $address->village }},
        {{ $address->district }},
        {{ $address->city }},
        {{ $address->province }}

        <br><br>

        @if ($address->is_default)
            <small><b>Alamat default</b></small>
        @else
            <form action="{{ route('addresses.default', $address->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit">Jadikan Default</button>
            </form>
            <a href="{{ route('addresses.edit', $address->id) }}">Edit</a>  
        @endif

    </div>
@endforeach

