<?php
/**
     * Name Code: APi TikTok
     * Author: Vũ Duy Lực
     * Phone Contact: 0836.851.125
     * Email Contact: mm135712334@gmail.com
     * Facebook Contact: fb.com/kunkey.riox
    */

class Tiktok_Api{
    public $api_url;
    public $cookies_dir;
    public $setUser;

    public function __construct($settings = [])
    {
        $this->api_url = 'https://api2.musical.ly/';
    }
    
  // encode username and password dang nhap    
    public function eni($str){
         $key = 5;
         $result = '';
    foreach (str_split($str) as $s) {
	 $result .= dechex(ord($s) ^ $key);
    }
    return $result;
    }

  
    public function login($username,$password,$captcha = null)
    {
        $this->setUser = 'data/'.$username.'.txt';
        return $this->request('passport/user/login/?'.$this->requestArray().'&mix_mode=1&username='.$this->eni($username).'&email=&mobile=&account=&password='.$this->eni($password).'&captcha='.$captcha.'&app_type=normal');
    }
  

    
    public function userInfo($user_id){
        return $this->request('aweme/v1/user/?user_id='.$user_id.'&'.$this->requestArray());
    }

    public function userMedias($user_id,$max_cursor = 0){
        return $this->request('aweme/v1/aweme/post/?max_cursor='.$max_cursor.'&user_id='.$user_id.'&count=10&retry_type=no_retry&'.$this->requestArray());
    }

    public function userFollowers($user_id,$max_time = null){
        if($max_time == null){ $max_time = (time() *1000); }
        return $this->request('aweme/v1/user/follower/list/?user_id='.$user_id.'&count=10&max_time='.$max_time.'&retry_type=no_retry&'.$this->requestArray());
    }

    public function userFollowing($user_id,$max_time = null){
        if($max_time == null){ $max_time = (time() *1000); }
        return $this->request('aweme/v1/user/following/list/?user_id='.$user_id.'&count=10&max_time='.$max_time.'&retry_type=no_retry&'.$this->requestArray());
    }

    public function getVideoDetail($video_id){
        return $this->request('aweme/v1/aweme/detail/?aweme_id='.$video_id.'&'.$this->requestArray());
    }

    public function getComments($video_id,$cursor = 0){
        return $this->request('aweme/v1/comment/list/?aweme_id='.$video_id.'&comment_style=2&digged_cid&insert_cids&?count=100&cursor='.$cursor.'&'.$this->requestArray());
    }
//Follower
    public function follow($id){
        return $this->request('aweme/v1/commit/follow/user/?user_id='.$id.'&type=1&retry_type=no_retry&from=3&'.$this->requestArray());
    }
// Thả Tim
    public function heart($id){
        return $this->request('aweme/v1/commit/item/digg/?aweme_id='.$id.'&type=1&retry_type=no_retry&'.$this->requestArray());
    }
// Api View Post (Tang View)
    public function viewPost($id){
        return $this->request('aweme/v1/aweme/stats/?'.$this->requestArray(),array(
            'aweme_type'  => 0,
            'play_delta'  => 1,
            'item_id'     => $id,            
        ));
    }
  
  public function CmtPost($id, $text){
        return $this->request('aweme/v1/comment/publish/?'.$this->requestArray(),array(
            'aweme_id'  => $id,
            'text'  => $text,
            'text_extra' => [],
            'is_self_see' => 0,
            'channel_id' => 0,                        
        ));
    }
  
  
  
  
    public function Verify(){
        return $this->outRequest('https://verification-va.byteoversea.com/get?'.$this->requestArray());
    }

    public function PopularCategory(){
        return $this->request('aweme/v1/category/list/?'.$this->requestArray());
    }

    public function ForYou(){
        return $this->request('aweme/v1/feed/?count=25&offset=0&max_cursor=0&min_cursor=0&type=0&is_cold_start=1&pull_type=0&req_from&'.$this->requestArray());
    }

