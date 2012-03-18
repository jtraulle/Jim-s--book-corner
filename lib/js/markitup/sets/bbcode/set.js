// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2011 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Html tags
// http://en.wikipedia.org/wiki/html
// ----------------------------------------------------------------------------
// Basic set. Feel free to add more tags
// ----------------------------------------------------------------------------
var mySettings = {
	onTab:    		{keepDefault:false, replaceWith:'    '},
	markupSet:  [ 	
		{name:'Gras', key:'B', openWith:'[gras]', closeWith:'[/gras]' },
		{name:'Italique', key:'I', openWith:'[italique]', closeWith:'[/italique]'  },
		{name:'Souligné', key:'S', openWith:'[souligne]', closeWith:'[/souligne]' },
		{separator:'---------------' },
		{name:'Lien', key:'L', openWith:'[lien url="[![URL de votre lien :!:http://]!]"]', closeWith:'[/lien]', placeHolder:'Texte de votre lien ...' }
	]
}
