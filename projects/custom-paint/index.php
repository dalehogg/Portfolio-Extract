<?php
$chrome = 'minimal';
$page_title = 'Custom Paint | Photo Markup Studio | Soffit';
$page_description = 'Photo Markup Studio: paste a photo, mark it up with boxes, arrows, measurements and pipe slopes, then copy, download, or send it on.';
$page_path = '/projects/custom-paint/';
$page_og_image = '/Img/recreations/custom-paint/studio.jpg';
$extra_head = '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n"
    . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n"
    . '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700;800&display=swap">' . "\n"
    . '<link rel="stylesheet" href="/projects/custom-paint/site.css">' . "\n"
    . '<style>:root{--chrome-fg:#087cbb;--chrome-bg:#ffffff}</style>' . "\n"
    . '<script type="importmap">{ "imports": { "three": "https://unpkg.com/three@0.170.0/build/three.module.js" } }</script>' . "\n"
    . '<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="cp">
<?php require __DIR__ . '/../../includes/nav.php'; ?>
<style>
*{box-sizing:border-box}body{margin:0;font:14px 'Segoe UI',Arial;background:#18212f;color:#e9eef6;overflow:hidden}button,input,select,textarea{font:14px 'Segoe UI',Arial}button{background:#33445c;color:white;border:1px solid #53657d;border-radius:5px;padding:8px 12px;cursor:pointer;margin:2px}button:hover{background:#456080}button.active{background:#087cbb;border-color:#63caff}.primary{background:#087cbb}#header{height:116px;background:#202e40;padding:10px 14px;border-bottom:1px solid #45556a}h1{font-size:19px;margin:0 0 7px}#side{position:absolute;left:0;top:158px;bottom:30px;width:271px;padding:12px;background:#243246;overflow:auto}#work{position:absolute;left:270px;right:0;top:158px;bottom:30px;overflow:auto;padding:20px;background:#111923}#stage{display:block;background:white;box-shadow:0 4px 20px #000;cursor:default}#empty{display:none;padding:70px 30px;text-align:center;color:#a8bbd2}#status{position:absolute;bottom:0;left:0;right:0;height:30px;padding:6px 14px;background:#202e40;font-size:12px}label{display:block;color:#c2d2e5;margin:12px 0 5px}input[type=text],input[type=number],select,textarea{background:#142132;color:white;border:1px solid #52667f;border-radius:4px;padding:6px;width:100%}input[type=range]{width:100%;cursor:pointer;accent-color:#087cbb;margin:4px 0}textarea{height:100px;resize:vertical}input[type=checkbox]{width:auto}input.small{width:76px}
.spinner-wrap{position:relative;display:inline-block;width:100%}
.spinner-wrap input{padding-right:38px}
.spinner-btns{position:absolute;right:2px;top:2px;bottom:2px;width:32px;display:flex;flex-direction:column;border-left:1px solid #52667f;background:#1b2a3f;border-top-right-radius:3px;border-bottom-right-radius:3px;overflow:hidden}
.spinner-btn{flex:1;background:transparent;border:none;color:#c2d2e5;font-size:10px;line-height:1;padding:0;cursor:pointer;display:flex;align-items:center;justify-content:center}
.spinner-btn:hover{background:#2b3e59;color:white}
#palette,#fillPalette{margin-top:7px}.swatch{display:inline-block;width:24px;height:24px;border:1px solid #afbed0;margin:2px;cursor:pointer;border-radius:3px}.hint{font-size:12px;line-height:1.6;color:#b1c3d9}#selected{padding:8px;background:#142132;border-radius:4px;margin:10px 0}#modal{display:none;position:absolute;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.75);z-index:50}#dialog{position:absolute;left:50%;top:50%;width:460px;margin-left:-230px;margin-top:-190px;background:#243246;border:1px solid #68809c;padding:20px;border-radius:8px}#dialog textarea{height:140px}
#progressBarContainer{position:absolute;bottom:30px;left:0;right:0;height:6px;background:#142132;display:none;z-index:100}#progressBar{height:100%;width:0%;background:#087cbb;transition:width .1s ease}
.tabs-header{display:flex;gap:2px;margin-bottom:12px;border-bottom:1px solid #45556a;padding-bottom:8px;flex-wrap:wrap}
.tab-btn{background:#1b2a3f;border:1px solid #52667f;color:#a8bbd2;padding:6px 6px;border-radius:4px 4px 0 0;cursor:pointer;font-weight:600;font-size:11.5px;flex:1;min-width:54px;text-align:center;white-space:nowrap}
.tab-btn.active{background:#243246;border-bottom-color:#243246;color:#ffffff}
.tab-btn:disabled, .tool-grid button:disabled{opacity:0.4;cursor:not-allowed;background:#141e2c;border-color:#334155;color:#64748b}
.tab-pane{display:none}
.tab-pane.active{display:block}
#layersList{background:#142132;border:1px solid #52667f;border-radius:4px;height:340px;overflow-y:auto;padding:4px}
.layer-item{padding:6px 8px;margin:2px 0;background:#1b2a3f;border:1px solid #33445c;border-radius:3px;cursor:pointer;display:flex;align-items:center;justify-content:between}
.layer-item:hover{background:#2b3e59}
.layer-item.selected{background:#087cbb;border-color:#63caff;color:#ffffff}
.range-val{float:right;color:#8ab4f8;font-weight:600}
.tool-grid{display:grid;grid-template-columns:repeat(4, 1fr);gap:4px;margin-top:7px}
.tool-grid button{height:40px;font-size:16px;margin:0;display:flex;align-items:center;justify-content:center}
#contextMenu{display:none;position:absolute;background:#243246;border:1px solid #68809c;border-radius:5px;box-shadow:0 4px 15px rgba(0,0,0,0.5);z-index:1000;padding:4px 0;min-width:180px}
.menu-item{padding:8px 14px;cursor:pointer;color:#e9eef6;font-size:13px}
.menu-item:hover{background:#33445c;color:#ffffff}
.menu-divider{height:1px;background:#45556a;margin:4px 0}
#historyList{background:#142132;border:1px solid #52667f;border-radius:4px;height:340px;overflow-y:auto;padding:4px}
.history-item{padding:6px 8px;margin:2px 0;background:#1b2a3f;border:1px solid #33445c;border-radius:3px;cursor:pointer;display:flex;align-items:center;justify-content:space-between}
.history-item:hover{background:#2b3e59}
.history-item.current{background:#087cbb;border-color:#63caff;color:#ffffff}
#ls3dStage{display:none;position:relative;flex:1 1 auto;min-width:0;min-height:300px;background:#071018;border:1px solid #3d5168;border-radius:8px;overflow:hidden}
#ls3dCanvas{width:100%;height:100%;display:block;touch-action:none;cursor:grab}
#ls3dHud{position:absolute;inset:0;pointer-events:none;display:flex;flex-direction:column;justify-content:space-between}
#ls3dHud button{pointer-events:auto;margin:0;background:rgba(16,28,44,.88);border:1px solid #68809c;color:#e9eef6;border-radius:6px;padding:7px 10px;font-size:12px;min-height:36px}
#ls3dHud button.on{background:#087cbb;border-color:#63caff}
.ls3d-top{display:flex;flex-wrap:wrap;gap:6px;padding:10px}
#ls3dInspect{margin:0 10px;align-self:flex-start;background:rgba(8,16,28,.86);border:1px solid #68809c;border-radius:8px;padding:8px 10px;font-size:12px;line-height:1.45;display:none;max-width:260px}
.ls3d-bottom{display:flex;justify-content:space-between;align-items:flex-end;gap:10px;padding:10px;flex-wrap:wrap}
.ls3d-help{max-width:340px;background:rgba(8,16,28,.78);border:1px solid rgba(104,128,156,.7);border-radius:8px;padding:8px 10px;font-size:12px;line-height:1.45;color:#d5e4f5}
#ls3dReadout{font-weight:700;color:#fff;margin-bottom:4px}
.ls3d-exag{pointer-events:auto;background:rgba(8,16,28,.78);border:1px solid rgba(104,128,156,.7);border-radius:8px;padding:8px 10px;min-width:210px;font-size:12px;color:#d5e4f5}
.ls3d-exag input[type=range]{width:100%}
.ls3d-pad{display:grid;grid-template-columns:46px 46px 46px;grid-template-rows:46px 46px 46px;gap:4px;pointer-events:auto}
.ls3d-pad button{width:46px;height:46px;padding:0;font-weight:700}
.ls3d-pad button:empty{visibility:hidden}
</style>
<link rel="stylesheet" href="/projects/custom-paint/site.css">

<main>
<section class="cp-hero" id="top">
  <div class="cp-hero-copy" data-reveal>
    <p class="kicker">Photo Markup Studio</p>
    <h1>Mark it. Measure it. Send it.</h1>
    <p>Paste a photograph, then draw boxes, arrows, text, dimensions, and pipe slopes. The studio below is the full tool.</p>
    <a class="button button-primary" href="#studio">Open the studio</a>
  </div>
  <figure class="cp-hero-shot" data-parallax="0.12">
    <img src="/Img/recreations/custom-paint/studio.jpg" alt="Photo Markup Studio, a dark drawing surface with tools along the side">
  </figure>
</section>
<div id="studio">
<iframe id="jobBridgeFrame" src="https://jobpackmaker.gt.tc/job_bridge.php" style="display:none;" aria-hidden="true"></iframe>
    
<div id="header">
    <h1>Photo Markup Studio <span style="font-size:12px;color:#a8bbd2">Editable photo annotations</span></h1>
    <button class="primary" onclick="pastePhoto()" style="margin: 0;">Paste Photo (Ctrl+V)</button>
	<button class="primary" onclick="JobPackMaker()" style="margin: 0;">Job Pack Maker</button>
    
    <!-- Button container with success message underneath -->
    <div style="display:inline-block; position:relative; margin-right:4px;">
        <button class="primary" onclick="sendToJobPack()" style="margin:0;">Send To Job Pack Maker</button>
        <span id="sendSuccessBadge" style="position:relative; left:2px; white-space:nowrap; font-size:11.5px; color:#63caff; font-weight:600; opacity:0; transition:opacity 0.3s ease; margin-bottom: 10px;">✓ <span style='color: red;'>Open Job Pack Maker To View</span>
    </div>

    <button onclick="undo()">Undo</button>
    <button onclick="redo()">Redo</button>
    <button onclick="copyImage()">Copy Image</button>
    
    <button onclick="downloadReducedImage()">Download Image</button>
    <input id="watermarkText" type="text" placeholder="Watermark text" value="" style="width:125px;padding:7px" title="Watermark on exported image">
</div>

<div id="side">
    <div class="tabs-header">
        <button id="tabBtn_tools" class="tab-btn active" onclick="switchTab('tools')">Tools</button>
        <button id="tabBtn_layers" class="tab-btn" onclick="switchTab('layers')">Layers</button>
        <button id="tabBtn_history" class="tab-btn" onclick="switchTab('history')">History</button>
		<button id="tabBtn_longsection" class="tab-btn" onclick="switchTab('longsection')" disabled title="Draw a pipe slope first">Long S..</button>
    </div>

    <div id="tabPane_tools" class="tab-pane active">
        <b>TOOLS</b>
        <div class="tool-grid">
            <button id="tool_select" onclick="setTool('select')" title="Select / Move">❖</button>
            <button id="tool_box" onclick="setTool('box')" title="Box"><svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="1" width="14" height="14" rx="0"/></svg></button>
            <button id="tool_skewbox" onclick="setTool('skewbox')" title="Skew Box">▱</button>
            <button id="tool_circle" onclick="setTool('circle')" title="Circle">O</button>
            <button id="tool_arrow" onclick="setTool('arrow')" title="Arrow">↗</button>
            <button id="tool_line" onclick="setTool('line')" title="Line / Curved Line">╱</button>
            <button id="tool_curve" onclick="setTool('curve')" title="Curve / Multi-point Curved Line">∿</button>
            <button id="tool_pen" onclick="setTool('pen')" title="Pen / Freehand">✏</button>
            <button id="tool_text" onclick="setTool('text')" title="Text">T</button>
            <button id="tool_cylinder" onclick="setTool('cylinder')" title="Cylinder">🛢</button>
            <button id="tool_dimension" onclick="setTool('dimension')" title="Measurement / Dimension">📏</button>
            <button id="tool_slope" onclick="setTool('slope')" title="Pipe Slope & Gradient">📐</button>
            <button id="tool_highlighter" onclick="setTool('highlighter')" title="Highlighter">🖍</button>
            <button id="tool_jobstamp" onclick="createJobStamp()" title="Job / Date Stamp">▣</button>
            <button id="tool_longsection" onclick="openLongSection()" title="Long Section (requires a slope)" disabled>▤</button>
            
            <button id="tool_crop" onclick="setTool('crop')" title="Crop Image">✂</button>
            <button onclick="rotateImage90()" title="Rotate Image 90° Clockwise"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.73-5.05"></path></svg></button>
        </div>
        <div id="selected" style="margin-top:10px">Nothing selected</div>
        
        <label>Text / Outline / Line</label>
        <div style="display:flex;gap:6px">
            <input type="text" id="colour" value="#FFFF00" onchange="syncColorPickers(); applyProps()" style="flex:1">
            <input type="color" id="colourPicker" value="#FFFF00" oninput="$('colour').value=this.value; applyProps()" style="width:36px;height:32px;padding:0;border:1px solid #52667f;background:#142132;cursor:pointer">
        </div>
        <div id="palette"></div>

        <label>Fill Colour</label>
        <div style="display:flex;gap:6px">
            <input type="text" id="fill" value="#000000" onchange="$('backed').checked=true; syncColorPickers(); applyProps()" style="flex:1">
            <input type="color" id="fillPicker" value="#000000" oninput="$('fill').value=this.value; $('backed').checked=true; applyProps()" style="width:36px;height:32px;padding:0;border:1px solid #52667f;background:#142132;cursor:pointer">
        </div>
        <div id="fillPalette"></div>
<label style="margin:0 0 8px 0;display:flex;align-items:center;gap:6px;cursor:pointer;">
    <input type="checkbox" id="photoBorder" checked>
    Black Border Around Photo
</label>
        <label><input type="checkbox" id="backed" onclick="applyProps()"> Solid Background</label>
        <label><input type="checkbox" id="tube" onclick="toggleTubeRatio(); applyProps()"> Hollow Cylinder</label>
        
        <div id="curveSettingsGroup" style="display:none">
            <label><input type="checkbox" id="curvedArrow" onclick="applyProps()"> Curved Arrow Head</label>
        </div>

        <div id="tubeRatioGroup" style="display:none">
            <label>Tube Inner Radius Ratio: <span id="tubeRatioVal" class="range-val">0.65</span></label>
            <input type="range" id="tubeRatio" min="0.1" max="0.9" step="0.05" value="0.65" oninput="$('tubeRatioVal').innerText=this.value; applyProps()">
        </div>

        <div id="waterLevelGroup" style="display:none">
            <label>Water Level: <span id="waterLevelVal" class="range-val">1.0</span></label>
            <input type="range" id="waterLevel" min="0" max="1" step="0.05" value="0.5" oninput="$('waterLevelVal').innerText=this.value; applyProps()">
        </div>

        <label>Line Thickness: <span id="strokeVal" class="range-val">2</span></label>
        <input type="range" id="stroke" min="1" max="50" step="1" value="2" oninput="$('strokeVal').innerText=this.value; applyProps()">

        <label>Opacity: <span id="opacityVal" class="range-val">100%</span></label>
        <input type="range" id="opacitySlider" min="0.05" max="1" step="0.05" value="1" oninput="setOpacity(this.value)">

        <label>Line Style</label>
        <select id="lineStyleSelect" onchange="setLineStyle(this.value)">
            <option value="solid">Solid</option>
            <option value="dashed">Dashed</option>
            <option value="dotted">Dotted</option>
        </select>

        <label>Text Size:</label><div class="spinner-wrap"><input type="text" id="fontSize" value="28" onchange="applyProps()"><div class="spinner-btns"><button class="spinner-btn" onclick="stepVal('fontSize',1,6,500)">▲</button><button class="spinner-btn" onclick="stepVal('fontSize',-1,6,500)">▼</button></div></div>
        <label><input type="checkbox" id="bold" checked onclick="applyProps()"> Bold Text</label>
        <label><input type="checkbox" id="uppercase" checked onclick="applyProps()"> Uppercase Text</label>
        <label><input type="checkbox" id="textArrow" onclick="toggleTextArrow()"> Attach Arrow To Text</label>
        <div id="textArrowGroup" style="display:none">
            <label>Text Arrow Colour</label>
            <div style="display:flex;gap:6px">
                <input type="text" id="arrowColour" value="#000000" onchange="applyArrowColour(false)" style="flex:1">
                <input type="color" id="arrowColourPicker" value="#000000" oninput="$('arrowColour').value=this.value; applyArrowColour(true)" onchange="applyArrowColour(false)" style="width:36px;height:32px;padding:0;border:1px solid #52667f;background:#142132;cursor:pointer">
            </div>
        </div>
        <label>Text For New Label / Selected Label:</label><textarea id="labelText" onblur="applyText()" placeholder="Type or paste your label here"></textarea><button onclick="editText()">Edit Selected Text</button>

        <label>Selected Width / Height:</label>
        <div style="display:flex;gap:4px">
            <div class="spinner-wrap"><input type="text" id="objW" class="small" onchange="applyDimensions('w')"><div class="spinner-btns"><button class="spinner-btn" onclick="stepDim('w',1)">▲</button><button class="spinner-btn" onclick="stepDim('w',-1)">▼</button></div></div>
            <span style="line-height:28px;color:#c2d2e5">/</span>
            <div class="spinner-wrap"><input type="text" id="objH" class="small" onchange="applyDimensions('h')"><div class="spinner-btns"><button class="spinner-btn" onclick="stepDim('h',1)">▲</button><button class="spinner-btn" onclick="stepDim('h',-1)">▼</button></div></div>
        </div>
        <div style="margin-top:12px"><button onclick="duplicate()">Duplicate</button><button onclick="removeSelected()">Delete</button><button onclick="layer(1)">To Front</button><button onclick="layer(-1)">To Back</button></div>
        <label>View Zoom</label>
        <select id="zoom" onchange="setZoom()">
            <option value="fit" selected>Fit Image</option>
            <option value="0.25">25%</option>
            <option value="0.5">50%</option>
            <option value="0.75">75%</option>
            <option value="1">100%</option>
            <option value="1.5">150%</option>
            <option value="2">200%</option>
        </select>
        <p class="hint">Draw: choose Box, Skew Box, Circle, Arrow, Line, Curve, Pen, Cylinder, Measurement, or Slope, then drag.<br>Hold Shift while drawing or resizing Box/Circle/Cylinder/Skew Box for perfect square/circle/proportions.<br>Hold Shift while drawing or resizing Arrow/Line/Curve/Measurement/Slope to snap to 10° angle increments.<br>Double-click on any edge of a Skew Box or Curve line to add a new node/control square.<br>Text: choose Text, then click the canvas.<br>Text Arrow: tick "Attach Arrow To Text" and every new text label gets an arrow that starts in the centre of the label and pokes out of its side. Select the label and drag the white square at the arrow tip to move it (hold Shift to snap to 10° increments). Arrow thickness uses Line Thickness.<br>Select: drag an item to move it. Hold Ctrl + click for multi-select.<br>Right-click items for Group/Ungroup/Copy/Delete menu.<br>Double-click text or measurement to edit it.<br>Ctrl+Z / Ctrl+Y undo / redo.</p>
    </div>

    <div id="tabPane_layers" class="tab-pane">
        <b>LAYERS</b>
        <p class="hint" style="margin-top:6px">All items placed on the screen:</p>
        <div id="layersList"></div>
        <div style="margin-top:12px"><button onclick="layer(1)">Bring Forward</button><button onclick="layer(-1)">Send Backward</button></div>
        <div style="margin-top:4px"><button onclick="removeSelected()">Delete Layer</button></div>
		<div style="margin-top:12px"><button onclick="removeAllLayers()" style="background:#8b2020;border-color:#ad4242;width:100%">Reset Layers</button></div>
        <div style="margin-top:4px"><button onclick="removeAllLayersAndHistory()" style="background:#8b2020;border-color:#ad4242;width:100%">Delete All Layers & History</button></div>
    </div>
	
    <div id="tabPane_longsection" class="tab-pane">
        <b>LONG SECTION</b>
        <p class="hint">Pipe slopes are shown in the order drawn, joined end to end.</p>
        <div id="longSectionInfo" class="hint" style="margin:8px 0">Draw more pipe slopes to create a longer section.</div>
		<div id="longSectionInfo" class="hint" style="margin:8px 0">Graph is interactive</div>
        <button onclick="refreshLongSection()">Refresh Long Section</button>
		<input type="text" id="longSectionTitle" placeholder="Address / title for the long section"
       oninput="renderLongSection()"
       style="width:100%;margin-top:12px;padding:7px;box-sizing:border-box">
		<div style="margin-top: 12px; display: flex; gap: 4px;">
		
        <button onclick="exportLongSectionImage()" class="primary" style="flex:1;">Export as Image</button>
        <button onclick="exportLongSectionPDF()" class="primary" style="flex:1;">Export Horizontal PDF</button>
    </div>
        <button id="ls3dOpenBtn" onclick="openLongSection3D()" class="primary" style="width:100%;margin-top:8px;background:#1760b9;border-color:#63caff">3D Field View</button>
        <p class="hint">Opens a green field from the ground line, with the blue pipe underground. Drag to look around. The field updates as you move points.</p>
    </div>
	<div id="tabPane_history" class="tab-pane">
        <b>CANVAS HISTORY</b>
        <p class="hint" style="margin-top:6px">Click any previous state to jump back:</p>
        <div id="historyList"></div>
		<div style="margin-top:12px; display:grid; grid-template-columns: 1fr 1fr; gap:4px;">
            <button onclick="startPlayback()" style="background:#087cbb;border-color:#63caff">Playback (P/B)</button>
            <button onclick="pausePlayback()">Pause P/B</button>
            <button onclick="continuePlayback()">Continue P/B</button>
            <button onclick="cancelPlayback()" style="background:#8b2020;border-color:#ad4242">Cancel P/B</button>
        </div>
        <div style="margin-top:12px"><button onclick="clearHistoryTimeline()" style="background:#8b2020;border-color:#ad4242;width:100%">Reset History</button></div>
<div style="margin-top:4px"><button onclick="removeAllLayersAndHistory()" style="background:#8b2020;border-color:#ad4242;width:100%">Delete All History & Layers</button></div>    </div>
	
</div>

<div id="work" style="display:flex; gap:20px; align-items:flex-start;">
    <div id="empty"></div>
    <canvas id="stage" width="800" height="600"></canvas>
    <canvas id="longSectionCanvas" width="1600" height="800" style="display:none;flex:1;max-width:calc(100% - 320px);height:auto;background:#fff;border:1px solid #777;image-rendering:auto"></canvas>
    
    <!-- Scrollable Side Log Container -->
    <div id="longSectionLogsContainer" style="width:300px; max-height:650px; overflow-y:auto; background:#fff; border:1px solid #ccc; padding:10px; display:none; border-radius:4px; box-shadow:0 4px 15px rgba(0,0,0,0.3); color:#111;">
        <!-- Logs render here dynamically -->
    </div>
    <div id="ls3dStage">
        <canvas id="ls3dCanvas"></canvas>
        <div id="ls3dHud">
            <div>
                <div class="ls3d-top">
                    <button type="button" id="ls3dModeOrbit" onclick="ls3dSetMode('orbit')">Orbit</button>
                    <button type="button" id="ls3dModeWalk" onclick="ls3dSetMode('walk')">Walk</button>
                    <button type="button" onclick="ls3dSetView('overview')">Overview</button>
                    <button type="button" onclick="ls3dSetView('trench')">In the trench</button>
                    <button type="button" id="ls3dSurfTrench" class="on" onclick="ls3dSetSurface('trench')">Cut trench</button>
                    <button type="button" id="ls3dSurfXray" onclick="ls3dSetSurface('xray')">X-ray ground</button>
                    <button type="button" id="ls3dLabelBtn" class="on" onclick="ls3dToggleLabels()">Labels</button>
                    <button type="button" id="ls3dFillBtn" onclick="ls3dSetExpanded(!ls3dExpanded)">Fill view</button>
                    <button type="button" onclick="closeLongSection3D()">Close 3D</button>
                </div>
                <div id="ls3dInspect"></div>
            </div>
            <div class="ls3d-bottom">
                <div class="ls3d-pad" id="ls3dPad">
                    <button type="button"></button>
                    <button type="button" data-k="KeyW">W</button>
                    <button type="button" data-k="KeyE">E</button>
                    <button type="button" data-k="KeyA">A</button>
                    <button type="button"></button>
                    <button type="button" data-k="KeyD">D</button>
                    <button type="button" data-k="KeyQ">Q</button>
                    <button type="button" data-k="KeyS">S</button>
                    <button type="button"></button>
                </div>
                <div class="ls3d-exag">
                    <div>Vertical scale <span id="ls3dExagVal">1×</span></div>
                    <input id="ls3dExag" type="range" min="1" max="8" step="0.5" value="1" oninput="ls3dSetExag(this.value)">
                    <div style="margin-top:8px">Horizontal scale <span id="ls3dHScaleVal">1×</span></div>
                    <input id="ls3dHScale" type="range" min="0.5" max="4" step="0.1" value="1" oninput="ls3dSetHScale(this.value)">
                    <label style="display:flex;align-items:center;gap:6px;margin-top:8px;cursor:pointer">
                        <input id="ls3dLabelChk" type="checkbox" checked onchange="ls3dSetLabels(this.checked)"> CH / GL / INV labels
                    </label>
                </div>
                <div class="ls3d-help">
                    <div id="ls3dReadout">Green ground follows the long section. Blue pipe runs underground.</div>
                    <div id="ls3dHelp">Drag to turn around. WASD moves.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="contextMenu">
    <div id="menu_lockToggle" class="menu-item" onclick="menuAction('lockToggle')">Lock Layer</div>
    <div class="menu-divider" id="menu_lockDivider"></div>

    <div id="menu_group" class="menu-item" onclick="menuAction('group')">Group</div>
    <div id="menu_ungroup" class="menu-item" onclick="menuAction('ungroup')">Ungroup</div>
    <div id="menu_removeFromGroup" class="menu-item" onclick="menuAction('removeFromGroup')">Remove From Group</div>
    <div class="menu-item" onclick="menuAction('copy')">Copy</div>
    <div class="menu-divider"></div>
    <div id="menu_deleteNode" class="menu-item" onclick="menuAction('deleteNode')" style="display:none;color:#ff6b6b">Delete Node</div>
    <div id="menu_deselectOne" class="menu-item" onclick="menuAction('deselectOne')">Deselect (Clicked)</div>
    <div id="menu_deselectAll" class="menu-item" onclick="menuAction('deselectAll')">Deselect All</div>
    <div class="menu-divider"></div>
    <div class="menu-item" onclick="menuAction('delete')" style="color:#ff6b6b">Delete</div>
</div>

<div id="progressBarContainer"><div id="progressBar"></div></div>
<div id="status">Ready. Select a tool and drag to draw.</div>
<div id="modal">
    <div id="dialog">
        <b id="dialogTitle">Label Text</b>
        <p class="hint" id="dialogHint">Press Enter to complete, Shift+Enter for a new line.</p>
        
        <div id="textEditorContainer">
            <textarea id="editValue"></textarea>
            <div style="display:flex;flex-direction:column;gap:6px;margin:8px 0">
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin:0"><input type="checkbox" id="editBold"> Bold Text</label>
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin:0"><input type="checkbox" id="editUppercase" checked> Uppercase</label>
            </div>
        </div>

        <div id="dimEditorContainer" style="display:none">
            <div class="tabs-header" style="margin-bottom:12px">
                <button type="button" id="dimTabBtn_measurement" class="tab-btn active" onclick="switchDimTab('measurement')">Measurement / Calibration</button>
                <button type="button" id="dimTabBtn_text" class="tab-btn" onclick="switchDimTab('text')">Text</button>
            </div>

            <div id="dimTabPane_measurement" class="tab-pane active">
                <label id="dimModalLabel">Length</label>
                <div style="display:flex;gap:8px;align-items:center;margin-top:6px">
                    <div class="spinner-wrap" style="flex:1">
                        <input type="text" id="editDimValue" value="1.0" oninput="validateDimInput()">
                        <div class="spinner-btns">
                            <button class="spinner-btn" onclick="stepDimModal(1)">▲</button>
                            <button class="spinner-btn" onclick="stepDimModal(-1)">▼</button>
                        </div>
                    </div>
                    <select id="editDimUnit" style="width:90px">
                        <option value="m">m</option>
                        <option value="mm">mm</option>
                    </select>
                </div>
                <div id="dimError" style="color:#ff6b6b;font-size:12px;margin-top:5px;display:none">Please enter a valid number</div>
                
                <div id="slopeInputsDiv" style="display:none;margin-top:12px;border-top:1px solid #45556a;padding-top:10px">
                    <div id="slopeCarryRow" style="display:none;margin-bottom:8px">
                        <label style="margin-top:0">Carry previous slope's downstream end into</label>
                        <select id="editSlopeCarry" onchange="applySlopeCarry()">
                            <option value="A">Side A (default)</option>
                            <option value="B">Side B</option>
                            <option value="none">Don't carry over</option>
                        </select>
                    </div>
                    <label>LL (Lid Level) at Point A (m)</label>
                    <input type="text" id="editSlopeLLA" value="" placeholder="Enter lid level" oninput="updateSlopeInvertPreview()">
                    <label style="margin-top:8px">A-Depth (m)</label>
                    <input type="text" id="editSlopeDepthA" value="1.20" oninput="updateSlopeInvertPreview()">
                    <div id="editSlopeInvA" style="font-size:12px;color:#75b7ff;margin:4px 0 0 2px">A-INV: TBC</div>
                    <label style="margin-top:16px">LL (Lid Level) at Point B (m)</label>
                    <input type="text" id="editSlopeLLB" value="" placeholder="Enter lid level" oninput="updateSlopeInvertPreview()">
                    <label style="margin-top:8px">B-Depth (m)</label>
                    <input type="text" id="editSlopeDepthB" value="1.50" oninput="updateSlopeInvertPreview()">
                    <div id="editSlopeInvB" style="font-size:12px;color:#75b7ff;margin:4px 0 0 2px">B-INV: TBC</div>
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin-top:10px"><input type="checkbox" id="editLockHeights" checked> Lock Heights (adjust length only)</label>
                </div>

                <div style="margin-top:12px">
                    <button type="button" id="dimUnknownBtn" onclick="setUnknownDim()" style="width:100%;background:#33445c;border:1px solid #68809c">Unknown Measurement (?)</button>
                </div>
            </div>

            <div id="dimTabPane_text" class="tab-pane">
                <label>Custom text</label>
                <textarea id="editDimCustomText" style="height:90px" placeholder="Type custom text for this line"></textarea>
                <div style="display:flex;flex-direction:column;gap:6px;margin:8px 0">
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin:0"><input type="checkbox" id="editDimBold" checked> Bold Text</label>
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin:0"><input type="checkbox" id="editDimUppercase" checked> Uppercase</label>
                </div>
            </div>

            <div style="margin-top:12px;border-top:1px solid #45556a;padding-top:10px">
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;margin:0"><input type="checkbox" id="editDimParallel" checked> Align Text Parallel To Line</label>
            </div>
        </div>

        <p style="margin-top:15px"><button class="primary" onclick="finishText()">Apply</button><button onclick="cancelText()">Cancel</button></p>
    </div>
</div>

</div>
<section class="cp-end" data-reveal>
  <h2>A tool, not a picture of one.</h2>
  <p>Soffit builds this kind of interface. Dale Hogg does the work.</p>
  <a class="button button-primary" href="/#contact">Get a quote</a>
</section>
</main>
<?php require __DIR__ . '/../../includes/footer.php'; ?>

<script type="text/javascript">
var canvas, ctx, photo = null, photoData = '', items = [], selectedIndices = [], clipboard = [], tool = 'select', scale = 1, drag = null, undoStack = [], redoStack = [], busy = false, pendingText = null, contextMenuTarget = -1, pasteOffsetCount = 0;
var currentTimestamp = '';
var lastDimTab = 'measurement';

var cropRect = null;
var lineStyleMode = 'solid';
var opacityMode = 1;
var jobStampDateFormat = 'en-NZ';
var longSectionVisible = false;
var lsUndoStack = [];
var lsRedoStack = [];
var lsDragSnapshot = null; // snapshot taken at start of a long-section drag


// Listen for the handshake request from Job Pack Maker
window.addEventListener('message', function(event) {
    if (event.data && event.data.type === 'REQUEST_ANNOTATED_PHOTO') {
        if (!canvas) return;
        status('Exporting clean photo for Job Pack Maker...');
        draw(true); // Draw clean canvas without selection outlines/handles
        
        canvas.toBlob(function(blob) {
            draw(false); // Restore UI handles on canvas
            if (!blob) {
                status('Failed to export image.');
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var dataURL = e.target.result;
                var photoName = 'Annotated_Photo_' + new Date().toISOString().slice(0, 10) + '_' + Date.now().toString().slice(-4) + '.jpg';
                
                // Send the photo back securely to the requesting window
                if (event.source) {
                    event.source.postMessage({
                        type: 'ADD_JOB_PACK_PHOTO',
                        dataURL: dataURL,
                        name: photoName
                    }, event.origin);
                    status('Photo successfully loaded into Job Pack Maker!');
                }
            };
            reader.readAsDataURL(blob);
        }, 'image/jpeg', 0.85);
    }
});

function removeAllLayersAndHistory() {
    remember();
    items = [];
    selectedIndices = [];
    undoStack = [];
    redoStack = [];
    currentTimestamp = '';
    updateHistoryUI();
    sync();
    draw();
    status('Deleted all layers and cleared history.');
}

// Keep track of the opened window reference
var jobPackWindowRef = null;

// Listen for acknowledgments or messages from Job Pack Maker if needed
window.addEventListener('message', function(event) {
    if (event.origin !== "https://jobpackmaker.gt.tc") return;
    // Handshake response or confirmation
});

var isSendingPhoto = false;

var playbackInterval = null;
var playbackIndex = 0;
var playbackTimelineCache = [];

function buildTimelineArray() {
    var timeline = [];
    for (var i = 0; i < undoStack.length; i++) {
        timeline.push({ type: 'undo', index: i });
    }
    var currentIndex = undoStack.length;
    timeline.push({ type: 'current', index: currentIndex });
    for (var i = 0; i < redoStack.length; i++) {
        var redoIdx = currentIndex + 1 + i;
        timeline.push({ type: 'redo', index: redoIdx });
    }
    return timeline;
}

function startPlayback() {
    playbackTimelineCache = buildTimelineArray();
    if (playbackTimelineCache.length <= 1) {
        status('Not enough history steps for playback.');
        return;
    }
    
    // Start playback from the latest state (end of timeline array) moving backward to the oldest
    playbackIndex = playbackTimelineCache.length - 1;
    if (playbackInterval) clearInterval(playbackInterval);
    
    status('Playing back history backward in time...');
    playbackInterval = setInterval(function() {
        if (playbackIndex < 0) {
            clearInterval(playbackInterval);
            playbackInterval = null;
            status('Playback completed (reached oldest state).');
            return;
        }
        var node = playbackTimelineCache[playbackIndex];
        jumpToHistoryState(playbackIndex, node.type, node.index);
        playbackIndex--;
    }, 1000); // 1000ms delay per state step
}

function pausePlayback() {
    if (playbackInterval) {
        clearInterval(playbackInterval);
        playbackInterval = null;
        status('Playback paused.');
    }
}

function continuePlayback() {
    if (playbackInterval) return; // Already running
    playbackTimelineCache = buildTimelineArray();
    if (playbackIndex < 0) {
        playbackIndex = playbackTimelineCache.length - 1;
    }
    
    status('Resuming playback backward in time...');
    playbackInterval = setInterval(function() {
        if (playbackIndex < 0) {
            clearInterval(playbackInterval);
            playbackInterval = null;
            status('Playback completed (reached oldest state).');
            return;
        }
        var node = playbackTimelineCache[playbackIndex];
        jumpToHistoryState(playbackIndex, node.type, node.index);
        playbackIndex--;
    }, 1000);
}

function cancelPlayback() {
    if (playbackInterval) {
        clearInterval(playbackInterval);
        playbackInterval = null;
    }
    // Instantly jump to the latest state (the current state at the top of the history list)
    var timeline = buildTimelineArray();
    var currentPos = undoStack.length;
    for (var i = 0; i < timeline.length; i++) {
        if (timeline[i].index === currentPos) {
            jumpToHistoryState(i, timeline[i].type, timeline[i].index);
            break;
        }
    }
    status('Playback cancelled. Returned to latest state.');
}

// Helper to combine graph canvas and side log container into a single horizontal export image
function generateLongSectionExportCanvas(callback) {
    var canvas = $('longSectionCanvas');
    var logContainer = $('longSectionLogsContainer');
    if (!canvas) return;
	
	window.isLongSectionExporting = true;
renderLongSection();          // clean render, no legend

    var exportCanvas = document.createElement('canvas');
    var eCtx = exportCanvas.getContext('2d');

    // Landscape layout: Canvas on the left, log text side panel on the right
    var logWidth = 320;
    exportCanvas.width = canvas.width + logWidth;
    exportCanvas.height = canvas.height;

    // Fill white background
    eCtx.fillStyle = '#ffffff';
    eCtx.fillRect(0, 0, exportCanvas.width, exportCanvas.height);

    // Draw the main graph canvas
    eCtx.drawImage(canvas, 0, 0);

window.isLongSectionExporting = false;
renderLongSection();          // put the legend back on screen

    // Draw a vertical divider line separating graph and logs
    eCtx.strokeStyle = '#cccccc';
    eCtx.lineWidth = 1;
    eCtx.beginPath();
    eCtx.moveTo(canvas.width, 0);
    eCtx.lineTo(canvas.width, exportCanvas.height);
    eCtx.stroke();

    // Render the log container text onto the right side of the export canvas
    eCtx.fillStyle = '#111111';
    eCtx.font = 'bold 14px Arial';
    eCtx.fillText('Point Reference Logs:', canvas.width + 15, 35);

    if (logContainer) {
        // Parse the inner text or text chunks from the log container
        var divs = logContainer.querySelectorAll('div');
        var yPos = 65;
        eCtx.font = '11px Arial';
        
        for (var i = 0; i < divs.length; i++) {
            var text = divs[i].innerText.trim();
            if (!text) continue;
            
            // Simple word-wrap or truncation check for canvas rendering
            if (yPos < exportCanvas.height - 20) {
                eCtx.fillText(text.substring(0, 48), canvas.width + 15, yPos);
                yPos += 20;
            }
        }
    }

    callback(exportCanvas);
}

function exportLongSectionImage() {
    status('Preparing Long Section image export...');
    generateLongSectionExportCanvas(function(exportCanvas) {
        var link = document.createElement('a');
        link.href = exportCanvas.toDataURL('image/jpeg', 0.85);
        link.download = 'Long_Section_Report_' + new Date().toISOString().slice(0, 10) + '.jpg';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        status('Long Section image downloaded successfully.');
    });
}

function exportLongSectionPDF() {
    if (!window.jspdf) {
        status('PDF library is still loading. Please try again in a moment.');
        return;
    }
    status('Generating horizontal PDF report...');
    generateLongSectionExportCanvas(function(exportCanvas) {
        var imgData = exportCanvas.toDataURL('image/jpeg', 0.85);
        var jsPDF = window.jspdf.jsPDF;
        
        // Initialize jsPDF in Landscape mode ('l') with millimeter units ('mm')
        var pdf = new jsPDF('l', 'mm', 'a4');
        var pdfWidth = pdf.internal.pageSize.getWidth();
        var pdfHeight = pdf.internal.pageSize.getHeight();

        // Scale image proportionally to fit landscape A4 page
        var imgWidth = pdfWidth - 20; // 10mm margins
        var imgHeight = (exportCanvas.height * imgWidth) / exportCanvas.width;

        if (imgHeight > pdfHeight - 20) {
            imgHeight = pdfHeight - 20;
            imgWidth = (exportCanvas.width * imgHeight) / exportCanvas.height;
        }

        var xOffset = (pdfWidth - imgWidth) / 2;
        var yOffset = (pdfHeight - imgHeight) / 2;

        pdf.addImage(imgData, 'JPEG', xOffset, yOffset, imgWidth, imgHeight);
        pdf.save('Long_Section_Report_' + new Date().toISOString().slice(0, 10) + '.pdf');
        status('Horizontal PDF downloaded successfully.');
    });
}

function showSendSuccess() {
    var badge = document.getElementById('sendSuccessBadge');
    if (!badge) return;
    badge.style.opacity = '1';
    setTimeout(function() {
        badge.style.opacity = '0';
    }, 2500);
}

function downloadReducedImage() {
    status('Preparing reduced-size image for download...');
    
    // Draw the clean canvas without selection outlines or handles
    draw(true); 
    
    // Export as JPEG with 0.75 quality (reduces file size/MBs without changing pixel dimensions)
    canvas.toBlob(function(blob) {
        // Restore UI handles back on the canvas view
        draw(false); 
        
        if (!blob) {
            status('Failed to generate image file for download.');
            return;
        }
        
        // Create a temporary download link
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'Annotated_Photo_' + new Date().toISOString().slice(0, 10) + '.jpg';
        
        // Trigger download
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        status('Image downloaded successfully at reduced file size.');
    }, 'image/jpeg', 0.75);
}

function sendToJobPack() {
    if (isSendingPhoto) return;
    isSendingPhoto = true;
    setTimeout(function() { isSendingPhoto = false; }, 1000);

    status('Preparing image...');
    
    // Process image asynchronously and send payload via hidden iframe bridge
    canvas.toBlob(function(blob) {
        if (!blob) {
            isSendingPhoto = false;
            status('Failed to export image.');
            return;
        }
        var reader = new FileReader();
        reader.onload = function(e) {
            var dataURL = e.target.result;
            var photoName = 'Annotated_Photo_' + new Date().toISOString().slice(0, 10) + '_' + Date.now().toString().slice(-4) + '.jpg';
            
            var payload = {
                dataURL: dataURL,
                name: photoName,
                timestamp: Date.now()
            };
            
            // Send payload via hidden iframe bridge
            var bridgeFrame = document.getElementById('jobBridgeFrame');
            if (bridgeFrame && bridgeFrame.contentWindow) {
                bridgeFrame.contentWindow.postMessage({
                    type: 'BRIDGE_PHOTO',
                    payload: payload
                }, 'https://jobpackmaker.gt.tc');
            }
            
            status('Photo appended to Job Pack Maker successfully!');
            showSendSuccess();
        };
        reader.readAsDataURL(blob);
    }, 'image/jpeg', 0.85);
}
var toolDefaults = {
    box: { backed: false, fill: '#000000' },
    skewbox: { backed: false, fill: '#000000' },
    circle: { backed: false, fill: '#000000' },
    cylinder: { backed: true, fill: '#000000' },
    text: { backed: true, fill: '#000000', font: 28, bold: true, uppercase: true },
    arrow: { backed: false, fill: '#000000', colour: '#000000' },
    line: { backed: false, fill: '#000000', colour: '#000000' },
    curve: { backed: false, fill: '#000000', colour: '#000000', curvedArrow: false },
    pen: { backed: false, fill: '#000000', colour: '#000000' },
    highlighter: { backed: false, fill: '#000000', colour: '#FFFF00', stroke: 18 },
    dimension: { backed: true, fill: '#000000', colour: '#FFFF00', font: 14, parallelText: true },
    slope: { backed: true, fill: '#000000', colour: '#FFFF00', font: 14, parallelText: true, depthA: 1.20, depthB: 1.50, lockHeights: true },
    crop: {}
};

// Saved on/off choice. Off by default. Stored in localStorage, with a cookie as a backup.
var TEXT_ARROW_KEY = 'photoMarkup_textArrow';
var TEXT_ARROW_MIN = 24;          // the arrow always shows at least this much outside the label
var arrowColourGesture = false;

function loadTextArrowPref() {
    try {
        var v = window.localStorage.getItem(TEXT_ARROW_KEY);
        if (v === '1') return true;
        if (v === '0') return false;
    } catch (e) {}
    try {
        var m = document.cookie.match(new RegExp('(?:^|;\\s*)' + TEXT_ARROW_KEY + '=([01])'));
        if (m) return m[1] === '1';
    } catch (e) {}
    return false;
}
function saveTextArrowPref(on) {
    try { window.localStorage.setItem(TEXT_ARROW_KEY, on ? '1' : '0'); } catch (e) {}
    try { document.cookie = TEXT_ARROW_KEY + '=' + (on ? '1' : '0') + '; max-age=31536000; path=/; SameSite=Lax'; } catch (e) {}
}
var textArrowPref = loadTextArrowPref();

function updateTextArrowUI() {
    var g = document.getElementById('textArrowGroup');
    var c = document.getElementById('textArrow');
    if (g && c) g.style.display = c.checked ? 'block' : 'none';
}

// Distance from the label centre to its edge along the unit direction (ux, uy), in the label's own frame.
function textArrowEdgeDist(o, ux, uy) {
    var tx = Math.abs(ux) > 1e-9 ? (o.w / 2) / Math.abs(ux) : Infinity;
    var ty = Math.abs(uy) > 1e-9 ? (o.h / 2) / Math.abs(uy) : Infinity;
    return Math.min(tx, ty);
}

// Arrow geometry in the label's own (unrotated) frame. The arrow starts at the label centre and is
// stored as a direction + how far it sticks out past the edge, so it always pokes out of the side
// whatever size the label becomes.
function textArrowGeom(o) {
    var cx = o.x + o.w / 2, cy = o.y + o.h / 2;
    var ang = isFinite(o.arrowAngle) ? o.arrowAngle : 0;
    var vis = Math.max(TEXT_ARROW_MIN, isFinite(o.arrowLen) ? o.arrowLen : 60);
    var ux = Math.cos(ang), uy = Math.sin(ang);
    var edge = textArrowEdgeDist(o, ux, uy);
    return { cx: cx, cy: cy, ux: ux, uy: uy, edge: edge, vis: vis, tx: cx + ux * (edge + vis), ty: cy + uy * (edge + vis) };
}

function initTextArrow(o) {
    o.arrow = true;
    if (!isFinite(o.arrowAngle)) o.arrowAngle = 0;   // points out of the right-hand side
    if (!isFinite(o.arrowLen)) o.arrowLen = Math.max(50, Math.min(160, Math.round((o.font || 28) * 2)));
    if (!/^#[0-9a-f]{6}$/i.test(o.arrowColour || '')) o.arrowColour = colour('arrowColour', toolDefaults.arrow.colour);
}

// Same look as the Arrow tool: round line + two-barbed head, head size from Line Thickness.
function paintTextArrow(o) {
    var g = textArrowGeom(o);
    var lw = o.stroke || 2;
    var col = ensureOutlineContrast(o.arrowColour || toolDefaults.arrow.colour, false, o.fill);
    var a = Math.atan2(g.uy, g.ux);
    var head = Math.min(g.vis * .65, Math.max(14, lw * 4));
    ctx.save();
    // Only draw what lies outside the label box, so the arrow appears to come out of its side.
    ctx.beginPath();
    ctx.rect(-1e5, -1e5, 2e5, 2e5);
    ctx.rect(o.x, o.y, o.w, o.h);
    ctx.clip('evenodd');
    ctx.strokeStyle = col;
    ctx.lineWidth = lw;
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';
    ctx.globalAlpha = (o.opacity !== undefined ? o.opacity : 1);
    if (o.type === 'highlighter') {
        ctx.globalAlpha *= 0.28;
        ctx.lineWidth = Math.max(8, o.stroke || 18);
        ctx.lineCap = 'square';
    }
    var dash = o.lineStyle === 'dashed' ? [12, 8] : (o.lineStyle === 'dotted' ? [2, 7] : []);
    ctx.setLineDash(dash);
    ctx.beginPath(); ctx.moveTo(g.cx, g.cy); ctx.lineTo(g.tx, g.ty); ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(g.tx, g.ty); ctx.lineTo(g.tx - head * Math.cos(a - .45), g.ty - head * Math.sin(a - .45));
    ctx.moveTo(g.tx, g.ty); ctx.lineTo(g.tx - head * Math.cos(a + .45), g.ty - head * Math.sin(a + .45));
    ctx.stroke();
    ctx.restore();
}

// Checkbox clicked: remember the choice, and add/remove the arrow on any selected text labels.
function toggleTextArrow() {
    var on = $('textArrow').checked;
    textArrowPref = on;
    saveTextArrowPref(on);
    var targets = [];
    for (var si = 0; si < selectedIndices.length; si++) {
        var t = items[selectedIndices[si]];
        if (t && t.type === 'text' && !!t.arrow !== on) targets.push(t);
    }
    if (targets.length) {
        remember(on ? 'Text Arrow Added' : 'Text Arrow Removed');
        for (var ti = 0; ti < targets.length; ti++) {
            if (on) initTextArrow(targets[ti]); else targets[ti].arrow = false;
        }
    }
    updateTextArrowUI();
    sync();
    draw();
}

// Arrow colour box / picker changed: update the selected text arrows (and the colour used for new ones).
function applyArrowColour(live) {
    var col = colour('arrowColour', '#000000');
    $('arrowColourPicker').value = col;
    var targets = [];
    for (var si = 0; si < selectedIndices.length; si++) {
        var t = items[selectedIndices[si]];
        if (t && t.type === 'text' && t.arrow) targets.push(t);
    }
    var changed = false;
    for (var ti = 0; ti < targets.length; ti++) { if (targets[ti].arrowColour !== col) changed = true; }
    if (changed) {
        if (!arrowColourGesture) remember('Text Arrow Colour');
        for (var tj = 0; tj < targets.length; tj++) targets[tj].arrowColour = col;
    }
    arrowColourGesture = !!live;
    draw();
}

function $(id) { return document.getElementById(id); }
function status(s) { $('status').innerText = s; }
function setProgress(p) {
    var c = $('progressBarContainer'), bar = $('progressBar');
    if (p < 0 || p >= 100) { c.style.display = 'none'; bar.style.width = '0%'; }
    else { c.style.display = 'block'; bar.style.width = Math.max(0, Math.min(100, p)) + '%'; }
}
function copyObj(o) { return JSON.parse(JSON.stringify(o)); }
function num(id, min, max, def) { var n = parseFloat($(id).value); return isFinite(n) ? Math.max(min, Math.min(max, n)) : def; }
function colour(id, def) { var v = $(id).value.replace(/^\s+|\s+$/g, ''); if (!/^#[0-9a-f]{6}$/i.test(v)) { v = def; $(id).value = v; } return v; }

function syncColorPickers() {
    var c = $('colour').value;
    if (/^#[0-9a-f]{6}$/i.test(c)) $('colourPicker').value = c;
    var f = $('fill').value;
    if (/^#[0-9a-f]{6}$/i.test(f)) $('fillPicker').value = f;
}

function ensureOutlineContrast(col, backed, fil) {
    var c = col.toLowerCase();
    if (backed && fil) {
        var f = fil.toLowerCase();
        if (f === '#ffffff' && c === '#ffffff') return '#000000';
        if (f === '#000000' && c === '#000000') return '#ffffff';
        return col;
    }
    if (!photo && c === '#ffffff') {
        return '#000000';
    }
    return col;
}

function ensureTextContrast(col, fil, backed) {
    return ensureOutlineContrast(col, backed, fil);
}

function ensureCylinderContrast(col, fil, backed) {
    return ensureOutlineContrast(col, backed, fil);
}

function defaults() { 
    var curDefaults = (toolDefaults[tool] !== undefined) ? toolDefaults[tool] : { backed: $('backed').checked, fill: colour('fill', '#000000') };
    var col = colour('colour', curDefaults.colour || '#FFFF00');
    var fil = colour('fill', curDefaults.fill || '#000000');
    var backed = $('backed').checked;
    
    if (tool === 'text') {
        col = ensureTextContrast(col, fil, backed);
    } else if (tool === 'cylinder') {
        col = ensureCylinderContrast(col, fil, backed);
    } else {
        col = ensureOutlineContrast(col, backed, fil);
    }

    if (col !== $('colour').value) {
        $('colour').value = col;
        syncColorPickers();
    }

    return { 
        colour: col, 
        fill: fil,
        stroke: num('stroke', 1, 100, 2), 
        font: tool === 'text'
    ? num('fontSize', 6, 500, curDefaults.font || 28)
    : num('fontSize', 6, 500, (tool === 'dimension' || tool === 'slope' ? 16 : 28)),
        bold: $('bold').checked, 
        uppercase: $('uppercase').checked,
        backed: backed, 
        tube: $('tube').checked,
        tubeRatio: num('tubeRatio', 0.1, 0.9, 0.65),
        waterLevel: num('waterLevel', 0, 1, 1.0),
        curvedArrow: tool === 'curve' ? $('curvedArrow').checked : (curDefaults.curvedArrow !== undefined ? curDefaults.curvedArrow : false),
        parallelText: (tool === 'dimension' || tool === 'slope' ? $('editDimParallel').checked : (curDefaults.parallelText !== undefined ? curDefaults.parallelText : true)),
        depthA: curDefaults.depthA !== undefined ? curDefaults.depthA : 1.20,
        depthB: curDefaults.depthB !== undefined ? curDefaults.depthB : 1.50,
        lockHeights: curDefaults.lockHeights !== undefined ? curDefaults.lockHeights : true,
        angle: 0,
        groupId: null,
        lineStyle: lineStyleMode,
        opacity: opacityMode
    }; 
}
function stepVal(id, delta, min, max) { var el = $(id), n = parseFloat(el.value); if (!isFinite(n)) n = min; el.value = Math.max(min, Math.min(max, n + delta)); applyProps(); }
function stepDim(which, delta) { var el = $(which === 'w' ? 'objW' : 'objH'), n = parseFloat(el.value); if (!isFinite(n)) n = 1; el.value = Math.max(20, Math.min(30000, n + delta)); applyDimensions(which); }

function remember(customLabel, snapshotItems) { 
    var label = customLabel;
    
    if (!label) {
        if (tool === 'select') {
            label = selectedIndices.length > 0 ? 'Modify / Transform' : 'Selection Change';
        } else if (tool && toolDefaults[tool] !== undefined) {
            label = (tool.charAt(0).toUpperCase() + tool.slice(1)) + ' Drawn';
            if (tool === 'text') label = 'Text Added';
            if (tool === 'dimension') label = 'Measurement Added';
            if (tool === 'slope') label = 'Slope Added';
            if (tool === 'crop') label = 'Image Cropped';
        } else {
            label = 'Edit Action';
        }
    }

    var timeStr = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    currentTimestamp = timeStr;

    undoStack.push({
        items: JSON.parse(JSON.stringify(snapshotItems || items)),
        photoData: photoData,
        width: canvas ? canvas.width : 800,
        height: canvas ? canvas.height : 600,
        timestamp: timeStr,
        actionLabel: label
    });
    
    if (undoStack.length > 80) undoStack.shift(); 
    redoStack = [];
    updateHistoryUI();
}

function snapshotSlopeState() {
    // Only slope geometry that the long section edits
    return items.filter(function(o){ return o && o.type === 'slope'; }).map(function(o){
        return {
            // identity via reference index in items
            idx: items.indexOf(o),
            llA: o.llA, llB: o.llB,
            depthA: o.depthA, depthB: o.depthB,
            dimVal: o.dimVal, dimUnit: o.dimUnit,
            text: o.text,
            customNodes: JSON.parse(JSON.stringify(o.customNodes || []))
        };
    });
}

function applySlopeState(snap) {
    if (!snap) return;
    var slopesNow = items.filter(function(o){ return o && o.type === 'slope'; });
    snap.forEach(function(s, si) {
        var o = (s.idx >= 0 && s.idx < items.length && items[s.idx] && items[s.idx].type === 'slope')
            ? items[s.idx]
            : slopesNow[si];
        if (!o || o.type !== 'slope') return;
        o.llA = s.llA; o.llB = s.llB;
        o.depthA = s.depthA; o.depthB = s.depthB;
        o.dimVal = s.dimVal; o.dimUnit = s.dimUnit;
        o.text = s.text;
        o.customNodes = JSON.parse(JSON.stringify(s.customNodes || []));
        if (typeof updateSlopeText === 'function' && o.pixelsPerUnit) {
            var dx = (o.x2 !== undefined ? o.x2 : o.x) - o.x;
            var dy = (o.y2 !== undefined ? o.y2 : o.y) - o.y;
            updateSlopeText(o, Math.sqrt(dx * dx + dy * dy));
        }
    });
}

function rememberLongSection(label) {
    lsUndoStack.push({
        label: label || 'Long Section edit',
        slopes: snapshotSlopeState()
    });
    if (lsUndoStack.length > 80) lsUndoStack.shift();
    lsRedoStack = [];
}

function undoLongSection() {
    if (!lsUndoStack.length) {
        status('Nothing to undo in Long Section.');
        return;
    }
    lsRedoStack.push({
        label: lsUndoStack[lsUndoStack.length - 1].label,
        slopes: snapshotSlopeState()
    });
    var state = lsUndoStack.pop();
    applySlopeState(state.slopes);
    if (typeof updateLongSectionAvailability === 'function') updateLongSectionAvailability();
    if (typeof renderLongSection === 'function') renderLongSection();
    if (typeof draw === 'function') draw();
    status('Long Section undo: ' + (state.label || 'edit'));
}

function redoLongSection() {
    if (!lsRedoStack.length) {
        status('Nothing to redo in Long Section.');
        return;
    }
    lsUndoStack.push({
        label: lsRedoStack[lsRedoStack.length - 1].label,
        slopes: snapshotSlopeState()
    });
    var state = lsRedoStack.pop();
    applySlopeState(state.slopes);
    if (typeof updateLongSectionAvailability === 'function') updateLongSectionAvailability();
    if (typeof renderLongSection === 'function') renderLongSection();
    if (typeof draw === 'function') draw();
    status('Long Section redo: ' + (state.label || 'edit'));
}

function undo() { 
    if (longSectionVisible) { undoLongSection(); return; }
    if (drag) return; 
    if (!undoStack.length) return; 
    
    // Push current state to redo stack, preserving its label
    var currentLabel = undoStack[undoStack.length - 1].actionLabel || 'Action';
    redoStack.push({
        items: JSON.parse(JSON.stringify(items)),
        photoData: photoData,
        width: canvas ? canvas.width : 800,
        height: canvas ? canvas.height : 600,
        timestamp: currentTimestamp,
        actionLabel: currentLabel
    }); 
    
    var state = undoStack.pop(); 
    items = state.items; 
    photoData = state.photoData;
    currentTimestamp = undoStack.length ? undoStack[undoStack.length - 1].timestamp : '';
    selectedIndices = []; 
    
    if (photoData) {
        var img = new Image();
        img.onload = function() {
            photo = img;
            canvas.width = img.width;
            canvas.height = img.height;
            setZoom();
            sync();
            draw();
            updateHistoryUI();
            status('Restored previous project state.');
        };
        img.src = photoData;
    } else {
        photo = null;
        canvas.width = state.width;
        canvas.height = state.height;
        setZoom();
        sync();
        draw();
        updateHistoryUI();
        status('Restored previous project state.');
    }
}

function redo() { 
    if (longSectionVisible) { redoLongSection(); return; }
    if (drag) return; 
    if (!redoStack.length) return; 
    
    // Push current state to undo stack, preserving its label
    undoStack.push({
        items: JSON.parse(JSON.stringify(items)),
        photoData: photoData,
        width: canvas ? canvas.width : 800,
        height: canvas ? canvas.height : 600,
        timestamp: redoStack[redoStack.length - 1].timestamp,
        actionLabel: redoStack[redoStack.length - 1].actionLabel || 'Action'
    }); 
    
    var state = redoStack.pop(); 
    items = state.items; 
    photoData = state.photoData;
    currentTimestamp = state.timestamp;
    selectedIndices = []; 
    
    if (photoData) {
        var img = new Image();
        img.onload = function() {
            photo = img;
            canvas.width = img.width;
            canvas.height = img.height;
            setZoom();
            sync();
            draw();
            updateHistoryUI();
            status('Redid project state.');
        };
        img.src = photoData;
    } else {
        photo = null;
        canvas.width = state.width;
        canvas.height = state.height;
        setZoom();
        sync();
        draw();
        updateHistoryUI();
        status('Redid project state.');
    }
}

function copyImage() {
    if (!navigator.clipboard || !navigator.clipboard.write) {
        status('Clipboard API (image writing) is not supported in this browser.');
        return;
    }
    status('Copying image to clipboard...');
    draw(true);
    canvas.toBlob(function(blob) {
        draw(false);
        if (!blob) { status('Failed to create image blob from canvas.'); return; }
        var item = new ClipboardItem({ 'image/png': blob });
        navigator.clipboard.write([item]).then(function() {
            status('Image with drawings copied to clipboard successfully.');
        }).catch(function(err) {
            status('Failed to copy image to clipboard: ' + err.message);
        });
    }, 'image/png');
}

function setOpacity(value) {
    opacityMode = Math.max(0.05, Math.min(1, parseFloat(value) || 1));
    var label = $('opacityVal'); if (label) label.innerText = Math.round(opacityMode * 100) + '%';
    applyProps();
}
function setLineStyle(value) {
    lineStyleMode = value === 'dashed' || value === 'dotted' ? value : 'solid';
    applyProps();
}

// The stamp is a normal editable/movable text layer, created from a dedicated square tool.
// The date is generated automatically; the user only supplies an address or job number.
function createJobStamp() {
    var job = prompt('Enter the address or job number for this photo:');
    if (job === null) return;
    job = job.trim();
    if (!job) { status('Job stamp cancelled: enter an address or job number.'); return; }
    var stampText = job + '  |  ' + new Date().toLocaleDateString('en-NZ');
    remember('Job / Date Stamp Added');
    var oldTool = tool;
    tool = 'text';
    var o = defaults();
    tool = oldTool;
    o.type = 'text';
    o.text = stampText;
    o.colour = '#111111';
    o.fill = '#FFFFFF';
    o.backed = true;
    o.bold = true;
    o.uppercase = false;
    o.font = Math.max(12, Math.min(24, parseInt($('fontSize').value, 10) || 16));
    o.stroke = 1;
    o.opacity = 1;
    o.lineStyle = 'solid';
    o.isJobStamp = true;
    o.x = 18 / scale;
    o.y = 18 / scale;
    o.angle = 0;
    textBounds(o);
    items.push(o);
    selectedIndices = [items.length - 1];
    setTool('select');
    sync(); draw();
    status('Job / date stamp added. Drag it to reposition or edit it like any text layer.');
}

function cycleLineStyle() {
    var modes = ['solid', 'dashed', 'dotted'];
    lineStyleMode = modes[(modes.indexOf(lineStyleMode) + 1) % modes.length];
    $('lineStyleBtn').innerText = 'Line: ' + lineStyleMode.charAt(0).toUpperCase() + lineStyleMode.slice(1);
    applyStrokePreset();
}
function cycleOpacity() {
    var modes = [1, 0.75, 0.5, 0.25];
    opacityMode = modes[(modes.indexOf(opacityMode) + 1) % modes.length];
    $('opacityBtn').innerText = 'Opacity: ' + Math.round(opacityMode * 100) + '%';
    applyStrokePreset();
}
function applyStrokePreset() {
    if (selectedIndices.length) {
        remember('Line Style / Opacity Changed');
        selectedIndices.forEach(function(i) {
            if (items[i]) { items[i].lineStyle = lineStyleMode; items[i].opacity = opacityMode; }
        });
        draw(); sync();
    }
}

function setTool(t) { 
    if (t !== 'select') { selectedIndices = []; sync(); draw(); } 
    if (t === 'longsection') { openLongSection(); return; }
    tool = t;
    
    if (t === 'text') {
    	toolDefaults.text.backed = true;
    	toolDefaults.text.fill = '#000000';
	}
    
    var ts = ['select', 'box', 'skewbox', 'circle', 'arrow', 'line', 'curve', 'pen', 'highlighter', 'text', 'cylinder', 'dimension', 'slope', 'crop', 'jobstamp']; 
    for (var i = 0; i < ts.length; i++) {
        var el = $('tool_' + ts[i]);
        if (el) el.className = ts[i] === t ? 'active' : '';
    }
canvas.style.cursor = (t === 'select' || t === 'crop') ? 'default' : 'crosshair';

if (t !== 'crop') cropRect = null;

    if (toolDefaults[t] !== undefined) {
        $('backed').checked = toolDefaults[t].backed;
        $('fill').value = toolDefaults[t].fill;
        if (toolDefaults[t].colour) {
            $('colour').value = toolDefaults[t].colour;
        }
        if (toolDefaults[t].font !== undefined) {
            $('fontSize').value = toolDefaults[t].font;
        }
        if (toolDefaults[t].stroke !== undefined) {
            $('stroke').value = toolDefaults[t].stroke;
            $('strokeVal').innerText = toolDefaults[t].stroke;
        }
        if (toolDefaults[t].uppercase !== undefined) {
            $('uppercase').checked = toolDefaults[t].uppercase;
        }
        if (toolDefaults[t].bold !== undefined) {
            $('bold').checked = toolDefaults[t].bold;
        }
        if (tool === 'curve') {
            $('curvedArrow').checked = toolDefaults.curve.curvedArrow;
        }
    }
    syncColorPickers();
    sync();
}

function switchTab(tabName) {
    if (tabName === 'longsection' && !getCompleteSlopeItems().length) {
        status(getSlopeItems().length
            ? 'Enter both LL (lid level) values on at least one pipe slope before opening Long Section.'
            : 'Draw a pipe slope before opening Long Section.');
        return;
    }

    var tabs = ['tools', 'layers', 'history', 'longsection'];
    for (var i = 0; i < tabs.length; i++) {
        var active = tabs[i] === tabName;
        $('tabBtn_' + tabs[i]).className = active ? 'tab-btn active' : 'tab-btn';
        $('tabPane_' + tabs[i]).className = active ? 'tab-pane active' : 'tab-pane';
    }
    
    var logContainer = $('longSectionLogsContainer');

    if (tabName === 'longsection') {
        longSectionVisible = true;
        $('stage').style.display = 'none';
        $('longSectionCanvas').style.display = 'block';
        if (logContainer) logContainer.style.display = 'block';
        renderLongSection();
        if (window.ls3dActive && window.applyLs3dLayout) window.applyLs3dLayout();
    } else {
        longSectionVisible = false;
        $('stage').style.display = 'block';
        $('longSectionCanvas').style.display = 'none';
        if (logContainer) logContainer.style.display = 'none';
        if ($('ls3dStage')) $('ls3dStage').style.display = 'none';
    }
    if (tabName === 'layers') updateLayersUI();
    if (tabName === 'history') {
        setTool('select');
        updateHistoryUI();
    }
}
function switchDimTab(tabName) {
    lastDimTab = tabName;
    var isMeas = (tabName === 'measurement');
    $('dimTabBtn_measurement').className = isMeas ? 'tab-btn active' : 'tab-btn';
    $('dimTabBtn_text').className = !isMeas ? 'tab-btn active' : 'tab-btn';
    $('dimTabPane_measurement').style.display = isMeas ? 'block' : 'none';
    $('dimTabPane_text').style.display = !isMeas ? 'block' : 'none';
}

function updateHistoryUI() {
    var list = $('historyList');
    if (!list) return;
    var html = '';
    
    var totalStates = undoStack.length + 1 + redoStack.length;
    if (totalStates <= 1 && items.length === 0) {
        html = '<div style="padding:15px;text-align:center;color:#a8bbd2">No edit history yet</div>';
    } else {
        var timeline = [];
                for (var i = 0; i < undoStack.length; i++) {
            var rowLabel, rowTime;
            if (i === 0) {
                // oldest saved state: nothing drawn yet (or older history was trimmed)
                var first = undoStack[0];
                rowLabel = (first.items.length === 0 && !first.photoData) ? 'Blank' : 'Earlier State';
                rowTime = '';
            } else {
                // name each state after the action that created it
                rowLabel = undoStack[i - 1].actionLabel || 'Action';
                rowTime = undoStack[i - 1].timestamp || '';
            }
            timeline.push({ type: 'undo', index: i, label: rowLabel, time: rowTime });
        }
        var currentIndex = undoStack.length;
        timeline.push({ 
            type: 'current', 
            index: currentIndex, 
            label: 'Current State', 
            time: currentTimestamp || ''
        });
                // the LAST item in redoStack is the nearest redo step, so walk it backwards
        for (var k = 0; k < redoStack.length; k++) {
            var r = redoStack[redoStack.length - 1 - k];
            timeline.push({ 
                type: 'redo', 
                index: currentIndex + 1 + k, 
                label: r.actionLabel || 'Action', 
                time: r.timestamp || '' 
            });
        }

        for (var i = timeline.length - 1; i >= 0; i--) {
            var node = timeline[i];
            var isCurrent = (node.type === 'current');
            var cls = isCurrent ? 'history-item current' : 'history-item';
            
            html += '<div class="' + cls + '" onclick="jumpToHistoryState(' + i + ', \'' + node.type + '\', ' + node.index + ')">' +
                    '<span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin-right:6px;">' + node.label + '</span>' +
                    '<span style="font-size:11px;flex-shrink:0;color:' + (isCurrent ? '#ffffff' : '#a8bbd2') + '">' + node.time + (isCurrent ? ' ●' : '') + '</span>' +
                    '</div>';
        }
    }
    list.innerHTML = html;
}
function jumpToHistoryState(positionIndex, type, stateIndex) {
    var currentPos = undoStack.length;
    if (positionIndex === currentPos) return;

    if (positionIndex < currentPos) {
        var stepsBack = currentPos - positionIndex;
        for (var s = 0; s < stepsBack; s++) {
            var labelToMove = undoStack[undoStack.length - 1].actionLabel || 'Action';
            redoStack.push({
                items: JSON.parse(JSON.stringify(items)),
                photoData: photoData,
                width: canvas ? canvas.width : 800,
                height: canvas ? canvas.height : 600,
                                timestamp: currentTimestamp,
                actionLabel: labelToMove
            });
            var state = undoStack.pop();
            items = state.items;
            photoData = state.photoData;
            currentTimestamp = undoStack.length ? undoStack[undoStack.length - 1].timestamp : '';
        }
    } else {
        var stepsForward = positionIndex - currentPos;
        for (var s = 0; s < stepsForward; s++) {
            var labelToMove = redoStack[redoStack.length - 1].actionLabel || 'Action';
            undoStack.push({
                items: JSON.parse(JSON.stringify(items)),
                photoData: photoData,
                width: canvas ? canvas.width : 800,
                height: canvas ? canvas.height : 600,
                                timestamp: redoStack[redoStack.length - 1].timestamp,
                actionLabel: labelToMove
            });
            var state = redoStack.pop();
            items = state.items;
            photoData = state.photoData;
            currentTimestamp = state.timestamp;
        }
    }

    selectedIndices = [];
    if (photoData) {
        var img = new Image();
        img.onload = function() {
            photo = img;
            canvas.width = img.width;
            canvas.height = img.height;
            setZoom();
            sync();
            draw();
            updateHistoryUI();
            status('Jumped to history state.');
        };
        img.src = photoData;
    } else {
        photo = null;
        canvas.width = 800;
        canvas.height = 600;
        setZoom();
        sync();
        draw();
        updateHistoryUI();
        status('Jumped to history state.');
    }
}

function clearHistoryTimeline() {
    remember();
    undoStack = [];
    redoStack = [];
    updateHistoryUI();
    status('History timeline cleared.');
}

function updateLayersUI() {
    var list = $('layersList');
    if (!list) return;
    var html = '';
    if (items.length === 0) {
        html = '<div style="padding:15px;text-align:center;color:#a8bbd2">No items placed yet</div>';
    } else {
        for (var i = items.length - 1; i >= 0; i--) {
            var o = items[i];
            var name = o.type.toUpperCase();
            if (o.groupId) name += ' [Group]';
            if ((o.type === 'text' || o.type === 'dimension' || o.type === 'slope') && o.text) {
                var tSnippet = o.text.replace(/\n/g, ' ');
                if (tSnippet.length > 18) tSnippet = tSnippet.substring(0, 16) + '...';
                name += ': "' + tSnippet + '"';
            } else {
                name += ' (' + (i + 1) + ')';
            }
            var selClass = (selectedIndices.includes(i)) ? 'layer-item selected' : 'layer-item';
            html += '<div class="' + selClass + '" onclick="layerItemClick(' + i + ', event)"><span>' + name + '</span></div>';
        }
    }
    list.innerHTML = html;
}

function layerItemClick(idx, e) {
    if (e.ctrlKey) {
        if (selectedIndices.includes(idx)) {
            selectedIndices = selectedIndices.filter(function(x) { return x !== idx; });
        } else {
            selectedIndices.push(idx);
        }
    } else {
        if (items[idx].groupId) {
            selectedIndices = [];
            for (var i = 0; i < items.length; i++) {
                if (items[i].groupId === items[idx].groupId) selectedIndices.push(i);
            }
        } else {
            selectedIndices = [idx];
        }
    }
    sync();
    updateLayersUI();
    draw();
}

function textBounds(o) {
    ctx.save();

    ctx.font = (o.bold ? 'bold ' : '') + o.font + 'px Arial';

    var lines = o.text.split('\n');
    var w = 0;

    for (var i = 0; i < lines.length; i++) {
        w = Math.max(w, Math.ceil(ctx.measureText(lines[i]).width));
    }

    // Fixed padding around text
    var padX = 10;
    var padY = 6;

    o.w = Math.max(20, w + (padX * 2));
    o.h = Math.max(20, lines.length * o.font * 1.2 + (padY * 2));

    ctx.restore();
}

function bounds(o) { 
    if (o.type === 'skewbox') {
        var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
        if (!pts || pts.length === 0) return { x: 0, y: 0, w: 20, h: 20 };
        var minX = pts[0].x, maxX = pts[0].x, minY = pts[0].y, maxY = pts[0].y;
        for (var i = 1; i < pts.length; i++) {
            minX = Math.min(minX, pts[i].x);
            maxX = Math.max(maxX, pts[i].x);
            minY = Math.min(minY, pts[i].y);
            maxY = Math.max(maxY, pts[i].y);
        }
        return { x: minX, y: minY, w: Math.max(10, maxX - minX), h: Math.max(10, maxY - minY) };
    }
    if (o.type === 'curve') {
        var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
        var minX = pts[0].x, maxX = pts[0].x, minY = pts[0].y, maxY = pts[0].y;
        for (var i = 1; i < pts.length; i++) {
            minX = Math.min(minX, pts[i].x);
            maxX = Math.max(maxX, pts[i].x);
            minY = Math.min(minY, pts[i].y);
            maxY = Math.max(maxY, pts[i].y);
        }
        return { x: minX, y: minY, w: Math.max(10, maxX - minX), h: Math.max(10, maxY - minY) };
    }
    if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') return { x: Math.min(o.x, o.x2), y: Math.min(o.y, o.y2), w: Math.abs(o.x2 - o.x), h: Math.abs(o.y2 - o.y) }; 
    if (o.type === 'pen' || o.type === 'highlighter') {
        if (!o.points || o.points.length === 0) return { x: o.x || 0, y: o.y || 0, w: 20, h: 20 };
        var minX = o.points[0].x, maxX = o.points[0].x, minY = o.points[0].y, maxY = o.points[0].y;
        for (var i = 1; i < o.points.length; i++) {
            minX = Math.min(minX, o.points[i].x);
            maxX = Math.max(maxX, o.points[i].x);
            minY = Math.min(minY, o.points[i].y);
            maxY = Math.max(maxY, o.points[i].y);
        }
        return { x: minX, y: minY, w: Math.max(10, maxX - minX), h: Math.max(10, maxY - minY) };
    }
    if (o.type === 'text') textBounds(o); 

    var bx = o.x, by = o.y, bw = o.w, bh = o.h;
    if (o.angle) {
        var cx = bx + bw / 2, cy = by + bh / 2;
        var corners = [
            rotatePoint({ x: bx, y: by }, cx, cy, o.angle),
            rotatePoint({ x: bx + bw, y: by }, cx, cy, o.angle),
            rotatePoint({ x: bx + bw, y: by + bh }, cx, cy, o.angle),
            rotatePoint({ x: bx, y: by + bh }, cx, cy, o.angle)
        ];
        var minX = Infinity, minY = Infinity, maxX = -Infinity, maxY = -Infinity;
        for (var ci = 0; ci < 4; ci++) {
            minX = Math.min(minX, corners[ci].x);
            minY = Math.min(minY, corners[ci].y);
            maxX = Math.max(maxX, corners[ci].x);
            maxY = Math.max(maxY, corners[ci].y);
        }
        return { x: minX, y: minY, w: Math.max(10, maxX - minX), h: Math.max(10, maxY - minY) };
    }
    return { x: bx, y: by, w: bw, h: bh }; 
}

function isPointInsideObject(o, p) { 
    var b = bounds(o); 
    return p.x >= b.x && p.x <= b.x + b.w && p.y >= b.y && p.y <= b.y + b.h; 
}

function getMultiBounds() {
    var minX = Infinity, minY = Infinity, maxX = -Infinity, maxY = -Infinity;
    for (var si = 0; si < selectedIndices.length; si++) {
        var idx = selectedIndices[si];
        if (!items[idx]) continue;
        var b = bounds(items[idx]);
        minX = Math.min(minX, b.x);
        minY = Math.min(minY, b.y);
        maxX = Math.max(maxX, b.x + b.w);
        maxY = Math.max(maxY, b.y + b.h);
    }
    return { x: minX, y: minY, w: maxX - minX, h: maxY - minY, cx: (minX + maxX) / 2, cy: (minY + maxY) / 2 };
}

function checkGroups() {
    var groupCounts = {};
    for (var i = 0; i < items.length; i++) {
        var gid = items[i].groupId;
        if (gid) {
            groupCounts[gid] = (groupCounts[gid] || 0) + 1;
        }
    }
    for (var i = 0; i < items.length; i++) {
        var gid = items[i].groupId;
        if (gid && groupCounts[gid] === 1) {
            items[i].groupId = null;
        }
    }
}

function rotatePoint(p, cx, cy, angle) {
    var cos = Math.cos(angle), sin = Math.sin(angle);
    var nx = (cos * (p.x - cx)) + (sin * (p.y - cy)) + cx;
    var ny = (cos * (p.y - cy)) - (sin * (p.x - cx)) + cy;
    return { x: nx, y: ny };
}

function paint(o) {
    ctx.save();
    if (o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') {
        var b = { x: o.x, y: o.y, w: o.w, h: o.h };
        var cx = b.x + b.w / 2;
        var cy = b.y + b.h / 2;
        ctx.translate(cx, cy);
        ctx.rotate(o.angle || 0);
        ctx.translate(-cx, -cy);
    }

    var strokeCol = o.colour;
    if (o.type === 'cylinder') {
        strokeCol = ensureCylinderContrast(o.colour, o.fill, o.backed);
    } else if (o.type === 'text') {
        strokeCol = ensureTextContrast(o.colour, o.fill, o.backed);
    } else {
        strokeCol = ensureOutlineContrast(o.colour, o.backed, o.fill);
    }

    ctx.strokeStyle = strokeCol;
    ctx.fillStyle = strokeCol;
    ctx.lineWidth = o.stroke || 2;
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';
    ctx.globalAlpha = (o.opacity !== undefined ? o.opacity : 1);
    if (o.type === 'highlighter') {
        ctx.globalAlpha *= 0.28;
        ctx.lineWidth = Math.max(8, o.stroke || 18);
        ctx.lineCap = 'square';
    }
    ctx.setLineDash(o.lineStyle === 'dashed' ? [12, 8] : (o.lineStyle === 'dotted' ? [2, 7] : []));

    if (o.type === 'box') {
        if (o.backed) {
            ctx.fillStyle = o.fill;
            if (o.stroke <= 1) { ctx.fillRect(o.x, o.y, o.w, o.h); }
            else { var half = o.stroke / 2; ctx.beginPath(); ctx.rect(o.x + half, o.y + half, Math.max(0, o.w - o.stroke), Math.max(0, o.h - o.stroke)); ctx.fill(); }
        }
        ctx.strokeRect(o.x, o.y, o.w, o.h);
    } else if (o.type === 'skewbox') {
        var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
        if (pts && pts.length > 0) {
            ctx.beginPath();
            ctx.moveTo(pts[0].x, pts[0].y);
            for (var i = 1; i < pts.length; i++) {
                ctx.lineTo(pts[i].x, pts[i].y);
            }
            ctx.closePath();
            if (o.backed) {
                ctx.fillStyle = o.fill;
                ctx.fill();
            }
            ctx.setLineDash([6, 4]);
            ctx.stroke();
            ctx.setLineDash([]);
        }
    } else if (o.type === 'circle') {
        var cx = o.x + o.w / 2, cy = o.y + o.h / 2;
        var rx = o.w / 2, ry = o.h / 2;
        if (o.backed) {
            ctx.fillStyle = o.fill;
            ctx.beginPath();
            ctx.ellipse(cx, cy, Math.max(0, rx), Math.max(0, ry), 0, 0, Math.PI * 2);
            ctx.fill();
        }
        ctx.beginPath();
        ctx.ellipse(cx, cy, Math.max(0, rx), Math.max(0, ry), 0, 0, Math.PI * 2);
        ctx.stroke();
    } else if (o.type === 'arrow') {
        var a = Math.atan2(o.y2 - o.y, o.x2 - o.x), len = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2)), head = Math.min(len * .65, Math.max(14, o.stroke * 4));
        ctx.beginPath(); ctx.moveTo(o.x, o.y); ctx.lineTo(o.x2, o.y2); ctx.stroke();
        ctx.beginPath(); ctx.moveTo(o.x2, o.y2); ctx.lineTo(o.x2 - head * Math.cos(a - .45), o.y2 - head * Math.sin(a - .45)); ctx.moveTo(o.x2, o.y2); ctx.lineTo(o.x2 - head * Math.cos(a + .45), o.y2 - head * Math.sin(a + .45)); ctx.stroke();
    } else if (o.type === 'line') {
        ctx.beginPath(); ctx.moveTo(o.x, o.y); ctx.lineTo(o.x2, o.y2); ctx.stroke();
    } else if (o.type === 'curve') {
        var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
        if (pts.length >= 2) {
            ctx.beginPath();
            ctx.moveTo(pts[0].x, pts[0].y);
            if (pts.length === 2) {
                ctx.lineTo(pts[1].x, pts[1].y);
            } else {
                for (var i = 0; i < pts.length - 1; i++) {
                    var p0 = pts[i];
                    var p1 = pts[i + 1];
                    var xc = (i === pts.length - 2) ? p1.x : (p0.x + p1.x) / 2;
                    var yc = (i === pts.length - 2) ? p1.y : (p0.y + p1.y) / 2;
                    ctx.quadraticCurveTo(p0.x, p0.y, xc, yc);
                }
            }
            ctx.stroke();

            if (o.curvedArrow && pts.length >= 2) {
                var pA = pts[pts.length - 2];
                var pB = pts[pts.length - 1];
                var a = Math.atan2(pB.y - pA.y, pB.x - pA.x);
                var totalLen = 0;
                for (var i = 0; i < pts.length - 1; i++) {
                    totalLen += Math.sqrt(Math.pow(pts[i+1].x - pts[i].x, 2) + Math.pow(pts[i+1].y - pts[i].y, 2));
                }
                var head = Math.min(totalLen * .65, Math.max(14, o.stroke * 4));
                ctx.beginPath();
                ctx.moveTo(pB.x, pB.y);
                ctx.lineTo(pB.x - head * Math.cos(a - .45), pB.y - head * Math.sin(a - .45));
                ctx.moveTo(pB.x, pB.y);
                ctx.lineTo(pB.x - head * Math.cos(a + .45), pB.y - head * Math.sin(a + .45));
                ctx.stroke();
            }
        }
    } else if (o.type === 'dimension') {
        ctx.beginPath(); ctx.moveTo(o.x, o.y); ctx.lineTo(o.x2, o.y2); ctx.stroke();
        
        var angle = Math.atan2(o.y2 - o.y, o.x2 - o.x);
        var tickLen = 8;
        ctx.beginPath();
        ctx.moveTo(o.x - tickLen * Math.sin(angle), o.y + tickLen * Math.cos(angle));
        ctx.lineTo(o.x + tickLen * Math.sin(angle), o.y - tickLen * Math.cos(angle));
        ctx.moveTo(o.x2 - tickLen * Math.sin(angle), o.y2 + tickLen * Math.cos(angle));
        ctx.lineTo(o.x2 + tickLen * Math.sin(angle), o.y2 - tickLen * Math.cos(angle));
        ctx.stroke();

        var mx = (o.x + o.x2) / 2, my = (o.y + o.y2) / 2;
        var lenText = (o.text !== undefined && o.text !== '') ? o.text : '?';
        ctx.font = (o.bold ? 'bold ' : '') + (o.font || 16) + 'px Arial';
        var tw = ctx.measureText(lenText).width;
        var padX = 8, padY = 4;
        var boxW = Math.max(24, tw + padX * 2);
        var boxH = (o.font || 16) + padY * 2;

        ctx.save();
        ctx.translate(mx, my);
        var textAngle = Math.atan2(o.y2 - o.y, o.x2 - o.x);
        if (o.parallelText !== false) {
            if (textAngle > Math.PI / 2 || textAngle < -Math.PI / 2) {
                textAngle += Math.PI;
            }
            ctx.rotate(textAngle);
        }

        ctx.fillStyle = o.backed ? o.fill : '#000000';
        ctx.fillRect(-boxW / 2, -boxH / 2, boxW, boxH);
        ctx.strokeStyle = o.colour;
        ctx.lineWidth = 1;
        ctx.strokeRect(-boxW / 2, -boxH / 2, boxW, boxH);

        ctx.fillStyle = o.colour;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        var dimBaselineOffset = (o.font || 16) * 0.04;
        ctx.fillText(lenText, 0, dimBaselineOffset);
        ctx.restore();
    } else if (o.type === 'slope') {
        ctx.beginPath(); ctx.moveTo(o.x, o.y); ctx.lineTo(o.x2, o.y2); ctx.stroke();
        
        var angle = Math.atan2(o.y2 - o.y, o.x2 - o.x);
        var tickLen = 8;
        ctx.beginPath();
        ctx.moveTo(o.x - tickLen * Math.sin(angle), o.y + tickLen * Math.cos(angle));
        ctx.lineTo(o.x + tickLen * Math.sin(angle), o.y - tickLen * Math.cos(angle));
        ctx.moveTo(o.x2 - tickLen * Math.sin(angle), o.y2 + tickLen * Math.cos(angle));
        ctx.lineTo(o.x2 + tickLen * Math.sin(angle), o.y2 - tickLen * Math.cos(angle));
        ctx.stroke();

        var mx = (o.x + o.x2) / 2, my = (o.y + o.y2) / 2;
        var lenText = (o.text !== undefined && o.text !== '') ? o.text : '?';
        
        var lines = lenText.split('\n');
        var fontSize = (o.font || 16);
        var maxTw = 0;
        for (var l = 0; l < lines.length; l++) {
            if (l === 1) {
                ctx.font = 'bold ' + fontSize + 'px Arial';
            } else {
                ctx.font = (o.bold ? 'bold ' : '') + fontSize + 'px Arial';
            }
            maxTw = Math.max(maxTw, ctx.measureText(lines[l]).width);
        }
        
        var padX = 8, padY = 6;
        var boxW = Math.max(24, maxTw + padX * 2);
        var lineSpacing = fontSize * 1.2;
        var boxH = (lines.length * lineSpacing) + padY * 2;

        ctx.save();
        ctx.translate(mx, my);
        var textAngle = Math.atan2(o.y2 - o.y, o.x2 - o.x);
        if (o.parallelText !== false) {
            if (textAngle > Math.PI / 2 || textAngle < -Math.PI / 2) {
                textAngle += Math.PI;
            }
            ctx.rotate(textAngle);
        }

        ctx.fillStyle = o.backed ? o.fill : '#000000';
        ctx.fillRect(-boxW / 2, -boxH / 2, boxW, boxH);
        ctx.strokeStyle = o.colour;
        ctx.lineWidth = 1;
        ctx.strokeRect(-boxW / 2, -boxH / 2, boxW, boxH);

        ctx.fillStyle = o.colour;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        var startY = -((lines.length - 1) * lineSpacing) / 2;
        var dimBaselineOffset = fontSize * 0.04;
        for (var j = 0; j < lines.length; j++) {
            if (j === 1) {
                ctx.font = 'bold ' + fontSize + 'px Arial';
            } else {
                ctx.font = (o.bold ? 'bold ' : '') + fontSize + 'px Arial';
            }
            ctx.fillText(lines[j], 0, startY + j * lineSpacing + dimBaselineOffset);
        }
        ctx.restore();

        var depthAText = 'A-Depth: ' + (o.depthA !== undefined ? o.depthA.toFixed(2) : '1.20') + 'm';
        renderEndpointPill(o.x, o.y, depthAText, o, false, boxW, formatLL(o.llA), getSlopeInvert(o, false));

        var depthBText = 'B-Depth: ' + (o.depthB !== undefined ? o.depthB.toFixed(2) : '1.50') + 'm';
        renderEndpointPill(o.x2, o.y2, depthBText, o, true, boxW, formatLL(o.llB), getSlopeInvert(o, true));
        // Flow arrow: only when both inverts establish a clear fall. Draw a
        // filled triangle directly ON the pipe line, using the pipe's own colour.
        // Higher invert is upstream; the triangle points toward the lower invert.
        var invA = getSlopeInvert(o, false), invB = getSlopeInvert(o, true);
        if (invA !== null && invB !== null && Math.abs(invA - invB) > 0.001) {
            var fromA = invA > invB;
            var ax = fromA ? o.x : o.x2, ay = fromA ? o.y : o.y2;
            var bx = fromA ? o.x2 : o.x, by = fromA ? o.y2 : o.y;
            var dx = bx - ax, dy = by - ay, al = Math.sqrt(dx * dx + dy * dy);
            if (al > 75) {
                var ux = dx / al, uy = dy / al;
                // Keep the arrow clear of the centre measurement pill.
                var t = 0.72, tipX = ax + dx * t, tipY = ay + dy * t;
                var headLen = Math.min(17, Math.max(11, (o.stroke || 2) * 3.2));
                var headWide = headLen * 0.62;
                var baseX = tipX - ux * headLen, baseY = tipY - uy * headLen;
                var nx = -uy, ny = ux;
                ctx.save();
                ctx.globalAlpha = 1;
                ctx.setLineDash([]);
                ctx.fillStyle = o.colour || o.strokeColour || '#1760b9';
                ctx.strokeStyle = '#000000'; ctx.lineWidth = 1.5; ctx.lineJoin = 'round';
                ctx.beginPath();
                ctx.moveTo(tipX, tipY);
                ctx.lineTo(baseX + nx * headWide, baseY + ny * headWide);
                ctx.lineTo(baseX - nx * headWide, baseY - ny * headWide);
                ctx.closePath();
                ctx.fill(); ctx.stroke();
                ctx.restore();
            }
        }
    } else if ((o.type === 'pen' || o.type === 'highlighter')) {
        if (o.points && o.points.length > 0) {
            ctx.beginPath();
            ctx.moveTo(o.points[0].x, o.points[0].y);
            for (var i = 1; i < o.points.length; i++) {
                ctx.lineTo(o.points[i].x, o.points[i].y);
            }
            ctx.stroke();
        }
    } else if (o.type === 'cylinder') {
        var rx = o.w / 2, ry = o.fixedRy || Math.min(o.h * 0.5, Math.max(8, Math.min(o.h * 0.15, rx * 0.6, 25))); 
        var cxc = o.x + rx, topY = o.y + ry, botY = o.y + o.h - ry;
        if (botY < topY) botY = topY;

        if (o.backed) {
            ctx.fillStyle = o.fill;
            if (o.stroke <= 1) {
                ctx.beginPath(); ctx.rect(o.x, topY, o.w, Math.max(0, botY - topY)); ctx.fill();
                ctx.save(); ctx.translate(cxc, topY); ctx.scale(1, ry / rx); ctx.beginPath(); ctx.arc(0, 0, rx, 0, Math.PI * 2); ctx.fill(); ctx.restore();
                ctx.save(); ctx.translate(cxc, botY); ctx.scale(1, ry / rx); ctx.beginPath(); ctx.arc(0, 0, rx, 0, Math.PI * 2); ctx.fill(); ctx.restore();
            } else {
                var half = o.stroke / 2, srx = Math.max(0, rx - half), sry = Math.max(0, ry * (srx / rx)), sw = Math.max(0, o.w - o.stroke), sh = Math.max(0, (botY - topY));
                ctx.beginPath(); ctx.rect(o.x + half, topY, sw, sh); ctx.fill();
                if (srx > 0 && sry > 0) {
					ctx.save(); ctx.translate(cxc, topY); ctx.scale(1, sry / srx); ctx.beginPath(); ctx.arc(0, 0, srx, 0, Math.PI * 2); ctx.fill(); ctx.restore();
					ctx.save(); ctx.translate(cxc, botY); ctx.scale(1, sry / srx); ctx.beginPath(); ctx.arc(0, 0, srx, 0, Math.PI * 2); ctx.fill(); ctx.restore();
				}
            }
        }

        if (o.tube) { 
            var ratio = (o.tubeRatio !== undefined) ? o.tubeRatio : 0.65;
            var irx = rx * ratio, iry = ry * ratio; 
            var level = (o.waterLevel !== undefined) ? o.waterLevel : 1.0;

            ctx.save();
            ctx.beginPath();
            ctx.rect(cxc - irx, topY - iry, irx * 2, (botY - topY) + iry * 2);
            ctx.save();
            ctx.translate(cxc, topY);
            ctx.scale(1, iry / irx);
            ctx.beginPath();
            ctx.arc(0, 0, irx, 0, Math.PI * 2);
            ctx.restore();
            ctx.clip();

            ctx.fillStyle = "#808080"; 
            ctx.fillRect(cxc - irx, topY - iry, irx * 2, (botY - topY) + iry * 2);

            var totalDepth = (botY - topY) + iry;
            var grad = ctx.createLinearGradient(cxc, topY - iry, cxc, topY + totalDepth);
            if (level === 0) {
                grad.addColorStop(0.0, "rgba(255, 255, 255, 0.35)");
                grad.addColorStop(0.3, "rgba(255, 255, 255, 0.20)");
                grad.addColorStop(1.0, "rgba(255, 255, 255, 0.10)");
            } else {
                grad.addColorStop(0.0, "rgba(255, 255, 255, 0.35)"); 
                grad.addColorStop(0.3, "rgba(0, 0, 0, 0.05)");      
                grad.addColorStop(1.0, "rgba(0, 0, 0, 0.75)");      
            }
            
            ctx.fillStyle = grad;
            ctx.fillRect(cxc - irx, topY - iry, irx * 2, totalDepth);

            if (level > 0) {
                var waterY = botY - ((botY - topY) * level);
                ctx.save(); 
                ctx.translate(cxc, waterY); 
                ctx.scale(1, iry / irx); 
                ctx.beginPath(); 
                ctx.arc(0, 0, irx, 0, Math.PI * 2); 
                ctx.fillStyle = "rgba(0, 0, 220, 0.9)"; 
                ctx.fill();
                ctx.restore();
            }

            ctx.restore(); 
        }

        ctx.strokeStyle = strokeCol;
        ctx.fillStyle = strokeCol;
        ctx.lineWidth = o.stroke;
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';

        ctx.beginPath(); 
        ctx.moveTo(o.x, topY); ctx.lineTo(o.x, botY); 
        ctx.moveTo(o.x + o.w, topY); ctx.lineTo(o.x + o.w, botY); 
        ctx.stroke();
        
        ctx.save(); ctx.translate(cxc, topY); ctx.scale(1, ry / rx); 
        ctx.beginPath(); ctx.arc(0, 0, rx, 0, Math.PI * 2); 
        ctx.restore(); ctx.stroke();
        
        ctx.save(); ctx.translate(cxc, botY); ctx.scale(1, ry / rx); 
        ctx.beginPath(); ctx.arc(0, 0, rx, 0, Math.PI); 
        ctx.restore(); ctx.stroke();

        if (o.tube) {
            var ratio = (o.tubeRatio !== undefined) ? o.tubeRatio : 0.65;
            var irx = rx * ratio, iry = ry * ratio; 
            ctx.save(); ctx.translate(cxc, topY); ctx.scale(1, iry / irx); 
            ctx.beginPath(); ctx.arc(0, 0, irx, 0, Math.PI * 2); 
            ctx.restore(); ctx.stroke(); 
        }
    } else {
        if (o.arrow) paintTextArrow(o);
        if (o.backed) {
            ctx.fillStyle = o.fill;
            if (o.stroke <= 1 || o.arrow) { ctx.fillRect(o.x, o.y, o.w, o.h); }
            else { var half = o.stroke / 2; ctx.beginPath(); ctx.rect(o.x + half, o.y + half, Math.max(0, o.w - o.stroke), Math.max(0, o.h - o.stroke)); ctx.fill(); }
        }
        ctx.fillStyle = strokeCol; 
        ctx.font = (o.bold ? 'bold ' : '') + o.font + 'px Arial'; 
        ctx.textBaseline = 'middle'; 
        var lines = o.text.split('\n'); 
        var lineSpacing = o.font * 1.2;
        var startY = o.y + o.h / 2 - ((lines.length - 1) * lineSpacing) / 2;
        var textBaselineOffset = o.font * 0.04;
        for (var j = 0; j < lines.length; j++) {
            ctx.fillText(lines[j], o.x + 10, startY + j * lineSpacing + textBaselineOffset);
        }
        ctx.textBaseline = 'alphabetic';
    }
	// Draw lock indicator badge if item is locked
    if (o.locked) {
        ctx.save();
        var b = bounds(o);
        var badgeX = b.x + b.w - 12;
        var badgeY = b.y + 4;
        ctx.fillStyle = 'rgba(255, 107, 107, 0.9)';
        ctx.beginPath();
        ctx.arc(badgeX, badgeY, 9, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = '#ffffff';
        ctx.lineWidth = 1.5;
        ctx.stroke();
        ctx.fillStyle = '#ffffff';
        ctx.font = '10px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('🔒', badgeX, badgeY + 1);
        ctx.restore();
    }
    ctx.restore();
}

function formatLL(v) {
    if (v === undefined || v === null) return '';
    var t = String(v).trim();
    if (!t) return '';
    return 'LL: ' + (isFinite(Number(t)) ? t + 'm' : t);
}

function renderEndpointPill(x, y, text, o, isEndB, centerBoxW, llText, invertValue) {
    ctx.save();
    var fontSize = o.font || 14;
    ctx.font = 'bold ' + fontSize + 'px Arial';

    // LL sits on top, depth underneath (stacked, not side by side)
    var invText = (invertValue !== undefined && invertValue !== null) ? 'INV: ' + invertValue.toFixed(3) + 'm' : 'INV: TBC';
    var lines = (llText ? [llText, text, invText] : [text, invText]);
    var tw = 0;
    for (var li = 0; li < lines.length; li++) {
        tw = Math.max(tw, ctx.measureText(lines[li]).width);
    }
    var padX = 8, padY = 4;
    var lineSpacing = fontSize * 1.2;
    var boxW = tw + padX * 2;
    var singleBoxH = fontSize + padY * 2;
    var boxH = singleBoxH + (lines.length - 1) * lineSpacing;
    
    var dx = o.x2 - o.x;
    var dy = o.y2 - o.y;
    var lineLen = Math.sqrt(dx * dx + dy * dy);
    
    var renderX = x;
    var renderY = y;

    if (lineLen > 0) {
        var uX = dx / lineLen;
        var uY = dy / lineLen;
        
        var minDistanceFromCenter = (centerBoxW / 2) + (boxW / 2) + 10;
        var halfLine = lineLen / 2;
        
        if (halfLine < minDistanceFromCenter) {
            var pushDist = minDistanceFromCenter - halfLine;
            if (!isEndB) {
                renderX -= uX * pushDist;
                renderY -= uY * pushDist;
            } else {
                renderX += uX * pushDist;
                renderY += uY * pushDist;
            }
        }
    }

    ctx.translate(renderX, renderY);
    var textAngle = Math.atan2(dy, dx);
    if (o.parallelText !== false) {
        if (textAngle > Math.PI / 2 || textAngle < -Math.PI / 2) {
            textAngle += Math.PI;
        }
        ctx.rotate(textAngle);
    }

    // Keep the bottom edge where the single-line pill used to sit; extra lines grow upward
    var bottomEdge = -(fontSize + 12) + singleBoxH / 2;
    var offsetY = bottomEdge - boxH / 2;

    ctx.fillStyle = o.backed ? o.fill : '#000000';
    ctx.fillRect(-boxW / 2, offsetY - boxH / 2, boxW, boxH);
    ctx.strokeStyle = o.colour;
    ctx.lineWidth = 1;
    ctx.strokeRect(-boxW / 2, offsetY - boxH / 2, boxW, boxH);

    ctx.fillStyle = o.colour;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    var dimBaselineOffset = fontSize * 0.04;
    var startY = offsetY - ((lines.length - 1) * lineSpacing) / 2;
    for (var j = 0; j < lines.length; j++) {
        ctx.fillText(lines[j], 0, startY + j * lineSpacing + dimBaselineOffset);
    }
    ctx.restore();
}

function handles(o) { 
    if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') return [{ x: o.x, y: o.y, k: 'start' }, { x: o.x2, y: o.y2, k: 'end' }]; 
    if (o.type === 'curve') {
        var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
        var result = [];
        for (var i = 0; i < pts.length; i++) {
            result.push({ x: pts[i].x, y: pts[i].y, k: 'curve_pt_' + i });
        }
        return result;
    }
    if (o.type === 'skewbox') {
        var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
        var result = [];
        var cx = 0, cy = 0;
        for (var i = 0; i < pts.length; i++) {
            cx += pts[i].x; cy += pts[i].y;
            result.push({ x: pts[i].x, y: pts[i].y, k: 'pt_' + i });
        }
        if (pts.length > 0) {
            cx /= pts.length; cy /= pts.length;
            var midTopX = (pts[0].x + pts[1].x) / 2;
            var midTopY = (pts[0].y + pts[1].y) / 2;
            var vX = midTopX - cx, vY = midTopY - cy;
            var len = Math.sqrt(vX * vX + vY * vY);
            if (len === 0) len = 1;
            var rotX = midTopX + (vX / len) * (25 / scale);
            var rotY = midTopY + (vY / len) * (25 / scale);
            result.push({ x: rotX, y: rotY, k: 'rotate' });
        }
        return result;
    }
    var b = { x: o.x, y: o.y, w: o.w, h: o.h }; 
    var unrotated = [
        { x: b.x, y: b.y, k: 'nw' },
        { x: b.x + b.w, y: b.y, k: 'ne' },
        { x: b.x, y: b.y + b.h, k: 'sw' },
        { x: b.x + b.w, y: b.y + b.h, k: 'se' }
    ];
    
    if (o.type !== 'text') {
        unrotated.push(
            { x: b.x + b.w / 2, y: b.y, k: 'n' },
            { x: b.x + b.w / 2, y: b.y + b.h, k: 's' },
            { x: b.x, y: b.y + b.h / 2, k: 'w' },
            { x: b.x + b.w, y: b.y + b.h / 2, k: 'e' }
        );
    }

    if (o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') {
        unrotated.push({ x: b.x + b.w / 2, y: b.y - 25 / scale, k: 'rotate' });
    }
    if (o.type === 'text' && o.arrow) {
        var tag = textArrowGeom(o);
        unrotated.unshift({ x: tag.tx, y: tag.ty, k: 'text_arrow' });   // first, so it wins over nearby handles
    }
    if (o.type === 'cylinder') {
        var rx = b.w / 2;
        var ry = o.fixedRy || Math.min(b.h * 0.5, Math.max(8, Math.min(b.h * 0.15, rx * 0.6, 25)));
        unrotated.push({ x: b.x + rx, y: b.y + 2 * ry, k: 'oval' });
    }
    if ((o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') && o.angle) {
        var cx = b.x + b.w / 2, cy = b.y + b.h / 2;
        for (var i = 0; i < unrotated.length; i++) {
            var cos = Math.cos(o.angle), sin = Math.sin(o.angle);
            var rx_rot = cos * (unrotated[i].x - cx) - sin * (unrotated[i].y - cy) + cx;
            var ry_rot = sin * (unrotated[i].x - cx) + cos * (unrotated[i].y - cy) + cy;
            unrotated[i].x = rx_rot;
            unrotated[i].y = ry_rot;
        }
    }
    return unrotated; 
}

function draw(clean) {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (photo) {
        ctx.drawImage(photo, 0, 0);
    } else {
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    for (var i = 0; i < items.length; i++) paint(items[i]);
    if ($('watermarkText') && $('watermarkText').value.trim()) {
        ctx.save(); ctx.globalAlpha = 0.38; ctx.fillStyle = '#333';
        ctx.font = 'bold 22px Arial'; ctx.textAlign = 'right'; ctx.textBaseline = 'bottom';
        ctx.fillText($('watermarkText').value.trim(), canvas.width - 18, canvas.height - 18); ctx.restore();
    }
    
    if (!clean && tool === 'crop' && cropRect) {
        ctx.save();
        ctx.fillStyle = 'rgba(0, 0, 0, 0.6)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Clear cutout for crop box and re-draw the photo & items inside it
        ctx.save();
        ctx.beginPath();
        ctx.rect(cropRect.x, cropRect.y, cropRect.w, cropRect.h);
        ctx.clip();
        
        if (photo) {
            ctx.drawImage(photo, 0, 0);
        } else {
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }
        for (var i = 0; i < items.length; i++) paint(items[i]);
        ctx.restore();
        
        // Draw crop border
        ctx.strokeStyle = '#63caff';
        ctx.lineWidth = 2 / scale;
        ctx.strokeRect(cropRect.x, cropRect.y, cropRect.w, cropRect.h);
        
        ctx.restore();
    }

    if (!clean && selectedIndices.length > 0) {
        for (var si = 0; si < selectedIndices.length; si++) {
            var idx = selectedIndices[si];
            if (!items[idx]) continue;
            var o = items[idx], b = { x: o.x, y: o.y, w: o.w, h: o.h }, hs = handles(o), r = 5 / scale;

            ctx.save(); 
            if (o.type !== 'skewbox' && o.type !== 'curve') {
                if ((o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') && o.angle) {
                    var cx = b.x + b.w / 2, cy = b.y + b.h / 2;
                    ctx.translate(cx, cy);
                    ctx.rotate(o.angle);
                    ctx.translate(-cx, -cy);
                }
                ctx.strokeStyle = '#49b9ff'; ctx.lineWidth = 1 / scale; ctx.strokeRect(b.x - 3 / scale, b.y - 3 / scale, b.w + 6 / scale, b.h + 6 / scale);
                
                if (o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') {
                    ctx.beginPath();
                    ctx.moveTo(b.x + b.w / 2, b.y);
                    ctx.lineTo(b.x + b.w / 2, b.y - 25 / scale);
                    ctx.stroke();
                }

                if (o.type === 'cylinder') {
                    var ry = o.fixedRy || Math.min(b.h * 0.5, Math.max(8, Math.min(b.h * 0.15, (b.w / 2) * 0.6, 25)));
                    ctx.beginPath();
                    ctx.moveTo(b.x + b.w / 2, b.y);
                    ctx.lineTo(b.x + b.w / 2, b.y + 2 * ry);
                    ctx.stroke();
                }
            } else if (o.type === 'skewbox') {
                ctx.strokeStyle = '#49b9ff'; ctx.lineWidth = 1 / scale;
                var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
                if (pts && pts.length > 0) {
                    ctx.beginPath();
                    ctx.moveTo(pts[0].x, pts[0].y);
                    for (var pi = 1; pi < pts.length; pi++) {
                        ctx.lineTo(pts[pi].x, pts[pi].y);
                    }
                    ctx.closePath();
                    ctx.stroke();

                    var cx = 0, cy = 0;
                    for (var pi = 0; pi < pts.length; pi++) { cx += pts[pi].x; cy += pts[pi].y; }
                    cx /= pts.length; cy /= pts.length;
                    var midTopX = (pts[0].x + pts[1].x) / 2;
                    var midTopY = (pts[0].y + pts[1].y) / 2;
                    var vX = midTopX - cx, vY = midTopY - cy;
                    var len = Math.sqrt(vX * vX + vY * vY);
                    if (len === 0) len = 1;
                    var rotX = midTopX + (vX / len) * (25 / scale);
                    var rotY = midTopY + (vY / len) * (25 / scale);

                    ctx.beginPath();
                    ctx.moveTo(midTopX, midTopY);
                    ctx.lineTo(rotX, rotY);
                    ctx.stroke();
                }
            } else if (o.type === 'curve') {
                ctx.strokeStyle = '#49b9ff'; ctx.lineWidth = 1 / scale;
                var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
                if (pts.length >= 2) {
                    ctx.beginPath();
                    ctx.moveTo(pts[0].x, pts[0].y);
                    for (var pi = 1; pi < pts.length; pi++) {
                        ctx.lineTo(pts[pi].x, pts[pi].y);
                    }
                    ctx.setLineDash([4, 4]);
                    ctx.stroke();
                    ctx.setLineDash([]);
                }
            }
            ctx.restore();

            ctx.save();
            for (var hi = 0; hi < hs.length; hi++) { 
                ctx.strokeStyle = '#49b9ff'; ctx.lineWidth = 1 / scale;
                ctx.fillStyle = (hs[hi].k === 'rotate') ? '#49b9ff' : (hs[hi].k === 'oval' ? '#ff9900' : '#ffffff'); 
                ctx.fillRect(hs[hi].x - r, hs[hi].y - r, r * 2, r * 2); 
                ctx.strokeRect(hs[hi].x - r, hs[hi].y - r, r * 2, r * 2); 
            }
            ctx.restore();
        }

        if (selectedIndices.length > 1) {
            var mb = getMultiBounds();
            ctx.save();
            ctx.strokeStyle = '#ff9900';
            ctx.lineWidth = 1.5 / scale;
            ctx.setLineDash([5, 5]);
            ctx.strokeRect(mb.x - 8 / scale, mb.y - 8 / scale, mb.w + 16 / scale, mb.h + 16 / scale);

            var rotX = mb.cx, rotY = mb.y - 8 / scale - 25 / scale;
            ctx.setLineDash([]);
            ctx.beginPath();
            ctx.moveTo(mb.cx, mb.y - 8 / scale);
            ctx.lineTo(rotX, rotY);
            ctx.stroke();

            var r = 5 / scale;
            ctx.fillStyle = '#ff9900';
            ctx.fillRect(rotX - r, rotY - r, r * 2, r * 2);
            ctx.strokeRect(rotX - r, rotY - r, r * 2, r * 2);
            ctx.restore();
        }
    }
    updateLayersUI();
}

function toggleTubeRatio() {
    var isTube = $('tube').checked;
    $('tubeRatioGroup').style.display = isTube ? 'block' : 'none';
    $('waterLevelGroup').style.display = isTube ? 'block' : 'none';
}

function sync() {
    updateLongSectionAvailability();
    var primaryIdx = selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1;
    var o = primaryIdx >= 0 ? items[primaryIdx] : null;
    $('selected').innerText = selectedIndices.length > 0 ? ('Selected: ' + selectedIndices.length + ' item(s)') : 'Nothing selected';
    
    var isCurve = (o && o.type === 'curve') || (!o && tool === 'curve');
    $('curveSettingsGroup').style.display = isCurve ? 'block' : 'none';
    if (o && o.type === 'curve') {
        $('curvedArrow').checked = !!o.curvedArrow;
    } else if (!o && tool === 'curve') {
        $('curvedArrow').checked = toolDefaults.curve.curvedArrow;
    }

    if (!o) { 
        $('textArrow').checked = textArrowPref;
        updateTextArrowUI();
        $('objW').value = ''; 
        $('objH').value = ''; 
        if (tool !== 'select' && toolDefaults[tool] !== undefined) {
            $('backed').checked = toolDefaults[tool].backed;
            $('fill').value = toolDefaults[tool].fill;
        }
        syncColorPickers();
        return; 
    }
    $('colour').value = o.colour; $('fill').value = o.fill; 
    $('stroke').value = o.stroke || 2; $('strokeVal').innerText = o.stroke || 2;
    $('fontSize').value = Math.round(o.font || 28); $('bold').checked = o.bold; $('uppercase').checked = !!o.uppercase; $('backed').checked = o.backed;
    
    if ('tube' in o) $('tube').checked = o.tube;
    toggleTubeRatio();

    if ('tubeRatio' in o) { $('tubeRatio').value = o.tubeRatio; $('tubeRatioVal').innerText = o.tubeRatio; }
    if ('waterLevel' in o) { $('waterLevel').value = o.waterLevel; $('waterLevelVal').innerText = o.waterLevel; }
    if (o.type === 'text') {
        $('labelText').value = o.text || '';
        $('textArrow').checked = !!o.arrow;
        if (o.arrow && /^#[0-9a-f]{6}$/i.test(o.arrowColour || '')) { $('arrowColour').value = o.arrowColour; $('arrowColourPicker').value = o.arrowColour; }
    } else {
        $('textArrow').checked = textArrowPref;
    }
    updateTextArrowUI();
    var b = bounds(o); $('objW').value = Math.round(b.w); $('objH').value = Math.round(b.h);
    syncColorPickers();
}

function applyProps() { 
    if (tool !== 'select' && toolDefaults[tool] !== undefined) {
        toolDefaults[tool].backed = $('backed').checked;
        toolDefaults[tool].fill = colour('fill', '#000000');
        toolDefaults[tool].uppercase = $('uppercase').checked;
        toolDefaults[tool].bold = $('bold').checked;
        if (tool === 'curve') {
            toolDefaults.curve.curvedArrow = $('curvedArrow').checked;
        }
    }
    var col = colour('colour', '#FFFF00');
    var fil = colour('fill', '#000000');
    var backed = $('backed').checked;
    var stroke = num('stroke', 1, 100, 2);
    var font = num('fontSize', 6, 500, 28);
    var bold = $('bold').checked;
    var uppercase = $('uppercase').checked;
    var tube = $('tube').checked;
    var tubeRatio = num('tubeRatio', 0.1, 0.9, 0.65);
    var waterLevel = num('waterLevel', 0, 1, 1.0);
    var curvedArrow = $('curvedArrow').checked;
    var parallelText = $('editDimParallel') ? $('editDimParallel').checked : true;

    if (selectedIndices.length === 0) return; 
    remember(); 
    for (var si = 0; si < selectedIndices.length; si++) {
        var o = items[selectedIndices[si]];
        o.fill = fil;
        o.stroke = stroke;
        o.opacity = opacityMode;
        o.lineStyle = lineStyleMode;
        o.font = font;
        o.bold = bold;
        o.uppercase = uppercase;
        o.backed = backed;
        o.tube = tube;
        o.tubeRatio = tubeRatio;
        o.waterLevel = waterLevel;
        o.parallelText = parallelText;
        if (o.type === 'curve') {
            o.curvedArrow = curvedArrow;
        }

        if (o.type === 'text') {
    o.colour = ensureTextContrast(col, fil, backed);
    if (o.uppercase) o.text = o.text.toUpperCase();
    textBounds(o);

    toolDefaults.text.font = o.font;
        } else if (o.type === 'dimension' || o.type === 'slope') {
            o.colour = ensureTextContrast(col, fil, backed);
        } else if (o.type === 'cylinder') {
            o.colour = ensureCylinderContrast(col, fil, backed);
        } else {
            o.colour = ensureOutlineContrast(col, backed, fil);
        }
    }
    if (selectedIndices.length === 1) {
        var singleObj = items[selectedIndices[0]];
        $('colour').value = singleObj.colour;
        if (singleObj.type === 'text' || singleObj.type === 'dimension' || singleObj.type === 'slope') {
            $('labelText').value = singleObj.text;
        }
        syncColorPickers();
    }
    sync(); 
    draw(); 
}

function applyText() { 
    var primaryIdx = selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1;
    var o = primaryIdx >= 0 ? items[primaryIdx] : null;
    if (!o || (o.type !== 'text' && o.type !== 'dimension' && o.type !== 'slope')) return; 
    var s = $('labelText').value.replace(/\r/g, ''); 
    if (o.type === 'text' && o.uppercase) s = s.toUpperCase();
    if (s !== o.text) { 
        remember(); 
        o.text = s; 
        if (o.type === 'text') textBounds(o);
        sync(); 
        draw(); 
    } 
}

function applyDimensions(which) {
    var primaryIdx = selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1;
    var o = primaryIdx >= 0 ? items[primaryIdx] : null;
    if (!o) return; 
    var b = bounds(o), w = num('objW', 20, 30000, b.w), h = num('objH', 20, 30000, b.h); remember();
    if (o.type === 'skewbox' || o.type === 'curve') {
        var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
        var cx = b.x + b.w / 2, cy = b.y + b.h / 2;
        var scaleX = w / (b.w || 1), scaleY = h / (b.h || 1);
        for (var pi = 0; pi < pts.length; pi++) {
            pts[pi] = { x: cx + (pts[pi].x - cx) * scaleX, y: cy + (pts[pi].y - cy) * scaleY };
        }
        if (o.type === 'curve' && pts.length >= 2) {
            o.x = pts[0].x; o.y = pts[0].y;
            o.x2 = pts[pts.length - 1].x; o.y2 = pts[pts.length - 1].y;
        }
    }
    else if (o.type === 'box' || o.type === 'circle' || o.type === 'cylinder') { 
        if (o.type === 'cylinder') { var rx = w / 2; if (!o.fixedRy) o.fixedRy = Math.min(b.h * 0.5, Math.max(8, Math.min(b.h * 0.15, rx * 0.6, 25))); } 
        o.w = w; o.h = h; 
    }
    else if (o.type === 'text') { 
        o.font = Math.max(6, Math.min(500, o.font * (which === 'h' ? h / b.h : w / b.w))); 
        textBounds(o);
    }
    else if ((o.type === 'pen' || o.type === 'highlighter')) {
        var scaleX = w / b.w, scaleY = h / b.h;
        for (var i = 0; i < o.points.length; i++) {
            o.points[i].x = b.x + (o.points[i].x - b.x) * scaleX;
            o.points[i].y = b.y + (o.points[i].y - b.y) * scaleY;
        }
    }
    else { 
        o.x2 = o.x + (o.x2 < o.x ? -w : w); o.y2 = o.y + (o.y2 < o.y ? -h : h); if (o.x2 === o.x && o.y2 === o.y) o.x2 += 1; 
        if (o.type === 'dimension' && o.pixelsPerUnit) {
            var newLen = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2));
            updateDimensionText(o, newLen);
        } else if (o.type === 'slope' && o.pixelsPerUnit) {
            var newLen = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2));
            updateSlopeText(o, newLen);
        }
    }
    sync(); draw();
}

function point(e) {
    var rect = canvas.getBoundingClientRect();
    var clientX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    var clientY = e.clientY || (e.touches && e.touches[0].clientY) || 0;
    var cssX = clientX - rect.left;
    var cssY = clientY - rect.top;
    var w = (rect.width > 0) ? rect.width : (canvas.clientWidth || canvas.width);
    var h = (rect.height > 0) ? rect.height : (canvas.clientHeight || canvas.height);
    return { x: cssX * (canvas.width / w), y: cssY * (canvas.height / h) };
}

function pointInPolygon(point, vs) {
    var x = point.x, y = point.y;
    var inside = false;
    for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
        var xi = vs[i].x, yi = vs[i].y;
        var xj = vs[j].x, yj = vs[j].y;
        var intersect = ((yi > y) !== (yj > y)) && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
        if (intersect) inside = !inside;
    }
    return inside;
}

function distToSegmentSquared(p, v, w) {
    var l2 = (w.x - v.x)*(w.x - v.x) + (w.y - v.y)*(w.y - v.y);
    if (l2 === 0) return (p.x - v.x)*(p.x - v.x) + (p.y - v.y)*(p.y - v.y);
    var t = ((p.x - v.x)*(w.x - v.x) + (p.y - v.y)*(w.y - v.y)) / l2;
    t = Math.max(0, Math.min(1, t));
    return (p.x - (v.x + t * (w.x - v.x)))*(p.x - (v.x + t * (w.x - v.x))) + (p.y - (v.y + t * (w.y - v.y)))*(p.y - (v.y + t * (w.y - v.y)));
}

function hit(o, p) {
	if (o.locked) return false;
    var checkP = p;
    if ((o.type === 'cylinder' || o.type === 'box' || o.type === 'text') && o.angle) {
        var b = { x: o.x, y: o.y, w: o.w, h: o.h };
        var cx = b.x + b.w / 2;
        var cy = b.y + b.h / 2;
        checkP = rotatePoint(p, cx, cy, o.angle);
    }
    if (o.type === 'skewbox') {
        var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
        if (pointInPolygon(checkP, pts)) return true;
        var threshold = Math.max(10 / scale, o.stroke + 5);
        for (var i = 0; i < pts.length; i++) {
            if (distToSegmentSquared(checkP, pts[i], pts[(i + 1) % pts.length]) <= threshold * threshold) return true;
        }
        return false;
    }
    if (o.type === 'circle') {
        var cx = o.x + o.w / 2, cy = o.y + o.h / 2;
        var rx = o.w / 2, ry = o.h / 2;
        if (rx <= 0 || ry <= 0) return false;
        var dx = (checkP.x - cx) / rx;
        var dy = (checkP.y - cy) / ry;
        var distSq = dx * dx + dy * dy;
        if (distSq <= 1.1) return true;
        var tolerance = Math.max(10 / scale, o.stroke + 5) / Math.min(rx, ry);
        return Math.abs(Math.sqrt(distSq) - 1) <= tolerance;
    }
    if (o.type === 'curve') {
        var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
        var threshold = Math.max(16 / scale, o.stroke + 8);
        if (pts.length < 2) return false;
        if (pts.length === 2) {
            return distToSegmentSquared(checkP, pts[0], pts[1]) <= threshold * threshold;
        }

        var steps = 25;
        var curX = pts[0].x, curY = pts[0].y;
        for (var i = 0; i < pts.length - 1; i++) {
            var p0 = pts[i];
            var p1 = pts[i + 1];
            var xc = (i === pts.length - 2) ? p1.x : (p0.x + p1.x) / 2;
            var yc = (i === pts.length - 2) ? p1.y : (p0.y + p1.y) / 2;

            var startX = curX, startY = curY;
            var cpx = p0.x, cpy = p0.y;
            var endX = xc, endY = yc;

            var prevX = startX, prevY = startY;
            for (var s = 1; s <= steps; s++) {
                var t = s / steps;
                var qx = Math.pow(1 - t, 2) * startX + 2 * (1 - t) * t * cpx + Math.pow(t, 2) * endX;
                var qy = Math.pow(1 - t, 2) * startY + 2 * (1 - t) * t * cpy + Math.pow(t, 2) * endY;

                if (distToSegmentSquared(checkP, { x: prevX, y: prevY }, { x: qx, y: qy }) <= threshold * threshold) {
                    return true;
                }
                prevX = qx;
                prevY = qy;
            }
            curX = endX;
            curY = endY;
        }
        return false;
    }
    if ((o.type === 'pen' || o.type === 'highlighter')) {
        if (!o.points) return false;
        var threshold = Math.max(10 / scale, o.stroke + 5);
        for (var i = 0; i < o.points.length; i++) {
            var dx = checkP.x - o.points[i].x;
            var dy = checkP.y - o.points[i].y;
            if (dx * dx + dy * dy <= threshold * threshold) return true;
        }
        return false;
    }
    if (o.type === 'text' && o.arrow) {
        var tg = textArrowGeom(o);
        var thr = Math.max(10 / scale, (o.stroke || 2) + 5);
        var s0 = { x: tg.cx + tg.ux * tg.edge, y: tg.cy + tg.uy * tg.edge };
        if (distToSegmentSquared(checkP, s0, { x: tg.tx, y: tg.ty }) <= thr * thr) return true;
    }
    if (o.type !== 'arrow' && o.type !== 'line' && o.type !== 'dimension' && o.type !== 'slope') { var b = { x: o.x, y: o.y, w: o.w, h: o.h }; return checkP.x >= b.x && checkP.x <= b.x + b.w && checkP.y >= b.y && checkP.y <= b.y + b.h; }
    var dx = o.x2 - o.x, dy = o.y2 - o.y, l = dx * dx + dy * dy, t = l ? ((checkP.x - o.x) * dx + (checkP.y - o.y) * dy) / l : 0;
    t = Math.max(0, Math.min(1, t)); dx = checkP.x - (o.x + t * dx); dy = checkP.y - (o.y + t * dy); return dx * dx + dy * dy <= Math.pow(Math.max(10 / scale, o.stroke + 5), 2);
}

function applyLinePoint(o, p, isStart, shiftKey) {
    var fixedX = isStart ? o.x2 : o.x;
    var fixedY = isStart ? o.y2 : o.y;
    var dx = p.x - fixedX;
    var dy = p.y - fixedY;
    var len = Math.sqrt(dx * dx + dy * dy);
    
    if (len > 0 && shiftKey) {
        var angle = Math.atan2(dy, dx);
        var inc = 10 * Math.PI / 180;
        var snapped = Math.round(angle / inc) * inc;
        dx = len * Math.cos(snapped);
        dy = len * Math.sin(snapped);
    }
    
    if (isStart) {
        o.x = fixedX + dx;
        o.y = fixedY + dy;
        if (o.type === 'curve' && o.points && o.points.length > 0) {
            o.points[0] = { x: o.x, y: o.y };
        }
    } else {
        o.x2 = fixedX + dx;
        o.y2 = fixedY + dy;
        if (o.type === 'curve' && o.points && o.points.length > 0) {
            o.points[o.points.length - 1] = { x: o.x2, y: o.y2 };
        }
    }
}

function down(e) {
    if (busy) return; 
    if (e.button === 2) return; 
    if (e.button !== 0) return; 
    e.preventDefault(); 
    var p = point(e), i;
    
    if (tool === 'crop') {

        drag = { kind: 'crop_new', p: p };
        cropRect = { x: p.x, y: p.y, w: 0, h: 0 };
        return;
    }

    if (tool === 'text') { 
        selectedIndices = []; 
        showText(null, p); 
        return; 
    }
    
    if (tool === 'select') {
        if (selectedIndices.length > 1) {
            var mb = getMultiBounds();
            var rotX = mb.cx, rotY = mb.y - 8 / scale - 25 / scale;
            if (Math.abs(p.x - rotX) < 12 / scale && Math.abs(p.y - rotY) < 12 / scale) {
                
                drag = { kind: 'group_rotate', p: p, groupCx: mb.cx, groupCy: mb.cy, originals: copyObj(items) };
                return;
            }
        }

        if (selectedIndices.length > 0) { 
            for (var si = selectedIndices.length - 1; si >= 0; si--) {
                var sIdx = selectedIndices[si];
				if (items[sIdx] && items[sIdx].locked) continue;
                var hs = handles(items[sIdx]); 
                for (i = 0; i < hs.length; i++) {
                    if (Math.abs(p.x - hs[i].x) < 12 / scale && Math.abs(p.y - hs[i].y) < 12 / scale) { 
                   
                        drag = { kind: hs[i].k, targetIdx: sIdx, p: p, original: copyObj(items[sIdx]), originals: copyObj(items) }; 
                        return; 
                    } 
                } 
            }
        }

        var hitIdx = -1;
        for (i = items.length - 1; i >= 0; i--) {
            if (hit(items[i], p)) { hitIdx = i; break; }
        }

        if (hitIdx >= 0) {
            var groupItems = [];
            if (items[hitIdx].groupId) {
                for (var gi = 0; gi < items.length; gi++) {
                    if (items[gi].groupId === items[hitIdx].groupId) groupItems.push(gi);
                }
            } else {
                groupItems = [hitIdx];
            }

            if (e.ctrlKey) {
                for (var gi = 0; gi < groupItems.length; gi++) {
                    var gIdx = groupItems[gi];
                    if (selectedIndices.includes(gIdx)) {
                        selectedIndices = selectedIndices.filter(function(x) { return x !== gIdx; });
                    } else {
                        selectedIndices.push(gIdx);
                    }
                }
            } else {
                if (!selectedIndices.includes(hitIdx)) {
                    selectedIndices = groupItems;
                }
            }
           
            drag = { kind: 'move', p: p, originals: copyObj(items) };
        } else {
            if (!e.ctrlKey) selectedIndices = [];
        }
        sync(); 
        draw(); 
        return;
    }
    
   
    var o = defaults();
    o.type = tool;
    if (tool === 'highlighter') {
        o.colour = '#FFFF00'; o.stroke = Math.max(8, num('stroke', 1, 100, 18));
        o.opacity = opacityMode; o.lineStyle = lineStyleMode;
    }
    if (o.type === 'skewbox') {
        o.points = [
            { x: p.x, y: p.y },
            { x: p.x, y: p.y },
            { x: p.x, y: p.y },
            { x: p.x, y: p.y }
        ];
    } else if (o.type === 'curve') {
        o.x = p.x; o.y = p.y;
        o.x2 = p.x; o.y2 = p.y;
        o.points = [{ x: p.x, y: p.y }, { x: p.x, y: p.y }, { x: p.x, y: p.y }];
    } else if (
    o.type === 'arrow' ||
    o.type === 'line' ||
    o.type === 'dimension' ||
    o.type === 'slope'
) {
    o.x = p.x;
    o.y = p.y;
    o.x2 = p.x;
    o.y2 = p.y;

    if (o.type === 'slope') {
        o.text = 'L: TBC | F: 0.30m\nG: TBC';
        o.dimVal = 15;
        o.dimUnit = 'm';
        o.depthA = 1.20;
        o.depthB = 1.50;
        o.llA = null;
        o.llB = null;
        o.lockHeights = true;
        // Carry the previous slope's downstream end (LL + depth) into this slope's upstream side (A by default).
        slopeCarryPending = null;
        var carry = getCarryFromPreviousSlope();
        if (carry) {
            carry.side = 'A';
            o.llA = carry.ll;
            o.depthA = carry.depth;
            slopeCarryPending = carry;
            updateSlopeText(o, 0);
            status('Side A filled from the previous slope\'s downstream end (its side ' + carry.end + ').');
        }
    } else if (o.type === 'dimension') {
        o.text = '?';
    }
}
    if (o.type === 'pen' || o.type === 'highlighter') o.points = [{x: p.x, y: p.y}];
    if (o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') { 
        o.angle = 0; 
        if (o.type === 'cylinder') o.fixedRy = 15; 
    }
    items.push(o); 
    selectedIndices = [items.length - 1]; 
    drag = { kind: 'new', p: p, originals: copyObj(items) };
}

function move(e) {
    if (!drag) return; 
    var p = point(e);
    var offX = p.x - drag.p.x;
    var offY = p.y - drag.p.y;
    var k = drag.kind;

    if (k === 'crop_new') {
        var ox = Math.min(drag.p.x, p.x);
        var oy = Math.min(drag.p.y, p.y);
        var dw = Math.abs(p.x - drag.p.x);
        var dh = Math.abs(p.y - drag.p.y);
        cropRect = { x: ox, y: oy, w: dw, h: dh };
        draw();
        return;
    }

    var targetIdx = (drag.targetIdx !== undefined) ? drag.targetIdx : (selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1);
    var o = targetIdx >= 0 ? items[targetIdx] : null;
    var a = targetIdx >= 0 ? drag.originals[targetIdx] : null;

    // (Keep the rest of your move logic below...)

    if (k === 'group_rotate') {
        var initialAngle = Math.atan2(drag.p.y - drag.groupCy, drag.p.x - drag.groupCx);
        var currentAngle = Math.atan2(p.y - drag.groupCy, p.x - drag.groupCx);
        var diff = currentAngle - initialAngle;

        for (var si = 0; si < selectedIndices.length; si++) {
            var idx = selectedIndices[si];
            var orig = drag.originals[idx];
            var item = items[idx];

            if (item.type === 'skewbox' || item.type === 'curve') {
                var aPts = orig.points || (orig.p1 ? [orig.p1, orig.p2, orig.p3, orig.p4] : []);
                item.points = [];
                for (var pi = 0; pi < aPts.length; pi++) {
                    item.points.push(rotatePoint(aPts[pi], drag.groupCx, drag.groupCy, diff));
                }
                if (item.type === 'curve' && item.points.length >= 2) {
                    item.x = item.points[0].x; item.y = item.points[0].y;
                    item.x2 = item.points[item.points.length - 1].x; item.y2 = item.points[item.points.length - 1].y;
                }
            } else if (item.type === 'arrow' || item.type === 'line' || item.type === 'dimension' || item.type === 'slope') {
                var p1 = rotatePoint({ x: orig.x, y: orig.y }, drag.groupCx, drag.groupCy, diff);
                var p2 = rotatePoint({ x: orig.x2, y: orig.y2 }, drag.groupCx, drag.groupCy, diff);
                item.x = p1.x; item.y = p1.y;
                item.x2 = p2.x; item.y2 = p2.y;
            } else if ((item.type === 'pen' || item.type === 'highlighter') && orig.points) {
                item.points = [];
                for (var pi = 0; pi < orig.points.length; pi++) {
                    item.points.push(rotatePoint(orig.points[pi], drag.groupCx, drag.groupCy, diff));
                }
            } else {
                var origCx = orig.x + orig.w / 2;
                var origCy = orig.y + orig.h / 2;
                var newCenter = rotatePoint({ x: origCx, y: origCy }, drag.groupCx, drag.groupCy, diff);
                item.x = newCenter.x - orig.w / 2;
                item.y = newCenter.y - orig.h / 2;
                if ('angle' in item) {
                    item.angle = (orig.angle || 0) + diff;
                }
            }
        }
    }
    else if (k === 'move') { 
        for (var si = 0; si < selectedIndices.length; si++) {
            var idx = selectedIndices[si];
            var orig = drag.originals[idx];
            var item = items[idx];
            if (item.type === 'skewbox' || item.type === 'curve') {
                var aPts = orig.points || (orig.p1 ? [orig.p1, orig.p2, orig.p3, orig.p4] : []);
                item.points = [];
                for (var pi = 0; pi < aPts.length; pi++) {
                    item.points.push({ x: aPts[pi].x + offX, y: aPts[pi].y + offY });
                }
                if (item.type === 'curve' && item.points.length >= 2) {
                    item.x = item.points[0].x; item.y = item.points[0].y;
                    item.x2 = item.points[item.points.length - 1].x; item.y2 = item.points[item.points.length - 1].y;
                }
            } else {
                item.x = orig.x + offX; 
                item.y = orig.y + offY; 
                if (item.type === 'arrow' || item.type === 'line' || item.type === 'dimension' || item.type === 'slope') { 
                    item.x2 = orig.x2 + offX; item.y2 = orig.y2 + offY; 
                } else if ((item.type === 'pen' || item.type === 'highlighter') && orig.points) {
                    item.points = [];
                    for (var pi = 0; pi < orig.points.length; pi++) {
                        item.points.push({ x: orig.points[pi].x + offX, y: orig.points[pi].y + offY });
                    }
                }
            }
        }
    }
    else if (o && (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope')) { 
        if (k === 'start') { 
            applyLinePoint(o, p, true, e.shiftKey);
            if (o.type === 'slope' && !o.lockHeights && o.pixelsPerUnit && o.pixelsPerUnit > 0) {
                var dY = o.y - a.y;
                o.depthA = Math.max(0, a.depthA + (dY / o.pixelsPerUnit));
            }
        } else if (k === 'end') { 
            applyLinePoint(o, p, false, e.shiftKey);
            if (o.type === 'slope' && !o.lockHeights && o.pixelsPerUnit && o.pixelsPerUnit > 0) {
                var dY = o.y2 - a.y2;
                o.depthB = Math.max(0, a.depthB + (dY / o.pixelsPerUnit));
            }
        } else if (k === 'new') {
            applyLinePoint(o, p, false, e.shiftKey);
        }

        var currentLen = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2));
        if (o.type === 'dimension' && o.pixelsPerUnit) {
            updateDimensionText(o, currentLen);
        } else if (o.type === 'slope') {
            updateSlopeText(o, currentLen);
        }
        
    }
    else if (o && o.type === 'curve' && k.indexOf('curve_pt_') === 0) {
        var ptIdx = parseInt(k.substring(9));
        if (o.points && o.points[ptIdx]) {
            o.points[ptIdx] = { x: p.x, y: p.y };
            o.x = o.points[0].x; o.y = o.points[0].y;
            o.x2 = o.points[o.points.length - 1].x; o.y2 = o.points[o.points.length - 1].y;
        }
    }
    else if (o && (o.type === 'pen' || o.type === 'highlighter') && k === 'new') {
        o.points.push({ x: p.x, y: p.y });
    }
    else if (k === 'text_arrow' && o && o.type === 'text') {
        var tcx = o.x + o.w / 2, tcy = o.y + o.h / 2, tAng = o.angle || 0;
        var lp = rotatePoint(p, tcx, tcy, tAng);            // pointer in the label's own frame
        var vx = lp.x - tcx, vy = lp.y - tcy;
        var vd = Math.sqrt(vx * vx + vy * vy);
        if (vd > 1) {
            var newAng = Math.atan2(vy, vx);
            if (e.shiftKey) {
                var inc = 10 * Math.PI / 180;
                newAng = Math.round((newAng + tAng) / inc) * inc - tAng;
            }
            var edgeD = textArrowEdgeDist(o, Math.cos(newAng), Math.sin(newAng));
            o.arrowAngle = newAng;
            o.arrowLen = Math.max(TEXT_ARROW_MIN, vd - edgeD);
        }
    }
    else if (k === 'rotate' && targetIdx >= 0) {
        if (o.type === 'skewbox') {
            var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
            var cx = 0, cy = 0;
            for (var i = 0; i < pts.length; i++) { cx += pts[i].x; cy += pts[i].y; }
            cx /= pts.length; cy /= pts.length;
            var aPts = a.points || (a.p1 ? [a.p1, a.p2, a.p3, a.p4] : []);
            var initialAngle = Math.atan2(drag.p.y - cy, drag.p.x - cx);
            var currentAngle = Math.atan2(p.y - cy, p.x - cx);
            var diff = initialAngle - currentAngle;
            o.points = [];
            for (var i = 0; i < aPts.length; i++) {
                o.points.push(rotatePoint(aPts[i], cx, cy, diff));
            }
        } else {
            var b = { x: a.x, y: a.y, w: a.w, h: a.h };
            var cx = b.x + b.w / 2;
            var cy = b.y + b.h / 2;
            var initialAngle = Math.atan2(drag.p.y - cy, drag.p.x - cx);
            var currentAngle = Math.atan2(p.y - cy, p.x - cx);
            var diff = currentAngle - initialAngle;
            o.angle = (a.angle || 0) + diff;
        }
    }
    else if (k === 'oval' && targetIdx >= 0) {
        var angle = a.angle || 0;
        var localDy = -Math.sin(angle) * offX + Math.cos(angle) * offY;
        var origRy = a.fixedRy || Math.min(a.h * 0.5, Math.max(8, Math.min(a.h * 0.15, (a.w / 2) * 0.6, 25)));
        var newRy = origRy + (localDy * 0.5);
        o.fixedRy = Math.max(4, Math.min(a.h * 0.49, newRy));
    }
    else if (k === 'new' && targetIdx >= 0) { 
        if (o.type === 'skewbox') {
            var x1 = drag.p.x, y1 = drag.p.y;
            var x2 = p.x, y2 = p.y;
            if (e.shiftKey) {
                var side = Math.max(Math.abs(x2 - x1), Math.abs(y2 - y1));
                var signX = (x2 >= x1) ? 1 : -1;
                var signY = (y2 >= y1) ? 1 : -1;
                x2 = x1 + signX * side;
                y2 = y1 + signY * side;
            }
            var minX = Math.min(x1, x2), maxX = Math.max(x1, x2);
            var minY = Math.min(y1, y2), maxY = Math.max(y1, y2);
            o.points = [
                { x: minX, y: minY }, 
                { x: maxX, y: minY }, 
                { x: maxX, y: maxY }, 
                { x: minX, y: maxY }
            ];
        } else if (o.type === 'curve') {
            applyLinePoint(o, p, false, e.shiftKey);
            if (o.points && o.points.length >= 2) {
                o.points[o.points.length - 1] = { x: o.x2, y: o.y2 };
				if (o.points.length === 3) {
                    o.points[1] = { x: (o.x + o.x2) / 2, y: (o.y + o.y2) / 2 };
                }
            }
        } else if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') { 
            applyLinePoint(o, p, false, e.shiftKey);
        } else { 
            var dw = Math.abs(offX), dh = Math.abs(offY);
            var ox = Math.min(drag.p.x, p.x);
            var oy = Math.min(drag.p.y, p.y);
            if (e.shiftKey) {
                var side = Math.max(dw, dh);
                dw = side; dh = side;
                if (p.x < drag.p.x) ox = drag.p.x - side;
                if (p.y < drag.p.y) oy = drag.p.y - side;
            }
            o.x = ox; o.y = oy; 
            o.w = Math.max(1, dw); o.h = Math.max(1, dh); 
            if (o.type === 'cylinder') { o.fixedRy = Math.min(o.h * 0.5, Math.max(8, Math.min(o.h * 0.15, (o.w / 2) * 0.6, 25))); } 
        } 
    }
    else if (targetIdx >= 0) {
        if (o.type === 'skewbox') {
            if (k.indexOf('pt_') === 0) {
                var idx = parseInt(k.substring(3));
                if (!o.points) o.points = [o.p1, o.p2, o.p3, o.p4];
                o.points[idx] = { x: p.x, y: p.y };
            }
        } else if (o.type === 'text') {
            var left = a.x, top = a.y, right = a.x + a.w, bottom = a.y + a.h;
            if (k.indexOf('w') >= 0) left = Math.min(p.x, right - 20); else right = Math.max(p.x, left + 20);
            if (k.indexOf('n') >= 0) top = Math.min(p.y, bottom - 20); else bottom = Math.max(p.y, top + 20);
            var newW = Math.max(20, right - left), newH = Math.max(20, bottom - top);
            var ratio = Math.max(newW / a.w, newH / a.h);
            o.font = Math.round(
    Math.max(6, Math.min(500, a.font * ratio))
);

textBounds(o);

toolDefaults.text.font = o.font;
$('fontSize').value = o.font;
            o.x = k.indexOf('w') >= 0 ? a.x + a.w - o.w : a.x;
            o.y = k.indexOf('n') >= 0 ? a.y + a.h - o.h : a.y;
        } else if ((o.type === 'pen' || o.type === 'highlighter')) {
            var b = { x: a.x, y: a.y, w: a.w, h: a.h };
            var left = a.x, top = a.y, right = a.x + a.w, bottom = a.y + a.h;
            if (k.indexOf('w') >= 0) left = Math.min(p.x, right - 20); else right = Math.max(p.x, left + 20);
            if (k.indexOf('n') >= 0) top = Math.min(p.y, bottom - 20); else bottom = Math.max(p.y, top + 20);
            o.x = left; o.y = top; o.w = Math.max(20, right - left); o.h = Math.max(20, bottom - top);
            var scaleX = o.w / b.w, scaleY = o.h / b.h;
            o.points = [];
            for (var pi = 0; pi < a.points.length; pi++) {
                o.points.push({ x: o.x + (a.points[pi].x - b.x) * scaleX, y: o.y + (a.points[pi].y - b.y) * scaleY });
            }
        } else {
            var isRotatedShape = ((o.type === 'cylinder' || o.type === 'box' || o.type === 'circle' || o.type === 'text') && a.angle);
            var udx = offX, udy = offY;
            if (isRotatedShape) {
                var cos = Math.cos(-a.angle), sin = Math.sin(-a.angle);
                udx = (cos * offX) - (sin * offY);
                udy = (sin * offX) + (cos * offY);
            }
            if (isRotatedShape) {
                var newW = a.w, newH = a.h, dLocalX = 0, dLocalY = 0;
                if (k === 'e') { newW = Math.max(20, a.w + udx); dLocalX = (newW - a.w) / 2; }
                else if (k === 'w') { newW = Math.max(20, a.w - udx); dLocalX = -(newW - a.w) / 2; }
                else if (k === 's') { newH = Math.max(20, a.h + udy); dLocalY = (newH - a.h) / 2; }
                else if (k === 'n') { newH = Math.max(20, a.h - udy); dLocalY = -(newH - a.h) / 2; }
                else if (k === 'nw') { newW = Math.max(20, a.w - udx); newH = Math.max(20, a.h - udy); dLocalX = -(newW - a.w) / 2; dLocalY = -(newH - a.h) / 2; }
                else if (k === 'ne') { newW = Math.max(20, a.w + udx); newH = Math.max(20, a.h - udy); dLocalX = (newW - a.w) / 2; dLocalY = -(newH - a.h) / 2; }
                else if (k === 'sw') { newW = Math.max(20, a.w - udx); newH = Math.max(20, a.h + udy); dLocalX = -(newW - a.w) / 2; dLocalY = (newH - a.h) / 2; }
                else if (k === 'se') { newW = Math.max(20, a.w + udx); newH = Math.max(20, a.h + udy); dLocalX = (newW - a.w) / 2; dLocalY = (newH - a.h) / 2; }

                if (e.shiftKey && (o.type === 'box' || o.type === 'circle' || o.type === 'cylinder')) {
                    var side = Math.max(newW, newH);
                    newW = side; newH = side;
                }

                var origCx = a.x + a.w / 2, origCy = a.y + a.h / 2, angle = a.angle || 0;
                var worldDx = dLocalX * Math.cos(angle) - dLocalY * Math.sin(angle);
                var worldDy = dLocalX * Math.sin(angle) + dLocalY * Math.cos(angle);
                o.w = newW; o.h = newH; o.x = origCx + worldDx - newW / 2; o.y = origCy + worldDy - newH / 2;
            } else {
                var left = a.x, top = a.y, right = a.x + a.w, bottom = a.y + a.h;
                if (k === 'nw') { left = Math.min(a.x + udx, right - 20); top = Math.min(a.y + udy, bottom - 20); }
                else if (k === 'ne') { right = Math.max(a.x + a.w + udx, left + 20); top = Math.min(a.y + udy, bottom - 20); }
                else if (k === 'sw') { left = Math.min(a.x + udx, right - 20); bottom = Math.max(a.y + a.h + udy, top + 20); }
                else if (k === 'se') { right = Math.max(a.x + a.w + udx, left + 20); bottom = Math.max(a.y + a.h + udy, top + 20); }
                else if (k === 'n') { top = Math.min(a.y + udy, bottom - 20); }
                else if (k === 's') { bottom = Math.max(a.y + a.h + udy, top + 20); }
                else if (k === 'w') { left = Math.min(a.x + udx, right - 20); }
                else if (k === 'e') { right = Math.max(a.x + a.w + udx, left + 20); }

                var newW = Math.max(20, right - left);
                var newH = Math.max(20, bottom - top);

                if (e.shiftKey && (o.type === 'box' || o.type === 'circle' || o.type === 'cylinder')) {
                    var side = Math.max(newW, newH);
                    newW = side; newH = side;
                    if (k === 'nw' || k === 'w' || k === 'sw') left = right - side;
                    if (k === 'nw' || k === 'n' || k === 'ne') top = bottom - side;
                    if (k === 'ne' || k === 'e' || k === 'se') right = left + side;
                    if (k === 'sw' || k === 's' || k === 'se') bottom = top + side;
                }

                o.x = left; o.y = top; o.w = newW; o.h = newH;
            }
            if (o.type === 'cylinder' && !o.fixedRy && a.fixedRy) o.fixedRy = a.fixedRy;
        }
    }
    draw();
    sync();
    if (longSectionVisible) renderLongSection();
}

function up() { 
    if (!drag) return;

    if (drag.kind === 'crop_new') {
        drag = null;
        if (cropRect && cropRect.w > 20 && cropRect.h > 20) {
            if (confirm("Apply crop to image?")) {
                executeCrop();
            } else {
                cropRect = null;
                draw();
            }
        } else {
            cropRect = null;
            draw();
        }
        return;
    }

    var createdNewDimension = (drag.kind === 'new' && items.length > 0 && (items[items.length - 1].type === 'dimension' || items[items.length - 1].type === 'slope'));        
    var newDimensionIdx = createdNewDimension ? items.length - 1 : -1;

    if (drag.kind === 'new' && items.length > 0) {
        var newItem = items[items.length - 1];
        var isValid = true;

        if (newItem.type === 'box' || newItem.type === 'circle' || newItem.type === 'cylinder' || newItem.type === 'skewbox') {
            var b = bounds(newItem);
            if (b.w < 5 && b.h < 5) isValid = false;
        } else if (newItem.type === 'arrow' || newItem.type === 'line' || newItem.type === 'dimension' || newItem.type === 'slope' || newItem.type === 'curve') {
            var len = Math.sqrt(Math.pow(newItem.x2 - newItem.x, 2) + Math.pow(newItem.y2 - newItem.y, 2));
            if (len < 5) isValid = false;
        } else if (newItem.type === 'pen' || newItem.type === 'highlighter') {
            if (!newItem.points || newItem.points.length < 2) isValid = false;
        }

        if (!isValid && !createdNewDimension) {
            items.pop();
            selectedIndices = [];
            drag = null;
            sync();
            draw();
            return;
        }

        var toolName = newItem.type.charAt(0).toUpperCase() + newItem.type.slice(1);
        if (newItem.type === 'dimension') toolName = 'Measurement';
        if (newItem.type === 'slope') toolName = 'Pipe Slope';
        
        // Finalize state and snapshot AFTER shape is saved into items array
        var beforeDraw = copyObj(drag.originals);
        beforeDraw.pop();
        remember(toolName + ' Drawn', beforeDraw);
        selectedIndices = []; 
    } 
    else if (drag.kind === 'move' || drag.kind === 'rotate' || drag.kind === 'group_rotate' || drag.kind === 'oval' || drag.kind === 'text_arrow' || (typeof drag.kind === 'string' && (drag.kind.indexOf('pt_') === 0 || drag.kind.indexOf('curve_pt_') === 0))) {
        var before = drag.originals;
        if (!before || JSON.stringify(before) !== JSON.stringify(items)) {
            remember('Modified ' + (selectedIndices.length > 1 ? selectedIndices.length + ' Items' : 'Layer'), before);
        }
    }

    drag = null; 
    sync(); 
    draw(); 

    if (newDimensionIdx >= 0) {
        showDimension(newDimensionIdx, true);
    }
}

function copySelection() {
    if (selectedIndices.length === 0) return;
    clipboard = [];
    for (var i = 0; i < selectedIndices.length; i++) {
        clipboard.push(copyObj(items[selectedIndices[i]]));
    }
    pasteOffsetCount = 0;
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        var payload = JSON.stringify({ type: 'photomarkup_shapes', data: clipboard });
        navigator.clipboard.writeText(payload).catch(function(err) {});
    }
    
    status('Copied ' + clipboard.length + ' item(s) to clipboard.');
}

function pasteSelection() {
    if (clipboard.length === 0) return;
    remember();
    selectedIndices = [];
    pasteOffsetCount++;
    var off = pasteOffsetCount * 20;
    var newGroupId = clipboard.length > 1 ? 'group_' + Math.random().toString(36).substr(2, 9) : null;
    
    for (var i = 0; i < clipboard.length; i++) {
        var clone = copyObj(clipboard[i]);
        if (clone.type === 'skewbox' || clone.type === 'curve') {
            var pts = clone.points || [];
            clone.points = [];
            for (var pi = 0; pi < pts.length; pi++) {
                clone.points.push({ x: pts[pi].x + off, y: pts[pi].y + off });
            }
            if (clone.type === 'curve' && clone.points.length >= 2) {
                clone.x = clone.points[0].x; clone.y = clone.points[0].y;
                clone.x2 = clone.points[clone.points.length - 1].x; clone.y2 = clone.points[clone.points.length - 1].y;
            }
        } else if (clone.type === 'arrow' || clone.type === 'line' || clone.type === 'dimension' || clone.type === 'slope') {
            clone.x += off; clone.y += off; clone.x2 += off; clone.y2 += off;
        } else if ((clone.type === 'pen' || clone.type === 'highlighter') && clone.points) {
            for (var pi = 0; pi < clone.points.length; pi++) { clone.points[pi].x += off; clone.points[pi].y += off; }
        } else {
            clone.x += off; clone.y += off;
        }
        if (newGroupId) clone.groupId = newGroupId;
        items.push(clone);
        selectedIndices.push(items.length - 1);
    }
    sync();
    draw();
    status('Pasted ' + clipboard.length + ' item(s).');
}

var contextMenuTargetNodeIdx = -1;

function showContextMenu(e) {
    e.preventDefault();
    var p = point(e);
    
    var clickedNodeIdx = -1;
    var clickedTargetIdx = -1;
    
    // Check if right-clicking directly on a node of a selected curve or skew box
    for (var si = 0; si < selectedIndices.length; si++) {
        var idx = selectedIndices[si];
        var o = items[idx];
        if (o && (o.type === 'curve' || o.type === 'skewbox')) {
            var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
            for (var pi = 0; pi < pts.length; pi++) {
                if (Math.abs(p.x - pts[pi].x) < 14 / scale && Math.abs(p.y - pts[pi].y) < 14 / scale) {
                    clickedTargetIdx = idx;
                    clickedNodeIdx = pi;
                    break;
                }
            }
            if (clickedNodeIdx >= 0) break;
        }
    }

    var hitIdx = -1;
    if (clickedTargetIdx < 0) {
        for (var i = items.length - 1; i >= 0; i--) {
            if (hit(items[i], p) || (items[i].locked && isPointInsideObject(items[i], p))) { 
                hitIdx = i; 
                break; 
            }
        }
    }

    contextMenuTarget = (clickedTargetIdx >= 0) ? clickedTargetIdx : hitIdx;
    contextMenuTargetNodeIdx = clickedNodeIdx;

	if (contextMenuTarget >= 0 && items[contextMenuTarget]) {
        var targetObj = items[contextMenuTarget];
        $('menu_lockToggle').style.display = 'block';
        $('menu_lockDivider').style.display = 'block';
        $('menu_lockToggle').innerText = targetObj.locked ? 'Unlock Layer(s)' : 'Lock Layer(s)';
    } else {
        $('menu_lockToggle').style.display = 'none';
        $('menu_lockDivider').style.display = 'none';
    }

    if (hitIdx >= 0 && !selectedIndices.includes(hitIdx)) {
        if (items[hitIdx].groupId) {
            selectedIndices = [];
            for (var gi = 0; gi < items.length; gi++) {
                if (items[gi].groupId === items[hitIdx].groupId) selectedIndices.push(gi);
            }
        } else {
            selectedIndices = [hitIdx];
        }
        sync();
        draw();
    }

    var canGroup = selectedIndices.length >= 2;
    var hasGroupedSelected = false;
    for (var si = 0; si < selectedIndices.length; si++) {
        if (items[selectedIndices[si]] && items[selectedIndices[si]].groupId) {
            hasGroupedSelected = true;
            break;
        }
    }
    var clickedInGroup = (hitIdx >= 0 && items[hitIdx] && items[hitIdx].groupId);
    var multipleSelected = selectedIndices.length > 1;
    var canDeleteNode = false;
    if (clickedTargetIdx >= 0 && items[clickedTargetIdx]) {
        var targetObj = items[clickedTargetIdx];
        var pts = targetObj.points || (targetObj.p1 ? [targetObj.p1, targetObj.p2, targetObj.p3, targetObj.p4] : []);
        if (pts && pts.length > 3) {
            canDeleteNode = true;
        }
    }

    $('menu_group').style.display = canGroup ? 'block' : 'none';
    $('menu_ungroup').style.display = hasGroupedSelected ? 'block' : 'none';
    $('menu_removeFromGroup').style.display = clickedInGroup ? 'block' : 'none';
    $('menu_deleteNode').style.display = canDeleteNode ? 'block' : 'none';
    $('menu_deselectAll').style.display = multipleSelected ? 'block' : 'none';
    $('menu_deselectOne').style.display = (hitIdx >= 0 && selectedIndices.length > 0) ? 'block' : 'none';

    var menu = $('contextMenu');
    menu.style.display = 'block';
    menu.style.left = e.clientX + 'px';
    menu.style.top = e.clientY + 'px';
}

function menuAction(action) {
    $('contextMenu').style.display = 'none';
    if (action === 'group') {
        if (selectedIndices.length < 2) { status('Select at least 2 items to group.'); return; }
        remember();
        var gid = 'group_' + Math.random().toString(36).substr(2, 9);
        for (var i = 0; i < selectedIndices.length; i++) {
            items[selectedIndices[i]].groupId = gid;
        }
        status('Grouped ' + selectedIndices.length + ' items.');
        draw();
    } else if (action === 'deleteNode') {
        if (contextMenuTarget >= 0 && contextMenuTargetNodeIdx >= 0 && items[contextMenuTarget]) {
            var o = items[contextMenuTarget];
            if (o.type === 'curve' && o.points && o.points.length > 3) {
                remember();
                o.points.splice(contextMenuTargetNodeIdx, 1);
                o.x = o.points[0].x; o.y = o.points[0].y;
                o.x2 = o.points[o.points.length - 1].x; o.y2 = o.points[o.points.length - 1].y;
                sync();
                draw();
                status('Deleted curve node.');
            } else if (o.type === 'skewbox') {
                var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
                if (pts && pts.length > 3) {
                    remember();
                    pts.splice(contextMenuTargetNodeIdx, 1);
                    o.points = pts;
                    sync();
                    draw();
                    status('Deleted skew box node.');
                }
            }
        }
    } else if (action === 'ungroup') {
        remember();
        for (var i = 0; i < selectedIndices.length; i++) {
            items[selectedIndices[i]].groupId = null;
        }
        selectedIndices = [];
        status('Ungrouped selected items and deselected them.');
        sync();
        draw();
    } else if (action === 'removeFromGroup') {
        if (contextMenuTarget >= 0 && items[contextMenuTarget] && items[contextMenuTarget].groupId) {
            remember();
            items[contextMenuTarget].groupId = null;
            checkGroups();
            selectedIndices = selectedIndices.filter(function(idx) { return idx !== contextMenuTarget; });
            status('Removed item from group.');
            sync();
            draw();
        } else {
            status('Clicked item is not part of a group.');
        }
    } else if (action === 'copy') {
        copySelection();
    } else if (action === 'deselectOne') {
        if (contextMenuTarget >= 0) {
            var targetGroup = items[contextMenuTarget].groupId;
            if (targetGroup) {
                selectedIndices = selectedIndices.filter(function(idx) { return items[idx].groupId !== targetGroup; });
            } else {
                selectedIndices = selectedIndices.filter(function(idx) { return idx !== contextMenuTarget; });
            }
            sync();
            draw();
        }
    } else if (action === 'deselectAll') {
        selectedIndices = [];
        sync();
        draw();
    } else if (action === 'delete') {
        removeSelected();
    } else if (action === 'lockToggle') {
        if (contextMenuTarget >= 0 && items[contextMenuTarget]) {
            remember();
            var targetObj = items[contextMenuTarget];
            var newLockState = !targetObj.locked;
            
            if (targetObj.groupId) {
                // Lock or unlock all items in the group
                for (var i = 0; i < items.length; i++) {
                    if (items[i].groupId === targetObj.groupId) {
                        items[i].locked = newLockState;
                        if (newLockState) {
                            selectedIndices = selectedIndices.filter(function(idx) { return idx !== i; });
                        }
                    }
                }
                status(newLockState ? 'Group locked.' : 'Group unlocked.');
            } else {
                // Single item fallback
                targetObj.locked = newLockState;
                if (targetObj.locked) {
                    selectedIndices = selectedIndices.filter(function(idx) { return idx !== contextMenuTarget; });
                }
                status(newLockState ? 'Layer locked.' : 'Layer unlocked.');
            }
            sync();
            draw();
        }
    }
}

function showText(index, p) { 
    pendingText = { index: index, p: p, isDimension: false, isNewCreation: (index === null) }; 
    $('dialogTitle').innerText = 'Label text';
    $('dialogHint').style.display = 'block';
    $('textEditorContainer').style.display = 'block';
    $('dimEditorContainer').style.display = 'none';
    
    var val = index === null ? '' : items[index].text;
    
    $('editValue').value = val; 
    $('editBold').checked = index === null ? $('bold').checked : items[index].bold;
    $('editUppercase').checked = index === null ? $('uppercase').checked : !!items[index].uppercase;
    $('modal').style.display = 'block'; 
    $('editValue').focus(); 
}

function showDimension(index, isNew) {
    pendingText = { index: index, p: null, isDimension: true, isNewCreation: !!isNew };
    var objType = items[index].type;
    $('dialogTitle').innerText = isNew ? (objType === 'slope' ? 'Pipe Slope & Depths' : 'Line Marking') : 'Set Measurement';
    $('dialogHint').style.display = 'none';
    $('textEditorContainer').style.display = 'none';
    $('dimEditorContainer').style.display = 'block';
    
    var isSlope = (objType === 'slope');
    $('slopeInputsDiv').style.display = isSlope ? 'block' : 'none';
    
    if (isSlope) {
        $('editSlopeLLA').value = (items[index].llA !== undefined && items[index].llA !== null) ? items[index].llA : '';
        $('editSlopeLLB').value = (items[index].llB !== undefined && items[index].llB !== null) ? items[index].llB : '';
        $('editSlopeDepthA').value = items[index].depthA !== undefined ? items[index].depthA : 1.20;
        $('editSlopeDepthB').value = items[index].depthB !== undefined ? items[index].depthB : 1.50;
        $('editLockHeights').checked = items[index].lockHeights !== undefined ? items[index].lockHeights : true;
        var carryRow = $('slopeCarryRow');
        if (carryRow) {
            var showCarry = !!(isNew && slopeCarryPending);
            carryRow.style.display = showCarry ? 'block' : 'none';
            if (showCarry) $('editSlopeCarry').value = slopeCarryPending.side || 'none';
        }
        updateSlopeInvertPreview();
    }
    
    var currentText = items[index].text || '?';
    var currentPixels = Math.sqrt(Math.pow(items[index].x2 - items[index].x, 2) + Math.pow(items[index].y2 - items[index].y, 2));
    
    if (items[index].dimVal !== undefined) {
        $('editDimValue').value = items[index].dimVal;
        $('editDimUnit').value = items[index].dimUnit || 'm';
        $('editDimCustomText').value = '';
    } else if (items[index].pixelsPerUnit && items[index].pixelsPerUnit > 0) {
        var calcVal = currentPixels / items[index].pixelsPerUnit;
        $('editDimValue').value = parseFloat(calcVal.toFixed(2));
        $('editDimUnit').value = 'm';
        $('editDimCustomText').value = '';
    } else if (isMeasurementText(currentText)) {
        var parsed = parseDimText(currentText);
        $('editDimValue').value = parsed.val;
        $('editDimUnit').value = parsed.unit;
        $('editDimCustomText').value = '';
    } else {
        $('editDimValue').value = isSlope ? '15' : '1.0';
        $('editDimUnit').value = 'm';
        $('editDimCustomText').value = currentText;
        $('editDimBold').checked = items[index].bold !== undefined ? items[index].bold : true;
        $('editDimUppercase').checked = items[index].uppercase !== undefined ? items[index].uppercase : true;
    }
    
    if (items[index].parallelText !== undefined) {
        $('editDimParallel').checked = items[index].parallelText;
    }
    
    switchDimTab(lastDimTab);
    
    $('dimError').style.display = 'none';
    $('editDimValue').style.borderColor = '#52667f';

    $('modal').style.display = 'block';
    if (lastDimTab === 'measurement') {
        $('editDimValue').focus();
        $('editDimValue').select();
    } else {
        $('editDimCustomText').focus();
    }
}

function isMeasurementText(text) {
    if (!text || text === '?') return true;
    return /^([\d.]+)\s*(m|mm)?$/i.test(text.trim());
}

function parseDimText(text) {
    if (!text || text === '?') return { val: 1.0, unit: 'm' };
    var match = text.match(/^([\d.]+)\s*(m|mm)?$/i);
    if (match) {
        return { val: parseFloat(match[1]) || 1.0, unit: (match[2] || 'm').toLowerCase() };
    }
    return { val: 1.0, unit: 'm' };
}

function validateDimInput() {
    var valStr = $('editDimValue').value.trim();
    var errEl = $('dimError');
    var inputEl = $('editDimValue');
    if (valStr === '' || isNaN(valStr) || Number(valStr) < 0) {
        errEl.style.display = 'block';
        inputEl.style.borderColor = '#ff6b6b';
        return false;
    } else {
        errEl.style.display = 'none';
        inputEl.style.borderColor = '#52667f';
        return true;
    }
}

function stepDimModal(delta) {
    var el = $('editDimValue');
    var val = parseFloat(el.value);
    if (!isFinite(val)) val = 1.0;
    var unit = $('editDimUnit').value;
    val = Math.max(0, val + delta * (unit === 'mm' ? 10 : 0.5));
    el.value = parseFloat(val.toFixed(unit === 'mm' ? 0 : 2));
    validateDimInput();
}

function setUnknownDim() {
    if (!pendingText || !pendingText.isDimension) return;
    remember();
    items[pendingText.index].text = '?';
    items[pendingText.index].pixelsPerUnit = null;
    items[pendingText.index].parallelText = $('editDimParallel').checked;
    
    $('modal').style.display = 'none'; 
    pendingText = null; 
    
    if (tool !== 'dimension' && tool !== 'slope') {
        setTool('select');
    }
    selectedIndices = []; 
    sync();
    draw();
    status('Measurement set to Unknown (?).');
}

function editText() { 
    var primaryIdx = selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1;
    if (primaryIdx >= 0) {
        var o = items[primaryIdx];
        if (o.type === 'text') {
            showText(primaryIdx, null);
        } else if (o.type === 'dimension' || o.type === 'slope') {
            showDimension(primaryIdx, false);
        }
    } else {
        status('Select a text label, measurement, or slope line first.');
    }
}

function finishText() {
    remember();
    if (pendingText.isDimension) {
        var s = '?';
        var savedIndex = pendingText.index;
        var o = items[savedIndex];

        if (lastDimTab === 'measurement') {
            if (!validateDimInput()) {
                return;
            }
            var numVal = parseFloat($('editDimValue').value.trim());
            var unitVal = $('editDimUnit').value;
            if (isNaN(numVal)) numVal = (o.type === 'slope') ? 15 : 1.0;

            var decimals = (unitVal === 'mm') ? 1 : 2;
            s = numVal.toFixed(decimals) + unitVal;
            
            var currentPixels = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2));
            if (currentPixels > 0) {
                o.pixelsPerUnit = currentPixels / numVal;
            }

            o.dimVal = numVal;
            o.dimUnit = unitVal;

            o.bold = false;
            o.uppercase = false;
        } else {
            s = $('editDimCustomText').value.replace(/\r/g, '');
            if ($('editDimUppercase').checked) s = s.toUpperCase();
            if (!s.trim()) s = '?';
            o.bold = $('editDimBold').checked;
            o.uppercase = $('editDimUppercase').checked;
            o.pixelsPerUnit = null;
        }
        
        o.text = s;
        o.parallelText = $('editDimParallel').checked;
        
        if (o.type === 'slope') {
            o.llA = $('editSlopeLLA').value.trim() || null;
            o.llB = $('editSlopeLLB').value.trim() || null;
            var depthAValue = Number($('editSlopeDepthA').value);
            var depthBValue = Number($('editSlopeDepthB').value);
            o.depthA = isFinite(depthAValue) && $('editSlopeDepthA').value.trim() !== '' ? Math.max(0, depthAValue) : 1.20;
            o.depthB = isFinite(depthBValue) && $('editSlopeDepthB').value.trim() !== '' ? Math.max(0, depthBValue) : 1.50;
            o.lockHeights = $('editLockHeights').checked;
            var curLen = Math.sqrt(Math.pow(o.x2 - o.x, 2) + Math.pow(o.y2 - o.y, 2));
            updateSlopeText(o, curLen);
            updateLongSectionAvailability();
        }
        
        $('modal').style.display = 'none';
        pendingText = null;
        
        if (tool !== 'dimension' && tool !== 'slope') {
            setTool('select');
        }
        selectedIndices = []; 
        sync();
        draw();
        return;
    }

    var s = $('editValue').value.replace(/\r/g, ''); 
    if (!s.replace(/\s/g, '')) { cancelText(); return; }
    var isBold = $('editBold').checked; 
    var isUppercase = $('editUppercase').checked;
    if (isUppercase) s = s.toUpperCase();

    if (pendingText.index === null) {
    var previousTextFont = getLastPlacedTextFont();

    var o = defaults();
    o.type = 'text';
    o.text = s;
    o.x = pendingText.p.x;
    o.y = pendingText.p.y;
    o.angle = 0;
    o.bold = isBold;
    o.uppercase = isUppercase;

    o.font = previousTextFont;

    $('fontSize').value = previousTextFont;
    toolDefaults.text.font = previousTextFont;

    o.colour = ensureTextContrast(o.colour, o.fill, o.backed);
    textBounds(o);
    if (textArrowPref) initTextArrow(o);

    items.push(o);
    selectedIndices = [items.length - 1];
} else { 
        selectedIndices = [pendingText.index]; 
        items[pendingText.index].text = s; 
        var o = items[pendingText.index];
        o.bold = isBold; 
        o.uppercase = isUppercase;
        if (o.type === 'text') textBounds(o); 
        o.colour = ensureTextContrast(o.colour, o.fill, o.backed);
    }
    $('labelText').value = s; 
$('bold').checked = isBold; 
$('uppercase').checked = isUppercase;

cancelText(); 
setTool('select'); 
sync(); 
draw();
}
function getLastPlacedTextFont() {
    for (var i = items.length - 1; i >= 0; i--) {
        if (
            items[i] &&
            items[i].type === 'text' &&
            isFinite(parseFloat(items[i].font))
        ) {
            return Math.max(6, Math.min(500, Math.round(parseFloat(items[i].font))));
        }
    }

    return Math.round(num('fontSize', 6, 500, 28));
}

function updateDimensionText(o, currentPixels) {
    if (!o.pixelsPerUnit || o.pixelsPerUnit <= 0) return;
    var calculatedValue = currentPixels / o.pixelsPerUnit;
    var unit = 'm';
    if (o.text && o.text.toLowerCase().indexOf('mm') !== -1) {
        unit = 'mm';
    }
    var decimals = (unit === 'mm') ? 1 : 2;
    o.dimVal = parseFloat(calculatedValue.toFixed(decimals));
    o.text = calculatedValue.toFixed(decimals) + unit;
}
function updateSlopeInvertPreview() {
    var pairs = [
        { ll: 'editSlopeLLA', depth: 'editSlopeDepthA', out: 'editSlopeInvA', label: 'A-INV' },
        { ll: 'editSlopeLLB', depth: 'editSlopeDepthB', out: 'editSlopeInvB', label: 'B-INV' }
    ];
    pairs.forEach(function(p) {
        var llText = $(p.ll).value.trim();
        var depthText = $(p.depth).value.trim();
        var ll = parseLL(llText), depth = depthText !== '' && isFinite(Number(depthText)) ? Number(depthText) : null;
        var el = $(p.out);
        if (!el) return;
        el.textContent = (ll !== null && depth !== null) ? p.label + ': ' + (ll - depth).toFixed(3) + 'm' : p.label + ': TBC (enter LL and depth)';
    });
}

function getSlopeInvert(o, endB) {
    var ll = parseLL(endB ? o.llB : o.llA);
    var depth = endB ? (o.depthB !== undefined ? o.depthB : 1.50) : (o.depthA !== undefined ? o.depthA : 1.20);
    return ll === null ? null : ll - depth;
}
// Slope carry-over: the downstream end of the previous slope feeds the upstream side of the next one.
var slopeCarryPending = null;
// Downstream = lower invert (same rule as the flow arrow). If LL isn't entered on both ends, the deeper
// end is treated as downstream. If there's no clear difference, side B (the end the line was drawn to).
function getSlopeDownstreamEnd(o) {
    var dA = o.depthA !== undefined ? o.depthA : 1.20, dB = o.depthB !== undefined ? o.depthB : 1.50;
    var invA = getSlopeInvert(o, false), invB = getSlopeInvert(o, true);
    var a = (invA !== null && invB !== null) ? invA : -dA;
    var b = (invA !== null && invB !== null) ? invB : -dB;
    return (a < b - 0.0005) ? 'A' : 'B';
}
function getCarryFromPreviousSlope() {
    var list = getSlopeItems();
    var prev = list.length ? list[list.length - 1] : null;
    if (!prev) return null;
    var end = getSlopeDownstreamEnd(prev);
    var ll = end === 'B' ? prev.llB : prev.llA;
    var depth = end === 'B' ? (prev.depthB !== undefined ? prev.depthB : 1.50) : (prev.depthA !== undefined ? prev.depthA : 1.20);
    return { ll: (ll === undefined || ll === null || String(ll).trim() === '') ? null : ll, depth: depth, end: end, side: null };
}
// Dialog selector: move the carried values to side A, side B, or drop them.
function applySlopeCarry() {
    var c = slopeCarryPending; if (!c) return;
    if (c.side === 'A' || c.side === 'B') {
        $('editSlopeLL' + c.side).value = '';
        $('editSlopeDepth' + c.side).value = (c.side === 'A') ? 1.20 : 1.50;
    }
    var side = $('editSlopeCarry').value;
    if (side === 'A' || side === 'B') {
        $('editSlopeLL' + side).value = c.ll === null ? '' : c.ll;
        $('editSlopeDepth' + side).value = c.depth;
        c.side = side;
    } else {
        c.side = null;
    }
    updateSlopeInvertPreview();
}
function getSlopeItems() { return items.filter(function(o) { return o && o.type === 'slope'; }); }

// A slope is "complete" for the long section only when both lid levels are entered.
function slopeHasBothLLs(o) {
    return o && parseLL(o.llA) !== null && parseLL(o.llB) !== null;
}
function getCompleteSlopeItems() {
    return getSlopeItems().filter(slopeHasBothLLs);
}
function countIncompleteSlopes() {
    return getSlopeItems().filter(function(o){ return !slopeHasBothLLs(o); }).length;
}

function updateLongSectionAvailability() {
    var complete = getCompleteSlopeItems().length;
    var total = getSlopeItems().length;
    var enabled = complete > 0;
    var title;
    if (enabled) {
        title = 'Open Long Section';
        if (total > complete) {
            title += ' (' + complete + ' of ' + total + ' slopes have both LLs)';
        }
    } else if (total > 0) {
        title = 'Enter both LL (lid level) values on a pipe slope first';
    } else {
        title = 'Draw a pipe slope first';
    }
    ['tabBtn_longsection', 'tool_longsection'].forEach(function(id) {
        var el = $(id);
        if (!el) return;
        el.title = title;
        // Fully available → normal enabled control
        // No complete slopes → still clickable so we can show a status message, but looks disabled
        if (enabled) {
            el.disabled = false;
            el.style.opacity = '';
            el.style.cursor = '';
        } else {
            el.disabled = false; // keep clickable for feedback
            el.style.opacity = '0.4';
            el.style.cursor = 'not-allowed';
        }
    });
}
function openLongSection() {
    var total = getSlopeItems().length;
    var complete = getCompleteSlopeItems().length;
    if (!total) {
        status('Draw a pipe slope before opening Long Section.');
        return;
    }
    if (!complete) {
        status('Enter both LL (lid level) values on at least one pipe slope before opening Long Section.');
        return;
    }
    switchTab('longsection');
    if (complete < total) {
        status('Long Section showing ' + complete + ' of ' + total + ' slopes (others need both LL values).');
    } else {
        status('Long Section updated from your pipe slope measurements.');
    }
}
function refreshLongSection() { updateLongSectionAvailability(); renderLongSection(); }
// Custom nodes tracking dictionaries
// Custom nodes tracking dictionaries
var longSectionCustomLidNodes = {}; 
var longSectionCustomInvNodes = {}; 

// Custom nodes tracking dictionary (Unified per slope)
var longSectionCustomNodes = {};  

function renderLongSection() {
    var c = $('longSectionCanvas'); if (!c) return;
    var g = c.getContext('2d'), slopes = getCompleteSlopeItems();
    g.clearRect(0,0,c.width,c.height); g.fillStyle='#fff'; g.fillRect(0,0,c.width,c.height);
    g.fillStyle='#111'; g.font='bold 22px Arial, sans-serif'; g.textAlign='left';
g.fillText('LONG SECTION PROFILE', 24, 40);   // top gap now ≈ 24px, same as the left gap

// Address / custom title from the sidebar input
var lsTitleEl = $('longSectionTitle');
var lsTitle = lsTitleEl ? lsTitleEl.value.trim() : '';
var subY = 58;
if (lsTitle) {
    g.fillStyle='#111'; g.font='bold 17px Arial, sans-serif';
    g.fillText(lsTitle, 24, 66, c.width - 48);
    subY = 86;
}

g.fillStyle='#555'; g.font='12px Arial, sans-serif';
g.fillText('Continuous Pipeline Alignment & Level Schedule', 24, subY);
if (!slopes.length) { g.fillText(getSlopeItems().length ? 'Enter both LL values on a slope to display this view.' : 'Draw a pipe slope to display this view.', 24, subY + 32); return; }

g.fillStyle='#555'; g.font='12px Arial, sans-serif';
g.fillText('Continuous Pipeline Alignment & Level Schedule', 24, subY);
if (!slopes.length) { g.fillText(getSlopeItems().length ? 'Enter both LL values on a slope to display this view.' : 'Draw a pipe slope to display this view.', 24, subY + 32); return; }

    var left=120, right=c.width-340, top=215, bottom=c.height-145, xSpan=right-left;
    
    // Base scale strictly on fixed start/end slope endpoints to keep start/end positions stable
    var values=[];
    slopes.forEach(function(o){
        var la=parseLL(o.llA),lb=parseLL(o.llB),ia=getSlopeInvert(o,false),ib=getSlopeInvert(o,true);
        if(la!==null)values.push(la);if(lb!==null)values.push(lb);if(ia!==null)values.push(ia);if(ib!==null)values.push(ib);
    });
    if(!values.length)values=[0,1];
    var minV=Math.min.apply(null,values)-0.5,maxV=Math.max.apply(null,values)+0.5;
    if(maxV-minV<0.5){minV-=0.5;maxV+=0.5;}
    var y=function(v){return bottom-(v-minV)/(maxV-minV)*(bottom-top);};
    var total=0,lengths=slopes.map(function(o){var l=Number(o.dimVal)||1;if(!isFinite(l)||l<=0)l=1;total+=l;return l;});
    var pxPerM=xSpan/(total||1),cursor=left;
    
if (!window.isLongSectionExporting) {
    g.save();
    g.font = '11.5px Arial, sans-serif';
    g.textAlign = 'left';

    var dotR = 4, dotGap = 7, itemGap = 18, padX = 12, lH = 26;
    var items = [
        { color: '#218c35', label: 'Ground (GL)' },
        { color: '#1760b9', label: 'Invert (Inv)' }
    ];
    var hint = '|  Double-click to add node, right-click to delete it, drag to shape';

    var itemsW = 0;
    items.forEach(function(it){
        it.w = g.measureText(it.label).width;
        itemsW += dotR*2 + dotGap + it.w + itemGap;
    });
    var lWidth = padX*2 + itemsW + g.measureText(hint).width;
    var lX = right - lWidth, lY = 18;

    g.fillStyle = '#f8f9fa'; g.strokeStyle = '#cbd5e1'; g.lineWidth = 1;
    g.fillRect(lX, lY, lWidth, lH);
    g.strokeRect(lX, lY, lWidth, lH);

    var cx = lX + padX, cy = lY + lH/2;
    g.textBaseline = 'middle';
    items.forEach(function(it){
        g.fillStyle = it.color;
        g.beginPath(); g.arc(cx + dotR, cy, dotR, 0, Math.PI*2); g.fill();
        cx += dotR*2 + dotGap;
        g.fillStyle = '#334155';
        g.fillText(it.label, cx, cy + 0.5);
        cx += it.w + itemGap;
    });
    g.fillText(hint, cx, cy + 0.5);
    g.restore();
}
    var segments=[]; cursor=left; var cumCh = 0;
    slopes.forEach(function(o,i){
        var x1=cursor, x2=cursor+lengths[i]*pxPerM;
        var la=parseLL(o.llA), lb=parseLL(o.llB);
        var ia=getSlopeInvert(o,false), ib=getSlopeInvert(o,true);

        if(!o.customNodes) o.customNodes = [];

        segments.push({
            o: o, slopeIndex: i, x1: x1, x2: x2, len: lengths[i],
            chStart: cumCh, chEnd: cumCh + lengths[i],
            la: la, lb: lb, ia: ia, ib: ib
        });
        cursor = x2;
        cumCh += lengths[i];
    });

    var groundPoints = [];
    var invertPoints = [];

    // Helper: ground is continuous across joints — only one point per chainage
    // (first occurrence wins). Invert always keeps every slope endpoint so
    // pipe droppers remain visible. Custom nodes are always kept.
    function hasGroundAt(ch) {
        return groundPoints.some(function(p){ return Math.abs(p.ch - ch) < 0.01; });
    }

    segments.forEach(function(seg){
        var chStart = seg.chStart, chEnd = seg.chEnd;
        var la = seg.la, lb = seg.lb, ia = seg.ia, ib = seg.ib;

        // Ground: add start only if no point already exists at this chainage
        if (la !== null && !hasGroundAt(chStart)) {
            groundPoints.push({ ch: chStart, x: seg.x1, val: la, slope: seg.o });
        }
        // Invert: always add (pipe discontinuities must show)
        if (ia !== null) {
            invertPoints.push({ ch: chStart, x: seg.x1, val: ia, slope: seg.o });
        }

        seg.o.customNodes.forEach(function(cn){
            var cx = seg.x1 + (cn.ch - chStart) * pxPerM;
            if (cn.ll !== undefined && cn.ll !== null) {
                // Custom ground nodes always appear
                groundPoints.push({ ch: cn.ch, x: cx, val: cn.ll, isCustom: true, customRef: cn, slope: seg.o });
            }
            if (cn.inv !== undefined && cn.inv !== null) {
                invertPoints.push({ ch: cn.ch, x: cx, val: cn.inv, isCustom: true, customRef: cn, slope: seg.o });
            }
        });

        // Ground: add end only if no point already exists at this chainage
        if (lb !== null && !hasGroundAt(chEnd)) {
            groundPoints.push({ ch: chEnd, x: seg.x2, val: lb, slope: seg.o });
        }
        // Invert: always add
        if (ib !== null) {
            invertPoints.push({ ch: chEnd, x: seg.x2, val: ib, slope: seg.o });
        }
    });

    groundPoints.sort(function(a,b){ return a.ch - b.ch; });
    invertPoints.sort(function(a,b){ return a.ch - b.ch; });

    // Label placement: keep labels clear of dots, lines and other text.
    // Rectangles are tracked across point labels, segment labels and droppers.
    var placedLongSectionLabels = [];

    // Reserve space around every plotted node so labels never sit on the dots
    function reservePointDot(px, py) {
        var r = 10;
        placedLongSectionLabels.push({ l: px - r, r: px + r, t: py - r, b: py + r });
    }
    groundPoints.forEach(function(mp){ reservePointDot(mp.x, y(mp.val)); });
    invertPoints.forEach(function(mp){ reservePointDot(mp.x, y(mp.val)); });

    function placeLongSectionLabel(text, x, yPos, color, preferred) {
        g.save();
        g.font = 'bold 11px Arial,sans-serif';
        var w = g.measureText(text).width + 8, h = 16;
        var pad = 4;
        var candidates = preferred || [
            // Prefer positions with enough gap for a visible leader arrow
            {dx:20, dy:-6, align:'left'},
            {dx:-20, dy:-6, align:'right'},
            {dx:20, dy:16, align:'left'},
            {dx:-20, dy:16, align:'right'},
            {dx:0, dy:-22, align:'center'},
            {dx:0, dy:26, align:'center'},
            {dx:28, dy:-18, align:'left'},
            {dx:-28, dy:-18, align:'right'},
            {dx:28, dy:24, align:'left'},
            {dx:-28, dy:24, align:'right'},
            {dx:0, dy:-36, align:'center'},
            {dx:0, dy:40, align:'center'},
            {dx:36, dy:0, align:'left'},
            {dx:-36, dy:0, align:'right'},
            {dx:24, dy:-32, align:'left'},
            {dx:-24, dy:-32, align:'right'},
            {dx:24, dy:38, align:'left'},
            {dx:-24, dy:38, align:'right'}
        ];
        var chosen = null;
        for (var ci = 0; ci < candidates.length; ci++) {
            var cnd = candidates[ci];
            var tx = x + cnd.dx, ty = yPos + cnd.dy;
            var leftEdge = cnd.align === 'center' ? tx - w/2 : (cnd.align === 'right' ? tx - w : tx);
            var rect = { l: leftEdge - pad, r: leftEdge + w + pad, t: ty - h + 2, b: ty + 4 };
            // Keep labels inside the plot area roughly
            if (rect.l < left - 10 || rect.r > right + 20 || rect.t < top - 40 || rect.b > bottom + 50) continue;
            var collides = placedLongSectionLabels.some(function(r) {
                return !(rect.r < r.l || rect.l > r.r || rect.b < r.t || rect.t > r.b);
            });
            if (!collides) { chosen = { x: tx, y: ty, align: cnd.align, rect: rect }; break; }
        }
        // Last-resort wider search
        if (!chosen) {
            var fallback = [
                {dx:40, dy:-20, align:'left'}, {dx:-40, dy:-20, align:'right'},
                {dx:40, dy:28, align:'left'}, {dx:-40, dy:28, align:'right'},
                {dx:0, dy:-48, align:'center'}, {dx:0, dy:52, align:'center'},
                {dx:50, dy:0, align:'left'}, {dx:-50, dy:0, align:'right'}
            ];
            for (var fi = 0; fi < fallback.length; fi++) {
                var fc = fallback[fi], fx = x + fc.dx, fy = yPos + fc.dy;
                var fl = fc.align === 'center' ? fx - w/2 : (fc.align === 'right' ? fx - w : fx);
                var fr = { l: fl - pad, r: fl + w + pad, t: fy - h + 2, b: fy + 4 };
                if (fr.l < left - 20 || fr.r > right + 30) continue;
                var hit = placedLongSectionLabels.some(function(r) {
                    return !(fr.r < r.l || fr.l > r.r || fr.b < r.t || fr.t > r.b);
                });
                if (!hit) { chosen = { x: fx, y: fy, align: fc.align, rect: fr }; break; }
            }
        }
        if (chosen) {
            placedLongSectionLabels.push(chosen.rect);

            g.fillStyle = color;
            g.textAlign = chosen.align;
            g.textBaseline = 'alphabetic';
            // Subtle white outline so text stays readable over lines
            g.strokeStyle = 'rgba(255,255,255,0.9)';
            g.lineWidth = 3;
            g.lineJoin = 'round';
            g.strokeText(text, chosen.x, chosen.y);
            g.fillText(text, chosen.x, chosen.y);
        }
        g.restore();
    }

    // 1. Build unified segments from consecutive profile points.
    // Zero-length + zero-delta joints are skipped.
    // Zero-length + level change joints become "Dropper" entries.
    var groundSegments = [];
    var glNum = 0;
    var groundDropperNum = 0;
    for (var j = 0; j < groundPoints.length - 1; j++) {
        var p1 = groundPoints[j], p2 = groundPoints[j+1];
        var segLen = p2.ch - p1.ch;
        var fallRise = p2.val - p1.val;
        var isZeroLen = Math.abs(segLen) < 0.001;
        var isZeroDelta = Math.abs(fallRise) < 0.001;

        // Identical points (no length, no level change) → skip completely
        if (isZeroLen && isZeroDelta) continue;

        var isDropper = isZeroLen && !isZeroDelta;
        var gradeStr;
        if (isDropper) {
            gradeStr = 'Vertical';
        } else if (Math.abs(fallRise) > 0 && segLen > 0) {
            gradeStr = '1:' + (segLen / Math.abs(fallRise)).toFixed(1) + ' (' + (Math.abs(fallRise)/segLen*100).toFixed(2) + '%)';
        } else {
            gradeStr = '0.00%';
        }

        var label;
        if (isDropper) {
            groundDropperNum++;
            label = 'Dropper ' + groundDropperNum;
        } else {
            glNum++;
            label = 'GL' + glNum;
        }
        groundSegments.push({
            label: label,
            len: segLen,
            fallRise: fallRise,
            grade: gradeStr,
            isDropper: isDropper,
            startCh: p1.ch,
            endCh: p2.ch,
            startVal: p1.val,
            endVal: p2.val,
            x1: p1.x,
            x2: p2.x
        });
    }

    var invertSegments = [];
    var pNum = 0;
    var invertDropperNum = 0;
    for (var j = 0; j < invertPoints.length - 1; j++) {
        var p1 = invertPoints[j], p2 = invertPoints[j+1];
        var segLen = p2.ch - p1.ch;
        var fall = p2.val - p1.val;          // signed for rise/fall display
        var absFall = Math.abs(fall);
        var isZeroLen = Math.abs(segLen) < 0.001;
        var isZeroDelta = absFall < 0.001;

        if (isZeroLen && isZeroDelta) continue;

        var isDropper = isZeroLen && !isZeroDelta;
        var gradeStr;
        if (isDropper) {
            gradeStr = 'Vertical';
        } else if (absFall > 0 && segLen > 0) {
            gradeStr = '1:' + (segLen / absFall).toFixed(1) + ' (' + (absFall/segLen*100).toFixed(2) + '%)';
        } else {
            gradeStr = '0.00%';
        }

        var label;
        if (isDropper) {
            invertDropperNum++;
            label = 'Dropper ' + invertDropperNum;
        } else {
            pNum++;
            label = 'P' + pNum;
        }
        invertSegments.push({
            label: label,
            len: segLen,
            fall: absFall,
            fallSigned: fall,
            grade: gradeStr,
            isDropper: isDropper,
            startCh: p1.ch,
            endCh: p2.ch,
            startVal: p1.val,
            endVal: p2.val,
            x1: p1.x,
            x2: p2.x
        });
    }

    // 2. Draw Ground Profile Line
    g.strokeStyle='#218c35'; g.lineWidth=1.5; g.beginPath();
    groundPoints.forEach(function(mp, m) {
        var px = mp.x, py = y(mp.val);
        if(m === 0) g.moveTo(px, py); else g.lineTo(px, py);
    });
    g.stroke();

    // Draw Invert Profile Line
    g.strokeStyle='#1760b9'; g.lineWidth=1.5; g.beginPath();
    invertPoints.forEach(function(mp, m) {
        var px = mp.x, py = y(mp.val);
        if(m === 0) g.moveTo(px, py); else g.lineTo(px, py);
    });
    g.stroke();

    // Flow-direction triangles on each non-vertical pipe segment (point downstream = lower invert)
    invertSegments.forEach(function(seg) {
        if (seg.isDropper || Math.abs(seg.len) < 0.001) return;
        var x1 = seg.x1, y1 = y(seg.startVal);
        var x2 = seg.x2, y2 = y(seg.endVal);
        // Downstream = lower invert level
        var flowToEnd = seg.startVal >= seg.endVal; // true → arrow toward end (x2,y2)
        var fx1 = flowToEnd ? x1 : x2, fy1 = flowToEnd ? y1 : y2;
        var fx2 = flowToEnd ? x2 : x1, fy2 = flowToEnd ? y2 : y1;
        var mx = (fx1 + fx2) / 2, my = (fy1 + fy2) / 2;
        var ang = Math.atan2(fy2 - fy1, fx2 - fx1);
        var size = 11;
        g.save();
        g.translate(mx, my);
        g.rotate(ang);
        // Nudge slightly off the stroke so the triangle isn't buried in the line
        g.translate(0, 0);
        // White outline for contrast on any background
        g.beginPath();
        g.moveTo(size + 1, 0);
        g.lineTo(-size * 0.6 - 1, size * 0.65 + 1);
        g.lineTo(-size * 0.6 - 1, -size * 0.65 - 1);
        g.closePath();
        g.fillStyle = '#ffffff';
        g.fill();
        // Blue fill
        g.beginPath();
        g.moveTo(size, 0);
        g.lineTo(-size * 0.6, size * 0.65);
        g.lineTo(-size * 0.6, -size * 0.65);
        g.closePath();
        g.fillStyle = '#1760b9';
        g.fill();
        g.restore();
    });

    // 3. Build Node Groups for overlapping points (e.g. IP2 & IP3)
    var nodeGroups = [];
    groundPoints.forEach(function(mp, idx) {
        var match = null;
        for (var ni=0; ni<nodeGroups.length; ni++) {
            if (Math.abs(nodeGroups[ni].ch-mp.ch) < 0.01 &&
                Math.abs(nodeGroups[ni].val-mp.val) < 0.05) { match=nodeGroups[ni]; break; }
        }
        if (match) match.ground.push({point:mp,index:idx+1});
        else nodeGroups.push({ch:mp.ch,val:mp.val,x:mp.x,ground:[{point:mp,index:idx+1}],invert:[]});
    });
    invertPoints.forEach(function(mp, idx) {
        var match = null;
        for (var ni=0; ni<nodeGroups.length; ni++) {
            if (Math.abs(nodeGroups[ni].ch-mp.ch) < 0.01 &&
                Math.abs(nodeGroups[ni].val-mp.val) < 0.05) { match=nodeGroups[ni]; break; }
        }
        if (match) match.invert.push({point:mp,index:idx+1});
        else nodeGroups.push({ch:mp.ch,val:mp.val,x:mp.x,ground:[],invert:[{point:mp,index:idx+1}]});
    });

    // 4. Render Node Groups with combined labels
    nodeGroups.forEach(function(ng) {
        var nx = ng.x, ny = y(ng.val);
        g.save();
        g.fillStyle = ng.ground.length ? '#218c35' : '#1760b9';
        g.strokeStyle = '#111'; g.lineWidth = 1.2;
        g.beginPath(); g.arc(nx, ny, 5, 0, Math.PI * 2); g.fill(); g.stroke();
        g.restore();

        if (ng.ground.length > 0) {
            var gLabels = ng.ground.map(function(n) { return 'GP' + n.index; }).join(' & ');
            // Prefer above / left for ground labels
            placeLongSectionLabel(gLabels, nx, ny, '#218c35', [
                {dx:0, dy:-16, align:'center'}, {dx:-14, dy:-12, align:'right'},
                {dx:14, dy:-12, align:'left'}, {dx:0, dy:-28, align:'center'},
                {dx:-22, dy:0, align:'right'}, {dx:22, dy:0, align:'left'}
            ]);
        }
        if (ng.invert.length > 0) {
            var iLabels = ng.invert.map(function(n) { return 'IP' + n.index; }).join(' & ');
            // Prefer below / right for invert labels so they separate from ground
            placeLongSectionLabel(iLabels, nx, ny, '#1760b9', [
                {dx:0, dy:18, align:'center'}, {dx:14, dy:14, align:'left'},
                {dx:-14, dy:14, align:'right'}, {dx:0, dy:32, align:'center'},
                {dx:22, dy:0, align:'left'}, {dx:-22, dy:0, align:'right'}
            ]);
        }
    });

    // 5. Place Segment Labels (GL / P / Dropper) at midpoints, preferring side offsets for vertical droppers
    groundSegments.forEach(function(seg) {
        var midX = (seg.x1 + seg.x2) / 2;
        var midY = (y(seg.startVal) + y(seg.endVal)) / 2;
        var preferred = seg.isDropper ? [
            {dx:16, dy:0, align:'left'}, {dx:-16, dy:0, align:'right'},
            {dx:16, dy:-12, align:'left'}, {dx:-16, dy:-12, align:'right'},
            {dx:16, dy:14, align:'left'}, {dx:-16, dy:14, align:'right'},
            {dx:28, dy:0, align:'left'}, {dx:-28, dy:0, align:'right'}
        ] : null;
        placeLongSectionLabel(seg.label, midX, midY, '#218c35', preferred);
    });

    invertSegments.forEach(function(seg) {
        var midX = (seg.x1 + seg.x2) / 2;
        var midY = (y(seg.startVal) + y(seg.endVal)) / 2;
        var preferred = seg.isDropper ? [
            {dx:16, dy:0, align:'left'}, {dx:-16, dy:0, align:'right'},
            {dx:16, dy:-12, align:'left'}, {dx:-16, dy:-12, align:'right'},
            {dx:16, dy:14, align:'left'}, {dx:-16, dy:14, align:'right'},
            {dx:28, dy:0, align:'left'}, {dx:-28, dy:0, align:'right'}
        ] : null;
        placeLongSectionLabel(seg.label, midX, midY, '#1760b9', preferred);
    });
    // 4. Dashed drop lines down to chainage baseline
    var allPoints = groundPoints.concat(invertPoints);
    allPoints.forEach(function(mp){
        var pyVal = y(mp.val);
        var baselineY = bottom + 35;
        g.save(); g.strokeStyle='#b0b000'; g.lineWidth=1; g.setLineDash([4,4]);
        g.beginPath(); g.moveTo(mp.x, pyVal); g.lineTo(mp.x, baselineY); g.stroke();
        g.restore();
    });

    // 5. Populate the reference metric list with every plotted node (ground and invert).
    var logContainer = $('longSectionLogsContainer');
    if (logContainer) {
        logContainer.style.display = (window.ls3dExpanded) ? 'none' : 'block';
        var html = '<div style="font-weight:bold;font-size:12px;margin-bottom:6px;color:#222;">Point Reference Log:</div>';
        var pointRows = [];
        groundPoints.forEach(function(mp, idx) {
            pointRows.push({ch:mp.ch, val:mp.val, kind:'GP'+(idx+1), type:'Ground (GL)', color:'#218c35'});
        });
        invertPoints.forEach(function(mp, idx) {
            pointRows.push({ch:mp.ch, val:mp.val, kind:'IP'+(idx+1), type:'Invert (INV)', color:'#1760b9'});
        });
        pointRows.sort(function(a,b) { return a.ch-b.ch || b.val-a.val; });

        pointRows.forEach(function(pt) {
            html += '<div style="background:#f8f9fa;border:1px solid '+pt.color+';padding:5px 8px;margin-bottom:4px;font-size:10.5px;border-radius:3px;color:#222;">' +
                '<b>' + pt.kind + '</b> (' + pt.type + ') | RL:' + pt.val.toFixed(2) + 'm</div>';
        });

                html += '<div style="font-weight:bold;font-size:12px;margin-top:12px;margin-bottom:4px;color:#222;">Ground Line (GL) Reference Log:</div>';
        groundSegments.forEach(function(gl) {
            var riseFallDesc = gl.fallRise >= 0 ? 'Rise: +' + gl.fallRise.toFixed(2) + 'm' : 'Fall: ' + gl.fallRise.toFixed(2) + 'm';
            var detail;
            if (gl.isDropper) {
                detail = '<b>' + gl.label + '</b> (Vertical) | ' + riseFallDesc;
            } else {
                detail = '<b>' + gl.label + '</b> (Len:' + gl.len.toFixed(2) + 'm) | ' + riseFallDesc + ' | Gr:' + gl.grade;
            }
            html += '<div style="background:#eafaf1;border:1px solid #218c35;padding:5px 8px;margin-bottom:4px;font-size:10.5px;border-radius:3px;color:#222;">' +
                detail + '</div>';
        });

        html += '<div style="font-weight:bold;font-size:12px;margin-top:12px;margin-bottom:4px;color:#222;">Pipe Line Reference Log:</div>';
        invertSegments.forEach(function(lg) {
            var detail;
            if (lg.isDropper) {
                var signed = (lg.fallSigned !== undefined ? lg.fallSigned : -lg.fall);
                var riseFallDesc = signed >= 0 ? 'Rise: +' + Math.abs(signed).toFixed(2) + 'm' : 'Fall: ' + Math.abs(signed).toFixed(2) + 'm';
                detail = '<b>' + lg.label + '</b> (Vertical) | ' + riseFallDesc;
            } else {
                detail = '<b>' + lg.label + '</b> (Len:' + lg.len.toFixed(2) + 'm) | Fall:' + lg.fall.toFixed(2) + 'm | Gr:' + lg.grade;
            }
            html += '<div style="background:#eef4f8;border:1px solid #4682b4;padding:5px 8px;margin-bottom:4px;font-size:10.5px;border-radius:3px;color:#222;">' +
                detail + '</div>';
        });
		        logContainer.innerHTML = html;

	}

    // 6. Chainage baseline with spans
    g.save();
    var dimY = bottom + 35;
    g.strokeStyle='#333'; g.lineWidth=1.2;
    g.beginPath(); g.moveTo(left, dimY); g.lineTo(right, dimY); g.stroke();
    
    var fullLen = right - left;
    var totalDistance = 0;
    lengths.forEach(function(l){ totalDistance += l; });

    for (var p = 1; p < 100; p++) {
        var tx = left + fullLen * (p / 100);
        var halfH = 2;
        if (p % 5 === 0) {
            halfH = 7;
        } else if (p % 2.5 === 0) {
            halfH = 5;
        }
        g.beginPath();
        g.moveTo(tx, dimY - halfH);
        g.lineTo(tx, dimY + halfH);
        g.stroke();

        if (p % 5 === 0) {
            var valText = (totalDistance * (p / 100)).toFixed(1) + 'm';
            g.fillStyle='#444'; g.font='9.5px Arial,sans-serif'; g.textAlign='center';
            g.fillText(valText, tx, dimY - 10);
        }
    }
    
    cursor=left; var currentChainage = 0;
    slopes.forEach(function(o,i){
        var pipeLen = lengths[i];
        var nextChainage = currentChainage + pipeLen;
        var xStart = cursor, xEnd = cursor + pipeLen*pxPerM;
        
        g.beginPath(); g.moveTo(xStart, dimY-6); g.lineTo(xStart, dimY+6); g.stroke();
        g.beginPath(); g.moveTo(xEnd, dimY-6); g.lineTo(xEnd, dimY+6); g.stroke();

        var spanText = currentChainage.toFixed(2) + 'm → ' + nextChainage.toFixed(2) + 'm (' + pipeLen.toFixed(1) + 'm)';
g.font = '11.5px Arial,sans-serif';   // set the font BEFORE measuring
g.textAlign = 'center';
var tw = g.measureText(spanText).width + 20;
var bx = (xStart+xEnd)/2 - tw/2;
g.fillStyle='#fff'; g.strokeStyle='#666'; g.lineWidth=1;
g.fillRect(bx, dimY + 10, tw, 22);
g.strokeRect(bx, dimY + 10, tw, 22);
g.fillStyle='#111';
g.fillText(spanText, (xStart+xEnd)/2, dimY + 25);

        cursor = xEnd; currentChainage = nextChainage;
    });
    g.restore();
    if (window.ls3dOnProfileChange) window.ls3dOnProfileChange();
}

function lsNodeChainageLimits(drag) {
    var minCh = drag.startCh;
    var maxCh = drag.startCh + drag.len;
    var origin = drag.originCh != null ? Number(drag.originCh) : Number(drag.node.ch);
    var nodes = drag.slope.customNodes || [];
    for (var i = 0; i < nodes.length; i++) {
        var n = nodes[i];
        if (n === drag.node) continue;
        var same = drag.type === 'll'
            ? (n.ll !== undefined && n.ll !== null && isFinite(Number(n.ll)))
            : (n.inv !== undefined && n.inv !== null && isFinite(Number(n.inv)));
        if (!same || !isFinite(Number(n.ch))) continue;
        var ch = Number(n.ch);
        if (ch < origin - 0.001) minCh = Math.max(minCh, ch);
        else if (ch > origin + 0.001) maxCh = Math.min(maxCh, ch);
    }
    if (minCh > maxCh) minCh = maxCh;
    return { min: minCh, max: maxCh };
}
function lsSnapChainages(drag) {
    var chs = [drag.startCh, drag.startCh + drag.len];
    var nodes = drag.slope.customNodes || [];
    for (var i = 0; i < nodes.length; i++) {
        var n = nodes[i];
        if (n === drag.node || !isFinite(Number(n.ch))) continue;
        var same = drag.type === 'll'
            ? (n.ll !== undefined && n.ll !== null && isFinite(Number(n.ll)))
            : (n.inv !== undefined && n.inv !== null && isFinite(Number(n.inv)));
        if (same) chs.push(Number(n.ch));
    }
    return chs;
}
function lsProfilePolylines(slopes) {
    var left = 120, right = lsCanvas.width - 340, top = 215, bottom = lsCanvas.height - 145;
    var total = 0, lengths = slopes.map(function(o) { var l = Number(o.dimVal) || 1; if (!isFinite(l) || l <= 0) l = 1; total += l; return l; });
    var pxPerM = (right - left) / (total || 1);
    var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;
    if (maxV - minV < 0.5) { minV -= 0.5; maxV += 0.5; }
    function yOf(v) { return bottom - (v - minV) / (maxV - minV) * (bottom - top); }
    var ground = [], invert = [], cursor = left, cum = 0;
    slopes.forEach(function(o, i) {
        var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
        var la = parseLL(o.llA), lb = parseLL(o.llB);
        var ia = getSlopeInvert(o, false), ib = getSlopeInvert(o, true);
        if (la !== null && !(ground.length && Math.abs(ground[ground.length - 1].ch - cum) < 0.01)) {
            ground.push({ ch: cum, x: x1, y: yOf(la), slope: o });
        }
        if (ia !== null) invert.push({ ch: cum, x: x1, y: yOf(ia), slope: o });
        (o.customNodes || []).forEach(function(cn) {
            var cx = x1 + (cn.ch - cum) * pxPerM;
            if (cn.ll !== undefined && cn.ll !== null && isFinite(Number(cn.ll))) ground.push({ ch: cn.ch, x: cx, y: yOf(Number(cn.ll)), slope: o });
            if (cn.inv !== undefined && cn.inv !== null && isFinite(Number(cn.inv))) invert.push({ ch: cn.ch, x: cx, y: yOf(Number(cn.inv)), slope: o });
        });
        if (lb !== null && !(ground.length && Math.abs(ground[ground.length - 1].ch - (cum + lengths[i])) < 0.01)) {
            ground.push({ ch: cum + lengths[i], x: x2, y: yOf(lb), slope: o });
        }
        if (ib !== null) invert.push({ ch: cum + lengths[i], x: x2, y: yOf(ib), slope: o });
        cursor = x2;
        cum += lengths[i];
    });
    ground.sort(function(a, b) { return a.ch - b.ch; });
    invert.sort(function(a, b) { return a.ch - b.ch; });
    return { ground: ground, invert: invert, minV: minV, maxV: maxV, bottom: bottom, top: top };
}
function lsDistToPolyline(pts, x, y) {
    var best = Infinity;
    for (var i = 0; i < pts.length - 1; i++) {
        var a = pts[i], b = pts[i + 1];
        var dx = b.x - a.x, dy = b.y - a.y, len2 = dx * dx + dy * dy;
        var t = len2 < 1e-6 ? 0 : ((x - a.x) * dx + (y - a.y) * dy) / len2;
        if (t < 0) t = 0; else if (t > 1) t = 1;
        var d = Math.hypot(x - (a.x + dx * t), y - (a.y + dy * t));
        if (d < best) best = d;
    }
    return best;
}
function lsStrokeKindAt(c, x, y) {
    var rect = c.getBoundingClientRect();
    var sx = c.width / (rect.width || 1);
    var rad = Math.max(3, 2.4 * sx);
    var x0 = Math.max(0, Math.floor(x - rad)), y0 = Math.max(0, Math.floor(y - rad));
    var x1 = Math.min(c.width, Math.ceil(x + rad)), y1 = Math.min(c.height, Math.ceil(y + rad));
    var w = x1 - x0, h = y1 - y0;
    if (w < 1 || h < 1) return null;
    var data;
    try { data = c.getContext('2d').getImageData(x0, y0, w, h).data; } catch (err) { return null; }
    var bestG = Infinity, bestB = Infinity;
    for (var py = 0; py < h; py++) {
        for (var px = 0; px < w; px++) {
            var d = Math.hypot(x0 + px - x, y0 + py - y);
            if (d > rad) continue;
            var i = (py * w + px) * 4;
            var r = data[i], g = data[i + 1], b = data[i + 2], a = data[i + 3];
            if (a < 160 || (r > 220 && g > 220 && b > 220)) continue;
            if (b > 100 && b > r + 18 && b > g + 10) { if (d < bestB) bestB = d; }
            else if (g > 70 && g > r + 18 && g > b + 10) { if (d < bestG) bestG = d; }
        }
    }
    if (bestB === Infinity && bestG === Infinity) return null;
    if (bestB + 0.6 < bestG) return 'inv';
    if (bestG + 0.6 < bestB) return 'll';
    return null;
}

// Single, clean set of Interactivity Handlers for Long Section Canvas
var draggingNode = null;
var lsCanvas = $('longSectionCanvas');

if (lsCanvas) {
    lsCanvas.onmousedown = function(e) {
        if (!longSectionVisible || e.button !== 0) return;
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);

        var slopes = getSlopeItems();
        var left = 120, right = lsCanvas.width - 340, top = 215, bottom = lsCanvas.height - 145, xSpan = right - left;
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;
        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;

        slopes.forEach(function(o, i){
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;

            if (o.customNodes) {
                o.customNodes.forEach(function(cn){
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    if (cn.ll !== undefined && cn.ll !== null) {
                        var cyLid = bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyLid) < 14) {
                            draggingNode = { type: 'll', slope: o, node: cn, startX1: x1, len: lengths[i], startCh: cumCh };
                        }
                    }
                    if (cn.inv !== undefined && cn.inv !== null) {
                        var cyInv = bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyInv) < 14) {
                            draggingNode = { type: 'inv', slope: o, node: cn, startX1: x1, len: lengths[i], startCh: cumCh };
                        }
                    }
                });
            }
            cursor = x2;
            cumCh += lengths[i];
        });
    };

    lsCanvas.onmousemove = function(e) {
        if (!draggingNode || !longSectionVisible) return;
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);
        
        var bottom = lsCanvas.height - 145, top = 215, left = 120, right = lsCanvas.width - 340, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1);

        var newCh = draggingNode.startCh + (x - draggingNode.startX1) / pxPerM;
        newCh = Math.max(draggingNode.startCh, Math.min(draggingNode.startCh + draggingNode.len, newCh));
        draggingNode.node.ch = newCh;

        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;
        var newVal = minV + ((bottom - yPos) / (bottom - top)) * (maxV - minV);

        if (draggingNode.type === 'll') {
            draggingNode.node.ll = newVal;
        } else if (draggingNode.type === 'inv') {
            draggingNode.node.inv = newVal;
        }

        renderLongSection();
    };

    lsCanvas.onmouseup = function() {
        draggingNode = null;
    };

    lsCanvas.ondblclick = function(e) {
        if (!longSectionVisible) return;
        var rect = lsCanvas.getBoundingClientRect();
        var sx = lsCanvas.width / (rect.width || 1);
        var sy = lsCanvas.height / (rect.height || 1);
        var x = (e.clientX - rect.left) * sx;
        var yPos = (e.clientY - rect.top) * sy;

        var slopes = getCompleteSlopeItems();
        if (!slopes.length) return;
        var lines = lsProfilePolylines(slopes);
        var painted = lsStrokeKindAt(lsCanvas, x, yPos);
        var dG = lsDistToPolyline(lines.ground, x, yPos);
        var dI = lsDistToPolyline(lines.invert, x, yPos);
        var kind = painted || (dI <= dG ? 'inv' : 'll');
        if (!isFinite(dG) && !isFinite(dI) && !painted) return;

        var left = 120, right = lsCanvas.width - 340;
        var total = 0, lengths = slopes.map(function(o) { var l = Number(o.dimVal) || 1; if (!isFinite(l) || l <= 0) l = 1; total += l; return l; });
        var pxPerM = (right - left) / (total || 1), cursor = left, cumCh = 0;
        var clickedVal = lines.minV + ((lines.bottom - yPos) / (lines.bottom - lines.top)) * (lines.maxV - lines.minV);

        for (var i = 0; i < slopes.length; i++) {
            var o = slopes[i];
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
            if (x >= x1 - 2 && x <= x2 + 2) {
                var chOffset = (x - x1) / pxPerM + cumCh;
                if (chOffset < cumCh) chOffset = cumCh;
                if (chOffset > cumCh + lengths[i]) chOffset = cumCh + lengths[i];
                if (!o.customNodes) o.customNodes = [];
                if (kind === 'll') {
                    rememberLongSection('Added custom ground node');
                    o.customNodes.push({ ch: chOffset, ll: clickedVal });
                    status('Added custom ground node.');
                } else {
                    rememberLongSection('Added custom invert node');
                    o.customNodes.push({ ch: chOffset, inv: clickedVal });
                    status('Added custom invert node.');
                }
                renderLongSection();
                break;
            }
            cursor = x2;
            cumCh += lengths[i];
        }
    };

    lsCanvas.oncontextmenu = function(e) {
        if (!longSectionVisible) return;
        e.preventDefault();
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);

        var left = 120, right = lsCanvas.width - 340, bottom = lsCanvas.height - 145, top = 215, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;
        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;

        var deleted = false;
        slopes.forEach(function(o){
            var x1 = cursor, x2 = cursor + lengths[i]*pxPerM; // (or iterate properly over segment index)

            if (o.customNodes) {
                o.customNodes.forEach(function(cn, cni){
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    var cyLid = cn.ll !== undefined && cn.ll !== null ? bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top) : -9999;
                    var cyInv = cn.inv !== undefined && cn.inv !== null ? bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top) : -9999;

                    if (Math.hypot(x - cx, yPos - cyLid) < 14 || Math.hypot(x - cx, yPos - cyInv) < 14) {
                        if (!deleted) rememberLongSection('Deleted custom node');
                        o.customNodes.splice(cni, 1);
                        deleted = true;
                    }
                });
            }
            cursor = x2;
            cumCh += lengths[i];
        });

        if (deleted) {
            renderLongSection();
            status('Deleted custom node.');
        }
    };
}

function parseMinV(slopes) {
    var vals = [];
    slopes.forEach(function(o){
        var la=parseLL(o.llA),lb=parseLL(o.llB),ia=getSlopeInvert(o,false),ib=getSlopeInvert(o,true);
        if(la!==null)vals.push(la);if(lb!==null)vals.push(lb);if(ia!==null)vals.push(ia);if(ib!==null)vals.push(ib);
    });
    return vals.length ? Math.min.apply(null, vals) : 0;
}
function parseMaxV(slopes) {
    var vals = [];
    slopes.forEach(function(o){
        var la=parseLL(o.llA),lb=parseLL(o.llB),ia=getSlopeInvert(o,false),ib=getSlopeInvert(o,true);
        if(la!==null)vals.push(la);if(lb!==null)vals.push(lb);if(ia!==null)vals.push(ia);if(ib!==null)vals.push(ib);
    });
    return vals.length ? Math.max.apply(null, vals) : 1;
}

// Interactivity Handlers for Long Section Canvas
var draggingNode = null;
var lsCanvas = $('longSectionCanvas');

if (lsCanvas) {
    lsCanvas.onmousedown = function(e) {
        if (!longSectionVisible || e.button !== 0) return;
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);

        var slopes = getSlopeItems();
        var left = 120, right = lsCanvas.width - 340, top = 215, bottom = lsCanvas.height - 145, xSpan = right - left;
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;

        slopes.forEach(function(o, i){
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
            var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;

            if (o.customNodes) {
                o.customNodes.forEach(function(cn){
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    if (cn.ll !== undefined && cn.ll !== null) {
                        var cyLid = bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyLid) < 14) {
                            draggingNode = { type: 'll', slope: o, node: cn, startX1: x1, len: lengths[i], startCh: cumCh };
                        }
                    }
                    if (cn.inv !== undefined && cn.inv !== null) {
                        var cyInv = bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyInv) < 14) {
                            draggingNode = { type: 'inv', slope: o, node: cn, startX1: x1, len: lengths[i], startCh: cumCh };
                        }
                    }
                });
            }
            cursor = x2;
            cumCh += lengths[i];
        });
    };

    lsCanvas.onmousemove = function(e) {
        if (!draggingNode || !longSectionVisible) return;
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);
        
        var bottom = lsCanvas.height - 145, top = 215, left = 120, right = lsCanvas.width - 340, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1);

        var newCh = draggingNode.startCh + (x - draggingNode.startX1) / pxPerM;
        newCh = Math.max(draggingNode.startCh, Math.min(draggingNode.startCh + draggingNode.len, newCh));
        draggingNode.node.ch = newCh;

        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;
        var newVal = minV + ((bottom - yPos) / (bottom - top)) * (maxV - minV);

        if (draggingNode.type === 'll') {
            draggingNode.node.ll = newVal;
        } else if (draggingNode.type === 'inv') {
            draggingNode.node.inv = newVal;
        }

        renderLongSection();
    };

    lsCanvas.onmouseup = function() {
        if (lsDragSnapshot) {
            lsUndoStack.push(lsDragSnapshot);
            if (lsUndoStack.length > 80) lsUndoStack.shift();
            lsRedoStack = [];
            lsDragSnapshot = null;
        }
        draggingNode = null;
    };

    // Right-click to delete custom nodes
    lsCanvas.oncontextmenu = function(e) {
        if (!longSectionVisible) return;
        e.preventDefault();
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);

        var left = 120, right = lsCanvas.width - 340, bottom = lsCanvas.height - 145, top = 215, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;

        var deleted = false;
        slopes.forEach(function(o, i){
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
            var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;

            if (o.customNodes) {
                o.customNodes.forEach(function(cn, cni){
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    var cyLid = cn.ll !== undefined ? bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top) : -9999;
                    var cyInv = cn.inv !== undefined ? bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top) : -9999;

                    if (Math.hypot(x - cx, yPos - cyLid) < 14 || Math.hypot(x - cx, yPos - cyInv) < 14) {
                        if (!deleted) rememberLongSection('Deleted custom node');
                        o.customNodes.splice(cni, 1);
                        deleted = true;
                    }
                });
            }
            cursor = x2;
            cumCh += lengths[i];
        });

        if (deleted) {
            renderLongSection();
            status('Deleted custom node.');
        }
    };
}

