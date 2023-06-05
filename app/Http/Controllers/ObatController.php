<?php
  
namespace App\Http\Controllers;
  
use App\Models\Obat;
use App\Models\Bentuk;
use App\Models\jenis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jenis = Jenis::select('id', 'jenisobat')->get();
        $kategori = Bentuk::select('id', 'bentukobat')->get();
        $obats = Obat::Join();
        $obats = Obat::latest()->paginate(5);

        return view('obats.index',compact('obats', 'jenis', 'kategori'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jenis = Jenis::select('id', 'jenisobat')->get();
        $kategori = Bentuk::select('id', 'bentukobat')->get();
        return view('obats.create', compact('jenis', 'kategori'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode' => 'required',
            'namaobat' => 'required',
            'dosis' => 'required',
            'efek' => 'required',
            'kategori' => 'required',
        ]);
        
        Obat::create($request->all());
         
        return redirect()->route('obats.index')
                        ->with('success','obat created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Obat $obat): View
    {
        $jenis = Jenis::select('id', 'jenisobat')->get();
        $kategori = Bentuk::select('id', 'bentukobat')->get();
        return view('obats.show',compact('obat', 'jenis', 'kategori'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat): View
    {
        $jenis = Jenis::select('id', 'jenisobat')->get();
        $kategori = Bentuk::select('id', 'bentukobat')->get();
        return view('obats.edit', compact('jenis', 'kategori', 'obat'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat): RedirectResponse
    {
        $request->validate([
            'kode' => 'required',
            'namaobat' => 'required',
            'dosis' => 'required',
            'efek' => 'required',
            'kategori' => 'required',
        ]);
        
        $obat->update($request->all());
        
        return redirect()->route('obats.index')
                        ->with('success','obat updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat): RedirectResponse
    {
        $obat->delete();
         
        return redirect()->route('obats.index')
                        ->with('success','obat deleted successfully');
    }
}