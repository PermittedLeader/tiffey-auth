<?php
namespace Permittedleader\TiffeyAuth\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        if(! Gate::allows('view permissions')){
            abort(403);
        }

        $permissions = Permission::query()->paginate();

        return view('auth::app.permissions.index')
            ->with('permissions',$permissions);
    }

    public function show(Request $request, Permission $permission)
    {
        if(! Gate::allows('view permissions')){
            abort(403);
        }

        return view('tiffey::app.permissions.show', ['permission'=>$permission]);
    }
}