<?php

namespace PagarMe\Sdk\Postback;

class PostbackBuilderTest extends \PHPUnit_Framework_TestCase
{
    use \PagarMe\Sdk\Postback\PostbackBuilder;

    /**
     * @test
     */
    public function mustCreatePostbackCorrectly()
    {
        $response = $this->getPostbackResponse();

        $postback = $this->buildPostback(json_decode($response));

        $this->assertInstanceOf(
            'PagarMe\Sdk\Postback\Postback',
            $postback
        );
        $this->assertInstanceOf(
            'PagarMe\Sdk\Postback\Payload',
            $postback->getPayload()
        );
        $this->assertInternalType('array', $postback->getDeliveries());
        $this->assertEquals(32, count($postback->getDeliveries()));
        $this->assertInstanceOf(
            '\DateTime',
            $postback->getDateCreated()
        );
        $this->assertInstanceOf(
            '\DateTime',
            $postback->getDateUpdated()
        );
    }

    private function getPostbackResponse()
    {
        return '{"object":"postback","status":"failed","model":"transaction","model_id":"1003499","headers":"{\"Content-Type\":\"application/x-www-form-urlencoded\",\"X-PagarMe-Event\":\"transaction_status_changed\",\"X-Hub-Signature\":\"sha1=a3ec935a9827e3aa0287cef561bdb0e70471ccb7\",\"User-Agent\":\"PagarMe-Hookshot/1.0\"}","payload":"id=1003499&fingerprint=2de7149a5337510d3ff7eb22a36483efd1db52a6&event=transaction_status_changed&old_status=processing&desired_status=paid&current_status=paid&object=transaction&transaction%5Bobject%5D=transaction&transaction%5Bstatus%5D=paid&transaction%5Brefuse_reason%5D=&transaction%5Bstatus_reason%5D=acquirer&transaction%5Bacquirer_response_code%5D=0000&transaction%5Bacquirer_name%5D=pagarme&transaction%5Bacquirer_id%5D=57ab081b0450e4bd51d52af8&transaction%5Bauthorization_code%5D=491541&transaction%5Bsoft_descriptor%5D=&transaction%5Btid%5D=1003499&transaction%5Bnsu%5D=1003499&transaction%5Bdate_created%5D=2016-12-30T17%3A18%3A05.779Z&transaction%5Bdate_updated%5D=2016-12-30T17%3A18%3A06.210Z&transaction%5Bamount%5D=7959&transaction%5Bauthorized_amount%5D=7959&transaction%5Bpaid_amount%5D=7959&transaction%5Brefunded_amount%5D=0&transaction%5Binstallments%5D=10&transaction%5Bid%5D=1003499&transaction%5Bcost%5D=50&transaction%5Bcard_holder_name%5D=Joao%20Silva&transaction%5Bcard_last_digits%5D=7271&transaction%5Bcard_first_digits%5D=516619&transaction%5Bcard_brand%5D=mastercard&transaction%5Bcard_pin_mode%5D=&transaction%5Bpostback_url%5D=http%3A%2F%2Feduardo.com&transaction%5Bpayment_method%5D=credit_card&transaction%5Bcapture_method%5D=ecommerce&transaction%5Bantifraud_score%5D=&transaction%5Bboleto_url%5D=&transaction%5Bboleto_barcode%5D=&transaction%5Bboleto_expiration_date%5D=&transaction%5Breferer%5D=api_key&transaction%5Bip%5D=187.11.121.49&transaction%5Bsubscription_id%5D=&transaction%5Bphone%5D%5Bobject%5D=phone&transaction%5Bphone%5D%5Bddi%5D=55&transaction%5Bphone%5D%5Bddd%5D=11&transaction%5Bphone%5D%5Bnumber%5D=999887766&transaction%5Bphone%5D%5Bid%5D=65601&transaction%5Baddress%5D%5Bobject%5D=address&transaction%5Baddress%5D%5Bstreet%5D=rua%20qualquer%2C&transaction%5Baddress%5D%5Bcomplementary%5D=apto%2C&transaction%5Baddress%5D%5Bstreet_number%5D=13%2C&transaction%5Baddress%5D%5Bneighborhood%5D=pinheiros%2C&transaction%5Baddress%5D%5Bcity%5D=S%C3%A3o%20Paulo&transaction%5Baddress%5D%5Bstate%5D=SP&transaction%5Baddress%5D%5Bzipcode%5D=05444040&transaction%5Baddress%5D%5Bcountry%5D=Brasil&transaction%5Baddress%5D%5Bid%5D=67895&transaction%5Bcustomer%5D%5Bobject%5D=customer&transaction%5Bcustomer%5D%5Bdocument_number%5D=78863832064&transaction%5Bcustomer%5D%5Bdocument_type%5D=cpf&transaction%5Bcustomer%5D%5Bname%5D=Joao%20Silva&transaction%5Bcustomer%5D%5Bemail%5D=user586696cda239d%40email.com&transaction%5Bcustomer%5D%5Bborn_at%5D=1970-01-01T04%3A11%3A11.991Z&transaction%5Bcustomer%5D%5Bgender%5D=M&transaction%5Bcustomer%5D%5Bdate_created%5D=2016-12-28T19%3A28%3A05.344Z&transaction%5Bcustomer%5D%5Bid%5D=122229&transaction%5Bcard%5D%5Bobject%5D=card&transaction%5Bcard%5D%5Bid%5D=card_cix93fm9g009hy36dszle5gpt&transaction%5Bcard%5D%5Bdate_created%5D=2016-12-28T15%3A25%3A33.941Z&transaction%5Bcard%5D%5Bdate_updated%5D=2016-12-30T15%3A58%3A35.544Z&transaction%5Bcard%5D%5Bbrand%5D=mastercard&transaction%5Bcard%5D%5Bholder_name%5D=Jose%20Silva&transaction%5Bcard%5D%5Bfirst_digits%5D=516619&transaction%5Bcard%5D%5Blast_digits%5D=7271&transaction%5Bcard%5D%5Bcountry%5D=HT&transaction%5Bcard%5D%5Bfingerprint%5D=g%2BFfwUFCT6dd&transaction%5Bcard%5D%5Bvalid%5D=true&transaction%5Bcard%5D%5Bexpiration_date%5D=1223&transaction%5Bsplit_rules%5D=&transaction%5Bmetadata%5D%5Bsource%5D=tests","request_url":"http://eduardo.com","retries":31,"next_retry":null,"deliveries":[{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:18:06.291Z","date_updated":"2016-12-30T17:18:06.291Z","id":"pd_cixc2c1qr02okj97325zajshl"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:19:11.310Z","date_updated":"2016-12-30T17:19:11.310Z","id":"pd_cixc2dfwu02p4j97392532jtc"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:20:11.750Z","date_updated":"2016-12-30T17:20:11.750Z","id":"pd_cixc2eqjq02yejk73e2bjajjv"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:21:12.058Z","date_updated":"2016-12-30T17:21:12.058Z","id":"pd_cixc2g12y02yujk73xwuq7tm3"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:26:13.814Z","date_updated":"2016-12-30T17:26:13.814Z","id":"pd_cixc2mhx2032qjk73izx5kslx"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:31:15.016Z","date_updated":"2016-12-30T17:31:15.016Z","id":"pd_cixc2sybs02ubj973x7ffvbh7"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T17:36:16.404Z","date_updated":"2016-12-30T17:36:16.404Z","id":"pd_cixc2zevo02xdj973rasg478p"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T18:36:21.332Z","date_updated":"2016-12-30T18:36:21.332Z","id":"pd_cixc54ogk03t1j973t17vxz8g"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T19:36:22.982Z","date_updated":"2016-12-30T19:36:22.982Z","id":"pd_cixc79vie04orjk7357o0bfwy"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T20:36:25.024Z","date_updated":"2016-12-30T20:36:25.024Z","id":"pd_cixc9f2v4002bag73m9b6cta1"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T21:36:27.166Z","date_updated":"2016-12-30T21:36:27.166Z","id":"pd_cixcbkaal00biag73bqfvtjjk"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T22:36:29.103Z","date_updated":"2016-12-30T22:36:29.103Z","id":"pd_cixcdphkf00k6ag73wobu79pl"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-30T23:36:30.766Z","date_updated":"2016-12-30T23:36:30.766Z","id":"pd_cixcfuomm00mha673e6ucingo"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T00:36:32.144Z","date_updated":"2016-12-31T00:36:32.144Z","id":"pd_cixchzvgw00sla673vsz65oyw"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T01:36:33.798Z","date_updated":"2016-12-31T01:36:33.798Z","id":"pd_cixck52iu00yua673coo24fd3"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T02:36:35.484Z","date_updated":"2016-12-31T02:36:35.484Z","id":"pd_cixcma9lo015ca673dn7otmxq"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T03:36:37.231Z","date_updated":"2016-12-31T03:36:37.231Z","id":"pd_cixcofgq701bna673xsyo8fe3"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T04:36:38.579Z","date_updated":"2016-12-31T04:36:38.579Z","id":"pd_cixcqknjn01hsa673o8q8a105"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T05:36:39.985Z","date_updated":"2016-12-31T05:36:39.985Z","id":"pd_cixcspuep01nwa6734fhuwjap"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T06:36:41.691Z","date_updated":"2016-12-31T06:36:41.691Z","id":"pd_cixcuv1i301tza673488gir46"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T07:36:42.643Z","date_updated":"2016-12-31T07:36:42.643Z","id":"pd_cixcx080j0203a673vrdzhv9n"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T08:36:43.731Z","date_updated":"2016-12-31T08:36:43.731Z","id":"pd_cixcz5emq0263a6731e9ixoni"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T09:36:45.096Z","date_updated":"2016-12-31T09:36:45.096Z","id":"pd_cixd1algo02c6a673tbrz1jel"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T10:36:46.105Z","date_updated":"2016-12-31T10:36:46.105Z","id":"pd_cixd3fs0p02i3a673o2g2ldha"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T11:36:47.412Z","date_updated":"2016-12-31T11:36:47.412Z","id":"pd_cixd5kyt002o7a6738o917gb2"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T12:36:48.383Z","date_updated":"2016-12-31T12:36:48.383Z","id":"pd_cixd7q5bz02uea673js8bhoit"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T13:36:50.177Z","date_updated":"2016-12-31T13:36:50.177Z","id":"pd_cixd9vcht03psag73i5ljgszd"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T14:36:51.681Z","date_updated":"2016-12-31T14:36:51.681Z","id":"pd_cixdc0jfl036ra673s65kthv4"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T15:36:52.402Z","date_updated":"2016-12-31T15:36:52.402Z","id":"pd_cixde5prl03cva673573y9c57"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T16:36:53.876Z","date_updated":"2016-12-31T16:36:53.876Z","id":"pd_cixdgawok04bvag73lftlxan4"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T17:36:54.783Z","date_updated":"2016-12-31T17:36:54.783Z","id":"pd_cixdig35r04jeag73v606umkj"},{"object":"postback_delivery","status":"processing","status_reason":null,"status_code":null,"response_time":null,"response_headers":null,"response_body":null,"date_created":"2016-12-31T18:36:54.992Z","date_updated":"2016-12-31T18:36:54.992Z","id":"pd_cixdkl93k04pkag7348ju8pss"}],"date_created":"2016-12-30T17:18:06.268Z","date_updated":"2016-12-31T18:36:55.091Z","signature":"sha1=a3ec935a9827e3aa0287cef561bdb0e70471ccb7","id":"po_cixc2c1q402xejk73l2qu0rb2"}';
    }
}
