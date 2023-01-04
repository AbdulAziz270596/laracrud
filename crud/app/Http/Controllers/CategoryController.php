<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data kategori dari database
        $kategori = Category::orderBy('nama', 'asc');

        // Jika terdapat request pencarian
        if ($request->has('q')) {
            // Filter data kategori berdasarkan nama yang sesuai dengan keyword pencarian
            $kategori = $kategori->where('nama', 'like', '%' . $request->input('q') . '%');
        }

        // Jalankan query dan tampung hasilnya ke dalam variabel $kategori
        $kategori = $kategori->paginate(10);

        // Tampilkan view kategori.index dengan mengirimkan data kategori
        return view('kategori.index', ['kategori' => $kategori]);
    }
    public function destroy(Category $kategori)
    {
        // Hapus kategori dari database
        $kategori->delete();

        // Redirect ke halaman kategori
        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }
    use Notifiable;

    // ...

    public function routeNotificationFor($driver)
    {
        // Return email address of the user who should receive the notification
        return $this->user->email;
    }


}
