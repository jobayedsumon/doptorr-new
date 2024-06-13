<?php

namespace  Xgenious\Paymentgateway\Base;

/**
 *  List of available currency in this package
 * @since 0.0.1
 * */
class GlobalCurrency
{
    const ENCODED_DATA = '{"AFN":{"minor_unit":"2","numeric_code":"971"},"ALL":{"minor_unit":"2","numeric_code":"008"},"DZD":{"minor_unit":"2","numeric_code":"012"},"USD":{"minor_unit":"2","numeric_code":"840"},"EUR":{"minor_unit":"2","numeric_code":"978"},"AOA":{"minor_unit":"2","numeric_code":"973"},"XCD":{"minor_unit":"2","numeric_code":"951"},"":{"minor_unit":"","numeric_code":""},"ARS":{"minor_unit":"2","numeric_code":"032"},"AMD":{"minor_unit":"2","numeric_code":"051"},"AWG":{"minor_unit":"2","numeric_code":"533"},"AUD":{"minor_unit":"2","numeric_code":"036"},"AZN":{"minor_unit":"2","numeric_code":"944"},"BSD":{"minor_unit":"2","numeric_code":"044"},"BHD":{"minor_unit":"3","numeric_code":"048"},"BDT":{"minor_unit":"2","numeric_code":"050"},"BBD":{"minor_unit":"2","numeric_code":"052"},"BYR":{"minor_unit":"0","numeric_code":"974"},"BZD":{"minor_unit":"2","numeric_code":"084"},"XOF":{"minor_unit":"0","numeric_code":"952"},"BMD":{"minor_unit":"2","numeric_code":"060"},"INR":{"minor_unit":"2","numeric_code":"356"},"BOB":{"minor_unit":"2","numeric_code":"068"},"BAM":{"minor_unit":"2","numeric_code":"977"},"BWP":{"minor_unit":"2","numeric_code":"072"},"NOK":{"minor_unit":"2","numeric_code":"578"},"BRL":{"minor_unit":"2","numeric_code":"986"},"BND":{"minor_unit":"2","numeric_code":"096"},"BGN":{"minor_unit":"2","numeric_code":"975"},"BIF":{"minor_unit":"0","numeric_code":"108"},"KHR":{"minor_unit":"2","numeric_code":"116"},"XAF":{"minor_unit":"0","numeric_code":"950"},"CAD":{"minor_unit":"2","numeric_code":"124"},"CVE":{"minor_unit":"2","numeric_code":"132"},"KYD":{"minor_unit":"2","numeric_code":"136"},"CLP":{"minor_unit":"0","numeric_code":"152"},"CNY":{"minor_unit":"2","numeric_code":"156"},"COP":{"minor_unit":"2","numeric_code":"170"},"KMF":{"minor_unit":"0","numeric_code":"174"},"NZD":{"minor_unit":"2","numeric_code":"554"},"CRC":{"minor_unit":"2","numeric_code":"188"},"HRK":{"minor_unit":"2","numeric_code":"191"},"CUP":{"minor_unit":"2","numeric_code":"192"},"ANG":{"minor_unit":"2","numeric_code":"532"},"CZK":{"minor_unit":"2","numeric_code":"203"},"DKK":{"minor_unit":"2","numeric_code":"208"},"DJF":{"minor_unit":"0","numeric_code":"262"},"DOP":{"minor_unit":"2","numeric_code":"214"},"EGP":{"minor_unit":"2","numeric_code":"818"},"ERN":{"minor_unit":"2","numeric_code":"232"},"ETB":{"minor_unit":"2","numeric_code":"230"},"FKP":{"minor_unit":"2","numeric_code":"238"},"FJD":{"minor_unit":"2","numeric_code":"242"},"XPF":{"minor_unit":"0","numeric_code":"953"},"GMD":{"minor_unit":"2","numeric_code":"270"},"GEL":{"minor_unit":"2","numeric_code":"981"},"GHS":{"minor_unit":"2","numeric_code":"936"},"GIP":{"minor_unit":"2","numeric_code":"292"},"GTQ":{"minor_unit":"2","numeric_code":"320"},"GBP":{"minor_unit":"2","numeric_code":"826"},"GNF":{"minor_unit":"0","numeric_code":"324"},"GYD":{"minor_unit":"2","numeric_code":"328"},"HNL":{"minor_unit":"2","numeric_code":"340"},"HKD":{"minor_unit":"2","numeric_code":"344"},"HUF":{"minor_unit":"2","numeric_code":"348"},"ISK":{"minor_unit":"0","numeric_code":"352"},"IDR":{"minor_unit":"2","numeric_code":"360"},"IRR":{"minor_unit":"2","numeric_code":"364"},"IQD":{"minor_unit":"3","numeric_code":"368"},"ILS":{"minor_unit":"2","numeric_code":"376"},"JMD":{"minor_unit":"2","numeric_code":"388"},"JPY":{"minor_unit":"0","numeric_code":"392"},"JOD":{"minor_unit":"3","numeric_code":"400"},"KZT":{"minor_unit":"2","numeric_code":"398"},"KES":{"minor_unit":"2","numeric_code":"404"},"KPW":{"minor_unit":"2","numeric_code":"408"},"KRW":{"minor_unit":"0","numeric_code":"410"},"KWD":{"minor_unit":"3","numeric_code":"414"},"KGS":{"minor_unit":"2","numeric_code":"417"},"LAK":{"minor_unit":"2","numeric_code":"418"},"LBP":{"minor_unit":"2","numeric_code":"422"},"ZAR":{"minor_unit":"2","numeric_code":"710"},"LRD":{"minor_unit":"2","numeric_code":"430"},"LYD":{"minor_unit":"3","numeric_code":"434"},"CHF":{"minor_unit":"2","numeric_code":"756"},"MOP":{"minor_unit":"2","numeric_code":"446"},"MKD":{"minor_unit":"2","numeric_code":"807"},"MGA":{"minor_unit":"2","numeric_code":"969"},"MWK":{"minor_unit":"2","numeric_code":"454"},"MYR":{"minor_unit":"2","numeric_code":"458"},"MVR":{"minor_unit":"2","numeric_code":"462"},"MRO":{"minor_unit":"2","numeric_code":"478"},"MUR":{"minor_unit":"2","numeric_code":"480"},"MXN":{"minor_unit":"2","numeric_code":"484"},"MDL":{"minor_unit":"2","numeric_code":"498"},"MNT":{"minor_unit":"2","numeric_code":"496"},"MAD":{"minor_unit":"2","numeric_code":"504"},"MZN":{"minor_unit":"2","numeric_code":"943"},"MMK":{"minor_unit":"2","numeric_code":"104"},"NPR":{"minor_unit":"2","numeric_code":"524"},"NIO":{"minor_unit":"2","numeric_code":"558"},"NGN":{"minor_unit":"2","numeric_code":"566"},"OMR":{"minor_unit":"3","numeric_code":"512"},"PKR":{"minor_unit":"2","numeric_code":"586"},"PGK":{"minor_unit":"2","numeric_code":"598"},"PYG":{"minor_unit":"0","numeric_code":"600"},"PEN":{"minor_unit":"2","numeric_code":"604"},"PHP":{"minor_unit":"2","numeric_code":"608"},"PLN":{"minor_unit":"2","numeric_code":"985"},"QAR":{"minor_unit":"2","numeric_code":"634"},"RON":{"minor_unit":"2","numeric_code":"946"},"RUB":{"minor_unit":"2","numeric_code":"643"},"RWF":{"minor_unit":"0","numeric_code":"646"},"SHP":{"minor_unit":"2","numeric_code":"654"},"WST":{"minor_unit":"2","numeric_code":"882"},"STD":{"minor_unit":"2","numeric_code":"678"},"SAR":{"minor_unit":"2","numeric_code":"682"},"RSD":{"minor_unit":"2","numeric_code":"941"},"SCR":{"minor_unit":"2","numeric_code":"690"},"SLL":{"minor_unit":"2","numeric_code":"694"},"SGD":{"minor_unit":"2","numeric_code":"702"},"SBD":{"minor_unit":"2","numeric_code":"090"},"SOS":{"minor_unit":"2","numeric_code":"706"},"SSP":{"minor_unit":"2","numeric_code":"728"},"LKR":{"minor_unit":"2","numeric_code":"144"},"SDG":{"minor_unit":"2","numeric_code":"938"},"SRD":{"minor_unit":"2","numeric_code":"968"},"SZL":{"minor_unit":"2","numeric_code":"748"},"SEK":{"minor_unit":"2","numeric_code":"752"},"SYP":{"minor_unit":"2","numeric_code":"760"},"TWD":{"minor_unit":"2","numeric_code":"901"},"TJS":{"minor_unit":"2","numeric_code":"972"},"TZS":{"minor_unit":"2","numeric_code":"834"},"THB":{"minor_unit":"2","numeric_code":"764"},"TOP":{"minor_unit":"2","numeric_code":"776"},"TTD":{"minor_unit":"2","numeric_code":"780"},"TND":{"minor_unit":"3","numeric_code":"788"},"TRY":{"minor_unit":"2","numeric_code":"949"},"TMT":{"minor_unit":"2","numeric_code":"934"},"UGX":{"minor_unit":"0","numeric_code":"800"},"UAH":{"minor_unit":"2","numeric_code":"980"},"AED":{"minor_unit":"2","numeric_code":"784"},"UYU":{"minor_unit":"2","numeric_code":"858"},"UZS":{"minor_unit":"2","numeric_code":"860"},"VUV":{"minor_unit":"0","numeric_code":"548"},"VEF":{"minor_unit":"2","numeric_code":"937"},"VND":{"minor_unit":"0","numeric_code":"704"},"YER":{"minor_unit":"2","numeric_code":"886"},"ZMW":{"minor_unit":"2","numeric_code":"967"},"ZWL":{"minor_unit":"2","numeric_code":"932"}}';

