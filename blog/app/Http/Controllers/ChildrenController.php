<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    // Buscar todos los objetos en BBDD
    public function index()
    {
        return Child::with('usuario')->get();
    }
}
