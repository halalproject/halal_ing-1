<style type="text/css">
<!--
.tooltiptitle{COLOR: #FFFFFF; TEXT-DECORATION: none; CURSOR: Default; font-family: arial; font-weight: bold; font-size: 8pt}
.tooltipcontent{COLOR: #000000; TEXT-DECORATION: none; CURSOR: Default; font-family: arial; font-size: 8pt}

#ToolTip{position:absolute; width: 100px; top: 0px; left: 0px; z-index:4; visibility:hidden;}
-->
</style>
<script language = "JavaScript1.2">
<!--
var ie = document.all ? 1 : 0
var ns = document.layers ? 1 : 0

if(ns){doc = "document."; sty = ""}
if(ie){doc = "document.all."; sty = ".style"}
var initialize = 0
var Ex, Ey, topColor, subColor, ContentInfo
if(ie){
Ex = "event.x"
Ey = "event.y"
topColor = "#808080"
subColor = "#C0C0C0"
}

if(ns){
Ex = "e.pageX"
Ey = "e.pageY"
window.captureEvents(Event.MOUSEMOVE)
window.onmousemove=overhere

topColor = "#808080"
subColor = "#C0C0C0"
}

function MoveToolTip(layerName, FromTop, FromLeft, e){
if(ie){eval(doc + layerName + sty + ".top = "  + (eval(FromTop) + document.body.scrollTop))}
if(ns){eval(doc + layerName + sty + ".top = "  +  eval(FromTop))}
eval(doc + layerName + sty + ".left = " + (eval(FromLeft) + 15))
}

function ReplaceContent(layerName){

if(ie){document.all[layerName].innerHTML = ContentInfo}

if(ns){
with(document.layers[layerName].document) 
{ 
   open(); 
   write(ContentInfo); 
   close(); 
}

}


}

function Activate(){initialize=1}
function deActivate(){initialize=0}

function overhere(e){
if(initialize){

MoveToolTip("ToolTip", Ey, Ex, e)
eval(doc + "ToolTip" + sty + ".visibility = 'visible'")
}

else{
MoveToolTip("ToolTip", 0, 0)
eval(doc + "ToolTip" + sty + ".visibility = 'hidden'")
}


}

function EnterContent(layerName, TTitle, TContent){

ContentInfo = '<table border="0" width="150" cellspacing="0" cellpadding="0">'+
'<tr><td width="100%" bgcolor="#000000">'+

'<table border="0" width="100%" cellspacing="1" cellpadding="0">'+
'<tr><td width="100%" bgcolor='+topColor+'>'+

'<table border="0" width="90%" cellspacing="0" cellpadding="0" align="center">'+
'<tr><td width="100%">'+

'<font class="tooltiptitle">&nbsp;'+TTitle+'</font>'+

'</td></tr>'+
'</table>'+

'</td></tr>'+

'<tr><td width="100%" bgcolor='+subColor+'>'+

'<table border="0" width="90%" cellpadding="0" cellspacing="1" align="center">'+

'<tr><td width="100%">'+

'<font class="tooltipcontent">'+TContent+'</font>'+

'</td></tr>'+
'</table>'+

'</td></tr>'+
'</table>'+

'</td></tr>'+
'</table>';


ReplaceContent(layerName)

}





//-->
</script>

