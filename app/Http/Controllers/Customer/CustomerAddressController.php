<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;

class CustomerAddressController extends Controller
{
    // LIST ALAMAT
    public function index()
    {
        $addresses = DB::table('customer_addresses')
            ->join('indonesia_provinces', 'customer_addresses.province_id', '=', 'indonesia_provinces.code')
            ->join('indonesia_cities', 'customer_addresses.city_id', '=', 'indonesia_cities.code')
            ->join('indonesia_districts', 'customer_addresses.district_id', '=', 'indonesia_districts.code')
            ->join('indonesia_villages', 'customer_addresses.village_id', '=', 'indonesia_villages.code')
            ->select(
                'customer_addresses.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
            )
            ->where('customer_addresses.user_id', auth()->id())
            ->get();

        return view('customer_addresses.index', compact('addresses'));
    }


    // FORM TAMBAH ALAMAT
    public function create()
    {
        $provinces = DB::table('indonesia_provinces')
            ->orderBy('name')
            ->get();

        return view('customer_addresses.create', compact('provinces'));
    }

    // SIMPAN ALAMAT
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'recipient_name' => 'required',
            'phone_number' => 'required',
            'address_detail' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            // kalau user centang "jadikan default"
            if ($request->has('is_default')) {
                CustomerAddress::where('user_id', auth()->id())
                    ->update(['is_default' => false]);
            }

            CustomerAddress::create([
                'user_id' => auth()->id(),
                'label' => $request->label,
                'recipient_name' => $request->recipient_name,
                'phone_number' => $request->phone_number,
                'address_detail' => $request->address_detail,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'is_default' => $request->has('is_default'),
            ]);
        });

        return redirect('/addresses')->with('success', 'Alamat berhasil ditambahkan');
    }
    public function edit($id)
    {
        $address = CustomerAddress::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $provinces = DB::table('indonesia_provinces')
            ->orderBy('name')
            ->get();

        return view('customer_addresses.edit', compact('address', 'provinces'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required',
            'recipient_name' => 'required',
            'phone_number' => 'required',
            'address_detail' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);

        $address = CustomerAddress::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $address->update($request->only([
            'label',
            'recipient_name',
            'phone_number',
            'address_detail',
            'province_id',
            'city_id',
            'district_id',
            'village_id',
        ]));

        return redirect('/addresses')->with('success', 'Alamat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $address = CustomerAddress::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // 🚫 jangan izinkan hapus alamat default
        if ($address->is_default) {
            return back()->with('error', 'Alamat default tidak bisa dihapus');
        }

        $address->delete();

        return back()->with('success', 'Alamat berhasil dihapus');
    }


    public function setDefault($id)
    {
        DB::transaction(function () use ($id) {

            // matikan semua default user ini
            CustomerAddress::where('user_id', auth()->id())
                ->update(['is_default' => false]);

            // set alamat ini jadi default
            CustomerAddress::where('id', $id)
                ->where('user_id', auth()->id())
                ->update(['is_default' => true]);
        });

        return back()->with('success', 'Alamat default berhasil diubah');
    }
}
