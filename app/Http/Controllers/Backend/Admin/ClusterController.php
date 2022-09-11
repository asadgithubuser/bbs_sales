<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\Mouza;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Cluster;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'manage_cluster', 'allClusters');
        $user = Auth::user();
        if(Gate::allows('manage_cluster', $user))
        {
            if(Gate::allows('all_clusters', $user))
            {

                $clusters = Cluster::with('division', 'district', 'upazila', 'union', 'mouza')->orderBy('id', 'asc')->paginate(15);
                
                // dd($clusters);
                return view('backend.admin.cluster.index', compact('clusters'));

            }else{
                abort(403);
            }

        }else{
            abort(403);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenuSubsubmeny('location', 'manage_cluster', 'addCluster');

        $user = Auth::user();
        
        if(Gate::allows('manage_cluster', $user))
        {
            if(Gate::allows('add_cluster', $user))
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();

                return view('backend.admin.cluster.create', compact('divisions', 'districts', 'upazilas', 'unions'));

            }else{
                abort(403);
            }
        }else{
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        menuSubmenuSubsubmeny('location', 'manage_cluster', 'addCluster');
        $user = Auth::user();

        if(Gate::allows('manage_cluster', $user))
        {
            if(Gate::allows('add_cluster', $user))
            {
                $request->validate([
                    'name_bn' => 'required',
                    'name_en' => 'required',
                    'cluster_code' => 'required',
                    'division_id' => 'required',
                    'district_id' => 'required',
                    'upazila_id' => 'required',
                    'union_id' => 'required',
                    'mouza_id' => 'required',
                ]);
                
                $cluster = new Cluster;
                $cluster->name_bn = $request->name_bn;
                $cluster->name_en = $request->name_en;
                $cluster->code = $request->cluster_code;
                $cluster->division_id = $request->division_id;
                $cluster->district_id = $request->district_id;
                $cluster->upazila_id = $request->upazila_id;
                $unions = $request->union_id;
                $cluster->union_id = implode(',', $unions);
                $mouzas = $request->mouza_id;
                $cluster->mouza_id = implode(',', $mouzas);
                $cluster->status = $request->status;
                $done = $cluster->save();

                if($done)
                {
                    return redirect()->route('admin.cluster.index')->with('success', 'Cluster added successfully.');
                }else{
                    return redirect()->route('admin.cluster.index')->with('error', 'Something is missing, Please try a fresh one.');
                }

            }else{
                
                abort(403);
            }

        }else{

            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenuSubsubmeny('location', 'manage_cluster', 'allClusters');
        $user = Auth::user();
        if(Gate::allows('manage_cluster', $user))
        {
            if(Gate::allows('add_cluster', $user))
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $cluster = Cluster::with('division', 'district', 'upazila', 'union', 'mouza')->where('id', $id)->first();
                // dd($cluster);

                return view('backend.admin.cluster.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'cluster'));


            }else{
                
                abort(403);
            }

        }else{

            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        menuSubmenuSubsubmeny('location', 'manage_cluster', 'addCluster');
        $user = Auth::user();

        if(Gate::allows('manage_cluster', $user))
        {
            if(Gate::allows('add_cluster', $user))
            {
                $request->validate([
                    'name_bn' => 'required',
                    'name_en' => 'required',
                    'cluster_code' => 'required',
                    'division_id' => 'required',
                    'district_id' => 'required',
                    'upazila_id' => 'required',
                    'union_id' => 'required',
                    'mouza_id' => 'required',
                ]);
                
                $cluster = Cluster::where('id', $id)->first();
                $cluster->name_bn = $request->name_bn;
                $cluster->name_en = $request->name_en;
                $cluster->code = $request->cluster_code;
                $cluster->division_id = $request->division_id;
                $cluster->district_id = $request->district_id;
                $cluster->upazila_id = $request->upazila_id;
                $unions = $request->union_id;
                $cluster->union_id = implode(',', $unions);
                $mouzas = $request->mouza_id;
                $cluster->mouza_id = implode(',', $mouzas);
                $cluster->status = $request->status;
                $done = $cluster->save();

                if($done)
                {
                    return redirect()->route('admin.cluster.index')->with('success', 'Cluster Updated Successfully.');
                }else{
                    return redirect()->route('admin.cluster.index')->with('error', 'Something is missing, Please try again.');
                }

            }else{
                
                abort(403);
            }

        }else{

            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $user = Auth::user();
        if(Gate::allows('manage_cluster', $user))
        {
            $cluster = Cluster::where('id', $id)->first();
            
            if($cluster->status == 0)
            {
                $cluster->status = 1;
            }elseif($cluster->status == 1){
                $cluster->status = 0;
            }else{
                $cluster->status = 0;
            }
            $done = $cluster->save();
            if($done)
            {
                return redirect()->route('admin.cluster.index')->with('success', 'Status changed successfully.');
            }else{
                return redirect()->route('admin.cluster.index')->with('error', 'Something is missing, Please try a fresh one.');
            }

        }else{

            abort(403);
        }
    }
}
