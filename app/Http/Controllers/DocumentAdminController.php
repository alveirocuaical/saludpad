<?php

namespace App\Http\Controllers;

use App\Models\Service;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DocumentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-document-admin-index');
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $carpeta)
    {
        $this->authorize('view-document-admin-index');
        $ser = '';
        switch ($carpeta) {
            case 'fisioterapia':
                    $ser = 1;
                break;
            case 'enfermeria':
                    $ser = 2;
                break;
            case 'curaciones':
                    $ser = 3;
                break;
            case 'terapia-respiratoria':
                    $ser = 4;
                break;
            case 'terapia-ocupacional':
                    $ser = 5;
                break;
            case 'fonoaudiologia':
                    $ser = 6;
                break;
            case 'consulta-medica':
                    $ser = 7;
                break;
            case 'cuentas-de-cobro':
                    $ser = 8;
                break;
            case 'hojas-de-vida':
                    $ser = 9;
                break;
            case 'registro-firmas':
                    $ser = 10;
                break;
            case 'medicamentos':
                    $ser = 11;
                break;
            case 'procedimientos':
                    $ser = 12;
                break;
            case 'evaluaciones':
                    $ser = 13;
                break;
            
        }
        
       // var_dump($documentos);
        return view('admin.show', [
            'documentos'=> Service::where('servicio',$ser)
                                    ->paginate(6),
            'titulo'=>$carpeta
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $titulo)
    {
        $this->authorize('view-document-admin-index');
        $ser=0;
        switch ($titulo) {
            case 'fisioterapia':
                    $ser = 1;
                break;
            case 'enfermeria':
                    $ser = 2;
                break;
            case 'curaciones':
                    $ser = 3;
                break;
            case 'terapia-respiratoria':
                    $ser = 4;
                break;
            case 'terapia-ocupacional':
                    $ser = 5;
                break;
            case 'fonoaudiologia':
                    $ser = 6;
                break;
            case 'consulta-medica':
                    $ser = 7;
                break;
            case 'cuentas-de-cobro':
                    $ser = 8;
                break;
            case 'hojas-de-vida':
                    $ser = 9;
                break;
            case 'registro-firmas':
                    $ser = 10;
                break;
            case 'medicamentos':
                    $ser = 11;
                break;
            case 'procedimientos':
                    $ser = 12;
                break;
            case 'evaluaciones':
                    $ser = 13;
                break;
            
        }
        File::deleteDirectory(storage_path('app/public/'.$titulo));
        
        DB::update("update services set deleted_at=CURRENT_TIMESTAMP  where deleted_at is null and servicio = '".$ser."'");
            
        return redirect()->route('admin.index')->with('status','Documentos eliminados.');
    }

    public function zipDownload($titulo)
    {
        $this->authorize('view-document-admin-index');
        
        $zip = new ZipArchive;
        $fileName = $titulo.date('d-m-Y--h-i-s a').'.zip';


        if ($zip->open(storage_path('app/public/'.$fileName),ZipArchive::CREATE==true)) {
            
             $files = File::files(storage_path('app/public/'.$titulo));
            
             foreach ($files as $key => $value) {
                 $relativeName = basename($value);
                 $zip->addFile($value,$relativeName);

             }
             $zip->close();
         }

         return response()->download(storage_path('app/public/'.$fileName));
    }

    public function docDownload( $titulo, $documento)
    {
        $this->authorize('view-document-admin-index');
        return response()->download(storage_path('app/public/'.$titulo.'/'.$documento));  
    }
}
