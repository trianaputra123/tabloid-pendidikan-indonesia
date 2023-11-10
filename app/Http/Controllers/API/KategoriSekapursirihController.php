<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriSekapursirihController extends Controller
{
        /**
    *    @OA\Get(
    *       path="/kategori-Sekapursirih",
    *       tags={"Sekapursirih"},
    *       operationId="kategoriSekapursirih",
    *       summary="Kategori Sekapursirih",
    *       description="Mengambil Data Kategori Sekapursirih",
    *       @OA\Response(
    *           response="200",
    *           description="Ok",
    *           @OA\JsonContent
    *           (example={
    *               "success": true,
    *               "message": "Berhasil mengambil Kategori Sekapursirih",
    *               "data": {
    *                   {
    *                   "id": "1",
    *                   "nama_kategori": "Ucapan",
    *                  }
    *              }
    *          }),
    *      ),
    *  )
    */
    public function listKategoriSekapursirih() {
        return 'true';
    }

    /**
     * @OA\Post(
     *     path="/login",
     *     tags={"Sekapursirih"},
     *     summary="Login Admin",
     *     description="Login Admin",
     *     operationId="login",
     *     @OA\Parameter(
     *          name="email",
     *          description="email address",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *       @OA\Response(
     *           response="200",
     *           description="Ok",
     *           @OA\JsonContent
     *           (example={
     *               "meta": {
     *                     "code":200,
     *                     "status": "success",
     *                     "message": "Authenticated"
     *                },
     *               "data": {
     *                      "acces_token": "01|xxxxACCESSTOKEN",
     *                      "token_type": "Bearer",
     *                       "user": {
     *                              "id":1,
     *                              "name": "triana",
     *                              "email": "triana@gmail.com",
     *                              "role": "Admin",
     *                      }
     *                }
     *          }),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        // Logika untuk menyimpan bsekapursirih baru
    }

}
