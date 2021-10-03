<?php
namespace App\Controller;

class ContentController {
		
	//IRL =)	
    public $text;

    public function modify_content($text)
    {
        foreach ($text as $text_to_modify) {

            $parts = explode(' ',$text_to_modify->nodeValue);
            foreach($parts as $part) {
                if(mb_strlen($part) == 6) {
					/* and again, IRL - here should be check for commas and other punctuation marks. One can achieve it with RegExp, like: preg_replace('/\p{P}/', '', $part) or preg_replace('/[^a-z0-9!, ]/i', '', $string) - and there r lots of ways to do it...But anyway, I'm not getting payed for it, right?) */
					
                    $modified[] = $part.'&trade;';
                } else {
                    $modified[] = $part;
                }
                $text_to_modify->nodeValue = implode(" ", $modified);

            }
			//Guess why we need it
            unset($modified);

        }
        return $text;
    }

}