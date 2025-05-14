<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Service\PostService;

//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}