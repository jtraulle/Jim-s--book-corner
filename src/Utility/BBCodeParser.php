<?php
namespace App\Utility;

/**
 * BBCodeParser component
 */
class BBCodeParser
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Fonction permettant de convertir les balises zCode en HTML et de supprimer les balises HTML non voulues.
     *
     * @param string $texte Le texte à convertir et à nettoyer.
     * @return string|void Le texte converti et nettoyé.
     */
    public static function bbcodeToHtml($texte)
    {
        if (isset($texte) && !empty($texte)) {
            $texte = htmlentities($texte, ENT_NOQUOTES, 'UTF-8');
            $conv = array(
                '\[b\](.*?)\[\/b\]' => '<strong>$1</strong>',
                '\[i\](.*?)\[\/i\]' => '<em>$1</em>',
                '\[u\](.*?)\[\/u\]' => '<u>$1</u>',
                '\[url="([^\]]*)"\](.*)\[\/url\]' => '<a href="$1">$2</a>'
            );
            foreach($conv as $k => $v) {
                $texte = preg_replace('/' . $k . '/', $v, $texte);
            }
            return nl2br($texte, true);
        }
    }

    /**
     * Fonction permettant de convertir les balises zCode en HTML et de supprimer les balises HTML non voulues.
     *
     * @param string $texte Le texte à convertir et à nettoyer.
     * @return string|void Le texte converti et nettoyé.
     */
    public static function htmlToBbcode($texte)
    {
        if (isset($texte) && !empty($texte)) {
            $texte = html_entity_decode($texte, ENT_NOQUOTES, 'UTF-8');
            $conv = array(
                '\<strong>(.*?)\<\/strong\>' => '[b]$1[/b]',
                '\<em\>(.*?)\<\/em\>' => '[i]$1[/i]',
                '\<u\>(.*?)\<\/u\>' => '[u]$1[/u]',
                '\<a href="([^\>]*)"\>(.*)\<\/a\>' => '[url="$1"]$2[/url]'
            );
            foreach($conv as $k => $v) {
                $texte = preg_replace('/' . $k . '/', $v, $texte);
            }
            return str_replace("<br />", "", $texte);
        }
    }
}
