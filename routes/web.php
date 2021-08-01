<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');
*/

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('verified');

Route::get('mensagem-teste', function () {
    return new MensagemTesteMail();
    // Mail::to('matheus.cbmdk@gmail.com')->send(new MensagemTesteMail());
    // return 'E-mail enviado com sucesso!';
});

/*
necessario editar para permitir envio de emails
vendor\swiftmailer\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php

establishSocketConnection()

$options['ssl']['verify_peer'] = FALSE;
$options['ssl']['verify_peer_name'] = FALSE;
*/