// Interactivity Handlers: Dynamic mapping across ALL added lines/segments
// Automatic slope endpoints: vertical-only (level). Custom double-click nodes: free move.
var draggingNode = null;
var lsCanvas = $('longSectionCanvas');

if (lsCanvas) {
    lsCanvas.onmousedown = function(e) {
        if (!longSectionVisible || e.button !== 0) return;
        var rect = lsCanvas.getBoundingClientRect();
        var sx = lsCanvas.width / (rect.width || 1);
        var sy = lsCanvas.height / (rect.height || 1);
        var x = (e.clientX - rect.left) * sx;
        var yPos = (e.clientY - rect.top) * sy;

        var slopes = getSlopeItems();
        var left = 120, right = lsCanvas.width - 340, top = 215, bottom = lsCanvas.height - 145, xSpan = right - left;
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;
        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;
        var hitR = Math.max(22, 18 * sx);

        draggingNode = null;
        lsDragSnapshot = null;

        slopes.forEach(function(o, i){
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
            var la = parseLL(o.llA), lb = parseLL(o.llB);
            var ia = getSlopeInvert(o, false), ib = getSlopeInvert(o, true);

            // 1) Custom nodes (full 2D movement)
            if (o.customNodes) {
                o.customNodes.forEach(function(cn){
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    if (cn.ll !== undefined && cn.ll !== null) {
                        var cyLid = bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyLid) < hitR) {
                            draggingNode = {
                                kind: 'custom', type: 'll', slope: o, node: cn,
                                startX1: x1, len: lengths[i], startCh: cumCh, originCh: cn.ch
                            };
                        }
                    }
                    if (cn.inv !== undefined && cn.inv !== null) {
                        var cyInv = bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top);
                        if (Math.hypot(x - cx, yPos - cyInv) < hitR) {
                            draggingNode = {
                                kind: 'custom', type: 'inv', slope: o, node: cn,
                                startX1: x1, len: lengths[i], startCh: cumCh, originCh: cn.ch
                            };
                        }
                    }
                });
            }

            // 2) Automatic slope endpoints (vertical only)
            // Start (A)
            if (la !== null) {
                var cyA = bottom - ((la - minV) / (maxV - minV)) * (bottom - top);
                if (Math.hypot(x - x1, yPos - cyA) < hitR) {
                    draggingNode = { kind: 'endpoint', type: 'll', end: 'A', slope: o };
                }
            }
            if (ia !== null) {
                var cyIA = bottom - ((ia - minV) / (maxV - minV)) * (bottom - top);
                if (Math.hypot(x - x1, yPos - cyIA) < hitR) {
                    draggingNode = { kind: 'endpoint', type: 'inv', end: 'A', slope: o };
                }
            }
            // End (B)
            if (lb !== null) {
                var cyB = bottom - ((lb - minV) / (maxV - minV)) * (bottom - top);
                if (Math.hypot(x - x2, yPos - cyB) < hitR) {
                    draggingNode = { kind: 'endpoint', type: 'll', end: 'B', slope: o };
                }
            }
            if (ib !== null) {
                var cyIB = bottom - ((ib - minV) / (maxV - minV)) * (bottom - top);
                if (Math.hypot(x - x2, yPos - cyIB) < hitR) {
                    draggingNode = { kind: 'endpoint', type: 'inv', end: 'B', slope: o };
                }
            }

            cursor = x2;
            cumCh += lengths[i];
        });
        if (draggingNode) {
            lsDragSnapshot = {
                label: draggingNode.kind === 'endpoint' ? 'Moved slope level' : 'Moved custom node',
                slopes: snapshotSlopeState()
            };
        }
    };

    lsCanvas.onmousemove = function(e) {
        if (!draggingNode || !longSectionVisible) return;
        var rect = lsCanvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (lsCanvas.width / rect.width);
        var yPos = (e.clientY - rect.top) * (lsCanvas.height / rect.height);

        var bottom = lsCanvas.height - 145, top = 215, left = 120, right = lsCanvas.width - 340, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1);
        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;
        var newVal = minV + ((bottom - yPos) / (bottom - top)) * (maxV - minV);

        if (draggingNode.kind === 'custom') {
            var newCh = draggingNode.startCh + (x - draggingNode.startX1) / pxPerM;
            var lim = lsNodeChainageLimits(draggingNode);
            if (newCh < lim.min) newCh = lim.min;
            if (newCh > lim.max) newCh = lim.max;
            if (e.shiftKey) {
                var snaps = lsSnapChainages(draggingNode);
                var reach = Math.max(0.45, draggingNode.len * 0.05);
                var best = null, bestD = reach;
                for (var s = 0; s < snaps.length; s++) {
                    var dch = Math.abs(newCh - snaps[s]);
                    if (dch <= bestD) { bestD = dch; best = snaps[s]; }
                }
                if (best !== null) newCh = Math.max(lim.min, Math.min(lim.max, best));
            }
            draggingNode.node.ch = newCh;
            if (draggingNode.type === 'll') {
                draggingNode.node.ll = newVal;
            } else if (draggingNode.type === 'inv') {
                draggingNode.node.inv = newVal;
            }
        } else if (draggingNode.kind === 'endpoint') {
            // Automatic slope endpoints: vertical only (chainage locked)
            var o = draggingNode.slope;
            if (draggingNode.type === 'll') {
                // Update lid level directly
                if (draggingNode.end === 'A') {
                    o.llA = parseFloat(newVal.toFixed(3));
                } else {
                    o.llB = parseFloat(newVal.toFixed(3));
                }
            } else if (draggingNode.type === 'inv') {
                // Adjust depth so invert = LL - depth moves with the drag
                var ll = parseLL(draggingNode.end === 'A' ? o.llA : o.llB);
                if (ll !== null) {
                    var newDepth = Math.max(0, ll - newVal);
                    if (draggingNode.end === 'A') {
                        o.depthA = parseFloat(newDepth.toFixed(3));
                    } else {
                        o.depthB = parseFloat(newDepth.toFixed(3));
                    }
                }
            }
            // Keep the slope text labels in sync
            if (typeof updateSlopeText === 'function' && o.pixelsPerUnit) {
                var dx = (o.x2 !== undefined ? o.x2 : o.x) - o.x;
                var dy = (o.y2 !== undefined ? o.y2 : o.y) - o.y;
                var curLen = Math.sqrt(dx * dx + dy * dy);
                updateSlopeText(o, curLen);
            }
        }

        renderLongSection();
    };

    lsCanvas.onmouseup = function() {
        if (lsDragSnapshot) {
            lsUndoStack.push(lsDragSnapshot);
            if (lsUndoStack.length > 80) lsUndoStack.shift();
            lsRedoStack = [];
            lsDragSnapshot = null;
        }
        draggingNode = null;
    };

    // Right-click deletes custom nodes only (automatic endpoints cannot be deleted this way)
    lsCanvas.oncontextmenu = function(e) {
        if (!longSectionVisible) return;
        e.preventDefault();
        var rect = lsCanvas.getBoundingClientRect();
        var sx = lsCanvas.width / (rect.width || 1);
        var sy = lsCanvas.height / (rect.height || 1);
        var x = (e.clientX - rect.left) * sx;
        var yPos = (e.clientY - rect.top) * sy;
        var hitR = Math.max(22, 18 * sx);

        var left = 120, right = lsCanvas.width - 340, bottom = lsCanvas.height - 145, top = 215, xSpan = right - left;
        var slopes = getSlopeItems();
        var total = 0, lengths = slopes.map(function(o){ return Number(o.dimVal) || 1; });
        lengths.forEach(function(l){ total += l; });
        var pxPerM = xSpan / (total || 1), cursor = left, cumCh = 0;
        var minV = parseMinV(slopes) - 0.5, maxV = parseMaxV(slopes) + 0.5;

        var deleted = false;
        slopes.forEach(function(o, i){
            var x1 = cursor, x2 = cursor + lengths[i] * pxPerM;
            if (o.customNodes) {
                for (var cni = o.customNodes.length - 1; cni >= 0; cni--) {
                    var cn = o.customNodes[cni];
                    var cx = x1 + (cn.ch - cumCh) * pxPerM;
                    var cyLid = (cn.ll !== undefined && cn.ll !== null) ? bottom - ((cn.ll - minV) / (maxV - minV)) * (bottom - top) : -9999;
                    var cyInv = (cn.inv !== undefined && cn.inv !== null) ? bottom - ((cn.inv - minV) / (maxV - minV)) * (bottom - top) : -9999;
                    if (Math.hypot(x - cx, yPos - cyLid) < hitR || Math.hypot(x - cx, yPos - cyInv) < hitR) {
                        if (!deleted) rememberLongSection('Deleted custom node');
                        o.customNodes.splice(cni, 1);
                        deleted = true;
                    }
                }
            }
            cursor = x2;
            cumCh += lengths[i];
        });

        if (deleted) {
            renderLongSection();
            status('Deleted custom node.');
        }
    };
}


