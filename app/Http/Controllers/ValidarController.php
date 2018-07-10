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

    /**
     * Method to request a validation
     * @access public
     * @param mixed xml
     * @param mixed xsd
     * @return array
     */
    public function xml(Request $request)
    {
        // Enable user error handling
        libxml_use_internal_errors(true);

        $xml = new \DOMDocument();

        $xml->load($request->input('xml'));
        if (!$xml->schemaValidate($request->input('xsd'))) {

            return response()->json(self::libXmlDisplayErrors(), 400);

        } else {

            return response()->json(null, 200);
        }

    }

    private function libXmlDisplayErrors()
    {
        $errorsArray = array();

        $errors = libxml_get_errors();

        foreach ($errors as $error) {

            $errorsArray[] = self::libXmlDisplayError($error);

        }

        libxml_clear_errors();

        return $errors;

    }

    private function libXmlDisplayError($error)
    {
        $return = "";

        switch ($error->level) {
            case LIBXML_ERR_WARNING:

                $return .= "Warning $error->code: ";
                break;
            case LIBXML_ERR_ERROR:

                $return .= "Error $error->code: ";
                break;
            case LIBXML_ERR_FATAL:

                $return .= "Fatal Error $error->code: ";
                break;
        }

        $return .= trim($error->message);

        if ($error->file) {

            $return .= " in $error->file";
        }

        $return .= " on line $error->line";

        return $return;
    }




}
