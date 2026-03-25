<?php

namespace App\Http\Controllers;

class RoomController extends Controller
{
    /**
     * Mostrar página de inicio
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Mostrar listado de habitaciones
     */
    public function index()
    {
        return view('rooms.index');
    }
}
