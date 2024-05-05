<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function index() {
        $students = Student::all();

        if($students->isEmpty()) {
            $data = [
                "message" => "No se encontraron estudiantes",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        return response()->json($students, 200);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "name"=> "required|max:85",
            "email" => "required|email|unique:student",
            "phone" => "required|digits:10",
            "language" => "required|in:English,Spanish,French"
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status'=> 400
            ];
            return response()->json($data, 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'language' => $request->language
        ]);

        if(!$student) {
            $data = [
                'message'=> 'Error al crear estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'student' => $student,
            'status' => 201
        ];

        return response()->json($data, 201);

    }
}
