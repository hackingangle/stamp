var mymenu={
    arrowimages: {down:[
        'downarrowclass',  // 菜单右侧三角的样式
        url+'js/menu/down.gif',        // 右侧三角图片的路径
        0                  // 每个菜单项在原有宽度的基础上再增加一定的宽度
    ], right:[
        'rightarrowclass', // 子菜单右侧三角的样式
        url+'js/menu/right.gif'        // 子菜单右侧三角的路径
    ]},
    transition: {overtime:300, outtime:300},
    shadow: {
        enable:false,   // 是否开启阴影效果
        offsetx:2,     // 阴影的距离
        offsety:2
    },
    ///////Stop configuring beyond here///////////////////////////
    detectwebkit: navigator.userAgent.toLowerCase().indexOf("applewebkit")!=-1, //detect WebKit browsers (Safari, Chrome etc)
    detectie6: document.all && !window.XMLHttpRequest,
    getajaxmenu:function($, setting){ //function to fetch external page containing the panel DIVs
        var $menucontainer=$('#'+setting.contentsource[0]) //reference empty div on page that will hold menu
        $menucontainer.html("Loading Menu...")
        $.ajax({
            url: setting.contentsource[1], //path to external menu file
            async: true,
            error:function(ajaxrequest){
                $menucontainer.html('Error fetching content. Server Response: '+ajaxrequest.responseText)
            },
            success:function(content){
                $menucontainer.html(content)
                mymenu.buildmenu($, setting)
            }
        })
    },
    buildmenu:function($, setting){
        var smoothmenu=mymenu;
        var $mainmenu=$("#"+setting.mainmenuid+">ul") //reference main menu UL
        $mainmenu.parent().get(0).className=setting.classname || "mymenu"
        var $headers=$mainmenu.find("ul").parent()
        $headers.hover(
            function(e){
                $(this).children('a:eq(0)').addClass('selected')
            },
            function(e){
                $(this).children('a:eq(0)').removeClass('selected')
            }
        )
        $headers.each(function(i){ //loop through each LI header
            var $curobj=$(this).css({zIndex: 100-i}) //reference current LI header
            var $subul=$(this).find('ul:eq(0)').css({display:'block'})
            this._dimensions={w:this.offsetWidth, h:this.offsetHeight, subulw:$subul.outerWidth(), subulh:$subul.outerHeight()}
            this.istopheader=$curobj.parents("ul").length==1? true : false //is top level header?
            $subul.css({top:this.istopheader && setting.orientation!='v'? this._dimensions.h+"px" : 0})
            $curobj.children("a:eq(0)").css(this.istopheader? {paddingRight: smoothmenu.arrowimages.down[2]} : {}).append(
                '<img src="'+ (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[1] : smoothmenu.arrowimages.right[1])
                +'" class="' + (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[0] : smoothmenu.arrowimages.right[0])
                + '" />'
            )
            if (smoothmenu.shadow.enable){
                this._shadowoffset={x:(this.istopheader?$subul.offset().left+smoothmenu.shadow.offsetx : this._dimensions.w), y:(this.istopheader? $subul.offset().top+smoothmenu.shadow.offsety : $curobj.position().top)} //store this shadow's offsets
                if (this.istopheader)
                    $parentshadow=$(document.body)
                else{
                    var $parentLi=$curobj.parents("li:eq(0)")
                    $parentshadow=$parentLi.get(0).$shadow
                }
                this.$shadow=$('<div class="ddshadow'+(this.istopheader? ' toplevelshadow' : '')+'"></div>').prependTo($parentshadow).css({left:this._shadowoffset.x+'px', top:this._shadowoffset.y+'px'})  //insert shadow DIV and set it to parent node for the next shadow div
            }
            $curobj.hover(
                function(e){
                    var $targetul=$(this).children("ul:eq(0)")
                    this._offsets={left:$(this).offset().left, top:$(this).offset().top}
                    var menuleft=this.istopheader && setting.orientation!='v'? 0 : this._dimensions.w
                    menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader && setting.orientation!='v'? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) : menuleft //calculate this sub menu's offsets from its parent
                    if ($targetul.queue().length<=1){ //if 1 or less queued animations
                        $targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).animate({height:'show',opacity:'show'}, mymenu.transition.overtime)
                        if (smoothmenu.shadow.enable){
                            var shadowleft=this.istopheader? $targetul.offset().left+mymenu.shadow.offsetx : menuleft
                            var shadowtop=this.istopheader?$targetul.offset().top+smoothmenu.shadow.offsety : this._shadowoffset.y
                            if (!this.istopheader && mymenu.detectwebkit){ //in WebKit browsers, restore shadow's opacity to full
                                this.$shadow.css({opacity:1})
                            }
                            this.$shadow.css({overflow:'', width:this._dimensions.subulw+'px', left:shadowleft+'px', top:shadowtop+'px'}).animate({height:this._dimensions.subulh+'px'}, mymenu.transition.overtime)
                        }
                    }
                },
                function(e){
                    var $targetul=$(this).children("ul:eq(0)")
                    $targetul.animate({height:'hide', opacity:'hide'}, mymenu.transition.outtime)
                    if (smoothmenu.shadow.enable){
                        if (mymenu.detectwebkit){ //in WebKit browsers, set first child shadow's opacity to 0, as "overflow:hidden" doesn't work in them
                            this.$shadow.children('div:eq(0)').css({opacity:0})
                        }
                        this.$shadow.css({overflow:'hidden'}).animate({height:0}, mymenu.transition.outtime)
                    }
                }
            ) //end hover
        }) //end $headers.each()
        $mainmenu.find("ul").css({display:'none', visibility:'visible'})
    },
    init:function(setting){
        if (typeof setting.customtheme=="object" && setting.customtheme.length==2){ //override default menu colors (default/hover) with custom set?
            var mainmenuid='#'+setting.mainmenuid
            var mainselector=(setting.orientation=="v")? mainmenuid : mainmenuid+', '+mainmenuid
            document.write('<style type="text/css">\n'
                +mainselector+' ul li a {background:'+setting.customtheme[0]+';}\n'
                +mainmenuid+' ul li a:hover {background:'+setting.customtheme[1]+';}\n'
                +'</style>')
        }
        jQuery(document).ready(function($){ //ajax menu?
            if (typeof setting.contentsource=="object"){ //if external ajax menu
                mymenu.getajaxmenu($, setting)
            }
            else{ //else if markup menu
                mymenu.buildmenu($, setting)
            }
        })
    }
}