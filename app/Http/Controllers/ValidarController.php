<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function validarXml($p1, $p2)
    {
        //
        echo $p1. '</br>';
        echo $p2;

//        if(file_exists("xml/validar.xml")){
//
//            exit('true');
//        }else{
//
//            exit('false');
//        }

        echo file_get_contents("http://127.0.0.1:8000/xml/validar.xsd");
        exit;

        $xml = new \DOMDocument();

        $xml->load('xml/validar.xml');

        if (!$xml->schemaValidate('xml/validar.xsd')) {

            echo "invalid<p/>";
        } else {

            echo "validated<p/>";
        }
    }
}
