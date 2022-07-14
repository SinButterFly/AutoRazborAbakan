<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*объявление контроллера. Данный контроллер отвечает за определение администратора
в текущей сессии.*/
class AdminController extends Controller
{
    /*объяевление функции для авторизации. Функция отвечает за авторизацию администратора
    в сети. Авторизация необходима для наделения администратора правами необходимыми для управления сайтом*/
    public function auth(Request $request)
    {
        //введённые данные проходят валидацию на ввод.
        if($request->isMethod('post')){
            //проверка валидности данных
            $this->validate($request, [
                'login' => 'required|alpha_dash',
                'password' => 'required',
            ]);
            //пароль, который захеширован проверяется на соответствие с ведённым паролем.
            $password = Hash::check($request['password'], User::query()->get('password'));
            //проверяется соответствие введённых данных на наличие в базе данных.
            $user = User::where('login',$request['login'])->where('password',$password)->first();
            //Если есть соответствие система запоминает сессию и перенаправляет администратора на палнель управления
            if($user){
                auth()->login($user);
                return redirect(route('panel_page'));
            }
        }
        //при загрузке страницы
        //возвращение представления страницы авторизации
        return view('admin.auth');
    }

    //объяевление функции для выхода из аккаунта. Функция отвечает за прекращения деятельности администратора на сайте
    public function logout()
    {
        //обращаемся к текущей сессии и закрываем её
        auth()->logout();
        //перенаправляем пользователя на главную страницу
        return redirect(route('index_page'));
    }
}
