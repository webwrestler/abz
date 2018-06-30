<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;
    use ValidatesRequests;
    /**
     *
     * @var array
     */
    protected $fillable = [
        'chief_id', 'first_name', 'midlle_name', 'last_name', 'email',
        'password', 'images', 'status', 'wage', 'position',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if($this->status == 1 )
        {
            return true;
        }
        return false;
    }
    public function scopeTree($query)
    {
        return $query->where('id', '<', 50);
    }

    static function getListUser()
    {
        $users = User::tree()->get()->toArray();
        foreach($users as $index => $user){
            $users[$index]['icon'] = 'glyphicon glyphicon-stop';
            $users[$index]['selectedIcon'] = 'glyphicon glyphicon-stop';
            $users[$index]['color'] = '#000000';
            $users[$index]['backColor'] = '#FFFFFF';
            $users[$index]['FIO'] = $user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name'];
            $users[$index]['text'] = 'Position: ' . $user['position'] . ', F.I.O.: ' . $users[$index]['FIO'] . ', wage:' .  $user['wage'];
        }
        return self::buildTreeChief($users);
    }

    static function buildTreeChief($users)
    {
        $tree = [];
        foreach ($users as &$value)
        {
            $tree[$value['id']] = &$value; //id - chef_id
        }

        foreach ($users as &$value)
        {
            if($value['chief_id'] && isset($tree[$value['chief_id']]))
            {
                $tree[$value['chief_id']]['nodes'][] = &$value;
            }
        }

        foreach ($users as $key=>&$value)
        {
            if($value['chief_id'] && isset($tree[$value['chief_id']]))
            {
                unset($users[$key]);
            }
        }
        return $users;
    }

    static function getChiefs()
    {
      return DB::select( DB::raw("SELECT * FROM `users` WHERE id IN (SELECT u2.chief_id FROM users u2 GROUP BY u2.chief_id) "));
    }

    public function createNewUser($request){

        $this->validate($request, [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'wage' => 'required',
            'images' => 'image',
        ]);

        $user = new User;

        $user->chief_id = $request->chief_id;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->position = $request->position;
        $user->wage = $request->wage;
        $nameImage = $request->images->getClientOriginalName();
        $image = $request->file('images');
        $user->images = $image->storeAs('images', $nameImage);

        $user->save();
    }

    public function updateUserId($id, $request){
        $this->validate($request, [
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'email' => 'email',
            'wage' => 'numeric',
            'images' => 'image',
        ]);

        $user = User::find($id);

        $user->chief_id = $request->chief_id;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->position = $request->position;
        $user->wage = $request->wage;
        $nameImage = $request->images->getClientOriginalName();
        $image = $request->file('images');
        $user->images = $image->storeAs('images', $nameImage);
        
        $user->save();
    }
}