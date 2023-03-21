<?php

namespace App\Http\Controllers;
use App\Category;

use App\AdventurePackage;
use Illuminate\Http\Request;

class AdventurePackageController extends Controller
{
    function index(){
        $adventure_packages =   AdventurePackage::paginate(10);
        return view("vendor.multiauth.dashboard.adventure_packages.index",compact("adventure_packages"));
          
      }
  
      function add(){
          $category = Category::all();
        return view("vendor.multiauth.dashboard.adventure_packages.add",compact("category"));
          
      }
      public function store(Request $request)
      {

        $images = [];

       
        foreach($request->file('description_img') as  $image){

          // return "hello";
          $file =$image;
            $extension = $file->extension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('uploads/multiple/'), $filename);
            array_push($images,'uploads/multiple/'.$filename); ;
          }
       

        // return $image;
          if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['image']= 'uploads/'.$filename;
        }
          // Create the product
          $adventure_package = new AdventurePackage([
              'name' => $request->get('name'),
              'quantity' => $request->get('quantity'),
              'description' => $request->get('description')??"11212",
              'image' => $data['image'],
              'description_img' => json_encode($images),
              'price' => $request->get('price'),
              'category' => $request->get('category'),
          ]);
          $adventure_package->save();
  
          return redirect()->back()->with('success', 'Product has been added successfully.');
      }
      function indexApi(){
          $adventure_packages =   AdventurePackage::paginate(10);
          return $adventure_packages;
            
        }
  
        public function destroy($id)
        {
            AdventurePackage::find($id)->delete();
                return redirect()->back()->with("success","Successfully Deleted User!");
        }
  
        public function edit($id)
        {
          $category = Category::all();
          $adventurePackage = AdventurePackage::find($id);
          return view("vendor.multiauth.dashboard.adventure_packages.edit",compact("category","adventurePackage"));
        }
  
        public function update(Request $request,$id)
        {
  
          $images = [];
  
         
          foreach($request->file('description_img') as  $image){
  
            // return "hello";
            $file =$image;
              $extension = $file->extension(); 
              $filename = time().'.' . $extension;
              $file->move(public_path('uploads/multiple/'), $filename);
              array_push($images,'uploads/multiple/'.$filename); ;
            }
         
  
          // return $image;
            if (!empty($request->image)) {
              $file =$request->file('image');
              $extension = $file->getClientOriginalExtension(); 
              $filename = time().'.' . $extension;
              $file->move(public_path('uploads/'), $filename);
              $data['image']= 'uploads/'.$filename;
          }
            // Create the product
            $adventure_package =  AdventurePackage::find($id)->update([
                'name' => $request->get('name'),
                'quantity' => $request->get('quantity'),
                'description' => $request->get('description')??"",
                'image' => $data['image'],
                'description_img' => json_encode($images),
                'price' => $request->get('price'),
                'category' => $request->get('category'),
            ]);
            // return $adventure_package;
    
            return redirect()->back()->with('success', 'Product has been updated successfully.');
        }

   
  
}

    