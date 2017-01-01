<?php
    class tpbspider{
    	
		public function datafrompid($pid){
			
			$url = 'https://thepiratebay.org/torrent/'.$pid.'/';
			return file_get_contents($url);

		}
		
		public function nospace($i){
			return preg_replace('/\s+/','',$i);
		}
		
		public function desc($data){
			preg_match("/<div class=\"nfo\">(.+)<\/div>/siU", $data, $desc);
			return $desc['0'];
		}
		
		public function title($data){
			preg_match("/<div id=\"title\">(.+)<\/div>/siU", $data, $title);
			return substr($title['1'],9);
		}
		
		public function torrhash($data){
			preg_match("/<dt>Info Hash:<\/dt><dd><\/dd>(.+)<\/dl>/siU", $data, $hash);
			return $this->nospace($hash['1']);
		}
		
		public function uploaded($data){
			preg_match("/<dt>Uploaded:<\/dt>(.+)<\/dd>/siU", $data, $uploaded);
			$uploaded = $this->nospace($uploaded['1']);
			$uploaded = preg_replace('/<dd>/','',$uploaded);
			return $uploaded;
		}
		
		public function getuser($data){
			preg_match("/<dd><a href=\"\/user\/(.+)\/\" title=\"/siU", $data, $user);
			return $user['1'];
		}
		
		public function getcat($data){
			preg_match("/<dd><a href=\"\/browse\/(.+)\" title=\"/siU", $data, $cat);
			return $cat['1'];
		}
    }
?>