<?php

namespace common\components;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class StorageHelper
{
    /**
     * Upload an UploadedFile object. 
     * Driver is determined by UPLOAD_DRIVER in .env.
     * 
     * @param UploadedFile $file
     * @param string $localPath Alias or path for local storage (e.g. '@public/uploads/news/')
     * @return string|null The URL (if imgbb) or filename (if local).
     */
    public static function upload(UploadedFile $file, $localPath = null)
    {
        $driver = $_ENV['UPLOAD_DRIVER'] ?? 'local';

        if ($driver === 'imgbb') {
            return self::uploadToImgBB($file);
        }

        return self::uploadToLocal($file, $localPath);
    }

    /**
     * Upload to ImgBB
     */
    private static function uploadToImgBB(UploadedFile $file)
    {
        $apiKey = $_ENV['IMGBB_API_KEY'] ?? null;
        if (!$apiKey) {
            Yii::error("IMGBB_API_KEY not found in .env", __METHOD__);
            return null;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        $data = [
            'image' => base64_encode(file_get_contents($file->tempName)),
        ];
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // Tambahkan timeout agar tidak menggantung jika API lambat
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            Yii::error("Curl error: " . curl_error($ch), __METHOD__);
            return null;
        }
        curl_close($ch);

        $response = json_decode($result, true);
        if (isset($response['success']) && $response['success']) {
            // Gunakan display_url untuk direct link ke gambar, bukan URL viewer
            return $response['data']['display_url'] ?? $response['data']['url'];
        }

        Yii::error("ImgBB Upload failed: " . ($response['error']['message'] ?? 'Unknown error'), __METHOD__);
        return null;
    }

    /**
     * Upload to Local
     */
    private static function uploadToLocal(UploadedFile $file, $localPath)
    {
        if (!$localPath) {
            Yii::error("Local path not provided for local driver", __METHOD__);
            return null;
        }

        $directory = Yii::getAlias($localPath);
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        $filename = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $file->extension;
        if ($file->saveAs($directory . $filename)) {
            return $filename;
        }

        return null;
    }

    /**
     * Check if a string is a valid URL.
     */
    public static function isUrl($path)
    {
        return filter_var($path, FILTER_VALIDATE_URL) !== false;
    }
}
