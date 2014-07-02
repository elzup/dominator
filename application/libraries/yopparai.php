<?php

class Yopparai
{

	public $text;

	/**
	 * 
	 * @param string $text
	 * @param int $level
	 */
	function __construct($text = NULL, $level = 50)
	{
		$this->set($text, $level);
	}

	function set($text = NULL, $level = 10)
	{
		if (is_null($text))
		{
			return;
		}
		$cs = multi_split($this->hurigana($text, $level));
		$len = count($cs);
		$vp = 0;
		$vp_min = round($len * $level / 100);
		$lib = get_yopparatter_lib();
		$k = FALSE;
		
		for ($i = 0; $i < count($cs); $i++)
		{
			$key = mb_convert_kana($cs[$i], 'K');
			if (isset($lib[$key]) && rand(0, 100) <= $level)
			{
				$cs[$i] = $lib[$key];
				$vp++;
				if ($vp >= $vp_min)
				{
					break;
				}
			}
			if ($vp < $vp_min / 2 && !$k)
			{
				$i = 0;
				$k = TRUE;
			}
		}
		$ts = multi_split(implode('', $cs));
		for ($i = 110; isset($ts[$i]); $i++)
		{
			unset($ts[$i]);
		}
		$this->text = implode('', $ts);
	}

	public function hurigana($text, $level)
	{

		$url = 'http://jlp.yahooapis.jp/FuriganaService/V1/furigana';
		$url .= '?appid=' . YAHOO_APP_KEY;
		$url .= '&grade=1';
		$url .= '&sentence=' . urlencode($text);
		$xml = file_get_contents($url);
		if ($xml === FALSE) {
			return $text;
		}
		try
		{
			$c = new SimpleXMLElement($xml);
		} catch (Exception $e)
		{
			echo '<pre>';
			var_dump($e);
			exit;
			return $text;
		}
		if (!isset($c->Result->WordList->Word))
		{
			return $text;
		}
		foreach ($c->Result->WordList->Word as $word)
		{
			if (!isset($word->Furigana))
			{
				continue;
			}
			if (rand(0, 110) > $level)
			{
				continue;
			}
			$text = str_replace($word->Surface, $word->Furigana, $text);
		}
		return $text;
	}

	public function get_text()
	{
		return $this->text;
	}

}