function parseMinV(slopes) {
    var vals = [];
    slopes.forEach(function(o){
        var la=parseLL(o.llA),lb=parseLL(o.llB),ia=getSlopeInvert(o,false),ib=getSlopeInvert(o,true);
        if(la!==null)vals.push(la);if(lb!==null)vals.push(lb);if(ia!==null)vals.push(ia);if(ib!==null)vals.push(ib);
    });
    return vals.length ? Math.min.apply(null, vals) : 0;
}
function parseMaxV(slopes) {
    var vals = [];
    slopes.forEach(function(o){
        var la=parseLL(o.llA),lb=parseLL(o.llB),ia=getSlopeInvert(o,false),ib=getSlopeInvert(o,true);
        if(la!==null)vals.push(la);if(lb!==null)vals.push(lb);if(ia!==null)vals.push(ia);if(ib!==null)vals.push(ib);
    });
    return vals.length ? Math.max.apply(null, vals) : 1;
}

// Fall between the two pipe inverts.
// Invert level = LL (lid level) - depth. When both LLs are entered as numbers the fall is
// worked out from the inverts, so a different LL at A and B is taken into account.
// If either LL is blank or not a number, it falls back to the difference in depths.
function getSlopeFall(o) {
    var depthA = o.depthA !== undefined ? o.depthA : 1.20;
    var depthB = o.depthB !== undefined ? o.depthB : 1.50;
    var llA = parseLL(o.llA);
    var llB = parseLL(o.llB);
    if (llA !== null && llB !== null) {
        return Math.abs((llA - depthA) - (llB - depthB));
    }
    return Math.abs(depthB - depthA);
}

