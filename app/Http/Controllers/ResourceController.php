<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $data = [];
        $data['resources'] = $resources;
        if($request->session()->exists('message')) {
            $data['message'] = $request->session()->get('message');
            $type = 'succes';
            if($request->session()->exists('type')) {
                $type =  $request->session()->get('type');
            }
            $data['type']=$type;
        }
        return view('resources.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('resources.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $age = $request->input('age');
        $resources = [];
        $type = 'danger';
        $data['type'] = $type;
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $resource = ['id' => $id, 'name' => $name, 'age' => $age];
        if(isset($resources[$id])) {
            return back()->withInput();
        } else {
            $resources[$id] = $resource;
            $type = 'success';
            $data['type'] = $type;
        }
        $request->session()->put('resources', $resources);
        return redirect('resources')->with('message','Se ha insertado el elemento correctamete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            return view('resources.edit', $data);
            //return view('resource.edit', ['resource' => $resource]);
        } else {
            return abort(404);
        }
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
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])) {
                $resource = $resources[$id];
                $idInput = $request->input('id');
                $nameInput = $request->input('name');
                $ageInput = $request->input('age');
                $resource['id'] = $idInput;
                $resource['name'] = $nameInput;
                $resource['age'] = $ageInput;
                if(isset($resources[$idInput])) {
                    return back()->withInput();
                } else {
                    unset($resources[$id]);
                    $resources[$idInput] = $resource;
                    $type = 'success';
                    $data['type'] = $type;
                }
                $request->session()->put('resources', $resources);
                return redirect('resources');
            }
        }
        return back()->withInput();
        return redirect('resources')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $message = 'No se ha podido eliminar el elemento correctamente';
        $type = 'danger';
        if($request->session()->exists('resources')) {
            $resources = $request -> session()->get('resources');
            if(isset($resources[$id])) {
                unset($resources[$id]);
                $request->session()->put('resources', $resources);
                $message = 'Se ha eliminado el elemento correctamete';
                $type = 'success';
            }
        }    
        $data = [];
        $data['message'] = $message;
        $data['type'] = $type;
        return redirect('resources')->with($data);
    }
    
    public function flush (Request $request){
        $request -> session() -> flush();
        $data = [];
        $data['message'] = 'Se han reseteado los valores por defecto no quedan elementos registrados';
        $data['type'] = 'danger';
        return redirect('resources')->with($data);
        
    }
}
