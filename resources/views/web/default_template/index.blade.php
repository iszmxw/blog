<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>��ҳ_׷��С�ѵĲ��� - Ŭ�������Լ���Ҫ������</title>
<meta name="keywords" content="���˲���,׷��С�ѵĲ���,���˲���ģ��,׷��С��" />
<meta name="description" content="׷��С�ѵĲ��ͣ���һ��վ��webǰ�����֮·��Ů����Ա������վ���ṩ���˲���ģ�������Դ���صĸ���ԭ����վ��" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{asset('style/web/default_template/css/base.css')}}" rel="stylesheet">
<link href="{{asset('style/web/default_template/css/index.css')}}" rel="stylesheet">
<link href="{{asset('style/web/default_template/css/m.css')}}" rel="stylesheet">
<script src="{{asset('style/web/default_template/js/jquery.min.js')}}"></script>
<script src="{{asset('style/web/default_template/js/jquery.easyfader.min.js')}}"></script>
<!--[if lt IE 9]>
  <script src="{{asset('style/web/default_template/js/modernizr.js')}}"></script>
<![endif]-->
<script>
window.onload = function ()
{
	var oH2 = document.getElementsByTagName("h2")[0];
	var oUl = document.getElementsByTagName("ul")[0];
	oH2.onclick = function ()
	{
		var style = oUl.style;
		style.display = style.display == "block" ? "none" : "block";
		oH2.className = style.display == "block" ? "open" : ""
	}
}
</script>
</head>
<body>
<header>
  <div id="mnav">
    <h2><span class="navicon"></span></h2>
    <ul>
      <li><a href="index.html">��վ��ҳ</a></li>
      <li><a href="about.html">������</a></li>
      <li><a href="share.html">ģ�����</a></li>
      <li><a href="list.html">ѧ��ֹ��</a></li>
      <li><a href="list.html">������</a></li>
      <li><a href="link.html">���͵���</a></li>
      <li><a href="gbook.html">����</a></li>
    </ul>
  </div>
  <div class="topnav">
    <nav>
      <ul>
      <li><a href="index.html">��վ��ҳ</a></li>
      <li><a href="about.html">������</a></li>
      <li><a href="share.html">ģ�����</a></li>
      <li><a href="list.html">ѧ��ֹ��</a></li>
      <li><a href="list.html">������</a></li>
      <li><a href="link.html">���͵���</a></li>
      <li><a href="gbook.html">����</a></li>
      </ul>
    </nav>
  </div>
</header>
<article>
  <div class="banner">
    <div id="sucaihuo" class="fader"> <img class="slide" src={{url('style/web/default_template/images')}}/banner01.jpg"> <img class="slide" src={{url('style/web/default_template/images')}}/banner02.jpg"> <img class="slide" src={{url('style/web/default_template/images')}}/banner03.jpg">
      <div class="fader_controls">
        <div class="page prev" data-target="prev">&lsaquo;</div>
        <div class="page next" data-target="next">&rsaquo;</div>
        <ul class="pager_list">
        </ul>
      </div>
    </div>
    <script>
