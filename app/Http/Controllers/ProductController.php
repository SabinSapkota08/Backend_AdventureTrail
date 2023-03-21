<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
      $products =   Product::paginate(10);
      return view("vendor.multiauth.dashboard.products.index",compact("products"));
        
    }

    function add(){
        $category = Category::all();
      return view("vendor.multiauth.dashboard.products.add",compact("category"));
        
    }
    public function store(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'quantity' => 'required|numeric|min:1',
        //     'description' => 'required',
        //     'short_description' => 'required|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'offer_to' => 'nullable|date|after_or_equal:today',
        //     'offer_from' => 'nullable|date|before:offer_to',
        //     'offer_price' => 'nullable|numeric|min:0',
        //     'mrp' => 'required|numeric|min:0',
        //     'category' => 'required',
        // ]);

        // Upload the image
        // $imageName = time().'.'."png";
        // $request->image->move(public_path('images'), $imageName);
        if (!empty($request->image)) {
          $file =$request->file('image');
          $extension = $file->getClientOriginalExtension(); 
          $filename = time().'.' . $extension;
          $file->move(public_path('uploads/'), $filename);
          $data['image']= 'uploads/'.$filename;
      }
        // Create the product
        $product = new Product([
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'desc' => $request->get('desc'),
            'short_description' => $request->get('short_description'),
            'image' => $data['image'],
            'offer_to' => $request->get('offer_to'),
            'offer_from' => $request->get('offer_from'),
            'offer_price' => $request->get('offer_price'),
            'mrp' => $request->get('mrp'),
            'category' => $request->get('category'),
        ]);
        $product->save();

        return redirect()->back()->with('success', 'Product has been added successfully.');
    }
    function indexApi(){
        $products =   Product::paginate(10);
        return $products;
          
      }

      public function destroy($id)
      {
              Product::find($id)->delete();
              return redirect()->back()->with("success","Successfully Deleted User!");
      }

      public function edit($id)
      {
        $category = Category::all();
        $product = Product::find($id);
        return view("vendor.multiauth.dashboard.products.edit",compact("category","product"));
      }

      public function update(Request $request,$id)
    {
        // Validate the request data
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'quantity' => 'required|numeric|min:1',
        //     'description' => 'required',
        //     'short_description' => 'required|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'offer_to' => 'nullable|date|after_or_equal:today',
        //     'offer_from' => 'nullable|date|before:offer_to',
        //     'offer_price' => 'nullable|numeric|min:0',
        //     'mrp' => 'required|numeric|min:0',
        //     'category' => 'required',
        // ]);

        // Upload the image
        // $imageName = time().'.'."png";
        // $request->image->move(public_path('images'), $imageName);
        if (!empty($request->image)) {
          $file =$request->file('image');
          $extension = $file->getClientOriginalExtension(); 
          $filename = time().'.' . $extension;
          $file->move(public_path('uploads/'), $filename);
          $data['image']= 'uploads/'.$filename;
      }
        // Create the product
        $product =  Product::find($id)->update([
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'desc' => $request->get('desc'),
            'short_description' => $request->get('short_description'),
            'image' => $data['image'],
            'offer_to' => $request->get('offer_to'),
            'offer_from' => $request->get('offer_from'),
            'offer_price' => $request->get('offer_price'),
            'mrp' => $request->get('mrp'),
            'category' => $request->get('category'),
        ]);
        // $product->update();

        return redirect()->back()->with('success', 'Product has been added successfully.');
    }
}

