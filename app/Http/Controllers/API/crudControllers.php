<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crud;
use OpenApi\Annotations as OA;

class CrudControllers extends Controller
{

    public function get() {
        try {
            $data = Crud::get();
            return response()->json($data, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

    public function create(Request $re) {
        try {
            $data['nom'] = $re['nom'];
            $data['devise'] = $re['devise'];
            $data['email'] =$re['email'];
            $res = Crud::create($data);
            return response()->json($res, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

    public function getById($id) {
        try {
            $data = Crud::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

  
 
    public function update(Request $re, $id) {
        try {
            $crud = Crud::find($id);

            if (!$crud) {
                return response()->json(['error' => 'Resource not found'], 404);
            }

            $crud->nom = $re['nom'];
            $crud->prenom = $re['devise'];
            $crud->contact = $re['email'];
            $crud->save();

            return response()->json($crud, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

    public function delete($id) {
        try {
            $res = Crud::find($id)->delete();
            return response()->json(['delete' => $res], 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
}

