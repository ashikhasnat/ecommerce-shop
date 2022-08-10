<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $companyInfo = CompanyInfo::first();
        return view('dashboard.company.index', compact('companyInfo'));
    }

    public function edit($id)
    {
        $companyInfo = CompanyInfo::find($id);
        return view('dashboard.company.edit', compact('companyInfo'));
    }

    public function update(Request $request, $id)
    {
        // validate the data
        $data = request()->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        $companyInfo = CompanyInfo::first();
        $companyInfo->update($data);
        return redirect()->route('company-info.index')->with('success', 'Company Info Updated Successfully');
    }
}
