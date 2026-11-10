<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//definicion basica de rutas
route ::get('/hola',function(){
    $nombre = 'Nicolas';
    return "Hola, Laravel {$nombre}";
});
//Paranetros en las rutas
    //Parametros requeridos
/*route :: get ('/usuario/{nombre?}', function($nombre="Default"){
    return "Usuario: $nombre";
});*/
//Parametros con valores por defecto
route :: get ('/usuario/{nombre?}', function($nombre="Default"){
    return "Usuario: $nombre";
});
//Redirigir rutas
route:: redirect('/ruta-anterior','ruta-nueva');
/*
route::get('/ruta-nueva', function(){
    return "Ruta nueva";
});*/ 

//env():permite obtener las variables de entorno
route:: get('/db',function(){
    return env('DB_CONNECTION');
    
});

//dd(): depuracion rapida

route :: get ('dd', function(){
    $nombre="Edgar";
    dd($nombre);
});

route :: get('/app',function(){
    return config('app.timezone');
});

route:: view('/producto','almacen.producto');
/*Pasar parametros
1 parametro
route::get('/producto1',function(){
    return view('Almacen.producto1',['nombre'=> 'impresora Lexmark MS610']);
});
//2 parametros
route::get('/producto1',function(){
    return view('Almacen.producto1',['nombre'=> 'impresora Lexmark MS610', 'marca' => 'Lexmark']);
});
*/
route::get('condicional/{nota}',function($nota){
    return view('estructuras.condicional',compact('nota'));
});
route :: get('dia/{numero}',function($numero){
    return view('estructuras.switch',compact('numero'));
});
route :: get('ciclo/{numero}',function($numero){
    return view('estructuras.while',compact('numero'));
});
route :: get('foreach',function(){
    $lista=["Ram","SSD","RTX","CPU"];
    return view('estructuras.foreach',compact('lista'));
});
Route :: get('query',function(){
    $productos = DB::table ('productos')-> get();
    return $productos;
});
Route :: get('find',function(){
    $productos = DB::table ('productos')-> first();
    return $productos;
});
Route :: get('filtro1',function(){
    $productos = DB::table ('productos')-> where('precio','2500')
    ->where('descripcion','LIKE','Y%')->get();
    return $productos;
});

Route :: get('filtro2',function(){
    $productos = DB::table ('productos')
    -> select('codigo','descripcion','created_at')
    ->whereNull('created_at')->get();
    return $productos;
});
Route :: get('filtro3',function(){
    $productos = DB::table ('productos')
    -> select('codigo','descripcion','created_at')
    ->whereNotNull('created_at')->get();
    return $productos;
});
Route :: get('filtro4',function(){
    $productos = DB::table ('productos')
    -> select('codigo','descripcion','precio')
    ->whereIn('codigo',[3,5,6])->get();
    return $productos;
});
Route :: get('filtro5',function(){
    $productos = DB::table ('productos')
    -> select('codigo','descripcion','precio')
    ->whereNotIn('codigo',[3,4])->get();
    return $productos;
});

Route :: get('filtro6',function(){
    $productos = DB::table ('productos')
    -> select('codigo','descripcion','precio')
    ->whereBetween('precio',[2500,20000])->get();
    return $productos;
});
Route::get('join', function(){
$productos= DB::table('productos')
->join('categoria', 'productos.categoria_codigo','=','categoria.codigo')
->select ('productos.codigo', 'productos.descripcion', 'productos.precio','categoria.nom_categoria')
->get();
return $productos;
});