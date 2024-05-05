<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
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
}
