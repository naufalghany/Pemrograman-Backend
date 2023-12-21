<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //membuat method index
    public function index() {
        // menggunakan model Student untuk select data
        $students = Student::all();

        // jika data kosong maka kirim status code 204
        if($students = Student::all()){
            $data = [
                "messsage" => "Resource is empty",
                "data" => $students,
            ];

            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];
        
        // mengirim data (json) dan kode 200
        return response()->json($data, 200);

    }
    public function store(Request $request) {

        // validasi data request
        $request->validate([
            "nama" => "required",
            "nim" => "required|numeric",
            "email" => "required|email",
            "jurusan" => "required"
        ]);

        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model Student untuk insert data
        $student = Student::create($validatedData);

        $data = [
            'message' => 'Student is creates ssuccesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, string $id) {

        $student = Student::find($id);
        // menangkap data request
        $input = [
            'nama' => $request->nama ?? $students->nama,
            'nim' => $request->nim ?? $students->nim,
            'email' => $request->email ?? $students->email,
            'jurusan' => $request->jurusan ?? $students->jurusan
        ];
       
         // jika data yang dicari tidak ada, kirim kode 404
        if (!$student) {
            $input = [
                'nama' => $request->nama ?? $students->nama,
                'nim' => $request->nim ?? $students->nim,
                'email' => $request->email ?? $students->email,
                'jurusan' => $request->jurusan ?? $students->jurusan
            ];
            $student->update($input);
            $data = [
                "message" => "Data not found"
            ];
             $data = [
                'message' => 'Pembaruan data siswa',
                'data' => $student
            ];  
            

            return response()->json($data, 400);
       }    else {
            $data = [
            'message' => 'Pembaruan data siswa',
            ];  
            return response()->json($data, 200);
       }
    
    }

    public function destroy(string $id) {
        $student = Student::find($id);

    // jika data yang dicari tidak ada, kirim kode 404
    if (!$student) {
        $students->delete();
        $data = [
            "message" => "Delete students successfully",
            'data' => $student
        ];

        return response()->json($data, 400);
       } else {
            $data = [
            'message' => 'Student not found',
        ];
            return response()->json($data, 200);
       }
       
    }

    public function show($id)
    {
        $students = Student::find($id);

        if ($students) {
            $data = [
                'message' => 'Get detail student',
                'data' => $students,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
        }
    }
}