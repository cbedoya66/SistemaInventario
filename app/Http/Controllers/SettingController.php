<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setting.setting');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'logo' => 'mimetypes:image/jpeg,image/png,image/jpg',
            'banner' => 'mimetypes:image/jpeg,image/png,image/jpg'
        ]);


        //Almacenar archivo
        if ($request->hasFile('logo')) {
            $name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('vendor/adminlte/dist/img'), $name);
        }

        if ($request->hasFile('banner')) {
            $name2 = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move(public_path('vendor/adminlte/dist/img'), $name2);
        }

        //Actualizar variable APP_NAME del archivo .env
        $APP_NAME =  $request->input('nombre_sistema');
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env('APP_NAME');

        $str = str_replace("APP_NAME={$oldValue}", "APP_NAME={$APP_NAME}\n", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
