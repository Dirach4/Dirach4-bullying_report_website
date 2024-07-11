<?php
namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function index()
    {
        $totalMasuk = Report::where('status', 'masuk')->count();
        $totalProses = Report::where('status', 'proses')->count();
        $totalSelesai = Report::where('status', 'selesai')->count();
        $totalUsers = User::count(); // Hitung total pengguna
        return view('dashboard', compact( 'totalMasuk', 'totalProses', 'totalSelesai','totalUsers'));
    }
    public function userindex()
    {
        return view('users');
    }

    

    

    public function usershow(Request $request)
    {
        $search = $request->input('table_search');
        if ($search) {
            $penggunas = User::where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->orWhere('jurusan', 'like', '%' . $search . '%')
                            ->orWhere('prodi', 'like', '%' . $search . '%')
                            ->orWhere('kelas', 'like', '%' . $search . '%')
                            ->orWhere('no_hp', 'like', '%' . $search . '%')
                            ->orderBy('id')
                            ->get();
        } else {
            $penggunas = User::orderBy('id')->get();
        }

        $total = User::count();
        return view('users', compact(['penggunas', 'total', 'search']));
    }
}