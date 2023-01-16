<?php

namespace Zyan\JsonResponse;

/**
 * Trait JsonResponse
 * @package Zyan\JsonResponse
 */

trait JsonResponse
{
    /**
     * success.
     *
     * @param array $data
     *
     * @return resource
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function success($data = [])
    {
        $msg = 'ok';
        if(is_string($data)){
            $msg = $data;
            $data = [];
        }
        return $this->jsonReturn(1,$msg,$data);
    }

    /**
     * error.
     *
     * @param string $msg
     * @param array $data
     * @param int $code
     *
     * @return resource
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function error($msg = '操作失败', $data = [], $code = 0)
    {
        return $this->jsonReturn($code,$msg,$data);
    }

    /**
     * jsonReturn.
     *
     * @param int $code
     * @param string $msg
     * @param array $data
     *
     * @return resource
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function jsonReturn($code,$msg,$data=[]){
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return response()->json($data)->setStatusCode(200);
    }

}