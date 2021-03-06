<?php

namespace App\Http\Controllers;

use App\UserCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

/*объявление контроллера. Для работы контроллера используется подключенная библиотека Gloudemans.
Данный контроллер отвечает за работу корзины пользователя. А именно за добавление товара в сессионную
корзину пользователя, подсчёт количества товаров в корзине, подсчёт итоговой суммы заказа, возможность
убрать товар из корзины*/
class CartController extends Controller
{
    //объявление функции отображения страницы "Корзина"
    public function index()
    {
        //возвращение представление страницы "Корзина"
        return view('cart');
    }

    /*объявление функции добавление товара в корзину. Функция отвечает за добавления выбранного
    пользователем товара в сессионную корзину и за визуальное отображение товаров в корзине*/
    public function store(Request $request)
    {
        /*переменная в которую добавляется дублирующийся товар, то есть товар который уже лежит
        в корзине, но пользователь снова хочет его добавить*/
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        //если товар дублируется
        if ($duplicates->isNotEmpty()) {
            //перенаправляем пользователя на страницу "Корзина" с собщением о том, что товар уже добавлен
            return redirect()->route('cart.index')->with('success_message', 'Товар уже добавлен в корзину!');
        }
        //если товар не повторяется
        //добаляем товар со следующими полями из таблицы products: id, наименование, количество и цена
        Cart::add($request['id'], $request['name'], 1, $request['price'])
            ->associate('App\Products');
        //перенаправляем пользователя на страницу "Корзина" с собщением о том, что товар добавлен в корзину
        return redirect()->route('cart.index')->with('success_message', 'Товар добавлен в корзину');
    }

    /*объявление функции удаление товара из корзины. Функция отвечает за удаление выбранного
    пользователем товара из сессионной корзины*/
    public function destroy($id)
    {
        //удаляем выбранный пользователем товар из сессионной корзины пользователя
        Cart::remove($id);
        //перенаправляем пользователя на предыдущую страницу с собщением о том, что товар удалён из корзины
        return back()->with('success_message', 'Товар удалён из корзины');
    }
}
