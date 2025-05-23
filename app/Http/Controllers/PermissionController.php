<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                 => ['required', 'unique:permissions', 'min:3'],
        ], [
            'name.required'        => 'Bagian nama permissions wajib diisi !!!',
        ]);

        $createPermissions = new Permission();
        $createPermissions->name = $request->name;
        $createPermissions->code_permissions = Str::random(60);
        $createPermissions->saveOrFail();
        return response()->json([
            'message'           => 'Data permissions berhasil ditambahkan!',
            'csrf_token'        => csrf_token()
        ]);
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
