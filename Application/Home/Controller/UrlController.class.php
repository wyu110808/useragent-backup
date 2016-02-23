<?php
namespace Home\Controller;
use Think\Controller;

//URL查询返回值
class UrlController extends Controller{


	public function index(){

        $agent=I('post.agent');
        $url=I('post.url');
        $canshu=I('post.canshu');
        $method=I('post.method');
        $url_get=$url.'?'.$canshu;
        $url_get=htmlspecialchars_decode($url_get);//将特殊的HTML实体转换回普通字符

        //echo $url_get;die;
        //test
        

        $post_name=I('post.post_name');
        $post_value=I('post.post_value');

        ///对post_name和post_value进行处理
        $post_name_arr=explode(',',$post_name);
        $post_value_arr=explode(',',$post_value);




        if($method=='post'){
            /////
            $post=array();

            foreach($post_name_arr as $k=>$v){
                $post[$v]=$post_value_arr[$k];
            }
        
            //var_dump($post);die;
         

            $result=$this->curl_file_post_contents($url,$agent,$post);
            $this->assign('result',$result);
        }


        if($method=='get'){
            $result=$this->curl_file_get_contents($url_get,$agent);
            //echo $result;die;
            $this->assign('result',$result);
        }

        
        //echo '111111';
        $this->display();
	}

    ///////////////////////////////////////////////////////////////
    //测试专用,与项目无关
    public function index2(){

        $url='http://api2.17zwd.com/rest/goods/get_item/?from=web&zdid=42&goods_id=3882225';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $output = curl_exec($ch);
        curl_close($ch); 

        echo $output;
    }

    ///////////////////////////////////////////////////////////
    //测试专用,与项目无关
    public function check_post(){
        $canshu=I('post.canshu');
        $h=I('post.h');
        echo $canshu.'<br/>';
        echo $h;
    }

    ///////////////////////////////////////////////////////
    

    /////////////////////////////////////////////////////////////
    //post传值抓取
    //$url 目标url；$agent ua类型的字符串; $data 传参的数组;
    public function curl_file_post_contents($url,$agent, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        if($agent!=''){
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        }else{ 
            curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
        }

        

        curl_setopt($ch, CURLOPT_REFERER, _REFERER_);

        curl_setopt($ch, CURLOPT_POST, 1); //设置为POST传输
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //添加post数据
        $output = curl_exec($ch);
        //var_dump($ch);


        ///////////////////////////////////////////////////////////
        if ($output === false) {  //判断错误
            echo curl_error($ch);
        }
        $info = curl_getinfo($ch);  //能够在cURL执行后获取这一请求的有关信息
        /////////////////////////////////////////////////////////////


        curl_close($ch);
        return $output;
    }


    ///////////////////////////////////////////////////////////////////////
    //get传值抓取
    //$url_get 目标url; $agent ua类型的字符串;
    public function curl_file_get_contents($url_get,$agent){

        //var_dump($url_get);
        //echo $url_get.'<br/>';
        //echo $agent;
        

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url_get);
        

        if($agent!=''){
            curl_setopt($ch,CURLOPT_USERAGENT,$agent);
        }else{ 
            curl_setopt($ch,CURLOPT_USERAGENT,_USERAGENT_);
        }


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        


       
        $output = curl_exec($ch);


        ////////////////////////////////////
        if($output === false) {  //判断错误
            echo curl_error($ch);
        }

        $info = curl_getinfo($ch);
        ///////////////////////////////////////

        curl_close($ch);

        //var_dump($info);
        return $output;
    }

	
   


}