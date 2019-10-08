<?php
/**
 * author: Lynn
 * since: 2018/3/23 13:05
 */
namespace web\index\controller;

use chromephp\chromephp;
use model\BaseContentCategoryModel;
use model\BaseContentModel;
use model\BaseImgModel;
use model\BaseLinkModel;
use model\BaseMarkModel;
use model\BaseMessageModel;
use think\Config;


class Index extends BaseController{

    //构造函数
    public function __construct()
    {
        parent::__construct();
    }

    //官网首页
    public function index(){
        $cateList = BaseMarkModel::where(['is_good'=>1])->column('*','mark');
        foreach($cateList as &$v){
            $v['sublist'] = BaseContentModel::where(['mark'=>$v['mark']])->field('id,title,sendtime,description,img,mark')->order('is_good desc,sort asc,sendtime desc')->limit(8)->select();
        }
        $this->data['cateList'] = $cateList;
        $this->data['linkList'] = BaseContentCategoryModel::where(['mark'=>'Link'])->order('sort asc')->select();
        $this->data['bannerList'] = BaseImgModel::where(['position_id' => 35])->order('sort asc')->select();
        $this->data['nav'] = 'index';
        return view('index/index',$this->data);
    }

    //文章列表
    public function articlelist(){
        $this->data['mark'] = BaseMarkModel::get(['mark'=>$this->param['mark']]);
        if(!empty($this->param['cate_id'])){
            $this->data['cate'] = BaseContentCategoryModel::get($this->param['cate_id']);
            $where = ['cate_id'=>$this->param['cate_id']];
        }elseif($this->param['mark'] == 'Link'){
            $where = [];
        }else{
            $where = ['mark'=>$this->param['mark']];
        }
        if($this->data['mark']['mark'] == 'Link'){
            $this->data['list'] = BaseLinkModel::where($where)
                ->field('id,name as title,cate_id,linkurl,sort')
                ->order('sort asc')
                ->paginate('','',['query'=>$this->param]);
        }elseif($this->data['mark']['mark'] == 'Message'){
            $this->data['list'] = BaseMessageModel::field('id,message as title,isstate,sendtime')
                ->order('sendtime desc')
                ->paginate('','',['query'=>$this->param]);
        }else{
            $this->data['list'] = BaseContentModel::where($where)
                ->order('sort asc,sendtime desc')
                ->paginate('','',['query'=>$this->param]);
        }

        $this->data['page']   = $this->data['list']->render();

        $this->data['type'] = $this->param['type'];
        $this->data['nav'] = $this->param['mark'];
        $this->data['cateList'] = BaseContentCategoryModel::where(['mark'=>$this->param['mark']])->order('sort asc')->select();
        if($this->param['type'] == 'nav' && count($this->data['list']) == 1){
//            var_dump($this->data['list'][0]);
            $this->data['content'] = $this->data['list'][0];
            unset($this->data['list']);
            return view('index/detail',$this->data);
        }
        return view('index/list',$this->data);
    }

    //文章详情
    public function articledetail(){

        $this->data['mark'] = BaseMarkModel::get(['mark'=>$this->param['mark']]);
        $this->data['type'] = $this->param['type'];
        $this->data['nav'] = $this->param['mark'];
        $this->data['cateList'] = BaseContentCategoryModel::where(['mark'=>$this->param['mark']])->order('sort asc')->select();

        if($this->data['nav'] == 'Message'){
            $this->data['content'] = BaseMessageModel::get(['id'=>$this->id]);
            return view('index/message',$this->data);
        }else{
            $this->data['content'] = BaseContentModel::get(['id'=>$this->id]);
            if(!empty($this->data['content']['cate_id'])){
                $this->data['cate'] = BaseContentCategoryModel::get($this->data['content']['cate_id']);
            }
            return view('index/detail',$this->data);
        }
    }

    //写信件
    public function sendmessage(){

        $this->data['nav'] = 'Message';
        $this->data['mark'] = BaseMarkModel::get(['mark'=>'Message']);
        if($this->request->isPost()){
            $info = BaseMessageModel::where($this->param)->find();
            if(!empty($info)) return ['code'=>0,'msg'=>'不能重复提交信件'];
            $this->param['sendtime'] = time();
            if(BaseMessageModel::create($this->param)){
                return ['code'=>1,'msg'=>'信件提交成功'];
            }else{
                return ['code'=>0,'msg'=>'信件提交失败'];
            }

        }
        return view('sendmessage',$this->data);
    }

    public function downfile()
    {
        $file = BaseContentModel::get($this->id);
        $filename= Config::get('upload.img_url').$file['img'];
        $name = $file['title'].'.'.explode('.',$file['img'])[1];
        Header( "Content-type:  application/octet-stream ");
        Header( "Accept-Ranges:  bytes ");
        Header( "Accept-Length: " .readfile($filename));
        header( "Content-Disposition:  attachment;  filename= {$name}");
        echo file_get_contents($filename);
        readfile($filename);
    }

    public function nav(){

        return view('index/nav',$this->data);
    }

    



}