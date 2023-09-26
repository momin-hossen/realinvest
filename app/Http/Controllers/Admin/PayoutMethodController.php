<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HasUploader;
use App\Models\PayoutMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PayoutMethodController extends Controller
{
    use HasUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payout_methods = PayoutMethod::when(request('search'), function($q) {
            $q->where('name', 'like', '%'.request('search').'%');
        })
        ->latest()
        ->paginate(2);

        return view('admin.payout_methods.index', compact('payout_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payout_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'min_limit' => 'required|numeric|min:0',
            'max_limit' => 'required|numeric|min:0',
            'delay' => 'required|numeric|min:0',
            'fixed_charge' => 'required|numeric|min:0',
            'percent_charge' => 'required|numeric|min:0',
            'data' => 'required',
            'instruction' => 'required',
            'status' => 'required',
        ]);

        PayoutMethod::create($request->except('image') + [
            'image' => $this->upload($request, 'image'),
        ]);

        return response()->json([
            'message' => 'Payout created successfully.',
            'redirect' => route('admin.payout_methods.index')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayoutMethod $payoutMethod)
    {
        return view('admin.payout_methods.edit', compact('payoutMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'min_limit' => 'required|numeric|min:0',
            'max_limit' => 'required|numeric|min:0',
            'delay' => 'required|numeric|min:0',
            'fixed_charge' => 'required|numeric|min:0',
            'percent_charge' => 'required|numeric|min:0',
            'data' => 'required',
            'instruction' => 'required',
            'status' => 'required',
        ]);

        $payout_methods = PayoutMethod::findOrFail($id);

        $payout_methods->update($request->except('image') + [
            'image' => $request->hasFile('image') ? $this->upload($request, 'image', $payout_methods->image) : $payout_methods->image,
        ]);

        return response()->json([
            'message' => 'Payout method updated successfully.',
            'redirect' => route('admin.payout_methods.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payout_methods = PayoutMethod::findOrFail($id);
        if (file_exists($payout_methods->image ?? false)) {
            Storage::delete($payout_methods->image);
        }
        $payout_methods->delete();
        return response()->json([
            'message' => __("Payout deleted successfully"),
            'redirect' => route('admin.payout_methods.index')
        ]);
    }
}
