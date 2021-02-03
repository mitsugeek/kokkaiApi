<?php
namespace mitsugeek;

class KokkaiApi
{
    /**
     * APIの種類:会議単位簡易出力
     */
    public const API_MEETING_LIST = "meeting_list";

    /**
     * APIの種類:会議単位出力
     */
    public const API_MEETING = "meeting";

    /**
     * APIの種類:発言単位出力
     */
    public const API_SPEACH = "speech";

    /**
     * APIの種類
     */
    private string $api = "";

    /**
     * APIの種類(get)
     */
    public function getApi(): string
    {
        return $this->api;
    }

    /**
     * APIの種類(set)
     */
    private function setApi(string $api){
        
        if($api == self::API_MEETING_LIST){
            $this->api = self::API_MEETING_LIST;
            $this->maximumRecord = 30;
        }
        else if($api == self::API_MEETING){
            $this->api = self::API_MEETING;
            $this->maximumRecord = 1;
            $this->maximumRecord = 30;
        }
        else if($api == self::API_SPEACH){
            $this->api = self::API_SPEACH;
            $this->maximumRecord = 1;
            $this->maximumRecord = 3;
        }
        else {
            //error
            throw new \Exception('$api must set.');
        }
    }
    



    /**
     * 開始位置
     */
    private int $startRecord = 1;

    /**
     * 開始位置(Get)
     */
    public function getStartRecord(): int
    {
        return $this->startRecord;
    }

    /**
     * 開始位置(Set)
     */
    public function setStartRecord(int $startRecord){
        $this->startRecord = $startRecord;
    }

    /**
     * 一回の最大取得件数
     */
    private int $maximumRecords;

    /**
     * 一回の最大取得件数(get)
     */
    public function getMaximumRecords(){
        return $this->maximumRecords;
    }

    /**
     * 一回の最大取得件数(set)
     */
    public function setMaximumRecords(int $maximumRecords){
        if($this->getApi() === self::API_SPEACH || $this->getApi() === self::API_MEETING_LIST){
            if(1 <= $maximumRecords && $maximumRecords <= 100){        
                $this->maximumRecords = $maximumRecords;
            } else {
                //error
                throw new \Exception('$maximumRecords is 1 ~ 100');
            }
        } else if($this->getApi() === self::API_MEETING){
            if(1 <= $maximumRecords && $maximumRecords <= 10){        
                $this->maximumRecords = $maximumRecords;
            } else {
                //error
                throw new \Exception('$maximumRecords is 1 ~ 10');
            }
        }
    }

    /**
     * 院名:衆議院
     */
    public const NAME_OF_HOUSE_REPRESENTAIVES = "衆議院";

    /**
     * 院名:参議院
     */
    public const NAME_OF_HOUSE_COUNCILORS = "参議院";

    /**
     * 院名:両院
     */
    public const NAME_OF_HOUSE_BOTH = "両院";

    /**
     * 	院名
     */
    private string $nameOfHouse = "";

    /**
     * 院名(get)
     */
    public function getNameOfHouse(){
        return $this->nameOfHouse;
    }
    
    /**
     * 院名(set)
     */
    public function setNameOfHouse(string $nameOfHouse){
        $this->nameOfHouse = $nameOfHouse;
    }




    



    /**
     * コンストラクタ
     */
    public function __construct($api)
    {
        $this->setApi($api);
    }

}