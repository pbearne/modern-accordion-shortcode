modern-accordion-shortcode
==========================

A simple WordPress plugin that addes a shortcode for accordions.

[accordions clearStyle=false collapsible=true]

	[accordion title="title" icontype="square"] 
	
		Stuff goes here
	
	[/accordion]
	[accordion title="title2" icontype="circle"]
	
		Here as well
	
	[/accordion]
	
[/accordions]


========================== API ==========================

== [accordions][/accordions] == 

Parernt container which containers [accodion][/accordion] elements.

-----------------------------------------------------

== collapsible: true / false ==

true = all accordions can be closed

false = one accordion will always be open


ex:

[accordions collapsible=true]
	[accodion][/accordion]
[/accordions]

-----------------------------------------------------

<strong>active</strong>: interger

Allows you to select which accrodion is active. For example if you have a total of 5 accordions but you want the 3rd accrodion be to open (active) you would use something like this:

ex:

[accordions active=3]
	[accodion][/accordion]
[/accordions]


-----------------------------------------------------

<strong>active</strong>: interger

Allows you to select which accrodion is active. For example if you have a total of 5 accordions but you want the 3rd accrodion be to open (active) you would use something like this:

ex:

[accordions active=3]
	[accodion][/accordion]
[/accordions]


More to come...
