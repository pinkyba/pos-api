<?php
/**
 * public function
 */

/**
* controller apiResponse return
* API response message
* @param $msg 'success', 'fail' (message)
* @param $code
* @param $data (response data)
* @param $headers
*/
if (!function_exists('apiResponse')) {
    function apiResponse($msg = 'success', $code = 200, $data = '', $headers = [])
    {
        $content = [
            'code' => $code ? $code : 200,
            'msg' => $msg,
        ];
        $content['data'] = $data;
        return response($content, 200, $headers);
    }
}