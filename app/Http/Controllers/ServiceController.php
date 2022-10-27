<?php

namespace App\Http\Controllers;

use App\Post;
use App\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function content()
    {
        return view('administrator.service.content');
    }

    public function create()
    {
        return view('administrator.service.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $data['img'] = $request->file('img')->store('images/service', 'public');
        $service = Service::create($data);
        return redirect()->route('service.edit', ['id' => $service->id]);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('administrator.service.edit', compact('service'));
    }

    public function update(ServiceRequest $request)
    {
        $element = Service::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('img')){
            if(Storage::disk('public')->exists($element->img))
                Storage::disk('public')->delete($element->img);
            
            $data['img'] = $request->file('img')->store('images/service','public');
        }   

        $element->update($data);

        return back()->with('mensaje', 'Servicio actualizado');
    }

    public function destroy($id)
    {
        $element = Service::find($id);

        if(Storage::disk('public')->exists($element->img))
            Storage::disk('public')->delete($element->img);
            
        $element->delete();
    }

    public function find($id)
    {
        $content = Service::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $services = Service::orderBy('order', 'ASC');

        return DataTables::of($services)
        ->editColumn('img', function($service){
            return '<img src="'.asset($service->img).'" alt="" width="130" height="80">';
        })
        ->addColumn('actions', function($service) {
            return '<a href="'.route('service.edit', ['id'=>$service->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$service->id.')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'img'])
        ->make(true);
    }
}   
