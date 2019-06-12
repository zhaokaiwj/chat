<?php

namespace App\Http\Controllers\Mongo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Client;
use Illuminate\Support\Facades\Auth;
class MongoController extends Controller
{
    public $host;
    public $client;
    public function __construct()
    {
        $this->host = "mongodb://localhost:27017";
        $this->client = new Client($this->host);
    }

    /*
     * 添加数据库
     */
    public function index()
    {
        $connect = $this->client->a1809->a1809;
        $res = $connect->insertOne(['name'=>"赵恺",'age'=>'aaaaaa']);
//        $res = $connect->insertMany([['name'=>"wnagwu",'age'=>'99'],['name'=>'qqqqqq','age'=>100,'email'=>'1@1.com']]);
        dump($res);
    }
    /*
     * 查询数据库
     */
    public function found()
    {
        $connect = $this->client->a1809->a1809;
        //单
//        $res = $connect->findOne(['name'=>"wnagwu"]);
        //多-》数组
//        $res = $connect->find(['name'=>"wnagwu"])->toArray();
//        print_r($res);
        //多-》对象
        $res = $connect->find(['name'=>"wnagwu"]);
        foreach($res as $k){
            print_r($k);
        }
    }
    /*
     * 删除
     */
    public function del()
    {
        $connect = $this->client->a1809->a1809;
//        $res = $connect->deleteOne(['name'=>'lvmingjin']);

        $res = $connect->deleteMany(['name'=>'zhangsan']);
        dump($res);
    }
    /*
     * 修改
     */
    public function upd()
    {
        $connect = $this->client->a1809->a1809;
//        $res = $connect->updateOne(['name'=>'aaaaaaa'],['$set'=>['name'=>'bbbbbb','age'=>'bbbbbb']]);
        $res = $connect->updateMany(['name'=>'aaaaaaa'],['$set'=>['name'=>'bbbbbb','age'=>'bbbbbb']]);
        dump($res);
    }
    public function ws()
    {
        $uid = Auth::id();
        $uname = Auth::user()->name;
        return view('test',['uid'=>$uid,'uname'=>$uname]);
    }
}
