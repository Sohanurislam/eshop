<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\CategoriesExport;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class CategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {

        try{

            $request->validate([
                'title' => 'required|unique:categories|max:100',
                'description' => 'min:1|max:1000|required',
            ]);

            $requestData = $request->all();
            $requestData['is_active'] = $request->is_active == 'on'?1:0;

            Category::create($requestData);

            return redirect()->route('categories.index')->withStatus('Create was successful!');

        }catch (QueryException $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }



    }

    public function show(Category $category)//dependency injection
    {
//        $category = Category::findOrFail($id);

        return view('backend.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
//        $category = Category::findOrFail($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request,Category $category)
    {

        try{
            $request->validate([
                'title' => 'required|unique:categories|max:100',
                'description' => 'min:1|max:1000|required',
            ]);

            $requestData = $request->all();
            $requestData['is_active'] = $request->is_active == 'on'?1:0;

            $category->update($requestData);

//            $request->session()->flash('status', 'Task was successful!')

            return redirect()->route('categories.index')->withStatus('Update was successful!');

        }catch (QueryException $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Category $category)
    {

        try{
//            $category = category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.index')->withStatus('Soft Delete was successful!');

        }catch (QueryException $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function downloadPdf()
    {
        $categories = Category::all();
        $pdf = PDF::loadView('backend.categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');

    }

    public function downloadExcel()
    {
        return Excel::download(new CategoriesExport(), 'categories.xlsx');

    }


    public function trash()
    {
        $categories = Category::onlyTrashed()->orderBy('created_at', 'desc')->get();
        return view('backend.categories.trash', compact('categories'));
    }
    public function restore($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('categories.trash')->withStatus('Restore was successful!');

    }
    public function forceDelete($id)
    {
        try{
//            $category = category::findOrFail($id);
            Category::withTrashed()
                ->where('id', $id)
                ->forceDelete();

            return redirect()->route('categories.trash')->withStatus('Delete was successful!');

        }catch (QueryException $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
