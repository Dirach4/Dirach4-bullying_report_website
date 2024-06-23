<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class HomePenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.dashboard');
    }
}