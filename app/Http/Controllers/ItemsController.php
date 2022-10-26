<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    public function show_all(Request $request) {

        if ($request->has('category')) {
            $items = Item::whereRelation('category','name',$request->category)->get();
        }
        else
            $items = Item::paginate(12);

        $categories = Category::all();
        return view('welcome',['items' => $items,'categories' => $categories]);
    }
    public function show_item($id) {

        $item = Item::find($id);
        return view('item',['item' => $item]);

    }
    public function admin() {

        $categories = Category::all();
        $items = Item::simplePaginate(5);
        return view('admin',['items' => $items,'categories' => $categories]);

    }
    public function save(Request $request) {

        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'item_description' => $request->item_description,
            'image' => time() . '-image-' . $request->file('image')->getClientOriginalName(),
            'category_id' => $request->category_id
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('images',time() . '-image-' . $request->file('image')->getClientOriginalName(),'public');
        }

        Session::forget('alert');
        Session::push('alert',['color' => 'success','text' => 'Item: ' . $request->name . ' is saved.']);

        return redirect('admin');
    }
    public function save_category(Request $request) {

        Category::create([
            'name' => $request->name,
            'icon' => $request->icon
        ]);

        Session::forget('alert');
        Session::push('alert',['color' => 'success','text' => 'Category: ' . $request->name . ' is saved.']);

        return redirect('edit-categories');
    }
    public function delete($id) {

        $item = Item::find($id);

        $item->delete();

        Session::forget('alert');
        Session::push('alert',['color' => 'danger','text' => 'Item: ' . $item->name . ' is deleted.']);

        return redirect('admin');

    }
    public function delete_category($id) {

        $category = Category::find($id);

        $category->delete();

        Session::forget('alert');
        Session::push('alert',['color' => 'danger','text' => 'Category: ' . $category->name . ' is deleted.']);

        return redirect('edit-categories');

    }
    public function edit(Request $request) {

        $item = Item::find($request->id);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->item_description = $request->item_description;
//        $item->image = time() . '-image';
        $item->category_id = $request->category;


        $item->save();

        Session::forget('alert');
        Session::push('alert',['color' => 'warning','text' => 'Item: ' . $request->name . ' is edited.']);

        return redirect('admin');
    }
    public function edit_categories() {
        $categories = Category::withCount('items')->get();
        return view('edit-categories',['categories' => $categories]);
    }
    public function reset() {

        Artisan::call('db:wipe');
        Artisan::call('migrate');
        Artisan::call('db:seed');

        alert('success','Database is reset');

        return back();
    }

}
