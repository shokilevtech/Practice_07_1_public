<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Modelクラスのメソッド（get(), limit(), orderBy(), etc...）が使える

//Postモデルでdelete関数が実行されると論理削除が実行されるようにする
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body'
    ];
    
    public function getByLimit( int $limit_count = 10 )
    {
        // updated_atで降順に並べた後、limitで件数制限をかける
        return $this -> orderBy( 'updated_at', 'DESC' ) -> limit( $limit_count ) -> get();
    }
    
    public function getPaginateByLimit( int $limit_count = 5 )
    {
        // updated_atで降順に並べた後、limitで件数制限をかける
        return $this -> orderBy( 'updated_at', 'DESC' ) -> paginate( $limit_count );
    }
    
    
    
}

