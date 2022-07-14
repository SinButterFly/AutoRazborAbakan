<?php

namespace App\Http\Controllers;

use App\Brands;
use Illuminate\Http\Request;

/*объявление контроллера. Данный контроллер отвечает за работу Марок.
Их отображение на сайте, создание, редактирование и удаление*/
class BrandController extends Controller
{
    /*объявление функции создания бренда. Функция отвечает за добавления бренда в базу данных и
    за его визуальное отображение на страницах сайта*/
    public function create_brand(Request $request)
    {
        //если администратор добавляет марку
        if ($request->isMethod('post')){
            //переменеая хранит фотографию
            $photo = $request->file('photo');
            //переменная хранит полное имя фотографии
            $photo_name = asset('img/'.$photo->getClientOriginalName());
            //обращаемся к таблице products в бд, с запросом на создание
            //обращаемся к таблице brands в бд, с запросом на создание
            Brands::create([
                'photo' => $photo_name, //в поле "photo" вставляем значение из переменной photo_name
                'brand' => $request->brand, //в поле бд "brand" вставляем введёное администратором значение
            ]);
            //сохраняем фотографию из переменной photo в локальную папку с изображениями
            $photo->move(public_path('/img'),$photo->getClientOriginalName());
            //перенаправляем администратора на страницу по управлению Марками
            return redirect(route('brands'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands по 20 записей на страницу
        $brands = Brands::query()->paginate(20);
        //возвращаем представление страницы по управлению марками c данными из переменной brands
        return view('admin.brands', compact('brands'));
    }

    /*объявление функции редактирование марки. Функция отвечает за редактирование
    выбранной марки и внесение изменений в базу данных*/
    public function edit_brand(Request $request)
    {
        //если администратор редактирует марку
        if ($request->isMethod('post')){
            /*обращаемся к таблице brands в бд, с запросом на обновление, где id из бд
            соответствует id редактируемой марки*/
            Brands::query()->where('id', $request->id)->update([
                'brand' => $request->brand, //в поле бд "brand" вставляем изменённое администратором значение
            ]);
            //перенаправляем администратора на страницу по управлению Марками
            return redirect(route('brands'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands, где id из бд соответствует id редактируемой марки
        $brands = Brands::query()->where('id', $request->id)->get();
        //возвращаем представление страницы по управлению марками c данными из переменной brands
        return view('admin.edit_brand', compact('brands'));
    }

    /*объявление функции удаления. Функция отвечает за удаление выбранной марки из базы данных*/
    public function delete_brand(Request $request)
    {
        //запрос на удаление, где id из бд соответствует id выбранной марки
        Brands::query()->where('id', $request->id)->delete();
        //перенаправляем администратора на страницу по управлению Марками
        return redirect(route('brands'));
    }

}
