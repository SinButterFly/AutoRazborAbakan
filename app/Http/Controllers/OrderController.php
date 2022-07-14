<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerOrder;
use App\UserCart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

/*объявление контроллера. Данный контроллер отвечает за работу Заказа.
Сохранение пользователя в бд, когда он оформил заказ, добавление записей в промежуточную
таблицу orders для таблиц products и customers со связью многие ко многим*/
class OrderController extends Controller
{
    /*объявление функции создания заказа. Функция отвечает за добавления заказа в базу данных и
    за его визуальное отображение на страницах сайта*/
    public function store(Request $request)
    {
        //проверка на валидацию введённых пользователем данных
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required',
        ]);
        //переменная хранит созданные данные в таблице customers
        $customer = Customer::query()->create([
            //в поле бд "phone" вставляем введёное пользователем значение
            'phone' => $request->phone,
            //в поле бд "name" вставляем введёное пользователем значение
            'name' => $request->name,
        ]);
        //цикл по количеству товаров в корзине
        foreach (Cart::content() as $item) {
            //обращаемся к таблице orders в бд, с запросом на создание
            CustomerOrder::query()->create([
                //в поле бд "product_id" вставляем id товара из корзины
                'product_id' => $item->id,
                //в поле бд "customer_id" вставляем id пользователя, который оформляет заказ
                'customer_id' => $customer->id,
            ]);
        }
        //после создания заказа очищаем корзину пользователя
        Cart::destroy();
        //перенаправляем пользователя на главную страницу
        return redirect()->back()->with('success_message', 'Заказ успешно сформирован!');
    }

    /*объявление функции показа списка заказов. Функция отвечает за создание списка всех заказов*/
    public function show()
    {
        //переменная хранит данные из таблицы customers по 20 записей на страницу, сортированные по убыванию
        $orders = Customer::query()->orderByDesc('id')->paginate(20);
        //возвращаем представление страницы "панель управления" c данными из переменной orders
        return view('admin.panel', compact('orders'));
    }

    /*объявление функции показа заказа. Функция отвечает за формирования представления выбранного заказа*/
    public function show_order(Request $request)
    {
        /*переменная хранит данные из таблицы customers с отношением с таблицей product, где id из бд
        соответствует id выбранного заказа*/
        $orders = Customer::query()->with('products')->where('id', $request->id)->get();
        //возвращаем представление страницы "панель управления" c данными из переменной orders
        return view('admin.order', compact('orders'));
    }

}
