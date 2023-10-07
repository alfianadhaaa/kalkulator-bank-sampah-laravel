<?php

namespace App\Http\Controllers;

use App\Models\TrashTypeModel;
use Illuminate\Http\Request;

class TrashTypeController extends Controller
{
    public function index()
    {
        $trashTypes = TrashTypeModel::all();
        return view('trash_types.index', compact('trashTypes'))->with([
            'title' => 'masterData'
        ]);
    }

    public function create()
    {
        return view('trash_types.create')->with([
            'title' => 'masterData'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_kg' => 'required|numeric|min:0',
            'photo_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // 'photos' adalah nama direktori penyimpanan
            $validatedData['photo'] = $photoPath;
        }

        TrashTypeModel::create($validatedData);

        return redirect()->route('trash_types.index')->with('success', 'Berhasil Menambah Jenis Sampah');
    }

    public function destroy($id)
    {
        TrashTypeModel::where('id', $id)->delete();

        return redirect()->route('trash_types.index')->with('success', 'Jenis Sampah berhasil dihapus.');
    }

    public function show($id)
    {
        $trashType = TrashTypeModel::where('id', $id)->first();
        return view('trash_types.show', compact('trashType'))->with([
            'title' => 'masterData'
        ]);
    }

    public function edit($id)
    {
        $trashType = TrashTypeModel::findOrFail($id);
        return view('trash_types.edit', compact('trashType'))->with([
            'title' => 'masterData'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_kg' => 'required|numeric|min:0',
            'photo_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $trashType = TrashTypeModel::findOrFail($id);
        $trashType->update($validatedData);

        return redirect()->route('trash_types.index')->with('success', 'Jenis Sampah berhasil diperbarui.');
    }
}
