<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\CustomField;
use App\Model\PostType;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    public function index()
    {
        $customFields = CustomField::where('post_parent', null)->where('status', 'Active')->get();
        return view('admin.custom_field.index', compact('customFields'));
    }

    public function create()
    {
        $postTypes = PostType::where('status', 'Active')->orderBy('position', 'ASC')->get();
        return view('admin.custom_field.create', compact('postTypes'));
    }

    public function store(Request $request)
    {
        try{
            $customfield = new CustomField();
            $customfield->title = $request->title;
            $customfield->status = $request->status;
            $customfield->post_content = $request->description;
            $customfield->post_type = $request->post_type;
            $customfield->field_position = $request->field_position;
            $response = $customfield->save();

            if ($response){
                if (isset($request['field'])) {
                    $this->updateOrCreateField($request, $customfield);
                }

                return redirect()->back()->with('success', 'Custom Field Successfully Created.');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while creating Custom Field.');
        }


    }


    public function show($id)
    {
        //
    }


    public function edit($slug)
    {
        $customField = CustomField::where('slug', $slug)->first();


        foreach ($customField->childrens as $children){

            $children->child = unserializeCustomFeild($children->post_content);

        }

        $postTypes = PostType::where('status', 'Active')->orderBy('position', 'ASC')->get();
        return view('admin.custom_field.edit', compact('postTypes', 'customField'));
    }


    public function update(Request $request)
    {

        try{
            $customfield = CustomField::where('id', $request->custom_field_id)->first();
            $customfield->title = $request->title;
            $customfield->status = $request->status;
            $customfield->post_content = $request->description;
            $customfield->post_type = $request->post_type;
            $customfield->field_position = $request->field_position;
            $response = $customfield->update();

            if ($response){
                if (isset($request['field'])) {
                    $this->updateOrCreateField($request, $customfield);
                }
                return redirect()->back()->with('success', 'Custom Field Successfully Updated.');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while updating Custom Field.');
        }

    }

   
    public function destroy($id)
    {
        //
    }

    public function deleteField($id)
    {
        $customField = CustomField::where('id', $id)->first();
        if ($customField){
            $customField->delete();
            return redirect()->back()->with('success', 'Custom Field Successfully Deleted.');
        }
        return redirect()->back()->with('error', 'Error while Deleting Custom Field.');
    }


    public function getField(Request $request){

        $field_type = $request->field_type;
        $field_count = $request->field_count;
        $random_integer = $request->random_integer;
        $postTypes = PostType::where('status', 'Active')->get();
        return view('admin.custom_field.field', compact('field_count', 'field_type', 'random_integer', 'postTypes'));
    }


    public function filedPosition($slug){

        $customField = CustomField::where('slug', $slug)->first();
        if($customField){
            return view('admin.custom_field.order', compact( 'customField'));
        }
        return redirect()->back()->with('error', 'Empty Filed!!!');
    }


    public function orderStore(Request $request){
        foreach ($request->position as $key => $item){
            $postType=CustomField::where('id', $item)->first();
            $postType->position = $key;
            $postType->update();
        }

        return response()->json([
            'status' => 'success',
        ], 201);
    }


    public function updateOrCreateField($request, $customfield){
        if (isset($request['field']['title'])){
            $field_titles= $request['field']['title'];
        }
        if (isset($request['field']['name'])){
            $field_names = $request['field']['name'];
        }
        if (isset($request['field']['type'])){
            $field_types= $request['field']['type'];
        }
        if (isset($request['field']['instruction'])){
            $field_instructions = $request['field']['instruction'];
        }
        if (isset($request['field']['required'])){
            $field_requireds = $request['field']['required'];
        }
        if (isset($request['field']['placeholder'])){
            $field_placeholders = $request['field']['placeholder'];
        }
        if (isset($request['field']['checkbox'])){
            $field_checkbox = $request['field']['checkbox'];
        }
        if (isset($request['field']['select'])){
            $field_select = $request['field']['select'];
        }
        if (isset($request['field']['repeater'])){
            $field_repeaters = $request['field']['repeater'];
        }
        if (isset( $request['field']['file_size'])){
            $field_file_sizes = $request['field']['file_size'];
        }
        if (isset( $request['field']['multiselect'])){
            $field_multiselect = $request['field']['multiselect'];
        }
        if (isset( $request['field']['post_type'])){
            $field_post_type = $request['field']['post_type'];
        }


        $fieldsKeys = array_keys($field_titles);

        foreach ($fieldsKeys as $fieldsKey) {

            $newArray = [];

            if(isset($field_names[$fieldsKey])){
                $newArray['field_name'] = $field_names[$fieldsKey];
            }

            if(isset($field_instructions[$fieldsKey])){
                $newArray['instruction'] = $field_instructions[$fieldsKey];
            }

            if(isset($field_requireds[$fieldsKey])){
                $newArray['required'] = $field_requireds[$fieldsKey];
            }

            if(isset($field_placeholders[$fieldsKey])){
                $newArray['placeholder'] = $field_placeholders[$fieldsKey];
            }

            if(isset($field_select[$fieldsKey])){
                $newArray['repeater'] = $field_select[$fieldsKey];
            }

            if(isset($field_checkbox[$fieldsKey])){
                $newArray['repeater'] = $field_checkbox[$fieldsKey];
            }

            if(isset($field_repeaters[$fieldsKey])){
                $newArray['repeater'] = $field_repeaters[$fieldsKey];
            }

            if(isset($field_file_sizes[$fieldsKey])){
                $newArray['file_size'] = $field_file_sizes[$fieldsKey];
            }

            if(isset($field_multiselect[$fieldsKey])){
                $newArray['multiselect'] = $field_multiselect[$fieldsKey];
            }

            if(isset($field_post_type[$fieldsKey])){
                $newArray['post_type'] = $field_post_type[$fieldsKey];
            }

            CustomField::updateOrCreate(['id'=>$fieldsKey],[
                'title' => $field_titles[$fieldsKey],
                'post_content' => serialize($newArray),
                'field_type' => $field_types[$fieldsKey],
                'post_parent' => $customfield->id,
            ]);


        }
    }
}
