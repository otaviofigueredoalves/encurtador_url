<?php
namespace App\Dev\Core;

use App\Dev\Controllers\errors\HttpErrorsController;
use App\Dev\Controllers\UrlController;
use Exception;

class Router
{
    public function dispatch($url)
    {
        try{
            $request = new Request();
            if($request->method() === 'POST' && empty($request->input('url_input'))){
                $this->httpError('notFound');
                exit;
            }
            $url = trim($url,'/');
            $parts = $url ? explode('/',$url) : [];
            // dd($parts);
            $controller_name = $parts[0] ?? 'Home';
            // dd($controller_name);
            $controller_name = 'App\Dev\Controllers\\'. ucfirst($controller_name).'Controller';
            // dd($controller_name);
            if(class_exists($controller_name)){
                $method = $parts[1] ?? 'index';

                $controller = new $controller_name();
                
                if(!method_exists($controller, $method)){
                    // $this->httpError('notPermission');
                    return;
                }
                $params = array_slice($parts,2);
                call_user_func_array([$controller,$method],$params);
            } else {
                $controller = new UrlController();
                $code = $parts[0];
                // dd($code);
                $controller->convert($code);
                $this->httpError('notFound',$controller_name);
                return;
            }
        } catch (\Exception $e){
            // $this->httpError('notServer', $e->getMessage());
            echo $e->getMessage();
        }
    }

    private function httpError($error, $error_message = NULL)
    {
        $controller = new HttpErrorsController();
        /** Pra economizar RAM, é melhor usar o debug_backtrace com o parâmetro DEBUG_BACKTRACE_IGNORE_ARGS,2, pois o debug_backtrace() faz um raio x completo de tudo que está rodando naquele milissegundo, o que acaba se tornando pesado em ambiente em produção. */
        $trace = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS,2);
        $linha = $trace[0]['line'];
        // dd($trace);
        $error_message = "ROTA: $error_message | " . "LINHA: ". $linha;
        $controller->$error($error_message);
    }
}