function parseLL(v) {
    if (v === undefined || v === null) return null;
    var t = String(v).trim();
    if (!t || !isFinite(Number(t))) return null;
    return Number(t);
}

function updateSlopeText(o, currentPixels) {
    var fall = getSlopeFall(o);

    if (!o.pixelsPerUnit || o.pixelsPerUnit <= 0) {
        o.text = 'L: TBC | F: ' + fall.toFixed(2) + 'm\nG: TBC';
        return;
    }
    var run = currentPixels / o.pixelsPerUnit;
    o.dimVal = parseFloat(run.toFixed(2));
    var ratio = fall > 0 ? (run / fall).toFixed(1) : '100';
    var pct = run > 0 ? ((fall / run) * 100).toFixed(1) : '0.0';
    o.text = 'L: ' + run.toFixed(2) + 'm | F: ' + fall.toFixed(2) + 'm\nG: 1:' + ratio + ' (' + pct + '%)';
}

function cancelText() { 
    if (pendingText && pendingText.isDimension && pendingText.isNewCreation) {
        if (pendingText.index >= 0 && pendingText.index < items.length) {
            items.splice(pendingText.index, 1);
            if (undoStack.length > 0) undoStack.pop();
        }
    }
    $('modal').style.display = 'none'; 
    pendingText = null; 
    if (tool !== 'dimension' && tool !== 'slope') {
        setTool('select');
    }
    sync();
    draw();
}

