<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

/*объявление контроллера. Данный контроллер отвечает за работу Категорий.
Их отображение на сайте, создание, редактирование и удаление*/
class CategoryController extends Controller
{
    /*объявление функции создания категории. Функция отвечает за добавление категории в базу данных и
за её визуальное отображение на страницах сайта*/
    public function create_category(Request $request)
    {
        //если администратор добавляет марку
        if ($request->isMethod('post')){
            //обращаемся к таблице categories в бд, с запросом на создание
            Category::query()->create([
                'category' => $request->category, //в поле бд "category" вставляем введёное админимтратором значение
            ]);
            //перенаправляем администратора на страницу по управлению Категориями
            return redirect(route('categories'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы categories по 20 записей на страницу
        $categories = Category::query()->paginate(20);
        //возвращаем представление страницы по управлению Категориями c данными из переменной categories
        return view('admin.categories', compact('categories'));
    }

    /*объявление функции редактирование категории. Функция отвечает за редактирование
выбранной категории и внесение изменений в базу данных*/
    public function edit_category(Request $request)
    {
        //если администратор редактирует категорию
        if ($request->isMethod('post')){
            /*обращаемся к таблице categories в бд, с запросом на обновление, где id из бд
            соответствует id редактируемой категории*/
            Category::query()->where('id', $request->id)->update([
                'category' => $request->category, //в поле бд "category" вставляем введёное админимтратором значение
            ]);
            //перенаправляем администратора на страницу по управлению Категориями
            return redirect(route('categories'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы categories, где где id из бд соответствует id редактируемой категории
        $categories = Category::query()->where('id', $request->id)->get();
        //возвращаем представление страницы по управлению Категориями c данными из переменной categories
        return view('admin.edit_category', compact('categories'));
    }

    /*объявление функции удаления. Функция отвечает за удаление выбранной категории из базы данных*/
    public function delete_category(Request $request)
    {
        //запрос на удаление, где id из бд соответствует id редактируемой категории
        Category::query()->where('id', $request->id)->delete();
        //перенаправляем администратора на страницу по управлению Категориями
        return redirect(route('categories'));
    }
}
