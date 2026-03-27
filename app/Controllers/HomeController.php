<?php
namespace App\Dev\Controllers;
use App\Dev\Core\Controller;
use App\Dev\Models\Usuario;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
       $this->view('home');
    }
}