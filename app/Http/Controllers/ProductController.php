<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'barcode' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'supplier' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = str_replace('public/', '', $imagePath);
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Request $request)
    {
        $selectedCategory = $request->input('category');
        $categories = Product::distinct('category')->pluck('category');

        $products = Product::when($selectedCategory, function ($query) use ($selectedCategory) {
            return $query->where('category', $selectedCategory);
        })->get();

        // Obtener los productos en el carrito
        $cart = session('cart', []);

        // Contar la cantidad de productos en el carrito
        $cartCount = count($cart);

        return view('products.show', compact('products', 'categories', 'selectedCategory', 'cartCount'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'barcode' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'supplier' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function cart($productId)
    {
        $product = Product::find($productId);

        // Verificar si el producto existe
        if (!$product) {
            return redirect()->back()->with('error', 'El producto seleccionado no existe.');
        }

        // Limpiar el carrito
        session(['cart' => []]);

        // Agregar el producto al carrito en la sesión
        $cartItems = [
            $product->id => [
                'quantity' => 1,
            ],
        ];
        session(['cart' => $cartItems]);

        // Obtener los detalles completos del producto en el carrito
        $cartData = [];
        $quantity = $cartItems[$product->id]['quantity'];
        $subtotal = $product->price * $quantity;
        $cartData[] = [
            'product' => $product,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
        ];

        $cartCount = $quantity;

        return view('products.cart', compact('cartData', 'cartCount'));
    }

public function updateCart(Request $request)
{
    $productId = $request->input('product');
    $action = $request->input('action');

    // Obtener el carrito actual de la sesión
    $cartItems = session('cart', []);

    // Verificar si el producto existe en el carrito
    if (array_key_exists($productId, $cartItems)) {
        $quantity = $cartItems[$productId]['quantity'];

        if ($action === 'decrease') {
            // Decrementar la cantidad en 1 si es mayor que 1
            if ($quantity > 1) {
                $cartItems[$productId]['quantity'] = $quantity - 1;
            }
        } elseif ($action === 'increase') {
            // Incrementar la cantidad en 1
            $cartItems[$productId]['quantity'] = $quantity + 1;
        }

        // Actualizar el carrito en la sesión
        session(['cart' => $cartItems]);

        // Obtener el producto actualizado
        $product = Product::find($productId);

        // Calcular el subtotal
        $subtotal = $product->price * $cartItems[$productId]['quantity'];

        // Devolver la respuesta en formato JSON
        return response()->json([
            'quantity' => $cartItems[$productId]['quantity'],
            'subtotal' => $subtotal,
        ]);
    }

    // Si el producto no existe en el carrito, simplemente devolver una respuesta vacía o un mensaje de error si lo prefieres
    return response()->json([]);
}

public function add(Request $request)
{
    $productId = $request->input('product');
    $product = Product::find($productId);

    // Verificar si el producto existe
    if (!$product) {
        return redirect()->back()->with('error', 'El producto seleccionado no existe.');
    }

    // Agregar el producto al carrito
    $cartItems = session()->get('cart', []);
    if (isset($cartItems[$productId])) {
        // Si el producto ya está en el carrito, incrementar la cantidad
        $cartItems[$productId]['quantity']++;
    } else {
        // Si el producto no está en el carrito, agregarlo con una cantidad inicial de 1
        $cartItems[$productId] = [
            'quantity' => 1,
        ];
    }

    // Guardar los elementos del carrito en la sesión
    session()->put('cart', $cartItems);

    return redirect()->route('cart.index')->with('success', 'El producto se ha agregado al carrito.');
}

public function decrease($product)
{
    $cart = session('cart', []);

    if (isset($cart[$product])) {
        $cart[$product]['quantity']--;

        if ($cart[$product]['quantity'] <= 0) {
            unset($cart[$product]);
        }

        session(['cart' => $cart]);
    }

    return redirect()->route('cart');
}

public function increase($product)
{
    $cart = session('cart', []);

    if (isset($cart[$product])) {
        $cart[$product]['quantity']++;

        session(['cart' => $cart]);
    }

    return redirect()->route('cart');
}

public function count()
{
    $count = session('cart.count') ?? 0;
    return view('products.count', compact('count'));
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
