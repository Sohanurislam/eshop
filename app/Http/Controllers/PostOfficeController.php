<?php

namespace App\Http\Controllers;

use App\PostOffice;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostOfficeController extends Controller
{
    public function index()
    {
        $postOffices = PostOffice::all();
        return view('backend.postOffices.index', compact('postOffices'));
    }

    public function create()
    {

        return view('backend.postOffices.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'post_office' => 'required|unique:roles|max:100',
        ]);

        $requestData = $request->all();
        PostOffice::create($requestData);

        return redirect()->route('postOffices.index')->withStatus('Create was successful!');
    }


    public function show(PostOffice $postOffice)//dependency injection
    {
        return view('backend.postOffices.show', compact('postOffice'));
    }


    public function edit(PostOffice $postOffice)
    {

        return view('backend.postOffices.edit', compact('postOffice'));
    }


    public function update(Request $request, PostOffice $postOffice)
    {
        $requestData = $request->all();

        $postOffice->update($requestData);

        return redirect()->route('postOffices.index')->withStatus('Update was successful!');
    }


    public function destroy(PostOffice $postOffice)
    {

        try {
            $postOffice->delete();

            return redirect()->route('postOffices.index')->withStatus(' Delete was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

}
