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
        $dataPermissions = Permission::all();
        return view('permissions.index', [
            'permissions'       => $dataPermissions
        ]);
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

    public function edit($usercode)
    {
        $permissions = Permission::where('code_permissions', $usercode)->firstOrFail();
        return view('modal.permissions.update', [
            'rowPermissions'        => $permissions
        ]);
    }

    public function update(Request $request, $usercode)
    {
        $validated = $request->validate([
            'name'                 => ['required', 'unique:permissions', 'min:3'],
        ], [
            'name.required'        => 'Bagian nama permissions wajib diisi !!!',
        ]);

        $getPermissions = Permission::where('code_permissions', $usercode)->firstOrFail();
        $getPermissions->update($validated);
        return response()->json([
            'message'           => 'Data permissions berhasil diubah!',
            'csrf_token'        => csrf_token()
        ]);
    }

    public function destroy() {}
}
