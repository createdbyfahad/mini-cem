<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Mail\CompanyCreated;
use Illuminate\Support\Facades\Mail; 

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::withCount('employees')->paginate(10);

        return view('company.main', compact('companies'));
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
        //
        $validatedData = $request->validate([
        'logo'  => 'nullable|dimensions:min_width=100,min_width=100',
        'name' => 'required|max:32',
        'email' => 'nullable|email',
        'website' => 'nullable|url'
        ]);


        $company = new Company([
            'name'  => $validatedData['name'],
            'email'  => $validatedData['email'],
            'website'  => $validatedData['website'],
        ]);

        // process the image

        if(isset($validatedData['logo'])){
            $path = $request->file('logo')->store('public');
            // $image = Image::make()
            
            $company->logo_name = substr($path,7);
        }

        if($company->save()){
            // send the email
            Mail::to($request->user())->send(new CompanyCreated($company));
        }

        return redirect(route('companies.index'))->with('success', 'Company has been added');
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

        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        // var_dump($company);

        return view('company.edit', compact('company'));
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
        //

        $validatedData = $request->validate([
        'name' => 'required|max:32',
        'email' => 'nullable|email',
        'website' => 'nullable|url'
        ]);

        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->website = $validatedData['website'];

        $company->save();

        return redirect(route('companies.index'))->with('success', 'Company has been updated');
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

        $company->delete();

        return redirect(route('companies.index'))->with('success', 'Company has been deleted'); 
    }
}
