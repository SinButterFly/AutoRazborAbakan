<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use App\Models;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*объявление контроллера. Данный контроллер отвечает за работу Товаров.
Их отображение на сайте, создание, редактирование и удаление*/
class ProductController extends Controller
{
    /*объявление функции создания товара. Функция отвечает за добавления товара в базу данных и
за его визуальное отображение на страницах сайта*/
    public function create_product(Request $request)
    {
        //если администратор добавляет товар
        if ($request->isMethod('post')){
            //переменеая хранит фотографию
            $photo = $request->file('photo');
            //переменная хранит полное имя фотографии
            $photo_name = asset('img/'.$photo->getClientOriginalName());
            //обращаемся к таблице products в бд, с запросом на создание
            Products::create([
                //в поле "brand_id" вставляем значение id из списка марок
                'brand_id' => (int)$request->brand_id,
                //в поле "model_id" вставляем значение id из списка моделей
                'model_id' => (int)$request->model_id,
                //в поле "category_id" вставляем значение id из списка категорий
                'category_id' => (int)$request->category_id,
                //в поле "photo" вставляем значение из переменной photo_name
                'photo' => $photo_name,
                //в поле "name" вставляем значение из введённое администором
                'name' => $request->name,
                //в поле "vendor_code" вставляем значение из введённое администором
                'vendor_code' => $request->vendor_code,
                //в поле "count" вставляем значение из введённое администором
                'count' => $request->count,
                //в поле "description" вставляем значение из введённое администором
                'description' => $request->description,
                //в поле "price" вставляем значение из введённое администором
                'price' => $request->price,
            ]);
            //сохраняем фотографию из переменной photo в локальную папку с изображениями
            $photo->move(public_path('/img'),$photo->getClientOriginalName());
            //перенаправляем администратора на страницу по управлению Товарами
            return redirect(route('products'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        //в переменную сохраняем данные из таблицы models
        $models = Models::query()->get();
        //в переменную сохраняем данные из таблицы categories
        $categories = Category::query()->get();
        /*в переменную сохраняем данные из таблицы products по 20 записей на страницу
c отношением таблицей brands, models и categories*/
        $products = Products::query()->with('brand')->with('model')->with('category')->paginate(20);
        //возвращаем представление страницы по управлению товарами c данными из переменных products, categories, models и brands
        return view('admin.products', compact('products','models', 'brands', 'categories'));
    }

    /*объявление функции редактирование товара. Функция отвечает за редактирование
выбранного товара и внесение изменений в базу данных*/
    public function edit_product(Request $request)
    {
        //если администратор редактирует товар
        if ($request->isMethod('post')){
            //переменеая хранит фотографию
            $photo = $request->file('photo');
            //переменная хранит полное имя фотографии
            $photo_name = asset('img/'.$photo->getClientOriginalName());
            //обращаемся к таблице products в бд, с запросом на обновление*/
            Products::query()->where('id', $request->id)->update([
                //в поле "brand_id" вставляем значение id из списка марок
                'brand_id' => (int)$request->brand_id,
                //в поле "model_id" вставляем значение id из списка моделей
                'model_id' => (int)$request->model_id,
                //в поле "category_id" вставляем значение id из списка категорий
                'category_id' => (int)$request->category_id,
                //в поле "photo" вставляем значение из переменной photo_name
                'photo' => $photo_name,
                //в поле "name" вставляем значение из введённое администором
                'name' => $request->name,
                //в поле "vendor_code" вставляем значение из введённое администором
                'vendor_code' => $request->vendor_code,
                //в поле "count" вставляем значение из введённое администором
                'count' => $request->count,
                //в поле "description" вставляем значение из введённое администором
                'description' => $request->description,
                //в поле "price" вставляем значение из введённое администором
                'price' => $request->price,
            ]);
            //сохраняем фотографию из переменной photo в локальную папку с изображениями
            $photo->move(public_path('/img'),$photo->getClientOriginalName());
            //перенаправляем администратора на страницу по управлению Товарами
            return redirect(route('products'));
        }
        //выполняется при загрузке страницы
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        //в переменную сохраняем данные из таблицы models
        $models = Models::query()->get();
        //в переменную сохраняем данные из таблицы categories
        $categories = Category::query()->get();
        /*в переменную сохраняем данные из таблицы products c отношением таблицей brands, models и categories,
        где id из бд соответствует id редактируемого товара*/
        $products = Products::query()
            ->with('brand')
            ->with('model')
            ->with('category')
            ->where('id', $request->id)
            ->get();
        //возвращаем представление страницы редактирование товара с данными из переменных products, categories, models и brands
        return view('admin.edit_product', compact('products','models', 'brands', 'categories'));
    }

    /*объявление функции показа списка товаров. Функция отвечает за создание списка товаров*/
    public function show_products($brand)
    {
        //если выбрана какая-нибудь категория для фильтрации
        if (request()->get('category')){
            //получение наименование категории
            $checked = $_GET['category'];
            //выборка подходящих товаров по фильтраци
            $products = Products::query()->whereIn('category_id',$checked)
                ->where('brand_id', $brand)
                ->paginate(16);
        }
        //если не выбрана ни одна котегория для фильтрации
        else{
            //из таблицы products бд берём все товары
            $products = Products::query()
                ->where('brand_id', $brand)
                ->with('brand')
                ->with('model')
                ->paginate(16);
        }
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        //в переменную сохраняем данные из таблицы categories
        $categories = Category::query()->get();
        //возвращаем представление страницы каталога с данными из переменных products, categories и brands
        return view('products.shop_brand', compact('brands', 'categories', 'products'));
    }

    /*объявление функции показа списка марок. Функция отвечает за создание списка марок для
    фильтрации по конктретной марке автомобиля*/
    public function show_products_brands()
    {
        //в переменную сохраняем данные из таблицы brands
        $brands = Brands::query()->get();
        //возвращаем представление страницы каталога с данными из переменной brands
        return view('products.catalog', compact('brands'));
    }

    /*объявление функции показа подробной информации о товаре. Функция отвечает за формирование страницы
    выбранного товара с подробной информацией*/
    public function product_more(Request $request)
    {
        /*в переменную сохраняем данные из таблицы products c отношением таблицей brands, models,
где id из бд соответствует id выбранного товара*/
        $products = Products::query()->with('brand')->with('model')->where('id', $request->id)->get();
        //возвращаем представление страницы выбранного товара с данными из переменной products
        return view('products.product', compact('products'));
    }

    public function delete_product(Request $request)
    {
        //запрос на удаление, где id из бд соответствует id выбранной модели
        Products::query()
            ->with('brand')
            ->with('model')
            ->with('category')
            ->where('id', $request->id)
            ->delete();
        //перенаправляем администратора на страницу по управлению Моделями
        return redirect(route('products'));
    }
}
