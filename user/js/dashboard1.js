$(function(){"use strict";for(var t=[new Chartist.Bar(".amp-pxl",{labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],series:[[9,5,3,7,5,10,3],[6,3,9,5,4,6,4]]},{axisX:{position:"end",showGrid:!1},axisY:{position:"start"},high:"12",low:"0",plugins:[Chartist.plugins.tooltip()]})],e=0;e<t.length;e++)t[e].on("draw",function(t){"line"!==t.type&&"area"!==t.type||t.element.animate({d:{begin:500*t.index,dur:500,from:t.path.clone().scale(1,0).translate(0,t.chartRect.height()).stringify(),to:t.path.clone().stringify(),easing:Chartist.Svg.Easing.easeInOutElastic}}),"bar"===t.type&&t.element.animate({y2:{dur:500,from:t.y1,to:t.y2,easing:Chartist.Svg.Easing.easeInOutElastic},opacity:{dur:500,from:0,to:1,easing:Chartist.Svg.Easing.easeInOutElastic}})});t=c3.generate({bindto:"#visitor",data:{columns:[["Other",30],["Desktop",10],["Tablet",40],["Mobile",50]],type:"donut",onclick:function(t,e){console.log("onclick",t,e)},onmouseover:function(t,e){console.log("onmouseover",t,e)},onmouseout:function(t,e){console.log("onmouseout",t,e)}},donut:{label:{show:!1},title:"Our visitor",width:20},legend:{hide:!0},color:{pattern:["#eceff1","#745af2","#26c6da","#1e88e5"]}})});