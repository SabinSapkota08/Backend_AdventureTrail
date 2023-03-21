<?php

namespace App\Http\Controllers;

use App\AdventureTicket;
use Illuminate\Http\Request;
use App\Category;

class AdventureTicketController extends Controller
{
    function index(){
        $adventure_tickets =   AdventureTicket::paginate(10);
        return view("vendor.multiauth.dashboard.adventure_tickets.index",compact("adventure_tickets"));
          
      }
  
      function add(){
          $category = Category::all();
        return view("vendor.multiauth.dashboard.adventure_tickets.add",compact("category"));
          
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
          $adventure_ticket = new AdventureTicket([
              'name' => $request->get('name'),
              'quantity' => $request->get('quantity'),
              'description' => $request->get('description')??"11212",
              'image' => $data['image'],
              'description_img' => json_encode($images),
              'price' => $request->get('price'),
              'category' => $request->get('category'),
          ]);
          $adventure_ticket->save();
  
          return redirect()->back()->with('success', 'Product has been added successfully.');
      }
      function indexApi(){
          $adventure_tickets =   AdventureTicket::all();
          return $adventure_tickets;
            
        }
  
        public function destroy($id)
        {
            AdventureTicket::find($id)->delete();
                return redirect()->back()->with("success","Successfully Deleted User!");
        }
  
        public function edit($id)
        {
          $category = Category::all();
          $adventureTicket = AdventureTicket::find($id);
          return view("vendor.multiauth.dashboard.adventure_tickets.edit",compact("category","adventureTicket"));
        }
  
        public function update(Request $request,$id)
      {
        // return request();

        
        $images = [];
  
         
        foreach($request->file('description_img') as  $image){

          // return "hello";
          $file =$image;
            $extension = $file->extension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('uploads/multiple/'), $filename);
            array_push($images,'uploads/multiple/'.$filename); ;
          }
        
          if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['image']= 'uploads/'.$filename;
        }
          // Create the product
          $adventure_ticket =  AdventureTicket::find($id)->update([
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'description' => $request->get('description'),
            'image' => $data['image'],
            'description_img' => json_encode($images),
            'price' => $request->get('price'),
            'category' => $request->get('category'),
        
          ]);
          // $adventure_packages->update();
  
          return redirect()->back()->with('success', 'AdventureTicket has been added successfully.');
      }
   
}
