<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function view(Request $request)
    {
        $service = Service::all();
        return view('viewTable', compact('service'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:6|max:8'
        ]);
        Service::create($data);
        // $service = new Service();

        // $service->title = $request->title;
        // $service->save();
        return redirect()->back();
    }

}
