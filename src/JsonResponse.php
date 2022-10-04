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
        $data = [
            'code' => 1,
            'msg' => 'ok',
            'data' => $data
        ];
        return response()->json($data)->setStatusCode(200);
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
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];

        return response()->json($data)->setStatusCode(200);
    }

}