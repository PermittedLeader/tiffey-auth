<?php

namespace Permittedleader\TiffeyAuth\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Permittedleader\FlashMessages\FlashMessages;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller {

    use AuthorizesRequests, ValidatesRequests, FlashMessages;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if(! Gate::allows('list roles')){
            abort(403);
        }

        return view('auth::app.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if(! Gate::allows('create roles')){
            abort(403);
        }

        $permissions = Permission::all();

        return view('auth::app.roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Sanctum::actingAs(request()->user(), [], 'web');

        if(! Gate::allows('create roles')){
            abort(403);
        }

        $data = $this->validate($request, [
            'name' => 'required|unique:roles|max:32',
            'permissions' => 'array',
        ]);

        $role = Role::create($data);

        $permissions = Permission::find($request->permissions);
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.show', $role->id)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        if(! Gate::allows('view roles', $role)){
            abort(403);
        }

        $permissions = Permission::all();

        $permissions = $permissions->groupBy(function($item){
            return trim(strstr($item->name,' '));
        });

        return view('auth::app.roles.show')->with('role', $role)->with('permissions',$permissions);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        if(! Gate::allows('update roles',$role)){
            abort(403);
        }

        $permissions = Permission::all();

        $permissions = $permissions->groupBy(function($item){
            return trim(strstr($item->name,' '));
        });

        return view('auth::app.roles.edit')
            ->with('role', $role)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        if(! Gate::allows('update roles',$role)){
            abort(403);
        }

        $data = $this->validate($request, [
            'name' => 'required|max:32|unique:roles,name,'.$role->id,
            'permissions' => 'array',
        ]);
        $role->update($data);

        $permissions = Permission::find($request->permissions);
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.show', $role->id)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if(! Gate::allows('delete roles',$role)){
            abort(403);
        }

        $role->delete();

        return redirect()
            ->route('auth::roles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}