<?php


namespace Helper;

class CurlTool
{
    /**
     * description:
     * @Date: 2020/1/9 16:50
     * @param $url string 请求的url地址
     * @param $data array 参数(默认是null)
     * @param $header array http-header(默认是json)
     * @return mixed
     */
    public function curlRequest($url, $data = null, $header = ['Content-Type:application/json'])
    {
        if (in_array('Content-Type:application/json',$header)) {
            $data = json_encode($data);
        }
        //初始化
        $curl = curl_init();
        //设置url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置https
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        //如果传递了数据，则使用POST请求
        if (!is_null($data)) {
            //开启post模式
            curl_setopt($curl, CURLOPT_POST, 1);
            //设置post数据
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        if (!is_null($header)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }
        //结果返回成字符串  如果是0  则是直接输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行
        $output = curl_exec($curl);
        //释放资源
        curl_close($curl);
        return $output;
    }

    /**
     * description:
     * @Date: 2020/1/10 17:37
     * @param:
     * @return:
     * @author: yangguang
     */
    public function test()
    {
        echo 'this is a test  !';
    }
}