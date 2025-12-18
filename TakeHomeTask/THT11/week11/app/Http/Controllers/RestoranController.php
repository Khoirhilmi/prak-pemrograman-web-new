<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;

class RestoranController extends Controller
{
    public function index()
    {
        return Restoran::all();
    }

    public function show($id)
    {
        $restoran = Restoran::with('menus')->find($id);

        if (!$restoran) {
            return response()->json([
                'message' => 'Restoran tidak ditemukan'
            ], 404);
        }

        return $restoran;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|min:3',
            'email'   => 'required|email',
            'alamat'  => 'required|string',
            'no_telp' => 'required|string'
        ]);

        return Restoran::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $restoran = Restoran::find($id);

        if (!$restoran) {
            return response()->json([
                'message' => 'Restoran tidak ditemukan'
            ], 404);
        }

        $restoran->update($request->only([
            'nama',
            'email',
            'alamat',
            'no_telp'
        ]));

        return $restoran;
    }

    public function destroy($id)
    {
        $restoran = Restoran::find($id);

        if (!$restoran) {
            return response()->json([
                'message' => 'Restoran tidak ditemukan'
            ], 404);
        }

        $restoran->delete();

        return response()->json([
            'message' => 'Restoran berhasil dihapus'
        ]);
    }
}
