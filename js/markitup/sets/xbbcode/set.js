// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
xBbbCodeSet = {
    nameSpace:       "xbbcode", // Useful to prevent multi-instances CSS conflict
	previewParserPath:	'', // path to your XBBCode parser
	onShiftEnter:	{keepDefault:false, replaceWith:'[br /]\n'},
	onCtrlEnter:	{keepDefault:false, openWith:'\n[p]', closeWith:'[/p]\n'},
	onTab:			{keepDefault:false, openWith:'	 '},
	markupSet: [
		{name:'Heading 1', key:'1', openWith:'[h1(!( class="[![Class]!]")!)]', closeWith:'[/h1]', placeHolder:'Your title here...' },
		{name:'Heading 2', key:'2', openWith:'[h2(!( class="[![Class]!]")!)]', closeWith:'[/h2]', placeHolder:'Your title here...' },
		{name:'Heading 3', key:'3', openWith:'[h3(!( class="[![Class]!]")!)]', closeWith:'[/h3]', placeHolder:'Your title here...' },
		{name:'Heading 4', key:'4', openWith:'[h4(!( class="[![Class]!]")!)]', closeWith:'[/h4]', placeHolder:'Your title here...' },
		{name:'Heading 5', key:'5', openWith:'[h5(!( class="[![Class]!]")!)]', closeWith:'[/h5]', placeHolder:'Your title here...' },
		{name:'Heading 6', key:'6', openWith:'[h6(!( class="[![Class]!]")!)]', closeWith:'[/h6]', placeHolder:'Your title here...' },
		{name:'Paragraph', openWith:'[p(!( class="[![Class]!]")!)]', closeWith:'[/p]' },
		{separator:'---------------' },
		{name:'Bold', key:'B', openWith:'(!([strong]|!|[b])!)', closeWith:'(!([/strong]|!|[/b])!)' },
		{name:'Italic', key:'I', openWith:'(!([em]|!|[i])!)', closeWith:'(!([/em]|!|[/i])!)' },
		{name:'Stroke through', key:'S', openWith:'[del]', closeWith:'[/del]' },
		{separator:'---------------' },
		{name:'Ul', openWith:'[ul]\n', closeWith:'[/ul]\n' },
		{name:'Ol', openWith:'[ol]\n', closeWith:'[/ol]\n' },
		{name:'Li', openWith:'[li]', closeWith:'[/li]' },
		{separator:'---------------' },
		{name:'Picture', key:'P', replaceWith:'[img][![Url]!][/img]'},
		{name:'Link', key:'L', openWith:'[a href="[![Link:!:http://]!]"(!( title="[![Title]!]")!)]', closeWith:'[/a]', placeHolder:'Your text to link...' },
		{separator:'---------------' },
		{name:'Clean', className:'clean', replaceWith:function(markitup) { return markitup.selection.replace(/\[(.*?)\]/g, "") } },
		{name:'Preview', className:'preview', call:'preview' },
		{name:'Alignments', className:'alignments', dropMenu:[
			{name:'Left', className:'left', openWith:'[left]', closeWith:'[/left]'},
			{name:'Center', className:'center', openWith:'[center]', closeWith:'[/center]'},
			{name:'Right', className:'right', openWith:'[right]', closeWith:'[/right]'},
			{name:'Justify', className:'justify', openWith:'[justify]', closeWith:'[/justify]'}
			]
		},
		{name:'Colors', 
			className:'colors', 
			openWith:'[color=[![Color]!]]', 
			closeWith:'[/color]', 
				dropMenu: [
					{name:'Yellow',	openWith:'[color=yellow]', 	closeWith:'[/color]', className:"col1-1" },
					{name:'Orange',	openWith:'[color=orange]', 	closeWith:'[/color]', className:"col1-2" },
					{name:'Red', 	openWith:'[color=red]', 	closeWith:'[/color]', className:"col1-3" },
					
					{name:'Blue', 	openWith:'[color=blue]', 	closeWith:'[/color]', className:"col2-1" },
					{name:'Purple', openWith:'[color=purple]', 	closeWith:'[/color]', className:"col2-2" },
					{name:'Green', 	openWith:'[color=green]', 	closeWith:'[/color]', className:"col2-3" },
					
					{name:'White', 	openWith:'[color=white]', 	closeWith:'[/color]', className:"col3-1" },
					{name:'Gray', 	openWith:'[color=gray]', 	closeWith:'[/color]', className:"col3-2" },
					{name:'Black',	openWith:'[color=black]', 	closeWith:'[/color]', className:"col3-3" }
				]
		}
	]
}