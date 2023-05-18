<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
      
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'detail' => 'required',
            'image' => 'required|image',
            
           
        ]);
        $product = new Product;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $publicPath = public_path('public/products');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $image->move($publicPath, $imageName);
          //  $product->image = $imageName;
          $product->image=$imageName;
        }
        
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->detail = $validatedData['detail'];
       // $product->image = $imageName;
        
        $product->save();
        
        return redirect()->route('products')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::findOrfail($id);
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findOrfail($id);
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrfail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'detail' => 'required',
            'image' => 'required',
            
           
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $publicPath = public_path('public/products');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $image->move($publicPath, $imageName);
          //  $product->image = $imageName;
          $product->image=$imageName;
        }
        
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->detail = $validatedData['detail'];
       // $product->image = $imageName;
        
        $product->save();
        
      
        return redirect()->route('products')
                        ->with('success','Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrfail($id);
        $product->delete();
       
        return redirect()->route('products')
                        ->with('success','Product deleted successfully');
    }
}