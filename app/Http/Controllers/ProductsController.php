<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Question;
use App\Models\Review;




class ProductsController extends Controller
{
    
    public function showAllProducts(Category $category, Subcategory $subcategory) {

        $query = request()->query();
    
        $page = is_numeric(request()->query('page')) && strpos(request()->query('page'), ".") == false && request()->query('page') > 0;

            if($query == ['sort' => 'asc', 'order' => 'price'] || $query == ['sort' => 'asc', 'order' => 'price', 'page' => $page]) {
                $products = $this->sortByPriceAsc($subcategory);
            } else if($query == ['sort' => 'desc', 'order' => 'price'] || $query == ['sort' => 'desc', 'order' => 'price', 'page' => $page]) {
                $products = $this->sortByPriceDesc($subcategory);
            } else if($query == ['sort' => 'asc', 'order' => 'name'] || $query == ['sort' => 'asc', 'order' => 'name', 'page' => $page]) {
                $products = $this->sortByNameAsc($subcategory);
            } else if($query == ['sort' => 'desc', 'order' => 'name'] || $query == ['sort' => 'desc', 'order' => 'name', 'page' => $page]) {
                $products = $this->sortByNameDesc($subcategory);
            } else if($query == ['price' => '0-300'] || $query == ['price' => '0-300', 'page' => $page] || $query == ['price' => '300-900'] || $query == ['price' => '300-900', 'page' => $page] || $query ==['price' => '900-'] || $query == ['price' => '900-', 'page' => $page]) {
                $products = $this->sortByPriceRange($subcategory); 
            } else if($query == ['sort' => 'asc', 'order' => 'price', 'price' => '0-300'] || $query == ['sort' => 'asc', 'order' => 'price', 'price' => '0-300', 'page' => $page] || $query == ['sort' => 'asc', 'order' => 'price', 'price' => '300-900'] || $query == ['sort' => 'asc', 'order' => 'price', 'price' => '300-900', 'page' => $page] || $query == ['sort' => 'asc', 'order' => 'price', 'price' => '900-'] || $query == ['sort' => 'asc', 'order' => 'price', 'price' => '900-', 'page' => $page]) {
                $products = $this->sortByPriceAndPriceRangeAsc($subcategory);
            } else if($query == ['sort' => 'desc', 'order' => 'price', 'price' => '0-300'] || $query == ['sort' => 'desc', 'order' => 'price', 'price' => '0-300', 'page' => $page] || $query == ['sort' => 'desc', 'order' => 'price', 'price' => '300-900'] || $query == ['sort' => 'desc', 'order' => 'price', 'price' => '300-900', 'page' => $page] || $query == ['sort' => 'desc', 'order' => 'price', 'price' => '900-'] || $query == ['sort' => 'desc', 'order' => 'price', 'price' => '900-', 'page' => $page]) {
                $products = $this->sortByPriceAndPriceRangeDesc($subcategory);
            } else if($query == ['sort' => 'asc', 'order' => 'name', 'price' => '0-300'] || $query == ['sort' => 'asc', 'order' => 'name', 'price' => '0-300', 'page' => $page] || $query == ['sort' => 'asc', 'order' => 'name', 'price' => '300-900'] || $query == ['sort' => 'asc', 'order' => 'name', 'price' => '300-900', 'page' => $page] || $query == ['sort' => 'asc', 'order' => 'name', 'price' => '900-'] || $query == ['sort' => 'asc', 'order' => 'name', 'price' => '900-', 'page' => $page]) {
                $products = $this->sortByNameAndPriceRangeAsc($subcategory);
            } else if($query == ['sort' => 'desc', 'order' => 'name', 'price' => '0-300'] || $query == ['sort' => 'desc', 'order' => 'name', 'price' => '0-300', 'page' => $page] || $query == ['sort' => 'desc', 'order' => 'name', 'price' => '300-900'] || $query == ['sort' => 'desc', 'order' => 'name', 'price' => '300-900', 'page' => $page] || $query == ['sort' => 'desc', 'order' => 'name', 'price' => '900-'] || $query == ['sort' => 'desc', 'order' => 'name', 'price' => '900-', 'page' => $page]) {
                $products = $this->sortByNameAndPriceRangeDesc($subcategory);
            } else if($query == ['page' => request()->query('page')] && $page) {
                $products = Product::where('subcategory_id', $subcategory->id)->paginate(6);
            } else if(empty(request()->query())) {
                $products = Product::where('subcategory_id', $subcategory->id)->paginate(6);
            } else {
                return abort('404');
            }

            if(!$products->count()) {

                $collection = collect($query);

                if($collection->has('page') && $collection->count() > 1) {

                    $collection->forget('page');

                    $collection = $collection->all();

                    $arr_cat_sub = collect(['category' => $category->slug, 'subcategory' => $subcategory->slug]);

                    $collection = $arr_cat_sub->merge($collection);

                    $collection = $collection->all();

                    return redirect()->route('category.subcategory.show',  $collection);

                } 

                return abort('404');

            }

        return view('products.index', compact('products', 'category', 'subcategory'));
        
    }

