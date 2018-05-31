<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MyClass extends BaseService
{
	public function oi($data)
	{
		$trans = DB::table('translations')->orderBy('key')->get();
		$skippedKeys = ['id','key'];
		$translations = [];
		if($trans)
		{
			$fields = array_keys(get_object_vars($trans[0]));
			foreach($fields as $key)
			{
				if(!in_array($key,$skippedKeys)) $translations[$key] = [];
			}
			foreach ($trans as $key => $value)
			{
				foreach($fields as $field)
				{
					if(!in_array($field, $skippedKeys))
					{
						$this->insertInArray(
							$translations[$field],
							$value->key,
							$value->$field
						);
					}
				}
			}
		}
		$this->makeFile($translations);
		return trans('app.apc.lables.greetins',['name'=>'lazarento']);
	}
	private function insertInArray(&$data, $stringKey, $value)
	{
		$parts = explode('.',$stringKey);
		$temp = &$data;
		foreach ( $parts as $key )
		{
			$temp = &$temp[$key];
		}
		$temp = $value ?? 'undefined key on database';
	} 
	public function makeFile($translations)
	{
		if(!empty($translations))
		{
			foreach($translations as $directory => $content)
			{
				$this->_checkIfFolderExists(resource_path('lang/'.$directory));
				$stringPrincipal = "<?php\n/**\n * ESSE ARQUIVO É AUTO GERADO\n * POR FAVOR NAO EDITE ESSE DOCUMENTO\n * EDITE OS DADOS NA TABELA translations E O MESMO SERÁ \n * RECRIADO COM A CHAMADA DE UM SERVIÇO\n */\n return ";
				$stringPrincipal .= var_export($content,true).';';
				$stringPrincipal = preg_replace('/=>\s+\n\s+array\s+\(/','=> array (',$stringPrincipal);
				$stringPrincipal = preg_replace('/ array\s+\(/',' [',$stringPrincipal);
				$stringPrincipal = preg_replace('/\)/',']',$stringPrincipal);

				file_put_contents(resource_path('lang/'.$directory.'/app.php'),$stringPrincipal);
			}
		}
	}
}