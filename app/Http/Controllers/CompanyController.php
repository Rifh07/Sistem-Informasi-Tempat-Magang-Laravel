<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship;
use App\Company;
use App\Apply;
use App\User;
use Image;
use File;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *  
    *    Return Views
    *  
    */

    public function viewsCompany()
    {
        $role = \Auth::user()->role;
        if ($role == "Admin" || $role == "Kepala Program Studi" ) :
            $perusahaan = Company::groupBy('id')->get();
            return view('companies.views', ['perusahaan' => $perusahaan]);
        else :
            abort(404);
        endif;
    }
    
    public function viewsInternship($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin" || $role == "Kepala Program Studi" ) :
            $intern = Internship::where('companies', $id)->get();
            return view('companies.internship.views', ['perusahaan' => $intern]);
        else :
            abort(404);
        endif;
    }
    
    public function addCompanyViews()
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            return view('companies.add');
        else :
            abort(404);
        endif;
    }
    
    public function addInternshipViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            return view('companies.internship.add', ['id'=>$id]);
        else :
            abort(404);
        endif;
    }
    
    public function detailCompanyViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $perusahaan = company::where('id', $id)->get();
            return view('companies.detail', ['id'=>$id, 'perusahaan'=>$perusahaan]);
        else :
            abort(404);
        endif;
    }

    public function deleteCompanyViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $perusahaan = Company::where('id', $id)->get();
            return view('companies.delete', ['id'=>$id, 'perusahaan'=>$perusahaan]);
        else :
            abort(404);
        endif;
    }

    public function editInternshipViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $intern = Internship::where('id', $id)->get();
            return view('companies.internship.edit', ['id'=>$id, 'intern'=>$intern]);
        else :
            abort(404);
        endif;
    }

    public function deleteInternshipViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $intern = Internship::where('internship.id', $id)->join('companies', 'companies.id', '=', 'internship.companies')->select('internship.title', 'companies.nama_perusahaan')->get();
            return view('companies.internship.delete', compact('intern'), ['id'=>$id]);
        else :
            abort(404);
        endif;
    }

    public function detailInternshipViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Mahasiswa") :
                $intern = Internship::where('internship.id', $id)
                        ->join('companies', 'companies.id', '=', 'internship.companies')
                        ->select(
                            'internship.title', 
                            'internship.kuota',
                            'internship.apply',
                            'internship.kategori', 
                            'internship.deskripsi',
                            'companies.nama_perusahaan',
                            'companies.alamat',
                            'companies.jenis_usaha',
                            'companies.telp',
                            'companies.logo',
                        )->get();
                return view('companies.internship.apply.views', compact('intern'), ['id'=>$id]);
        else :
            abort(404);
        endif;
    }

    public function mhsInternshipViews($id)
    {
        $role = \Auth::user()->role;
        if ($role == "Kepala Program Studi" ) :
            $mhs = Apply::where('id_internship', $id)
            ->join('users', 'users.username', 'apply.username_mhs')
            ->select(
                'users.username',
                'users.name',
                'users.email',
                'apply.status',
                'users.jurusan',
                'users.alamat',
                'apply.created_at',
            )->orderBy('apply.created_at', 'DESC')->get();
            return view('companies.internship.mahasiswa', ['id'=>$id, 'mhs' => $mhs]);
        else :
            abort(404);
        endif;
    }

    public function historyInternshipViews()
    {
        $role = \Auth::user()->role;
        if ($role == "Mahasiswa" ) :
            $mhs = User::where('username', \Auth::user()->username)
            ->join('apply', 'apply.username_mhs', 'users.username')
            ->join('internship', 'internship.id', 'apply.id_internship')
            ->join('companies', 'companies.id', 'internship.companies')
            ->select(
                'internship.id',
                'internship.title', 
                'internship.kuota',
                'internship.apply',
                'companies.nama_perusahaan',
                'companies.jenis_usaha',
                'apply.status',
            )->orderBy('apply.created_at', 'DESC')->get();
            return view('companies.internship.apply.history', ['mhs' => $mhs]);
        else :
            abort(404);
        endif;
    }

    /*
    *  
    *    CRUD
    *  
    */

    public function addCompany(Request $request)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:companies'],
                'jenis_usaha' => ['required', 'string', 'max:50'],
                'telp' => ['required', 'string', 'max:13'],
                'alamat' => ['required', 'string', 'max:200'],
                'logo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            ]);

            $logoname = $request->name.time().'.'.$request->logo->extension();  
            $logo_resize = Image::make($request->logo->getRealPath());
            $logo_resize->resize(800, 800, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('assets/images/logo/').$logoname);

            Company::create([
                'nama_perusahaan' => $request['name'],
                'email' => $request['email'],
                'alamat' => $request['alamat'],
                'jenis_usaha' => $request['jenis_usaha'],
                'telp' => $request['telp'],
                'logo' => $logoname,
                'create_by' => \Auth::user()->username,
            ]);
            return redirect()->back()->with('pesan', "Berhasil Menambahkan Perusahaan!");
        else :
            abort(404);
        endif;
    }

    public function editCompany(Request $request, $id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:companies'],
                'jenis_usaha' => ['required', 'string', 'max:50'],
                'telp' => ['required', 'string', 'max:13'],
                'alamat' => ['required', 'string', 'max:200'],
            ]);

            if ($request->logo) :
                $gambar = Company::where('id', $id)->first();
                File::delete('assets/images/logo/'.$gambar->logo);

                $logoname = $request->name.time().'.'.$request->logo->extension();  
                $logo_resize = Image::make($request->logo->getRealPath());
                $logo_resize->resize(800, 800, function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path('assets/images/logo/').$logoname);
                Company::where('id', $id)->update([
                    'nama_perusahaan' => $request['name'],
                    'email' => $request['email'],
                    'alamat' => $request['alamat'],
                    'jenis_usaha' => $request['jenis_usaha'],
                    'telp' => $request['telp'],
                    'logo' => $logoname,
                ]) ;
            else :
                Company::where('id', $id)->update([
                    'nama_perusahaan' => $request['name'],
                    'email' => $request['email'],
                    'alamat' => $request['alamat'],
                    'jenis_usaha' => $request['jenis_usaha'],
                    'telp' => $request['telp'],
                ]) ;
            endif;
                return redirect()->back()->with('pesan', "Perusahaan Berhasil Diupdate");
        else :
            abort(404);
        endif;
    }

    public function deleteCompany(Request $request, $id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $del = Company::find($id);
            $del->delete();
            return redirect()->route('viewsCompany');
        else :
            abort(404);
        endif;
    }
    
    public function addInternship(Request $request, $id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $this->validate($request, [
                'title' => ['required', 'string', 'max:100'],
                'kuota' => ['required', 'integer', 'max:100'],
                'kategori' => ['required', 'string', 'max:100'],
                'deskripsi' => ['required', 'string', 'max:5000'],
            ]);

            $perusahaan = Company::where('id', "$id")->get();
            foreach ($perusahaan as $perusahaan) {
                $perusahaan = $perusahaan->nama_perusahaan;
            }
            Internship::create([
                'title' => $request['title'],
                'kuota' => $request['kuota'],
                'kategori' => $request['kategori'],
                'companies' => $id,
                'deskripsi' => $request['deskripsi'],
                'create_by' => \Auth::user()->username,
            ]);
            return redirect()->back()->with('pesan', "Berhasil Menambahkan Magang di $perusahaan");
        else :
            abort(404);
        endif;
    }

    public function editInternship(Request $request, $id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $this->validate($request, [
                'title' => ['required', 'string', 'max:100'],
                'kuota' => ['required', 'integer', 'max:100'],
                'kategori' => ['required', 'string', 'max:100'],
                'deskripsi' => ['required', 'string', 'max:5000'],
            ]);

            Internship::where('id',$id)->update([
                'title' => $request['title'],
                'kuota' => $request['kuota'],
                'kategori' => $request['kategori'],
                'deskripsi' => $request['deskripsi'],
           ]) ;
            return redirect()->back()->with('pesan', "Magang Berhasil Diupdate");
        else :
            abort(404);
        endif;
    }

    public function deleteInternship(Request $request, $id)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $intern = Internship::where('id', $id)->get();
            foreach ($intern as $intern)
            {
                $company = $intern->companies;
            }
            $del = Internship::find($id);
            $del->delete();
            return redirect()->route('viewsInternship', [$id]);
        else :
            abort(404);
        endif;
    }

    public function applyInternship($id)
    {
        $role = \Auth::user()->role;
        $username = \Auth::user()->username;
        if ($role == "Mahasiswa") :
            $count = Apply::where('username_mhs', $username)->where('id_internship', $id)->count();
            if ($count > 0):
                return redirect()->back()->with('pesan', "Magang Sudah Pernah Diajukan");
            else :
                Apply::create([
                    'username_mhs' => $username,
                    'id_internship' => $id,
                    'status' => "Diajukan",
                ]);
                return redirect()->back()->with('pesan', "Magang Berhasil Diajukan");
            endif;
        else :
            abort(404);
        endif;
    }
    public function mhsInternshipApprove($id, $mhs)
    {
        $role = \Auth::user()->role;
        if ($role == "Kepala Program Studi") :
            $cek = Internship::where('id', $id)->get();
            foreach ($cek as $cek){
                $kuota = $cek->kuota;
                $apply = $cek->apply;
            }
            if ($kuota > $apply):
                $cek = Apply::where('id_internship', $id)->where('username_mhs',$mhs)->get();
                foreach ($cek as $cek){
                    $status = $cek->status;
                }
                if ($status == "Disetujui") :
                    return redirect()->route('mhsInternshipViews', [$id])->with('pesan', "Pengajuan $mhs Sudah Pernah Disetujui");
                else :
                    Apply::where('id_internship', $id)->where('username_mhs',$mhs)->update([
                        'status' => "Disetujui",
                    ]);
                    $cek = Internship::where('id', $id)->get();
                    foreach ($cek as $cek) {
                        $apply = $cek->apply+1;
                    }
                    Internship::where('id', $id)->update([
                        'apply' => $apply,
                    ]);
                    return redirect()->route('mhsInternshipViews', [$id])->with('pesan', "Pengajuan $mhs Berhasil Disetujui");
                endif;
            else:
                return redirect()->route('mhsInternshipViews', [$id])->withErrors("Melebihi Batas Kuota");
            endif;
        else :
            abort(404);
        endif;
    }

    public function mhsInternshipDisapprove($id, $mhs)
    {
        $role = \Auth::user()->role;
        if ($role == "Kepala Program Studi") :
                $cek = Apply::where('id_internship', $id)->where('username_mhs',$mhs)->get();
                foreach ($cek as $cek){
                    $status = $cek->status;
                }
                if ($status == "Ditolak") :
                    return redirect()->route('mhsInternshipViews', [$id])->with('pesan', "Pengajuan $mhs Sudah Pernah Ditolak");
                else :
                    if ($status == "Disetujui") :
                        $cek = Internship::where('id', $id)->get();
                        foreach ($cek as $cek) {
                            $apply = $cek->apply-1;
                        }
                        Internship::where('id', $id)->update([
                            'apply' => $apply,
                        ]);
                    endif;
                    Apply::where('id_internship', $id)->where('username_mhs',$mhs)->update([
                        'status' => "Ditolak",
                    ]);
                    return redirect()->route('mhsInternshipViews', [$id])->with('pesan', "Pengajuan $mhs Berhasil Ditolak");
                endif;
        else :
            abort(404);
        endif;
    }
}
