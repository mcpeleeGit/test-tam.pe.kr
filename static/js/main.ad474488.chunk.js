(this["webpackJsonpmy-app"]=this["webpackJsonpmy-app"]||[]).push([[0],{100:function(e,t,a){},208:function(e,t,a){},210:function(e,t,a){},211:function(e,t,a){"use strict";a.r(t);var r=a(0),o=(a(95),a(1)),n=a(33),c=a.n(n),s=a(39),i=a(22),l=a.n(i),j=a(31),h=a(9),d=a(10),b=a(12),p=a(11),m=a(8),u=a(216),O=a(28),x=a(215),k=a(217),f=a(218),g=a(221),v=a(219),y=a(220),C=a(24),w=(a(100),new(function(){function e(){Object(h.a)(this,e),this.getDataKey=function(e){return localStorage.getItem(e)},this.setUserLogin=function(e){localStorage.setItem("isLogin",e)}}return Object(d.a)(e,[{key:"isLogin",value:function(){return"true"===localStorage.getItem("isLogin")}}]),e}())),S=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(e){var r;return Object(h.a)(this,a),(r=t.call(this,e)).toggleNavbar=r.toggleNavbar.bind(Object(O.a)(r)),r.state={collapsed:!0},r}return Object(d.a)(a,[{key:"toggleNavbar",value:function(){this.setState({collapsed:!this.state.collapsed})}},{key:"bindClick",value:function(e){"LogOut"===e&&(w.setUserLogin("false"),console.log(w.isLogin()),window.location="/")}},{key:"render",value:function(){return Object(r.jsx)("header",{children:Object(r.jsx)(x.a,{className:"navbar-expand-sm navbar-toggleable-sm ng-white border-bottom box-shadow mb-3",light:!0,children:Object(r.jsxs)(u.a,{children:[Object(r.jsxs)(k.a,{tag:s.b,to:"/",children:[Object(r.jsx)("img",{src:"/img/icon/googsu.png",className:"logo",alt:"logo"}),"Kakao API Test"]}),Object(r.jsx)(f.a,{onClick:this.toggleNavbar,className:"mr-2"}),Object(r.jsx)(g.a,{className:"d-sm-inline-flex flex-sm-row-reverse",isOpen:!this.state.collapsed,navbar:!0,children:Object(r.jsxs)("ul",{className:"navbar-nav flex-grow",children:[Object(r.jsx)(v.a,{children:Object(r.jsxs)(y.a,{tag:s.b,className:"text-dark",to:"/",children:[Object(r.jsx)("img",{src:"/img/icon/home.png",className:"logo-menu",alt:"Home"}),"Home"]})}),Object(r.jsx)(v.a,{children:Object(r.jsxs)(y.a,{tag:s.b,className:"text-dark",to:"/counter",children:[Object(r.jsx)("img",{src:"/img/icon/counter.png",className:"logo-menu",alt:"Counter"}),"Counter"]})}),Object(r.jsxs)(C.a,{title:"\u25a4KakaoAPI 3th Party",id:"nav-dropdown",children:[Object(r.jsx)(C.a.Item,{eventKey:"4.1",href:"/PHPSimplePack.php",children:"PHPSimplePack - kakao REST API"}),Object(r.jsx)(C.a.Item,{eventKey:"4.2",href:"/JAVASimplePack.php",children:"JAVASimplePack - kakao REST API"}),Object(r.jsx)(C.a.Divider,{}),Object(r.jsx)(C.a.Item,{eventKey:"4.3",href:"/kakaoJavaScriptSDK.html",children:"JavaScriptWrapper - Kakao JavaScript SDK"}),Object(r.jsx)(C.a.Divider,{}),Object(r.jsx)(C.a.Item,{eventKey:"4.4",href:"/map.html",children:"JavaScriptWrapper - Kakao Maps JavaScript SDK"}),Object(r.jsx)(C.a.Divider,{}),Object(r.jsx)(C.a.Item,{eventKey:"4.5",href:"https://kakao-tam.tistory.com/19",children:"ASP.NET (framework 4.5) MVC5 : OWIN katana base - kakao login"})]})]})})]})})})}}]),a}(o.Component);S.displayName=S.name;var _=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)(S,{}),Object(r.jsx)(u.a,{children:this.props.children})]})}}]),a}(o.Component);_.displayName=_.name;var I=a(4),T=a(32),P=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsxs)(T.a,{children:[Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char13.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao.php",children:"\uce74\uce74\uc624 \ub85c\uadf8\uc778"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaologin/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/2",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakao.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao.php",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char11.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao_talk_channel.php",children:"\uce74\uce74\uc624\ud1a1 \ucc44\ub110"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaotalk-channel/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/14",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakao_talk_channel.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao_talk_channel.php",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char12.jpg",className:"logo2"}),"\uce74\uce74\uc624 \uc2f1\ud06c"]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaosync/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/16",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://googsu.com",children:"[Sample Site]"})]})]})]}),Object(r.jsxs)(T.a,{children:[Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char22.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakaoJavaScriptSDK.html",children:"\uce74\uce74\uc624 \uc2a4\ud1a0\ub9ac"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaostory/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/5",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",href:"/kakao_story.html",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForJavaScript/blob/main/04.kakao_story.html",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char21.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao_talk_social.php",children:"\uce74\uce74\uc624\ud1a1 \uc18c\uc15c"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaotalk-social/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/3",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakao_talk_social.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHP-REST-API-/blob/main/kakao_talk_social.php",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char23.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao_talk_message.php",children:"\uce74\uce74\uc624\ud1a1 \uba54\uc138\uc9c0"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/message/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/4",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakao_talk_message.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForJavaScript/blob/main/03.kakao_talk_message.html",children:"[Github]"})]})]})]}),Object(r.jsxs)(T.a,{children:[Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char31.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/daum_search.php",children:"Daum \uac80\uc0c9"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaostory/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/8",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/daum_search.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/DaumSearch/blob/main/daum_search.php",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char32.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/map.html",children:"\uce74\uce74\uc624 \ub9f5"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://apis.map.kakao.com/",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/11",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/map.html",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/MapAndLocal/blob/main/map.html",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char12.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao_local.php",children:"\uce74\uce74\uc624 \ub85c\uceec"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/message/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/12",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakao_local.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/MapAndLocal/blob/main/kakao_local.php",children:"[Github]"})]})]})]}),Object(r.jsxs)(T.a,{children:[Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char13.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao.php",children:"\uce74\uce74\uc624 \ud398\uc774"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaopay/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHPSimplePack",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char11.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakao_talk_channel.php",children:"\uce74\uce74\uc624 \ub0b4\ube44"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/kakaonavi/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHPSimplePack",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char12.jpg",className:"logo2"}),"\uce74\uce74\uc624 i \uc624\ud508\ube4c\ub354"]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsx)(I.a.Footer,{})]})]}),Object(r.jsxs)(T.a,{children:[Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char22.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakaoVision.php",children:"\uce74\uce74\uc624 \ube44\uc804"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/vision/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/38",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakaoVision.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHPSimplePack",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char21.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakaoPose.php",children:"\uce74\uce74\uc624 \ud3ec\uc988"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/pose/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/39",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakaoPose.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHPSimplePack",children:"[Github]"})]})]}),Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char23.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/kakaoTranslate.php",children:"\uce74\uce74\uc624 \ubc88\uc5ed"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://developers.kakao.com/docs/latest/ko/translate/common",children:"[KakaoGuide]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/40",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/kakaoTranslate.php",children:"[Sample]"}),"\xa0",Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://github.com/kakao-tam/KakaoAPIForPHPSimplePack",children:"[Github]"})]})]})]}),Object(r.jsx)(T.a,{children:Object(r.jsxs)(I.a,{children:[Object(r.jsxs)(I.a.Body,{children:[Object(r.jsxs)(I.a.Title,{children:[Object(r.jsx)(I.a.Img,{variant:"top",src:"/img/char32.jpg",className:"logo2"}),Object(r.jsx)("a",{href:"/try1_map.html",children:"\uce74\uce74\uc624 \ub9f5 \uc751\uc6a9"})]}),Object(r.jsx)(I.a.Text,{})]}),Object(r.jsxs)(I.a.Footer,{children:[Object(r.jsx)("a",{target:"_blank",rel:"noopener noreferrer",href:"https://kakao-tam.tistory.com/57",children:"[Blog]"}),"\xa0",Object(r.jsx)("a",{href:"/try1_map.html",children:"[Sample]"}),"\xa0"]})]})})]})}}]),a}(o.Component);P.displayName=P.name;var B=a(35),N=a(44),F=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(e){var r;return Object(h.a)(this,a),(r=t.call(this,e)).state={query:"test",data:[],loading:!0},r}return Object(d.a)(a,[{key:"componentDidMount",value:function(){this.populateWeatherData("test")}},{key:"handleChange",value:function(e){this.setState(Object(B.a)({},e.target.name,e.target.value))}},{key:"render",value:function(){var e=this,t=this.state.loading?Object(r.jsx)("div",{children:Object(r.jsx)(N.a,{animation:"border",role:"status",children:Object(r.jsx)("span",{className:"sr-only",children:"Loading..."})})}):a.renderForecastsTable(this.state.data.documents);return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{id:"tabelLabel",children:"Daum Search"}),Object(r.jsx)("p",{children:"https://dapi.kakao.com/v2/search/web"}),Object(r.jsxs)("form",{className:"form-signin",onSubmit:function(){return e.populateWeatherData(e.state.query)},children:[Object(r.jsx)("input",{type:"text",id:"inputquery",className:"form-control",name:"query",onChange:function(){return e.handleChange}}),Object(r.jsx)("button",{className:"btn btn-lg btn-primary btn-block",type:"submit",children:"Search"})]}),t]})}},{key:"populateWeatherData",value:function(){var e=Object(j.a)(l.a.mark((function e(t){var a,r;return l.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,fetch("/api/kakao/daumSearch/web?query="+t);case 2:return a=e.sent,e.next=5,a.json();case 5:r=e.sent,this.setState({query:t,data:r,loading:!1});case 7:case"end":return e.stop()}}),e,this)})));return function(t){return e.apply(this,arguments)}}()}],[{key:"renderForecastsTable",value:function(e){return Object(r.jsx)("table",{className:"table table-striped","aria-labelledby":"tabelLabel",children:Object(r.jsx)("tbody",{children:e.map((function(e){return Object(r.jsx)("tr",{children:Object(r.jsxs)("td",{children:[Object(r.jsx)("a",{href:e.url,alt:e.title,children:Object(r.jsx)("div",{dangerouslySetInnerHTML:{__html:e.title}})}),Object(r.jsx)("div",{dangerouslySetInnerHTML:{__html:e.contents}}),Object(r.jsx)("p",{children:e.datetime})]})},e.datetime)}))})})}}]),a}(o.Component);F.displayName=F.name;var A=a(36),K=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){var e;return Object(h.a)(this,a),(e=t.call(this)).state={currentCount:0},e}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{children:"Counter"}),Object(r.jsxs)("div",{children:[Object(r.jsx)("h4",{children:"\uc5f0\ub3c4\ubcc4 REST API \ubb38\uc758 \uc218 "}),Object(r.jsx)(A.Bar,{data:{labels:["2019","2020"],datasets:[{label:"REST API Category",backgroundColor:"rgba(255,99,132,0.2)",borderColor:"rgba(255,99,132,1)",borderWidth:1,hoverBackgroundColor:"rgba(255,99,132,0.4)",hoverBorderColor:"rgba(255,99,132,1)",data:[495,768]}]},width:100,height:50,options:{maintainAspectRatio:!1}})]}),Object(r.jsxs)("div",{children:[Object(r.jsx)("h4",{children:"\uc6d4\ubcc4 REST API \ubb38\uc758 \uc218"}),Object(r.jsx)(A.Line,{data:{labels:["1","2","3","4","5","6","7","8","9","10","11","12"],datasets:[{label:"REST API Category 2020",fill:!1,lineTension:.1,backgroundColor:"rgba(75,192,192,0.4)",borderColor:"rgba(75,192,192,1)",borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:"rgba(75,192,192,1)",pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:"rgba(75,192,192,1)",pointHoverBorderColor:"rgba(220,220,220,1)",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[36,70,80,77,66,50,71,43,59,67,75,50]},{label:"REST API Category 2019",fill:!1,lineTension:.1,backgroundColor:"rgba(255,99,132,1)",borderColor:"rgba(255,99,132,1)",borderCapStyle:"butt",borderDash:[],borderDashOffset:0,borderJoinStyle:"miter",pointBorderColor:"rgba(75,192,192,1)",pointBackgroundColor:"#fff",pointBorderWidth:1,pointHoverRadius:5,pointHoverBackgroundColor:"rgba(75,192,192,1)",pointHoverBorderColor:"rgba(220,220,220,1)",pointHoverBorderWidth:2,pointRadius:1,pointHitRadius:10,data:[19,17,38,45,26,32,50,63,44,48,75,38]}]}})]}),Object(r.jsxs)("div",{children:[Object(r.jsx)("h2",{children:"\ud0a4\uc6cc\ub4dc\ubcc4 REST API \ubb38\uc758 \uc218"}),Object(r.jsx)(A.Doughnut,{data:{labels:["topic","api","rest-api","redirect-uri","koe006","10\uac74 \uc774\ud558 \ud0a4\uc6cc\ub4dc","1\uac74 \ud0a4\uc6cc\ub4dc"],datasets:[{data:[506,114,71,31,20,151,335],backgroundColor:["#FF6384","#36A2EB","#FFCE56","#ccffcc","#ccffdd","#ccffff","#ccffaa"],hoverBackgroundColor:["#FF6384","#36A2EB","#FFCE56","#ccffcc","#ccffdd","#ccffff","#ccffaa"]}]}})]})]})}}]),a}(o.Component);K.displayName=K.name;a(208);var L=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(e){var r;return Object(h.a)(this,a),(r=t.call(this,e)).handleSubmit=function(e){var t={email:r.state.email,password:r.state.password};fetch("api/customer/login",{method:"POST",headers:{Accept:"application/json","Content-Type":"application/json"},body:JSON.stringify(t)}).then((function(e){return e.json()})).then((function(e){r.setState({data:e,isLoading:!1}),console.log(e),"success"===e.result?(w.setUserLogin("true"),console.log(w.isLogin()),r.props.history.push("/")):alert(e.message)})).catch((function(e){return r.setState({error:e,isLoading:!1})})),e.preventDefault()},r.state={email:"",password:"",data:[],isLoading:!0},r.handleChange=r.handleChange.bind(Object(O.a)(r)),r}return Object(d.a)(a,[{key:"handleChange",value:function(e){this.setState(Object(B.a)({},e.target.name,e.target.value))}},{key:"bindClick",value:function(e){alert(e)}},{key:"render",value:function(){return Object(r.jsxs)("div",{className:"text-center",children:[Object(r.jsx)("h1",{children:"Kakao Login"}),Object(r.jsx)("a",{href:"/api/kakao/login",children:Object(r.jsx)("img",{src:"//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg",alt:"login",width:"222"})})]})}}]),a}(o.Component),E=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(e){var r;return Object(h.a)(this,a),(r=t.call(this,e)).handleSubmit=function(e){var t={email:r.state.email,password:r.state.password,passwordConfirm:r.state.passwordConfirm};t.password===t.passwordConfirm?(fetch("api/customer/signup",{method:"POST",headers:{Accept:"application/json","Content-Type":"application/json"},body:JSON.stringify(t)}).then((function(e){return e.json()})).then((function(e){r.setState({data:e,isLoading:!1}),console.log(e),"success"===e.result?r.props.history.push("/"):alert(e.message)})).catch((function(e){return r.setState({error:e,isLoading:!1})})),e.preventDefault()):alert("Your password and confirmation password do not match.")},r.state={email:"",password:"",passwordConfirm:"",data:[],isLoading:!0},r.handleChange=r.handleChange.bind(Object(O.a)(r)),r}return Object(d.a)(a,[{key:"handleChange",value:function(e){this.setState(Object(B.a)({},e.target.name,e.target.value))}},{key:"render",value:function(){return Object(r.jsxs)("div",{className:"text-center",children:[Object(r.jsx)("h1",{children:"SignUp"}),Object(r.jsxs)("form",{className:"form-signin",onSubmit:this.handleSubmit,children:[Object(r.jsx)("img",{src:"/img/icon/googsu.png",alt:"Googsu.com SignUp"}),Object(r.jsx)("hr",{}),Object(r.jsx)("label",{htmlFor:"inputEmail",className:"sr-only",children:"Email address"}),Object(r.jsx)("input",{type:"email",id:"inputEmail",className:"form-control",placeholder:"Email address",required:"required",autoFocus:"autoFocus",name:"email",onChange:this.handleChange}),Object(r.jsx)("label",{htmlFor:"inputPassword",className:"sr-only",children:"Password"}),Object(r.jsx)("input",{type:"password",id:"inputPassword",className:"form-control",placeholder:"Password",required:"required",name:"password",onChange:this.handleChange}),Object(r.jsx)("label",{htmlFor:"inputPasswordConfirm",className:"sr-only",children:"Password Confirm"}),Object(r.jsx)("input",{type:"password",id:"inputPasswordConfirm",className:"form-control",placeholder:"Password Confirm",required:"required",name:"passwordConfirm",onChange:this.handleChange}),Object(r.jsx)("button",{className:"btn btn-lg btn-primary btn-block",type:"submit",children:"Sign up"})]})]})}}]),a}(o.Component);E.displayName=E.name;a(51);var R=a(23),G=a(21),D=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{id:"tabelLabel",children:"Board List"}),Object(r.jsxs)(R.a,{children:[Object(r.jsx)(R.a.Item,{children:Object(r.jsx)("a",{href:"/board-read",children:"Cras justo odio"})}),Object(r.jsx)(R.a.Item,{children:Object(r.jsx)("a",{href:"/board-read",children:"Dapibus ac facilisis in"})}),Object(r.jsx)(R.a.Item,{children:Object(r.jsx)("a",{href:"/board-read",children:"Morbi leo risus"})}),Object(r.jsx)(R.a.Item,{children:Object(r.jsx)("a",{href:"/board-read",children:"Porta ac consectetur ac"})}),Object(r.jsx)(R.a.Item,{children:Object(r.jsx)("a",{href:"/board-read",children:"Vestibulum at eros"})})]}),Object(r.jsx)("p",{}),Object(r.jsxs)("div",{className:"div-board-button",children:[Object(r.jsx)(G.a,{href:"/board-write",variant:"outline-primary",children:"Write"})," "]})]})}}]),a}(o.Component),H=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{id:"tabelLabel",children:"Cras justo odio"}),Object(r.jsx)(R.a,{children:Object(r.jsx)(R.a.Item,{children:"React-Bootstrap replaces the Bootstrap JavaScript. Each component has been built from scratch as a true React component, without unneeded dependencies like jQuery. As one of the oldest React libraries, React-Bootstrap has evolved and grown alongside React, making it an excellent choice as your UI foundation. Built with compatibility in mind, we embrace our bootstrap core and strive to be compatible with the world's largest UI ecosystem. By relying entirely on the Bootstrap stylesheet, React-Bootstrap just works with the thousands of Bootstrap themes you already love. The React component model gives us more control over form and function of each component. Each component is implemented with accessibility in mind. The result is a set of accessible-by-default components, over what is possible from plain Bootstrap."})}),Object(r.jsx)("p",{}),Object(r.jsxs)("div",{className:"div-board-button",children:[Object(r.jsx)(G.a,{href:"/board-update",variant:"outline-primary",children:"Update"})," ",Object(r.jsx)(G.a,{variant:"outline-danger",children:"Delete"})," "]})]})}}]),a}(o.Component),W=a(17),q=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsx)("div",{children:Object(r.jsxs)(W.a,{children:[Object(r.jsxs)(W.a.Group,{controlId:"exampleForm.ControlInput1",children:[Object(r.jsx)(W.a.Label,{children:"Title"}),Object(r.jsx)(W.a.Control,{type:"test",placeholder:"title"})]}),Object(r.jsxs)(W.a.Group,{controlId:"exampleForm.ControlTextarea1",children:[Object(r.jsx)(W.a.Label,{children:"Contents"}),Object(r.jsx)(W.a.Control,{as:"textarea",rows:"10"})]}),Object(r.jsx)("p",{}),Object(r.jsxs)("div",{className:"div-board-button",children:[Object(r.jsx)(G.a,{variant:"outline-primary",children:"Write"})," "]})]})})}}]),a}(o.Component),J=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsx)("div",{children:Object(r.jsxs)(W.a,{children:[Object(r.jsxs)(W.a.Group,{controlId:"exampleForm.ControlInput1",children:[Object(r.jsx)(W.a.Label,{children:"Title"}),Object(r.jsx)(W.a.Control,{type:"test",placeholder:"Cras justo odio"})]}),Object(r.jsxs)(W.a.Group,{controlId:"exampleForm.ControlTextarea1",children:[Object(r.jsx)(W.a.Label,{children:"Contents"}),Object(r.jsx)(W.a.Control,{as:"textarea",rows:"10",placeholder:"React-Bootstrap replaces the Bootstrap JavaScript. Each component has been built from scratch as a true React component, without unneeded dependencies like jQuery.\r\nAs one of the oldest React libraries, React-Bootstrap has evolved and grown alongside React, making it an excellent choice as your UI foundation.\r Built with compatibility in mind, we embrace our bootstrap core and strive to be compatible with the world's largest UI ecosystem.\r\nBy relying entirely on the Bootstrap stylesheet, React-Bootstrap just works with the thousands of Bootstrap themes you already love.\r The React component model gives us more control over form and function of each component.\r\nEach component is implemented with accessibility in mind. The result is a set of accessible-by-default components, over what is possible from plain Bootstrap."})]}),Object(r.jsx)("p",{}),Object(r.jsxs)("div",{className:"div-board-button",children:[Object(r.jsx)(G.a,{variant:"outline-primary",children:"Update"})," "]})]})})}}]),a}(o.Component),U=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){var e;Object(h.a)(this,a);return(e=t.call(this)).state={query:"\uc804\ubd81 \uc0bc\uc131\ub3d9 100",data:[],loading:!0,coord2regioncode:{x:"127.1086228",y:"37.4012191",data:[],loading:!0}},e}return Object(d.a)(a,[{key:"componentDidMount",value:function(){this.populateWeatherData(this.state.query),this.renderCoord2regioncode(this.state.coord2regioncode.x,this.state.coord2regioncode.y)}},{key:"render",value:function(){var e=this.state.loading?Object(r.jsx)("div",{children:Object(r.jsx)(N.a,{animation:"border",role:"status",children:Object(r.jsx)("span",{className:"sr-only",children:"Loading..."})})}):a.renderForecastsTable(this.state.data.documents),t=this.state.coord2regioncode.loading?Object(r.jsx)("div",{children:Object(r.jsx)(N.a,{animation:"border",role:"status",children:Object(r.jsx)("span",{className:"sr-only",children:"Loading..."})})}):a.renderCoord2regioncode(this.state.coord2regioncode.data.documents);return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{children:"\uc8fc\uc18c \uac80\uc0c9"}),Object(r.jsx)("p",{children:'curl -v -X GET "https://dapi.kakao.com/v2/local/search/address.json" \\ --data-urlencode "query=\uc804\ubd81 \uc0bc\uc131\ub3d9 100" \\ -H "Authorization: KakaoAK REST_API_KEY"'}),e,Object(r.jsx)("h2",{children:"\uc88c\ud45c\ub85c \ud589\uc815\uad6c\uc5ed\uc815\ubcf4 \ubc1b\uae30"}),Object(r.jsx)("p",{children:'curl -v -X GET "https://dapi.kakao.com/v2/local/geo/coord2regioncode.json?x=127.1086228&y=37.4012191" \\ -H "Authorization: KakaoAK REST_API_KEY"'}),t]})}},{key:"populateWeatherData",value:function(){var e=Object(j.a)(l.a.mark((function e(t){var a,r;return l.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,fetch("/api/kakao/addressSearch/address?query="+t);case 2:return a=e.sent,e.next=5,a.json();case 5:r=e.sent,this.setState({query:t,data:r,loading:!1});case 7:case"end":return e.stop()}}),e,this)})));return function(t){return e.apply(this,arguments)}}()},{key:"renderCoord2regioncode",value:function(){var e=Object(j.a)(l.a.mark((function e(t,a){var r,o,n;return l.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,fetch("/api/kakao/addressSearch/coord2regioncode?x="+t+"&y="+a);case 2:return r=e.sent,e.next=5,r.json();case 5:o=e.sent,n={x:t,y:a,data:o,loading:!1},this.setState({coord2regioncode:n});case 8:case"end":return e.stop()}}),e,this)})));return function(t,a){return e.apply(this,arguments)}}()}],[{key:"renderForecastsTable",value:function(e){return Object(r.jsx)("table",{className:"table table-striped","aria-labelledby":"tabelLabel",children:Object(r.jsx)("tbody",{children:e.map((function(e){return Object(r.jsx)("tr",{children:Object(r.jsxs)("td",{children:[Object(r.jsx)("p",{children:e.address.address_name}),Object(r.jsxs)("p",{children:["x: ",e.x," / y: ",e.y]})]})})}))})})}},{key:"renderCoord2regioncode",value:function(e){return Object(r.jsx)("table",{className:"table table-striped","aria-labelledby":"tabelLabel",children:Object(r.jsx)("tbody",{children:e.map((function(e){return Object(r.jsx)("tr",{children:Object(r.jsxs)("td",{children:[Object(r.jsx)("p",{children:e.address_name}),Object(r.jsxs)("p",{children:["x: ",e.x," / y: ",e.y]})]})})}))})})}}]),a}(o.Component),M=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{children:"title"}),Object(r.jsx)("p",{})]})}}]),a}(o.Component),V=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{children:"title"}),Object(r.jsx)("p",{})]})}}]),a}(o.Component),z=function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){return Object(h.a)(this,a),t.apply(this,arguments)}return Object(d.a)(a,[{key:"render",value:function(){return Object(r.jsxs)("div",{children:[Object(r.jsx)("h1",{children:"title"}),Object(r.jsx)("p",{})]})}}]),a}(o.Component),Y=(a(210),function(e){Object(b.a)(a,e);var t=Object(p.a)(a);function a(){var e;Object(h.a)(this,a);for(var r=arguments.length,o=new Array(r),n=0;n<r;n++)o[n]=arguments[n];return(e=t.call.apply(t,[this].concat(o))).initializeUserInfo=Object(j.a)(l.a.mark((function e(){return l.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:case"end":return e.stop()}}),e)}))),e}return Object(d.a)(a,[{key:"componentDidMount",value:function(){this.initializeUserInfo()}},{key:"render",value:function(){w.isLogin();return Object(r.jsxs)(_,{children:[Object(r.jsx)(m.a,{exact:!0,path:"/",component:P}),Object(r.jsx)(m.a,{path:"/counter",component:K}),Object(r.jsx)(m.a,{path:"/fetch-data",component:F}),Object(r.jsx)(m.a,{path:"/login",component:L}),Object(r.jsx)(m.a,{path:"/signup",component:E}),Object(r.jsx)(m.a,{path:"/board-list",component:D}),Object(r.jsx)(m.a,{path:"/board-read",component:H}),Object(r.jsx)(m.a,{path:"/board-write",component:q}),Object(r.jsx)(m.a,{path:"/board-update",component:J}),Object(r.jsx)(m.a,{path:"/addressSearch",component:U}),Object(r.jsx)(m.a,{path:"/vision",component:M}),Object(r.jsx)(m.a,{path:"/pose",component:V}),Object(r.jsx)(m.a,{path:"/translate",component:z})]})}}]),a}(o.Component));Y.displayName=Y.name;var Q=Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));function X(e){navigator.serviceWorker.register(e).then((function(e){e.onupdatefound=function(){var t=e.installing;t.onstatechange=function(){"installed"===t.state&&(navigator.serviceWorker.controller?console.log("New content is available; please refresh."):console.log("Content is cached for offline use."))}}})).catch((function(e){console.error("Error during service worker registration:",e)}))}var $=document.getElementsByTagName("base")[0].getAttribute("href"),Z=document.getElementById("root");c.a.render(Object(r.jsx)(s.a,{basename:$,children:Object(r.jsx)(Y,{})}),Z),function(){if("serviceWorker"in navigator){if(new URL("",window.location).origin!==window.location.origin)return;window.addEventListener("load",(function(){var e="".concat("","/service-worker.js");Q?function(e){fetch(e).then((function(t){404===t.status||-1===t.headers.get("content-type").indexOf("javascript")?navigator.serviceWorker.ready.then((function(e){e.unregister().then((function(){window.location.reload()}))})):X(e)})).catch((function(){console.log("No internet connection found. App is running in offline mode.")}))}(e):X(e)}))}}()},51:function(e,t,a){}},[[211,1,2]]]);
//# sourceMappingURL=main.ad474488.chunk.js.map