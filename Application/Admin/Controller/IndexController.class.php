<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {

	public function index(){
		//获取所有分类
		$category = D('Category');

		$linkType = $category->findAll();

		$this->linkType = $linkType;
        $this->display();
    }

	//后台添加超链接
	public function addLink(){
		$link = D('Link');
		//获取写入数据
		$data['name'] = I('post.name');
		$data['link'] = I('post.link');
		$data['description'] = I('post.description');
		$data['category'] = I('post.category');
		// 根据表单提交的POST数据创建数据对象
		$res = $link->add($data);
		if($res){
			$this->success("成功！");
		}
		$this->error("已存在！");
	}


}