<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $identities = Identity::all();

        return view('admin.suppliers.create', compact('identities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|string|max:20|unique:suppliers,document_number',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email',
            'phone' => 'nullable|string|max:20',
        ]);

        $supplier = Suppliers::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'Supplier created successfully.',
        ]);

        return redirect()->route('admin.suppliers.index');

      
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $supplier)
    {
        return view('admin.suppliers.index', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suppliers $supplier, Request $request)

    {
        $identities = Identity::all();
        return view('admin.suppliers.edit', compact('supplier', 'identities'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suppliers $supplier)
    {
       
        
         $data = $request->validate([
            'identity_id' => 'required|exists:identities,id',
            'document_number' => 'required|string|max:20|unique:suppliers,document_number,' . $supplier->id,
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'nullable|string|max:20',
        ]);
       
        $supplier->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'Supplier updated successfully.',
        ]);
        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $supplier)
    {
        if ($supplier->purchaseOrders()->exists() || $supplier->purchases()->exists() ) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Cannot delete supplier with associated purchases.',
            ]);
            return redirect()->route('admin.suppliers.index');
        }
       
        
        $supplier->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'Supplier deleted successfully.',
        ]);

        return redirect()->route('admin.suppliers.index');
    }
}
