<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = trim((string) $request->query('q', ''));
        $hotels = Hotel::when(in_array($status, ['aktif', 'nonaktif'], true), function ($query) use ($status) {
            $query->where('status', $status);
        })->when($search !== '', function ($query) use ($search) {
            $query->where(function ($hotelQuery) use ($search) {
                $hotelQuery->where('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            });
        })->latest()->paginate(30)->appends($request->query());

        $hotelTotal = Hotel::count();
        $hotelAktif = Hotel::where('status', 'aktif')->count();
        $hotelNonaktif = Hotel::where('status', 'nonaktif')->count();

        return view('hotel.index', compact('hotels', 'status', 'search', 'hotelTotal', 'hotelAktif', 'hotelNonaktif'));
    }

    public function faq()
    {
        return view('hotel.faq');
    }

    public function profile()
    {
        return view('hotel.profile');
    }

    public function organization()
    {
        return view('hotel.organization');
    }

    public function create()
    {
        $this->authorizeAuthenticatedUser();

        return view('hotel.create');
    }

    public function edit(Hotel $hotel)
    {
        $this->authorizeAuthenticatedUser();

        return view('hotel.create', compact('hotel'));
    }

    public function store(Request $request)
    {
        $this->authorizeAuthenticatedUser();

        $data = $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'wajib_pajak' => 'nullable|boolean',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|max:4096',
        ]);

        $data['wajib_pajak'] = $request->boolean('wajib_pajak');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('hotels', 'public');
        }

        Hotel::create($data);
        return redirect()->route('hotel.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    public function update(Request $request, Hotel $hotel)
    {
        $this->authorizeAuthenticatedUser();

        $data = $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'wajib_pajak' => 'nullable|boolean',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|max:4096',
        ]);

        $data['wajib_pajak'] = $request->boolean('wajib_pajak');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('hotels', 'public');
        }

        $hotel->update($data);

        return redirect()->route('hotel.index')->with('success', 'Data hotel berhasil diperbarui.');
    }

    public function show(Hotel $hotel)
    {
        return view('hotel.show', [
            'hotel' => $hotel,
            'isShared' => false,
            'distanceKm' => $this->distanceFromBekauda($hotel),
        ]);
    }

    public function share(Hotel $hotel)
    {
        return view('hotel.show', [
            'hotel' => $hotel,
            'isShared' => true,
            'distanceKm' => $this->distanceFromBekauda($hotel),
        ]);
    }

    private function distanceFromBekauda(Hotel $hotel): ?float
    {
        if ($hotel->lat === null || $hotel->lng === null) {
            return null;
        }

        $officeLat = 1.3721801;
        $officeLng = 99.2730146;
        $hotelLat = (float) $hotel->lat;
        $hotelLng = (float) $hotel->lng;
        $latitudeDifference = deg2rad($hotelLat - $officeLat);
        $longitudeDifference = deg2rad($hotelLng - $officeLng);
        $a = sin($latitudeDifference / 2) ** 2
            + cos(deg2rad($officeLat)) * cos(deg2rad($hotelLat)) * sin($longitudeDifference / 2) ** 2;

        return 6371 * 2 * asin(sqrt($a));
    }

    public function destroy(Hotel $hotel)
    {
        $this->authorizeAuthenticatedUser();

        $hotel->delete();
        return back()->with('success', 'Hotel dihapus.');
    }

    private function authorizeAuthenticatedUser(): void
    {
        abort_unless(auth()->check() && auth()->user()->isAdmin(), 403, 'Akses admin hanya untuk pengguna dengan role admin.');
    }
}
