(function($){
    function sc_setScroll(e,t,n){
        return"transition"==n.transition&&"swing"==t&&(t="ease"),{
            anims:[],
            duration:e,
            orgDuration:e,
            easing:t,
            startTime:getTime()
            }
        }
    function sc_startScroll(e,t){
    for(var n=0,r=e.anims.length;r>n;n++){
        var i=e.anims[n];
        i&&i[0][t.transition](i[1],e.duration,e.easing,i[2])
        }
    }
    function sc_stopScroll(e,t){
    is_boolean(t)||(t=!0),is_object(e.pre)&&sc_stopScroll(e.pre,t);
    for(var n=0,r=e.anims.length;r>n;n++){
        var i=e.anims[n];
        i[0].stop(!0),t&&(i[0].css(i[1]),is_function(i[2])&&i[2]())
        }
        is_object(e.post)&&sc_stopScroll(e.post,t)
    }
    function sc_afterScroll(e,t,n){
    switch(t&&t.remove(),n.fx){
        case"fade":case"crossfade":case"cover-fade":case"uncover-fade":
            e.css("opacity",1),e.css("filter","")
            }
        }
function sc_fireCallbacks(e,t,n,r,i){
    if(t[n]&&t[n].call(e,r),i[n].length)for(var s=0,o=i[n].length;o>s;s++)i[n][s].call(e,r);
    return[]
    }
    function sc_fireQueue(e,t,n){
    return t.length&&(e.trigger(cf_e(t[0][0],n),t[0][1]),t.shift()),t
    }
    function sc_hideHiddenItems(e){
    e.each(function(){
        var e=$(this);
        e.data("_cfs_isHidden",e.is(":hidden")).hide()
        })
    }
    function sc_showHiddenItems(e){
    e&&e.each(function(){
        var e=$(this);
        e.data("_cfs_isHidden")||e.show()
        })
    }
    function sc_clearTimers(e){
    return e.auto&&clearTimeout(e.auto),e.progress&&clearInterval(e.progress),e
    }
    function sc_mapCallbackArguments(e,t,n,r,i,s,o){
    return{
        width:o.width,
        height:o.height,
        items:{
            old:e,
            skipped:t,
            visible:n
        },
        scroll:{
            items:r,
            direction:i,
            duration:s
        }
    }
}
function sc_getDuration(e,t,n,r){
    var i=e.duration;
    return"none"==e.fx?0:("auto"==i?i=t.scroll.duration/t.scroll.items*n:10>i&&(i=r/i),1>i?0:("fade"==e.fx&&(i/=2),Math.round(i)))
    }
    function nv_showNavi(e,t,n){
    var r=is_number(e.items.minimum)?e.items.minimum:e.items.visible+1;
    if("show"==t||"hide"==t)var i=t;
    else if(r>t){
        debug(n,"Not enough items ("+t+" total, "+r+" needed): Hiding navigation.");
        var i="hide"
        }else var i="show";
    var s="show"==i?"removeClass":"addClass",o=cf_c("hidden",n);
    e.auto.button&&e.auto.button[i]()[s](o),e.prev.button&&e.prev.button[i]()[s](o),e.next.button&&e.next.button[i]()[s](o),e.pagination.container&&e.pagination.container[i]()[s](o)
    }
    function nv_enableNavi(e,t,n){
    if(!e.circular&&!e.infinite){
        var r="removeClass"==t||"addClass"==t?t:!1,i=cf_c("disabled",n);
        if(e.auto.button&&r&&e.auto.button[r](i),e.prev.button){
            var s=r||0==t?"addClass":"removeClass";
            e.prev.button[s](i)
            }
            if(e.next.button){
            var s=r||t==e.items.visible?"addClass":"removeClass";
            e.next.button[s](i)
            }
        }
}
function go_getObject(e,t){
    return is_function(t)?t=t.call(e):is_undefined(t)&&(t={}),t
    }
    function go_getItemsObject(e,t){
    return t=go_getObject(e,t),is_number(t)?t={
        visible:t
    }:"variable"==t?t={
        visible:t,
        width:t,
        height:t
    }:is_object(t)||(t={}),t
    }
    function go_getScrollObject(e,t){
    return t=go_getObject(e,t),is_number(t)?t=50>=t?{
        items:t
    }:{
        duration:t
    }:is_string(t)?t={
        easing:t
    }:is_object(t)||(t={}),t
    }
    function go_getNaviObject(e,t){
    if(t=go_getObject(e,t),is_string(t)){
        var n=cf_getKeyCode(t);
        t=-1==n?$(t):n
        }
        return t
    }
    function go_getAutoObject(e,t){
    return t=go_getNaviObject(e,t),is_jquery(t)?t={
        button:t
    }:is_boolean(t)?t={
        play:t
    }:is_number(t)&&(t={
        timeoutDuration:t
    }),t.progress&&(is_string(t.progress)||is_jquery(t.progress))&&(t.progress={
        bar:t.progress
        }),t
    }
    function go_complementAutoObject(e,t){
    return is_function(t.button)&&(t.button=t.button.call(e)),is_string(t.button)&&(t.button=$(t.button)),is_boolean(t.play)||(t.play=!0),is_number(t.delay)||(t.delay=0),is_undefined(t.pauseOnEvent)&&(t.pauseOnEvent=!0),is_boolean(t.pauseOnResize)||(t.pauseOnResize=!0),is_number(t.timeoutDuration)||(t.timeoutDuration=10>t.duration?2500:5*t.duration),t.progress&&(is_function(t.progress.bar)&&(t.progress.bar=t.progress.bar.call(e)),is_string(t.progress.bar)&&(t.progress.bar=$(t.progress.bar)),t.progress.bar?(is_function(t.progress.updater)||(t.progress.updater=$.fn.carouFredSel.progressbarUpdater),is_number(t.progress.interval)||(t.progress.interval=50)):t.progress=!1),t
    }
    function go_getPrevNextObject(e,t){
    return t=go_getNaviObject(e,t),is_jquery(t)?t={
        button:t
    }:is_number(t)&&(t={
        key:t
    }),t
    }
    function go_complementPrevNextObject(e,t){
    return is_function(t.button)&&(t.button=t.button.call(e)),is_string(t.button)&&(t.button=$(t.button)),is_string(t.key)&&(t.key=cf_getKeyCode(t.key)),t
    }
    function go_getPaginationObject(e,t){
    return t=go_getNaviObject(e,t),is_jquery(t)?t={
        container:t
    }:is_boolean(t)&&(t={
        keys:t
    }),t
    }
    function go_complementPaginationObject(e,t){
    return is_function(t.container)&&(t.container=t.container.call(e)),is_string(t.container)&&(t.container=$(t.container)),is_number(t.items)||(t.items=!1),is_boolean(t.keys)||(t.keys=!1),is_function(t.anchorBuilder)||is_false(t.anchorBuilder)||(t.anchorBuilder=$.fn.carouFredSel.pageAnchorBuilder),is_number(t.deviation)||(t.deviation=0),t
    }
    function go_getSwipeObject(e,t){
    return is_function(t)&&(t=t.call(e)),is_undefined(t)&&(t={
        onTouch:!1
        }),is_true(t)?t={
        onTouch:t
    }:is_number(t)&&(t={
        items:t
    }),t
    }
    function go_complementSwipeObject(e,t){
    return is_boolean(t.onTouch)||(t.onTouch=!0),is_boolean(t.onMouse)||(t.onMouse=!1),is_object(t.options)||(t.options={}),is_boolean(t.options.triggerOnTouchEnd)||(t.options.triggerOnTouchEnd=!1),t
    }
    function go_getMousewheelObject(e,t){
    return is_function(t)&&(t=t.call(e)),is_true(t)?t={}:is_number(t)?t={
        items:t
    }:is_undefined(t)&&(t=!1),t
    }
    function go_complementMousewheelObject(e,t){
    return t
    }
    function gn_getItemIndex(e,t,n,r,i){
    if(is_string(e)&&(e=$(e,i)),is_object(e)&&(e=$(e,i)),is_jquery(e)?(e=i.children().index(e),is_boolean(n)||(n=!1)):is_boolean(n)||(n=!0),is_number(e)||(e=0),is_number(t)||(t=0),n&&(e+=r.first),e+=t,r.total>0){
        for(;e>=r.total;)e-=r.total;
        for(;0>e;)e+=r.total
            }
            return e
    }
    function gn_getVisibleItemsPrev(e,t,n){
    for(var r=0,i=0,s=n;s>=0;s--){
        var o=e.eq(s);
        if(r+=o.is(":visible")?o[t.d.outerWidth](!0):0,r>t.maxDimension)return i;
        0==s&&(s=e.length),i++
    }
    }
    function gn_getVisibleItemsPrevFilter(e,t,n){
    return gn_getItemsPrevFilter(e,t.items.filter,t.items.visibleConf.org,n)
    }
    function gn_getScrollItemsPrevFilter(e,t,n,r){
    return gn_getItemsPrevFilter(e,t.items.filter,r,n)
    }
    function gn_getItemsPrevFilter(e,t,n,r){
    for(var i=0,s=0,o=r,u=e.length;o>=0;o--){
        if(s++,s==u)return s;
        var a=e.eq(o);
        if(a.is(t)&&(i++,i==n))return s;
        0==o&&(o=u)
        }
    }
    function gn_getVisibleOrg(e,t){
    return t.items.visibleConf.org||e.children().slice(0,t.items.visible).filter(t.items.filter).length
    }
    function gn_getVisibleItemsNext(e,t,n){
    for(var r=0,i=0,s=n,o=e.length-1;o>=s;s++){
        var u=e.eq(s);
        if(r+=u.is(":visible")?u[t.d.outerWidth](!0):0,r>t.maxDimension)return i;
        if(i++,i==o+1)return i;
        s==o&&(s=-1)
        }
    }
    function gn_getVisibleItemsNextTestCircular(e,t,n,r){
    var i=gn_getVisibleItemsNext(e,t,n);
    return t.circular||n+i>r&&(i=r-n),i
    }
    function gn_getVisibleItemsNextFilter(e,t,n){
    return gn_getItemsNextFilter(e,t.items.filter,t.items.visibleConf.org,n,t.circular)
    }
    function gn_getScrollItemsNextFilter(e,t,n,r){
    return gn_getItemsNextFilter(e,t.items.filter,r+1,n,t.circular)-1
    }
    function gn_getItemsNextFilter(e,t,n,r){
    for(var i=0,s=0,o=r,u=e.length-1;u>=o;o++){
        if(s++,s>=u)return s;
        var a=e.eq(o);
        if(a.is(t)&&(i++,i==n))return s;
        o==u&&(o=-1)
        }
    }
    function gi_getCurrentItems(e,t){
    return e.slice(0,t.items.visible)
    }
    function gi_getOldItemsPrev(e,t,n){
    return e.slice(n,t.items.visibleConf.old+n)
    }
    function gi_getNewItemsPrev(e,t){
    return e.slice(0,t.items.visible)
    }
    function gi_getOldItemsNext(e,t){
    return e.slice(0,t.items.visibleConf.old)
    }
    function gi_getNewItemsNext(e,t,n){
    return e.slice(n,t.items.visible+n)
    }
    function sz_storeMargin(e,t,n){
    t.usePadding&&(is_string(n)||(n="_cfs_origCssMargin"),e.each(function(){
        var e=$(this),r=parseInt(e.css(t.d.marginRight),10);
        is_number(r)||(r=0),e.data(n,r)
        }))
    }
    function sz_resetMargin(e,t,n){
    if(t.usePadding){
        var r=is_boolean(n)?n:!1;
        is_number(n)||(n=0),sz_storeMargin(e,t,"_cfs_tempCssMargin"),e.each(function(){
            var e=$(this);
            e.css(t.d.marginRight,r?e.data("_cfs_tempCssMargin"):n+e.data("_cfs_origCssMargin"))
            })
        }
    }
function sz_storeOrigCss(e){
    e.each(function(){
        var e=$(this);
        e.data("_cfs_origCss",e.attr("style")||"")
        })
    }
    function sz_restoreOrigCss(e){
    e.each(function(){
        var e=$(this);
        e.attr("style",e.data("_cfs_origCss")||"")
        })
    }
    function sz_setResponsiveSizes(e,t){
    var n=(e.items.visible,e.items[e.d.width]),r=e[e.d.height],i=is_percentage(r);
    t.each(function(){
        var t=$(this),s=n-ms_getPaddingBorderMargin(t,e,"Width");
        t[e.d.width](s),i&&t[e.d.height](ms_getPercentage(s,r))
        })
    }
    function sz_setSizes(e,t){
    var n=e.parent(),r=e.children(),i=gi_getCurrentItems(r,t),s=cf_mapWrapperSizes(ms_getSizes(i,t,!0),t,!1);
    if(n.css(s),t.usePadding){
        var o=t.padding,u=o[t.d[1]];
        t.align&&0>u&&(u=0);
        var a=i.last();
        a.css(t.d.marginRight,a.data("_cfs_origCssMargin")+u),e.css(t.d.top,o[t.d[0]]),e.css(t.d.left,o[t.d[3]])
        }
        return e.css(t.d.width,s[t.d.width]+2*ms_getTotalSize(r,t,"width")),e.css(t.d.height,ms_getLargestSize(r,t,"height")),s
    }
    function ms_getSizes(e,t,n){
    return[ms_getTotalSize(e,t,"width",n),ms_getLargestSize(e,t,"height",n)]
    }
    function ms_getLargestSize(e,t,n,r){
    return is_boolean(r)||(r=!1),is_number(t[t.d[n]])&&r?t[t.d[n]]:is_number(t.items[t.d[n]])?t.items[t.d[n]]:(n=n.toLowerCase().indexOf("width")>-1?"outerWidth":"outerHeight",ms_getTrueLargestSize(e,t,n))
    }
    function ms_getTrueLargestSize(e,t,n){
    for(var r=0,i=0,s=e.length;s>i;i++){
        var o=e.eq(i),u=o.is(":visible")?o[t.d[n]](!0):0;
        u>r&&(r=u)
        }
        return r
    }
    function ms_getTotalSize(e,t,n,r){
    if(is_boolean(r)||(r=!1),is_number(t[t.d[n]])&&r)return t[t.d[n]];
    if(is_number(t.items[t.d[n]]))return t.items[t.d[n]]*e.length;
    for(var i=n.toLowerCase().indexOf("width")>-1?"outerWidth":"outerHeight",s=0,o=0,u=e.length;u>o;o++){
        var a=e.eq(o);
        s+=a.is(":visible")?a[t.d[i]](!0):0
        }
        return s
    }
    function ms_getParentSize(e,t,n){
    var r=e.is(":visible");
    r&&e.hide();
    var i=e.parent()[t.d[n]]();
    return r&&e.show(),i
    }
    function ms_getMaxDimension(e,t){
    return is_number(e[e.d.width])?e[e.d.width]:t
    }
    function ms_hasVariableSizes(e,t,n){
    for(var r=!1,i=!1,s=0,o=e.length;o>s;s++){
        var u=e.eq(s),a=u.is(":visible")?u[t.d[n]](!0):0;
        r===!1?r=a:r!=a&&(i=!0),0==r&&(i=!0)
        }
        return i
    }
    function ms_getPaddingBorderMargin(e,t,n){
    return e[t.d["outer"+n]](!0)-e[t.d[n.toLowerCase()]]()
    }
    function ms_getPercentage(e,t){
    if(is_percentage(t)){
        if(t=parseInt(t.slice(0,-1),10),!is_number(t))return e;
        e*=t/100
        }
        return e
    }
    function cf_e(e,t,n,r,i){
    return is_boolean(n)||(n=!0),is_boolean(r)||(r=!0),is_boolean(i)||(i=!1),n&&(e=t.events.prefix+e),r&&(e=e+"."+t.events.namespace),r&&i&&(e+=t.serialNumber),e
    }
    function cf_c(e,t){
    return is_string(t.classnames[e])?t.classnames[e]:e
    }
    function cf_mapWrapperSizes(e,t,n){
    is_boolean(n)||(n=!0);
    var r=t.usePadding&&n?t.padding:[0,0,0,0],i={};
    
    return i[t.d.width]=e[0]+r[1]+r[3],i[t.d.height]=e[1]+r[0]+r[2],i
    }
    function cf_sortParams(e,t){
    for(var n=[],r=0,i=e.length;i>r;r++)for(var s=0,o=t.length;o>s;s++)if(t[s].indexOf(typeof e[r])>-1&&is_undefined(n[s])){
        n[s]=e[r];
        break
    }
    return n
    }
    function cf_getPadding(e){
    if(is_undefined(e))return[0,0,0,0];
    if(is_number(e))return[e,e,e,e];
    if(is_string(e)&&(e=e.split("px").join("").split("em").join("").split(" ")),!is_array(e))return[0,0,0,0];
    for(var t=0;4>t;t++)e[t]=parseInt(e[t],10);
    switch(e.length){
        case 0:
            return[0,0,0,0];
        case 1:
            return[e[0],e[0],e[0],e[0]];
        case 2:
            return[e[0],e[1],e[0],e[1]];
        case 3:
            return[e[0],e[1],e[2],e[1]];
        default:
            return[e[0],e[1],e[2],e[3]]
            }
        }
function cf_getAlignPadding(e,t){
    var n=is_number(t[t.d.width])?Math.ceil(t[t.d.width]-ms_getTotalSize(e,t,"width")):0;
    switch(t.align){
        case"left":
            return[0,n];
        case"right":
            return[n,0];
        case"center":default:
            return[Math.ceil(n/2),Math.floor(n/2)]
            }
        }
function cf_getDimensions(e){
    for(var t=[["width","innerWidth","outerWidth","height","innerHeight","outerHeight","left","top","marginRight",0,1,2,3],["height","innerHeight","outerHeight","width","innerWidth","outerWidth","top","left","marginBottom",3,2,1,0]],n=t[0].length,r="right"==e.direction||"left"==e.direction?0:1,i={},s=0;n>s;s++)i[t[0][s]]=t[r][s];
    return i
    }
    function cf_getAdjust(e,t,n,r){
    var i=e;
    if(is_function(n))i=n.call(r,i);
    else if(is_string(n)){
        var s=n.split("+"),o=n.split("-");
        if(o.length>s.length)var u=!0,a=o[0],f=o[1];else var u=!1,a=s[0],f=s[1];
        switch(a){
            case"even":
                i=1==e%2?e-1:e;
                break;
            case"odd":
                i=0==e%2?e-1:e;
                break;
            default:
                i=e
                }
                f=parseInt(f,10),is_number(f)&&(u&&(f=-f),i+=f)
        }
        return(!is_number(i)||1>i)&&(i=1),i
    }
    function cf_getItemsAdjust(e,t,n,r){
    return cf_getItemAdjustMinMax(cf_getAdjust(e,t,n,r),t.items.visibleConf)
    }
    function cf_getItemAdjustMinMax(e,t){
    return is_number(t.min)&&t.min>e&&(e=t.min),is_number(t.max)&&e>t.max&&(e=t.max),1>e&&(e=1),e
    }
    function cf_getSynchArr(e){
    is_array(e)||(e=[[e]]),is_array(e[0])||(e=[e]);
    for(var t=0,n=e.length;n>t;t++)is_string(e[t][0])&&(e[t][0]=$(e[t][0])),is_boolean(e[t][1])||(e[t][1]=!0),is_boolean(e[t][2])||(e[t][2]=!0),is_number(e[t][3])||(e[t][3]=0);
    return e
    }
    function cf_getKeyCode(e){
    return"right"==e?39:"left"==e?37:"up"==e?38:"down"==e?40:-1
    }
    function cf_setCookie(e,t,n){
    if(e){
        var r=t.triggerHandler(cf_e("currentPosition",n));
        $.fn.carouFredSel.cookie.set(e,r)
        }
    }
function cf_getCookie(e){
    var t=$.fn.carouFredSel.cookie.get(e);
    return""==t?0:t
    }
    function in_mapCss(e,t){
    for(var n={},r=0,i=t.length;i>r;r++)n[t[r]]=e.css(t[r]);
    return n
    }
    function in_complementItems(e,t,n,r){
    return is_object(e.visibleConf)||(e.visibleConf={}),is_object(e.sizesConf)||(e.sizesConf={}),0==e.start&&is_number(r)&&(e.start=r),is_object(e.visible)?(e.visibleConf.min=e.visible.min,e.visibleConf.max=e.visible.max,e.visible=!1):is_string(e.visible)?("variable"==e.visible?e.visibleConf.variable=!0:e.visibleConf.adjust=e.visible,e.visible=!1):is_function(e.visible)&&(e.visibleConf.adjust=e.visible,e.visible=!1),is_string(e.filter)||(e.filter=n.filter(":hidden").length>0?":visible":"*"),e[t.d.width]||(t.responsive?(debug(!0,"Set a "+t.d.width+" for the items!"),e[t.d.width]=ms_getTrueLargestSize(n,t,"outerWidth")):e[t.d.width]=ms_hasVariableSizes(n,t,"outerWidth")?"variable":n[t.d.outerWidth](!0)),e[t.d.height]||(e[t.d.height]=ms_hasVariableSizes(n,t,"outerHeight")?"variable":n[t.d.outerHeight](!0)),e.sizesConf.width=e.width,e.sizesConf.height=e.height,e
    }
    function in_complementVisibleItems(e,t){
    return"variable"==e.items[e.d.width]&&(e.items.visibleConf.variable=!0),e.items.visibleConf.variable||(is_number(e[e.d.width])?e.items.visible=Math.floor(e[e.d.width]/e.items[e.d.width]):(e.items.visible=Math.floor(t/e.items[e.d.width]),e[e.d.width]=e.items.visible*e.items[e.d.width],e.items.visibleConf.adjust||(e.align=!1)),("Infinity"==e.items.visible||1>e.items.visible)&&(debug(!0,'Not a valid number of visible items: Set to "variable".'),e.items.visibleConf.variable=!0)),e
    }
    function in_complementPrimarySize(e,t,n){
    return"auto"==e&&(e=ms_getTrueLargestSize(n,t,"outerWidth")),e
    }
    function in_complementSecondarySize(e,t,n){
    return"auto"==e&&(e=ms_getTrueLargestSize(n,t,"outerHeight")),e||(e=t.items[t.d.height]),e
    }
    function in_getAlignPadding(e,t){
    var n=cf_getAlignPadding(gi_getCurrentItems(t,e),e);
    return e.padding[e.d[1]]=n[1],e.padding[e.d[3]]=n[0],e
    }
    function in_getResponsiveValues(e,t){
    var n=cf_getItemAdjustMinMax(Math.ceil(e[e.d.width]/e.items[e.d.width]),e.items.visibleConf);
    n>t.length&&(n=t.length);
    var r=Math.floor(e[e.d.width]/n);
    return e.items.visible=n,e.items[e.d.width]=r,e[e.d.width]=n*r,e
    }
    function bt_pauseOnHoverConfig(e){
    if(is_string(e))var t=e.indexOf("immediate")>-1?!0:!1,n=e.indexOf("resume")>-1?!0:!1;else var t=n=!1;
    return[t,n]
    }
    function bt_mousesheelNumber(e){
    return is_number(e)?e:null
    }
    function is_null(e){
    return null===e
    }
    function is_undefined(e){
    return is_null(e)||e===void 0||""===e||"undefined"===e
    }
    function is_array(e){
    return e instanceof Array
    }
    function is_jquery(e){
    return e instanceof jQuery
    }
    function is_object(e){
    return(e instanceof Object||"object"==typeof e)&&!is_null(e)&&!is_jquery(e)&&!is_array(e)&&!is_function(e)
    }
    function is_number(e){
    return(e instanceof Number||"number"==typeof e)&&!isNaN(e)
    }
    function is_string(e){
    return(e instanceof String||"string"==typeof e)&&!is_undefined(e)&&!is_true(e)&&!is_false(e)
    }
    function is_function(e){
    return e instanceof Function||"function"==typeof e
    }
    function is_boolean(e){
    return e instanceof Boolean||"boolean"==typeof e||is_true(e)||is_false(e)
    }
    function is_true(e){
    return e===!0||"true"===e
    }
    function is_false(e){
    return e===!1||"false"===e
    }
    function is_percentage(e){
    return is_string(e)&&"%"==e.slice(-1)
    }
    function getTime(){
    return(new Date).getTime()
    }
    function deprecated(e,t){
    debug(!0,e+" is DEPRECATED, support for it will be removed. Use "+t+" instead.")
    }
    function debug(e,t){
    if(!is_undefined(window.console)&&!is_undefined(window.console.log)){
        if(is_object(e)){
            var n=" ("+e.selector+")";
            e=e.debug
            }else var n="";
        if(!e)return!1;
        t=is_string(t)?"carouFredSel"+n+": "+t:["carouFredSel"+n+":",t],window.console.log(t)
        }
        return!1
    }
    $.fn.carouFredSel||($.fn.caroufredsel=$.fn.carouFredSel=function(options,configs){
    if(0==this.length)return debug(!0,'No element found for "'+this.selector+'".'),this;
    if(this.length>1)return this.each(function(){
        $(this).carouFredSel(options,configs)
        });
    var $cfs=this,$tt0=this[0],starting_position=!1;
    $cfs.data("_cfs_isCarousel")&&(starting_position=$cfs.triggerHandler("_cfs_triggerEvent","currentPosition"),$cfs.trigger("_cfs_triggerEvent",["destroy",!0]));
    var FN={};
    
    FN._init=function(e,t,n){
        e=go_getObject($tt0,e),e.items=go_getItemsObject($tt0,e.items),e.scroll=go_getScrollObject($tt0,e.scroll),e.auto=go_getAutoObject($tt0,e.auto),e.prev=go_getPrevNextObject($tt0,e.prev),e.next=go_getPrevNextObject($tt0,e.next),e.pagination=go_getPaginationObject($tt0,e.pagination),e.swipe=go_getSwipeObject($tt0,e.swipe),e.mousewheel=go_getMousewheelObject($tt0,e.mousewheel),t&&(opts_orig=$.extend(!0,{},$.fn.carouFredSel.defaults,e)),opts=$.extend(!0,{},$.fn.carouFredSel.defaults,e),opts.d=cf_getDimensions(opts),crsl.direction="up"==opts.direction||"left"==opts.direction?"next":"prev";
        var r=$cfs.children(),i=ms_getParentSize($wrp,opts,"width");
        if(is_true(opts.cookie)&&(opts.cookie="caroufredsel_cookie_"+conf.serialNumber),opts.maxDimension=ms_getMaxDimension(opts,i),opts.items=in_complementItems(opts.items,opts,r,n),opts[opts.d.width]=in_complementPrimarySize(opts[opts.d.width],opts,r),opts[opts.d.height]=in_complementSecondarySize(opts[opts.d.height],opts,r),opts.responsive&&(is_percentage(opts[opts.d.width])||(opts[opts.d.width]="100%")),is_percentage(opts[opts.d.width])&&(crsl.upDateOnWindowResize=!0,crsl.primarySizePercentage=opts[opts.d.width],opts[opts.d.width]=ms_getPercentage(i,crsl.primarySizePercentage),opts.items.visible||(opts.items.visibleConf.variable=!0)),opts.responsive?(opts.usePadding=!1,opts.padding=[0,0,0,0],opts.align=!1,opts.items.visibleConf.variable=!1):(opts.items.visible||(opts=in_complementVisibleItems(opts,i)),opts[opts.d.width]||(!opts.items.visibleConf.variable&&is_number(opts.items[opts.d.width])&&"*"==opts.items.filter?(opts[opts.d.width]=opts.items.visible*opts.items[opts.d.width],opts.align=!1):opts[opts.d.width]="variable"),is_undefined(opts.align)&&(opts.align=is_number(opts[opts.d.width])?"center":!1),opts.items.visibleConf.variable&&(opts.items.visible=gn_getVisibleItemsNext(r,opts,0))),"*"==opts.items.filter||opts.items.visibleConf.variable||(opts.items.visibleConf.org=opts.items.visible,opts.items.visible=gn_getVisibleItemsNextFilter(r,opts,0)),opts.items.visible=cf_getItemsAdjust(opts.items.visible,opts,opts.items.visibleConf.adjust,$tt0),opts.items.visibleConf.old=opts.items.visible,opts.responsive)opts.items.visibleConf.min||(opts.items.visibleConf.min=opts.items.visible),opts.items.visibleConf.max||(opts.items.visibleConf.max=opts.items.visible),opts=in_getResponsiveValues(opts,r,i);else switch(opts.padding=cf_getPadding(opts.padding),"top"==opts.align?opts.align="left":"bottom"==opts.align&&(opts.align="right"),opts.align){
            case"center":case"left":case"right":
                "variable"!=opts[opts.d.width]&&(opts=in_getAlignPadding(opts,r),opts.usePadding=!0);
                break;
            default:
                opts.align=!1,opts.usePadding=0==opts.padding[0]&&0==opts.padding[1]&&0==opts.padding[2]&&0==opts.padding[3]?!1:!0
                }
                is_number(opts.scroll.duration)||(opts.scroll.duration=500),is_undefined(opts.scroll.items)&&(opts.scroll.items=opts.responsive||opts.items.visibleConf.variable||"*"!=opts.items.filter?"visible":opts.items.visible),opts.auto=$.extend(!0,{},opts.scroll,opts.auto),opts.prev=$.extend(!0,{},opts.scroll,opts.prev),opts.next=$.extend(!0,{},opts.scroll,opts.next),opts.pagination=$.extend(!0,{},opts.scroll,opts.pagination),opts.auto=go_complementAutoObject($tt0,opts.auto),opts.prev=go_complementPrevNextObject($tt0,opts.prev),opts.next=go_complementPrevNextObject($tt0,opts.next),opts.pagination=go_complementPaginationObject($tt0,opts.pagination),opts.swipe=go_complementSwipeObject($tt0,opts.swipe),opts.mousewheel=go_complementMousewheelObject($tt0,opts.mousewheel),opts.synchronise&&(opts.synchronise=cf_getSynchArr(opts.synchronise)),opts.auto.onPauseStart&&(opts.auto.onTimeoutStart=opts.auto.onPauseStart,deprecated("auto.onPauseStart","auto.onTimeoutStart")),opts.auto.onPausePause&&(opts.auto.onTimeoutPause=opts.auto.onPausePause,deprecated("auto.onPausePause","auto.onTimeoutPause")),opts.auto.onPauseEnd&&(opts.auto.onTimeoutEnd=opts.auto.onPauseEnd,deprecated("auto.onPauseEnd","auto.onTimeoutEnd")),opts.auto.pauseDuration&&(opts.auto.timeoutDuration=opts.auto.pauseDuration,deprecated("auto.pauseDuration","auto.timeoutDuration"))
        },FN._build=function(){
        $cfs.data("_cfs_isCarousel",!0);
        var e=$cfs.children(),t=in_mapCss($cfs,["textAlign","float","position","top","right","bottom","left","zIndex","width","height","marginTop","marginRight","marginBottom","marginLeft"]),n="relative";
        switch(t.position){
            case"absolute":case"fixed":
                n=t.position
                }
                "parent"==conf.wrapper?sz_storeOrigCss($wrp):$wrp.css(t),$wrp.css({
            overflow:"hidden",
            position:n
        }),sz_storeOrigCss($cfs),$cfs.data("_cfs_origCssZindex",t.zIndex),$cfs.css({
            textAlign:"left",
            "float":"none",
            position:"absolute",
            top:0,
            right:"auto",
            bottom:"auto",
            left:0,
            marginTop:0,
            marginRight:0,
            marginBottom:0,
            marginLeft:0
        }),sz_storeMargin(e,opts),sz_storeOrigCss(e),opts.responsive&&sz_setResponsiveSizes(opts,e)
        },FN._bind_events=function(){
        FN._unbind_events(),$cfs.bind(cf_e("stop",conf),function(e,t){
            return e.stopPropagation(),crsl.isStopped||opts.auto.button&&opts.auto.button.addClass(cf_c("stopped",conf)),crsl.isStopped=!0,opts.auto.play&&(opts.auto.play=!1,$cfs.trigger(cf_e("pause",conf),t)),!0
            }),$cfs.bind(cf_e("finish",conf),function(e){
            return e.stopPropagation(),crsl.isScrolling&&sc_stopScroll(scrl),!0
            }),$cfs.bind(cf_e("pause",conf),function(e,t,n){
            if(e.stopPropagation(),tmrs=sc_clearTimers(tmrs),t&&crsl.isScrolling){
                scrl.isStopped=!0;
                var r=getTime()-scrl.startTime;
                scrl.duration-=r,scrl.pre&&(scrl.pre.duration-=r),scrl.post&&(scrl.post.duration-=r),sc_stopScroll(scrl,!1)
                }
                if(crsl.isPaused||crsl.isScrolling||n&&(tmrs.timePassed+=getTime()-tmrs.startTime),crsl.isPaused||opts.auto.button&&opts.auto.button.addClass(cf_c("paused",conf)),crsl.isPaused=!0,opts.auto.onTimeoutPause){
                var i=opts.auto.timeoutDuration-tmrs.timePassed,s=100-Math.ceil(100*i/opts.auto.timeoutDuration);
                opts.auto.onTimeoutPause.call($tt0,s,i)
                }
                return!0
            }),$cfs.bind(cf_e("play",conf),function(e,t,n,r){
            e.stopPropagation(),tmrs=sc_clearTimers(tmrs);
            var i=[t,n,r],s=["string","number","boolean"],o=cf_sortParams(i,s);
            if(t=o[0],n=o[1],r=o[2],"prev"!=t&&"next"!=t&&(t=crsl.direction),is_number(n)||(n=0),is_boolean(r)||(r=!1),r&&(crsl.isStopped=!1,opts.auto.play=!0),!opts.auto.play)return e.stopImmediatePropagation(),debug(conf,"Carousel stopped: Not scrolling.");
            crsl.isPaused&&opts.auto.button&&(opts.auto.button.removeClass(cf_c("stopped",conf)),opts.auto.button.removeClass(cf_c("paused",conf))),crsl.isPaused=!1,tmrs.startTime=getTime();
            var u=opts.auto.timeoutDuration+n;
            return dur2=u-tmrs.timePassed,perc=100-Math.ceil(100*dur2/u),opts.auto.progress&&(tmrs.progress=setInterval(function(){
                var e=getTime()-tmrs.startTime+tmrs.timePassed,t=Math.ceil(100*e/u);
                opts.auto.progress.updater.call(opts.auto.progress.bar[0],t)
                },opts.auto.progress.interval)),tmrs.auto=setTimeout(function(){
                opts.auto.progress&&opts.auto.progress.updater.call(opts.auto.progress.bar[0],100),opts.auto.onTimeoutEnd&&opts.auto.onTimeoutEnd.call($tt0,perc,dur2),crsl.isScrolling?$cfs.trigger(cf_e("play",conf),t):$cfs.trigger(cf_e(t,conf),opts.auto)
                },dur2),opts.auto.onTimeoutStart&&opts.auto.onTimeoutStart.call($tt0,perc,dur2),!0
            }),$cfs.bind(cf_e("resume",conf),function(e){
            return e.stopPropagation(),scrl.isStopped?(scrl.isStopped=!1,crsl.isPaused=!1,crsl.isScrolling=!0,scrl.startTime=getTime(),sc_startScroll(scrl,conf)):$cfs.trigger(cf_e("play",conf)),!0
            }),$cfs.bind(cf_e("prev",conf)+" "+cf_e("next",conf),function(e,t,n,r,i){
            if(e.stopPropagation(),crsl.isStopped||$cfs.is(":hidden"))return e.stopImmediatePropagation(),debug(conf,"Carousel stopped or hidden: Not scrolling.");
            var s=is_number(opts.items.minimum)?opts.items.minimum:opts.items.visible+1;
            if(s>itms.total)return e.stopImmediatePropagation(),debug(conf,"Not enough items ("+itms.total+" total, "+s+" needed): Not scrolling.");
            var o=[t,n,r,i],u=["object","number/string","function","boolean"],a=cf_sortParams(o,u);
            t=a[0],n=a[1],r=a[2],i=a[3];
            var f=e.type.slice(conf.events.prefix.length);
            if(is_object(t)||(t={}),is_function(r)&&(t.onAfter=r),is_boolean(i)&&(t.queue=i),t=$.extend(!0,{},opts[f],t),t.conditions&&!t.conditions.call($tt0,f))return e.stopImmediatePropagation(),debug(conf,'Callback "conditions" returned false.');
            if(!is_number(n)){
                if("*"!=opts.items.filter)n="visible";else for(var l=[n,t.items,opts[f].items],a=0,c=l.length;c>a;a++)if(is_number(l[a])||"page"==l[a]||"visible"==l[a]){
                    n=l[a];
                    break
                }
                switch(n){
                    case"page":
                        return e.stopImmediatePropagation(),$cfs.triggerHandler(cf_e(f+"Page",conf),[t,r]);
                    case"visible":
                        opts.items.visibleConf.variable||"*"!=opts.items.filter||(n=opts.items.visible)
                        }
                    }
            if(scrl.isStopped)return $cfs.trigger(cf_e("resume",conf)),$cfs.trigger(cf_e("queue",conf),[f,[t,n,r]]),e.stopImmediatePropagation(),debug(conf,"Carousel resumed scrolling.");
            if(t.duration>0&&crsl.isScrolling)return t.queue&&("last"==t.queue&&(queu=[]),("first"!=t.queue||0==queu.length)&&$cfs.trigger(cf_e("queue",conf),[f,[t,n,r]])),e.stopImmediatePropagation(),debug(conf,"Carousel currently scrolling.");
            if(tmrs.timePassed=0,$cfs.trigger(cf_e("slide_"+f,conf),[t,n]),opts.synchronise)for(var h=opts.synchronise,p=[t,n],d=0,c=h.length;c>d;d++){
            var v=f;
            h[d][2]||(v="prev"==v?"next":"prev"),h[d][1]||(p[0]=h[d][0].triggerHandler("_cfs_triggerEvent",["configuration",v])),p[1]=n+h[d][3],h[d][0].trigger("_cfs_triggerEvent",["slide_"+v,p])
            }
            return!0
        }),$cfs.bind(cf_e("slide_prev",conf),function(e,t,n){
        e.stopPropagation();
        var r=$cfs.children();
        if(!opts.circular&&0==itms.first)return opts.infinite&&$cfs.trigger(cf_e("next",conf),itms.total-1),e.stopImmediatePropagation();
        if(sz_resetMargin(r,opts),!is_number(n)){
            if(opts.items.visibleConf.variable)n=gn_getVisibleItemsPrev(r,opts,itms.total-1);
            else if("*"!=opts.items.filter){
                var i=is_number(t.items)?t.items:gn_getVisibleOrg($cfs,opts);
                n=gn_getScrollItemsPrevFilter(r,opts,itms.total-1,i)
                }else n=opts.items.visible;
            n=cf_getAdjust(n,opts,t.items,$tt0)
            }
            if(opts.circular||itms.total-n<itms.first&&(n=itms.total-itms.first),opts.items.visibleConf.old=opts.items.visible,opts.items.visibleConf.variable){
            var s=cf_getItemsAdjust(gn_getVisibleItemsNext(r,opts,itms.total-n),opts,opts.items.visibleConf.adjust,$tt0);
            s>=opts.items.visible+n&&itms.total>n&&(n++,s=cf_getItemsAdjust(gn_getVisibleItemsNext(r,opts,itms.total-n),opts,opts.items.visibleConf.adjust,$tt0)),opts.items.visible=s
            }else if("*"!=opts.items.filter){
            var s=gn_getVisibleItemsNextFilter(r,opts,itms.total-n);
            opts.items.visible=cf_getItemsAdjust(s,opts,opts.items.visibleConf.adjust,$tt0)
            }
            if(sz_resetMargin(r,opts,!0),0==n)return e.stopImmediatePropagation(),debug(conf,"0 items to scroll: Not scrolling.");
        for(debug(conf,"Scrolling "+n+" items backward."),itms.first+=n;itms.first>=itms.total;)itms.first-=itms.total;
        opts.circular||(0==itms.first&&t.onEnd&&t.onEnd.call($tt0,"prev"),opts.infinite||nv_enableNavi(opts,itms.first,conf)),$cfs.children().slice(itms.total-n,itms.total).prependTo($cfs),itms.total<opts.items.visible+n&&$cfs.children().slice(0,opts.items.visible+n-itms.total).clone(!0).appendTo($cfs);
        var r=$cfs.children(),o=gi_getOldItemsPrev(r,opts,n),u=gi_getNewItemsPrev(r,opts),a=r.eq(n-1),f=o.last(),l=u.last();
        sz_resetMargin(r,opts);
        var c=0,h=0;
        if(opts.align){
            var p=cf_getAlignPadding(u,opts);
            c=p[0],h=p[1]
            }
            var d=0>c?opts.padding[opts.d[3]]:0,v=!1,m=$();
        if(n>opts.items.visible&&(m=r.slice(opts.items.visibleConf.old,n),"directscroll"==t.fx)){
            var g=opts.items[opts.d.width];
            v=m,a=l,sc_hideHiddenItems(v),opts.items[opts.d.width]="variable"
            }
            var y=!1,b=ms_getTotalSize(r.slice(0,n),opts,"width"),w=cf_mapWrapperSizes(ms_getSizes(u,opts,!0),opts,!opts.usePadding),E=0,S={},x={},T={},N={},C={},k={},L={},A=sc_getDuration(t,opts,n,b);
        switch(t.fx){
            case"cover":case"cover-fade":
                E=ms_getTotalSize(r.slice(0,opts.items.visible),opts,"width")
                }
                v&&(opts.items[opts.d.width]=g),sz_resetMargin(r,opts,!0),h>=0&&sz_resetMargin(f,opts,opts.padding[opts.d[1]]),c>=0&&sz_resetMargin(a,opts,opts.padding[opts.d[3]]),opts.align&&(opts.padding[opts.d[1]]=h,opts.padding[opts.d[3]]=c),k[opts.d.left]=-(b-d),L[opts.d.left]=-(E-d),x[opts.d.left]=w[opts.d.width];
        var O=function(){},M=function(){},_=function(){},D=function(){},P=function(){},H=function(){},B=function(){},j=function(){},F=function(){},I=function(){},q=function(){};
        
        switch(t.fx){
            case"crossfade":case"cover":case"cover-fade":case"uncover":case"uncover-fade":
                y=$cfs.clone(!0).appendTo($wrp)
                }
                switch(t.fx){
            case"crossfade":case"uncover":case"uncover-fade":
                y.children().slice(0,n).remove(),y.children().slice(opts.items.visibleConf.old).remove();
                break;
            case"cover":case"cover-fade":
                y.children().slice(opts.items.visible).remove(),y.css(L)
                }
                if($cfs.css(k),scrl=sc_setScroll(A,t.easing,conf),S[opts.d.left]=opts.usePadding?opts.padding[opts.d[3]]:0,("variable"==opts[opts.d.width]||"variable"==opts[opts.d.height])&&(O=function(){
            $wrp.css(w)
            },M=function(){
            scrl.anims.push([$wrp,w])
            }),opts.usePadding){
            switch(l.not(a).length&&(T[opts.d.marginRight]=a.data("_cfs_origCssMargin"),0>c?a.css(T):(B=function(){
                a.css(T)
                },j=function(){
                scrl.anims.push([a,T])
                })),t.fx){
            case"cover":case"cover-fade":
                y.children().eq(n-1).css(T)
                }
                l.not(f).length&&(N[opts.d.marginRight]=f.data("_cfs_origCssMargin"),_=function(){
                f.css(N)
                },D=function(){
                scrl.anims.push([f,N])
                }),h>=0&&(C[opts.d.marginRight]=l.data("_cfs_origCssMargin")+opts.padding[opts.d[1]],P=function(){
                l.css(C)
                },H=function(){
                scrl.anims.push([l,C])
                })
            }
            q=function(){
            $cfs.css(S)
            };
            
        var R=opts.items.visible+n-itms.total;
        I=function(){
            if(R>0&&($cfs.children().slice(itms.total).remove(),o=$($cfs.children().slice(itms.total-(opts.items.visible-R)).get().concat($cfs.children().slice(0,R).get()))),sc_showHiddenItems(v),opts.usePadding){
                var e=$cfs.children().eq(opts.items.visible+n-1);
                e.css(opts.d.marginRight,e.data("_cfs_origCssMargin"))
                }
            };
        
    var U=sc_mapCallbackArguments(o,m,u,n,"prev",A,w);
        switch(F=function(){
        sc_afterScroll($cfs,y,t),crsl.isScrolling=!1,clbk.onAfter=sc_fireCallbacks($tt0,t,"onAfter",U,clbk),queu=sc_fireQueue($cfs,queu,conf),crsl.isPaused||$cfs.trigger(cf_e("play",conf))
        },crsl.isScrolling=!0,tmrs=sc_clearTimers(tmrs),clbk.onBefore=sc_fireCallbacks($tt0,t,"onBefore",U,clbk),t.fx){
        case"none":
            $cfs.css(S),O(),_(),P(),B(),q(),I(),F();
            break;
        case"fade":
            scrl.anims.push([$cfs,{
            opacity:0
        },function(){
            O(),_(),P(),B(),q(),I(),scrl=sc_setScroll(A,t.easing,conf),scrl.anims.push([$cfs,{
                opacity:1
            },F]),sc_startScroll(scrl,conf)
            }]);
        break;
        case"crossfade":
            $cfs.css({
            opacity:0
        }),scrl.anims.push([y,{
            opacity:0
        }]),scrl.anims.push([$cfs,{
            opacity:1
        },F]),M(),_(),P(),B(),q(),I();
            break;
        case"cover":
            scrl.anims.push([y,S,function(){
            _(),P(),B(),q(),I(),F()
            }]),M();
            break;
        case"cover-fade":
            scrl.anims.push([$cfs,{
            opacity:0
        }]),scrl.anims.push([y,S,function(){
            _(),P(),B(),q(),I(),F()
            }]),M();
            break;
        case"uncover":
            scrl.anims.push([y,x,F]),M(),_(),P(),B(),q(),I();
            break;
        case"uncover-fade":
            $cfs.css({
            opacity:0
        }),scrl.anims.push([$cfs,{
            opacity:1
        }]),scrl.anims.push([y,x,F]),M(),_(),P(),B(),q(),I();
            break;
        default:
            scrl.anims.push([$cfs,S,function(){
            I(),F()
            }]),M(),D(),H(),j()
            }
            return sc_startScroll(scrl,conf),cf_setCookie(opts.cookie,$cfs,conf),$cfs.trigger(cf_e("updatePageStatus",conf),[!1,w]),!0
        }),$cfs.bind(cf_e("slide_next",conf),function(e,t,n){
    e.stopPropagation();
    var r=$cfs.children();
    if(!opts.circular&&itms.first==opts.items.visible)return opts.infinite&&$cfs.trigger(cf_e("prev",conf),itms.total-1),e.stopImmediatePropagation();
    if(sz_resetMargin(r,opts),!is_number(n)){
        if("*"!=opts.items.filter){
            var i=is_number(t.items)?t.items:gn_getVisibleOrg($cfs,opts);
            n=gn_getScrollItemsNextFilter(r,opts,0,i)
            }else n=opts.items.visible;
        n=cf_getAdjust(n,opts,t.items,$tt0)
        }
        var s=0==itms.first?itms.total:itms.first;
    if(!opts.circular){
        if(opts.items.visibleConf.variable)var o=gn_getVisibleItemsNext(r,opts,n),i=gn_getVisibleItemsPrev(r,opts,s-1);else var o=opts.items.visible,i=opts.items.visible;
        n+o>s&&(n=s-i)
        }
        if(opts.items.visibleConf.old=opts.items.visible,opts.items.visibleConf.variable){
        for(var o=cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(r,opts,n,s),opts,opts.items.visibleConf.adjust,$tt0);opts.items.visible-n>=o&&itms.total>n;)n++,o=cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(r,opts,n,s),opts,opts.items.visibleConf.adjust,$tt0);
        opts.items.visible=o
        }else if("*"!=opts.items.filter){
        var o=gn_getVisibleItemsNextFilter(r,opts,n);
        opts.items.visible=cf_getItemsAdjust(o,opts,opts.items.visibleConf.adjust,$tt0)
        }
        if(sz_resetMargin(r,opts,!0),0==n)return e.stopImmediatePropagation(),debug(conf,"0 items to scroll: Not scrolling.");
    for(debug(conf,"Scrolling "+n+" items forward."),itms.first-=n;0>itms.first;)itms.first+=itms.total;
    opts.circular||(itms.first==opts.items.visible&&t.onEnd&&t.onEnd.call($tt0,"next"),opts.infinite||nv_enableNavi(opts,itms.first,conf)),itms.total<opts.items.visible+n&&$cfs.children().slice(0,opts.items.visible+n-itms.total).clone(!0).appendTo($cfs);
    var r=$cfs.children(),u=gi_getOldItemsNext(r,opts),a=gi_getNewItemsNext(r,opts,n),f=r.eq(n-1),l=u.last(),c=a.last();
    sz_resetMargin(r,opts);
    var h=0,p=0;
    if(opts.align){
        var d=cf_getAlignPadding(a,opts);
        h=d[0],p=d[1]
        }
        var v=!1,m=$();
    if(n>opts.items.visibleConf.old&&(m=r.slice(opts.items.visibleConf.old,n),"directscroll"==t.fx)){
        var g=opts.items[opts.d.width];
        v=m,f=l,sc_hideHiddenItems(v),opts.items[opts.d.width]="variable"
        }
        var y=!1,b=ms_getTotalSize(r.slice(0,n),opts,"width"),w=cf_mapWrapperSizes(ms_getSizes(a,opts,!0),opts,!opts.usePadding),E=0,S={},x={},T={},N={},C={},k=sc_getDuration(t,opts,n,b);
    switch(t.fx){
        case"uncover":case"uncover-fade":
            E=ms_getTotalSize(r.slice(0,opts.items.visibleConf.old),opts,"width")
            }
            v&&(opts.items[opts.d.width]=g),opts.align&&0>opts.padding[opts.d[1]]&&(opts.padding[opts.d[1]]=0),sz_resetMargin(r,opts,!0),sz_resetMargin(l,opts,opts.padding[opts.d[1]]),opts.align&&(opts.padding[opts.d[1]]=p,opts.padding[opts.d[3]]=h),C[opts.d.left]=opts.usePadding?opts.padding[opts.d[3]]:0;
    var L=function(){},A=function(){},O=function(){},M=function(){},_=function(){},D=function(){},P=function(){},H=function(){},B=function(){};
    
    switch(t.fx){
        case"crossfade":case"cover":case"cover-fade":case"uncover":case"uncover-fade":
            y=$cfs.clone(!0).appendTo($wrp),y.children().slice(opts.items.visibleConf.old).remove()
            }
            switch(t.fx){
        case"crossfade":case"cover":case"cover-fade":
            $cfs.css("zIndex",1),y.css("zIndex",0)
            }
            if(scrl=sc_setScroll(k,t.easing,conf),S[opts.d.left]=-b,x[opts.d.left]=-E,0>h&&(S[opts.d.left]+=h),("variable"==opts[opts.d.width]||"variable"==opts[opts.d.height])&&(L=function(){
        $wrp.css(w)
        },A=function(){
        scrl.anims.push([$wrp,w])
        }),opts.usePadding){
        var j=c.data("_cfs_origCssMargin");
        p>=0&&(j+=opts.padding[opts.d[1]]),c.css(opts.d.marginRight,j),f.not(l).length&&(N[opts.d.marginRight]=l.data("_cfs_origCssMargin")),O=function(){
            l.css(N)
            },M=function(){
            scrl.anims.push([l,N])
            };
            
        var F=f.data("_cfs_origCssMargin");
        h>0&&(F+=opts.padding[opts.d[3]]),T[opts.d.marginRight]=F,_=function(){
            f.css(T)
            },D=function(){
            scrl.anims.push([f,T])
            }
        }
    B=function(){
    $cfs.css(C)
    };
    
var I=opts.items.visible+n-itms.total;
H=function(){
    I>0&&$cfs.children().slice(itms.total).remove();
    var e=$cfs.children().slice(0,n).appendTo($cfs).last();
    if(I>0&&(a=gi_getCurrentItems(r,opts)),sc_showHiddenItems(v),opts.usePadding){
        if(itms.total<opts.items.visible+n){
            var t=$cfs.children().eq(opts.items.visible-1);
            t.css(opts.d.marginRight,t.data("_cfs_origCssMargin")+opts.padding[opts.d[1]])
            }
            e.css(opts.d.marginRight,e.data("_cfs_origCssMargin"))
        }
    };

var q=sc_mapCallbackArguments(u,m,a,n,"next",k,w);
    switch(P=function(){
    $cfs.css("zIndex",$cfs.data("_cfs_origCssZindex")),sc_afterScroll($cfs,y,t),crsl.isScrolling=!1,clbk.onAfter=sc_fireCallbacks($tt0,t,"onAfter",q,clbk),queu=sc_fireQueue($cfs,queu,conf),crsl.isPaused||$cfs.trigger(cf_e("play",conf))
    },crsl.isScrolling=!0,tmrs=sc_clearTimers(tmrs),clbk.onBefore=sc_fireCallbacks($tt0,t,"onBefore",q,clbk),t.fx){
    case"none":
        $cfs.css(S),L(),O(),_(),B(),H(),P();
        break;
    case"fade":
        scrl.anims.push([$cfs,{
        opacity:0
    },function(){
        L(),O(),_(),B(),H(),scrl=sc_setScroll(k,t.easing,conf),scrl.anims.push([$cfs,{
            opacity:1
        },P]),sc_startScroll(scrl,conf)
        }]);
    break;
    case"crossfade":
        $cfs.css({
        opacity:0
    }),scrl.anims.push([y,{
        opacity:0
    }]),scrl.anims.push([$cfs,{
        opacity:1
    },P]),A(),O(),_(),B(),H();
        break;
    case"cover":
        $cfs.css(opts.d.left,$wrp[opts.d.width]()),scrl.anims.push([$cfs,C,P]),A(),O(),_(),H();
        break;
    case"cover-fade":
        $cfs.css(opts.d.left,$wrp[opts.d.width]()),scrl.anims.push([y,{
        opacity:0
    }]),scrl.anims.push([$cfs,C,P]),A(),O(),_(),H();
        break;
    case"uncover":
        scrl.anims.push([y,x,P]),A(),O(),_(),B(),H();
        break;
    case"uncover-fade":
        $cfs.css({
        opacity:0
    }),scrl.anims.push([$cfs,{
        opacity:1
    }]),scrl.anims.push([y,x,P]),A(),O(),_(),B(),H();
        break;
    default:
        scrl.anims.push([$cfs,S,function(){
        B(),H(),P()
        }]),A(),M(),D()
        }
        return sc_startScroll(scrl,conf),cf_setCookie(opts.cookie,$cfs,conf),$cfs.trigger(cf_e("updatePageStatus",conf),[!1,w]),!0
    }),$cfs.bind(cf_e("slideTo",conf),function(e,t,n,r,i,s,o){
    e.stopPropagation();
    var u=[t,n,r,i,s,o],a=["string/number/object","number","boolean","object","string","function"],f=cf_sortParams(u,a);
    return i=f[3],s=f[4],o=f[5],t=gn_getItemIndex(f[0],f[1],f[2],itms,$cfs),0==t?!1:(is_object(i)||(i=!1),"prev"!=s&&"next"!=s&&(s=opts.circular?itms.total/2>=t?"next":"prev":0==itms.first||itms.first>t?"next":"prev"),"prev"==s&&(t=itms.total-t),$cfs.trigger(cf_e(s,conf),[i,t,o]),!0)
    }),$cfs.bind(cf_e("prevPage",conf),function(e,t,n){
    e.stopPropagation();
    var r=$cfs.triggerHandler(cf_e("currentPage",conf));
    return $cfs.triggerHandler(cf_e("slideToPage",conf),[r-1,t,"prev",n])
    }),$cfs.bind(cf_e("nextPage",conf),function(e,t,n){
    e.stopPropagation();
    var r=$cfs.triggerHandler(cf_e("currentPage",conf));
    return $cfs.triggerHandler(cf_e("slideToPage",conf),[r+1,t,"next",n])
    }),$cfs.bind(cf_e("slideToPage",conf),function(e,t,n,r,i){
    e.stopPropagation(),is_number(t)||(t=$cfs.triggerHandler(cf_e("currentPage",conf)));
    var s=opts.pagination.items||opts.items.visible,o=Math.ceil(itms.total/s)-1;
    return 0>t&&(t=o),t>o&&(t=0),$cfs.triggerHandler(cf_e("slideTo",conf),[t*s,0,!0,n,r,i])
    }),$cfs.bind(cf_e("jumpToStart",conf),function(e,t){
    if(e.stopPropagation(),t=t?gn_getItemIndex(t,0,!0,itms,$cfs):0,t+=itms.first,0!=t){
        if(itms.total>0)for(;t>itms.total;)t-=itms.total;
        $cfs.prepend($cfs.children().slice(t,itms.total))
        }
        return!0
    }),$cfs.bind(cf_e("synchronise",conf),function(e,t){
    if(e.stopPropagation(),t)t=cf_getSynchArr(t);
    else{
        if(!opts.synchronise)return debug(conf,"No carousel to synchronise.");
        t=opts.synchronise
        }
        for(var n=$cfs.triggerHandler(cf_e("currentPosition",conf)),r=!0,i=0,s=t.length;s>i;i++)t[i][0].triggerHandler(cf_e("slideTo",conf),[n,t[i][3],!0])||(r=!1);
    return r
    }),$cfs.bind(cf_e("queue",conf),function(e,t,n){
    return e.stopPropagation(),is_function(t)?t.call($tt0,queu):is_array(t)?queu=t:is_undefined(t)||queu.push([t,n]),queu
    }),$cfs.bind(cf_e("insertItem",conf),function(e,t,n,r,i){
    e.stopPropagation();
    var s=[t,n,r,i],o=["string/object","string/number/object","boolean","number"],u=cf_sortParams(s,o);
    if(t=u[0],n=u[1],r=u[2],i=u[3],is_object(t)&&!is_jquery(t)?t=$(t):is_string(t)&&(t=$(t)),!is_jquery(t)||0==t.length)return debug(conf,"Not a valid object.");
    is_undefined(n)&&(n="end"),sz_storeMargin(t,opts),sz_storeOrigCss(t);
    var a=n,f="before";
    "end"==n?r?(0==itms.first?(n=itms.total-1,f="after"):(n=itms.first,itms.first+=t.length),0>n&&(n=0)):(n=itms.total-1,f="after"):n=gn_getItemIndex(n,i,r,itms,$cfs);
    var l=$cfs.children().eq(n);
    return l.length?l[f](t):(debug(conf,"Correct insert-position not found! Appending item to the end."),$cfs.append(t)),"end"==a||r||itms.first>n&&(itms.first+=t.length),itms.total=$cfs.children().length,itms.first>=itms.total&&(itms.first-=itms.total),$cfs.trigger(cf_e("updateSizes",conf)),$cfs.trigger(cf_e("linkAnchors",conf)),!0
    }),$cfs.bind(cf_e("removeItem",conf),function(e,t,n,r){
    e.stopPropagation();
    var i=[t,n,r],s=["string/number/object","boolean","number"],o=cf_sortParams(i,s);
    if(t=o[0],n=o[1],r=o[2],t instanceof $&&t.length>1)return u=$(),t.each(function(){
        var e=$cfs.trigger(cf_e("removeItem",conf),[$(this),n,r]);
        e&&(u=u.add(e))
        }),u;
    if(is_undefined(t)||"end"==t)u=$cfs.children().last();
    else{
        t=gn_getItemIndex(t,r,n,itms,$cfs);
        var u=$cfs.children().eq(t);
        u.length&&itms.first>t&&(itms.first-=u.length)
        }
        return u&&u.length&&(u.detach(),itms.total=$cfs.children().length,$cfs.trigger(cf_e("updateSizes",conf))),u
    }),$cfs.bind(cf_e("onBefore",conf)+" "+cf_e("onAfter",conf),function(e,t){
    e.stopPropagation();
    var n=e.type.slice(conf.events.prefix.length);
    return is_array(t)&&(clbk[n]=t),is_function(t)&&clbk[n].push(t),clbk[n]
    }),$cfs.bind(cf_e("currentPosition",conf),function(e,t){
    if(e.stopPropagation(),0==itms.first)var n=0;else var n=itms.total-itms.first;
    return is_function(t)&&t.call($tt0,n),n
    }),$cfs.bind(cf_e("currentPage",conf),function(e,t){
    e.stopPropagation();
    var n,r=opts.pagination.items||opts.items.visible,i=Math.ceil(itms.total/r-1);
    return n=0==itms.first?0:itms.first<itms.total%r?0:itms.first!=r||opts.circular?Math.round((itms.total-itms.first)/r):i,0>n&&(n=0),n>i&&(n=i),is_function(t)&&t.call($tt0,n),n
    }),$cfs.bind(cf_e("currentVisible",conf),function(e,t){
    e.stopPropagation();
    var n=gi_getCurrentItems($cfs.children(),opts);
    return is_function(t)&&t.call($tt0,n),n
    }),$cfs.bind(cf_e("slice",conf),function(e,t,n,r){
    if(e.stopPropagation(),0==itms.total)return!1;
    var i=[t,n,r],s=["number","number","function"],o=cf_sortParams(i,s);
    if(t=is_number(o[0])?o[0]:0,n=is_number(o[1])?o[1]:itms.total,r=o[2],t+=itms.first,n+=itms.first,items.total>0){
        for(;t>itms.total;)t-=itms.total;
        for(;n>itms.total;)n-=itms.total;
        for(;0>t;)t+=itms.total;
        for(;0>n;)n+=itms.total
            }
            var u,a=$cfs.children();
    return u=n>t?a.slice(t,n):$(a.slice(t,itms.total).get().concat(a.slice(0,n).get())),is_function(r)&&r.call($tt0,u),u
    }),$cfs.bind(cf_e("isPaused",conf)+" "+cf_e("isStopped",conf)+" "+cf_e("isScrolling",conf),function(e,t){
    e.stopPropagation();
    var n=e.type.slice(conf.events.prefix.length),r=crsl[n];
    return is_function(t)&&t.call($tt0,r),r
    }),$cfs.bind(cf_e("configuration",conf),function(e,a,b,c){
    e.stopPropagation();
    var reInit=!1;
    if(is_function(a))a.call($tt0,opts);
    else if(is_object(a))opts_orig=$.extend(!0,{},opts_orig,a),b!==!1?reInit=!0:opts=$.extend(!0,{},opts,a);
    else if(!is_undefined(a))if(is_function(b)){
        var val=eval("opts."+a);
        is_undefined(val)&&(val=""),b.call($tt0,val)
        }else{
        if(is_undefined(b))return eval("opts."+a);
        "boolean"!=typeof c&&(c=!0),eval("opts_orig."+a+" = b"),c!==!1?reInit=!0:eval("opts."+a+" = b")
        }
        if(reInit){
        sz_resetMargin($cfs.children(),opts),FN._init(opts_orig),FN._bind_buttons();
        var sz=sz_setSizes($cfs,opts);
        $cfs.trigger(cf_e("updatePageStatus",conf),[!0,sz])
        }
        return opts
    }),$cfs.bind(cf_e("linkAnchors",conf),function(e,t,n){
    return e.stopPropagation(),is_undefined(t)?t=$("body"):is_string(t)&&(t=$(t)),is_jquery(t)&&0!=t.length?(is_string(n)||(n="a.caroufredsel"),t.find(n).each(function(){
        var e=this.hash||"";
        e.length>0&&-1!=$cfs.children().index($(e))&&$(this).unbind("click").click(function(t){
            t.preventDefault(),$cfs.trigger(cf_e("slideTo",conf),e)
            })
        }),!0):debug(conf,"Not a valid object.")
    }),$cfs.bind(cf_e("updatePageStatus",conf),function(e,t){
    if(e.stopPropagation(),opts.pagination.container){
        var n=opts.pagination.items||opts.items.visible,r=Math.ceil(itms.total/n);
        t&&(opts.pagination.anchorBuilder&&(opts.pagination.container.children().remove(),opts.pagination.container.each(function(){
            for(var e=0;r>e;e++){
                var t=$cfs.children().eq(gn_getItemIndex(e*n,0,!0,itms,$cfs));
                $(this).append(opts.pagination.anchorBuilder.call(t[0],e+1))
                }
            })),opts.pagination.container.each(function(){
            $(this).children().unbind(opts.pagination.event).each(function(e){
                $(this).bind(opts.pagination.event,function(t){
                    t.preventDefault(),$cfs.trigger(cf_e("slideTo",conf),[e*n,-opts.pagination.deviation,!0,opts.pagination])
                    })
                })
            }));
    var i=$cfs.triggerHandler(cf_e("currentPage",conf))+opts.pagination.deviation;
    return i>=r&&(i=0),0>i&&(i=r-1),opts.pagination.container.each(function(){
        $(this).children().removeClass(cf_c("selected",conf)).eq(i).addClass(cf_c("selected",conf))
        }),!0
    }
}),$cfs.bind(cf_e("updateSizes",conf),function(){
    var e=opts.items.visible,t=$cfs.children(),n=ms_getParentSize($wrp,opts,"width");
    if(itms.total=t.length,crsl.primarySizePercentage?(opts.maxDimension=n,opts[opts.d.width]=ms_getPercentage(n,crsl.primarySizePercentage)):opts.maxDimension=ms_getMaxDimension(opts,n),opts.responsive?(opts.items.width=opts.items.sizesConf.width,opts.items.height=opts.items.sizesConf.height,opts=in_getResponsiveValues(opts,t,n),e=opts.items.visible,sz_setResponsiveSizes(opts,t)):opts.items.visibleConf.variable?e=gn_getVisibleItemsNext(t,opts,0):"*"!=opts.items.filter&&(e=gn_getVisibleItemsNextFilter(t,opts,0)),!opts.circular&&0!=itms.first&&e>itms.first){
        if(opts.items.visibleConf.variable)var r=gn_getVisibleItemsPrev(t,opts,itms.first)-itms.first;
        else if("*"!=opts.items.filter)var r=gn_getVisibleItemsPrevFilter(t,opts,itms.first)-itms.first;else var r=opts.items.visible-itms.first;
        debug(conf,"Preventing non-circular: sliding "+r+" items backward."),$cfs.trigger(cf_e("prev",conf),r)
        }
        opts.items.visible=cf_getItemsAdjust(e,opts,opts.items.visibleConf.adjust,$tt0),opts.items.visibleConf.old=opts.items.visible,opts=in_getAlignPadding(opts,t);
    var i=sz_setSizes($cfs,opts);
    return $cfs.trigger(cf_e("updatePageStatus",conf),[!0,i]),nv_showNavi(opts,itms.total,conf),nv_enableNavi(opts,itms.first,conf),i
    }),$cfs.bind(cf_e("destroy",conf),function(e,t){
    return e.stopPropagation(),tmrs=sc_clearTimers(tmrs),$cfs.data("_cfs_isCarousel",!1),$cfs.trigger(cf_e("finish",conf)),t&&$cfs.trigger(cf_e("jumpToStart",conf)),sz_restoreOrigCss($cfs.children()),sz_restoreOrigCss($cfs),FN._unbind_events(),FN._unbind_buttons(),"parent"==conf.wrapper?sz_restoreOrigCss($wrp):$wrp.replaceWith($cfs),!0
    }),$cfs.bind(cf_e("debug",conf),function(){
    return debug(conf,"Carousel width: "+opts.width),debug(conf,"Carousel height: "+opts.height),debug(conf,"Item widths: "+opts.items.width),debug(conf,"Item heights: "+opts.items.height),debug(conf,"Number of items visible: "+opts.items.visible),opts.auto.play&&debug(conf,"Number of items scrolled automatically: "+opts.auto.items),opts.prev.button&&debug(conf,"Number of items scrolled backward: "+opts.prev.items),opts.next.button&&debug(conf,"Number of items scrolled forward: "+opts.next.items),conf.debug
    }),$cfs.bind("_cfs_triggerEvent",function(e,t,n){
    return e.stopPropagation(),$cfs.triggerHandler(cf_e(t,conf),n)
    })
},FN._unbind_events=function(){
    $cfs.unbind(cf_e("",conf)),$cfs.unbind(cf_e("",conf,!1)),$cfs.unbind("_cfs_triggerEvent")
    },FN._bind_buttons=function(){
    if(FN._unbind_buttons(),nv_showNavi(opts,itms.total,conf),nv_enableNavi(opts,itms.first,conf),opts.auto.pauseOnHover){
        var e=bt_pauseOnHoverConfig(opts.auto.pauseOnHover);
        $wrp.bind(cf_e("mouseenter",conf,!1),function(){
            $cfs.trigger(cf_e("pause",conf),e)
            }).bind(cf_e("mouseleave",conf,!1),function(){
            $cfs.trigger(cf_e("resume",conf))
            })
        }
        if(opts.auto.button&&opts.auto.button.bind(cf_e(opts.auto.event,conf,!1),function(e){
        e.preventDefault();
        var t=!1,n=null;
        crsl.isPaused?t="play":opts.auto.pauseOnEvent&&(t="pause",n=bt_pauseOnHoverConfig(opts.auto.pauseOnEvent)),t&&$cfs.trigger(cf_e(t,conf),n)
        }),opts.prev.button&&(opts.prev.button.bind(cf_e(opts.prev.event,conf,!1),function(e){
        e.preventDefault(),$cfs.trigger(cf_e("prev",conf))
        }),opts.prev.pauseOnHover)){
        var e=bt_pauseOnHoverConfig(opts.prev.pauseOnHover);
        opts.prev.button.bind(cf_e("mouseenter",conf,!1),function(){
            $cfs.trigger(cf_e("pause",conf),e)
            }).bind(cf_e("mouseleave",conf,!1),function(){
            $cfs.trigger(cf_e("resume",conf))
            })
        }
        if(opts.next.button&&(opts.next.button.bind(cf_e(opts.next.event,conf,!1),function(e){
        e.preventDefault(),$cfs.trigger(cf_e("next",conf))
        }),opts.next.pauseOnHover)){
        var e=bt_pauseOnHoverConfig(opts.next.pauseOnHover);
        opts.next.button.bind(cf_e("mouseenter",conf,!1),function(){
            $cfs.trigger(cf_e("pause",conf),e)
            }).bind(cf_e("mouseleave",conf,!1),function(){
            $cfs.trigger(cf_e("resume",conf))
            })
        }
        if(opts.pagination.container&&opts.pagination.pauseOnHover){
        var e=bt_pauseOnHoverConfig(opts.pagination.pauseOnHover);
        opts.pagination.container.bind(cf_e("mouseenter",conf,!1),function(){
            $cfs.trigger(cf_e("pause",conf),e)
            }).bind(cf_e("mouseleave",conf,!1),function(){
            $cfs.trigger(cf_e("resume",conf))
            })
        }
        if((opts.prev.key||opts.next.key)&&$(document).bind(cf_e("keyup",conf,!1,!0,!0),function(e){
        var t=e.keyCode;
        t==opts.next.key&&(e.preventDefault(),$cfs.trigger(cf_e("next",conf))),t==opts.prev.key&&(e.preventDefault(),$cfs.trigger(cf_e("prev",conf)))
        }),opts.pagination.keys&&$(document).bind(cf_e("keyup",conf,!1,!0,!0),function(e){
        var t=e.keyCode;
        t>=49&&58>t&&(t=(t-49)*opts.items.visible,itms.total>=t&&(e.preventDefault(),$cfs.trigger(cf_e("slideTo",conf),[t,0,!0,opts.pagination])))
        }),$.fn.swipe){
        var t="ontouchstart"in window;
        if(t&&opts.swipe.onTouch||!t&&opts.swipe.onMouse){
            var n=$.extend(!0,{},opts.prev,opts.swipe),r=$.extend(!0,{},opts.next,opts.swipe),i=function(){
                $cfs.trigger(cf_e("prev",conf),[n])
                },s=function(){
                $cfs.trigger(cf_e("next",conf),[r])
                };
                
            switch(opts.direction){
                case"up":case"down":
                    opts.swipe.options.swipeUp=s,opts.swipe.options.swipeDown=i;
                    break;
                default:
                    opts.swipe.options.swipeLeft=s,opts.swipe.options.swipeRight=i
                    }
                    crsl.swipe&&$cfs.swipe("destroy"),$wrp.swipe(opts.swipe.options),$wrp.css("cursor","move"),crsl.swipe=!0
            }
        }
    if($.fn.mousewheel&&opts.mousewheel){
    var o=$.extend(!0,{},opts.prev,opts.mousewheel),u=$.extend(!0,{},opts.next,opts.mousewheel);
    crsl.mousewheel&&$wrp.unbind(cf_e("mousewheel",conf,!1)),$wrp.bind(cf_e("mousewheel",conf,!1),function(e,t){
        e.preventDefault(),t>0?$cfs.trigger(cf_e("prev",conf),[o]):$cfs.trigger(cf_e("next",conf),[u])
        }),crsl.mousewheel=!0
    }
    if(opts.auto.play&&$cfs.trigger(cf_e("play",conf),opts.auto.delay),crsl.upDateOnWindowResize){
    var a=function(){
        $cfs.trigger(cf_e("finish",conf)),opts.auto.pauseOnResize&&!crsl.isPaused&&$cfs.trigger(cf_e("play",conf)),sz_resetMargin($cfs.children(),opts),$cfs.trigger(cf_e("updateSizes",conf))
        },f=$(window),l=null;
    if($.debounce&&"debounce"==conf.onWindowResize)l=$.debounce(200,a);
    else if($.throttle&&"throttle"==conf.onWindowResize)l=$.throttle(300,a);
    else{
        var c=0,h=0;
        l=function(){
            var e=f.width(),t=f.height();
            (e!=c||t!=h)&&(a(),c=e,h=t)
            }
        }
    f.bind(cf_e("resize",conf,!1,!0,!0),l)
}
},FN._unbind_buttons=function(){
    var e=(cf_e("",conf),cf_e("",conf,!1));
    ns3=cf_e("",conf,!1,!0,!0),$(document).unbind(ns3),$(window).unbind(ns3),$wrp.unbind(e),opts.auto.button&&opts.auto.button.unbind(e),opts.prev.button&&opts.prev.button.unbind(e),opts.next.button&&opts.next.button.unbind(e),opts.pagination.container&&(opts.pagination.container.unbind(e),opts.pagination.anchorBuilder&&opts.pagination.container.children().remove()),crsl.swipe&&($cfs.swipe("destroy"),$wrp.css("cursor","default"),crsl.swipe=!1),crsl.mousewheel&&(crsl.mousewheel=!1),nv_showNavi(opts,"hide",conf),nv_enableNavi(opts,"removeClass",conf)
    },is_boolean(configs)&&(configs={
    debug:configs
});
var crsl={
    direction:"next",
    isPaused:!0,
    isScrolling:!1,
    isStopped:!1,
    mousewheel:!1,
    swipe:!1
    },itms={
    total:$cfs.children().length,
    first:0
},tmrs={
    auto:null,
    progress:null,
    startTime:getTime(),
    timePassed:0
},scrl={
    isStopped:!1,
    duration:0,
    startTime:0,
    easing:"",
    anims:[]
},clbk={
    onBefore:[],
    onAfter:[]
},queu=[],conf=$.extend(!0,{},$.fn.carouFredSel.configs,configs),opts={},opts_orig=$.extend(!0,{},options),$wrp="parent"==conf.wrapper?$cfs.parent():$cfs.wrap("<"+conf.wrapper.element+' class="'+conf.wrapper.classname+'" />').parent();
if(conf.selector=$cfs.selector,conf.serialNumber=$.fn.carouFredSel.serialNumber++,conf.transition=conf.transition&&$.fn.transition?"transition":"animate",FN._init(opts_orig,!0,starting_position),FN._build(),FN._bind_events(),FN._bind_buttons(),is_array(opts.items.start))var start_arr=opts.items.start;
else{
    var start_arr=[];
    0!=opts.items.start&&start_arr.push(opts.items.start)
    }
    if(opts.cookie&&start_arr.unshift(parseInt(cf_getCookie(opts.cookie),10)),start_arr.length>0)for(var a=0,l=start_arr.length;l>a;a++){
    var s=start_arr[a];
    if(0!=s){
        if(s===!0){
            if(s=window.location.hash,1>s.length)continue
        }else"random"===s&&(s=Math.floor(Math.random()*itms.total));
        if($cfs.triggerHandler(cf_e("slideTo",conf),[s,0,!0,{
            fx:"none"
        }]))break
    }
}
var siz=sz_setSizes($cfs,opts),itm=gi_getCurrentItems($cfs.children(),opts);
return opts.onCreate&&opts.onCreate.call($tt0,{
    width:siz.width,
    height:siz.height,
    items:itm
}),$cfs.trigger(cf_e("updatePageStatus",conf),[!0,siz]),$cfs.trigger(cf_e("linkAnchors",conf)),conf.debug&&$cfs.trigger(cf_e("debug",conf)),$cfs
},$.fn.carouFredSel.serialNumber=1,$.fn.carouFredSel.defaults={
    synchronise:!1,
    infinite:!0,
    circular:!0,
    responsive:!1,
    direction:"left",
    items:{
        start:0
    },
    scroll:{
        easing:"swing",
        duration:500,
        pauseOnHover:!1,
        event:"click",
        queue:!1
        }
    },$.fn.carouFredSel.configs={
    debug:!1,
    transition:!1,
    onWindowResize:"throttle",
    events:{
        prefix:"",
        namespace:"cfs"
    },
    wrapper:{
        element:"div",
        classname:"caroufredsel_wrapper"
    },
    classnames:{}
},$.fn.carouFredSel.pageAnchorBuilder=function(e){
    return'<a href="#"><span>'+e+"</span></a>"
    },$.fn.carouFredSel.progressbarUpdater=function(e){
    $(this).css("width",e+"%")
    },$.fn.carouFredSel.cookie={
    get:function(e){
        e+="=";
        for(var t=document.cookie.split(";"),n=0,r=t.length;r>n;n++){
            for(var i=t[n];" "==i.charAt(0);)i=i.slice(1);
            if(0==i.indexOf(e))return i.slice(e.length)
                }
                return 0
        },
    set:function(e,t,n){
        var r="";
        if(n){
            var i=new Date;
            i.setTime(i.getTime()+1e3*60*60*24*n),r="; expires="+i.toGMTString()
            }
            document.cookie=e+"="+t+r+"; path=/"
        },
    remove:function(e){
        $.fn.carouFredSel.cookie.set(e,"",-1)
        }
    },$.extend($.easing,{
    quadratic:function(e){
        var t=e*e;
        return e*(-t*e+4*t-6*e+4)
        },
    cubic:function(e){
        return e*(4*e*e-9*e+6)
        },
    elastic:function(e){
        var t=e*e;
        return e*(33*t*t-106*t*e+126*t-67*e+15)
        }
    }))
})(jQuery)