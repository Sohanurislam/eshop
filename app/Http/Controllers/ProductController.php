<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Exports\ProductsExport;
use App\Size;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Image;
//use Intervention\Image\image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product:: orderBy('created_at', 'desc')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        //        $categories = [
//            '1' => 'Category 1',
//            '2' => 'Category 2',
//        ];
        $categories = Category::pluck('title', 'id')->toArray();
        $sizes = Size::pluck('title', 'id')->toArray();
        $selectedSizes = [];
//        dd($categories);
        return view('backend.products.create', compact('categories','sizes','selectedSizes'));
    }

    public function store(Request $request)
    {
        try {


            $request->validate([
                'title' => 'required|unique:products|max:100',
                'category_id' => 'required|exists:categories,id',
                'description' => 'min:2|max:10000|required',
            ]);
//            dd($request->all());
            $requestData = $request->all();

            if ($request->hasFile('picture')) {
                $requestData['picture'] = $this->uploadImage($request->picture, $request->title);
            }
//            $requestData =[
//                'title'=>$request->title,
//                'description'=>$request->description,
//                'is_active'=>$request->is_active =='on'?1:0
//            ];

//        dd($requestData);

//            $requestData = $request->only('title','description');
//            $requestData = $request->all();
//            $requestData['picture'] = $data['picture'];
            $requestData['is_active'] = $request->is_active == 'on' ? 1 : 0;


//            dd($requestData);

//            product::create($requestData);

            $category = Category::findorFail($request->category_id);

           $product= $category->products()->Create($requestData);

           $product->sizes()->attach($request->size);

            return redirect()->route('products.index')->withStatus('Create was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }


    public function show(Product $product)//dependency injection
    {
        $this->authorize('products.view',$product);
//        $product = product::findOrFail($id);

        return view('backend.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
//        $product = Product::findOrFail($id);

        $categories = Category::pluck('title', 'id');
//        dd($categories);
        $sizes = Size::pluck('title','id')->toArray();
        $selectedSizes = $product->sizes->pluck('id')->toArray();
//        dd($selectedSizes);

        return view('backend.products.edit', compact('product','categories','sizes','selectedSizes'));
    }


    public function update(Request $request, Product $product)
    {


        try {
//            $product = product::findOrFail($id);
            $request->validate([
                'title' => 'required|unique:categories|max:100',
                'description' => 'min:2|max:1000|required',
            ]);

            $requestData = $request->all();

            if($request->hasFile('picture')) {

                $this->unlink($product->picture);

                $requestData['picture'] = $this->uploadImage($request->picture, $request->title);
            }else{
                $requestData['picture'] = $product->picture;
            }
            $requestData['is_active'] = $request->is_active == 'on' ? 1 : 0;

            $product->update($requestData);
            $product->sizes()->sync($request->size);


//            $this->uploadImage($file);

//            $request->session()->flash('status', 'Task was successful!');


                return redirect()->route('products.index')->withStatus('Update was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
   }



    public function destroy(Product $product)
    {

        try{
//            dd($product);
//            $product = product::findOrFail($id);
            $product->sizes()->detach();
            $product->delete();

            return redirect()->route('products.index')->withStatus('Soft Delete was successful!');

        }catch (QueryException $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
    public function downloadPdf()
    {
        $products = Product::all();
        $pdf = PDF::loadView('backend.products.pdf', compact('products'));
        return $pdf->download('products.pdf');

    }
    public function downloadExcel()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');

    }
    public function trash()
    {
        $products = Product::onlyTrashed()->orderBy('created_at', 'desc')->get();
        return view('backend.products.trash', compact('products'));
    }

    public function restore($id)
    {
        Product::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('products.trash')->withStatus('Restore was successful!');
    }

    public function forceDelete($id)
    {
      try {
        Product::withTrashed()
            ->where('id', $id)
            ->forceDelete();
          return redirect()->route('products.trash')->withStatus('Delete was successful!');

      }catch (QueryException $exception){
return redirect()->back()->withErrors($exception->getMessage());
}
    }


    //images upload method

    private function uploadImage($file, $name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name =  $timestamp.'-'.$name. '.' . $file->getClientOriginalExtension();
        $pathToUpload = storage_path().'/app/public/images/';
        Image::make($file)->resize(700, 400)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/images/';

        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

//    private function uploadMultipleImage($file)
//    {
//        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
//        $name = $file->getClientOriginalName();
//        $file_name = $timestamp .'-' . $name;
//        $pathToUpload = storage_path().'/app/public/Images/';
//        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
//        return $file_name;
//    }
}