function removeSelected() { 
    if (selectedIndices.length === 0) return; 
    remember();
    var indicesToDelete = [];
    var groupIdsToDelete = [];
    for (var i = 0; i < selectedIndices.length; i++) {
        var item = items[selectedIndices[i]];
        if (item && item.groupId) groupIdsToDelete.push(item.groupId);
    }
    for (var i = 0; i < items.length; i++) {
        if (selectedIndices.includes(i) || (items[i].groupId && groupIdsToDelete.includes(items[i].groupId))) {
            indicesToDelete.push(i);
        }
    }
    indicesToDelete.sort(function(a, b) { return b - a; });
    for (var i = 0; i < indicesToDelete.length; i++) {
        items.splice(indicesToDelete[i], 1);
    }
    checkGroups();
    selectedIndices = []; 
    sync(); 
    draw(); 
    status('Deleted selected item(s).');
}

function removeAllLayers() { 
    if (items.length === 0) return; 
    remember(); 
    items = []; 
    selectedIndices = []; 
    sync(); 
    draw(); 
}

function duplicate() { 
    if (selectedIndices.length === 0) return; 
    copySelection();
    pasteSelection();
}

function layer(dir) { 
    if (selectedIndices.length === 0) return; 
    remember(); 
    var primaryIdx = selectedIndices[selectedIndices.length - 1];
    var o = items.splice(primaryIdx, 1)[0]; 
    if (dir > 0) { items.push(o); selectedIndices = [items.length - 1]; } 
    else { items.unshift(o); selectedIndices = [0]; } 
    sync(); 
    draw(); 
}