$(function() {
	$('#sucaihuo').easyFader();
});
</script>
  </div>
  <div class="blog" >
    <figure>
      <ul>
        <a href="/"><img src={{url('style/web/default_template/images')}}/mb01.jpg"><span>���ظ��˲���ģ��</span></a>
      </ul>
      <p><a href="/">�ƾ߹�˾���ŷ��PSD��Ƹ�</a></p>
      <figcaption>��ģ��ΪPSD��Ƹ壬���ŷ����ҳ��Ҫͻ����Ʒ���Լ���˾��顣�ֻ����Ϊͷ������ͼƬ������Ƚ��ر�html����������һ��һ����Ч��������˵�Ա��и���ť...</figcaption>
    </figure>
    <figure>
      <ul>
        <a href="/"><img src={{url('style/web/default_template/images')}}/mb02.jpg"><span>���ظ��˲���ģ��</span></a>
      </ul>
      <p><a href="/">���˲���ģ��ŵ�ϵ��֮��������ī..</a></p>
      <figcaption>һ�����ĸ�ҳ�棬��ҳ��ͼ���б�ͼƬ�б��������ݡ���ģ����Ϊ�й��ŵ���ɽˮ��ī���ɾ�һ������ī��ҳ����ҳ��ƽ�Ϊ�򵥣�ͻ�������ص㡣ͼ��...</figcaption>
    </figure>
    <figure>
      <ul>
        <a href="/"><img src={{url('style/web/default_template/images')}}/mb03.jpg"><span>���ظ��˲���ģ��</span></a>
      </ul>
      <p><a href="/">�����ļ�</a></p>
      <figcaption>������ӵ�����ĽŲ������ұ����ҵļ롣�������Ѽ��������ٲ�����һ˿һ����˼��ʱ�������Ҿ����ص��ҵļ��ڣ��Ի���Ϊ˯齣��Ա���Ϊ������������Ψһ��������</figcaption>
    </figure>
    <figure>
      <ul>
        <a href="/"><img src={{url('style/web/default_template/images')}}/mb04.jpg"><span>���ظ��˲���ģ��</span></a>
      </ul>
      <p><a href="/">�����ļ�</a></p>
      <figcaption>������ӵ�����ĽŲ������ұ����ҵļ롣�������Ѽ��������ٲ�����һ˿һ����˼��ʱ�������Ҿ����ص��ҵļ��ڣ��Ի���Ϊ˯齣��Ա���Ϊ������������Ψһ��������</figcaption>
    </figure>
  </div>
  <div class="newblogs">
    <h2 class="hometitle">��������</h2>
    <ul>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/jstt/css3/2018-03-26/812.html" title="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���"><img src={{url('style/web/default_template/images')}}/t01.jpg" alt="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���" /></a></span>
          <p>�۹�cms�б�ҳͼ��չʾ��������ҳͼ��չʾ�����ʹ��ȫͼ�����֣��༭�����Ƚ��鷳����Ϊÿһƪ���£��㶼�û�ʱ��ȥ��ͼ�����ԣ�����ʹ�����·�����ʵ�֡�</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div>
        <div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">CSS3|Html5</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b01.png"  /></a></span>
          <p>��ҳ��ƺò��ÿ�,��ɫ����ӹ����Ҫ����λ��,���Թ�����ɫ�Ĵ��似���Լ�ԭ��,����ÿһ��Ҫѧϰwebǰ����Ƶ�������˵,�ⶼ��һ����Ҫ��ѧϰ����.�ڱ��̳������ǽ��������...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div>
        <div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></a></span>
          <p>"ʱ�������ô�ɿ�,ʹ�ҵ�С���۶��ﲻֻ���ż�,���б���.��һ��,�ҷ�ѧ�ؼ�,����̫������ɽ��,���¾���˵:"��Ҫ��̫������ػؼ�."�ҿ񱼻�ȥ,վ��ͥԺǰ������ʱ��,����̫����¶�Ű����,�Ҹ��˵���Ծ����,��һ������Ӯ��̫��.�Ժ��Ҿ�ʱ������������Ϸ,��ʱ��̫������...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div>
        <div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><!--<span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></a></span>-->
          <p>ǰ��ʱ��سɶ�,ȥ���˼���δ��������.һ����˷�,�����Ҽұ���ȥ��.������Ϊʲô��ô�ö���û�д���Ҫ����,��˵,����һ��ʱ�仼��������֢,�ܳ���ʱ����߳���,��������ô˵,�Ҷ��ܾ���!��������ԭ��,�ɼ���������ֹ������,�ұ㲻����������.��������������˵.��ʵ��Ҫ��ԭ����Դ���ڹ����ͼ�ͥ,����ѹ����,ÿ��ĳ������,�ϼ���ͣ�Ĵ�,�����������ü���ͨ���İ�ҹ...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div>
        <div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/t02.jpg"  /></a></span>
          <p>���ڸձ�ҵ��ѧ����˵����ѧϰ����վ������һ��֮������򵥵������޷Ǿ���ѧ��html��css����ǰ�����һƪ���¡����Ҫѧϰwebǰ�˿�������Ҫѧϰʲô����������㻹��֪��������֣�����ϸ�Ķ�....7���ʱ�䣬������û������ģ���Ȼ����������ĵĻ���...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div>
        <div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/jstt/css3/2018-03-26/812.html" title="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���"><img src={{url('style/web/default_template/images')}}/t01.jpg" alt="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���" /></a></span>
          <p>�۹�cms�б�ҳͼ��չʾ��������ҳͼ��չʾ�����ʹ��ȫͼ�����֣��༭�����Ƚ��鷳����Ϊÿһƪ���£��㶼�û�ʱ��ȥ��ͼ�����ԣ�����ʹ�����·�����ʵ�֡�</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">CSS3|Html5</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b01.png"  /></a></span>
          <p>��ҳ��ƺò��ÿ�,��ɫ����ӹ����Ҫ����λ��,���Թ�����ɫ�Ĵ��似���Լ�ԭ��,����ÿһ��Ҫѧϰwebǰ����Ƶ�������˵,�ⶼ��һ����Ҫ��ѧϰ����.�ڱ��̳������ǽ��������...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></a></span>
          <p>"ʱ�������ô�ɿ�,ʹ�ҵ�С���۶��ﲻֻ���ż�,���б���.��һ��,�ҷ�ѧ�ؼ�,����̫������ɽ��,���¾���˵:"��Ҫ��̫������ػؼ�."�ҿ񱼻�ȥ,վ��ͥԺǰ������ʱ��,����̫����¶�Ű����,�Ҹ��˵���Ծ����,��һ������Ӯ��̫��.�Ժ��Ҿ�ʱ������������Ϸ,��ʱ��̫������...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><!--<span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></a></span>-->
          <p>ǰ��ʱ��سɶ�,ȥ���˼���δ��������.һ����˷�,�����Ҽұ���ȥ��.������Ϊʲô��ô�ö���û�д���Ҫ����,��˵,����һ��ʱ�仼��������֢,�ܳ���ʱ����߳���,��������ô˵,�Ҷ��ܾ���!��������ԭ��,�ɼ���������ֹ������,�ұ㲻����������.��������������˵.��ʵ��Ҫ��ԭ����Դ���ڹ����ͼ�ͥ,����ѹ����,ÿ��ĳ������,�ϼ���ͣ�Ĵ�,�����������ü���ͨ���İ�ҹ...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/t02.jpg"  /></a></span>
          <p>���ڸձ�ҵ��ѧ����˵����ѧϰ����վ������һ��֮������򵥵������޷Ǿ���ѧ��html��css����ǰ�����һƪ���¡����Ҫѧϰwebǰ�˿�������Ҫѧϰʲô����������㻹��֪��������֣�����ϸ�Ķ�....7���ʱ�䣬������û������ģ���Ȼ����������ĵĻ���...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><!--<span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></a></span>-->
          <p>ǰ��ʱ��سɶ�,ȥ���˼���δ��������.һ����˷�,�����Ҽұ���ȥ��.������Ϊʲô��ô�ö���û�д���Ҫ����,��˵,����һ��ʱ�仼��������֢,�ܳ���ʱ����߳���,��������ô˵,�Ҷ��ܾ���!��������ԭ��,�ɼ���������ֹ������,�ұ㲻����������.��������������˵.��ʵ��Ҫ��ԭ����Դ���ڹ����ͼ�ͥ,����ѹ����,ÿ��ĳ������,�ϼ���ͣ�Ĵ�,�����������ü���ͨ���İ�ҹ...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/t02.jpg"  /></a></span>
          <p>���ڸձ�ҵ��ѧ����˵����ѧϰ����վ������һ��֮������򵥵������޷Ǿ���ѧ��html��css����ǰ�����һƪ���¡����Ҫѧϰwebǰ�˿�������Ҫѧϰʲô����������㻹��֪��������֣�����ϸ�Ķ�....7���ʱ�䣬������û������ģ���Ȼ����������ĵĻ���...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">���˲���</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/jstt/css3/2018-03-26/812.html" title="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���"><img src={{url('style/web/default_template/images')}}/t01.jpg" alt="�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���" /></a></span>
          <p>�۹�cms�б�ҳͼ��չʾ��������ҳͼ��չʾ�����ʹ��ȫͼ�����֣��༭�����Ƚ��鷳����Ϊÿһƪ���£��㶼�û�ʱ��ȥ��ͼ�����ԣ�����ʹ�����·�����ʵ�֡�</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
      <li>
        <h3 class="blogtitle"><span><a href="/jstt/css3/" title="css3" target="_blank"  class="classname">CSS3|Html5</a></span><a href="/jstt/css3/2018-03-26/812.html" target="_blank" >�۹�cms ��ҳ�����б���ͼ����ʹ��Ĭ��ͼƬ�ķ���</a></h3>
        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src={{url('style/web/default_template/images')}}/b01.png"  /></a></span>
          <p>��ҳ��ƺò��ÿ�,��ɫ����ӹ����Ҫ����λ��,���Թ�����ɫ�Ĵ��似���Լ�ԭ��,����ÿһ��Ҫѧϰwebǰ����Ƶ�������˵,�ⶼ��һ����Ҫ��ѧϰ����.�ڱ��̳������ǽ��������...</p>
        </div>
        <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">2018-03-26</span><span class="viewnum f_l">�����<a href="/">1429</a>��</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">�Ķ�ԭ��>></a></span></div><div class="line"></div>
      </li>
    </ul>
  </div>
  <div class="rbox">
    <div class="paihang">
      <h2 class="hometitle">ģ������</h2>
      <ul>
        <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">�����Ʒ����������С�׸��˲���ģ��30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/t02.jpg"  /></i>չʾ������ҳhtml������ҳ�沼�ָ�ʽ�򵥣�û�и��ӵı�����ɫ�ʾֲ���׺����̬�Ļõ�Ƭչʾ���л�������...</p>
        </li>
        <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> ���˲���ģ�壨2014�ݸ�Ѱ�Σ�30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b03.jpg"  /></i>2014��һ�桶�ݸ�Ѱ�Ρ����˲���ģ��򵥡����š����ء��������͵���רΪ������־��ȴ�ֵ͵��Ĳݸ�վ����...</p>
        </li>
        <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">��ɫ�ʸ�ʱ����html5���˲���ģ��30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b04.jpg"  /></i>��ɫʱ����html5���˲���ģ����ɫ�Ժ�ɫΪ��ɫ������˲�ɫ��Ϊ��ҳ��һ�����㣬����������ʾ��bannerͼƬ...</p>
        </li>
        <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">���²���ģ��ϵ��֮�����䡷Html30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b05.jpg"  /></i>Html5+css3���²���ģ�壬���⡶���䡷��ʹ��css3����ʵ����վ����Ч�������⡶���䡷,��Ϊ�ĸ���Ҫ���֣�...</p>
        </li>
        <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">��ɫHtml5���˲���ģ�����⡶��Ӱ���Ρ�30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></i>014�ڶ����ɫHtml5���˲���ģ�����⡶��Ӱ���Ρ����羫����Ӱ�ӻ����һ�����صĸо���һ�ż�Ӱͼ�ڰ�...</p>
        </li>
        <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">���Ҵ���Щ�꡿�ܽ���˲��;����������ꡭ30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/mb02.jpg"  /></i>���ʹ�������������򣬵������Ѿ��������ʱ���ˣ��������ʱ�䣬��Ц������Թ�����лڹ�����ִ�Ź���Ҳ...</p>
        </li>
      </ul>
    </div>
    <div class="paihang">
      <h2 class="hometitle">վ���Ƽ�</h2>
      <ul>
        <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">�����Ʒ����������С�׸��˲���ģ��30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/t02.jpg"  /></i>չʾ������ҳhtml������ҳ�沼�ָ�ʽ�򵥣�û�и��ӵı�����ɫ�ʾֲ���׺����̬�Ļõ�Ƭչʾ���л�������...</p>
        </li>
        <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> ���˲���ģ�壨2014�ݸ�Ѱ�Σ�30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b03.jpg"  /></i>2014��һ�桶�ݸ�Ѱ�Ρ����˲���ģ��򵥡����š����ء��������͵���רΪ������־��ȴ�ֵ͵��Ĳݸ�վ����...</p>
        </li>
        <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">��ɫ�ʸ�ʱ����html5���˲���ģ��30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b04.jpg"  /></i>��ɫʱ����html5���˲���ģ����ɫ�Ժ�ɫΪ��ɫ������˲�ɫ��Ϊ��ҳ��һ�����㣬����������ʾ��bannerͼƬ...</p>
        </li>
        <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">���²���ģ��ϵ��֮�����䡷Html30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b05.jpg"  /></i>Html5+css3���²���ģ�壬���⡶���䡷��ʹ��css3����ʵ����վ����Ч�������⡶���䡷,��Ϊ�ĸ���Ҫ���֣�...</p>
        </li>
        <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">��ɫHtml5���˲���ģ�����⡶��Ӱ���Ρ�30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/b06.jpg"  /></i>014�ڶ����ɫHtml5���˲���ģ�����⡶��Ӱ���Ρ����羫����Ӱ�ӻ����һ�����صĸо���һ�ż�Ӱͼ�ڰ�...</p>
        </li>
        <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">���Ҵ���Щ�꡿�ܽ���˲��;����������ꡭ30...</a></b>
          <p><i><img src={{url('style/web/default_template/images')}}/mb02.jpg"  /></i>���ʹ�������������򣬵������Ѿ��������ʱ���ˣ��������ʱ�䣬��Ц������Թ�����лڹ�����ִ�Ź���Ҳ...</p>
        </li>
      </ul>
    </div>
    <div class="links">
      <h2 class="hometitle">��������</h2>
      <ul>
        <li><a href="http://www.yangqq.com">׷��С�ѵĲ���</a></li>
        <li><a href="http://www.yangqq.com/download/">���˲���ģ��</a></li>
        <li><a href="http://www.yangqq.com/link.html">������˲���</a></li>
      </ul>
    </div>
    <div class="weixin">
      <h2 class="hometitle">�ٷ�΢��</h2>
      <ul>
        <img src={{url('style/web/default_template/images')}}/wx.jpg">
      </ul>
    </div>
  </div>
</article>
<footer>
  <p>Design by <a href="/">׷��С�ѵĲ���</a> <a href="/">��ICP��11002373��-1</a></p>
</footer>
</body>
</html>
