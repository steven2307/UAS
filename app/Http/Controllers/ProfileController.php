<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(){
        return view ("profile");
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nomor_induk' => 'nullable|integer|unique:users,nomor_induk,' . Auth::id(),
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jurusan' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        if ($request->hasFile('gambar')) {
            if ($user->gambar) {
                $gambarLama = "images/{$user->gambar}";
                if (Storage::disk('public')->exists($gambarLama)) {
                    Storage::disk('public')->delete($gambarLama);
                }
            }

            $filename = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('images', $filename, 'public');

            $user->gambar = $filename;
        }

        $user->name         = $request->name;
        $user->nomor_induk  = $request->nomor_induk;
        $user->jurusan      = $request->jurusan;
        $user->semester      = $request->semester;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
