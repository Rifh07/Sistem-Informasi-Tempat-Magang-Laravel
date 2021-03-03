<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship;
use App\Company;
use Raw;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $intern = Internship::join('companies', 'companies.id', '=', 'internship.companies')
                ->select('internship.id', 'internship.title', 'internship.kuota', 'internship.apply', 'companies.nama_perusahaan', 'companies.jenis_usaha')->get();
        return view('home', compact('intern'));
    }

    public function searchType(Request $request)
    {
        // jenis_usaha
        $intern = Internship::join('companies', 'companies.id', '=', 'internship.companies')
                ->select('internship.id', 'internship.title', 'internship.kuota', 'internship.apply', 'companies.nama_perusahaan', 'companies.jenis_usaha')
                ->where('companies.jenis_usaha', $request->jenis_usaha)
                ->get();
        return view('home', compact('intern'));
    }
    
    public function search(Request $request)
    {
        // jenis_usaha
        $intern = Internship::join('companies', 'companies.id', '=', 'internship.companies')
                ->select('internship.id', 'internship.title', 'internship.kuota', 'internship.apply', 'companies.nama_perusahaan', 'companies.jenis_usaha')
                ->where('internship.title', 'Like', "%$request->s%")
                ->orWhere('companies.jenis_usaha', 'Like', "%$request->s%")
                ->orWhere('companies.nama_perusahaan', 'Like', "%$request->s%")
                ->get();
        return view('home', compact('intern'));
    }
}