function setZoom() {
    var z = $('zoom').value, w = $('work');
    scale = z === 'fit' ? Math.min(1, Math.max(.05, (w.clientWidth - 42) / canvas.width), Math.max(.05, (w.clientHeight - 42) / canvas.height)) : parseFloat(z);
    canvas.style.width = Math.round(canvas.width * scale) + 'px';
    canvas.style.height = Math.round(canvas.height * scale) + 'px';
    scale = parseFloat(canvas.style.width) / canvas.width;
    canvas.style.height = (canvas.height * scale) + 'px';
    draw();
}

function addPhotoBorder(img, borderSize) {
    var tempCanvas = document.createElement('canvas');
    var tempCtx = tempCanvas.getContext('2d');

    tempCanvas.width = img.width + (borderSize * 2);
    tempCanvas.height = img.height + (borderSize * 2);

    // Black border/background
    tempCtx.fillStyle = '#000000';
    tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

    // Original photo inside the border
    tempCtx.drawImage(img, borderSize, borderSize);

    return tempCanvas.toDataURL('image/jpeg', 0.95);
}

function loadImage(data, completed) {
    remember();

    var img = new Image();

    img.onload = function () {

        // Add 10px black border if checkbox is enabled
        var borderEnabled = $('photoBorder') && $('photoBorder').checked;

        if (borderEnabled) {
            var borderedData = addPhotoBorder(img, 5);

            var borderedImg = new Image();

            borderedImg.onload = function () {
                photo = borderedImg;
                photoData = borderedData;

                canvas.width = borderedImg.width;
                canvas.height = borderedImg.height;

                items = [];
                selectedIndices = [];
                canvas.style.display = 'block';

                setZoom();
                sync();

                status(
                    'Image loaded with 10px black border: ' +
                    borderedImg.width + ' x ' +
                    borderedImg.height + ' pixels.'
                );

                setProgress(100);
                setTimeout(function () {
                    setProgress(-1);
                }, 300);

                if (completed) completed(true);
            };

            borderedImg.onerror = function () {
                setProgress(-1);
                undoStack.pop();

                if (completed) {
                    completed(false);
                    return;
                }

                alert('The bordered image could not be loaded.');
            };

            borderedImg.src = borderedData;
            return;
        }

        // Normal image loading when border is turned off
        photo = img;
        photoData = data;

        canvas.width = img.width;
        canvas.height = img.height;

        items = [];
        selectedIndices = [];
        canvas.style.display = 'block';

        setZoom();
        sync();

        status(
            'Image loaded: ' +
            img.width + ' x ' +
            img.height + ' pixels.'
        );

        setProgress(100);

        setTimeout(function () {
            setProgress(-1);
        }, 300);

        if (completed) completed(true);
    };

    img.onerror = function () {
        setProgress(-1);
        undoStack.pop();

        if (completed) {
            completed(false);
            return;
        }

        alert('The image could not be loaded. Try PNG or JPEG.');
    };

    img.src = data;
}


