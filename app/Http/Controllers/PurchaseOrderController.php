<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Product;
use App\Models\TermAndCondition;


class PurchaseOrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->type=="addsupplier") {
            $request->validate([
                //Validation Rules
                'name' => ['required', 'string', 'max:100'],
                'address' => ['required', 'string', 'max:100'],
                 
            ],[
                //Validation Messages
                'required'=>':attribute Is Required',
            ],[
                //Validation Attributes
                'name' => 'Name',
                'address' => 'Address',
                 
            ]);
    
            $supplier=Supplier::create([
                'name' => $request->name,
                'address' => $request->address,      
            ]);
    
            if($supplier)
            {
                return back()->with('success', 'New Supplier Created Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to create new Supplier' );
            }
        }

        if ($request->type=="addbrand") {
            $request->validate([
                //Validation Rules
                'name' => ['required', 'string', 'max:100'],
                
                 
            ],[
                //Validation Messages
                'required'=>':attribute Is Required',
            ],[
                //Validation Attributes
                'name' => 'Brand Name',
              
                 
            ]);
    
            $brand=Brand::create([
                'name' => $request->name,  
            ]);
    
            if($brand)
            {
                return back()->with('success', 'New Brand Created Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to create new Brand' );
            }
        }

        if ($request->type=="addproduct") {
            $request->validate([
                //Validation Rules
                'name' => ['required', 'string', 'max:100'],
                'brandname' => ['required'],
                'price' => ['required', 'numeric'],
                 
            ],[
                //Validation Messages
                'required'=>':attribute Is Required',
            ],[
                //Validation Attributes
                'name' => 'Product Name',
                'brandname' => 'Brand Name',
                'price' => 'Product Price',
              
                 
            ]);
    
            $product=Product::create([
                'brand_id' => $request->brandname,  
                'name' => $request->name,
                'price' => $request->price,
            ]);
    
            if($product)
            {
                return back()->with('success', 'New Product Created Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to create new Product' );
            }
        }

        if ($request->type=="addtermsandconditions") {
            $request->validate([
                //Validation Rules
                'term' => ['required', 'string'],
               
                 
            ],[
                //Validation Messages
                'required'=>':attribute Is Required',
            ],[
                //Validation Attributes
                'term' => 'Terms And Conditions',
              
                 
            ]);
            
            $termAndCondition=TermAndCondition::first();

            if ($termAndCondition) {
                $termAndCondition->update([
                    'term' => $request->term,
                ]);
            } else {
                $termAndCondition=TermAndCondition::create([
                    'term' => $request->term,
                ]);
            }
            
    
            if($termAndCondition)
            {
                return back()->with('success', 'Term And Condition Created/Updated Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to Created/Updated Term And Condition' );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case "1":
              return view('create-new-supplier-page');
              break;
            case "2":
                return view('create-new-brand-page',[

                ]);
                break;
            case "3":

                    return view('add-new-product-page',[
                            'brands' => Brand::all(),
                    ]);
                    break;
                case "4":

                    return view('terms-and-condition-page',[
                        'termAndCondition' => TermAndCondition::first(),
                    ]);
                    break;
                  
            default:
              return back();
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
