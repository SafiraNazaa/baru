<?php
  
namespace App\Http\Controllers;
  
use App\Models\Bentuk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class BentukController extends Controller
{

    public function index(): View
    {
        $bentuks = Bentuk::latest()->paginate(5);
        
        return view('bentuks.index',compact('bentuks'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bentuks.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kodebentuk' => 'required',
            'bentukobat' => 'required',
        ]);
        
        Bentuk::create($request->all());
         
        return redirect()->route('bentuks.index')
                        ->with('success','Bentuk created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Bentuk $bentuk): View
    {
        return view('bentuks.show',compact('bentuk'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bentuk $bentuk): View
    {
        return view('bentuks.edit',compact('bentuk'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bentuk $bentuk): RedirectResponse
    {
        $request->validate([
            'kodebentuk' => 'required',
            'bentukobat' => 'required',
        ]);
        
        $bentuk->update($request->all());
        
        return redirect()->route('bentuks.index')
                        ->with('success','Bentuk updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bentuk $bentuk): RedirectResponse
    {
        $bentuk->delete();
         
        return redirect()->route('bentuks.index')
                        ->with('success','Bentuk deleted successfully');
    }
}