<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * GET /api/menus
     */
    public function index()
    {
        return Menu::with('restoran')->get();
    }

    /**
     * GET /api/menus/{id}
     */
    public function show($id)
    {
        $menu = Menu::with('restoran')->find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        return $menu;
    }

    /**
     * POST /api/menus
     */
    public function store(Request $request)
    {
        $request->validate([
            'restoran_id' => 'required|exists:restorans,id',
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        return Menu::create($request->all());
    }

    /**
     * PUT /api/menus/{id}
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $menu->update($request->only(['nama', 'harga', 'jumlah']));

        return $menu;
    }

    /**
     * DELETE /api/menus/{id}
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $menu->delete();

        return response()->json([
            'message' => 'Menu berhasil dihapus'
        ]);
    }
}
