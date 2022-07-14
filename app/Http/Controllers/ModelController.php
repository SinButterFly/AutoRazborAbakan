<?php

namespace App\Http\Controllers;


use App\Brands;
use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/*объявление контроллера. Данный контроллер отвечает за работу Моделей.
Их отображение на сайте, создание, редактирование и удаление*/
class ModelController extends Controller
{
    /*объявление функции создания модели. Функция отвечает за добавления модели в базу данных и
    за его визуальное отображение на страницах сайта*/
    public function create_model(Request $request)
    {
        //если администратор добавляет модель
        if ($request->isMethod('post')){
            //обращаемся к таблице models в бд, с запросом на создание
            Models::query()->create([
                'model' => $request->model, //в поле "model" вставляем значение введённые администором
                //в поле "brand_id" вставляем выбранное значение id марки из списка
                'brand_id' => (int)$request->brand_id,
            ]);
            //перенаправляем администратора на страницу по управлению Моделями
            return redirect(route('models'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        /*в переменную сохраняем данные из таблицы models по 20 записей на страницу
        c отношением таблицей brands*/
        $models = Models::query()->with('model_brand')->paginate(20);
        //возвращаем представление страницы по управлению марками c данными из переменных models и brands
        return view('admin.models', compact('models', 'brands'));
    }

    /*объявление функции редактирование модели. Функция отвечает за редактирование
    выбранной модели и внесение изменений в базу данных*/
    public function edit_model(Request $request)
    {
        //если администратор редактирует марку
        if ($request->isMethod('post')){
            /*обращаемся к таблице models в бд, с запросом на обновление, где id из бд
            соответствует id редактируемой модели*/
            Models::query()->where('id', $request->id)->update([
                //в поле "model" вставляем значение введённые администором
                'model' => $request->model,
                //в поле "brand_id" вставляем выбранное значение id марки из списка
                'brand_id' => (int)$request->brand_id,
            ]);
            //перенаправляем администратора на страницу по управлению Моделями
            return redirect(route('models'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        /*в переменную сохраняем данные из таблицы models c отношением таблицей brands,
        где id из бд соответствует id редактируемой модели*/
        $models = Models::query()->with('model_brand')->where('id', $request->id)->get();
        //возвращаем представление страницы по управлению марками c данными из переменных models и brands
        return view('admin.edit_model', compact('models', 'brands'));
    }

    /*объявление функции удаления. Функция отвечает за удаление выбранной модели из базы данных*/
    public function delete_model(Request $request)
    {
        //запрос на удаление, где id из бд соответствует id выбранной модели
        Models::query()->where('id', $request->id)->with('model_brand')->delete();
        //перенаправляем администратора на страницу по управлению Моделями
        return redirect(route('models'));
    }
}
