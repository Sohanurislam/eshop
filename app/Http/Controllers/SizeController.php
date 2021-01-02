<?php

namespace App\Http\Controllers;


    use App\Size;
    use Illuminate\Database\QueryException;
    use Illuminate\Http\Request;


class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::orderBy('created_at', 'desc')->get();
        return view('backend.sizes.index', compact('sizes'));
    }

    public function create()
    {

        return view('backend.sizes.create');
    }

    public function store(Request $request)
    {

            $request->validate([
                'title' => 'required|unique:sizes|max:100',
            ]);

            $requestData = $request->all();

            Size::create($requestData);

    return redirect()->route('sizes.index')->withStatus('Create was successful!');
    }

    public function show(Size $size)//dependency injection
    {

        return view('backend.sizes.show', compact('size'));
    }


    public function edit(Size $size)
    {


     return view('backend.sizes.edit', compact('size'));
    }


    public function update(Request $request, Size $size)
    {
        try {

            $requestData = $request->all();

            $size->update($requestData);

            return redirect()->route('sizes.index')->withStatus('Update was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }


    public function destroy(Size $size)
    {
        try {
            $size->delete();

            return redirect()->route('sizes.index')->withStatus(' Delete was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
