<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.view', ['companies'=>Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required' // URL
        ]);
        
        $data = $request->all();
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $extention = $request->image->extension();
            $filename= uniqid().'.'.$extention;
            $path = $request->file('image')->storeAs('images',$filename);
            $data['logo'] = $filename;
        } else {
            return redirect()->back()->withError('File not uploaded or correct');
        }
        
        Company::create($data);
        
        return redirect()->route('companies.create')->withSuccess('Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required' // URL
        ]);
        
        $data = $request->all();
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $extention = $request->image->extension();
            $filename= uniqid().'.'.$extention;
            $path = $request->file('image')->storeAs('images',$filename);
            $data['logo'] = $filename;
        } else {
            return redirect()->back()->withError('File not uploaded or correct');
        }
        
        $company->update($data);
        
        return redirect()->route('companies.index')->withSuccess('Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
