<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = ['status','content'];
    
    
    
    
    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    
    //タスクを持つユーザーは一人なので、userメソッドは単数形
    //「User.php」モデルを参照すること
    public function user()
    {
    
        //一対多の関係
        return $this->blelongsTo(User::class);
    }
    
}
