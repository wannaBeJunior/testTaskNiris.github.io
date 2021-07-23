var list = document.querySelector('div[class=list]');
var count = list.children.length;
var d = 0;
function listDown(i) 
{
	if(d < count-10)
	{
		d = d + i;
		list.children[0].style.marginTop = (-30 * d) + 'px';
	}
}
function listUp(i) 
{
	if(d > 1)
	{
		d = d + i;
		list.children[0].style.marginTop = (-30 * d) + 'px';
	}
}