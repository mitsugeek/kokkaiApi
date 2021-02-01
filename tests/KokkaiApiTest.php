<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use mitsugeek\KokkaiApi;

class KokkaiApiTest extends TestCase
{

    /**
     * コンストラクタ試験
     */
    public function testConstructByAPI_MEETING(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $this->assertEquals(KokkaiApi::API_MEETING, $api->getApi());
    }
    
    /**
     * コンストラクタ試験
     */
    public function testConstructByAPI_MEETING_LIST(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $this->assertEquals(KokkaiApi::API_MEETING_LIST, $api->getApi());
    }
    
    /**
     * コンストラクタ試験
     */
    public function testConstructByAPI_SPEACH(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $this->assertEquals(KokkaiApi::API_SPEACH, $api->getApi());
    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     */
    public function testSetMaximumRecordsBySpeach(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());

        
        $api->setMaximumRecords(10);
        $this->assertEquals(10, $api->getMaximumRecords());

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $api->setMaximumRecords(11);
        $this->assertEquals(11, $api->getMaximumRecords());
    }


    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     */
    public function testSetMaximumRecordsByMeeting(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());

        
        $api->setMaximumRecords(100);
        $this->assertEquals(100, $api->getMaximumRecords());

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $api->setMaximumRecords(101);
        $this->assertEquals(101, $api->getMaximumRecords());
    }


    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     */
    public function testSetMaximumRecordsByMeetingList(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());
        
        $api->setMaximumRecords(100);
        $this->assertEquals(100, $api->getMaximumRecords());

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setMaximumRecords(101);
        $this->assertEquals(101, $api->getMaximumRecords());
    }


}