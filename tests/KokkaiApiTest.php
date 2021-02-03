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
     * 会議発言単位出力：境界値チェック
     */
    public function testSetMaximumRecordsBySpeach(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());

        
        $api->setMaximumRecords(100);
        $this->assertEquals(100, $api->getMaximumRecords());
    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位出力：境界値チェック
     */
    public function testSetMaximumRecordsBySpeachException1(): void
    {

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $api->setMaximumRecords(101);

    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議発言単位出力：境界値チェック
     */
    public function testSetMaximumRecordsBySpeachException2(): void
    {
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_SPEACH);
        $api->setMaximumRecords(0);

    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeeting(): void
    {
        //境界値
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());

        //境界値
        $api->setMaximumRecords(10);
        $this->assertEquals(10, $api->getMaximumRecords());

    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeetingException1(): void
    {
        //例外試験
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $api->setMaximumRecords(11);
    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeetingException2(): void
    {
        //例外試験
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING);
        $api->setMaximumRecords(0);
    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位簡易出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeetingList(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setMaximumRecords(1);
        $this->assertEquals(1, $api->getMaximumRecords());
        
        $api->setMaximumRecords(100);
        $this->assertEquals(100, $api->getMaximumRecords());
    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位簡易出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeetingListException1(): void
    {

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setMaximumRecords(101);

    }

    /**
     * 一回のリクエストで取得できるレコード数を、会議単位簡易出力、発言単位出力の場合は「1～100」、会議単位出力の場合は「1～10」の範囲で指定可能。
     * 会議単位簡易出力：境界値チェック
     */
    public function testSetMaximumRecordsByMeetingListException2(): void
    {

        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setMaximumRecords(0);

    }



    public function testNameOfHouse(): void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setNameOfHouse(KokkaiApi::NAME_OF_HOUSE_REPRESENTAIVES);
        $this->assertEquals(KokkaiApi::NAME_OF_HOUSE_REPRESENTAIVES, $api->getNameOfHouse());

        $api->setNameOfHouse(KokkaiApi::NAME_OF_HOUSE_COUNCILORS);
        $this->assertEquals(KokkaiApi::NAME_OF_HOUSE_COUNCILORS, $api->getNameOfHouse());

        $api->setNameOfHouse(KokkaiApi::NAME_OF_HOUSE_BOTH);
        $this->assertEquals(KokkaiApi::NAME_OF_HOUSE_BOTH, $api->getNameOfHouse());

    }


    public function testFrom():void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setFrom("0000-00-00");
        $this->assertEquals("0000-00-00", $api->getFrom());

        $api->setFrom("9999-12-31");
        $this->assertEquals("9999-12-31", $api->getFrom());
    }

    public function testFromException(): void
    {
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setFrom("0000000000");
    }

    public function testFromException2(): void
    {   
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setFrom("2020/01/01");
    }

    public function testFromException3(): void
    {   
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setFrom("01-01-01");
    }

    


    public function testUntil():void
    {
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setUntil("0000-00-00");
        $this->assertEquals("0000-00-00", $api->getUntil());

        $api->setUntil("9999-12-31");
        $this->assertEquals("9999-12-31", $api->getUntil());
    }

    public function testUntilException(): void
    {
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setUntil("0000000000");
    }

    public function testUntilException2(): void
    {   
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setUntil("2020/01/01");
    }

    public function testUntilException3(): void
    {   
        $this->expectException(Exception::class);
        $api = new KokkaiApi(KokkaiApi::API_MEETING_LIST);
        $api->setUntil("01-01-01");
    }
}