    public function showOneProduct(Product $product) {

        $question = Question::where('product_id', $product->id)->where('confirmed', 1)->get();

        $review = Review::where('product_id', $product->id)->where('confirmed', 1)->get();

        return view('product.index', compact('product', 'question', 'review'));

    }

    public function showCategorySubcategories(Category $category) {

        $subcategories = Subcategory::where('category_id', $category->id)->get();

        return view('categories.index', compact('category', 'subcategories'));

    }

    public function sortByPriceAsc($subcategory) {
        return Product::where('subcategory_id', $subcategory->id)->orderBy('price')->paginate(6);
    }

    public function sortByPriceDesc($subcategory) {
        return Product::where('subcategory_id', $subcategory->id)->orderByDesc('price')->paginate(6);
    }

    public function sortByNameAsc($subcategory) {
        return Product::where('subcategory_id', $subcategory->id)->orderBy('name')->paginate(6);
    }

    public function sortByNameDesc($subcategory) {
        return Product::where('subcategory_id', $subcategory->id)->orderByDesc('name')->paginate(6);
    }

    public function sortByPriceRange($subcategory) {

        if(request()->has('price') && request()->price === '0-300' ) {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [0, 300])->paginate(6);
        } else  if(request()->has('price') && request()->price === '300-900') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [300, 900])->paginate(6);
        } else if(request()->has('price') && request()->price === '900-') {
            return Product::where('subcategory_id', $subcategory->id)->where('price', '>=', 900)->paginate(6);
        } else {
            return abort('404');
        }

    }

    public function sortByPriceAndPriceRangeAsc($subcategory) {

        if(request()->has('price') && request()->price === '0-300') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [0, 300])->orderBy('price')->paginate(6);
        } else if(request()->has('price') && request()->price === '300-900') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [300, 900])->orderBy('price')->paginate(6);
        } else if(request()->has('price') && request()->price === '900-') {
            return Product::where('subcategory_id', $subcategory->id)->where('price', '>=', 900)->orderBy('price')->paginate(6);
        } else {
            return abort('404');
        }

    }

    public function sortByPriceAndPriceRangeDesc($subcategory) {

        if(request()->has('price') && request()->price === '0-300') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [0, 300])->orderByDesc('price')->paginate(6);
        } else if(request()->has('price') && request()->price === '300-900') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [300, 900])->orderByDesc('price')->paginate(6);
        } else if(request()->has('price') && request()->price === '900-') {
            return Product::where('subcategory_id', $subcategory->id)->where('price', '>=', 900)->orderByDesc('price')->paginate(6);
        } else {
            return abort('404');
        }
    }

    public function sortByNameAndPriceRangeAsc($subcategory) {

        if(request()->has('price') && request()->price === '0-300') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [0, 300])->orderBy('name')->paginate(6);
        } else if(request()->has('price') && request()->price === '300-900') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [300, 900])->orderBy('name')->paginate(6);
        } else if(request()->has('price') && request()->price === '900-') {
            return Product::where('subcategory_id', $subcategory->id)->where('price', '>=', 900)->orderBy('price')->paginate(6);
        } else {
            return abort('404');
        }

    }

    public function sortByNameAndPriceRangeDesc($subcategory) {

        if(request()->has('price') && request()->price === '0-300') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [0, 300])->orderByDesc('name')->paginate(6);
        } else if(request()->has('price') && request()->price === '300-900') {
            return Product::where('subcategory_id', $subcategory->id)->whereBetween('price', [300, 900])->orderByDesc('name')->paginate(6);
        } else if(request()->has('price') && request()->price === '900-') {
            return Product::where('subcategory_id', $subcategory->id)->where('price', '>=', 900)->orderByDesc('name')->paginate(6);
        } else {
            return abort('404');
        }

    }

    public function removeQueryString(Category $category, Subcategory $subcategory) {

        $price = request()->post('price');
        $order = request()->post('order');
        $query = request()->query();
        $query = collect($query);
        $url = request()->url();
       
        if($price) {
            $query->forget($price);
        } 

        if($order) {
           $query->forget($order);
           $query->forget('sort');
        } 

        $query = $query->all();

        $catSub = collect(['category' => $category->slug, 'subcategory' => $subcategory->slug]);

        $catSubWithQueryString = $catSub->merge($query);

        $catSubWithQueryString = $catSubWithQueryString->all();

        $catSub = $catSub->all();

        if($query) {

            return redirect()->route('category.subcategory.show', $catSubWithQueryString);

        } else {

            return redirect()->route('category.subcategory.show', $catSub);

        }

    }

    public function searchResult() {


        $products = collect([]);

        $discount = Product::where('discount', '!=', null)->get();
        
        if(request()->isMethod('post')) {

            $validation = request()->validate([

                'search' => ['required']
    
            ]);

            $products = Product::where('name', 'like', '%' . request('search') . '%')->get();

            if($products) {

                return view('search.index', compact('products', 'discount'));

            }

        }

        return view('search.index', compact('products', 'discount'));

    }

    public function discount() {

        $discount = Product::where('discount', '!=', null)->paginate(6);

        return view('discount.index', compact('discount'));

    }

}