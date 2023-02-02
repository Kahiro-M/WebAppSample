<?php
namespace App\Service;

/**
 * http://webadmin.jp/memo/cb01f428o7t9/
 * 西暦表示になっている日付データを和暦表示（例：2019/05/01を令和元年5月1日）に変換します
 * 和暦表示で新元号の「令和」を対応することになったので対応したソースをアップします。
 * 今後、新たに追加になった場合は配列に新しい元号と開始日・開始年を追加するこで対応することができます。
 */

class DatetimeService {
    /**
     * 和暦変換(グレゴリオ暦が採用された「明治6年1月1日」以降に対応)
     * 引数：西暦(9999/99/99 or 9999-99-99)
     * 戻値：和暦
     */
    public function chgAdToJpDate($value) {
        //和暦変換用データ
        $arr = array(
            array('date' => '2019-05-01', 'year' => '2019', 'name' => '令和'),
            array('date' => '1989-01-08', 'year' => '1989', 'name' => '平成'),
            array('date' => '1926-12-25', 'year' => '1926', 'name' => '昭和'),
            array('date' => '1912-07-30', 'year' => '1912', 'name' => '大正'),
            array('date' => '1873-01-01', 'year' => '1868', 'name' => '明治'),
        );
        // 日付チェック
        if ($this->chkDate($value) === false) {
            return '';
        }
        $arrad  = explode('-', str_replace('/', '-', $value));
        $addate = (int)sprintf('%d%02d%02d', (int)$arrad[0], (int)$arrad[1], (int)$arrad[2]);
        $result = '';
        foreach ($arr as $key=>$row) {
            // 日付チェック
            if ($this->chkDate($row['date']) === false) {
                return '';
            }
            $arrjp  = explode('-', str_replace('/', '-', $row['date']));
            $jpdate = (int)sprintf('%d%02d%02d', (int)$arrjp[0], (int)$arrjp[1], (int)$arrjp[2]);
            // 元号の開始日と比較
            if ($addate >= $jpdate) {
                // 和暦年の計算
                $year = sprintf('%d', ((int)$arrad[0] - (int)$row['year']) + 1);
                if ((int)$year === 1) {
                    $year = '元';
                }
                // 和暦年月日作成
                $result = sprintf('%s%s年%d月%d日', $row['name'], $year, (int)$arrad[1], (int)$arrad[2]);
                break;
            }
        }
        return $result;
    }
    
    /**
     * 日付の妥当性チェック
     * 引数：西暦(9999/99/99 or 9999-99-99)
     * 戻値：指定日付が有効：TRUE、無効：FALSE
     */
    public function chkDate($value) {
        if ((strpos($value, '/') !== false) && (strpos($value, '-') !== false)) {
            return false;
        }
        $value   = str_replace('/', '-', $value);
        $pattern = '#^([0-9]{1,4})-(0[1-9]|1[0-2]|[1-9])-([0-2][0-9]|3[0-1]|[1-9])$#';
        preg_match($pattern, $value, $arrmatch);
        if ((isset($arrmatch[1]) === false) || (isset($arrmatch[2]) === false) || (isset($arrmatch[3]) === false)) {
            return false;
        }
        if (checkdate((int)$arrmatch[2], (int)$arrmatch[3], (int)$arrmatch[1]) === false) {
            return false;
        }
        
        return true;
    }
}