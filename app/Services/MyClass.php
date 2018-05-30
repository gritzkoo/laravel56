<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MyClass extends BaseService
{
	public function oi($data)
	{
		$trans = DB::table('translations')->orderBy('key')->get();
		$arrayPt = [];
		$arrayEn = [];
		$arrayEs = [];
		foreach ($trans as $key => $value)
		{
			$tmpPt = $this->makeJson($value->key, $value->pt);
			$tmpEn = $this->makeJson($value->key, $value->en);
			$tmpEs = $this->makeJson($value->key, $value->es);
			$arrayPt = array_merge_recursive($tmpPt,$arrayPt);
			$arrayEn = array_merge_recursive($tmpEn,$arrayEn);
			$arrayEs = array_merge_recursive($tmpEs,$arrayEs);
		}

		$this->makeFile($arrayPt,'pt');
		$this->makeFile($arrayEn,'en');
		$this->makeFile($arrayEs,'es');
		return 'lazarentro';
	}

	public function makeFile($data,$directory)
	{
		$stringPrincipal = "<?php\n/** esse arquivo é auto gerado */\n return ";
		$stringPrincipal .= var_export($data,true).';';

		debug($stringPrincipal);
		file_put_contents(resource_path('lang/'.$directory.'/app.php'),$stringPrincipal);
	}

	private function makeJson($stringKey, $value)
	{
		$parts = explode('.',$stringKey);
		$jsonString = '{';
		
		foreach($parts as $step => $k)
		{
			$jsonString .= '"'.$k.'":{';
		}

		$jsonString = substr($jsonString,0,-1);
		$jsonString .= '"'.$value.'"';
		
		foreach($parts as $k)
		{
			$jsonString .= '}';
		}

		return json_decode($jsonString,true);
	}
}