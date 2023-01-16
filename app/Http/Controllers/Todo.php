<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){

        $todo = Todo::all()->where("deleted" , null);


        $result = [];

        foreach ($todo as $key => $value) {

            $obj = array(
                "message" => $value->message,
                "status" => $value->status,
                "id" => $value->id
                );
            array_push($result, $obj);
        }
        
        return response($result);
    }

    public function create(Request $req){

        $todo = Todo::create($req->all());

        return response()->json( $todo );

    }

    public function updateStatus($id){
        
        $todo = Todo::find($id);
        $newStatus = !$todo->status;

        $todo->update(["status" => $newStatus]);

        return response()->json($todo);

    }

    public function delete($id){

        $todo = Todo::find($id);

        if(!$todo){
            return response()->json([
                "message" => "Não foi possivel encontrar o Todo",
                "status" => 500
            ], 500);
        }


        $todo->update(["deleted" => now()]);


        return response()->json([
            "message" => "deletado com sucesso",
        ],200);
    }




}
