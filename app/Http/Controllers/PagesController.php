<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Product;
use App\Service;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription($this->data->description);
        $sections   = $page->sections;
        $sliders    = $sections->where('name', 'section_1')->first()->contents;
        $distributor= $sections->where('name', 'section_2')->first()->contents()->first();
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('sliders', 'categories', 'distributor'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('empresa');
        SEO::setDescription($this->data->description);
        $sections = $page->sections;
        $sliders = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        return view('paginas.empresa', compact('sliders', 'section2'));
    }


    public function categorias()
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('paginas.categorias', compact('categories'));
    }

    public function categoria($id)
    {
        $element = Category::findOrFail($id);
        $categories = Category::orderBy('order', 'ASC')->get();
        $products = $element->products;
        SEO::setTitle($element->name);
        return view('paginas.categoria', compact('element', 'products', 'categories'));
    }

    public function producto($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('order', 'ASC')->get();
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));
        return view('paginas.producto', compact('product', 'categories'));
    }

    public function servicios()
    {
        $page = Page::where('name', 'servicios')->first();
        SEO::setTitle('servicios');
        SEO::setDescription($this->data->description);
        $services = Service::orderBy('order', 'ASC')->get();
        return view('paginas.servicios', compact('services'));
    }

    public function solicitudDePresupuesto()
    {
        $page = Page::where('name', 'solicitudad-presupuesto')->first();
        SEO::setTitle("solicitud de presupuesto");
        SEO::setDescription($this->data->description);
        return view('paginas.solicitud-de-presupuesto');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        SEO::setDescription($page->keywords);      
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->data_sheet);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->data_sheet))
            Storage::disk('public')->delete($product->data_sheet);

        $product->data_sheet = null;
        $product->save();

        return response()->json([], 200);
    }
}