function JobPackMaker(){
	window.open("https://jobpackmaker.gt.tc/", "_blank");
	return;
}

function pastePhoto() {
    if (busy) return;
    status('Reading clipboard photo...');
    setProgress(50);
    if (navigator.clipboard && navigator.clipboard.read) {
        navigator.clipboard.read().then(function(itemsList) {
            for (var i = 0; i < itemsList.length; i++) {
                var clipboardItem = itemsList[i];
                var imageType = clipboardItem.types.find(function(type) { return type.startsWith('image/'); });
                if (imageType) {
                    clipboardItem.getType(imageType).then(function(blob) {
                        var reader = new FileReader();
                        reader.onload = function(e) { loadImage(e.target.result); status('Pasted photo loaded successfully.'); };
                        reader.readAsDataURL(blob);
                    });
                    return;
                }
            }
            setProgress(-1);
            status('No image found on clipboard. Make sure to copy an image first.');
        }).catch(function(err) {
            setProgress(-1);
            status('Please click inside and press Ctrl+V to paste your image.');
        });
    } else {
        setProgress(-1);
        status('Clipboard API not supported in this browser. Press Ctrl+V directly.');
    }
}



function keys(e) {
    e = e || window.event; 
    if (window.ls3dKeyDown && window.ls3dKeyDown(e)) return;
   
    if ($('modal').style.display === 'block') {
        if (e.keyCode === 27) { cancelText(); return; }
        if (e.keyCode === 13) { 
            if (!e.shiftKey) {
                e.preventDefault(); 
                finishText(); 
            }
            return; 
        }
        return; 
    }

    var tag = (e.target || e.srcElement).tagName;
    if (tag === 'INPUT' || tag === 'SELECT') return;
    if (tag === 'TEXTAREA') {
        if (e.keyCode === 13) { if (!e.shiftKey) { e.preventDefault(); applyText(); setTool('select'); } return; }
        return;
    }
    
    if (e.ctrlKey && e.keyCode === 67) { e.preventDefault(); copySelection(); }
    else if (e.ctrlKey && e.keyCode === 90) { e.preventDefault(); undo(); }
    else if (e.ctrlKey && e.keyCode === 89) { e.preventDefault(); redo(); }
    else if (e.keyCode === 46) { e.preventDefault(); removeSelected(); }
    else if (e.keyCode === 27) { selectedIndices = []; setTool('select'); sync(); draw(); }
    else if (selectedIndices.length > 0 && e.keyCode >= 37 && e.keyCode <= 40) {
        e.preventDefault(); remember(); var n = e.shiftKey ? 10 : 1, dx = e.keyCode === 37 ? -n : e.keyCode === 39 ? n : 0, dy = e.keyCode === 38 ? -n : e.keyCode === 40 ? n : 0;
        for (var si = 0; si < selectedIndices.length; si++) {
            var o = items[selectedIndices[si]];
            if (o.type === 'skewbox' || o.type === 'curve') {
                var pts = o.points || [];
                for (var pi = 0; pi < pts.length; pi++) {
                    pts[pi].x += dx; pts[pi].y += dy;
                }
                if (o.type === 'curve' && pts.length >= 2) {
                    o.x = pts[0].x; o.y = pts[0].y;
                    o.x2 = pts[pts.length - 1].x; o.y2 = pts[pts.length - 1].y;
                }
            } else {
                o.x += dx; o.y += dy; 
                if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') { o.x2 += dx; o.y2 += dy; } 
                else if ((o.type === 'pen' || o.type === 'highlighter') && o.points) { for (var pi = 0; pi < o.points.length; pi++) { o.points[pi].x += dx; o.points[pi].y += dy; } }
            }
        }
        draw();
    }
}

function init() {
    canvas = $('stage');
    if (!canvas.getContext) { alert('Canvas is unavailable in this browser.'); return; }
    ctx = canvas.getContext('2d');
    $('textArrow').checked = textArrowPref;
    if ($('opacitySlider')) $('opacitySlider').value = opacityMode;
    if ($('opacityVal')) $('opacityVal').innerText = Math.round(opacityMode * 100) + '%';
    if ($('lineStyleSelect')) $('lineStyleSelect').value = lineStyleMode;
    updateTextArrowUI();
    setTool('select');
    updateLongSectionAvailability();

    var colours = ['#FFFFFF', '#000000', '#FFFF00', '#FF4444', '#0088FF', '#00FFFF', '#00FF66', '#FF9900', '#FF00FF'];
    for (var i = 0; i < colours.length; i++) {
        var b = document.createElement('span'); b.className = 'swatch'; b.style.backgroundColor = colours[i]; b.title = colours[i]; b.setAttribute('data-colour', colours[i]); b.onclick = function () { $('colour').value = this.getAttribute('data-colour'); syncColorPickers(); applyProps(); }; $('palette').appendChild(b);
        var fb = document.createElement('span'); fb.className = 'swatch'; fb.style.backgroundColor = colours[i]; fb.title = colours[i]; fb.setAttribute('data-colour', colours[i]); fb.onclick = function () { $('fill').value = this.getAttribute('data-colour'); $('backed').checked = true; syncColorPickers(); applyProps(); }; $('fillPalette').appendChild(fb);
    }
    
    $('watermarkText').oninput = function() { draw(); };
    canvas.onmousedown = down;
    canvas.oncontextmenu = showContextMenu;
    document.onmousemove = move;
    document.onmouseup = up;
    canvas.ondblclick = function (e) { 
        var p = point(e);
        for (var i = items.length - 1; i >= 0; i--) {
            var o = items[i];
            if (o.type === 'skewbox') {
                var pts = o.points || (o.p1 ? [o.p1, o.p2, o.p3, o.p4] : []);
                var threshold = 15 / scale;
                for (var j = 0; j < pts.length; j++) {
                    var p1 = pts[j];
                    var p2 = pts[(j + 1) % pts.length];
                    if (distToSegmentSquared(p, p1, p2) <= threshold * threshold) {
                        remember();
                        pts.splice(j + 1, 0, { x: p.x, y: p.y });
                        selectedIndices = [i];
                        sync();
                        draw();
                        status('Added new node to skew box.');
                        return;
                    }
                }
            } else if (o.type === 'curve') {
                var pts = o.points || [{ x: o.x, y: o.y }, { x: o.x2, y: o.y2 }];
                var threshold = 15 / scale;
                if (pts.length < 2) return;

                var curX = pts[0].x, curY = pts[0].y;
                for (var j = 0; j < pts.length - 1; j++) {
                    var p0 = pts[j];
                    var p1 = pts[j + 1];
                    var xc = (j === pts.length - 2) ? p1.x : (p0.x + p1.x) / 2;
                    var yc = (j === pts.length - 2) ? p1.y : (p0.y + p1.y) / 2;

                    var steps = 30;
                    var startX = curX, startY = curY;
                    var cpx = p0.x, cpy = p0.y;
                    var endX = xc, endY = yc;
                    var prevX = startX, prevY = startY;
                    var bestT = 0, bestDistSq = Infinity;

                    for (var s = 1; s <= steps; s++) {
                        var t = s / steps;
                        var qx = Math.pow(1 - t, 2) * startX + 2 * (1 - t) * t * cpx + Math.pow(t, 2) * endX;
                        var qy = Math.pow(1 - t, 2) * startY + 2 * (1 - t) * t * cpy + Math.pow(t, 2) * endY;

                        var dSq = distToSegmentSquared(p, { x: prevX, y: prevY }, { x: qx, y: qy });
                        if (dSq < bestDistSq) {
                            bestDistSq = dSq;
                            bestT = t;
                        }
                        prevX = qx;
                        prevY = qy;
                    }

                    if (bestDistSq <= threshold * threshold) {
                        remember();
                        // Compute exact curve coordinate at the closest point t
                        var exactX = Math.pow(1 - bestT, 2) * startX + 2 * (1 - bestT) * bestT * cpx + Math.pow(bestT, 2) * endX;
                        var exactY = Math.pow(1 - bestT, 2) * startY + 2 * (1 - bestT) * bestT * cpy + Math.pow(bestT, 2) * endY;

                        // Insert the node precisely on the curve path
                        pts.splice(j + 1, 0, { x: exactX, y: exactY });
                        o.x = pts[0].x; o.y = pts[0].y;
                        o.x2 = pts[pts.length - 1].x; o.y2 = pts[pts.length - 1].y;
                        selectedIndices = [i];
                        sync();
                        draw();
                        status('Added new node to curve.');
                        return;
                    }
                    curX = endX;
                    curY = endY;
                }
            }
        }

        var primaryIdx = selectedIndices.length > 0 ? selectedIndices[selectedIndices.length - 1] : -1;
        if (primaryIdx >= 0) {
            var o = items[primaryIdx];
            if (o.type === 'text') {
                showText(primaryIdx, null);
            } else if (o.type === 'dimension' || o.type === 'slope') {
                showDimension(primaryIdx, false);
            }
        }
    };
    document.onkeydown = keys;
    
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#contextMenu')) {
            $('contextMenu').style.display = 'none';
        }
    });

    window.addEventListener('paste', function(e) {
    var clipboardData = e.clipboardData || e.originalEvent.clipboardData;
    if (!clipboardData) return;

    // ---------------------------------------------------------
    // 1. CHECK THE CURRENT WINDOWS CLIPBOARD TEXT FIRST.
    // If it contains our special shape payload, paste the shape.
    // Otherwise ordinary text must be allowed to paste normally.
    // ---------------------------------------------------------
    var textData = clipboardData.getData('text/plain');

    if (textData) {
        try {
            var parsed = JSON.parse(textData);

            if (
                parsed &&
                parsed.type === 'photomarkup_shapes' &&
                parsed.data
            ) {
                clipboard = parsed.data;
                pasteOffsetCount = 0;

                e.preventDefault();
                pasteSelection();
                return;
            }
        } catch (err) {
            // Normal text.
            // Do NOT fall back to the old internal shape clipboard.
        }

        // There is real text on the current system clipboard.
        // Let the browser paste it into an input/textarea normally.
        return;
    }

    // ---------------------------------------------------------
    // 2. CHECK FOR AN IMAGE
    // ---------------------------------------------------------
    var itemsList = clipboardData.items;
    var hasImage = false;

    if (itemsList) {
        for (var i = 0; i < itemsList.length; i++) {
            if (itemsList[i].type.indexOf('image') !== -1) {
                var blob = itemsList[i].getAsFile();

                if (blob) {
                    hasImage = true;

                    var reader = new FileReader();

                    reader.onload = function(event) {
                        loadImage(event.target.result);
                        status('Pasted photo loaded successfully.');
                    };

                    reader.readAsDataURL(blob);
                    e.preventDefault();
                    break;
                }
            }
        }
    }

    // ---------------------------------------------------------
    // 3. ONLY FALL BACK TO THE INTERNAL SHAPE CLIPBOARD WHEN
    // THE SYSTEM CLIPBOARD CONTAINS NEITHER TEXT NOR AN IMAGE.
    // ---------------------------------------------------------
    if (!hasImage && !textData && clipboard.length > 0) {
        e.preventDefault();
        pasteSelection();
    }
});

    window.onresize = function () { if ($('zoom').value === 'fit') setZoom(); };
    setZoom();
}

function rotateImage90() {
    if (!photo) {
        status('No image loaded to rotate.');
        return;
    }
    
    remember('Image Rotated (90° CW)');
    
    status('Rotating image 90° clockwise...');
    
    // Use the image's actual natural or current dimensions to prevent cascading truncation
    var oldW = canvas.width;
    var oldH = canvas.height;
    
    var tempCanvas = document.createElement('canvas');
    var tempCtx = tempCanvas.getContext('2d');
    
    // Swap width and height for 90-degree rotation
    tempCanvas.width = oldH;
    tempCanvas.height = oldW;
    
    tempCtx.save();
    tempCtx.translate(tempCanvas.width / 2, tempCanvas.height / 2);
    tempCtx.rotate(Math.PI / 2);
    tempCtx.drawImage(photo, -oldW / 2, -oldH / 2);
    tempCtx.restore();
    
    // Transform all items to match the new 90° CW rotated dimensions
    for (var i = 0; i < items.length; i++) {
        var o = items[i];
        
        var rotateCoord = function(pt) {
            return { x: oldH - pt.y, y: pt.x };
        };

        if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') {
            var p1 = rotateCoord({ x: o.x, y: o.y });
            var p2 = rotateCoord({ x: o.x2, y: o.y2 });
            o.x = p1.x; o.y = p1.y;
            o.x2 = p2.x; o.y2 = p2.y;
        } 
        else if (o.type === 'curve' || o.type === 'skewbox' || (o.type === 'pen' || o.type === 'highlighter')) {
            if (o.points && o.points.length > 0) {
                for (var pi = 0; pi < o.points.length; pi++) {
                    o.points[pi] = rotateCoord(o.points[pi]);
                }
                if (o.type === 'curve' && o.points.length >= 2) {
                    o.x = o.points[0].x; o.y = o.points[0].y;
                    o.x2 = o.points[o.points.length - 1].x; o.y2 = o.points[o.points.length - 1].y;
                }
            }
        } 
        else {
            var cx = o.x + o.w / 2;
            var cy = o.y + o.h / 2;
            var newCenter = rotateCoord({ x: cx, y: cy });
            
            var tempW = o.w;
            o.w = o.h;
            o.h = tempW;
            
            o.x = newCenter.x - o.w / 2;
            o.y = newCenter.y - o.h / 2;
            
            if (o.angle !== undefined) {
                o.angle += Math.PI / 2;
                // Snap to nearest 90° increment to eliminate floating-point drift across rotations
                o.angle = Math.round(o.angle / (Math.PI / 2)) * (Math.PI / 2);
                o.angle = (o.angle + Math.PI * 2) % (Math.PI * 2);
            }
        }
    }
    
    var rotatedDataURL = tempCanvas.toDataURL('image/jpeg', 0.9);
    photoData = rotatedDataURL;
    
    var img = new Image();
    img.onload = function () {
        photo = img;
        canvas.width = tempCanvas.width;
        canvas.height = tempCanvas.height;
        setZoom(); 
        sync(); 
        draw();
        updateHistoryUI();
        status('Image and all layers rotated 90° successfully.');
        setProgress(100); 
        setTimeout(function () { setProgress(-1); }, 300);
    };
    img.src = rotatedDataURL;
}

function executeCrop() {
    if (!cropRect || cropRect.w < 10 || cropRect.h < 10) {
        status('Please drag a valid crop area first.');
        return;
    }
    remember('Image Cropped');
    status('Cropping image...');
    
    var cx = Math.max(0, Math.round(cropRect.x));
    var cy = Math.max(0, Math.round(cropRect.y));
    var cw = Math.min(canvas.width - cx, Math.round(cropRect.w));
    var ch = Math.min(canvas.height - cy, Math.round(cropRect.h));
    
    var tempCanvas = document.createElement('canvas');
    var tempCtx = tempCanvas.getContext('2d');
    tempCanvas.width = cw;
    tempCanvas.height = ch;
    
    // 1. Draw only the cropped photo pixels (do NOT bake items into the image)
    if (photo) {
        tempCtx.drawImage(photo, cx, cy, cw, ch, 0, 0, cw, ch);
    } else {
        tempCtx.fillStyle = '#ffffff';
        tempCtx.fillRect(0, 0, cw, ch);
    }
    
    // 2. Shift existing items relative to the crop origin (-cx, -cy)
    var retainedItems = [];
    for (var i = 0; i < items.length; i++) {
        var o = copyObj(items[i]);
        var b = bounds(o);
        
        // Check if the item is at least partially within the crop box
        if (b.x + b.w > cx && b.x < cx + cw && b.y + b.h > cy && b.y < cy + ch) {
            // Shift coordinate structures
            if (o.type === 'arrow' || o.type === 'line' || o.type === 'dimension' || o.type === 'slope') {
                o.x -= cx; o.y -= cy;
                o.x2 -= cx; o.y2 -= cy;
            } else if (o.type === 'curve' || o.type === 'skewbox' || (o.type === 'pen' || o.type === 'highlighter')) {
                if (o.points) {
                    for (var pi = 0; pi < o.points.length; pi++) {
                        o.points[pi].x -= cx;
                        o.points[pi].y -= cy;
                    }
                }
                if (o.type === 'curve') {
                    o.x = o.points[0].x; o.y = o.points[0].y;
                    o.x2 = o.points[o.points.length - 1].x; o.y2 = o.points[o.points.length - 1].y;
                }
            } else {
                o.x -= cx;
                o.y -= cy;
            }
            retainedItems.push(o);
        }
    }
    
    items = retainedItems;
    selectedIndices = [];
    cropRect = null;
    
    // Load the newly cropped clean background image while keeping vector items intact
    var rotatedDataURL = tempCanvas.toDataURL('image/jpeg', 0.9);
    photoData = rotatedDataURL;
    
    var img = new Image();
    img.onload = function () {
        photo = img;
        canvas.width = tempCanvas.width;
        canvas.height = tempCanvas.height;
        setZoom(); 
        sync(); 
        draw();
        updateHistoryUI();
        status('Image cropped successfully. Items remain fully moveable.');
        setProgress(100); 
        setTimeout(function () { setProgress(-1); }, 300);
    };
    img.src = rotatedDataURL;
    
    setTool('select');
}

/* Long-section 3D field. Loaded by index.php. Ground surface follows the green GL line.
   The blue pipe follows invert (pipe bottom). Editing the long section rebuilds this view. */
var ls3dActive = false;
var ls3dExpanded = false;
var ls3dMode = 'orbit';
var ls3dSurface = 'trench';
var ls3dLabelsOn = true;
var ls3dExag = 1;
var ls3dHScale = 1;
var ls3dKeys = {};
var ls3dDebounce = null;
var ls3dHash = '';
var ls3dLoopOn = false;
var ls3dRenderer = null;
var ls3dScene = null;
var ls3dCamera = null;
var ls3dControls = null;
var ls3dContent = null;
var ls3dSky = null;
var ls3dSun = null;
var ls3dWind = { value: 0 };
var ls3dProfile = null;
var ls3dWorld = null;
var ls3dDrag = null;
var ls3dLastT = 0;
var ls3dDirty = true;
var ls3dInspectHide = null;
var TRENCH = 1.45;
var PIPE_R = 0.25;

var walk = { x: 0, y: 2, z: 4, yaw: -Math.PI / 2, pitch: -0.08, placed: false, lastSpeed: 0 };
var tmpFwd = null, tmpRight = null, tmpMove = null;

function ls3d$(id) { return document.getElementById(id); }

function ls3dHash2(x, z) {
    var n = Math.sin(x * 127.1 + z * 311.7) * 43758.5453;
    return n - Math.floor(n);
}
function ls3dNoise(ch, z) {
    var d = Math.max(0, Math.abs(z) - 7);
    var amp = Math.min(0.16, d * 0.0035);
    if (amp <= 0) return 0;
    var n = Math.sin(ch * 0.085 + z * 0.02) * Math.sin(z * 0.041);
    n += 0.55 * Math.sin(ch * 0.021 - z * 0.017);
    return n * amp;
}
function ls3dMerge() {
    var vals = [];
    for (var a = 0; a < arguments.length; a++) {
        var arr = arguments[a];
        for (var i = 0; i < arr.length; i++) {
            if (isFinite(arr[i])) vals.push(arr[i]);
        }
    }
    vals.sort(function(a, b) { return a - b; });
    var out = [];
    for (var j = 0; j < vals.length; j++) {
        if (!out.length || vals[j] - out[out.length - 1] > 0.04) out.push(vals[j]);
    }
    return out;
}
function ls3dSample(pts, ch) {
    if (!pts || !pts.length) return 0;
    if (ch <= pts[0].ch) return pts[0].y;
    var last = pts[pts.length - 1];
    if (ch >= last.ch) return last.y;
    for (var i = 0; i < pts.length - 1; i++) {
        var a = pts[i], b = pts[i + 1];
        if (b.ch - a.ch < 1e-4) continue;
        if (ch >= a.ch && ch <= b.ch) {
            var t = (ch - a.ch) / (b.ch - a.ch);
            return a.y + (b.y - a.y) * t;
        }
    }
    return last.y;
}
function ls3dCollapseGround(pts) {
    pts.sort(function(a, b) { return a.ch - b.ch || (a.custom ? 1 : 0) - (b.custom ? 1 : 0); });
    var out = [];
    for (var i = 0; i < pts.length; i++) {
        var p = pts[i];
        if (!out.length || Math.abs(p.ch - out[out.length - 1].ch) > 0.01) {
            out.push({ ch: p.ch, y: p.y });
        } else if (Math.abs(p.y - out[out.length - 1].y) >= 0.02) {
            out.push({ ch: out[out.length - 1].ch + 0.15, y: p.y });
        } else if (p.custom) {
            out[out.length - 1].y = p.y;
        }
    }
    return out;
}
function ls3dBuildProfile() {
    var slopes = (typeof getCompleteSlopeItems === 'function') ? getCompleteSlopeItems() : [];
    if (!slopes.length) return null;
    var ground = [], pipe = [], joints = [], total = 0;
    slopes.forEach(function(o) {
        var len = Number(o.dimVal);
        if (!isFinite(len) || len <= 0) len = 1;
        var la = parseLL(o.llA), lb = parseLL(o.llB);
        var ia = getSlopeInvert(o, false), ib = getSlopeInvert(o, true);
        var start = total, end = total + len;
        if (la !== null) ground.push({ ch: start, y: la, custom: false });
        if (ia !== null) pipe.push({ ch: start, y: ia });
        var nodes = (o.customNodes || []).slice().sort(function(a, b) { return a.ch - b.ch; });
        nodes.forEach(function(cn) {
            if (cn.ll !== undefined && cn.ll !== null && isFinite(Number(cn.ll))) {
                ground.push({ ch: cn.ch, y: Number(cn.ll), custom: true });
            }
            if (cn.inv !== undefined && cn.inv !== null && isFinite(Number(cn.inv))) {
                pipe.push({ ch: cn.ch, y: Number(cn.inv) });
            }
        });
        if (lb !== null) ground.push({ ch: end, y: lb, custom: false });
        if (ib !== null) pipe.push({ ch: end, y: ib });
        joints.push(start);
        total = end;
    });
    joints.push(total);
    ground = ls3dCollapseGround(ground);
    var cleaned = [];
    for (var i = 0; i < pipe.length; i++) {
        var p = pipe[i];
        var prev = cleaned[cleaned.length - 1];
        if (prev && Math.abs(prev.ch - p.ch) < 0.001 && Math.abs(prev.y - p.y) < 0.001) continue;
        cleaned.push(p);
    }
    cleaned.sort(function(a, b) { return a.ch - b.ch; });
    if (ground.length < 2 || cleaned.length < 2) return null;
    var minRL = Infinity, maxRL = -Infinity;
    ground.forEach(function(p) { minRL = Math.min(minRL, p.y); maxRL = Math.max(maxRL, p.y); });
    cleaned.forEach(function(p) { minRL = Math.min(minRL, p.y); maxRL = Math.max(maxRL, p.y); });
    return { ground: ground, pipe: cleaned, joints: joints, total: total, minRL: minRL, maxRL: maxRL, yMid: (minRL + maxRL) / 2 };
}
function ls3dY(rl) {
    var mid = ls3dProfile ? ls3dProfile.yMid : 0;
    return mid + (rl - mid) * ls3dExag;
}
function ls3dX(ch) { return ch * ls3dHScale; }
function ls3dCh(x) { return ls3dHScale ? x / ls3dHScale : x; }
function ls3dGroundRL(ch) { return ls3dSample(ls3dProfile.ground, ch); }
function ls3dInvLow(ch) {
    var path = ls3dProfile.pipe, best = null;
    for (var i = 0; i < path.length - 1; i++) {
        var a = path[i], b = path[i + 1];
        var c0 = Math.min(a.ch, b.ch), c1 = Math.max(a.ch, b.ch);
        if (ch < c0 - 0.03 || ch > c1 + 0.03) continue;
        var y;
        if (c1 - c0 < 1e-3) y = Math.min(a.y, b.y);
        else {
            var t = (ch - a.ch) / (b.ch - a.ch);
            if (t < 0) t = 0; else if (t > 1) t = 1;
            y = a.y + (b.y - a.y) * t;
        }
        if (best === null || y < best) best = y;
    }
    if (best === null) best = ls3dSample(path, ch);
    return best;
}
function ls3dGroundWorld(ch, z) { return ls3dY(ls3dGroundRL(ch)); }
function ls3dFloorWorld(ch) { return ls3dY(ls3dInvLow(ch) - 0.16); }
function ls3dSurfaceAt(x, z) {
    var ch = ls3dCh(x);
    var total = ls3dProfile ? ls3dProfile.total : 0;
    if (ls3dSurface === 'trench' && ch >= -0.2 && ch <= total + 0.2 && Math.abs(z) < TRENCH - 0.05) return ls3dFloorWorld(ch);
    return ls3dGroundWorld(ch, z);
}

function ls3dKeyDown(e) {
    if (!ls3dActive) return false;
    var tag = (e.target && e.target.tagName) || '';
    if (tag === 'INPUT' || tag === 'TEXTAREA' || tag === 'SELECT') return false;
    if (e.ctrlKey || e.metaKey || e.altKey) return false;
    if (e.code === 'Escape') {
        if (ls3dExpanded) { ls3dSetExpanded(false); e.preventDefault(); return true; }
        if (ls3dMode === 'walk') { ls3dSetMode('orbit'); e.preventDefault(); return true; }
        return false;
    }
    var codes = { KeyW: 1, KeyA: 1, KeyS: 1, KeyD: 1, KeyQ: 1, KeyE: 1, ArrowUp: 1, ArrowDown: 1, ArrowLeft: 1, ArrowRight: 1, ShiftLeft: 1, ShiftRight: 1 };
    if (!codes[e.code]) return false;
    ls3dKeys[e.code] = true;
    e.preventDefault();
    return true;
}
function ls3dKeyUp(e) {
    if (e && e.code) ls3dKeys[e.code] = false;
}
function ls3dHeld(code) {
    if (ls3dKeys[code]) return true;
    if (code === 'KeyW' && ls3dKeys.ArrowUp) return true;
    if (code === 'KeyS' && ls3dKeys.ArrowDown) return true;
    if (code === 'KeyA' && ls3dKeys.ArrowLeft) return true;
    if (code === 'KeyD' && ls3dKeys.ArrowRight) return true;
    return false;
}
window.addEventListener('blur', function() { ls3dKeys = {}; });
window.addEventListener('keyup', ls3dKeyUp);
document.addEventListener('keyup', ls3dKeyUp);

function ls3dOnProfileChange() {
    if (!ls3dActive) return;
    clearTimeout(ls3dDebounce);
    ls3dDebounce = setTimeout(function() {
        if (typeof draggingNode !== 'undefined' && draggingNode) {
            ls3dOnProfileChange();
            return;
        }
        if (ls3dRenderer) ls3dRebuild(false);
    }, 90);
}
window.ls3dOnProfileChange = ls3dOnProfileChange;
window.ls3dKeyDown = ls3dKeyDown;

function ls3dEnsure(cb) {
    if (window.THREE && window.OrbitControls) { cb(); return; }
    if (!ls3dEnsure.promise) {
        ls3dEnsure.promise = new Promise(function(resolve, reject) {
            var s = document.createElement('script');
            s.type = 'module';
            s.textContent = "import * as THREE from 'three';\nimport { OrbitControls } from 'https://unpkg.com/three@0.170.0/examples/jsm/controls/OrbitControls.js';\nwindow.THREE = THREE;\nwindow.OrbitControls = OrbitControls;\nwindow.dispatchEvent(new Event('ls3d-three-ready'));";
            function ok() { resolve(); }
            window.addEventListener('ls3d-three-ready', ok, { once: true });
            s.onerror = function() { ls3dEnsure.promise = null; reject(new Error('Could not load the 3D engine')); };
            document.head.appendChild(s);
            setTimeout(function() {
                if (!window.THREE) {
                    ls3dEnsure.promise = null;
                    reject(new Error('The 3D engine did not load. Check your connection and try again.'));
                }
            }, 20000);
        });
    }
    status('Loading 3D field…');
    ls3dEnsure.promise.then(cb).catch(function(err) { status(err.message || '3D view failed to load'); });
}

function ls3dBindPad() {
    var pad = ls3d$('ls3dPad');
    if (!pad || pad._bound) return;
    pad._bound = true;
    var buttons = pad.querySelectorAll('button');
    for (var i = 0; i < buttons.length; i++) {
        (function(b) {
            var code = b.getAttribute('data-k');
            if (!code) return;
            function down(ev) { ev.preventDefault(); ls3dKeys[code] = true; b.classList.add('on'); }
            function up() { ls3dKeys[code] = false; b.classList.remove('on'); }
            b.addEventListener('pointerdown', down);
            b.addEventListener('pointerup', up);
            b.addEventListener('pointerleave', up);
            b.addEventListener('pointercancel', up);
        })(buttons[i]);
    }
}

function ls3dInitEngine() {
    if (ls3dRenderer) return;
    var THREE = window.THREE;
    var canvas = ls3d$('ls3dCanvas');
    ls3dScene = new THREE.Scene();
    ls3dScene.background = new THREE.Color(0x8ebfe0);
    ls3dCamera = new THREE.PerspectiveCamera(52, 1, 0.08, 6000);
    ls3dCamera.position.set(12, 8, 16);
    ls3dRenderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: false, powerPreference: 'high-performance' });
    ls3dRenderer.setPixelRatio(1);
    ls3dRenderer.shadowMap.enabled = false;
    ls3dRenderer.toneMapping = THREE.ACESFilmicToneMapping;
    ls3dRenderer.toneMappingExposure = 1.05;
    if (THREE.SRGBColorSpace) ls3dRenderer.outputColorSpace = THREE.SRGBColorSpace;

    var hemi = new THREE.HemisphereLight(0xd7ecff, 0x3e6a34, 0.72);
    ls3dScene.add(hemi);
    var fill = new THREE.DirectionalLight(0xfff4e5, 0.28);
    fill.position.set(-30, 40, -20);
    ls3dScene.add(fill);
    ls3dSun = new THREE.DirectionalLight(0xfff7ee, 1.15);
    ls3dSun.position.set(40, 70, 36);
    ls3dSun.castShadow = false;
    ls3dScene.add(ls3dSun);
    ls3dScene.add(ls3dSun.target);

    ls3dSky = null;

    ls3dContent = new THREE.Group();
    ls3dScene.add(ls3dContent);

    ls3dControls = new window.OrbitControls(ls3dCamera, canvas);
    ls3dControls.enableDamping = true;
    ls3dControls.dampingFactor = 0.08;
    ls3dControls.maxPolarAngle = Math.PI * 0.92;
    ls3dControls.minDistance = 0.45;
    ls3dControls.maxDistance = 900;
    ls3dControls.zoomSpeed = 0.85;
    ls3dControls.rotateSpeed = 0.85;

    tmpFwd = new THREE.Vector3();
    tmpRight = new THREE.Vector3();
    tmpMove = new THREE.Vector3();

    canvas.addEventListener('contextmenu', function(e) { e.preventDefault(); });
    canvas.addEventListener('pointerdown', function(e) {
        if (e.button !== 0) return;
        ls3dDrag = { x: e.clientX, y: e.clientY, moved: 0, id: e.pointerId };
        if (ls3dMode === 'walk') {
            try { canvas.setPointerCapture(e.pointerId); } catch (err) {}
        }
    });
    canvas.addEventListener('pointermove', function(e) {
        if (!ls3dDrag || ls3dMode !== 'walk') return;
        var dx = e.clientX - ls3dDrag.x, dy = e.clientY - ls3dDrag.y;
        ls3dDrag.x = e.clientX;
        ls3dDrag.y = e.clientY;
        ls3dDrag.moved += Math.abs(dx) + Math.abs(dy);
        walk.yaw -= dx * 0.0052;
        walk.pitch -= dy * 0.0052;
        ls3dDirty = true;
        if (walk.pitch > 1.2) walk.pitch = 1.2;
        if (walk.pitch < -1.15) walk.pitch = -1.15;
    });
    canvas.addEventListener('pointerup', function(e) {
        if (!ls3dDrag) return;
        var moved = ls3dDrag.moved;
        ls3dDrag = null;
        if (moved < 6) ls3dInspect(e);
    });
    window.addEventListener('resize', ls3dResize);
    ls3dBindPad();
    ls3dWireProbe();
}

function ls3dWireProbe() {
    window.__controlsTest = {
        getYaw: function() { return walk.yaw; },
        getSpeed: function() { return walk.lastSpeed; },
        getPos: function() { return { x: walk.x, y: walk.y, z: walk.z }; },
        setKeys: function(codes) {
            ls3dKeys = {};
            (codes || []).forEach(function(c) { ls3dKeys[c] = true; });
        },
        setYaw: function(y) { walk.yaw = y; },
        setPitch: function(p) { walk.pitch = p; },
        setPos: function(x, z) { walk.x = x; walk.z = z; walk.placed = true; }
    };
}

function ls3dResize() {
    if (!ls3dRenderer || !ls3dActive) return;
    var stage = ls3d$('ls3dStage');
    var w = stage.clientWidth, h = stage.clientHeight;
    if (w < 2 || h < 2) return;
    ls3dRenderer.setSize(w, h, false);
    ls3dCamera.aspect = w / h;
    ls3dCamera.updateProjectionMatrix();
    ls3dDirty = true;
}

function ls3dDisposeContent() {
    if (!ls3dContent) return;
    for (var i = ls3dContent.children.length - 1; i >= 0; i--) {
        var obj = ls3dContent.children[i];
        ls3dContent.remove(obj);
        obj.traverse(function(o) {
            if (o.geometry) o.geometry.dispose();
            if (o.material) {
                var mats = Array.isArray(o.material) ? o.material : [o.material];
                for (var m = 0; m < mats.length; m++) {
                    if (mats[m].map) mats[m].map.dispose();
                    mats[m].dispose();
                }
            }
        });
    }
}

function ls3dPushGrid(pos, col, idx, chs, zs, yAt, cAt) {
    var base = pos.length / 3;
    var nz = zs.length;
    for (var i = 0; i < chs.length; i++) {
        for (var j = 0; j < nz; j++) {
            var y = yAt(chs[i], zs[j]);
            pos.push(ls3dX(chs[i]), y, zs[j]);
            var c = cAt(chs[i], zs[j]);
            col.push(c.r, c.g, c.b);
        }
    }
    for (var a = 0; a < chs.length - 1; a++) {
        for (var b = 0; b < nz - 1; b++) {
            var v00 = base + a * nz + b;
            var v01 = v00 + 1;
            var v10 = base + (a + 1) * nz + b;
            var v11 = v10 + 1;
            idx.push(v00, v01, v10, v01, v11, v10);
        }
    }
}

function ls3dMakeGeo(pos, col, idx) {
    var THREE = window.THREE;
    var g = new THREE.BufferGeometry();
    g.setAttribute('position', new THREE.Float32BufferAttribute(pos, 3));
    if (col) g.setAttribute('color', new THREE.Float32BufferAttribute(col, 3));
    g.setIndex(idx);
    g.computeVertexNormals();
    return g;
}

function ls3dGrassLists(halfW, total) {
    var step = 4;
    function range(a, b, extra) {
        var s = Math.min(a, b), e = Math.max(a, b), arr = [];
        for (var v = s; v <= e + 0.01; v += step) arr.push(v > e ? e : v);
        arr.push(e);
        if (extra) extra.forEach(function(v) { if (v >= s - 0.01 && v <= e + 0.01) arr.push(v); });
        return ls3dMerge(arr);
    }
    var extras = [0, total];
    ls3dProfile.ground.forEach(function(p) { extras.push(p.ch); });
    ls3dProfile.pipe.forEach(function(p) { extras.push(p.ch); });
    return {
        along: range(-ls3dWorld.pad, total + ls3dWorld.pad, extras),
        left: range(-halfW, -TRENCH),
        right: range(TRENCH, halfW),
        mid: range(-TRENCH, TRENCH)
    };
}

function ls3dIsDropSeg(a, b) {
    var run = Math.abs(b.ch - a.ch);
    var rise = Math.abs((b.inv != null ? b.inv : b.y) - (a.inv != null ? a.inv : a.y));
    return rise >= 0.2 && run <= Math.max(0.55, rise * 0.3);
}
function ls3dDroppers(pipe) {
    var drops = [];
    for (var i = 0; i < pipe.length - 1; i++) {
        var a = pipe[i], b = pipe[i + 1];
        if (!ls3dIsDropSeg(a, b)) continue;
        var up = a.y >= b.y ? a : b;
        var down = a.y >= b.y ? b : a;
        drops.push({
            ch: (a.ch + b.ch) / 2,
            chIn: a.ch,
            chOut: b.ch,
            invTop: up.y,
            invBot: down.y
        });
    }
    return drops;
}
function ls3dAddManholes() {
    var THREE = window.THREE;
    var drops = ls3dDroppers(ls3dProfile.pipe);
    if (!drops.length) return;
    var wallMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#b7b2a8'), roughness: 0.9, metalness: 0.02, side: THREE.DoubleSide });
    var innerMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#6d675f'), roughness: 0.95, side: THREE.BackSide });
    var rimMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#d5d0c6'), roughness: 0.78, side: THREE.DoubleSide });
    var coverMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#2a3038'), roughness: 0.42, metalness: 0.55 });
    var R_OUT = 0.72, R_IN = 0.52;
    drops.forEach(function(drop) {
        var gl = ls3dGroundRL(drop.ch);
        var groundY = ls3dY(gl);
        var chamberTop = ls3dY(drop.invTop + PIPE_R);
        var chamberBot = ls3dY(drop.invBot + PIPE_R);
        if (chamberTop < chamberBot) { var swapY = chamberTop; chamberTop = chamberBot; chamberBot = swapY; }
        if (chamberTop < chamberBot + 0.08) chamberTop = chamberBot + 0.08;
        var h = chamberTop - chamberBot;
        var group = new THREE.Group();
        group.name = 'manhole';
        group.userData = { kind: 'manhole', ch: drop.ch, groundY: groundY, gl: gl, invBot: drop.invBot, invTop: drop.invTop };
        group.position.set(ls3dX(drop.ch), chamberBot, 0);

        var outer = new THREE.Mesh(new THREE.CylinderGeometry(R_OUT, R_OUT + 0.04, h, 20, 1, true), wallMat);
        outer.position.y = h / 2;
        group.add(outer);
        var inner = new THREE.Mesh(new THREE.CylinderGeometry(R_IN, R_IN + 0.02, Math.max(0.3, h - 0.08), 20, 1, true), innerMat);
        inner.position.y = h / 2;
        group.add(inner);
        var base = new THREE.Mesh(new THREE.CylinderGeometry(R_OUT + 0.05, R_OUT + 0.07, 0.12, 20), wallMat);
        base.position.y = 0.06;
        group.add(base);
        var topRing = new THREE.Mesh(new THREE.RingGeometry(R_IN - 0.02, R_OUT + 0.02, 20), rimMat);
        topRing.rotation.x = -Math.PI / 2;
        topRing.position.y = h;
        group.add(topRing);

        var riserH = groundY - chamberTop;
        if (riserH > 0.12) {
            var riser = new THREE.Mesh(new THREE.CylinderGeometry(0.38, 0.4, riserH, 16, 1, true), wallMat);
            riser.position.y = h + riserH / 2;
            group.add(riser);
        }
        var cover = new THREE.Mesh(new THREE.CylinderGeometry(0.46, 0.46, 0.07, 16), coverMat);
        cover.position.y = (groundY - chamberBot) + 0.04;
        group.add(cover);
        var apron = new THREE.Mesh(new THREE.CylinderGeometry(0.7, 0.74, 0.05, 16), rimMat);
        apron.position.y = (groundY - chamberBot) + 0.02;
        group.add(apron);

        if (ls3dLabelsOn) {
            var spr = ls3dSprite(['Dropper', 'In ' + drop.invTop.toFixed(2) + ' m', 'Out ' + drop.invBot.toFixed(2) + ' m'], '#e7e2d8');
            spr.scale.set(5.2, 2.8, 1);
            spr.position.set(0, h + 1.6, R_OUT + 1.4);
            group.add(spr);
        }
        ls3dContent.add(group);
    });
}
function ls3dStations() {
    var out = [];
    ls3dProfile.pipe.forEach(function(p) {
        var prev = out[out.length - 1];
        if (prev && Math.abs(prev.ch - p.ch) < 1e-4 && Math.abs(prev.inv - p.y) < 1e-4) return;
        out.push({ ch: p.ch, inv: p.y });
    });
    return out;
}
function ls3dTrenchChainages() {
    var vals = [];
    ls3dProfile.pipe.forEach(function(p) { vals.push(p.ch); });
    ls3dProfile.ground.forEach(function(g) { vals.push(g.ch); });
    vals.sort(function(a, b) { return a - b; });
    var out = [];
    for (var i = 0; i < vals.length; i++) {
        if (!isFinite(vals[i])) continue;
        if (!out.length || vals[i] - out[out.length - 1] > 0.02) out.push(vals[i]);
    }
    return out;
}

