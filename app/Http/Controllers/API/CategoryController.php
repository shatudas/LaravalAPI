<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
        $data['alldata'] = category::all();
        return response()->json($data);
       }


    public function store(Request $request){
        $this->validate($request,[
            'name'         =>'required',
            'item_id'      =>'required',
            'status'       =>'required'
            ]);

            $data = new category();
            $data->name    = $request->name;
            $data->item_id = $request->item_id;
            $data->status  = $request->status;
            $data->save();
            return response()->json($data);
    }



    public function edit($id){
        $editdata=Itecategory::find($id);
        $data['item'] =Item::where('status', 0)->get();
        return response()->json($editdata);
    }



    public function update(Request $request,$id){

        $this->validate($request,[
        'name'         =>'required',
        'item_id'      =>'required',
        'status'       =>'required'
        ]);

        $data = category::find($id);
        $data->name    = $request->name;
        $data->item_id = $request->item_id;
        $data->status  = $request->status;
        $data->save();
        return response()->json($data);
      }


        public function inactive($id)
        {
            category::find($id)->where('id',$id)->update(['status'=>1]);
            return response()->json($data);
        }


        public function active($id)
        {
            category::find($id)->where('id',$id)->update(['status'=>0]);
            return response()->json($data);
        }


        public function delete ($id)
        {
            $data = category::find($id);
            $data->delete();
            return response()->json($data);
         }







}
