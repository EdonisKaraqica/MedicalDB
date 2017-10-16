 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    <title>Forms - Materialize</title>

     <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Materializecss compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <!--Import Materialize-Stepper CSS -->
      <link rel="stylesheet" href="stepper/materialize-stepper.min.css">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="materialize/js/materialize.min.js"></script>
      <script src="stepper/materialize-stepper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!--  Android 5 Chrome Color-->
    <meta name="theme-color" content="#EE6E73">
    <!-- CSS-->
    <link href="css/prism.css" rel="stylesheet">
    <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.en_US.tTM7YDy5Dl4.O/m=auth/exm=follow/rt=j/sv=1/d=1/ed=1/am=EQ/rs=AGLTcCOZtSYl3nUd_0XAF-iLiFiRaqZB4g/cb=gapi.loaded_1" async=""></script><script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.en_US.tTM7YDy5Dl4.O/m=follow/rt=j/sv=1/d=1/ed=1/am=EQ/rs=AGLTcCOZtSYl3nUd_0XAF-iLiFiRaqZB4g/cb=gapi.loaded_0" async=""></script><script async="" src="//www.google-analytics.com/analytics.js"></script><script id="twitter-wjs" src="http://platform.twitter.com/widgets.js"></script><script>
      window.liveSettings = {
        api_key: "a0b49b34b93844c38eaee15690d86413",
        picker: "bottom-right",
        detectlang: true,
        dynamic: true,
        autocollect: true
      };
    </script>
    <script src="//cdn.transifex.com/live.js"></script><style type="text/css">.txlive {display: none;}
