<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class PostController extends Controller{

    private $headers;
    public function __construct() {
        $this->headers = [
            ['Content-Type' => 'application/json'],
            ['Authorization' => 'sipaatoken abc1234'],
            ['X-Header-One' => 'Header Value 1'],
            ['X-Header-Two' => 'Header Value 2']
        ];
    }

    public function index(){
        try{
            $db = Post::all();
            $content = [
                'status' => true,
                'code' => 200,
                'message' => 'success',
                'data' => $db
            ];
        } catch (Throwable $e) {
            $content = [
                'status' => false,
                'code' => 200,
                'message' => $e,
                'data' => null
            ];
        }
        return response($content, $content['code'], $this->headers);
    }

    public function store(Request $request){
        try{
            $fecha = Carbon::now();
            $data = [
                'autor' => $request->autor,
                'fecha' => $fecha->format('d-m-Y'),
                'titulo' => $request->titulo,
                'contenido' => $request->contenido,
                'fotobase64' => null,
                'created_at' => $fecha->format('d-m-Y H:i:s'),
                'updated_at' => $fecha->format('d-m-Y H:i:s'),
            ];
            $valida = Post::insertGetId($data);

            $content = [
                'status' => true,
                'code' => 200,
                'message' => 'success',
                'data' => $valida
            ];
        } catch (Throwable $e) {
            $content = [
                'status' => false,
                'code' => 200,
                'message' => $e,
                'data' => null
            ];
        }
        return response($content, $content['code'], $this->headers);
    }

    public function search(Request $request){
        try{
            if ($request->filtro == 1) {
                $db = Post::where('titulo', 'like', '%' . $request->search . '%')->get();
            }
            if ($request->filtro == 2) {
                $db = Post::where('contenido', 'like', '%' . $request->search . '%')->get();
            }
            if ($request->filtro == 3) {
                $db = Post::where('autor', 'like', '%' . $request->search . '%')->get();
            }            
            $content = [
                'status' => true,
                'code' => 200,
                'message' => 'success',
                'data' => $db
            ];
        } catch (Throwable $e) {
            $content = [
                'status' => false,
                'code' => 200,
                'message' => $e,
                'data' => null
            ];
        }
        return response($content, $content['code'], $this->headers);
    }
}