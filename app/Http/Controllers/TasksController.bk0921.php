<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //task一覧を取得
        $tasks = Task::all();
        
        //メッセージ一覧ビューでそれを表示
        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」 
    public function create()
    {
        $task = new Task;
        
        //タスク作成ビューを表示
        return view('tasks.create',[
            'task' => $task,    
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでtasks/にアクセスされた場合の「新規登録処理」 
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required',
        ]);
        
        //タスクを作成
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        //トップページへダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/（任意のid）にアクセスされた場合の「取得表示処理」 
    public function show($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        //タスク詳細ビューでそれを表示
        return view('tasks.show', [
            'task' => $task,    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」 
    public function edit($id)
    {
        //idの値タスクを検索して取得
        $task = Task::findOrFail($id);
        
        //タスク変種ビューでそれを表示
        return view('tasks.edit', [
            'task' => $task,    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // putまたはpatchでtasks/（任意のid）にアクセスされた場合の「更新処理」 
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required',
        ]);
        
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        $task->status = $request->status;        
        $task->content = $request->content;
        $task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // deleteでtasks/（任意のid）にアクセスされた場合の「削除処理」 
    public function destroy($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        //タスクを削除
        $task->delete();
        
        
        //トップぺージへリダイレクトされる
        return redirect("/");
    }
}
