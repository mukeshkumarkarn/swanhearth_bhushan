<?php

namespace App\Http\Controllers\DynamicMetaController;

use Illuminate\Http\Request;
use App\Models\dynamic_metas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DynamicMetaController extends Controller
{
    //
    public function add_meta(Request $request)
    {
        $dynamic_metas = new dynamic_metas;
        $dynamic_metas->page_name = $request->page_name;
        $dynamic_metas->title = $request->title;
        $dynamic_metas->description = $request->description;
        $dynamic_metas->keywords = $request->keywords;
        $dynamic_metas->controller_name = $request->controller_name;
        $dynamic_metas->page_url = $request->page_url;
        $dynamic_metas->save();
        Session::flash('success', 'Save successful.');
        return back();
    }

    public function update_meta(Request $request)
    {

        $id = $request->id;
        $data = dynamic_metas::where('id', $id)->first();
        dynamic_metas::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
        ]);
        Session::flash('success', 'Meta successful.');
        return redirect()->to('admin/view-dynamic-meta');
    }
}
