
(function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}
$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);;(function($){var ver='2.88';if($.support==undefined){$.support={opacity:!($.browser.msie)};}
function debug(s){if($.fn.cycle.debug)
log(s);}
function log(){if(window.console&&window.console.log)
window.console.log('[cycle] '+Array.prototype.join.call(arguments,' '));};$.fn.cycle=function(options,arg2){var o={s:this.selector,c:this.context};if(this.length===0&&options!='stop'){if(!$.isReady&&o.s){log('DOM not ready, queuing slideshow');$(function(){$(o.s,o.c).cycle(options,arg2);});return this;}
log('terminating; zero elements found by selector'+($.isReady?'':' (DOM not ready)'));return this;}
return this.each(function(){var opts=handleArguments(this,options,arg2);if(opts===false)
return;opts.updateActivePagerLink=opts.updateActivePagerLink||$.fn.cycle.updateActivePagerLink;if(this.cycleTimeout)
clearTimeout(this.cycleTimeout);this.cycleTimeout=this.cyclePause=0;var $cont=$(this);var $slides=opts.slideExpr?$(opts.slideExpr,this):$cont.children();var els=$slides.get();if(els.length<2){log('terminating; too few slides: '+els.length);return;}
var opts2=buildOptions($cont,$slides,els,opts,o);if(opts2===false)
return;var startTime=opts2.continuous?10:getTimeout(els[opts2.currSlide],els[opts2.nextSlide],opts2,!opts2.rev);if(startTime){startTime+=(opts2.delay||0);if(startTime<10)
startTime=10;debug('first timeout: '+startTime);this.cycleTimeout=setTimeout(function(){go(els,opts2,0,(!opts2.rev&&!opts.backwards))},startTime);}});};function handleArguments(cont,options,arg2){if(cont.cycleStop==undefined)
cont.cycleStop=0;if(options===undefined||options===null)
options={};if(options.constructor==String){switch(options){case'destroy':case'stop':var opts=$(cont).data('cycle.opts');if(!opts)
return false;cont.cycleStop++;if(cont.cycleTimeout)
clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;$(cont).removeData('cycle.opts');if(options=='destroy')
destroy(opts);return false;case'toggle':cont.cyclePause=(cont.cyclePause===1)?0:1;checkInstantResume(cont.cyclePause,arg2,cont);return false;case'pause':cont.cyclePause=1;return false;case'resume':cont.cyclePause=0;checkInstantResume(false,arg2,cont);return false;case'prev':case'next':var opts=$(cont).data('cycle.opts');if(!opts){log('options not found, "prev/next" ignored');return false;}
$.fn.cycle[options](opts);return false;default:options={fx:options};};return options;}
else if(options.constructor==Number){var num=options;options=$(cont).data('cycle.opts');if(!options){log('options not found, can not advance slide');return false;}
if(num<0||num>=options.elements.length){log('invalid slide index: '+num);return false;}
options.nextSlide=num;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}
if(typeof arg2=='string')
options.oneTimeFx=arg2;go(options.elements,options,1,num>=options.currSlide);return false;}
return options;function checkInstantResume(isPaused,arg2,cont){if(!isPaused&&arg2===true){var options=$(cont).data('cycle.opts');if(!options){log('options not found, can not resume');return false;}
if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}
go(options.elements,options,1,(!opts.rev&&!opts.backwards));}}};function removeFilter(el,opts){if(!$.support.opacity&&opts.cleartype&&el.style.filter){try{el.style.removeAttribute('filter');}
catch(smother){}}};function destroy(opts){if(opts.next)
$(opts.next).unbind(opts.prevNextEvent);if(opts.prev)
$(opts.prev).unbind(opts.prevNextEvent);if(opts.pager||opts.pagerAnchorBuilder)
$.each(opts.pagerAnchors||[],function(){this.unbind().remove();});opts.pagerAnchors=null;if(opts.destroy)
opts.destroy(opts);};function buildOptions($cont,$slides,els,options,o){var opts=$.extend({},$.fn.cycle.defaults,options||{},$.metadata?$cont.metadata():$.meta?$cont.data():{});if(opts.autostop)
opts.countdown=opts.autostopCount||els.length;var cont=$cont[0];$cont.data('cycle.opts',opts);opts.$cont=$cont;opts.stopCount=cont.cycleStop;opts.elements=els;opts.before=opts.before?[opts.before]:[];opts.after=opts.after?[opts.after]:[];opts.after.unshift(function(){opts.busy=0;});if(!$.support.opacity&&opts.cleartype)
opts.after.push(function(){removeFilter(this,opts);});if(opts.continuous)
opts.after.push(function(){go(els,opts,0,(!opts.rev&&!opts.backwards));});saveOriginalOpts(opts);if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg)
clearTypeFix($slides);if($cont.css('position')=='static')
$cont.css('position','relative');if(opts.width)
$cont.width(opts.width);if(opts.height&&opts.height!='auto')
$cont.height(opts.height);if(opts.startingSlide)
opts.startingSlide=parseInt(opts.startingSlide);else if(opts.backwards)
opts.startingSlide=els.length-1;if(opts.random){opts.randomMap=[];for(var i=0;i<els.length;i++)
opts.randomMap.push(i);opts.randomMap.sort(function(a,b){return Math.random()-0.5;});opts.randomIndex=1;opts.startingSlide=opts.randomMap[1];}
else if(opts.startingSlide>=els.length)
opts.startingSlide=0;opts.currSlide=opts.startingSlide||0;var first=opts.startingSlide;$slides.css({position:'absolute',top:0,left:0}).hide().each(function(i){var z;if(opts.backwards)
z=first?i<=first?els.length+(i-first):first-i:els.length-i;else
z=first?i>=first?els.length-(i-first):first-i:els.length-i;$(this).css('z-index',z)});$(els[first]).css('opacity',1).show();removeFilter(els[first],opts);if(opts.fit&&opts.width)
$slides.width(opts.width);if(opts.fit&&opts.height&&opts.height!='auto')
$slides.height(opts.height);var reshape=opts.containerResize&&!$cont.innerHeight();if(reshape){var maxw=0,maxh=0;for(var j=0;j<els.length;j++){var $e=$(els[j]),e=$e[0],w=$e.outerWidth(),h=$e.outerHeight();if(!w)w=e.offsetWidth||e.width||$e.attr('width')
if(!h)h=e.offsetHeight||e.height||$e.attr('height');maxw=w>maxw?w:maxw;maxh=h>maxh?h:maxh;}
if(maxw>0&&maxh>0)
$cont.css({width:maxw+'px',height:maxh+'px'});}
if(opts.pause)
$cont.hover(function(){this.cyclePause++;},function(){this.cyclePause--;});if(supportMultiTransitions(opts)===false)
return false;var requeue=false;options.requeueAttempts=options.requeueAttempts||0;$slides.each(function(){var $el=$(this);this.cycleH=(opts.fit&&opts.height)?opts.height:($el.height()||this.offsetHeight||this.height||$el.attr('height')||0);this.cycleW=(opts.fit&&opts.width)?opts.width:($el.width()||this.offsetWidth||this.width||$el.attr('width')||0);if($el.is('img')){var loadingIE=($.browser.msie&&this.cycleW==28&&this.cycleH==30&&!this.complete);var loadingFF=($.browser.mozilla&&this.cycleW==34&&this.cycleH==19&&!this.complete);var loadingOp=($.browser.opera&&((this.cycleW==42&&this.cycleH==19)||(this.cycleW==37&&this.cycleH==17))&&!this.complete);var loadingOther=(this.cycleH==0&&this.cycleW==0&&!this.complete);if(loadingIE||loadingFF||loadingOp||loadingOther){if(o.s&&opts.requeueOnImageNotLoaded&&++options.requeueAttempts<100){log(options.requeueAttempts,' - img slide not loaded, requeuing slideshow: ',this.src,this.cycleW,this.cycleH);setTimeout(function(){$(o.s,o.c).cycle(options)},opts.requeueTimeout);requeue=true;return false;}
else{log('could not determine size of image: '+this.src,this.cycleW,this.cycleH);}}}
return true;});if(requeue)
return false;opts.cssBefore=opts.cssBefore||{};opts.animIn=opts.animIn||{};opts.animOut=opts.animOut||{};$slides.not(':eq('+first+')').css(opts.cssBefore);if(opts.cssFirst)
$($slides[first]).css(opts.cssFirst);if(opts.timeout){opts.timeout=parseInt(opts.timeout);if(opts.speed.constructor==String)
opts.speed=$.fx.speeds[opts.speed]||parseInt(opts.speed);if(!opts.sync)
opts.speed=opts.speed/2;var buffer=opts.fx=='shuffle'?500:250;while((opts.timeout-opts.speed)<buffer)
opts.timeout+=opts.speed;}
if(opts.easing)
opts.easeIn=opts.easeOut=opts.easing;if(!opts.speedIn)
opts.speedIn=opts.speed;if(!opts.speedOut)
opts.speedOut=opts.speed;opts.slideCount=els.length;opts.currSlide=opts.lastSlide=first;if(opts.random){if(++opts.randomIndex==els.length)
opts.randomIndex=0;opts.nextSlide=opts.randomMap[opts.randomIndex];}
else if(opts.backwards)
opts.nextSlide=opts.startingSlide==0?(els.length-1):opts.startingSlide-1;else
opts.nextSlide=opts.startingSlide>=(els.length-1)?0:opts.startingSlide+1;if(!opts.multiFx){var init=$.fn.cycle.transitions[opts.fx];if($.isFunction(init))
init($cont,$slides,opts);else if(opts.fx!='custom'&&!opts.multiFx){log('unknown transition: '+opts.fx,'; slideshow terminating');return false;}}
var e0=$slides[first];if(opts.before.length)
opts.before[0].apply(e0,[e0,e0,opts,true]);if(opts.after.length>1)
opts.after[1].apply(e0,[e0,e0,opts,true]);if(opts.next)
$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,opts.rev?-1:1)});if(opts.prev)
$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,opts.rev?1:-1)});if(opts.pager||opts.pagerAnchorBuilder)
buildPager(els,opts);exposeAddSlide(opts,els);return opts;};function saveOriginalOpts(opts){opts.original={before:[],after:[]};opts.original.cssBefore=$.extend({},opts.cssBefore);opts.original.cssAfter=$.extend({},opts.cssAfter);opts.original.animIn=$.extend({},opts.animIn);opts.original.animOut=$.extend({},opts.animOut);$.each(opts.before,function(){opts.original.before.push(this);});$.each(opts.after,function(){opts.original.after.push(this);});};function supportMultiTransitions(opts){var i,tx,txs=$.fn.cycle.transitions;if(opts.fx.indexOf(',')>0){opts.multiFx=true;opts.fxs=opts.fx.replace(/\s*/g,'').split(',');for(i=0;i<opts.fxs.length;i++){var fx=opts.fxs[i];tx=txs[fx];if(!tx||!txs.hasOwnProperty(fx)||!$.isFunction(tx)){log('discarding unknown transition: ',fx);opts.fxs.splice(i,1);i--;}}
if(!opts.fxs.length){log('No valid transitions named; slideshow terminating.');return false;}}
else if(opts.fx=='all'){opts.multiFx=true;opts.fxs=[];for(p in txs){tx=txs[p];if(txs.hasOwnProperty(p)&&$.isFunction(tx))
opts.fxs.push(p);}}
if(opts.multiFx&&opts.randomizeEffects){var r1=Math.floor(Math.random()*20)+30;for(i=0;i<r1;i++){var r2=Math.floor(Math.random()*opts.fxs.length);opts.fxs.push(opts.fxs.splice(r2,1)[0]);}
debug('randomized fx sequence: ',opts.fxs);}
return true;};function exposeAddSlide(opts,els){opts.addSlide=function(newSlide,prepend){var $s=$(newSlide),s=$s[0];if(!opts.autostopCount)
opts.countdown++;els[prepend?'unshift':'push'](s);if(opts.els)
opts.els[prepend?'unshift':'push'](s);opts.slideCount=els.length;$s.css('position','absolute');$s[prepend?'prependTo':'appendTo'](opts.$cont);if(prepend){opts.currSlide++;opts.nextSlide++;}
if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg)
clearTypeFix($s);if(opts.fit&&opts.width)
$s.width(opts.width);if(opts.fit&&opts.height&&opts.height!='auto')
$slides.height(opts.height);s.cycleH=(opts.fit&&opts.height)?opts.height:$s.height();s.cycleW=(opts.fit&&opts.width)?opts.width:$s.width();$s.css(opts.cssBefore);if(opts.pager||opts.pagerAnchorBuilder)
$.fn.cycle.createPagerAnchor(els.length-1,s,$(opts.pager),els,opts);if($.isFunction(opts.onAddSlide))
opts.onAddSlide($s);else
$s.hide();};}
$.fn.cycle.resetState=function(opts,fx){fx=fx||opts.fx;opts.before=[];opts.after=[];opts.cssBefore=$.extend({},opts.original.cssBefore);opts.cssAfter=$.extend({},opts.original.cssAfter);opts.animIn=$.extend({},opts.original.animIn);opts.animOut=$.extend({},opts.original.animOut);opts.fxFn=null;$.each(opts.original.before,function(){opts.before.push(this);});$.each(opts.original.after,function(){opts.after.push(this);});var init=$.fn.cycle.transitions[fx];if($.isFunction(init))
init(opts.$cont,$(opts.elements),opts);};function go(els,opts,manual,fwd){if(manual&&opts.busy&&opts.manualTrump){debug('manualTrump in go(), stopping active transition');$(els).stop(true,true);opts.busy=false;}
if(opts.busy){debug('transition active, ignoring new tx request');return;}
var p=opts.$cont[0],curr=els[opts.currSlide],next=els[opts.nextSlide];if(p.cycleStop!=opts.stopCount||p.cycleTimeout===0&&!manual)
return;if(!manual&&!p.cyclePause&&!opts.bounce&&((opts.autostop&&(--opts.countdown<=0))||(opts.nowrap&&!opts.random&&opts.nextSlide<opts.currSlide))){if(opts.end)
opts.end(opts);return;}
var changed=false;if((manual||!p.cyclePause)&&(opts.nextSlide!=opts.currSlide)){changed=true;var fx=opts.fx;curr.cycleH=curr.cycleH||$(curr).height();curr.cycleW=curr.cycleW||$(curr).width();next.cycleH=next.cycleH||$(next).height();next.cycleW=next.cycleW||$(next).width();if(opts.multiFx){if(opts.lastFx==undefined||++opts.lastFx>=opts.fxs.length)
opts.lastFx=0;fx=opts.fxs[opts.lastFx];opts.currFx=fx;}
if(opts.oneTimeFx){fx=opts.oneTimeFx;opts.oneTimeFx=null;}
$.fn.cycle.resetState(opts,fx);if(opts.before.length)
$.each(opts.before,function(i,o){if(p.cycleStop!=opts.stopCount)return;o.apply(next,[curr,next,opts,fwd]);});var after=function(){$.each(opts.after,function(i,o){if(p.cycleStop!=opts.stopCount)return;o.apply(next,[curr,next,opts,fwd]);});};debug('tx firing; currSlide: '+opts.currSlide+'; nextSlide: '+opts.nextSlide);opts.busy=1;if(opts.fxFn)
opts.fxFn(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);else if($.isFunction($.fn.cycle[opts.fx]))
$.fn.cycle[opts.fx](curr,next,opts,after,fwd,manual&&opts.fastOnEvent);else
$.fn.cycle.custom(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}
if(changed||opts.nextSlide==opts.currSlide){opts.lastSlide=opts.currSlide;if(opts.random){opts.currSlide=opts.nextSlide;if(++opts.randomIndex==els.length)
opts.randomIndex=0;opts.nextSlide=opts.randomMap[opts.randomIndex];if(opts.nextSlide==opts.currSlide)
opts.nextSlide=(opts.currSlide==opts.slideCount-1)?0:opts.currSlide+1;}
else if(opts.backwards){var roll=(opts.nextSlide-1)<0;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=1;opts.currSlide=0;}
else{opts.nextSlide=roll?(els.length-1):opts.nextSlide-1;opts.currSlide=roll?0:opts.nextSlide+1;}}
else{var roll=(opts.nextSlide+1)==els.length;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=els.length-2;opts.currSlide=els.length-1;}
else{opts.nextSlide=roll?0:opts.nextSlide+1;opts.currSlide=roll?els.length-1:opts.nextSlide-1;}}}
if(changed&&opts.pager)
opts.updateActivePagerLink(opts.pager,opts.currSlide,opts.activePagerClass);var ms=0;if(opts.timeout&&!opts.continuous)
ms=getTimeout(els[opts.currSlide],els[opts.nextSlide],opts,fwd);else if(opts.continuous&&p.cyclePause)
ms=10;if(ms>0)
p.cycleTimeout=setTimeout(function(){go(els,opts,0,(!opts.rev&&!opts.backwards))},ms);};$.fn.cycle.updateActivePagerLink=function(pager,currSlide,clsName){$(pager).each(function(){$(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);});};function getTimeout(curr,next,opts,fwd){if(opts.timeoutFn){var t=opts.timeoutFn.call(curr,curr,next,opts,fwd);while((t-opts.speed)<250)
t+=opts.speed;debug('calculated timeout: '+t+'; speed: '+opts.speed);if(t!==false)
return t;}
return opts.timeout;};$.fn.cycle.next=function(opts){advance(opts,opts.rev?-1:1);};$.fn.cycle.prev=function(opts){advance(opts,opts.rev?1:-1);};function advance(opts,val){var els=opts.elements;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}
if(opts.random&&val<0){opts.randomIndex--;if(--opts.randomIndex==-2)
opts.randomIndex=els.length-2;else if(opts.randomIndex==-1)
opts.randomIndex=els.length-1;opts.nextSlide=opts.randomMap[opts.randomIndex];}
else if(opts.random){opts.nextSlide=opts.randomMap[opts.randomIndex];}
else{opts.nextSlide=opts.currSlide+val;if(opts.nextSlide<0){if(opts.nowrap)return false;opts.nextSlide=els.length-1;}
else if(opts.nextSlide>=els.length){if(opts.nowrap)return false;opts.nextSlide=0;}}
var cb=opts.onPrevNextEvent||opts.prevNextClick;if($.isFunction(cb))
cb(val>0,opts.nextSlide,els[opts.nextSlide]);go(els,opts,1,val>=0);return false;};function buildPager(els,opts){var $p=$(opts.pager);$.each(els,function(i,o){$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);});opts.updateActivePagerLink(opts.pager,opts.startingSlide,opts.activePagerClass);};$.fn.cycle.createPagerAnchor=function(i,el,$p,els,opts){var a;if($.isFunction(opts.pagerAnchorBuilder)){a=opts.pagerAnchorBuilder(i,el);debug('pagerAnchorBuilder('+i+', el) returned: '+a);}
else
a='<a href="#">'+(i+1)+'</a>';if(!a)
return;var $a=$(a);if($a.parents('body').length===0){var arr=[];if($p.length>1){$p.each(function(){var $clone=$a.clone(true);$(this).append($clone);arr.push($clone[0]);});$a=$(arr);}
else{$a.appendTo($p);}}
opts.pagerAnchors=opts.pagerAnchors||[];opts.pagerAnchors.push($a);$a.bind(opts.pagerEvent,function(e){e.preventDefault();opts.nextSlide=i;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}
var cb=opts.onPagerEvent||opts.pagerClick;if($.isFunction(cb))
cb(opts.nextSlide,els[opts.nextSlide]);go(els,opts,1,opts.currSlide<i);});if(!/^click/.test(opts.pagerEvent)&&!opts.allowPagerClickBubble)
$a.bind('click.cycle',function(){return false;});if(opts.pauseOnPagerHover)
$a.hover(function(){opts.$cont[0].cyclePause++;},function(){opts.$cont[0].cyclePause--;});};$.fn.cycle.hopsFromLast=function(opts,fwd){var hops,l=opts.lastSlide,c=opts.currSlide;if(fwd)
hops=c>l?c-l:opts.slideCount-l;else
hops=c<l?l-c:l+opts.slideCount-c;return hops;};function clearTypeFix($slides){debug('applying clearType background-color hack');function hex(s){s=parseInt(s).toString(16);return s.length<2?'0'+s:s;};function getBg(e){for(;e&&e.nodeName.toLowerCase()!='html';e=e.parentNode){var v=$.css(e,'background-color');if(v.indexOf('rgb')>=0){var rgb=v.match(/\d+/g);return'#'+hex(rgb[0])+hex(rgb[1])+hex(rgb[2]);}
if(v&&v!='transparent')
return v;}
return'#ffffff';};$slides.each(function(){$(this).css('background-color',getBg(this));});};$.fn.cycle.commonReset=function(curr,next,opts,w,h,rev){$(opts.elements).not(curr).hide();opts.cssBefore.opacity=1;opts.cssBefore.display='block';if(w!==false&&next.cycleW>0)
opts.cssBefore.width=next.cycleW;if(h!==false&&next.cycleH>0)
opts.cssBefore.height=next.cycleH;opts.cssAfter=opts.cssAfter||{};opts.cssAfter.display='none';$(curr).css('zIndex',opts.slideCount+(rev===true?1:0));$(next).css('zIndex',opts.slideCount+(rev===true?0:1));};$.fn.cycle.custom=function(curr,next,opts,cb,fwd,speedOverride){var $l=$(curr),$n=$(next);var speedIn=opts.speedIn,speedOut=opts.speedOut,easeIn=opts.easeIn,easeOut=opts.easeOut;$n.css(opts.cssBefore);if(speedOverride){if(typeof speedOverride=='number')
speedIn=speedOut=speedOverride;else
speedIn=speedOut=1;easeIn=easeOut=null;}
var fn=function(){$n.animate(opts.animIn,speedIn,easeIn,cb)};$l.animate(opts.animOut,speedOut,easeOut,function(){if(opts.cssAfter)$l.css(opts.cssAfter);if(!opts.sync)fn();});if(opts.sync)fn();};$.fn.cycle.transitions={fade:function($cont,$slides,opts){$slides.not(':eq('+opts.currSlide+')').css('opacity',0);opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.opacity=0;});opts.animIn={opacity:1};opts.animOut={opacity:0};opts.cssBefore={top:0,left:0};}};$.fn.cycle.ver=function(){return ver;};$.fn.cycle.defaults={fx:'fade',timeout:4000,timeoutFn:null,continuous:0,speed:1000,speedIn:null,speedOut:null,next:null,prev:null,onPrevNextEvent:null,prevNextEvent:'click.cycle',pager:null,onPagerEvent:null,pagerEvent:'click.cycle',allowPagerClickBubble:false,pagerAnchorBuilder:null,before:null,after:null,end:null,easing:null,easeIn:null,easeOut:null,shuffle:null,animIn:null,animOut:null,cssBefore:null,cssAfter:null,fxFn:null,height:'auto',startingSlide:0,sync:1,random:0,fit:0,containerResize:1,pause:0,pauseOnPagerHover:0,autostop:0,autostopCount:0,delay:0,slideExpr:null,cleartype:!$.support.opacity,cleartypeNoBg:false,nowrap:0,fastOnEvent:0,randomizeEffects:1,rev:0,manualTrump:true,requeueOnImageNotLoaded:true,requeueTimeout:250,activePagerClass:'activeSlide',updateActivePagerLink:null,backwards:false};})(jQuery);(function($){$.fn.cycle.transitions.none=function($cont,$slides,opts){opts.fxFn=function(curr,next,opts,after){$(next).show();$(curr).hide();after();};}
$.fn.cycle.transitions.scrollUp=function($cont,$slides,opts){$cont.css('overflow','hidden');opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssBefore={top:h,left:0};opts.cssFirst={top:0};opts.animIn={top:0};opts.animOut={top:-h};};$.fn.cycle.transitions.scrollDown=function($cont,$slides,opts){$cont.css('overflow','hidden');opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssFirst={top:0};opts.cssBefore={top:-h,left:0};opts.animIn={top:0};opts.animOut={top:h};};$.fn.cycle.transitions.scrollLeft=function($cont,$slides,opts){$cont.css('overflow','hidden');opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst={left:0};opts.cssBefore={left:w,top:0};opts.animIn={left:0};opts.animOut={left:0-w};};$.fn.cycle.transitions.scrollRight=function($cont,$slides,opts){$cont.css('overflow','hidden');opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst={left:0};opts.cssBefore={left:-w,top:0};opts.animIn={left:0};opts.animOut={left:w};};$.fn.cycle.transitions.scrollHorz=function($cont,$slides,opts){$cont.css('overflow','hidden').width();opts.before.push(function(curr,next,opts,fwd){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.left=fwd?(next.cycleW-1):(1-next.cycleW);opts.animOut.left=fwd?-curr.cycleW:curr.cycleW;});opts.cssFirst={left:0};opts.cssBefore={top:0};opts.animIn={left:0};opts.animOut={top:0};};$.fn.cycle.transitions.scrollVert=function($cont,$slides,opts){$cont.css('overflow','hidden');opts.before.push(function(curr,next,opts,fwd){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.top=fwd?(1-next.cycleH):(next.cycleH-1);opts.animOut.top=fwd?curr.cycleH:-curr.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0};opts.animIn={top:0};opts.animOut={left:0};};$.fn.cycle.transitions.slideX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;});opts.cssBefore={left:0,top:0,width:0};opts.animIn={width:'show'};opts.animOut={width:0};};$.fn.cycle.transitions.slideY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;});opts.cssBefore={left:0,top:0,height:0};opts.animIn={height:'show'};opts.animOut={height:0};};$.fn.cycle.transitions.shuffle=function($cont,$slides,opts){var i,w=$cont.css('overflow','visible').width();$slides.css({left:0,top:0});opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);});if(!opts.speedAdjusted){opts.speed=opts.speed/2;opts.speedAdjusted=true;}
opts.random=0;opts.shuffle=opts.shuffle||{left:-w,top:15};opts.els=[];for(i=0;i<$slides.length;i++)
opts.els.push($slides[i]);for(i=0;i<opts.currSlide;i++)
opts.els.push(opts.els.shift());opts.fxFn=function(curr,next,opts,cb,fwd){var $el=fwd?$(curr):$(next);$(next).css(opts.cssBefore);var count=opts.slideCount;$el.animate(opts.shuffle,opts.speedIn,opts.easeIn,function(){var hops=$.fn.cycle.hopsFromLast(opts,fwd);for(var k=0;k<hops;k++)
fwd?opts.els.push(opts.els.shift()):opts.els.unshift(opts.els.pop());if(fwd){for(var i=0,len=opts.els.length;i<len;i++)
$(opts.els[i]).css('z-index',len-i+count);}
else{var z=$(curr).css('z-index');$el.css('z-index',parseInt(z)+1+count);}
$el.animate({left:0,top:0},opts.speedOut,opts.easeOut,function(){$(fwd?this:curr).hide();if(cb)cb();});});};opts.cssBefore={display:'block',opacity:1,top:0,left:0};};$.fn.cycle.transitions.turnUp=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=next.cycleH;opts.animIn.height=next.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0,height:0};opts.animIn={top:0};opts.animOut={height:0};};$.fn.cycle.transitions.turnDown=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssFirst={top:0};opts.cssBefore={left:0,top:0,height:0};opts.animOut={height:0};};$.fn.cycle.transitions.turnLeft=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=next.cycleW;opts.animIn.width=next.cycleW;});opts.cssBefore={top:0,width:0};opts.animIn={left:0};opts.animOut={width:0};};$.fn.cycle.transitions.turnRight=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore={top:0,left:0,width:0};opts.animIn={left:0};opts.animOut={width:0};};$.fn.cycle.transitions.zoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false,true);opts.cssBefore.top=next.cycleH/2;opts.cssBefore.left=next.cycleW/2;opts.animIn={top:0,left:0,width:next.cycleW,height:next.cycleH};opts.animOut={width:0,height:0,top:curr.cycleH/2,left:curr.cycleW/2};});opts.cssFirst={top:0,left:0};opts.cssBefore={width:0,height:0};};$.fn.cycle.transitions.fadeZoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false);opts.cssBefore.left=next.cycleW/2;opts.cssBefore.top=next.cycleH/2;opts.animIn={top:0,left:0,width:next.cycleW,height:next.cycleH};});opts.cssBefore={width:0,height:0};opts.animOut={opacity:0};};$.fn.cycle.transitions.blindX=function($cont,$slides,opts){var w=$cont.css('overflow','hidden').width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore={left:w,top:0};opts.animIn={left:0};opts.animOut={left:w};};$.fn.cycle.transitions.blindY=function($cont,$slides,opts){var h=$cont.css('overflow','hidden').height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore={top:h,left:0};opts.animIn={top:0};opts.animOut={top:h};};$.fn.cycle.transitions.blindZ=function($cont,$slides,opts){var h=$cont.css('overflow','hidden').height();var w=$cont.width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore={top:h,left:w};opts.animIn={top:0,left:0};opts.animOut={top:h,left:w};};$.fn.cycle.transitions.growX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=this.cycleW/2;opts.animIn={left:0,width:this.cycleW};opts.animOut={left:0};});opts.cssBefore={width:0,top:0};};$.fn.cycle.transitions.growY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=this.cycleH/2;opts.animIn={top:0,height:this.cycleH};opts.animOut={top:0};});opts.cssBefore={height:0,left:0};};$.fn.cycle.transitions.curtainX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true,true);opts.cssBefore.left=next.cycleW/2;opts.animIn={left:0,width:this.cycleW};opts.animOut={left:curr.cycleW/2,width:0};});opts.cssBefore={top:0,width:0};};$.fn.cycle.transitions.curtainY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false,true);opts.cssBefore.top=next.cycleH/2;opts.animIn={top:0,height:next.cycleH};opts.animOut={top:curr.cycleH/2,height:0};});opts.cssBefore={left:0,height:0};};$.fn.cycle.transitions.cover=function($cont,$slides,opts){var d=opts.direction||'left';var w=$cont.css('overflow','hidden').width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);if(d=='right')
opts.cssBefore.left=-w;else if(d=='up')
opts.cssBefore.top=h;else if(d=='down')
opts.cssBefore.top=-h;else
opts.cssBefore.left=w;});opts.animIn={left:0,top:0};opts.animOut={opacity:1};opts.cssBefore={top:0,left:0};};$.fn.cycle.transitions.uncover=function($cont,$slides,opts){var d=opts.direction||'left';var w=$cont.css('overflow','hidden').width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(d=='right')
opts.animOut.left=w;else if(d=='up')
opts.animOut.top=-h;else if(d=='down')
opts.animOut.top=h;else
opts.animOut.left=-w;});opts.animIn={left:0,top:0};opts.animOut={opacity:1};opts.cssBefore={top:0,left:0};};$.fn.cycle.transitions.toss=function($cont,$slides,opts){var w=$cont.css('overflow','visible').width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(!opts.animOut.left&&!opts.animOut.top)
opts.animOut={left:w*2,top:-h/2,opacity:0};else
opts.animOut.opacity=0;});opts.cssBefore={left:0,top:0};opts.animIn={left:0};};$.fn.cycle.transitions.wipe=function($cont,$slides,opts){var w=$cont.css('overflow','hidden').width();var h=$cont.height();opts.cssBefore=opts.cssBefore||{};var clip;if(opts.clip){if(/l2r/.test(opts.clip))
clip='rect(0px 0px '+h+'px 0px)';else if(/r2l/.test(opts.clip))
clip='rect(0px '+w+'px '+h+'px '+w+'px)';else if(/t2b/.test(opts.clip))
clip='rect(0px '+w+'px 0px 0px)';else if(/b2t/.test(opts.clip))
clip='rect('+h+'px '+w+'px '+h+'px 0px)';else if(/zoom/.test(opts.clip)){var top=parseInt(h/2);var left=parseInt(w/2);clip='rect('+top+'px '+left+'px '+top+'px '+left+'px)';}}
opts.cssBefore.clip=opts.cssBefore.clip||clip||'rect(0px 0px 0px 0px)';var d=opts.cssBefore.clip.match(/(\d+)/g);var t=parseInt(d[0]),r=parseInt(d[1]),b=parseInt(d[2]),l=parseInt(d[3]);opts.before.push(function(curr,next,opts){if(curr==next)return;var $curr=$(curr),$next=$(next);$.fn.cycle.commonReset(curr,next,opts,true,true,false);opts.cssAfter.display='block';var step=1,count=parseInt((opts.speedIn/13))-1;(function f(){var tt=t?t-parseInt(step*(t/count)):0;var ll=l?l-parseInt(step*(l/count)):0;var bb=b<h?b+parseInt(step*((h-b)/count||1)):h;var rr=r<w?r+parseInt(step*((w-r)/count||1)):w;$next.css({clip:'rect('+tt+'px '+rr+'px '+bb+'px '+ll+'px)'});(step++<=count)?setTimeout(f,13):$curr.css('display','none');})();});opts.cssBefore={display:'block',opacity:1,top:0,left:0};opts.animIn={left:0};opts.animOut={left:0};};})(jQuery);(function($){$.fn.ghost=function(custom_default){this.each(function(){var input=$(this),default_val=custom_default||input.val();if(!(input.is("input")||input.is("textarea")))return;function cfocus(){if(input.val()==default_val){input.val("");input.css({color:"#24333E"});}}
function cblur(){if(input.val()==""){input.val(default_val);input.css({color:"#777"});}}
var val=input.val();if(!(val==""||val==default_val))return false;cblur();input.bind("focus.ghost",cfocus);input.bind("blur.ghost",cblur);});return this;};})(jQuery);(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);(function($){$.fn.editable=function(target,options){if('disable'==target){$(this).data('disabled.editable',true);return;}
if('enable'==target){$(this).data('disabled.editable',false);return;}
if('destroy'==target){$(this).unbind($(this).data('event.editable')).removeData('disabled.editable').removeData('event.editable');return;}
var settings=$.extend({},$.fn.editable.defaults,{target:target},options);var plugin=$.editable.types[settings.type].plugin||function(){};var submit=$.editable.types[settings.type].submit||function(){};var buttons=$.editable.types[settings.type].buttons||$.editable.types['defaults'].buttons;var content=$.editable.types[settings.type].content||$.editable.types['defaults'].content;var element=$.editable.types[settings.type].element||$.editable.types['defaults'].element;var reset=$.editable.types[settings.type].reset||$.editable.types['defaults'].reset;var callback=settings.callback||function(){};var onedit=settings.onedit||function(){};var onsubmit=settings.onsubmit||function(){};var onreset=settings.onreset||function(){};var onerror=settings.onerror||reset;if(settings.tooltip){$(this).attr('title',settings.tooltip);}
settings.autowidth='auto'==settings.width;settings.autoheight='auto'==settings.height;return this.each(function(){var self=this;var savedwidth=$(self).width();var savedheight=$(self).height();$(this).data('event.editable',settings.event);if(!$.trim($(this).html())){$(this).html(settings.placeholder);}
$(this).bind(settings.event,function(e){if(true===$(this).data('disabled.editable')){return;}
if(self.editing){return;}
if(false===onedit.apply(this,[settings,self])){return;}
e.preventDefault();e.stopPropagation();if(settings.tooltip){$(self).removeAttr('title');}
if(0==$(self).width()){settings.width=savedwidth;settings.height=savedheight;}else{if(settings.width!='none'){settings.width=settings.autowidth?$(self).width():settings.width;}
if(settings.height!='none'){settings.height=settings.autoheight?$(self).height():settings.height;}}
if($(this).html().toLowerCase().replace(/(;|")/g,'')==settings.placeholder.toLowerCase().replace(/(;|")/g,'')){$(this).html('');}
self.editing=true;self.revert=$(self).html();$(self).html('');var form=$('<form />');if(settings.cssclass){if('inherit'==settings.cssclass){form.attr('class',$(self).attr('class'));}else{form.attr('class',settings.cssclass);}}
if(settings.style){if('inherit'==settings.style){form.attr('style',$(self).attr('style'));form.css('display',$(self).css('display'));}else{form.attr('style',settings.style);}}
var input=element.apply(form,[settings,self]);var input_content;if(settings.loadurl){var t=setTimeout(function(){input.disabled=true;content.apply(form,[settings.loadtext,settings,self]);},100);var loaddata={};loaddata[settings.id]=self.id;if($.isFunction(settings.loaddata)){$.extend(loaddata,settings.loaddata.apply(self,[self.revert,settings]));}else{$.extend(loaddata,settings.loaddata);}
$.ajax({type:settings.loadtype,url:settings.loadurl,data:loaddata,async:false,success:function(result){window.clearTimeout(t);input_content=result;input.disabled=false;}});}else if(settings.data){input_content=settings.data;if($.isFunction(settings.data)){input_content=settings.data.apply(self,[self.revert,settings]);}}else{input_content=self.revert;}
content.apply(form,[input_content,settings,self]);input.attr('name',settings.name);buttons.apply(form,[settings,self]);$(self).append(form);plugin.apply(form,[settings,self]);$(':input:visible:enabled:first',form).focus();if(settings.select){input.select();}
input.keydown(function(e){if(e.keyCode==27){e.preventDefault();reset.apply(form,[settings,self]);}});var t;if('cancel'==settings.onblur){input.blur(function(e){t=setTimeout(function(){reset.apply(form,[settings,self]);},500);});}else if('submit'==settings.onblur){input.blur(function(e){t=setTimeout(function(){form.submit();},200);});}else if($.isFunction(settings.onblur)){input.blur(function(e){settings.onblur.apply(self,[input.val(),settings]);});}else{input.blur(function(e){});}
form.submit(function(e){if(t){clearTimeout(t);}
e.preventDefault();if(false!==onsubmit.apply(form,[settings,self])){if(false!==submit.apply(form,[settings,self])){if($.isFunction(settings.target)){var str=settings.target.apply(self,[input.val(),settings]);$(self).html(str);self.editing=false;callback.apply(self,[self.innerHTML,settings]);if(!$.trim($(self).html())){$(self).html(settings.placeholder);}}else{var submitdata={};submitdata[settings.name]=input.val();submitdata[settings.id]=self.id;if($.isFunction(settings.submitdata)){settings['_submitdata']=submitdata;settings['_that']=self;$.extend(submitdata,settings.submitdata.apply(self,[self.revert,settings]));}else{$.extend(submitdata,settings.submitdata);}
if('PUT'==settings.method){submitdata['_method']='put';}
$(self).html(settings.indicator);var ajaxoptions={type:'POST',data:submitdata,dataType:'html',url:settings.target,success:function(result,status){if(ajaxoptions.dataType=='html'){$(self).html(result);}
self.editing=false;callback.apply(self,[result,settings]);if(!$.trim($(self).html())){$(self).html(settings.placeholder);}},error:function(xhr,status,error){onerror.apply(form,[settings,self,xhr]);}};$.extend(ajaxoptions,settings.ajaxoptions);$.ajax(ajaxoptions);}}}
$(self).attr('title',settings.tooltip);return false;});});this.reset=function(form){if(this.editing){if(false!==onreset.apply(form,[settings,self])){$(self).html(self.revert);self.editing=false;if(!$.trim($(self).html())){$(self).html(settings.placeholder);}
if(settings.tooltip){$(self).attr('title',settings.tooltip);}}}};});};$.editable={types:{defaults:{element:function(settings,original){var input=$('<input type="hidden"></input>');$(this).append(input);return(input);},content:function(string,settings,original){$(':input:first',this).val(string);},reset:function(settings,original){original.reset(this);},buttons:function(settings,original){var form=this;if(settings.submit){if(settings.submit.match(/>$/)){var submit=$(settings.submit).click(function(){if(submit.attr("type")!="submit"){form.submit();}});}else{var submit=$('<button type="submit" />');submit.html(settings.submit);}
$(this).append(submit);}
if(settings.cancel){if(settings.cancel.match(/>$/)){var cancel=$(settings.cancel);}else{var cancel=$('<button type="cancel" />');cancel.html(settings.cancel);}
$(this).append(cancel);$(cancel).click(function(event){if($.isFunction($.editable.types[settings.type].reset)){var reset=$.editable.types[settings.type].reset;}else{var reset=$.editable.types['defaults'].reset;}
reset.apply(form,[settings,original]);return false;});}}},text:{element:function(settings,original){var input=$('<input />');if(settings.width!='none'){input.width(settings.width);}
if(settings.height!='none'){input.height(settings.height);}
input.attr('autocomplete','off');$(this).append(input);return(input);}},textarea:{element:function(settings,original){var textarea=$('<textarea />');if(settings.rows){textarea.attr('rows',settings.rows);}else if(settings.height!="none"){textarea.height(settings.height);}
if(settings.cols){textarea.attr('cols',settings.cols);}else if(settings.width!="none"){textarea.width(settings.width);}
$(this).append(textarea);return(textarea);}},select:{element:function(settings,original){var select=$('<select />');$(this).append(select);return(select);},content:function(data,settings,original){if(String==data.constructor){eval('var json = '+data);}else{var json=data;}
for(var key in json){if(!json.hasOwnProperty(key)){continue;}
if('selected'==key){continue;}
var option=$('<option />').val(key).append(json[key]);$('select',this).append(option);}
$('select',this).children().each(function(){if($(this).val()==json['selected']||$(this).text()==$.trim(original.revert)){$(this).attr('selected','selected');}});}}},addInputType:function(name,input){$.editable.types[name]=input;}};$.fn.editable.defaults={name:'value',id:'id',type:'text',width:'auto',height:'auto',event:'click.editable',onblur:'cancel',loadtype:'GET',loadtext:'Loading...',placeholder:'Click to edit',loaddata:{},submitdata:{},ajaxoptions:{}};})(jQuery);(function($,e,b){var c="hashchange",h=document,f,g=$.event.special,i=h.documentMode,d="on"+c in e&&(i===b||i>7);function a(j){j=j||location.href;return"#"+j.replace(/^[^#]*#?(.*)$/,"$1")}$.fn[c]=function(j){return j?this.bind(c,j):this.trigger(c)};$.fn[c].delay=50;g[c]=$.extend(g[c],{setup:function(){if(d){return false}$(f.start)},teardown:function(){if(d){return false}$(f.stop)}});f=(function(){var j={},p,m=a(),k=function(q){return q},l=k,o=k;j.start=function(){p||n()};j.stop=function(){p&&clearTimeout(p);p=b};function n(){var r=a(),q=o(m);if(r!==m){l(m=r,q);$(e).trigger(c)}else{if(q!==m){location.href=location.href.replace(/#.*/,"")+q}}p=setTimeout(n,$.fn[c].delay)}$.browser.msie&&!d&&(function(){var q,r;j.start=function(){if(!q){r=$.fn[c].src;r=r&&r+a();q=$('<iframe tabindex="-1" title="empty"/>').hide().one("load",function(){r||l(a());n()}).attr("src",r||"javascript:0").insertAfter("body")[0].contentWindow;h.onpropertychange=function(){try{if(event.propertyName==="title"){q.document.title=h.title}}catch(s){}}}};j.stop=k;o=function(){return a(q.location.href)};l=function(v,s){var u=q.document,t=$.fn[c].domain;if(v!==s){u.title=h.title;u.open();t&&u.write('<script>document.domain="'+t+'"<\/script>');u.close();q.location.hash=v}}})();return j})()})(jQuery,this);(function(){var swfobject=function(){var UNDEF="undefined",OBJECT="object",SHOCKWAVE_FLASH="Shockwave Flash",SHOCKWAVE_FLASH_AX="ShockwaveFlash.ShockwaveFlash",FLASH_MIME_TYPE="application/x-shockwave-flash",EXPRESS_INSTALL_ID="SWFObjectExprInst",ON_READY_STATE_CHANGE="onreadystatechange",win=window,doc=document,nav=navigator,plugin=false,domLoadFnArr=[main],regObjArr=[],objIdArr=[],listenersArr=[],storedAltContent,storedAltContentId,storedCallbackFn,storedCallbackObj,isDomLoaded=false,isExpressInstallActive=false,dynamicStylesheet,dynamicStylesheetMedia,autoHideShow=true,ua=function(){var w3cdom=typeof doc.getElementById!=UNDEF&&typeof doc.getElementsByTagName!=UNDEF&&typeof doc.createElement!=UNDEF,u=nav.userAgent.toLowerCase(),p=nav.platform.toLowerCase(),windows=p?/win/.test(p):/win/.test(u),mac=p?/mac/.test(p):/mac/.test(u),webkit=/webkit/.test(u)?parseFloat(u.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,ie=!+"\v1",playerVersion=[0,0,0],d=null;if(typeof nav.plugins!=UNDEF&&typeof nav.plugins[SHOCKWAVE_FLASH]==OBJECT){d=nav.plugins[SHOCKWAVE_FLASH].description;if(d&&!(typeof nav.mimeTypes!=UNDEF&&nav.mimeTypes[FLASH_MIME_TYPE]&&!nav.mimeTypes[FLASH_MIME_TYPE].enabledPlugin)){plugin=true;ie=false;d=d.replace(/^.*\s+(\S+\s+\S+$)/,"$1");playerVersion[0]=parseInt(d.replace(/^(.*)\..*$/,"$1"),10);playerVersion[1]=parseInt(d.replace(/^.*\.(.*)\s.*$/,"$1"),10);playerVersion[2]=/[a-zA-Z]/.test(d)?parseInt(d.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0;}}
else if(typeof win.ActiveXObject!=UNDEF){try{var a=new ActiveXObject(SHOCKWAVE_FLASH_AX);if(a){d=a.GetVariable("$version");if(d){ie=true;d=d.split(" ")[1].split(",");playerVersion=[parseInt(d[0],10),parseInt(d[1],10),parseInt(d[2],10)];}}}
catch(e){}}
return{w3:w3cdom,pv:playerVersion,wk:webkit,ie:ie,win:windows,mac:mac};}(),onDomLoad=function(){if(!ua.w3){return;}
if((typeof doc.readyState!=UNDEF&&doc.readyState=="complete")||(typeof doc.readyState==UNDEF&&(doc.getElementsByTagName("body")[0]||doc.body))){callDomLoadFunctions();}
if(!isDomLoaded){if(typeof doc.addEventListener!=UNDEF){doc.addEventListener("DOMContentLoaded",callDomLoadFunctions,false);}
if(ua.ie&&ua.win){doc.attachEvent(ON_READY_STATE_CHANGE,function(){if(doc.readyState=="complete"){doc.detachEvent(ON_READY_STATE_CHANGE,arguments.callee);callDomLoadFunctions();}});if(win==top){(function(){if(isDomLoaded){return;}
try{doc.documentElement.doScroll("left");}
catch(e){setTimeout(arguments.callee,0);return;}
callDomLoadFunctions();})();}}
if(ua.wk){(function(){if(isDomLoaded){return;}
if(!/loaded|complete/.test(doc.readyState)){setTimeout(arguments.callee,0);return;}
callDomLoadFunctions();})();}
addLoadEvent(callDomLoadFunctions);}}();function callDomLoadFunctions(){if(isDomLoaded){return;}
try{var t=doc.getElementsByTagName("body")[0].appendChild(createElement("span"));t.parentNode.removeChild(t);}
catch(e){return;}
isDomLoaded=true;var dl=domLoadFnArr.length;for(var i=0;i<dl;i++){domLoadFnArr[i]();}}
function addDomLoadEvent(fn){if(isDomLoaded){fn();}
else{domLoadFnArr[domLoadFnArr.length]=fn;}}
function addLoadEvent(fn){if(typeof win.addEventListener!=UNDEF){win.addEventListener("load",fn,false);}
else if(typeof doc.addEventListener!=UNDEF){doc.addEventListener("load",fn,false);}
else if(typeof win.attachEvent!=UNDEF){addListener(win,"onload",fn);}
else if(typeof win.onload=="function"){var fnOld=win.onload;win.onload=function(){fnOld();fn();};}
else{win.onload=fn;}}
function main(){if(plugin){testPlayerVersion();}
else{matchVersions();}}
function testPlayerVersion(){var b=doc.getElementsByTagName("body")[0];var o=createElement(OBJECT);o.setAttribute("type",FLASH_MIME_TYPE);var t=b.appendChild(o);if(t){var counter=0;(function(){if(typeof t.GetVariable!=UNDEF){var d=t.GetVariable("$version");if(d){d=d.split(" ")[1].split(",");ua.pv=[parseInt(d[0],10),parseInt(d[1],10),parseInt(d[2],10)];}}
else if(counter<10){counter++;setTimeout(arguments.callee,10);return;}
b.removeChild(o);t=null;matchVersions();})();}
else{matchVersions();}}
function matchVersions(){var rl=regObjArr.length;if(rl>0){for(var i=0;i<rl;i++){var id=regObjArr[i].id;var cb=regObjArr[i].callbackFn;var cbObj={success:false,id:id};if(ua.pv[0]>0){var obj=getElementById(id);if(obj){if(hasPlayerVersion(regObjArr[i].swfVersion)&&!(ua.wk&&ua.wk<312)){setVisibility(id,true);if(cb){cbObj.success=true;cbObj.ref=getObjectById(id);cb(cbObj);}}
else if(regObjArr[i].expressInstall&&canExpressInstall()){var att={};att.data=regObjArr[i].expressInstall;att.width=obj.getAttribute("width")||"0";att.height=obj.getAttribute("height")||"0";if(obj.getAttribute("class")){att.styleclass=obj.getAttribute("class");}
if(obj.getAttribute("align")){att.align=obj.getAttribute("align");}
var par={};var p=obj.getElementsByTagName("param");var pl=p.length;for(var j=0;j<pl;j++){if(p[j].getAttribute("name").toLowerCase()!="movie"){par[p[j].getAttribute("name")]=p[j].getAttribute("value");}}
showExpressInstall(att,par,id,cb);}
else{displayAltContent(obj);if(cb){cb(cbObj);}}}}
else{setVisibility(id,true);if(cb){var o=getObjectById(id);if(o&&typeof o.SetVariable!=UNDEF){cbObj.success=true;cbObj.ref=o;}
cb(cbObj);}}}}}
function getObjectById(objectIdStr){var r=null;var o=getElementById(objectIdStr);if(o&&o.nodeName=="OBJECT"){if(typeof o.SetVariable!=UNDEF){r=o;}
else{var n=o.getElementsByTagName(OBJECT)[0];if(n){r=n;}}}
return r;}
function canExpressInstall(){return!isExpressInstallActive&&hasPlayerVersion("6.0.65")&&(ua.win||ua.mac)&&!(ua.wk&&ua.wk<312);}
function showExpressInstall(att,par,replaceElemIdStr,callbackFn){isExpressInstallActive=true;storedCallbackFn=callbackFn||null;storedCallbackObj={success:false,id:replaceElemIdStr};var obj=getElementById(replaceElemIdStr);if(obj){if(obj.nodeName=="OBJECT"){storedAltContent=abstractAltContent(obj);storedAltContentId=null;}
else{storedAltContent=obj;storedAltContentId=replaceElemIdStr;}
att.id=EXPRESS_INSTALL_ID;if(typeof att.width==UNDEF||(!/%$/.test(att.width)&&parseInt(att.width,10)<310)){att.width="310";}
if(typeof att.height==UNDEF||(!/%$/.test(att.height)&&parseInt(att.height,10)<137)){att.height="137";}
doc.title=doc.title.slice(0,47)+" - Flash Player Installation";var pt=ua.ie&&ua.win?"ActiveX":"PlugIn",fv="MMredirectURL="+win.location.toString().replace(/&/g,"%26")+"&MMplayerType="+pt+"&MMdoctitle="+doc.title;if(typeof par.flashvars!=UNDEF){par.flashvars+="&"+fv;}
else{par.flashvars=fv;}
if(ua.ie&&ua.win&&obj.readyState!=4){var newObj=createElement("div");replaceElemIdStr+="SWFObjectNew";newObj.setAttribute("id",replaceElemIdStr);obj.parentNode.insertBefore(newObj,obj);obj.style.display="none";(function(){if(obj.readyState==4){obj.parentNode.removeChild(obj);}
else{setTimeout(arguments.callee,10);}})();}
createSWF(att,par,replaceElemIdStr);}}
function displayAltContent(obj){if(ua.ie&&ua.win&&obj.readyState!=4){var el=createElement("div");obj.parentNode.insertBefore(el,obj);el.parentNode.replaceChild(abstractAltContent(obj),el);obj.style.display="none";(function(){if(obj.readyState==4){obj.parentNode.removeChild(obj);}
else{setTimeout(arguments.callee,10);}})();}
else{obj.parentNode.replaceChild(abstractAltContent(obj),obj);}}
function abstractAltContent(obj){var ac=createElement("div");if(ua.win&&ua.ie){ac.innerHTML=obj.innerHTML;}
else{var nestedObj=obj.getElementsByTagName(OBJECT)[0];if(nestedObj){var c=nestedObj.childNodes;if(c){var cl=c.length;for(var i=0;i<cl;i++){if(!(c[i].nodeType==1&&c[i].nodeName=="PARAM")&&(c[i].nodeType!==8)){ac.appendChild(c[i].cloneNode(true));}}}}}
return ac;}
function createSWF(attObj,parObj,id){var r,el=getElementById(id);if(ua.wk&&ua.wk<312){return r;}
if(el){if(typeof attObj.id==UNDEF){attObj.id=id;}
if(ua.ie&&ua.win){var att="";for(var i in attObj){if(attObj[i]!=Object.prototype[i]){if(i.toLowerCase()=="data"){parObj.movie=attObj[i];}
else if(i.toLowerCase()=="styleclass"){att+=' class="'+attObj[i]+'"';}
else if(i.toLowerCase()!="classid"){att+=' '+i+'="'+attObj[i]+'"';}}}
var par="";for(var j in parObj){if(parObj[j]!=Object.prototype[j]){par+='<param name="'+j+'" value="'+parObj[j]+'" />';}}
el.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+att+'>'+par+'</object>';objIdArr[objIdArr.length]=attObj.id;r=getElementById(attObj.id);}
else{var o=createElement(OBJECT);o.setAttribute("type",FLASH_MIME_TYPE);for(var m in attObj){if(attObj[m]!=Object.prototype[m]){if(m.toLowerCase()=="styleclass"){o.setAttribute("class",attObj[m]);}
else if(m.toLowerCase()!="classid"){o.setAttribute(m,attObj[m]);}}}
for(var n in parObj){if(parObj[n]!=Object.prototype[n]&&n.toLowerCase()!="movie"){createObjParam(o,n,parObj[n]);}}
el.parentNode.replaceChild(o,el);r=o;}}
return r;}
function createObjParam(el,pName,pValue){var p=createElement("param");p.setAttribute("name",pName);p.setAttribute("value",pValue);el.appendChild(p);}
function removeSWF(id){var obj=getElementById(id);if(obj&&obj.nodeName=="OBJECT"){if(ua.ie&&ua.win){obj.style.display="none";(function(){if(obj.readyState==4){removeObjectInIE(id);}
else{setTimeout(arguments.callee,10);}})();}
else{obj.parentNode.removeChild(obj);}}}
function removeObjectInIE(id){var obj=getElementById(id);if(obj){for(var i in obj){if(typeof obj[i]=="function"){obj[i]=null;}}
obj.parentNode.removeChild(obj);}}
function getElementById(id){var el=null;try{el=doc.getElementById(id);}
catch(e){}
return el;}
function createElement(el){return doc.createElement(el);}
function addListener(target,eventType,fn){target.attachEvent(eventType,fn);listenersArr[listenersArr.length]=[target,eventType,fn];}
function hasPlayerVersion(rv){var pv=ua.pv,v=rv.split(".");v[0]=parseInt(v[0],10);v[1]=parseInt(v[1],10)||0;v[2]=parseInt(v[2],10)||0;return(pv[0]>v[0]||(pv[0]==v[0]&&pv[1]>v[1])||(pv[0]==v[0]&&pv[1]==v[1]&&pv[2]>=v[2]))?true:false;}
function createCSS(sel,decl,media,newStyle){if(ua.ie&&ua.mac){return;}
var h=doc.getElementsByTagName("head")[0];if(!h){return;}
var m=(media&&typeof media=="string")?media:"screen";if(newStyle){dynamicStylesheet=null;dynamicStylesheetMedia=null;}
if(!dynamicStylesheet||dynamicStylesheetMedia!=m){var s=createElement("style");s.setAttribute("type","text/css");s.setAttribute("media",m);dynamicStylesheet=h.appendChild(s);if(ua.ie&&ua.win&&typeof doc.styleSheets!=UNDEF&&doc.styleSheets.length>0){dynamicStylesheet=doc.styleSheets[doc.styleSheets.length-1];}
dynamicStylesheetMedia=m;}
if(ua.ie&&ua.win){if(dynamicStylesheet&&typeof dynamicStylesheet.addRule==OBJECT){dynamicStylesheet.addRule(sel,decl);}}
else{if(dynamicStylesheet&&typeof doc.createTextNode!=UNDEF){dynamicStylesheet.appendChild(doc.createTextNode(sel+" {"+decl+"}"));}}}
function setVisibility(id,isVisible){if(!autoHideShow){return;}
var v=isVisible?"visible":"hidden";if(isDomLoaded&&getElementById(id)){getElementById(id).style.visibility=v;}
else{createCSS("#"+id,"visibility:"+v);}}
function urlEncodeIfNecessary(s){var regex=/[\\\"<>\.;]/;var hasBadChars=regex.exec(s)!==null;return hasBadChars&&typeof encodeURIComponent!=UNDEF?encodeURIComponent(s):s;}
var cleanup=function(){if(ua.ie&&ua.win){window.attachEvent("onunload",function(){var ll=listenersArr.length;for(var i=0;i<ll;i++){listenersArr[i][0].detachEvent(listenersArr[i][1],listenersArr[i][2]);}
var il=objIdArr.length;for(var j=0;j<il;j++){removeSWF(objIdArr[j]);}
for(var k in ua){ua[k]=null;}
ua=null;for(var l in swfobject){swfobject[l]=null;}
swfobject=null;});}}();return{registerObject:function(objectIdStr,swfVersionStr,xiSwfUrlStr,callbackFn){if(ua.w3&&objectIdStr&&swfVersionStr){var regObj={};regObj.id=objectIdStr;regObj.swfVersion=swfVersionStr;regObj.expressInstall=xiSwfUrlStr;regObj.callbackFn=callbackFn;regObjArr[regObjArr.length]=regObj;setVisibility(objectIdStr,false);}
else if(callbackFn){callbackFn({success:false,id:objectIdStr});}},getObjectById:function(objectIdStr){if(ua.w3){return getObjectById(objectIdStr);}},embedSWF:function(swfUrlStr,replaceElemIdStr,widthStr,heightStr,swfVersionStr,xiSwfUrlStr,flashvarsObj,parObj,attObj,callbackFn){var callbackObj={success:false,id:replaceElemIdStr};if(ua.w3&&!(ua.wk&&ua.wk<312)&&swfUrlStr&&replaceElemIdStr&&widthStr&&heightStr&&swfVersionStr){setVisibility(replaceElemIdStr,false);addDomLoadEvent(function(){widthStr+="";heightStr+="";var att={};if(attObj&&typeof attObj===OBJECT){for(var i in attObj){att[i]=attObj[i];}}
att.data=swfUrlStr;att.width=widthStr;att.height=heightStr;var par={};if(parObj&&typeof parObj===OBJECT){for(var j in parObj){par[j]=parObj[j];}}
if(flashvarsObj&&typeof flashvarsObj===OBJECT){for(var k in flashvarsObj){if(typeof par.flashvars!=UNDEF){par.flashvars+="&"+k+"="+flashvarsObj[k];}
else{par.flashvars=k+"="+flashvarsObj[k];}}}
if(hasPlayerVersion(swfVersionStr)){var obj=createSWF(att,par,replaceElemIdStr);if(att.id==replaceElemIdStr){setVisibility(replaceElemIdStr,true);}
callbackObj.success=true;callbackObj.ref=obj;}
else if(xiSwfUrlStr&&canExpressInstall()){att.data=xiSwfUrlStr;showExpressInstall(att,par,replaceElemIdStr,callbackFn);return;}
else{setVisibility(replaceElemIdStr,true);}
if(callbackFn){callbackFn(callbackObj);}});}
else if(callbackFn){callbackFn(callbackObj);}},switchOffAutoHideShow:function(){autoHideShow=false;},ua:ua,getFlashPlayerVersion:function(){return{major:ua.pv[0],minor:ua.pv[1],release:ua.pv[2]};},hasFlashPlayerVersion:hasPlayerVersion,createSWF:function(attObj,parObj,replaceElemIdStr){if(ua.w3){return createSWF(attObj,parObj,replaceElemIdStr);}
else{return undefined;}},showExpressInstall:function(att,par,replaceElemIdStr,callbackFn){if(ua.w3&&canExpressInstall()){showExpressInstall(att,par,replaceElemIdStr,callbackFn);}},removeSWF:function(objElemIdStr){if(ua.w3){removeSWF(objElemIdStr);}},createCSS:function(selStr,declStr,mediaStr,newStyleBoolean){if(ua.w3){createCSS(selStr,declStr,mediaStr,newStyleBoolean);}},addDomLoadEvent:addDomLoadEvent,addLoadEvent:addLoadEvent,getQueryParamValue:function(param){var q=doc.location.search||doc.location.hash;if(q){if(/\?/.test(q)){q=q.split("?")[1];}
if(param===null){return urlEncodeIfNecessary(q);}
var pairs=q.split("&");for(var i=0;i<pairs.length;i++){if(pairs[i].substring(0,pairs[i].indexOf("="))==param){return urlEncodeIfNecessary(pairs[i].substring((pairs[i].indexOf("=")+1)));}}}
return"";},expressInstallCallback:function(){if(isExpressInstallActive){var obj=getElementById(EXPRESS_INSTALL_ID);if(obj&&storedAltContent){obj.parentNode.replaceChild(storedAltContent,obj);if(storedAltContentId){setVisibility(storedAltContentId,true);if(ua.ie&&ua.win){storedAltContent.style.display="block";}}
if(storedCallbackFn){storedCallbackFn(storedCallbackObj);}}
isExpressInstallActive=false;}}};}();(function($){$.fn.rdio=function jQuery_fn_rdio(playbackToken){var container=$(this);var rdio=container.data('rdio');if(rdio!==undefined){return rdio;}
var id='rdio_swf_'+Math.floor(Math.random()*10000);$('<div></div>').attr('id',id).prependTo(container);var listener_name=id+'_cb';var listener={};listener.ready=function(userInfo){container.trigger('ready.rdio',[userInfo]);};listener.playStateChanged=function(playState){container.trigger('playStateChanged.rdio',[playState]);};listener.playingTrackChanged=function(playingTrack,sourcePosition){container.trigger('playingTrackChanged.rdio',[playingTrack,sourcePosition]);};listener.playingSourceChanged=function(playingSource){container.trigger('playingSourceChanged.rdio',[playingSource]);};listener.volumeChanged=function(volume){container.trigger('volumeChanged.rdio',[volume]);};listener.muteChanged=function(mute){container.trigger('muteChanged.rdio',[mute]);};listener.positionChanged=function(position){container.trigger('positionChanged.rdio',[position]);};listener.queueChanged=function(newQueue){container.trigger('queueChanged.rdio',[newQueue]);};listener.shuffleChanged=function(shuffle){container.trigger('shuffleChanged.rdio',[shuffle]);};listener.repeatChanged=function(repeat){container.trigger('repeatChanged.rdio',[repeat]);};listener.updateFrequencyData=function(frequencyData){container.trigger('updateFrequencyData.rdio',[frequencyData]);};listener.playingSomewhereElse=function(){container.trigger('playingSomewhereElse.rdio');};listener.freeRemainingChanged=function(remaining){container.trigger('freeRemainingChanged.rdio',[frequencyData]);};window[listener_name]=listener;var flashvars={'playbackToken':playbackToken,'domain':document.domain,'listener':listener_name};var params={'allowScriptAccess':'always'};var attributes={};var o={'embed':null};swfobject.embedSWF('http://www.rdio.com/api/swf/',id,1,1,'9.0.0','',flashvars,params,attributes,function(status){o.embed=$('#'+id).get(0);});o.play=function(key,options){this.embed.rdio_play(key,options);};o.pause=function(){this.embed.rdio_pause();};o.stop=function(){this.embed.rdio_stop();};o.next=function(superSkip){this.embed.rdio_next(superSkip);};o.previous=function(){this.embed.rdio_previous();};o.seek=function(position){this.embed.rdio_seek(position);};o.setShuffle=function(shuffle){this.embed.rdio_setShuffle(shuffle);};o.setRepeat=function(mode){this.embed.rdio_setRepeat(mode);};o.queue=function(key,options){this.embed.queue(key,options);};o.setVolume=function(volume){this.embed.rdio_setVolume(volume);};o.setMute=function(mute){this.embed.rdio_setMute(mute);};o.playQueuedTrack=function(position,offset){this.embed.rdio_playQueuedTrack(position,offset);};o.moveQueuedSource=function(from,to){this.embed.rdio_moveQueuedSource(from,to);};o.clearQueue=function(){this.embed.rdio_clearQueue();};o.setCurrentPosition=function(sourceIndex){this.embed.rdio_setCurrentPosition(sourceIndex);};o.removeFromQueue=function(sourceIndex){this.embed.rdio_removeFromQueue(sourceIndex);};o.sendState=function(){this.embed.rdio_sendState();};o.startFrequencyAnalyzer=function(options){this.embed.rdio_startFrequencyAnalyzer(options);};o.stopFrequencyAnalyzer=function(){this.embed.rdio_stopFrequencyAnalyzer();};container.data('rdio',o);return o;};})(jQuery);})();(function(win,mqSupported){win.respond={};respond.update=function(){};respond.mediaQueriesSupported=mqSupported;if(mqSupported){return;}
var doc=win.document,docElem=doc.documentElement,mediastyles=[],rules=[],appendedEls=[],parsedSheets={},resizeThrottle=30,head=doc.getElementsByTagName("head")[0]||docElem,links=head.getElementsByTagName("link"),requestQueue=[],ripCSS=function(){var sheets=links,sl=sheets.length,i=0,sheet,href,media,isCSS;for(;i<sl;i++){sheet=sheets[i],href=sheet.href,media=sheet.media,isCSS=sheet.rel&&sheet.rel.toLowerCase()==="stylesheet";if(!!href&&isCSS&&!parsedSheets[href]){if(sheet.styleSheet&&sheet.styleSheet.rawCssText){translate(sheet.styleSheet.rawCssText,href,media);parsedSheets[href]=true;}else{if(!/^([a-zA-Z]+?:(\/\/)?)/.test(href)||href.replace(RegExp.$1,"").split("index.html")[0]===win.location.host){requestQueue.push({href:href,media:media});}}}}
makeRequests();},makeRequests=function(){if(requestQueue.length){var thisRequest=requestQueue.shift();ajax(thisRequest.href,function(styles){translate(styles,thisRequest.href,thisRequest.media);parsedSheets[thisRequest.href]=true;makeRequests();});}},translate=function(styles,href,media){var qs=styles.match(/@media[^\{]+\{([^\{\}]+\{[^\}\{]+\})+/gi),ql=qs&&qs.length||0,href=href.substring(0,href.lastIndexOf("index.html")),repUrls=function(css){return css.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+href+"$2$3");},useMedia=!ql&&media,i=0,j,fullq,thisq,eachq,eql;if(href.length){href+="/";}
if(useMedia){ql=1;}
for(;i<ql;i++){j=0;if(useMedia){fullq=media;rules.push(repUrls(styles));}
else{fullq=qs[i].match(/@media ([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1;rules.push(RegExp.$2&&repUrls(RegExp.$2));}
eachq=fullq.split(",");eql=eachq.length;for(;j<eql;j++){thisq=eachq[j];mediastyles.push({media:thisq.match(/(only\s+)?([a-zA-Z]+)(\sand)?/)&&RegExp.$2,rules:rules.length-1,minw:thisq.match(/\(min\-width:[\s]*([\s]*[0-9]+)px[\s]*\)/)&&parseFloat(RegExp.$1),maxw:thisq.match(/\(max\-width:[\s]*([\s]*[0-9]+)px[\s]*\)/)&&parseFloat(RegExp.$1)});}}
applyMedia();},lastCall,resizeDefer,applyMedia=function(fromResize){var name="clientWidth",docElemProp=docElem[name],currWidth=doc.compatMode==="CSS1Compat"&&docElemProp||doc.body[name]||docElemProp,styleBlocks={},dFrag=doc.createDocumentFragment(),lastLink=links[links.length-1],now=(new Date()).getTime();if(fromResize&&lastCall&&now-lastCall<resizeThrottle){clearTimeout(resizeDefer);resizeDefer=setTimeout(applyMedia,resizeThrottle);return;}
else{lastCall=now;}
for(var i in mediastyles){var thisstyle=mediastyles[i];if(!thisstyle.minw&&!thisstyle.maxw||(!thisstyle.minw||thisstyle.minw&&currWidth>=thisstyle.minw)&&(!thisstyle.maxw||thisstyle.maxw&&currWidth<=thisstyle.maxw)){if(!styleBlocks[thisstyle.media]){styleBlocks[thisstyle.media]=[];}
styleBlocks[thisstyle.media].push(rules[thisstyle.rules]);}}
for(var i in appendedEls){if(appendedEls[i]&&appendedEls[i].parentNode===head){head.removeChild(appendedEls[i]);}}
for(var i in styleBlocks){var ss=doc.createElement("style"),css=styleBlocks[i].join("\n");ss.type="text/css";ss.media=i;if(ss.styleSheet){ss.styleSheet.cssText=css;}
else{ss.appendChild(doc.createTextNode(css));}
dFrag.appendChild(ss);appendedEls.push(ss);}
head.insertBefore(dFrag,lastLink.nextSibling);},ajax=function(url,callback){var req=xmlHttp();if(!req){return;}
req.open("GET",url,true);req.onreadystatechange=function(){if(req.readyState!=4||req.status!=200&&req.status!=304){return;}
callback(req.responseText);}
if(req.readyState==4){return;}
req.send(null);},xmlHttp=(function(){var xmlhttpmethod=false;try{xmlhttpmethod=new XMLHttpRequest();}
catch(e){xmlhttpmethod=new ActiveXObject("Microsoft.XMLHTTP");}
return function(){return xmlhttpmethod;};})();ripCSS();respond.update=ripCSS;function callMedia(){applyMedia(true);}
if(win.addEventListener){win.addEventListener("resize",callMedia,false);}
else if(win.attachEvent){win.attachEvent("onresize",callMedia);}})(this,(function(win){if(win.matchMedia){return true;}
var bool,doc=document,docElem=doc.documentElement,refNode=docElem.firstElementChild||docElem.firstChild,fakeUsed=!doc.body,fakeBody=doc.body||doc.createElement("body"),div=doc.createElement("div"),q="only all";div.id="mq-test-1";div.style.cssText="position:absolute;top:-99em";fakeBody.appendChild(div);div.innerHTML='_<style media="'+q+'"> #mq-test-1 { width: 9px; }</style>';if(fakeUsed){docElem.insertBefore(fakeBody,refNode);}
div.removeChild(div.firstChild);bool=div.offsetWidth==9;if(fakeUsed){docElem.removeChild(fakeBody);}
else{fakeBody.removeChild(div);}
return bool;})(this));(function($){$.widget("ui.sgautocomplete",{options:{minLength:2,delay:200,source:function(request,response){},parent:$("body"),presubmit:null,select:function(item){document.location=item.attr("href");},see_all:true},_create:function(){var that=this,doc=this.element[0].ownerDocument;this.element.addClass("ui-sgautocomplete-input").attr("autocomplete","off").bind("keydown.sgautocomplete",function(e){var keyCode=$.ui.keyCode;switch(e.keyCode){case keyCode.UP:that._move("previous",e);e.preventDefault();break;case keyCode.DOWN:that._move("next",e);e.preventDefault();break;case keyCode.ENTER:if(that.menu.is(":visible")&&that.focus&&that.focus>0){e.preventDefault();}
case keyCode.TAB:if(!that.menu.is(":visible")){return;}
that.select();break;case keyCode.ESCAPE:that.close();break;case keyCode.SHIFT:case keyCode.CONTROL:case 18:break;default:clearTimeout(that.searching);that.searching=setTimeout(function(){that.search(null,e);},that.options.delay);break;}}).bind("keypress.sgautocomplete",function(e){var keyCode=$.ui.keyCode;switch(e.keyCode){case keyCode.ENTER:if(that.menu.is(":visible")&&that.focus&&that.focus>0){e.preventDefault();}
break;default:break;}}).bind("focus.sgautocomplete",function(){}).bind("blur.sgautocomplete",function(){that.close();});this.source=this.options.source;this.response=function(){return that._response.apply(that,arguments);};this.focus=null;this.menu=$("<div></div>").addClass("ui-sgautocomplete").appendTo(this.options.parent).css({left:"3px",top:(this.options.parent.height()-6)+"px"}).hide();},search:function(value,e){value=value!=null?value:this.element.val();if(value.length<this.options.minLength){return this.close(e);}
clearTimeout(this.closing);this.term=this.element.val();jQuery('.sg-loading-indicator').show();this.source({term:value},this.response);},select:function(item){if(typeof this.options.presubmit==='function'){this.options.presubmit.call(this);}
item=item||this.items.eq(this.focus);if(item.attr("href")!="#"){this.options.select.call(this,item);this.close();}},close:function(e){var that=this;clearTimeout(this.closing);this.closing=setTimeout(function(){that._blur();that.menu.hide();},300);},_coefficients:{'teamband':1.0,'event':1.0,'venue':1.0,'tournament':1.0},_apply_coefficient:function(obj,type){var o=jQuery.extend({},obj);if(o.score){o.score=o.score*this._coefficients[type];}
return o;},_response:function(response){var that=this,results=response.results,term=response.term,tophits=[],total_matches=0,k;$.each(['teamband','event','venue','tournament'],function(i,k){if(results[k]&&results[k].length){tophits.push(that._apply_coefficient(results[k][0],k));total_matches+=results[k].length;}});tophits.sort(function(a,b){if(a.score==b.score)return 0;return a.score<b.score?1:-1;});if(tophits.length){if(total_matches>1)results.tophit=[tophits[0]];this._renderMenu(results,term);}else{this.close();}
jQuery('.sg-loading-indicator').hide();},_renderMenu:function(results,term){var that=this,table=$('<table></table>').css({borderCollapse:"collapse"}).width("100%"),tbody=$('<tbody></tbody>').appendTo(table);this.menu.empty().append(table);if(this.options.see_all){this._renderSection(tbody,"",[{term:"See all results...",data:{url:"#"}}]);}
$.each(["tophit","teamband","event","venue","tournament"],function(i,section){if(results[section]&&results[section].length)
that._renderSection(tbody,section,results[section]);});this.focus=null;this.items=this.menu.find(".sgautocomplete-result");this._move("down");this.menu.show();},_renderSection:function(elem,section,items){var that=this,row=$('<tr></tr>'),list,name={tophit:"Top Result",teamband:"Performers",event:"Events",venue:"Venues",tournament:"Tournaments"}[section]||"";if(elem.is(":empty"))row.addClass("sgautocomplete-row-first");row.html(['<td class="sgautocomplete-results-icon"><div class="icon-'+section+'"></div></td>','<td class="sgautocomplete-results-wrap">','<div class="sgautocomplete-results-label">'+name+'</div>','<div class="sgautocomplete-results"></div>','</td>'].join("\n")).appendTo(elem);list=row.find(".sgautocomplete-results").eq(0);$.each(items,function(i,item){that._renderItem(list,item);});},_renderItem:function(elem,item){var that=this;$('<a class="sgautocomplete-result"></a>').html(['<span class="sgautocomplete-result-title">'+item.term+'</span>',item.data.subtitle?'<span class="sgautocomplete-result-subtitle">'+item.data.subtitle+'</span>':''].join("\n")).mouseenter(function(e){that._blur();that._focus(this);}).click(function(e){clearTimeout(that.closing);if(that.focus===0){that.element.parents("form").submit();e.preventDefault();}
that.select($(this));}).attr("href",item.data.url).attr("rel",item.id?item.id:null).appendTo(elem);},_move:function(direction,e){var new_index=null;if(direction=="previous"){if(this.focus===null||this.focus===0){new_index=null;}else{new_index=this.focus-1;}}
else if(this.focus===null){new_index=0;}
else{new_index=this.focus+1;}
this._blur();if(new_index!==null){new_index=Math.min(new_index,this.items.length-1);new_index=Math.max(new_index,0);this._focus(new_index);}},_focus:function(index){if(index.nodeType){$.each(this.items,function(i,item){if(item===index){index=i;}});}
this.focus=index;this.items.eq(index).addClass("sgautocomplete-result-focus");},_blur:function(){if(this.focus!==null){this.items.eq(this.focus).removeClass("sgautocomplete-result-focus");this.focus=null;}}});})(jQuery);(function(a){a.fn.slides=function(b){return b=a.extend({},a.fn.slides.option,b),this.each(function(){function w(g,h,i){if(!p&&o){p=!0,b.animationStart(n+1);switch(g){case"next":l=n,k=n+1,k=e===k?0:k,r=f*2,g=-f*2,n=k;break;case"prev":l=n,k=n-1,k=k===-1?e-1:k,r=0,g=0,n=k;break;case"pagination":k=parseInt(i,10),l=a("."+b.paginationClass+" li."+b.currentClass+" a",c).attr("href").match("[^#/]+$"),k>l?(r=f*2,g=-f*2):(r=0,g=0),n=k}h==="fade"?b.crossfade?d.children(":eq("+k+")",c).css({zIndex:10}).fadeIn(b.fadeSpeed,b.fadeEasing,function(){b.autoHeight?d.animate({height:d.children(":eq("+k+")",c).outerHeight()},b.autoHeightSpeed,function(){d.children(":eq("+l+")",c).css({display:"none",zIndex:0}),d.children(":eq("+k+")",c).css({zIndex:0}),b.animationComplete(k+1),p=!1}):(d.children(":eq("+l+")",c).css({display:"none",zIndex:0}),d.children(":eq("+k+")",c).css({zIndex:0}),b.animationComplete(k+1),p=!1)}):d.children(":eq("+l+")",c).fadeOut(b.fadeSpeed,b.fadeEasing,function(){b.autoHeight?d.animate({height:d.children(":eq("+k+")",c).outerHeight()},b.autoHeightSpeed,function(){d.children(":eq("+k+")",c).fadeIn(b.fadeSpeed,b.fadeEasing)}):d.children(":eq("+k+")",c).fadeIn(b.fadeSpeed,b.fadeEasing,function(){a.browser.msie&&a(this).get(0).style.removeAttribute("filter")}),b.animationComplete(k+1),p=!1}):(d.children(":eq("+k+")").css({left:r,display:"block"}),b.autoHeight?d.animate({left:g,height:d.children(":eq("+k+")").outerHeight()},b.slideSpeed,b.slideEasing,function(){d.css({left:-f}),d.children(":eq("+k+")").css({left:f,zIndex:5}),d.children(":eq("+l+")").css({left:f,display:"none",zIndex:0}),b.animationComplete(k+1),p=!1}):d.animate({left:g},b.slideSpeed,b.slideEasing,function(){d.css({left:-f}),d.children(":eq("+k+")").css({left:f,zIndex:5}),d.children(":eq("+l+")").css({left:f,display:"none",zIndex:0}),b.animationComplete(k+1),p=!1})),b.pagination&&(a("."+b.paginationClass+" li."+b.currentClass,c).removeClass(b.currentClass),a("."+b.paginationClass+" li:eq("+k+")",c).addClass(b.currentClass))}}function x(){clearInterval(c.data("interval"))}function y(){b.pause?(clearTimeout(c.data("pause")),clearInterval(c.data("interval")),u=setTimeout(function(){clearTimeout(c.data("pause")),v=setInterval(function(){w("next",i)},b.play),c.data("interval",v)},b.pause),c.data("pause",u)):x()}a("."+b.container,a(this)).children().wrapAll('<div class="slides_control"/>');var c=a(this),d=a(".slides_control",c),e=d.children().size(),f=d.children().outerWidth(),g=d.children().outerHeight(),h=b.start-1,i=b.effect.indexOf(",")<0?b.effect:b.effect.replace(" ","").split(",")[0],j=b.effect.indexOf(",")<0?i:b.effect.replace(" ","").split(",")[1],k=0,l=0,m=0,n=0,o,p,q,r,s,t,u,v;if(e<2)return a("."+b.container,a(this)).fadeIn(b.fadeSpeed,b.fadeEasing,function(){o=!0,b.slidesLoaded()}),a("."+b.next+", ."+b.prev).fadeOut(0),!1;if(e<2)return;h<0&&(h=0),h>e&&(h=e-1),b.start&&(n=h),b.randomize&&d.randomize(),a("."+b.container,c).css({overflow:"hidden",position:"relative"}),d.children().css({position:"absolute",top:0,left:d.children().outerWidth(),zIndex:0,display:"none"}),d.css({position:"relative",width:f*3,height:g,left:-f}),a("."+b.container,c).css({display:"block"}),b.autoHeight&&(d.children().css({height:"auto"}),d.animate({height:d.children(":eq("+h+")").outerHeight()},b.autoHeightSpeed));if(b.preload&&d.find("img:eq("+h+")").length){a("."+b.container,c).css({background:"url("+b.preloadImage+") no-repeat 50% 50%"});var z=d.find("img:eq("+h+")").attr("src")+"?"+(new Date).getTime();a("img",c).parent().attr("class")!="slides_control"?t=d.children(":eq(0)")[0].tagName.toLowerCase():t=d.find("img:eq("+h+")"),d.find("img:eq("+h+")").attr("src",z).load(function(){d.find(t+":eq("+h+")").fadeIn(b.fadeSpeed,b.fadeEasing,function(){a(this).css({zIndex:5}),a("."+b.container,c).css({background:""}),o=!0,b.slidesLoaded()})})}else d.children(":eq("+h+")").fadeIn(b.fadeSpeed,b.fadeEasing,function(){o=!0,b.slidesLoaded()});b.bigTarget&&(d.children().css({cursor:"pointer"}),d.children().click(function(){return w("next",i),!1})),b.hoverPause&&b.play&&(d.bind("mouseover",function(){x()}),d.bind("mouseleave",function(){y()})),b.generateNextPrev&&(a("."+b.container,c).after('<a href="#" class="'+b.prev+'">Prev</a>'),a("."+b.prev,c).after('<a href="#" class="'+b.next+'">Next</a>')),a("."+b.next,c).click(function(a){a.preventDefault(),b.play&&y(),w("next",i)}),a("."+b.prev,c).click(function(a){a.preventDefault(),b.play&&y(),w("prev",i)}),b.generatePagination?(b.prependPagination?c.prepend("<ul class="+b.paginationClass+"></ul>"):c.append("<ul class="+b.paginationClass+"></ul>"),d.children().each(function(){a("."+b.paginationClass,c).append('<li><a href="#'+m+'">&bull;</a></li>'),m++})):a("."+b.paginationClass+" li a",c).each(function(){a(this).attr("href","#"+m),m++}),a("."+b.paginationClass+" li:eq("+h+")",c).addClass(b.currentClass),a("."+b.paginationClass+" li a",c).click(function(){return b.play&&y(),q=a(this).attr("href").match("[^#/]+$"),n!=q&&w("pagination",j,q),!1}),a("a.link",c).click(function(){return b.play&&y(),q=a(this).attr("href").match("[^#/]+$")-1,n!=q&&w("pagination",j,q),!1}),b.play&&(v=setInterval(function(){w("next",i)},b.play),c.data("interval",v))})},a.fn.slides.option={preload:!1,preloadImage:"/img/loading.gif",container:"slides_container",generateNextPrev:!1,next:"next",prev:"prev",pagination:!0,generatePagination:!0,prependPagination:!1,paginationClass:"pagination",currentClass:"current",fadeSpeed:350,fadeEasing:"",slideSpeed:350,slideEasing:"",start:1,effect:"slide",crossfade:!1,randomize:!1,play:0,pause:0,hoverPause:!1,autoHeight:!1,autoHeightSpeed:350,bigTarget:!1,animationStart:function(){},animationComplete:function(){},slidesLoaded:function(){}},a.fn.randomize=function(b){function c(){return Math.round(Math.random())-.5}return a(this).each(function(){var d=a(this),e=d.children(),f=e.length;if(f>1){e.hide();var g=[];for(i=0;i<f;i++)g[g.length]=i;g=g.sort(c),a.each(g,function(a,c){var f=e.eq(c),g=f.clone(!0);g.show().appendTo(d),b!==undefined&&b(f,g),f.remove()})}})}})(jQuery);!function($){var Toggle=function(element,options){this.init(element,options);}
Toggle.prototype={constructor:Toggle,init:function(element,options){this.el=$(element);this.options=$.extend({},$.fn.sg_toggle.defaults,options,this.el.data());this.leftStart=0;this.mouseStart=0;this.left=0;this.moved=false;this.el[this.options.position](this.options.template);this.slider=this.el.find('.toggle-slider');this.options.init.call(this);if($(this.options.template).hasClass('light'))this.options.max++;this.state=this.options.state;this.set(this.state=='on'?this.options.max:this.options.min);this.el.on('mousedown',$.proxy(this.onmousedown,this));},onmousedown:function(e){if(this.el.hasClass('disabled'))return false;e.preventDefault();this.leftStart=parseInt(this.slider.css('marginLeft'),10);this.mouseStart=e.pageX;this.slider.addClass('active');$(document).on({'mousemove.sg_toggle':$.proxy(this.onmousemove,this),'mouseup.sg_toggle':$.proxy(this.onmouseup,this)});},onmousemove:function(e){e.preventDefault();this.moved=true;this.left=this.leftStart+e.pageX-this.mouseStart;if(this.left>this.options.max)this.left=this.options.max;if(this.left<this.options.min)this.left=this.options.min;this.set(this.left);},onmouseup:function(){$(document).unbind('mousemove.sg_toggle mouseup.sg_toggle');this.slider.removeClass('active');if(this.moved){this.moved=false;if(this.left>=(this.options.max+this.options.min)/2)
this.on();else
this.off();}
else this.toggle();},on:function(){if(this.options.on.call(this)===false)return this.reset();this.slide(this.options.max);this.state='on';},off:function(){if(this.options.off.call(this)===false)return this.reset();this.slide(this.options.min);this.state='off';},toggle:function(){this.state=this.state=='on'?'off':'on';return this[this.state]();},reset:function(){this.slide(this.leftStart);return false;},slide:function(pos){this.slider.stop().animate({marginLeft:(this.left=pos)+'px'},this.options.duration);},set:function(pos){this.slider.stop().css({marginLeft:pos+'px'});},enable:function(){this.el.removeClass('disabled');},disable:function(){this.el.addClass('disabled');},toggleEnable:function(){this[this.el.hasClass('disabled')?'enable':'disable']();},val:function(){return this.state;}}
$.fn.sg_toggle=function(option,arg){var val=null;var elements=this.each(function(){var $this=$(this),data=$this.data('toggle'),options=typeof option=='object'&&option;if(!data)$this.data('toggle',(data=new Toggle(this,options)));if(typeof option=='string')val=data[option](arg);});return val||elements;};$.fn.sg_toggle.Constructor=Toggle;$.fn.sg_toggle.defaults={init:function(){},on:function(){},off:function(){},state:'off',position:'prepend',duration:200,max:0,min:-32,template:['<div class="toggle">','<div class="toggle-slider">','<div class="toggle-on">ON</div>','<div class="toggle-handle"></div>','<div class="toggle-off">OFF</div>','</div>','</div>'].join('')};}(window.jQuery);!function($){$(function(){"use strict";$.support.transition=(function(){var transitionEnd=(function(){var el=document.createElement('bootstrap'),transEndEventNames={'WebkitTransition':'webkitTransitionEnd','MozTransition':'transitionend','OTransition':'oTransitionEnd','msTransition':'MSTransitionEnd','transition':'transitionend'},name
for(name in transEndEventNames){if(el.style[name]!==undefined){return transEndEventNames[name]}}}())
return transitionEnd&&{end:transitionEnd}})()})}(window.jQuery);!function($){"use strict";var Tooltip=function(element,options){this.init('tooltip',element,options)}
Tooltip.prototype={constructor:Tooltip,init:function(type,element,options){var eventIn,eventOut
this.type=type
this.$element=$(element)
this.options=this.getOptions(options)
this.enabled=true
if(this.options.trigger!='manual'){eventIn=this.options.trigger=='hover'?'mouseenter':'focus'
eventOut=this.options.trigger=='hover'?'mouseleave':'blur'
this.$element.on(eventIn,this.options.selector,$.proxy(this.enter,this))
this.$element.on(eventOut,this.options.selector,$.proxy(this.leave,this))}
this.options.selector?(this._options=$.extend({},this.options,{trigger:'manual',selector:''})):this.fixTitle()},getOptions:function(options){options=$.extend({},$.fn[this.type].defaults,options,this.$element.data())
if(options.delay&&typeof options.delay=='number'){options.delay={show:options.delay,hide:options.delay}}
return options},enter:function(e){var self=$(e.currentTarget)[this.type](this._options).data(this.type)
if(!self.options.delay||!self.options.delay.show)return self.show()
clearTimeout(this.timeout)
self.hoverState='in'
this.timeout=setTimeout(function(){if(self.hoverState=='in')self.show()},self.options.delay.show)},leave:function(e){var self=$(e.currentTarget)[this.type](this._options).data(this.type)
if(this.timeout)clearTimeout(this.timeout)
if(!self.options.delay||!self.options.delay.hide)return self.hide()
self.hoverState='out'
this.timeout=setTimeout(function(){if(self.hoverState=='out')self.hide()},self.options.delay.hide)},show:function(){var $tip,inside,pos,actualWidth,actualHeight,placement,tp
if(this.hasContent()&&this.enabled){$tip=this.tip()
this.setContent()
if(this.options.animation){$tip.addClass('fade')}
placement=typeof this.options.placement=='function'?this.options.placement.call(this,$tip[0],this.$element[0]):this.options.placement
inside=/in/.test(placement)
$tip.remove().css({top:0,left:0,display:'block'}).appendTo(inside?this.$element:document.body)
pos=this.getPosition(inside)
actualWidth=$tip[0].offsetWidth
actualHeight=$tip[0].offsetHeight
switch(inside?placement.split(' ')[1]:placement){case'bottom':tp={top:pos.top+pos.height,left:pos.left+pos.width/2-actualWidth/2}
break
case'top':tp={top:pos.top-actualHeight,left:pos.left+pos.width/2-actualWidth/2}
break
case'left':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left-actualWidth}
break
case'right':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left+pos.width}
break}
$tip.css(tp).addClass(placement).addClass('in')}},isHTML:function(text){return typeof text!='string'||(text.charAt(0)==="<"&&text.charAt(text.length-1)===">"&&text.length>=3)||/^(?:[^<]*<[\w\W]+>[^>]*$)/.exec(text)},setContent:function(){var $tip=this.tip(),title=this.getTitle()
$tip.find('.tooltip-inner')[this.isHTML(title)?'html':'text'](title)
$tip.removeClass('fade in top bottom left right')},hide:function(){var that=this,$tip=this.tip()
$tip.removeClass('in')
function removeWithAnimation(){var timeout=setTimeout(function(){$tip.off($.support.transition.end).remove()},500)
$tip.one($.support.transition.end,function(){clearTimeout(timeout)
$tip.remove()})}
$.support.transition&&this.$tip.hasClass('fade')?removeWithAnimation():$tip.remove()},fixTitle:function(){var $e=this.$element
if($e.attr('title')||typeof($e.attr('data-original-title'))!='string'){$e.attr('data-original-title',$e.attr('title')||'').removeAttr('title')}},hasContent:function(){return this.getTitle()},getPosition:function(inside){return $.extend({},(inside?{top:0,left:0}:this.$element.offset()),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight})},getTitle:function(){var title,$e=this.$element,o=this.options
title=$e.attr('data-original-title')||(typeof o.title=='function'?o.title.call($e[0]):o.title)
return title},tip:function(){return this.$tip=this.$tip||$(this.options.template)},validate:function(){if(!this.$element[0].parentNode){this.hide()
this.$element=null
this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(){this[this.tip().hasClass('in')?'hide':'show']()}}
$.fn.tooltip=function(option){return this.each(function(){var $this=$(this),data=$this.data('tooltip'),options=typeof option=='object'&&option
if(!data)$this.data('tooltip',(data=new Tooltip(this,options)))
if(typeof option=='string')data[option]()})}
$.fn.tooltip.Constructor=Tooltip
$.fn.tooltip.defaults={animation:true,placement:'top',selector:false,template:'<div class="tooltip"><div class="tooltip-arrow tooltip-arrow-1"></div><div class="tooltip-arrow tooltip-arrow-3"></div><div class="tooltip-arrow tooltip-arrow-2"></div><div class="tooltip-inner"></div></div>',trigger:'hover',title:'',delay:0}}(window.jQuery);(function($){var params={};$.url={};$.extend($.url,{init:function(){var paramsRaw=document.location.search.slice(1).split("&");for(var i=0;i<paramsRaw.length;i++){var single=paramsRaw[i].split("=");if(single[0]){params[single[0]]=decodeURIComponent(single[1]);}}},param:function(name){return params[name]||"";},paramAll:function(){return params;}});$.url.init();})(jQuery);