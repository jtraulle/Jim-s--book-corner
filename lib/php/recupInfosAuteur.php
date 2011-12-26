<?php

require_once('../arc2/ARC2.php');

$remoteconfig = array(
    'remote_store_endpoint' => 'http://dbpedia.org/sparql',
);

$remotestore = ARC2::getRemoteStore($remoteconfig);

$query="SELECT ?abstract
WHERE {
{ <http://dbpedia.org/resource/".$_GET['nomPrenomAuteur']."> <http://dbpedia.org/ontology/abstract> ?abstract .
FILTER langMatches( lang(?abstract), 'en') }
}";
		
$result = $remotestore->query($query, 'row');
if(isset($result['abstract']))
    echo "<p>".$result['abstract']."</p><small>Wikipédia, l'encyclopédie libre et gratuite.</small>";

?>