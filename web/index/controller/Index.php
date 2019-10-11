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
        $this->data['linkList'] = BaseContentCategoryModel::where(['mark'=>'Link'])->order('sort asc')->select();
        $this->data['banner'] = BaseImgModel::where(['position_id' => 1])->order('sort asc')->value('url');
        $this->data['bannerList'] = BaseImgModel::where(['position_id' => 44])->order('sort asc')->select();
        $this->data['peopleList'] = BaseContentModel::where(['is_good'=>1,'cate_id'=>85])->field('id,cate_id,mark,title,description,img')->order('sort asc,sendtime desc')->limit(16)->select();
        $this->data['caseList'] = BaseContentModel::alias('a')
            ->join('tp_base_content_category b','a.cate_id = b.id','left')
            ->where(['is_good'=>1,'a.mark'=>'Anli'])
            ->field('a.id,cate_id,a.mark,a.title,a.img,b.name')
            ->order('a.sort asc,a.sendtime desc')
            ->limit(12)
            ->select();
        $this->data['about'] = BaseContentModel::where(['cate_id'=>89])->field('id,cate_id,mark,title,description,img')->order('sort asc,sendtime desc')->find();
        $this->data['messageList'] = BaseContentModel::where(['is_good'=>1,'cate_id'=>96])->field('id,cate_id,mark,title,description,img,sendtime')->order('sort asc,sendtime desc')->limit(6)->select();
        $this->data['markList'] = BaseMarkModel::where(['is_good'=>1])->order('sort asc')->limit(4)->select();

        $this->data['kehuList'] = BaseLinkModel::where(['cate_id'=>93])->order('sort asc')->limit(18)->select();
        $this->data['hezuoList'] = BaseLinkModel::where(['cate_id'=>94])->order('sort asc')->limit(18)->select();
        $this->data['xiezhuList'] = BaseLinkModel::where(['cate_id'=>95])->order('sort asc')->limit(18)->select();

        $this->data['nav'] = 'index';
        return view('index/index',$this->data);
    }

    //文章列表
    public function articlelist(){
        $this->data['mark'] = BaseMarkModel::get(['mark'=>$this->param['mark']]);
        $this->data['banner'] = BaseImgModel::where(['position_id' => $this->data['mark']['id']])->order('sort asc')->value('url');
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
        $this->data['banner'] = BaseImgModel::where(['position_id' => $this->data['mark']['id']])->order('sort asc')->value('url');
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