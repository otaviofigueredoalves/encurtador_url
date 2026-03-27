<?php
namespace App\Dev\Controllers;

use App\Dev\Core\Controller;
use App\Dev\Core\Request;
use App\Dev\Models\UrlModel;

class UrlController extends Controller
{
    public function convert($code_url = '')
    {
        $dados = [];
        if(!empty($code_url)){
            $model = new UrlModel();
            $dados = $model->getUrl($code_url);
            if(!empty($dados)){
                $urlDestino = $dados['url'];
                // dd($urlDestino);
                Header("Location:".$urlDestino, true, 301);
                exit;
            } else {
                return;
            }
        }
        $request = new Request();
        
        if($request->method() === 'POST'){
            $url = $request->input('url_input');
            $code = $this->generateRandomCode();
            // dd($code);
            $model = new UrlModel();
            $model->setUrl($url, $code);
            $dados = $model->getUrl($code);
            
        }

        $this->view('home',$dados);
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