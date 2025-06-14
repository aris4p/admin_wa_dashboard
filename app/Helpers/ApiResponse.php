<?php
namespace App\Helpers;

class ApiResponse
{
    /**
     * Format untuk respons sukses.
     *
     * @param  mixed   $data
     * @param  string  $message
     * @param  int     $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, string $message = 'OK', int $statusCode = 200)
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }

    /**
     * Format untuk respons error.
     *
     * @param  string     $message
     * @param  int        $statusCode
     * @param  array|null $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(string $message = 'Something went wrong', int $statusCode = 500, ?array $errors = null)
    {
        $payload = [
            'status'  => 'error',
            'message' => $message,
        ];
        if ($errors !== null) {
            $payload['errors'] = $errors;
        }

        return response()->json($payload, $statusCode);
    }
}
