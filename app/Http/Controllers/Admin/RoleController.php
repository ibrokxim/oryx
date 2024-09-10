<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
//        $this->authorize('viewAny', Role::class);
    	if($request->method() == 'POST'){
    		$items = $request->all();
    		if(isset($items['id'])){
    			for ($i=0; $i < count($items['id']); $i++) {
    				if($items['id'][$i]){
    					$item = Role::findOrFail($items['id'][$i]);
    					$item->fill(['title'=>$items['title'][$i]])->save();
    				}else{
    					$item = Role::create(['name'=>'role'.time(),'title'=>$items['title'][$i]]);
    				}
    				if(isset($items['permission'.$i])){
						$item->syncPermissions($items['permission'.$i]);
					}
    			}
    		}
    		if(isset($items['delete'])){
    			Role::whereIn('id', $items['delete'])->delete();
    		}
    		return redirect()->route('roles.index');
    	}
    	$role = new Role;
    	$items = Role::where('name','!=','users')->get();
    	$permissions = Permission::orderBy('title')->pluck('title', 'id');
        return view('admin.roles.index', compact('role','items','permissions'));
    }
}
