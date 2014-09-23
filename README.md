modern-accordion-shortcode
==========================

<p>A simple WordPress plugin that addes a shortcode for accordions.</p>

<pre>
[accordions clearStyle=false collapsible=true]

	[accordion title="title" icontype="square"] 
	
		Stuff goes here
	
	[/accordion]
	[accordion title="title2" icontype="circle"]
	
		Here as well
	
	[/accordion]
	
[/accordions]
</pre>


========================== API ==========================

<strong> [accordions][/accordions] </strong>

Parernt container which containers the singliar accodion element.


<pre>
[accordions]
	[accodion][/accordion]
[/accordions]
</pre>

-----------------------------------------------------

<strong>collapsible:</strong> boolean

<strong>true</strong> = all accordions can be closed

<strong>false</strong> = one accordion will always be open

<pre>
[accordions collapsible=true]
	[accodion][/accordion]
[/accordions]
</pre>

-----------------------------------------------------

<strong>active</strong>: interger

<p>Allows you to select which accrodion is active. For example if you have a total of 5 accordion elements but you want the 3rd accrodion be to open (active) you would use something like this:</p>

<pre>
[accordions active=3]
	[accodion]Content 1[/accordion]
    [accodion]Content 2[/accordion]
    [accodion]Content 3[/accordion]
    [accodion]Content 4[/accordion]
    [accodion]Content 5[/accordion]
[/accordions] 
</pre>

-----------------------------------------------------

<strong>title</strong>: text

Enter the title for the accordion element

<pre>
[accordions]
	[accodion title="This is accordion 1"][/accordion]
[/accordions]
</pre>

-----------------------------------------------------

<strong>icontype</strong>: circle / square /null

Allows you to change the icon that is being used by the accordion element. Currently supported is square plus & minus, circle plus & minus and no icon (null). 

<pre>
	[accodion icontype="circle"][/accordion
</pre>



<strong>Please note</strong>: you are able to assign a diffrenet type of icon to each element. For example you can assign a circle icon to the frist and thrid accordion elements and assign a sqaure icon to the second.

<pre> 
[accordions]
	[accodion icontype="circle"]Content 1[/accordion] 
	[accodion icontype="square"]Content 2[/accordion]
    [accodion icontype="circle"]Content 3[/accordion] 
[/accordions]
</pre>

-----------------------------------------------------

More to come...
