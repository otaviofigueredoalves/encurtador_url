<?php
namespace App\Dev\Controllers;

use App\Dev\Core\Controller;
use App\Dev\Core\Request;
use App\Dev\Models\UrlModel;
use Exception;

class UrlController extends Controller
{
    protected $UrlModel;
    public function __construct()
    {
        $this->UrlModel = new UrlModel();
    }

    public function index($code = [])
    {
            // dd($code);
        $dados = [
            'url_simplify' => $this->UrlModel->getUrl($code),
            'urls_list' => $this->UrlModel->listAllUrls()
        ];
        // dd($dados);
        $this->view('home',$dados);   
    }
    public function convert()
    {
        $request = new Request();
        
        if($request->method() === 'POST' && !empty($request->input('url_input'))){
            $url = $request->input('url_input');
            $code = $this->generateRandomCode();
            $this->UrlModel->setUrl($url, $code);
            $this->index($code);
        } else {
            throw new Exception("Problema no método convert()");
        }

        $this->index();
    }

    public function redirect($url)
    {
        $data = $this->UrlModel->getUrl($url); 

        if(!empty($data)){
            $url_destino = $data['url']; 
            Header("Location:".$url_destino, true, 301);
            exit;
        } else {
           return false;
        }
    }

    private function generateRandomCode($tamanho = 6)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_list = \str_split($caracteres);
        $code = '';

        for($i = 0; $i < $tamanho; $i++){
            $random_key = \array_rand($chars_list);
            $char = $chars_list[$random_key];
            $code.=$char;
        }

        return $code;
    }
}