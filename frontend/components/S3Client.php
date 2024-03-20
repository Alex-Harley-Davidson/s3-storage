<?php

namespace frontend\components;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client as AwsS3Client;
use Yii;
use Aws\Result;

class S3Client
{

    public $client;
    public function __construct()
    {
        $this->config = Yii::$app->params["s3"];

        $params = [
            "region" => $this->config["region"],
            "version" => "latest",
            "endpoint" => $this->config["endpoint"],
            "credentials" => [
                "key" => $this->config["key"],
                "secret" => $this->config["secretKey"],
            ]
        ];

        $this->client = new AwsS3Client($params);
    }

    /**
     * @param mixed $file
     * @param string $name
     * @return void
     */
    public function uploadFile(mixed $file, string $name): string|false
    {
        $params = [
            'Bucket' => $this->config["bucket"],
            'Key' => $name,
            'Body' => $file,
            'ACL' => $this->config["defaultAcl"],
        ];

        $result = $this->client->putObject($params);

        if ($result instanceof Result) {
            return $result->get("ObjectURL");
        }

        return false;

    }

}