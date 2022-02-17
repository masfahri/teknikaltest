<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function successStore($module)
    {
        return redirect()->back()->with('success', 'Berhasil Menambahkan '.$module);
    }

    public function failStore($message)
    {
        return redirect()->back()->with('error', 'Gagal Menambahkan '.$message);
    }

    public function successUpdate($route, $module)
    {
        return redirect()->route($route)->with('success', 'Berhasil Ubah '.$module);
    }

    public function failUpdate($message)
    {
        return redirect()->back()->with('error', 'Gagal Menambahkan '.$message);
    }

    public function successDelete($route, $module)
    {
        return redirect()->route($route)->with('success', 'Berhasil Hapus '.$module);
    }
}
