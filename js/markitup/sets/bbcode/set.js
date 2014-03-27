// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// BBCode tags example
// http://en.wikipedia.org/wiki/Bbcode
// ----------------------------------------------------------------------------
// Feel free to add more tags
// ----------------------------------------------------------------------------
bbCodeSet = {
	previewParserPath:	'', // path to your BBCode parser
	markupSet: [
		{name:'Bold', key:'B', openWith:'[b]', closeWith:'[/b]'},
		{name:'Italic', key:'I', openWith:'[i]', closeWith:'[/i]'},
		{name:'Underline', key:'U', openWith:'[u]', closeWith:'[/u]'},
		{separator:'---------------' },
		{name:'Picture', key:'P', replaceWith:'[img][![Url]!][/img]'},
		{name:'Link', key:'L', openWith:'[url=[![Url]!]]', closeWith:'[/url]', placeHolder:'Your text to link here...'},
		{separator:'---------------' },
		{name:'Size', key:'S', openWith:'[size=[![Text size]!]]', closeWith:'[/size]',
		dropMenu :[
			{name:'Big', openWith:'[size=5]', closeWith:'[/size]' },
			{name:'Normal', openWith:'[size=-1]', closeWith:'[/size]' },
			{name:'Small', openWith:'[size=-7]', closeWith:'[/size]' }
		]},
		{separator:'---------------' },
		{name:'Bulleted list', openWith:'[list]\n', closeWith:'\n[/list]'},
		{name:'Numeric list', openWith:'[list=[![Starting number]!]]\n', closeWith:'\n[/list]'}, 
		{name:'List item', openWith:'[*] '},
		{separator:'---------------' },
		{name:'Quotes', openWith:'[quote]', closeWith:'[/quote]'},
		{name:'Code', openWith:'[code]', closeWith:'[/code]'}, 
		{name:'Video', openWith:'[video]', closeWith:'[/video]'}, 
		{name:'Spoiler', openWith:'[spoiler]', closeWith:'[/spoiler]'},
		
		/*{name:'Smile',
		dropMenu :[
			{name:'Big', openWith:'[size=5]', closeWith:'[/size]' },
			{name:'Normal', openWith:'[size=-1]', closeWith:'[/size]' },
			{name:'Small', openWith:'[size=-7]', closeWith:'[/size]' }
		]},*/
		{separator:'---------------' },
		
		{name:'Clean', className:"clean", replaceWith:function(markitup) { return markitup.selection.replace(/\[(.*?)\]/g, "") } },
		{name:'Alignments', className:'alignments', dropMenu:[
			{name:'Left', className:'left', openWith:'[left]', closeWith:'[/left]'},
			{name:'Center', className:'center', openWith:'[center]', closeWith:'[/center]'},
			{name:'Right', className:'right', openWith:'[right]', closeWith:'[/right]'},
			{name:'Justify', className:'justify', openWith:'[justify]', closeWith:'[/justify]'}
			]
		},
		/*{name:'Padding/Margin', className:'padding', dropMenu:[
				{name:'Top', className:'top', openWith:'(!(padding|!|margin)!)-top:', placeHolder:'5px', closeWith:';' },
				{name:'Left', className:'left', openWith:'(!(padding|!|margin)!)-left:', placeHolder:'5px', closeWith:';' },
				{name:'Right', className:'right', openWith:'(!(padding|!|margin)!)-right:', placeHolder:'5px', closeWith:';' },
				{name:'Bottom', className:'bottom', openWith:'(!(padding|!|margin)!)-bottom:', placeHolder:'5px', closeWith:';' }
			]
		}*/
	]
}