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

<strong> [accordions][/accordions] </strong>

Parernt container which containers [accodion][/accordion] elements.

ex:
<code>
[accordions]
	[accodion][/accordion]
[/accordions]
</code>

-----------------------------------------------------

<strong>collapsible:</strong> true / false

true = all accordions can be closed

false = one accordion will always be open


ex:

<code>
[accordions collapsible=true]
	[accodion][/accordion]
[/accordions]
</code>

-----------------------------------------------------

<strong>active</strong>: interger

Allows you to select which accrodion is active. For example if you have a total of 5 accordions but you want the 3rd accrodion be to open (active) you would use something like this:

ex:
<code>
[accordions active=3]
	[accodion][/accordion]
[/accordions]
</code>

-----------------------------------------------------

<strong>title</strong>: boolen

Enter the title for the accordion element

ex:
<code>
[accordions]
	[accodion title="This is accordion 1"]
	
	[/accordion]
[/accordions]
</code>
-----------------------------------------------------

<strong>icontype</strong>: circle / square /null

Allows you to change the icon that is being used by the accordion element. Currently supported is square plus & minus, circle plus & minus and no icon (null). 

ex: <code>[accodion icontype="circle"]</code>



<strong>Please note</strong> you are able to assign a diffrenet type of icons to elements, meaning if you want to have the frist accordion use cirlce icon and the second accodion use square you are able to do so.

ex:
<code> [accodion icontype="circle"][/accordion] [accodion icontype="square"][/accordion
	
[/accordions]
</code>

More to come...
