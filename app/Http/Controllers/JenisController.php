<?php
  
namespace App\Http\Controllers;
  
use App\Models\Jenis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jenis = Jenis::latest()->paginate(5);
        
        return view('jenis.index',compact('jenis'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jenis.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kodeobat' => 'required',
            'jenisobat' => 'required',
        ]);
        
        Jenis::create($request->all());
         
        return redirect()->route('jenis.index')
                        ->with('success','Jenis created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis): View
    {
        return view('jenis.show',compact('jenis'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis): View
    {
        return view('jenis.edit',compact('jenis'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis $jenis): RedirectResponse
    {
        $request->validate([
            'kodeobat' => 'required',
            'jenisobat' => 'required',
        ]);
        
        $jenis->update($request->all());
        
        return redirect()->route('jenis.index')
                        ->with('success','Jenis updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis): RedirectResponse
    {
        $jenis->delete();
         
        return redirect()->route('jenis.index')
                        ->with('success','Jenis deleted successfully');
    }
}