  public function searchUser($username, $limit){
        return $this->request('aweme/v1/discover/search/?cursor=0&keyword='.$username.'&count='.$limit.'&type=1&hot_search=0&'.$this->requestArray());
    }

    public function searchHashtag($hashtag){
        return $this->request('aweme/v1/challenge/search/?cursor=0&keyword='.$hashtag.'&count=10&type=1&hot_search=0&'.$this->requestArray());
    }

    public function listHashtag($hashtagID,$cursor = 0){
        return $this->request('aweme/v1/challenge/aweme/?ch_id='.$hashtagID.'&count=20&offset=0&max_cursor=0&type=5&query_type=0&is_cold_start=1&pull_type=1&cursor='.$cursor.'&'.$this->requestArray());
    }


    public function headers(){
        return array(
            "Host" => $this->api_url,
            'X-SS-TC' => "0",
            'User-Agent' => "com.zhiliaoapp.musically/2018073102 (Linux; U; Android 10; vi_VN; Redmi Note 8 Pro; Build/QP1A.190711.020; Cronet/58.0.2991.0)",
            'Accept-Encoding' => "gzip",            
            'Connection' => "keep-alive",
            'X-Tt-Token' => "",
            'sdk-version' => "1",
        );
    }

    public function request($endpoint,$post = null){


        $curl = curl_init();
        $options = array(
            CURLOPT_URL => $this->api_url.$endpoint,
            CURLOPT_USERAGENT => 'com.zhiliaoapp.musically/2018073102 (Linux; U; Android 10; vi_VN; Redmi Note 8 Pro; Build/QP1A.190711.020; Cronet/58.0.2991.0)',
            CURLOPT_REFERER => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIEFILE => $this->setUser,
            CURLOPT_COOKIEJAR => $this->setUser,
            CURLOPT_HTTPHEADER => $this->headers()
        );
        if($post){
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $post;
        }
        curl_setopt_array($curl,$options);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

    public function outRequest($page,$post = null){
        $curl = curl_init();
        $options = array(
            CURLOPT_URL => $page,
            CURLOPT_USERAGENT => 'com.zhiliaoapp.musically/2018073102 (Linux; U; Android 10; vi_VN; Redmi Note 8 Pro; Build/QP1A.190711.020; Cronet/58.0.2991.0)',
            CURLOPT_REFERER => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIEFILE => $this->setUser,
            CURLOPT_COOKIEJAR => $this->setUser,
            CURLOPT_HTTPHEADER => $this->headers()
        );
        if($post){
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $post;
        }
        curl_setopt_array($curl,$options);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

    public function requestArray(){
        $items = array(
'app_language' => 'vi',
'manifest_version_code' => '2018073102',
'_rticket' => time(),
'iid' => '6799460632921310982',
'channel' => 'googleplay',
'language' => 'vi',
'fp' => '',
'device_type' => 'Redmi%20Note%208%20Pro',
'account_region' => 'VN',
'resolution' => '1080*2134',
'openudid' => '78ef5397bbb174dc',
'update_version_code' => '2018073102',
'sys_region' => 'VN',
'os_api' => '29',
'is_my_cn' => '1',
'timezone_name' => 'Asia/Ho_Chi_Minh',
'dpi' => '440',
'carrier_region' => 'VN',
'ac' => '4g',
'device_id' => '6796244118550824449',
'mcc_mnc' => '45204',
'timezone_offset' => '25200',
'os_version' => '10',
'version_code' => '800',
'carrier_region_v2' => '452',
'app_name' => 'musical_ly',
'version_name' => '8.0.0',
'device_brand' => 'Redmi',
'ssmix' => 'a',
'build_number' => '8.0.0',
'device_platform' => 'android',
'region' => 'VN',
'aid' => '1233',
'as' => 'a125f82abd20ce190d4355',
'cp' => '8403e956dedba399e1]uKy',
'mas' => md5(sha1(time()))
);

        foreach ($items as $key => $item){
            $packet[] = $key.'='.$item;
        }
        $implode = implode('&',$packet);
        return $implode;
    }


}



?>