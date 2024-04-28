<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\HopDong;
use App\Models\NhanVien;
use App\Models\PhongBan;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Chunk;

class NhanVienController extends Controller
{
    public function getIndex()
    {
        $data = NhanVien::with('chucvu')->orderBy('MaNV', 'DESC')->paginate(10);
        return view('Admin.Nhanvien.view', compact('data'));
    }

    public function formAdd()
    {
        $phongban = PhongBan::get();
        $chucvu = ChucVu::get();

        return view('Admin.Nhanvien.add', compact('phongban', 'chucvu'));
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $nhanvien = NhanVien::create([  // nếu create thât bại sẽ trả về giá trị null
            'Hoten' => $data['hoten'],
            'GioiTinh' => $data['gioitinh'],
            'NgaySinh' => $data['ngaysinh'],
            'DiaChi' => $data['diachi'],
            'SoDienThoai' => $data['sdt'],
            'SoCCCD' => $data['socccd'],
            'Email' => $data['email'],
            'QueQuan' => $data['quequan'],

            'MaCV' => $data['macv']

        ]);

        if ($nhanvien !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)

            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdate($id)
    {
        $data = NhanVien::where('MaNV', $id)->first();
        $phongban = PhongBan::get();
        $chucvu = ChucVu::get();
        return view('Admin.Nhanvien.edit', compact('data', 'phongban', 'chucvu'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $nhanvien = NhanVien::where('MaNV', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'Hoten' => $data['hoten'],
            'GioiTinh' => $data['gioitinh'],
            'NgaySinh' => $data['ngaysinh'],
            'DiaChi' => $data['diachi'],
            'SoDienThoai' => $data['sdt'],
            'SoCCCD' => $data['socccd'],
            'Email' => $data['email'],
            'QueQuan' => $data['quequan'],

            'MaCV' => $data['macv']

        ]);
        if ($nhanvien !== null) {
            return redirect()->route('admin.nhanvien.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $nhanvien = NhanVien::where('MaNV', $id)->first();

        if ($nhanvien) {
            $nhanvien->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $searchBy = $request->searchBy;

        $query = NhanVien::query();

        if ($searchBy == '1') {
            $query->where('MaNV', $keyword);
        } elseif ($searchBy == '2') {
            $query->where('Hoten', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '3') {
            $query->where('DiaChi', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '4') {
            $query->where('SoDienThoai', 'like', '%' . $keyword . '%');
        } else {
            $query->where('Email', 'like', '%' . $keyword . '%');
        }

        $data = $query->paginate(5);

        if ($data->isEmpty()) {
            $error = 'Không tìm thấy dữ liệu phù hợp.';
            return view('Admin.Nhanvien.search', compact('error', 'keyword'));
        }

        // Trả về kết quả tìm kiếm
        return view('Admin.Nhanvien.search', compact('data', 'keyword'));
    }

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
