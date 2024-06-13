<?php

namespace Modules\SecurityManage\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SecurityManage\Entities\Word;

class SecurityWordSettingsController extends Controller
{
    //all words
    public function all_word()
    {
        $words = Word::latest()->paginate(10);
        return view('securitymanage::backend.word.all-word',compact('words'));
    }

    //add word
    public function add_word(Request $request)
    {
        $request->validate([
            'word' => 'required|max:255|unique:words,word',
        ]);
        Word::create([
            'word' => $request->word,
        ]);
        return back()->with(toastr_success(__('Word Created Successfully.')));
    }

    //edit word
    public function edit_word(Request $request)
    {
        $request->validate([
            'edit_word'=> 'required|max:255|unique:words,word,'.$request->word_id,
        ]);
        Word::where('id',$request->word_id)->update([
            'word'=>$request->edit_word,
        ]);
        return back()->with(toastr_success(__('Word Successfully Updated')));
    }

    //status change
    public function change_status($id)
    {
        $word = Word::select('status')->where('id',$id)->first();
        $word->status=='active' ? $status='inactive' : $status='active';
        Word::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(toastr_success(__('Status Successfully Changed')));
    }

    // delete single word
    public function delete_word($id)
    {
        $word = Word::find($id);
        if($word){
            $word->delete();
            return redirect()->back()->with(toastr_success(__('Word Successfully Deleted')));
        }
    }

    // delete multi word
    public function bulk_action_word(Request $request){
        foreach($request->ids as $word_id){
            $word = Word::find($word_id);
            if($word){
                $word->delete();
            }
        }
        return back()->with(toastr_success(__('Selected Word Successfully Deleted')));
    }

    // pagination
    function pagination(Request $request)
    {
        if($request->ajax()){
            $words = Word::latest()->paginate(10);
            return view('securitymanage::backend.word.search-result',compact('words'));
        }
    }

    // search word
    public function search_word(Request $request)
    {
        $words= Word::where('word', 'LIKE', "%". strip_tags($request->string_search) ."%")->paginate(10);
        return $words->total() >= 1 ? view('securitymanage::backend.word.search-result', compact('words'))->render() : response()->json(['status'=>__('nothing')]);
    }
}