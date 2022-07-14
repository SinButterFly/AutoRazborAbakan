<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedBackMail;

//контроллер который отвечает за отправку формы обратной связи на почту сайта
class MailController extends Controller
{
    /*функция отпаравки. Содержимое в форме "Обратная связь" отправляется на почту
    сайта. Отправление письма устроено так, что система отправляет его сама себе.
    Содержание письма являются данные введённые пользователем в форме*/
    public function send(Request $request) {
        //Ограничение пользовательского ввода
        $this->validate($request, [
            'user_name' => 'required|max:255', //валидация имени пользователя
            'email' => 'required|email|max:255', //валидация почты пользователя
            'phone' => 'required', //валидация номера телефона пользователя
            'text' => 'required', //валидация сообщения пользователя
        ]);

        //указываем имя адресатора письма
        $to_name = 'Авторазбор Абакан';
        //указываем почту на котрые будут приходить письма
        $to_email = 'avtorazborabakan@gmail.com';
        //данные, которые ввёл пользователь
        $data = array ('name' => $request->user_name,
            'body' => $request->text, //сообщение пользователя
            'phone' => $request->phone, //номер телефона
            'email' => $request->email, //почта пользователя
        );
        //отправка на почту компании
        Mail::send('mail.feedback', $data, function ($message) use ($to_name, $to_email){
            //данные кому отправляется письмо
            $message->to($to_email, $to_name)->subject('Письмо от Авторазбор Абакан');
            //данные от кого отправляется письмо
            $message->from('avtorazborabakan@gmail.com', 'Авторазбор Абакан');
        });
        //автоматическое возвращения пользователя на главную страницу
        return redirect()->back();
    }
}
