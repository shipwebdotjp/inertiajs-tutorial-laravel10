<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Validator;

class BookmarkController extends Controller
{
    public function index () 
    {
        return Inertia::render('Bookmark/Index',['bookmarks' => fn() => Bookmark::all()]);
    }
    
    //検索メソッド
    public function search ($queryWord) 
    {
        return Inertia::render('Bookmark/Index',[
            'bookmarks' => Bookmark::Where(
                                'title', 'like', '%'.$queryWord.'%'
                            )->orWhere(
                                'url', 'like', '%'.$queryWord.'%'
                            )->get()
        ]);
    }

    //追加メソッド
    public function store (Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255', 'unique:App\Models\Bookmark,url'],
        ])->validate();

        $bookmark = new Bookmark;
        $bookmark->title = $request->title;
        $bookmark->url = $request->url;
        $bookmark->save();

        return to_route('bookmark.index')->with('message', '追加しました'); //追加後ブックマーク一覧ページへリダイレクト
    }

    //削除メソッド
    public function destroy ($id) 
    {
        Bookmark::destroy($id);
        return to_route('bookmark.index')->with('message', '削除しました'); //削除後ブックマーク一覧ページへリダイレクト
    }
}