    public static function script_currency_list() : array
    {
        return [
            "DBD" => "DBD",
            'USD' => '$',
            'EUR' => '€',
            'INR' => '₹',
            'IDR' => 'Rp',
            'AUD' => 'A$',
            'SGD' => 'S$',
            'JPY' => '¥',
            'GBP' => '£',
            'MYR' => 'RM',
            'PHP' => '₱',
            'THB' => '฿',
            'KRW' => '₩',
            'NGN' => '₦',
            'GHS' => 'GH₵',
            'BRL' => 'R$',
            'BIF' => 'FBu',
            'CAD' => 'C$',
            'CDF' => 'FC',
            'CVE' => 'Esc',
            'GHP' => 'GH₵',
            'GMD' => 'D',
            'GNF' => 'FG',
            'KES' => 'Ksh',
            'LRD' => 'L$',
            'MWK' => 'MK',
            'MZN' => 'MT',
            'RWF' => 'R₣',
            'SLL' => 'Le',
            'STD' => 'Db',
            'TZS' => 'TSh',
            'UGX' => 'UGX',
            'XAF' => 'FCFA',
            'XOF' => 'CFA',
            'ZMK' => 'ZK',
            'ZMW' => 'ZK',
            'ZWD' => 'Z$',
            'AED' => 'د.إ',
            'AFN' => '؋',
            'ALL' => 'L',
            'AMD' => '֏',
            'ANG' => 'NAf',
            'AOA' => 'Kz',
            'ARS' => '$',
            'AWG' => 'ƒ',
            'AZN' => '₼',
            'BAM' => 'KM',
            'BBD' => 'Bds$',
            'BDT' => '৳',
            'BGN' => 'Лв',
            'BMD' => '$',
            'BND' => 'B$',
            'BOB' => 'Bs',
            'BSD' => 'B$',
            'BWP' => 'P',
            'BZD' => '$',
            'CHF' => 'CHF',
            'CNY' => '¥',
            'CLP' => '$',
            'COP' => '$',
            'CRC' => '₡',
            'CZK' => 'Kč',
            'DJF' => 'Fdj',
            'DKK' => 'Kr',
            'DOP' => 'RD$',
            'DZD' => 'دج',
            'EGP' => 'E£',
            'ETB' => 'ብር',
            'FJD' => 'FJ$',
            'FKP' => '£',
            'GEL' => 'ლ',
            'GIP' => '£',
            'GTQ' => 'Q',
            'GYD' => 'G$',
            'HKD' => 'HK$',
            'HNL' => 'L',
            'HRK' => 'kn',
            'HTG' => 'G',
            'HUF' => 'Ft',
            'ILS' => '₪',
            'ISK' => 'kr',
            'JMD' => '$',
            'KGS' => 'Лв',
            'KHR' => '៛',
            'KMF' => 'CF',
            'KYD' => '$',
            'KZT' => '₸',
            'LAK' => '₭',
            'LBP' => 'ل.ل.',
            'LKR' => 'ரூ',
            'LSL' => 'L',
            'MAD' => 'MAD',
            'MDL' => 'L',
            'MGA' => 'Ar',
            'MKD' => 'Ден',
            'MMK' => 'K',
            'MNT' => '₮',
            'MOP' => 'MOP$',
            'MRO' => 'MRU',
            'MUR' => '₨',
            'MVR' => 'Rf',
            'MXN' => '$',
            'NAD' => 'N$',
            'NIO' => 'C$',
            'NOK' => 'kr',
            'NPR' => 'रू',
            'NZD' => '$',
            'PAB' => 'B/.',
            'PEN' => 'S/',
            'PGK' => 'K',
            'PKR' => '₨',
            'PLN' => 'zł',
            'PYG' => '₲',
            'QAR' => 'QR',
            'RON' => 'lei',
            'RSD' => 'din',
            'RUB' => '₽',
            'SAR' => 'SR',
            'SBD' => 'Si$',
            'SCR' => 'SR',
            'SEK' => 'kr',
            'SHP' => '£',
            'SOS' => 'Sh.so.',
            'SRD' => '$',
            'SZL' => 'E',
            'TJS' => 'ЅM',
            'TRY' => '₺',
            'TTD' => 'TT$',
            'TWD' => 'NT$',
            'UAH' => '₴',
            'UYU' => '$U',
            'UZS' => 'so\'m',
            'VND' => '₫',
            'VUV' => 'VT',
            'WST' => 'WS$',
            'XCD' => '$',
            'XPF' => '₣',
            'YER' => '﷼',
            'ZAR' => 'R',
            'BHD' => 'BHD',
            'KWD' => 'د.ك',
            'LYD' => 'د.ل',
            'IRR' => '﷼',
            'IRT' => 'تومان',
            'JOD'=>'د.أ'
        ];
    }

    public static function get_currency_number($currencyCode = 'USD'){
        return strval(
            (new static())->getCurrencyProperty($currencyCode,'numeric_code')
        );
    }

    protected function getCurrencyProperty($currencyCode,$property){
        $currencyCode = trim(strtoupper($currencyCode.''));
        $data = json_decode(static::ENCODED_DATA,true);
        if(
            !empty($currencyCode) &&
            isset($data[$currencyCode]) &&
            isset($data[$currencyCode][$property])
        ){
            return $data[$currencyCode][$property];
        }

        return null;
    }
}
