<?php

namespace App\Http\Controllers;


use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentInsertRequest;


class DocumentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  )
    {

     
        $this->authorize('view-document-index');
        return view('documents.index',[
            "pacientes" => Patient::get()
        ]);
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
    public function store(DocumentInsertRequest $request)
    {
        
        $document = new Service($request->validated());
        
        $this->authorize('updown-service');

    

        $serv = $request->servicio;
        $path ='';
        switch ($serv) {
            case '1':
                $path ='fisioterapia';
                break;
            case '2':
                $path ='enfermeria';
                break;
            case '3':
                $path ='curaciones';
                break;
            case '4':
                $path ='terapia-respiratoria';
                break;
            case '5':
                $path ='teapia-ocupacional';
                break;
            case '6':
                $path ='fonoaudiologia';
                break;
            case '7':
                $path ='consulta-medica';
                break;
            case '8':
                $path ='cuentas-cobro';
                break;
            case '9':
                $path ='hojas-vida';
                break;
            case '10':
                $path ='firmas';
                break;
            case '11':
                $path ='medicamentos';
                break;
            case '12':
                $path ='procedimientos';
                break;
            case '13':
                $path ='evaluaciones';
                break;
                
           
        }
        $doc_name = $request->file('documento')->getClientOriginalName();
        $request->file('documento')->storeAs('public/'.$path,$doc_name);
        $document->documento = $doc_name;
        $document->save();
         

        return redirect()->route('documents.index')->with('status','El servicio se subio con éxito');
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
    public function destroy($id)
    {
        //
    }
}
