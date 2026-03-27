<?php
namespace App\Dev\Controllers\errors;

use App\Dev\Core\Controller;
use App\Dev\Traits\LoggerTrait;

class HttpErrorsController extends Controller
{
    use LoggerTrait;
    public function notFound($error_msg)
    {
        \http_response_code(404);
        $this->log("Rota inexistente. Detalhe: $error_msg");
        $this->view('errors_pages/404');
    }
}