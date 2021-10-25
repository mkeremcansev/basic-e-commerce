<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Str;

class ContractController extends Controller
{
    public function list()
    {
        return view('Back.contracts');
    }

    public function contract()
    {
        return view('Back.create.contract');
    }

    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:150',
                'content' => 'required|min:5',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
            ]
        );
        $contract = new Contract;
        $contract->fill($fill);
        $contract->slug = Str::slug($request->title, '-');
        $contract->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $contract = Contract::findOrFail($id);
        return view('Back.update.contract', compact('contract'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'content' => 'required|min:5',
            ],
            [
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
            ]
        );
        $contract = Contract::findOrFail($id);
        $contract->content = $request->content;
        $contract->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
