<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "PrincipalController@principal")->name('site.index');

Route::get('/sobre-nos', "SobreNosController@sobrenos")->name('site.sobrenos');

Route::get('/contato', "ContatoController@contato")->name('site.contato');
Route::post('/contato', "ContatoController@salvar")->name('site.contato');

Route::get('/login/{erro?}', "LoginController@index")->name('site.login');
Route::post('/login', "LoginController@autenticar")->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function() {

    Route::get('/home', 'HomeController@index')->name('app.home');

    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');

    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produtos
    Route::resource('produto', 'ProdutoController');

    //produtos detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    //cliente
    Route::resource('cliente', 'ClienteController');

    //pedido
    Route::resource('pedido', 'PedidoController');

    //pedido-produto
    // Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    // Route::delete('pedido-produto/destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('pedido-produto/destroy/{pedidoProduto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});


Route::fallback(function() {
    return 'A rota solicitada não existe, <a href="'.route('site.index').'">clique aqui</a>';
});