</style>
    <link href="/extras/noUiSlider/nouislider.css" rel="stylesheet">
  <script type="text/javascript" src="http://cdn.transifex.com/a0b49b34b93844c38eaee15690d86413/latest/manifest.jsonp"></script><script id="_carbonads_projs" type="text/javascript" src="//srv.carbonads.net/ads/C6AILKT.json?segment=placement:materializecss&amp;callback=_carbonads_go"></script><style type="text/css">.txlive-langselector { position:fixed;z-index:999999;min-width: 120px;line-height:32px;background-color:rgba( 0,0,0,0.75 );box-shadow: 0 0 4px rgba( 0,0,0,0.3 );color: #fff;font-size: 14px;font-family: inherit; }.txlive-langselector * { margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;border-radius: 0;-moz-border-radius:0;-webkit-border-radius:0;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-border-radius:0;opacity:1; }.txlive-langselector.txlive-langselector-topleft { top:0;left:0;right:auto;bottom:auto;border-radius: 0 0 2px 0;-moz-border-radius: 0 0 2px 0;-webkit-border-radius: 0 0 2px 0; }.txlive-langselector.txlive-langselector-topright { top:0;left:auto;right:0;bottom:auto;border-radius: 0 2px 0 0;-moz-border-radius: 0 2px 0 0;-webkit-border-radius: 0 2px 0 0; }.txlive-langselector.txlive-langselector-bottomleft { top:auto;left:0;right:auto;bottom:0;border-radius: 0 2px 0 0;-moz-border-radius: 0 2px 0 0;-webkit-border-radius: 0 2px 0 0; }.txlive-langselector.txlive-langselector-bottomright { top:auto;left:auto;right:0;bottom:0;border-radius: 2px 0 0 0;-moz-border-radius: 2px 0 0 0;-webkit-border-radius: 2px 0 0 0; }.txlive-langselector .txlive-langselector-toggle { overflow: hidden;display: block;padding:2px 16px;width: 100%;height:36px;cursor:pointer;cursor:hand; }.txlive-langselector.txlive-langselector-topleft .txlive-langselector-toggle { overflow: hidden;display: block;border-top:2px solid #006f9f;padding:2px 16px;height:36px;line-height:32px;cursor:pointer;cursor:hand; }.txlive-langselector.txlive-langselector-topright .txlive-langselector-toggle { overflow: hidden;display: block;border-top:2px solid #006f9f;padding:2px 16px;height:36px;line-height:32px;cursor:pointer;cursor:hand; }.txlive-langselector.txlive-langselector-bottomleft .txlive-langselector-toggle { overflow: hidden;display: block;border-bottom:2px solid #006f9f;padding:2px 16px;height:36px;line-height:32px;cursor:pointer;cursor:hand; }.txlive-langselector.txlive-langselector-bottomright .txlive-langselector-toggle { overflow: hidden;display: block;border-bottom:2px solid #006f9f;padding:2px 16px;height:36px;line-height:32px;cursor:pointer;cursor:hand; }.txlive-langselector .txlive-langselector-current { float: left;padding: 0;max-width: 200px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis; }.txlive-langselector .txlive-langselector-marker { float: right;display: block;position:relative;width:0;height:0;margin-left:8px;margin-top: 13px;border-right:4px dashed transparent;border-left:4px dashed transparent;}.txlive-langselector-topright .txlive-langselector-marker,.txlive-langselector-topleft .txlive-langselector-marker {border-top:4px solid #fff;}.txlive-langselector-bottomright .txlive-langselector-marker,.txlive-langselector-bottomleft .txlive-langselector-marker {border-bottom:4px solid #fff;}.txlive-langselector-list { position:absolute;width: 100%;margin:0;padding:10px 0;display:none;background-color:#eaf1f7;box-shadow: 0 0 4px rgba( 0,0,0,0.3 );color:#666;list-style-type:none; }.txlive-langselector-list.txlive-langselector-list-opened { display:block; }.txlive-langselector-list > li {padding:0 16px;width:100%;overflow:hidden;white-space: nowrap;text-overflow:ellipsis;}.txlive-langselector-list > li:hover {background-color:#b0b9c1;color:#fff;cursor:pointer;cursor:hand;}.txlive-langselector-topright > .txlive-langselector-list {top:40px;left:auto;right:0;bottom:auto;border-bottom: 1px solid #f4f7f9;}.txlive-langselector-topleft > .txlive-langselector-list {top:40px;left:0;right:auto;bottom:auto;border-bottom: 1px solid #f4f7f9;}.txlive-langselector-bottomright > .txlive-langselector-list {top:auto;left:auto;right:0;bottom:40px;border-top: 1px solid #f4f7f9;}.txlive-langselector-bottomleft > .txlive-langselector-list {top:auto;left:0;right:auto;bottom:40px;border-top: 1px solid #f4f7f9;}.txlive-langselector-topright > .txlive-langselector-list,.txlive-langselector-bottomright > .txlive-langselector-list {border-radius: 2px 0 0 2px;-moz-border-radius: 2px 0 0 2px;-webkit-border-radius: 2px 0 0 2px;}.txlive-langselector-topleft > .txlive-langselector-list,.txlive-langselector-bottomleft > .txlive-langselector-list {border-radius: 0 2px 2px 0;-moz-border-radius: 0 2px 2px 0;-webkit-border-radius: 0 2px 2px 0;}</style><script type="text/javascript" charset="utf-8" async="" src="https://platform.twitter.com/js/button.1585b4acb6f096ed5e99939a36e1789e.js"></script></head>
      <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12 m6">
                <div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-d84fe2b0-6867-298a-df38-950cb43c7dc3" value="Choose your option"><ul id="select-options-d84fe2b0-6867-298a-df38-950cb43c7dc3" class="dropdown-content select-dropdown" style="width: 358.391px; position: absolute; top: -155px; left: 0px; display: none; opacity: 1;"><li class="disabled"><span>Choose your option</span></li><li class="active selected"><span>Option 1</span></li><li class=""><span>Option 2</span></li><li class=""><span>Option 3</span></li></ul><select data-select-id="d84fe2b0-6867-298a-df38-950cb43c7dc3" class="initialized">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select></div>
                <label>Materialize Select</label>
              </div>
              <div class="col s12">
                <br>
                <p>You can add the property <code class=" language-markup">multiple</code> to get the multiple select and select several options.</p>
              </div>
              <div class="input-field col s12 m6">
                <div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-5106c198-d9c0-5b05-3869-b101697c054a" value="Choose your option"><ul id="select-options-5106c198-d9c0-5b05-3869-b101697c054a" class="dropdown-content select-dropdown multiple-select-dropdown"><li class="disabled "><span><input type="checkbox" disabled=""><label></label>Choose your option</span></li><li class=""><span><input type="checkbox"><label></label>Option 1</span></li><li class=""><span><input type="checkbox"><label></label>Option 2</span></li><li class=""><span><input type="checkbox"><label></label>Option 3</span></li></ul><select multiple="" data-select-id="5106c198-d9c0-5b05-3869-b101697c054a" class="initialized">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select></div>
                <label>Materialize Multiple Select</label>
              </div>
              <div class="col s12">
                <br>
                <p>We also support optgroups in our selects.</p>
              </div>
              <div class="input-field col s12 m6">
                <div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-1202f532-6245-4b0d-636d-df1fca241ee6" value="Option 1"><ul id="select-options-1202f532-6245-4b0d-636d-df1fca241ee6" class="dropdown-content select-dropdown "><li class="optgroup"><span>team 1</span></li><li class="optgroup-option "><span>Option 1</span></li><li class="optgroup-option "><span>Option 2</span></li><li class="optgroup"><span>team 2</span></li><li class="optgroup-option "><span>Option 3</span></li><li class="optgroup-option "><span>Option 4</span></li></ul><select data-select-id="1202f532-6245-4b0d-636d-df1fca241ee6" class="initialized">
                  <optgroup label="team 1">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                  </optgroup>
                  <optgroup label="team 2">
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                  </optgroup>
                </select></div>
                <label>Optgroups</label>
              </div>
              <div class="col s12">
                <br>
                <p>You can add icons to your options in any type of select. In the option you add the image source with the <code class=" language-markup">data-icon</code> attribute. You can add the <code class=" language-markup">left</code> or <code class=" language-markup">right</code> class to align your icon. You can also add the <code class=" language-markup">circle</code> class to your icon.</p>
              </div>
              <div class="input-field col s12 m6">
                <div class="select-wrapper icons"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-311bfe83-5365-d04e-90e0-f41923166941" value="Choose your option"><ul id="select-options-311bfe83-5365-d04e-90e0-f41923166941" class="dropdown-content select-dropdown "><li class="disabled "><span>Choose your option</span></li><li class=""><img alt="" src="images/sample-1.jpg" class="circle"><span>example 1</span></li><li class=""><img alt="" src="images/office.jpg" class="circle"><span>example 2</span></li><li class=""><img alt="" src="images/yuna.jpg" class="circle"><span>example 3</span></li></ul><select class="icons initialized" data-select-id="311bfe83-5365-d04e-90e0-f41923166941">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="" data-icon="images/sample-1.jpg" class="circle">example 1</option>
                  <option value="" data-icon="images/office.jpg" class="circle">example 2</option>
                  <option value="" data-icon="images/yuna.jpg" class="circle">example 3</option>
                </select></div>
                <label>Images in select</label>
              </div>
              <div class="input-field col s12 m6">
                <div class="select-wrapper icons"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-a50de2c6-0943-222a-4b7d-c338554ecb24" value="Choose your option"><ul id="select-options-a50de2c6-0943-222a-4b7d-c338554ecb24" class="dropdown-content select-dropdown "><li class="disabled "><span>Choose your option</span></li><li class=""><img alt="" src="images/sample-1.jpg" class="left circle"><span>example 1</span></li><li class=""><img alt="" src="images/office.jpg" class="left circle"><span>example 2</span></li><li class=""><img alt="" src="images/yuna.jpg" class="left circle"><span>example 3</span></li></ul><select class="icons initialized" data-select-id="a50de2c6-0943-222a-4b7d-c338554ecb24">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="" data-icon="images/sample-1.jpg" class="left circle">example 1</option>
                  <option value="" data-icon="images/office.jpg" class="left circle">example 2</option>
                  <option value="" data-icon="images/yuna.jpg" class="left circle">example 3</option>
                </select></div>
                <label>Images in select</label>
              </div>
              <div class="col s12">
                <br>
                <p>You can add the class <code class=" language-markup">browser-default</code> to get the browser default.</p>
              </div>
              <div class="col s12 m6">
                <label>Browser Select</label>
                <select class="browser-default">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
          </form>
          <div class="col s12">
            <pre class=" language-markup"><code class=" language-markup">
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field col s12<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Materialize Select<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>

  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field col s12<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">multiple</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Materialize Multiple Select<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>

  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field col s12<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>optgroup</span> <span class="token attr-name">label</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>team 1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>optgroup</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>optgroup</span> <span class="token attr-name">label</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>team 2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>4<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 4<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>optgroup</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Optgroups<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>

  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field col s12 m6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>icons<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/sample-1.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/office.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/yuna.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Images in select<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field col s12 m6<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>icons<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/sample-1.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>left circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/office.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>left circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">data-icon</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>images/yuna.jpg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>left circle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>example 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Images in select<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>

  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Browser Select<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>browser-default<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
            </code></pre>
          </div>
          <div class="col s12">
            <br><br>
            <h4>Disabled Styles</h4>
            <p>You can also add <code class=" language-markup">disabled</code> to the select element to make the whole thing disabled. Or if you add <code class=" language-markup">disabled</code> to the options, the individual options will be unselectable. </p>
          </div>
          <form class="col s12 m6">
            <div class="row">
              <div class="col s12 input-field">
                <div class="select-wrapper disabled"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" disabled="" data-activates="select-options-54ff3a1b-4952-56be-d2d5-59f1c0af70c1" value="Choose your option"><ul id="select-options-54ff3a1b-4952-56be-d2d5-59f1c0af70c1" class="dropdown-content select-dropdown "><li class="disabled "><span>Choose your option</span></li><li class=""><span>Option 1</span></li><li class=""><span>Option 2</span></li><li class=""><span>Option 3</span></li></ul><select disabled="" data-select-id="54ff3a1b-4952-56be-d2d5-59f1c0af70c1" class="initialized">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select></div>
                <label>Materialize Disabled</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <label>Browser Disabled</label>
                <select class="browser-default" disabled="">
                  <option value="" disabled="" selected="">Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
          </form>
          <div class="col s12">
            <pre class=" language-markup"><code class=" language-markup">
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>input-field<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">disabled</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Materialize Disabled<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>

  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span><span class="token punctuation">&gt;</span></span>Browser Disabled<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>select</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>browser-default<span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span><span class="token punctuation">"</span></span> <span class="token attr-name">disabled</span> <span class="token attr-name">selected</span><span class="token punctuation">&gt;</span></span>Choose your option<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 1<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 2<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>option</span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>3<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Option 3<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>option</span><span class="token punctuation">&gt;</span></span>
  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>select</span><span class="token punctuation">&gt;</span></span>
            </code></pre>
          </div>
          <div class="col s12">
            <a name="select-initialization"></a>
            <h4>Initialization</h4>
            <p>You must initialize the select element as shown below. In addition, you will need a separate call for any dynamically generated select elements your page generates.</p>
            <pre class=" language-javascript"><code class=" col s12 language-javascript">
  <span class="token function">$</span><span class="token punctuation">(</span>document<span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">ready</span><span class="token punctuation">(</span><span class="token keyword">function</span><span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token function">$</span><span class="token punctuation">(</span><span class="token string">'select'</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">material_select</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
  <span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
            </code></pre>
          </div>
          <div class="col s12">
            <h4>Updating/Destroying Select</h4>
            <p>If you want to update the items inside the select, just rerun the initialization code from above after editing the original select. Or you can destroy the material select with this function below, and create a new select altogether</p>
            <pre class=" language-javascript"><code class=" language-javascript">
  <span class="token function">$</span><span class="token punctuation">(</span><span class="token string">'select'</span><span class="token punctuation">)</span><span class="token punctuation">.</span><span class="token function">material_select</span><span class="token punctuation">(</span><span class="token string">'destroy'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
            </code></pre>
          </div>
        </div>