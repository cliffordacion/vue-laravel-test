<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Part;
use \App\Models\Position;
use \App\Services\Combination;

class PartController extends Controller
{
    public function __construct(Combination $combination)
    {
        $this->combination = $combination;
    }

    public function upload(Request $request)
    {
            
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
            'name' => 'required|string',
            'position_id' => 'required|exists:positions,id'
        ]);

        $player = new Part;

        if ($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $player->name = $request->name;
            $player->position_id = $request->position_id;
            $player->path = '/storage/' . $file_path;
            $player->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
    }

    public function combination()
    {
        $positions = Position::query()
            ->whereHas('parts')
            ->with(['parts'])
            ->get();

        $partsArray = [];

        foreach ($positions as $position) {
            $partsArray[] = $position->parts->all();
        }
       
        $combinations = $this->combination->combinationMultiline($partsArray);
        return $combinations;
    }
}
