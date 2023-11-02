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
        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];
        
        // mengirim data (json) dan kode 200
        return response()->json($data, 200);

    }
    public function store(Request $request) {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is creates ssuccesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, string $id) {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::find($id);
        $student->update($input);

        $data = [
            'message' => 'Pembaruan data siswa',
            'data' => $student
        ];  
    
        return response()->json($data, 200);
    }

    public function destroy(string $id) {
        $student = Student::find($id);
        $student->delete();

        $data = [
            'message' => 'ID: '. $id . ' Berhasil Menghapus',
        ];

        return response()->json($data, 200);
    }


}