function ls3dOrient(geo, dir, pos) {
    var THREE = window.THREE;
    geo.translate(0, geo.parameters.height / 2, 0);
    var q = new THREE.Quaternion();
    q.setFromUnitVectors(new THREE.Vector3(0, 1, 0), dir.clone().normalize());
    geo.applyQuaternion(q);
    geo.translate(pos.x, pos.y, pos.z);
    return geo;
}

function ls3dMergeParts(parts) {
    var THREE = window.THREE;
    var vCount = 0, iCount = 0;
    for (var i = 0; i < parts.length; i++) {
        vCount += parts[i].attributes.position.count;
        iCount += parts[i].index.count;
    }
    var pos = new Float32Array(vCount * 3);
    var norm = new Float32Array(vCount * 3);
    var idx = new Uint32Array(iCount);
    var vo = 0, io = 0;
    for (var p = 0; p < parts.length; p++) {
        var g = parts[p];
        var pa = g.attributes.position.array;
        var na = g.attributes.normal.array;
        pos.set(pa, vo * 3);
        if (na && na.length) norm.set(na, vo * 3);
        var ia = g.index.array;
        for (var k = 0; k < ia.length; k++) idx[io + k] = ia[k] + vo;
        io += ia.length;
        vo += g.attributes.position.count;
        g.dispose();
    }
    var geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('normal', new THREE.BufferAttribute(norm, 3));
    geo.setIndex(new THREE.BufferAttribute(idx, 1));
    return geo;
}

function ls3dRoundRect(g, x, y, w, h, r) {
    g.beginPath();
    g.moveTo(x + r, y);
    g.arcTo(x + w, y, x + w, y + h, r);
    g.arcTo(x + w, y + h, x, y + h, r);
    g.arcTo(x, y + h, x, y, r);
    g.arcTo(x, y, x + w, y, r);
    g.closePath();
}

function ls3dSprite(lines, accent) {
    var THREE = window.THREE;
    var c = document.createElement('canvas');
    c.width = 512; c.height = 280;
    var g = c.getContext('2d');
    g.clearRect(0, 0, 512, 280);
    ls3dRoundRect(g, 10, 10, 492, 260, 28);
    g.fillStyle = 'rgba(8,16,28,0.8)';
    g.fill();
    g.lineWidth = 10;
    g.strokeStyle = accent;
    g.stroke();
    g.textAlign = 'left';
    g.textBaseline = 'middle';
    g.font = 'bold 52px Arial';
    for (var i = 0; i < lines.length; i++) {
        g.fillStyle = i === 0 ? accent : '#f4f7fb';
        g.fillText(lines[i], 36, 70 + i * 64);
    }
    var tex = new THREE.CanvasTexture(c);
    if (THREE.SRGBColorSpace) tex.colorSpace = THREE.SRGBColorSpace;
    var mat = new THREE.SpriteMaterial({ map: tex, transparent: true, depthWrite: false });
    var s = new THREE.Sprite(mat);
    s.scale.set(6.2, 3.38, 1);
    s.userData.kind = 'label';
    s.visible = ls3dLabelsOn;
    return s;
}

function ls3dRebuild(frameCamera) {
    if (!ls3dRenderer) return;
    try { ls3dRebuildInner(frameCamera); }
    catch (err) {
        if (window.console) console.error(err);
        status('3D view hit a problem: ' + (err && err.message ? err.message : err));
    }
}

function ls3dRebuildInner(frameCamera) {
    var THREE = window.THREE;
    var profile = ls3dBuildProfile();
    if (!profile) return;
    var key = JSON.stringify({
        g: profile.ground.map(function(p) { return [p.ch.toFixed(3), p.y.toFixed(3)]; }),
        p: profile.pipe.map(function(p) { return [p.ch.toFixed(3), p.y.toFixed(3)]; }),
        e: ls3dExag, h: ls3dHScale, s: ls3dSurface, labels: ls3dLabelsOn
    });
    var same = key === ls3dHash && ls3dContent.children.length;
    ls3dProfile = profile;
    if (same) {
        if (frameCamera) ls3dFrameOverview();
        ls3dUpdateHud();
        return;
    }
    ls3dHash = key;
    ls3dDisposeContent();

    var total = profile.total;
    var SQUARE = 10;
    var pad = SQUARE;
    var halfW = TRENCH + SQUARE;
    ls3dWorld = { pad: pad, halfW: halfW };
    var cartoon = new THREE.Color('#3dcc4f');
    function grassAt() { return cartoon; }
    var pos = [], col = [], idx = [];
    var along = ls3dMerge([-pad, 0, total, total + pad], profile.ground.map(function(p) { return p.ch; }), profile.pipe.map(function(p) { return p.ch; }));
    along = along.filter(function(v) { return v >= -pad - 0.02 && v <= total + pad + 0.02; });
    if (along.length < 2) along = [-pad, total + pad];
    var yGround = function(ch, z) { return ls3dGroundWorld(ch, z); };
    if (ls3dSurface === 'trench') {
        ls3dPushGrid(pos, col, idx, along, [-halfW, -TRENCH], yGround, grassAt);
        ls3dPushGrid(pos, col, idx, along, [TRENCH, halfW], yGround, grassAt);
        var capL = along.filter(function(ch) { return ch <= 0.02; });
        var capR = along.filter(function(ch) { return ch >= total - 0.02; });
        if (capL.length > 1) ls3dPushGrid(pos, col, idx, capL, [-TRENCH, TRENCH], yGround, grassAt);
        if (capR.length > 1) ls3dPushGrid(pos, col, idx, capR, [-TRENCH, TRENCH], yGround, grassAt);
    } else {
        ls3dPushGrid(pos, col, idx, along, [-halfW, halfW], yGround, grassAt);
    }
    var grassGeo = ls3dMakeGeo(pos, col, idx);
    var grassMat = new THREE.MeshLambertMaterial({ color: new THREE.Color('#3dcc4f') });
    if (ls3dSurface === 'xray') {
        grassMat.transparent = true;
        grassMat.opacity = 0.42;
        grassMat.depthWrite = false;
    }
    var grass = new THREE.Mesh(grassGeo, grassMat);
    grass.receiveShadow = false;
    grass.castShadow = false;
    grass.userData.kind = 'ground';
    grass.renderOrder = ls3dSurface === 'xray' ? 2 : 0;
    ls3dContent.add(grass);

    var stations = ls3dStations();
    var edge = ls3dTrenchChainages();
    var scratch = new THREE.Color();
    if (ls3dSurface === 'trench' && edge.length > 1) {
        var wPos = [], wCol = [], wIdx = [];
        var fPos = [], fCol = [], fIdx = [];
        var topC = new THREE.Color('#6b4e32');
        var deepC = new THREE.Color('#2c2118');
        var bedC = new THREE.Color('#8a7358');
        function wallColor(depth) {
            var t = Math.max(0, Math.min(1, depth / 3.2));
            scratch.copy(topC).lerp(deepC, t);
            return [scratch.r, scratch.g, scratch.b];
        }
        function addWall(z) {
            var base = wPos.length / 3;
            for (var i = 0; i < edge.length; i++) {
                var ch = edge[i];
                var top = ls3dY(ls3dGroundRL(ch));
                var bot = ls3dY(ls3dInvLow(ch) - 0.16);
                if (bot > top - 0.05) bot = top - 0.05;
                var wcT = wallColor(0.05), wcB = wallColor((top - bot) / Math.max(0.001, ls3dExag));
                wPos.push(ls3dX(ch), top, z); wCol.push(wcT[0], wcT[1], wcT[2]);
                wPos.push(ls3dX(ch), bot, z); wCol.push(wcB[0], wcB[1], wcB[2]);
            }
            for (var s = 0; s < edge.length - 1; s++) {
                var a = base + s * 2;
                wIdx.push(a, a + 1, a + 2, a + 1, a + 3, a + 2);
            }
        }
        addWall(-TRENCH);
        addWall(TRENCH);
        var fb = fPos.length / 3;
        for (var i = 0; i < edge.length; i++) {
            var fy = ls3dY(ls3dInvLow(edge[i]) - 0.16);
            var topY = ls3dY(ls3dGroundRL(edge[i]));
            if (fy > topY - 0.05) fy = topY - 0.05;
            fPos.push(ls3dX(edge[i]), fy, -TRENCH);
            fPos.push(ls3dX(edge[i]), fy, TRENCH);
            fCol.push(bedC.r, bedC.g, bedC.b, bedC.r, bedC.g, bedC.b);
        }
        for (var s2 = 0; s2 < edge.length - 1; s2++) {
            var a2 = fb + s2 * 2;
            fIdx.push(a2, a2 + 1, a2 + 2, a2 + 1, a2 + 3, a2 + 2);
        }
        function addEnd(ch, inward) {
            var top = ls3dY(ls3dGroundRL(ch));
            var bot = ls3dY(ls3dInvLow(ch) - 0.16);
            if (bot > top - 0.05) bot = top - 0.05;
            var baseE = wPos.length / 3;
            var cols = [wallColor(0.2), wallColor(1.4)];
            wPos.push(ls3dX(ch), bot, -TRENCH); wCol.push(cols[1][0], cols[1][1], cols[1][2]);
            wPos.push(ls3dX(ch), bot, TRENCH); wCol.push(cols[1][0], cols[1][1], cols[1][2]);
            wPos.push(ls3dX(ch), top, -TRENCH); wCol.push(cols[0][0], cols[0][1], cols[0][2]);
            wPos.push(ls3dX(ch), top, TRENCH); wCol.push(cols[0][0], cols[0][1], cols[0][2]);
            if (inward > 0) wIdx.push(baseE, baseE + 1, baseE + 2, baseE + 1, baseE + 3, baseE + 2);
            else wIdx.push(baseE, baseE + 2, baseE + 1, baseE + 1, baseE + 2, baseE + 3);
        }
        addEnd(edge[0], 1);
        addEnd(edge[edge.length - 1], -1);
        var wall = new THREE.Mesh(ls3dMakeGeo(wPos, wCol, wIdx), new THREE.MeshStandardMaterial({ vertexColors: true, roughness: 0.98, metalness: 0, side: THREE.DoubleSide }));
        wall.castShadow = true; wall.receiveShadow = true; wall.userData.kind = 'trench';
        ls3dContent.add(wall);
        var floor = new THREE.Mesh(ls3dMakeGeo(fPos, fCol, fIdx), new THREE.MeshStandardMaterial({ vertexColors: true, roughness: 1, metalness: 0, side: THREE.DoubleSide }));
        floor.receiveShadow = true; floor.userData.kind = 'trench';
        ls3dContent.add(floor);

        var lipMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#7CFF6A'), emissive: new THREE.Color('#39d353'), emissiveIntensity: 0.45, roughness: 0.4 });
        [-TRENCH, TRENCH].forEach(function(z) {
            var lp = [], li = [], row = [];
            for (var n = 0; n < edge.length; n++) {
                var y = ls3dY(ls3dGroundRL(edge[n])) + 0.02;
                row.push(lp.length / 3);
                lp.push(ls3dX(edge[n]), y, z - 0.08, ls3dX(edge[n]), y, z + 0.08);
            }
            for (var r = 0; r < row.length - 1; r++) {
                var a3 = row[r], b3 = row[r + 1];
                li.push(a3, a3 + 1, b3, a3 + 1, b3 + 1, b3);
            }
            if (li.length) {
                var lip = new THREE.Mesh(ls3dMakeGeo(lp, null, li), lipMat);
                lip.userData.kind = 'ground';
                ls3dContent.add(lip);
            }
        });
    }

    var pipeParts = [], flowParts = [];
    var pipeMat = new THREE.MeshPhysicalMaterial({
        color: new THREE.Color('#1760b9'),
        metalness: 0.22,
        roughness: 0.3,
        clearcoat: 0.72,
        clearcoatRoughness: 0.16,
        emissive: new THREE.Color('#0c3f86'),
        emissiveIntensity: 0.22
    });
    var flowMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#8fd0ff'), emissive: new THREE.Color('#d7f1ff'), emissiveIntensity: 0.4, roughness: 0.35 });
    var acc = 0;
    if (stations.length) {
        var capBall = new THREE.SphereGeometry(PIPE_R, 10, 8);
        var a0 = stations[0];
        capBall.translate(ls3dX(a0.ch), ls3dY(a0.inv + PIPE_R), 0);
        pipeParts.push(capBall);
    }
    for (var i = 0; i < stations.length - 1; i++) {
        var aS = stations[i], bS = stations[i + 1];
        if (ls3dIsDropSeg(aS, bS)) continue;
        var ax = ls3dX(aS.ch), ay = ls3dY(aS.inv + PIPE_R);
        var bx = ls3dX(bS.ch), by = ls3dY(bS.inv + PIPE_R);
        var MH_R = 0.72;
        if (i > 0 && ls3dIsDropSeg(stations[i - 1], aS)) {
            var inn = stations[i - 1];
            var mhOut = (inn.ch + aS.ch) / 2;
            var leave = (bS.ch >= aS.ch) ? 1 : -1;
            ax = ls3dX(mhOut) + leave * MH_R;
            ay = ls3dY(aS.inv + PIPE_R);
        }
        if (i + 1 < stations.length - 1 && ls3dIsDropSeg(bS, stations[i + 1])) {
            var outS = stations[i + 1];
            var mhIn = (bS.ch + outS.ch) / 2;
            var approach = (aS.ch <= bS.ch) ? -1 : 1;
            bx = ls3dX(mhIn) + approach * MH_R;
            by = ls3dY(bS.inv + PIPE_R);
        }
        var az = 0, bz = 0;
        var run = Math.abs(bx - ax);
        var riseRL = Math.abs(bS.inv - aS.inv);
        var dir = new THREE.Vector3(bx - ax, by - ay, bz - az);
        var len = dir.length();
        if (len < 0.02) continue;
        var cyl = new THREE.CylinderGeometry(PIPE_R, PIPE_R, len, 12, 1, false);
        ls3dOrient(cyl, dir, new THREE.Vector3(ax, ay, az));
        pipeParts.push(cyl);
        var ball = new THREE.SphereGeometry(PIPE_R, 10, 8);
        ball.translate(bx, by, bz);
        pipeParts.push(ball);
        var runGrade = Math.abs(bS.ch - aS.ch);
        var rise = Math.abs(ls3dY(bS.inv) - ls3dY(aS.inv));
        acc += len;
        if (acc >= 8 && runGrade > rise * 1.2 && runGrade > 2) {
            acc = 0;
            var down = (bS.inv < aS.inv - 0.0008) ? 1 : (aS.inv < bS.inv - 0.0008 ? -1 : 1);
            var tip = dir.clone().normalize().multiplyScalar(down);
            var cone = new THREE.ConeGeometry(PIPE_R * 1.25, PIPE_R * 3.3, 12);
            var mx = (ax + bx) / 2, my = (ay + by) / 2;
            ls3dOrient(cone, tip, new THREE.Vector3(mx, my, 0));
            flowParts.push(cone);
        }
    }
    if (pipeParts.length) {
        var pipe = new THREE.Mesh(ls3dMergeParts(pipeParts), pipeMat);
        pipe.castShadow = true; pipe.receiveShadow = true; pipe.userData.kind = 'pipe';
        ls3dContent.add(pipe);
    }
    if (flowParts.length) {
        var flow = new THREE.Mesh(ls3dMergeParts(flowParts), flowMat);
        flow.userData.kind = 'pipe';
        ls3dContent.add(flow);
    }

    ls3dAddManholes();

    var pegGeo = new THREE.CylinderGeometry(0.06, 0.06, 0.9, 7);
    pegGeo.translate(0, 0.45, 0);
    var pegMat = new THREE.MeshStandardMaterial({ color: new THREE.Color('#e07a1f'), roughness: 0.6 });
    profile.joints.forEach(function(ch) {
        [-1, 1].forEach(function(side) {
        var peg = new THREE.Mesh(pegGeo.clone(), pegMat);
            var z = side * (TRENCH - 0.15);
            peg.position.set(ls3dX(ch), ls3dY(ls3dGroundRL(ch)), z);
            peg.castShadow = true;
            peg.userData.kind = 'peg';
            ls3dContent.add(peg);
        });
    });
    pegGeo.dispose();

    if (ls3dLabelsOn) {
        var labelGroup = new THREE.Group();
        labelGroup.name = 'labels';
        profile.joints.forEach(function(ch, idx) {
            var gl = ls3dGroundRL(ch);
            var inv = ls3dInvLow(ch);
            var lines = ['CH ' + ch.toFixed(1) + ' m', 'GL ' + gl.toFixed(2) + ' m', 'INV ' + inv.toFixed(2) + ' m'];
            var spr = ls3dSprite(lines, '#8dff7a');
            var z = (idx % 2 === 0 ? 0.7 : -0.7);
            spr.position.set(ls3dX(ch), ls3dGroundWorld(ch, z) + 1.7, z);
            labelGroup.add(spr);
        });
        var extras = 0;
        profile.pipe.forEach(function(p) {
            var isJoint = profile.joints.some(function(ch) { return Math.abs(ch - p.ch) < 0.05; });
            if (isJoint || extras > 14) return;
            extras++;
            var spr2 = ls3dSprite(['INV ' + p.y.toFixed(2) + ' m', 'CH ' + p.ch.toFixed(1) + ' m'], '#8ec5ff');
            spr2.scale.set(4.4, 2.2, 1);
            spr2.position.set(ls3dX(p.ch), ls3dY(p.y) + 1.3, 2.1);
            labelGroup.add(spr2);
        });
        ls3dContent.add(labelGroup);
    }

    if (ls3dScene.fog) ls3dScene.fog = null;
    if (ls3dRenderer.shadowMap) ls3dRenderer.shadowMap.enabled = false;
    if (ls3dSun) ls3dSun.castShadow = false;
    ls3dControls.maxDistance = Math.max(28, Math.abs(ls3dX(total)) * 1.4);
    ls3dDirty = true;

    ls3dUpdateHud();
    if (frameCamera) ls3dFrameOverview();
    ls3dResize();
}

function ls3dFrameOverview() {
    if (!ls3dProfile || !ls3dCamera) return;
    var p = ls3dProfile;
    var y = ls3dY((p.minRL + p.maxRL) / 2);
    var dist = Math.max(16, Math.abs(ls3dX(p.total)) * 0.62, (p.maxRL - p.minRL) * ls3dExag * 2.4 + 8);
    ls3dControls.target.set(ls3dX(p.total * 0.45), y + 0.6, 0);
    ls3dCamera.position.set(ls3dX(p.total * 0.08), y + dist * 0.38, dist * 0.78);
    ls3dCamera.near = 0.08;
    ls3dCamera.far = Math.max(800, Math.abs(ls3dX(p.total)) * 8, (ls3dWorld ? ls3dWorld.halfW : 40) * 12);
    ls3dCamera.updateProjectionMatrix();
    ls3dControls.update();
}
function ls3dEnterTrench() {
    if (!ls3dProfile) return;
    ls3dSetMode('walk');
    walk.x = ls3dX(Math.max(1.2, Math.min(ls3dProfile.total - 1, ls3dProfile.total * 0.28)));
    walk.z = 0;
    walk.yaw = -Math.PI / 2;
    walk.pitch = -0.15;
    walk.placed = true;
    walk.y = ls3dSurfaceAt(walk.x, walk.z) + 1.72;
}
function ls3dPlaceWalkerOnBank() {
    if (!ls3dProfile) return;
    walk.x = ls3dX(Math.max(2, Math.min(ls3dProfile.total * 0.3, ls3dProfile.total - 1)));
    walk.z = 0;
    walk.yaw = -Math.PI / 2;
    walk.pitch = -0.06;
    walk.placed = true;
    walk.y = ls3dSurfaceAt(walk.x, walk.z) + 1.72;
}

function ls3dUpdateHud() {
    var help = ls3d$('ls3dHelp');
    var read = ls3d$('ls3dReadout');
    if (!help || !ls3dProfile) return;
    var p = ls3dProfile;
    var g0 = p.ground[0].y, g1 = p.ground[p.ground.length - 1].y;
    var i0 = p.pipe[0].y, i1 = p.pipe[p.pipe.length - 1].y;
    var titleEl = ls3d$('longSectionTitle');
    var title = titleEl && titleEl.value.trim() ? titleEl.value.trim() + ' · ' : '';
    if (read) read.textContent = title + 'Length ' + p.total.toFixed(1) + ' m · Ground ' + g0.toFixed(2) + ' → ' + g1.toFixed(2) + ' · Invert ' + i0.toFixed(2) + ' → ' + i1.toFixed(2);
    if (ls3dMode === 'walk') {
        help.textContent = 'Drag to look around. W forward, S back, A strafe left, D strafe right. Shift runs. Step into the trench to see the blue pipe. Esc returns to orbit.';
    } else {
        help.textContent = 'Drag to turn around the pipe. Right-drag pans, scroll zooms. WASD moves, Q down, E up. The green field is the ground line. A manhole rises to that ground level at each dropper.';
    }
    var chk = ls3d$('ls3dLabelChk');
    if (chk) chk.checked = !!ls3dLabelsOn;
    var map = { ls3dModeOrbit: ls3dMode === 'orbit', ls3dModeWalk: ls3dMode === 'walk', ls3dSurfTrench: ls3dSurface === 'trench', ls3dSurfXray: ls3dSurface === 'xray', ls3dLabelBtn: ls3dLabelsOn, ls3dFillBtn: ls3dExpanded };
    Object.keys(map).forEach(function(id) {
        var el = ls3d$(id);
        if (el) el.classList.toggle('on', !!map[id]);
    });
}

function ls3dInspect(e) {
    if (!ls3dCamera || !ls3dProfile) return;
    var THREE = window.THREE;
    var canvas = ls3d$('ls3dCanvas');
    var rect = canvas.getBoundingClientRect();
    var ndc = new THREE.Vector2(((e.clientX - rect.left) / rect.width) * 2 - 1, -((e.clientY - rect.top) / rect.height) * 2 + 1);
    var ray = new THREE.Raycaster();
    ray.setFromCamera(ndc, ls3dCamera);
    var hits = ray.intersectObjects(ls3dContent.children, true);
    var hit = null;
    for (var i = 0; i < hits.length; i++) {
        var k = hits[i].object.userData && hits[i].object.userData.kind;
        if (k === 'ground' || k === 'trench') { hit = hits[i]; break; }
    }
    var box = ls3d$('ls3dInspect');
    if (!box) return;
    if (!hit) { box.style.display = 'none'; return; }
    var ch = ls3dCh(hit.point.x);
    var gl = ls3dGroundRL(ch);
    var inv = ls3dInvLow(ch);
    box.style.display = 'block';
    box.innerHTML = '<b>Chainage ' + ch.toFixed(2) + ' m</b><br>Ground RL ' + gl.toFixed(3) + ' m<br>Invert RL ' + inv.toFixed(3) + ' m<br>Cover to invert ' + (gl - inv).toFixed(3) + ' m';
}

function ls3dStart() {
    if (ls3dLoopOn) return;
    ls3dLoopOn = true;
    ls3dLastT = performance.now();
    requestAnimationFrame(ls3dFrame);
}
function ls3dFrame(now) {
    if (!ls3dLoopOn) return;
    requestAnimationFrame(ls3dFrame);
    var dt = Math.min(0.05, (now - ls3dLastT) / 1000);
    if (!isFinite(dt) || dt < 0) dt = 0;
    ls3dLastT = now;
    if (!ls3dActive || !ls3dRenderer) return;
    ls3dWind.value += dt;
    var shift = ls3dKeys.ShiftLeft || ls3dKeys.ShiftRight;
    if (ls3dMode === 'walk' && ls3dProfile) {
        var speed = (shift ? 16 : 6.2) * dt;
        var fwx = -Math.sin(walk.yaw), fwz = -Math.cos(walk.yaw);
        var rtx = Math.cos(walk.yaw), rtz = -Math.sin(walk.yaw);
        var mx = 0, mz = 0;
        if (ls3dHeld('KeyW')) { mx += fwx; mz += fwz; }
        if (ls3dHeld('KeyS')) { mx -= fwx; mz -= fwz; }
        if (ls3dHeld('KeyD')) { mx += rtx; mz += rtz; }
        if (ls3dHeld('KeyA')) { mx -= rtx; mz -= rtz; }
        var mag = Math.sqrt(mx * mx + mz * mz);
        if (mag > 0) { mx = mx / mag * speed; mz = mz / mag * speed; }
        walk.x += mx;
        walk.z += mz;
        walk.lastSpeed = dt > 0 ? Math.sqrt(mx * mx + mz * mz) / dt : 0;
        var pad = ls3dWorld ? ls3dWorld.pad : 40;
        var halfW = ls3dWorld ? ls3dWorld.halfW : 80;
        var total = ls3dProfile.total;
        var x0 = ls3dX(-pad);
        var x1 = ls3dX(total + pad);
        if (walk.x < x0 + 1) walk.x = x0 + 1;
        if (walk.x > x1 - 1) walk.x = x1 - 1;
        if (walk.z < -halfW + 1) walk.z = -halfW + 1;
        if (walk.z > halfW - 1) walk.z = halfW - 1;
        var gy = ls3dSurfaceAt(walk.x, walk.z) + 1.72;
        walk.y += (gy - walk.y) * Math.min(1, dt * 10);
        var cp = Math.cos(walk.pitch);
        var lx = walk.x + (-Math.sin(walk.yaw) * cp);
        var ly = walk.y + Math.sin(walk.pitch);
        var lz = walk.z + (-Math.cos(walk.yaw) * cp);
        ls3dCamera.position.set(walk.x, walk.y, walk.z);
        ls3dCamera.up.set(0, 1, 0);
        ls3dCamera.lookAt(lx, ly, lz);
    } else {
        walk.lastSpeed = 0;
        var sp = (shift ? 26 : 11) * dt;
        ls3dCamera.getWorldDirection(tmpFwd);
        tmpFwd.y = 0;
        if (tmpFwd.lengthSq() < 1e-6) tmpFwd.set(0, 0, -1);
        tmpFwd.normalize();
        tmpRight.crossVectors(tmpFwd, ls3dCamera.up.set(0, 1, 0)).normalize();
        tmpMove.set(0, 0, 0);
        if (ls3dHeld('KeyW')) tmpMove.add(tmpFwd);
        if (ls3dHeld('KeyS')) tmpMove.sub(tmpFwd);
        if (ls3dHeld('KeyD')) tmpMove.add(tmpRight);
        if (ls3dHeld('KeyA')) tmpMove.sub(tmpRight);
        if (tmpMove.lengthSq() > 0) {
            tmpMove.normalize().multiplyScalar(sp);
            ls3dCamera.position.add(tmpMove);
            ls3dControls.target.add(tmpMove);
        }
        if (ls3dHeld('KeyE')) { ls3dCamera.position.y += sp; ls3dControls.target.y += sp; }
        if (ls3dHeld('KeyQ')) { ls3dCamera.position.y -= sp; ls3dControls.target.y -= sp; }
    }
    if (ls3dSky) ls3dSky.position.copy(ls3dCamera.position);
    var orbitMoved = false;
    if (ls3dMode !== 'walk' && ls3dControls) orbitMoved = !!ls3dControls.update();
    var moving = !!(ls3dDrag || ls3dHeld('KeyW') || ls3dHeld('KeyA') || ls3dHeld('KeyS') || ls3dHeld('KeyD') || ls3dHeld('KeyQ') || ls3dHeld('KeyE'));
    if (!ls3dDirty && !orbitMoved && !moving && ls3dMode !== 'walk') return;
    if (ls3dMode === 'walk' && !ls3dDirty && !moving) return;
    ls3dDirty = false;
    ls3dRenderer.render(ls3dScene, ls3dCamera);
}

function ls3dSetMode(mode) {
    ls3dMode = mode === 'walk' ? 'walk' : 'orbit';
    if (ls3dControls) ls3dControls.enabled = ls3dMode === 'orbit';
    var canvas = ls3d$('ls3dCanvas');
    if (canvas) canvas.style.cursor = ls3dMode === 'walk' ? 'crosshair' : 'grab';
    if (ls3dMode === 'walk' && !walk.placed) ls3dPlaceWalkerOnBank();
    ls3dUpdateHud();
}
function ls3dSetSurface(mode) {
    ls3dSurface = mode === 'xray' ? 'xray' : 'trench';
    ls3dHash = '';
    ls3dRebuild(false);
}
function ls3dToggleLabels() { ls3dSetLabels(!ls3dLabelsOn); }
function ls3dSetExag(v) {
    var n = parseFloat(v);
    if (!isFinite(n)) n = 1;
    ls3dExag = Math.max(1, Math.min(8, n));
    var lab = ls3d$('ls3dExagVal');
    if (lab) lab.textContent = (ls3dExag % 1 === 0 ? ls3dExag.toFixed(0) : ls3dExag.toFixed(1)) + '×';
    ls3dHash = '';
    clearTimeout(ls3dSetExag._t);
    ls3dSetExag._t = setTimeout(function() { if (ls3dRenderer) ls3dRebuild(false); }, 40);
}
function ls3dSetHScale(v) {
    var n = parseFloat(v);
    if (!isFinite(n)) n = 1;
    ls3dHScale = Math.max(0.5, Math.min(4, n));
    var lab = ls3d$('ls3dHScaleVal');
    if (lab) lab.textContent = (Math.round(ls3dHScale * 10) / 10).toFixed(1).replace(/\.0$/, '') + '×';
    ls3dHash = '';
    clearTimeout(ls3dSetHScale._t);
    ls3dSetHScale._t = setTimeout(function() { if (ls3dRenderer) ls3dRebuild(false); }, 40);
}
function ls3dSetLabels(on) {
    ls3dLabelsOn = !!on;
    var chk = ls3d$('ls3dLabelChk');
    if (chk) chk.checked = ls3dLabelsOn;
    ls3dHash = '';
    if (ls3dRenderer) ls3dRebuild(false);
    else ls3dUpdateHud();
}
function ls3dSetView(which) {
    if (which === 'trench') ls3dEnterTrench();
    else { ls3dSetMode('orbit'); ls3dFrameOverview(); }
}
function ls3dSetExpanded(on) {
    ls3dExpanded = !!on;
    window.ls3dExpanded = ls3dExpanded;
    applyLs3dLayout();
    ls3dUpdateHud();
    requestAnimationFrame(ls3dResize);
}

function applyLs3dLayout() {
    var work = ls3d$('work');
    var c = ls3d$('longSectionCanvas');
    var stage = ls3d$('ls3dStage');
    var logs = ls3d$('longSectionLogsContainer');
    if (!work || !c || !stage) return;
    stage.style.display = 'block';
    if (ls3dExpanded) {
        var narrow = window.innerWidth < 860;
        if (logs) logs.style.display = 'none';
        stage.style.position = 'fixed';
        stage.style.left = narrow ? '0' : '271px';
        stage.style.right = '0';
        stage.style.top = narrow ? '0' : '158px';
        stage.style.bottom = '30px';
        stage.style.zIndex = '40';
        stage.style.width = 'auto';
        stage.style.height = 'auto';
        stage.style.minHeight = '0';
        c.style.display = 'none';
    } else {
        stage.style.position = 'relative';
        stage.style.left = 'auto';
        stage.style.right = 'auto';
        stage.style.top = 'auto';
        stage.style.bottom = 'auto';
        stage.style.zIndex = '1';
        var sideLog = work.clientWidth >= 760;
        work.style.display = 'grid';
        work.style.gridTemplateColumns = sideLog ? 'minmax(0, 1fr) 280px' : 'minmax(0, 1fr)';
        work.style.gridTemplateRows = sideLog ? 'auto minmax(220px, 1fr)' : 'auto minmax(200px, 1fr) 168px';
        work.style.flexDirection = '';
        work.style.flexWrap = '';
        work.style.alignItems = 'stretch';
        work.style.overflow = 'hidden';
        work.style.gap = '10px';
        c.style.display = 'block';
        c.style.gridColumn = '1';
        c.style.gridRow = '1';
        c.style.flex = 'none';
        var colW = Math.max(240, (sideLog ? work.clientWidth - 300 : work.clientWidth - 8));
        var maxH = Math.max(160, Math.round(window.innerHeight * 0.36));
        var aspect = (c.width || 1600) / (c.height || 800);
        var cssW = colW;
        var cssH = cssW / aspect;
        if (cssH > maxH) { cssH = maxH; cssW = cssH * aspect; }
        c.style.width = Math.round(cssW) + 'px';
        c.style.height = Math.round(cssH) + 'px';
        c.style.maxWidth = '100%';
        c.style.maxHeight = 'none';
        c.style.objectFit = 'fill';
        c.style.alignSelf = 'start';
        stage.style.gridColumn = '1';
        stage.style.gridRow = '2';
        stage.style.width = '100%';
        stage.style.height = '100%';
        stage.style.minHeight = '0';
        stage.style.flex = 'none';
        if (logs) {
            logs.style.display = 'block';
            logs.style.gridColumn = sideLog ? '2' : '1';
            logs.style.gridRow = sideLog ? '1 / span 2' : '3';
            logs.style.width = 'auto';
            logs.style.maxWidth = 'none';
            logs.style.height = '100%';
            logs.style.maxHeight = '100%';
            logs.style.minHeight = '0';
            logs.style.alignSelf = 'stretch';
            logs.style.boxSizing = 'border-box';
            logs.style.overflowY = 'auto';
        }
    }
    var fill = ls3d$('ls3dFillBtn');
    if (fill) fill.textContent = ls3dExpanded ? 'Show graph' : 'Fill view';
    requestAnimationFrame(ls3dResize);
}
window.applyLs3dLayout = applyLs3dLayout;

function openLongSection3D() {
    if (typeof getCompleteSlopeItems === 'function' && !getCompleteSlopeItems().length) {
        status(typeof getSlopeItems === 'function' && getSlopeItems().length
            ? 'Enter both LL (lid level) values on a pipe slope before opening the 3D view.'
            : 'Draw a pipe slope before opening the 3D view.');
        return;
    }
    ls3dActive = true;
    window.ls3dActive = true;
    if (!longSectionVisible && typeof switchTab === 'function') switchTab('longsection');
    applyLs3dLayout();
    status('Graph is ready. The 3D view is loading beside it.');
    setTimeout(function() {
        if (!ls3dActive) return;
        ls3dEnsure(function() {
            setTimeout(function() {
                if (!ls3dActive) return;
                ls3dInitEngine();
                ls3dHash = '';
                ls3dRebuild(true);
                ls3dSetMode('orbit');
                ls3dStart();
                status('3D field is live. Drag points on the graph — the ground and pipe follow.');
            }, 30);
        });
    }, 30);
}
function closeLongSection3D() {
    ls3dActive = false;
    window.ls3dActive = false;
    ls3dExpanded = false;
    ls3dKeys = {};
    var work = ls3d$('work');
    var c = ls3d$('longSectionCanvas');
    var stage = ls3d$('ls3dStage');
    if (work) {
        work.style.display = 'flex';
        work.style.gridTemplateColumns = '';
        work.style.gridTemplateRows = '';
        work.style.flexDirection = '';
        work.style.flexWrap = '';
        work.style.overflow = '';
        work.style.alignItems = '';
        work.style.gap = '20px';
    }
    if (stage) {
        stage.style.display = 'none';
        stage.style.position = '';
        stage.style.left = '';
        stage.style.right = '';
        stage.style.top = '';
        stage.style.bottom = '';
        stage.style.height = '';
        stage.style.zIndex = '';
        stage.style.gridColumn = '';
        stage.style.gridRow = '';
    }
    if (c && longSectionVisible) {
        c.setAttribute('style', 'display:block;flex:1;max-width:calc(100% - 320px);height:auto;background:#fff;border:1px solid #777;image-rendering:auto');
    }
    var logs = ls3d$('longSectionLogsContainer');
    if (logs && longSectionVisible) {
        logs.style.display = 'block';
        logs.style.gridColumn = '';
        logs.style.gridRow = '';
        logs.style.width = '300px';
        logs.style.maxWidth = '';
        logs.style.height = '';
        logs.style.maxHeight = '650px';
        logs.style.minHeight = '';
    }
    if (typeof renderLongSection === 'function' && longSectionVisible) renderLongSection();
    status('Back to the long section graph.');
}
window.openLongSection3D = openLongSection3D;
window.closeLongSection3D = closeLongSection3D;
window.ls3dSetMode = ls3dSetMode;
window.ls3dSetSurface = ls3dSetSurface;
window.ls3dToggleLabels = ls3dToggleLabels;
window.ls3dSetLabels = ls3dSetLabels;
window.ls3dSetExag = ls3dSetExag;
window.ls3dSetHScale = ls3dSetHScale;
window.ls3dSetView = ls3dSetView;
window.ls3dSetExpanded = ls3dSetExpanded;

window.onload = init;
</script>
</body>
</html>
