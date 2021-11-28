<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MachinesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Machine;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MachinesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @param MachinesDataTable $machinesDataTable
     * @return Application|Factory|View
     *
     */
    public function index(MachinesDataTable $machinesDataTable)
    {
        return $machinesDataTable->render('admin.components.manufacture.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machine = new Machine();

        $categories = Category::all()->pluck("title_en", "id")->toArray();
        $categories[0] = 'Choose Category';
        ksort($categories);

        $manufactures = Manufacture::all()->pluck("title_en", "id")->toArray();
        $manufactures[0] = 'Choose Manufacture';
        ksort($manufactures);

        $sub_categories =[];
        $models =[];

        $sellers = User::all()->pluck("email", "id")->toArray();
        $sellers[0] = 'Choose Seller';
        ksort($sellers);

        $cities = City::all()->pluck("title_en", "id")->toArray();
        $cities[0] = 'Choose City';
        ksort($cities);

        return view('admin.components.machine.create', compact('machine','categories','manufactures','sub_categories','models','sellers','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create the slug
        $inputs = $request->all();
        $inputs['sku'] = random_int(10000000, 99999999);
        $model_title = MachineModel::findorFail($inputs['model_id'])->title_en;
        $inputs['slug'] = $inputs['year'].'-'.$inputs['manufacture_id'].'-'.$model_title.'-'.$inputs['sku'];

        $validator = Validator::make($inputs, Machine::$cast);
        if ($validator->fails()) {
            return redirect()->route('machines.create')->withErrors($validator)->withInput();
        }
        $machine = Machine::create($inputs);
        // $machine->save();
        return redirect()->route('machines.index')->with(['success' => 'Machine ' . __("messages.add")]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::findOrFail($id);
        return view('admin.components.machine.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        $categories = Category::all()->pluck("title_en", "id")->toArray();
        $categories[0] = 'Choose Category';
        ksort($categories);

        $manufactures = Manufacture::all()->pluck("title_en", "id")->toArray();
        $manufactures[0] = 'Choose Manufacture';
        ksort($manufactures);

        $sub_categories =[];
        $models =[];

        $sellers = User::all()->pluck("email", "id")->toArray();
        $sellers[0] = 'Choose Seller';
        ksort($sellers);

        $cities = City::all()->pluck("title_en", "id")->toArray();
        $cities[0] = 'Choose City';
        ksort($cities);

        return view('admin.components.machine.edit', compact('machine','categories','manufactures','sub_categories','models','sellers','cities'));
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
        $inputs = $request->all();
        $machine = Machine::find($id);
        $machine->update($inputs);
        return redirect()->route('machines.index')->with(['success' => 'Machine ' . __("messages.update")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->back()->with(['success' => 'Machine ' . __("messages.delete")]);
    }


        /**
     * Remove the specified resource from storage.
     *
     */
    public function fetchSubCategories(Request $request)
    {
        $input = $request->all();
        unset($input['token']);
        $sub_categories = SubCategory::where('category_id', $input['id'])->pluck("title_en", "id")->toArray();
        return $sub_categories;
    }

        /**
     * Remove the specified resource from storage.
     *
     */
    public function fetchMachineModels(Request $request)
    {
        $input = $request->all();
        unset($input['token']);
        $models = MachineModel::where('manufacture_id', $input['id'])->pluck("title_en", "id")->toArray();
        return $models;
    }
}
