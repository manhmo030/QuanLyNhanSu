<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    public function getIndex()
    {
        $data = ChucVu::orderBy('MaCV', 'DESC')->paginate(10);
        return view('Admin.Chucvu.view', compact('data'));
    }

    public function formAdd()
    {
        return view('Admin.Chucvu.add');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $chucvu = ChucVu::create([  // nếu create thât bại sẽ trả về giá trị null
            'TenCV' => $data['tencv'],
            'CapBac' => $data['capbac'],


        ]);

        if ($chucvu !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)

            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdate($id)
    {

        $data = ChucVu::where('MaCV', $id)->first();
        return view('Admin.Chucvu.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $chucvu = ChucVu::where('MaCV', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'TenCV' => $data['tencv'],
            'CapBac' => $data['capbac'],
            'updated_at'=> Carbon::now()
        ]);
        if ($chucvu !== null) {
            return redirect()->route('admin.chucvu.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id){
        $chucvu = ChucVu::where('MaCV', $id)->first();

        if ($chucvu) {
            $chucvu->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    // public function searchStudent(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     $keywords = explode(' ', $keyword);
    //     $firstName = $keywords[0];
    //     $lastName = $keywords[count($keywords) - 1];
    //     $students = Student::join('tbl_class', 'tbl_class.class_id', '=', 'tbl_student.class_id')
    //         ->join('tbl_course', 'tbl_class.course_id', '=', 'tbl_course.course_id')
    //         ->where('student_code', $keyword)
    //         ->orWhere('first_name', 'like', '%' . $firstName . '%')
    //         ->orWhere('last_name', 'like', '%' . $lastName . '%')
    //         ->orWhere('first_name', 'like', '%' . $lastName . '%')
    //         ->orWhere('last_name', 'like', '%' . $firstName . '%')
    //         ->paginate(5); // trả về 1 mảng
    //     if ($students->isNotEmpty()) {
    //         return view('Admin.Student.searchStudent', compact('students', 'keyword'));
    //     } else {
    //         $error = 'No matching data found';
    //         return view('Admin.Student.searchStudent', compact('error', 'keyword'));
    //     }
    // }

    // public function exportStudents()
    // {
    //     return Excel::download(new StudentsExport, 'list-student-export.xlsx');
    // }

    // public function formImportStudents()
    // {
    //     return view('Admin.Student.import');
    // }

    // public function teamplateExport()
    // {
    //     return Excel::download(new TemplateStudent, 'template-student.xlsx');
    // }

    // public function importStudents(Request $request)
    // {
    //     if ($request->hasFile('import-students')) {
    //         $file = $request->file('import-students');
    //         $filePath = $file->getPathname();
    //         try {
    //             Excel::import(new StudentsImport, $filePath);
    //         } catch (\Exception $e) {
    //             return redirect()->back()->with('error', 'Data import failed');
    //         }
    //         return redirect()->back()->with('success', 'Enter data successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'File does not exist');
    //     }
    // }

    // public function deleteStudent(Request $request)
    // {
    //     if ($request->has('selected_items')) {
    //         $selectedItems = $request->selected_items;
    //         DB::beginTransaction();
    //         StudentAccount::whereIn('student_id', $selectedItems)->delete();
    //         $deleteStudent = Student::whereIn('student_id', $selectedItems)->delete();
    //         if ($deleteStudent) {
    //             DB::commit();
    //             return response()->json(['success' => 'Student deleted successfully'], 200);
    //         } else {
    //             DB::rollback();
    //             return response()->json(['error' => 'Failed to delete students'], 500);
    //         }
    //     }
    // }
}

