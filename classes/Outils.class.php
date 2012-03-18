<?php
class Outils{
	/**
	 * Outils::nbPagesTotales()
	 *
	 * @param string $table Le nom de la table pour laquelle il faut compter le nombre de pages
	 * @param int $nbEnregistrementsParPages Nombre d'enregistrements désirés par page
	 * @return int Le nombre de pages totales
	 */
	public static function nbPagesTotales($table, $nbEnregistrementsParPages=10){
		$sql="SELECT * FROM ".$table;

		$db=DB::get_instance();
		$res = $db->query($sql);

		return ceil($res->rowCount()/$nbEnregistrementsParPages);
	}
	
	public static function getVersionBDD(){
	    $sql="SELECT valeur FROM config WHERE identifiant='versionbdd'";
	    
	    $db=DB::get_instance();
	    $res = $db->query($sql);
	    $res = $res->fetch();
	    	    
	    return $res[0];
	}
        
    public static function debug($var){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

	/** 
	 * A sweet interval formatting, will use the two biggest interval parts. 
	 * On small intervals, you get minutes and seconds. 
	 * On big intervals, you get months and days. 
	 * Only the two biggest parts are used. 
	 * 
	 * @param DateTime $start 
	 * @param DateTime|null $end 
	 * @return string 
	 */ 
	public static function formatDateDiff($start, $end=null) { 
	    if(!($start instanceof DateTime)) { 
	        $start = new DateTime($start); 
	    } 
	    
	    if($end === null) { 
	        $end = new DateTime(); 
	    } 
	    
	    if(!($end instanceof DateTime)) { 
	        $end = new DateTime($start); 
	    } 
	    
	    $interval = $end->diff($start); 
	    $doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals 
	    
	    $format = array(); 
	    if($interval->y !== 0) { 
	        $format[] = "%y ".$doPlural($interval->y, "année"); 
	    } 
	    if($interval->m !== 0) { 
	        $format[] = "%m ".$doPlural($interval->m, "moi"); 
	    } 
	    if($interval->d !== 0) { 
	        $format[] = "%d ".$doPlural($interval->d, "jour"); 
	    } 
	    if($interval->h !== 0) { 
	        $format[] = "%h ".$doPlural($interval->h, "heure"); 
	    } 
	    if($interval->i !== 0) { 
	        $format[] = "%i ".$doPlural($interval->i, "minute"); 
	    } 
	    if($interval->s !== 0) { 
	        if(!count($format)) { 
	            return "Il y a quelques instants ..."; 
	        } else { 
	            $format[] = "%s ".$doPlural($interval->s, "seconde"); 
	        } 
	    }
	    else
	    {
	    	return "Il y a quelques instants ..."; 
	    }
	    
	    // We use the two biggest parts 
	    if(count($format) > 1) { 
	        $format = "Il y a ".array_shift($format)." et ".array_shift($format); 
	    } else { 
	        $format = array_pop($format); 
	    } 
	    
	    // Prepend 'since ' or whatever you like 
	    return $interval->format($format); 
	} 
    
    /**
	 * Fonction permettant de convertir les balises zCode en HTML et de supprimer les balises HTML non voulues.
	 *
	 * @param string $table Le texte à convertir et à nettoyer.
	 * @return string Le texte converti et nettoyé.
	 */
    public static function sanitize($texte){
        if(isset($texte) && !empty($texte)){            
            
            $texte = htmlentities($texte, ENT_NOQUOTES, 'UTF-8');            
            
            $conv = array(
              '\[gras\](.*?)\[\/gras\]' => '<strong>$1</strong>',
              '\[italique\](.*?)\[\/italique\]' => '<em>$1</em>',
              '\[souligne\](.*?)\[\/souligne\]' => '<u>$1</u>',
              '\[lien url="([^\]]*)"\](.*)\[\/lien\]' => '<a href="$1">$2</a>'
            );
            
            foreach($conv as $k => $v)
            {
                $texte = preg_replace('/'.$k.'/',$v,$texte);
            }
            
            return nl2br($texte, true);
        }
    }
    
    /**
	 * Fonction permettant de convertir les balises zCode en HTML et de supprimer les balises HTML non voulues.
	 *
	 * @param string $table Le texte à convertir et à nettoyer.
	 * @return string Le texte converti et nettoyé.
	 */
    public static function unsanitize($texte){
        if(isset($texte) && !empty($texte)){            
            
            $texte = html_entity_decode($texte, ENT_NOQUOTES, 'UTF-8');            
            
            $conv = array(
              '\<strong>(.*?)\<\/strong\>' => '[gras]$1[/gras]',
              '\<em\>(.*?)\<\/em\>' => '[italique]$1[/italique]',
              '\<u\>(.*?)\<\/u\>' => '[souligne]$1[/souligne]',
              '\<a href="([^\>]*)"\>(.*)\<\/a\>' => '[lien url="$1"]$2[/lien]'
            );
            
            foreach($conv as $k => $v)
            {
                $texte = preg_replace('/'.$k.'/',$v,$texte);
            }
            
            return str_replace("<br />","",$texte);
        }
    }
}

?>