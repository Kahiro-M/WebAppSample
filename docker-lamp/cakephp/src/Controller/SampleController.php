<?php
namespace App\Controller;
use App\Controller\AppController;

// Constant呼び出し用
use Cake\Core\Configure;

// Datetime呼び出し用
use Cake\I18n\Time;
use App\Service\DatetimeService;


/**
 * サンプルコントローラ
 */
class SampleController extends AppController {
	/**
     * 呼び出しテスト
     */
    public function index()
	{
		echo "コントローラーの呼び出しテストindex";
	}
    /**
     * 定数呼び出し
     */
    public function Constant() {
        $this->autoRender = false;//sampleなのでviewを使用しない。
        var_dump(Configure::read('Constant.SampleText'));
    }

    /**
     * 西暦→和暦
     */
    public function Datetime() {
        $this->autoRender = false;//sampleなのでviewを使用しない。
        // サービスの定義
        $this->DatetimeService = new DatetimeService();
        $AnnoDomini = date('Y-m-d');//Unixタイムスタンプに変換
        $JapaneseCalendar = $this->DatetimeService->chgAdToJpDate($AnnoDomini);//和暦に変換
        var_dump($JapaneseCalendar);
    }

}
