<?php
require __DIR__ . '/mail.php';
jpm_maybe_send();
$chrome = 'minimal';
$desktop_only = true;
$page_title = 'Job Pack Maker app | Soffit Web';
$page_description = 'Build a job email draft from planned work, reactive work, or a booking, then download it as an unsent message.';
$page_path = '/projects/job-pack-maker/app.php';
$extra_head = '<link rel="stylesheet" href="/projects/job-pack-maker/site.css">' . "\n"
    . '<style>:root{--chrome-fg:#0078d4;--chrome-bg:#f4f6f8}</style>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="jpm-app">
<?php require __DIR__ . '/../../includes/nav.php'; ?>

<script>window.name = 'jobpackmaker_win';</script>
<style>
body {
    font-family: "Segoe UI", Aptos, Arial, sans-serif;
    font-size: 10pt;
    margin: 0;
    padding: 20px;
    background: #f4f6f8;
    color: #222;
}

/* SPLIT SCREEN LAYOUT */
.app-container {
    display: flex;
    gap: 20px;
    max-width: 1750px;
    margin: 0 auto;
    align-items: flex-start;
}
.app-left {
    flex: 1;
    min-width: 0;
}
.app-right {
    flex: 1;
    position: sticky;
    top: 20px;
    background: white;
    border: 1px solid #d0d7de;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 4px 16px rgba(0,0,0,.08);
    max-height: calc(100vh - 40px);
    overflow-y: auto;
}

.preview-pane-header {
    font-size: 14pt;
    font-weight: bold;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #0078d4;
    color: #0078d4;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.email-meta-box {
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 15px;
    font-size: 9.5pt;
}
.email-body-preview {
    font-family: Aptos, "Segoe UI", Arial, sans-serif;
    font-size: 11pt;
    line-height: 1.5;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 15px;
    min-height: 300px;
}

#preview {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 15px;
}

.thumb {
    position: relative;
    display: inline-block;
    background: white;
    padding: 6px;
    border-radius: 10px;
    border: 1px solid #d0d7de;
    box-shadow: 0 2px 6px rgba(0,0,0,.08);
}

.thumb img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 6px;
}
.removeBtn {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #0078d4;
    color: white;
    border: none;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    font-size: 11pt;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,.2);
}
  
textarea {
    font-family: "Segoe UI", Arial, sans-serif;
    width: 100%;
    height: 75px;
    font-size: 10pt;
    margin-bottom: 8px;
    box-sizing: border-box;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 8px;
    resize: vertical;
}
input[type=text] {
    width: 100%;
    font-size: 10pt;
    box-sizing: border-box;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 8px 10px;
    background: white;
}

#email_subject,
#email_subject_reactive_mirror,
#email_subject_bookings_mirror {
    height: 37px;
}

.field { margin-bottom: 12px; }
.areaTitle { font-size: 13pt; font-weight: bold; margin-top: 10px; margin-bottom: 8px; }

.topButton:hover {
    background: #f8fafc;
    border-color: #0078d4;
    cursor: pointer;
    transform: translateY(-1px);
}

.bpOption {
    display: block;
    cursor: pointer;
    background-color: white;
    color: black;
    text-align: center;
    width: 200px; 
    padding: 10px;
}
.bpOption:hover {
    background-color: #0078d4;
    color: #FFFFFF;
}

.topButton {
    display: inline-block;
    margin-right: 5px;
    padding: 10px;
    font-size: 16px;
    width: 120px;
    text-align: center;
    background: white;
    border: 1px solid #d0d7de;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,.08);
    transition: all .15s ease;
}
hr {
    border: 0;
    height: 1px;
    background: #d8dee4;
    margin: 12px 0;
}

/* WEATHER STYLES */
.weather-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin: 0 auto 15px auto;
    border: 1px solid #d0d7de;
    width: 100%;
    box-sizing: border-box;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.weather-title { 
    font-size: 10pt; 
    font-weight: bold; 
    margin-bottom: 5px; 
    color: #000000; 
    display: block; 
}
.btn-refresh-weather {
    display: inline-block;
    margin-bottom: 12px;
    padding: 8px 14px;
    font-size: 9.5pt;
    font-weight: 600;
    background: #0078d4;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,.15);
}
.btn-refresh-weather:hover { background: #106ebe; }
.weather-container { width: 100%; text-align: center; font-size: 9.5pt; }
.day-box {
    display: inline-block;
    vertical-align: top;
    width: 13.5%;
    margin: 0 .3%;
    background: white;
    border: 1px solid #d0d7de;
    border-radius: 8px;
    padding: 6px 0;
    text-align: center;
    box-sizing: border-box;
    min-height: 110px;
    font-size: 9pt;
}
.day-box.today {
    background: #e8f3ff;
    border: 2px solid #0078d4;
}
.day-name { display: block; font-weight: bold; color: black; font-size: 7.5pt; text-transform: uppercase; }
.date-label { font-size: 6.5pt; color: #555; }
.icon { font-size: 1.5em; margin: 4px 0; height: 35px; line-height: 35px; }
.temp-stack { border-top: 1px solid #ccc; margin-top: 4px; padding-top: 4px; }
.t-max { color: #d83b01; font-weight: bold; font-size: 8.5pt; display: block; }
.t-min { color: #005a9e; font-size: 8pt; display: block; }

/* TAB SYSTEM STYLES */
.tab-container {
    display: flex;
    border-bottom: 2px solid #999;
    margin-bottom: 15px; 
}
.tab-button {
    padding: 10px 18px;
    font-size: 11pt;
    font-weight: 600;
    cursor: pointer;
    background: white;
    border: 1px solid #d0d7de;
    margin-right: 5px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    transition: all .15s ease;
}
.tab-button.active {
    background: #0078d4;
    color: white;
    border-color: #0078d4;
}
.section-content {
    display: none;
    background: white;
    padding: 18px;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
.section-content.active { display: block; }

.booking-grid { width: 100%; margin-bottom: 10px; }
.booking-grid .topButton {
    width: 32%;
    margin-right: 1%;
    margin-bottom: 10px;
    padding: 8px 0; 
    font-size: 16px;
    box-sizing: border-box;
}
.booking-grid .topButton:nth-child(3n) { margin-right: 0; }
.booking-grid .topButton.pressed {
    background: #0078d4;
    color: white;
    border-color: #0078d4;
    box-shadow: inset 0 2px 4px rgba(0,0,0,.2);
    font-weight: bold;
}
#sl_Note { height: 160px; }

.photo-section {
    background: white;
    padding: 15px;
    border: 1px solid #d0d7de;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
    margin-top: 15px;
}
#fileInput { display: none; }
.createEmailBtn {
    width: 100%;
    padding: 16px;
    background: #0078d4;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 13pt;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    transition: all .15s ease;
    margin-top: 0px;
}
.createEmailBtn:hover { background: #106ebe; transform: translateY(-2px); }
.createEmailBtn:disabled { background: #94a3b8; cursor: not-allowed; transform: none; }
.quick-links {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 10px;
}
.selectPhotoButton { width: 160px; }
.photoDropZone {
    margin-top: 10px;
    padding: 15px;
    border: 2px dashed #0078d4;
    border-radius: 10px;
    background: #f8fbff;
    text-align: center;
    cursor: pointer;
}
.topButton.clicked {
    background: #0078d4 !important;
    color: white !important;
    border-color: #0078d4 !important;
}
</style>

<script>
var tabPhotos = {
    job_creator_tab: [],
    reactive_tab: [],
    bookings_tab: []
};
var currentTab = 'job_creator_tab';
var selectedBookingType = '';
var lastSelectedBookingButton = null;
var lastSelectedBookingJobType = null;
var EMAIL_INDENT = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

function safeGetLocalStorage(key) {
    try {
        return localStorage.getItem(key);
    } catch (e) {
        return null;
    }
}

function safeSetLocalStorage(key, value) {
    try {
        localStorage.setItem(key, value);
    } catch (e) {
        // Ignore if storage is blocked
    }
}

function safeRemoveLocalStorage(key) {
    try {
        localStorage.removeItem(key);
    } catch (e) {
        // Ignore if storage is blocked
    }
}

function getCurrentPhotos() {
    return tabPhotos[currentTab];
}

function refreshPreview() {
    var preview = document.getElementById('preview');
    if (!preview) return;
    preview.innerHTML = "";
    var photos = getCurrentPhotos();
    for (var i = 0; i < photos.length; i++) {
        addPreview(photos[i]);
    }
    updateLivePreview();
}

function flashButton(btn) {
    btn.className += " clicked";
    setTimeout(function() {
        btn.className = btn.className.replace(" clicked", "");
    }, 200);
}
    
var lastPhotoDataURL = '';
var lastPhotoTimestamp = 0;

window.addEventListener('message', function(event) {
    if (event.origin !== window.location.origin) return;

    if (event.data && event.data.type === 'ADD_JOB_PACK_PHOTO') {
        var entry = { 
            name: event.data.name || 'Annotated_Photo.jpg', 
            dataURL: event.data.dataURL 
        };
        
        if (!tabPhotos[currentTab]) {
            tabPhotos[currentTab] = [];
        }
        
        // Appends the photo safely without clearing any text input fields
        tabPhotos[currentTab].push(entry);
        refreshPreview();
    }
});

function onLoad() {
    var fi = document.getElementById('fileInput'); 
    if (fi) {
        fi.onchange = function(){
            if(this.files && this.files.length>0){
                handleFileList(this.files); 
            }
            this.value = "";
        }; 
    }

    togglePOOptions();
    toggleReactivePOOptions();
    
    // Determine initial tab first
    var savedTab = safeGetLocalStorage('JobPackLastTab');
    var initialTab = (savedTab && tabPhotos[savedTab]) ? savedTab : 'job_creator_tab';

    // === CHECK FOR PHOTO SENT FROM PAINT APP FIRST ===
    try {
        var raw = localStorage.getItem('pending_job_pack_photo');
        if (raw) {
            var photoData = JSON.parse(raw);
            if (photoData && photoData.timestamp && (Date.now() - photoData.timestamp < 60000)) {
                var entry = {
                    name: photoData.name || 'Annotated_Photo.jpg',
                    dataURL: photoData.dataURL
                };
                
                // If a photo comes in, we can also force it into the saved tab or current active tab
                var target = tabPhotos[initialTab] ? initialTab : 'job_creator_tab';
                tabPhotos[target].push(entry);
                
                // Clear storage so it doesn't duplicate
                localStorage.removeItem('pending_job_pack_photo');
            }
        }
    } catch (e) {
        console.error('Error loading transferred photo:', e);
    }

    // Now switch to the correct tab and render everything
    switchTab(initialTab);

    document.getElementById('app-form').addEventListener('input', updateLivePreview);
    document.getElementById('app-form').addEventListener('change', updateLivePreview);

    setTimeout(getWeather, 100);
    updateLivePreview();
    
    // Handshake: Request the photo from the Paint app opener upon loading
if (window.opener) {
    try {
        window.opener.postMessage({ type: 'REQUEST_ANNOTATED_PHOTO' }, window.location.origin);
    } catch (e) {
        console.error('Could not request photo from opener:', e);
    }
}
    
}

function switchTab(tabId) {
    currentTab = tabId;
    safeSetLocalStorage('JobPackLastTab', tabId);
    refreshPreview();

    var tabs = ['job_creator_tab', 'reactive_tab', 'bookings_tab'];
    for(var i=0; i<tabs.length; i++) {
        var btn = document.getElementById(tabs[i] + '_btn'); 
        var content = document.getElementById(tabs[i] + '_content');
        if(tabs[i] === tabId) {
            btn.className = "tab-button active"; 
            content.className = "section-content active";
        } else {
            btn.className = "tab-button"; 
            content.className = "section-content";
        }
    }
    updateLivePreview();
}

function handleBookingTypeChange(type, elem) {
    var buttons = elem.parentNode.getElementsByTagName('input');
    var the = document.querySelector(".BookingSubjectTest");

    if (lastSelectedBookingButton === elem) {
        the.value = "";
        the.placeholder = "Enter email subject";
        safeRemoveLocalStorage('BookingSubject_' + type);
        lastSelectedBookingButton = null;
        selectedBookingType = '';

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].className = "topButton";
        }

        ['cctv_fields', 'flushing_fields', 'hydro_fields', 'sucker_fields', 'tc_fields', 'service_locate_fields'].forEach(function(id) {
            document.getElementById(id).style.display = 'none';
        });

        document.getElementById('bookingPoSection').style.display = 'none';
        updateLivePreview();
        return;
    }

    lastSelectedBookingButton = elem;
    selectedBookingType = type;

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].className = "topButton";
    }
    elem.className = "topButton pressed";

    var subContainers = ['cctv_fields', 'flushing_fields', 'hydro_fields', 'sucker_fields', 'tc_fields', 'service_locate_fields'];
    for(var j=0; j<subContainers.length; j++) {
        var div = document.getElementById(subContainers[j]);
        if(div) {
            div.style.display = (subContainers[j] === type + '_fields') ? 'block' : 'none';
        }
    }

    var bookingPoSection = document.getElementById('bookingPoSection');
    if(bookingPoSection) {
        if(type === 'service_locate') {
            bookingPoSection.style.display = 'block';
        } else {
            bookingPoSection.style.display = 'none';
            var jobTypeRadios = document.getElementsByName('booking_job_type');
            for(var r=0; r<jobTypeRadios.length; r++) { jobTypeRadios[r].checked = false; }
            lastSelectedBookingJobType = null;
        }
    }

    // Restore saved subject from localStorage for this type, or initialize default template prefix if empty
    var savedSubj = safeGetLocalStorage('BookingSubject_' + type);
    if (savedSubj !== null) {
        the.value = savedSubj;
    } else {
        if(type === 'service_locate') {
            var slNote = document.getElementById('sl_Note');
            if(slNote && slNote.value.trim() === '') {
                slNote.value = "Hi team,\n\nCan we please have services checked at the following marked location:\n";
            }
            the.value = "Service Locate Booking | ";
        } else if (type === 'tc'){
            the.value = "TC Booking | ";
        } else if (type === 'sucker'){
            the.value = "Sucker Truck Booking | ";
        } else if (type === 'hydro'){
            the.value = "Hydro Booking | ";
        } else if (type === 'flushing'){
            the.value = "Flusher Truck Booking | ";
        } else if (type === 'cctv'){
            the.value = "CCTV Booking | ";
        }
        safeSetLocalStorage('BookingSubject_' + type, the.value);
    }
    updateLivePreview();
}

function toggleBookingPOOptions(elem) {
    if (lastSelectedBookingJobType === elem) {
        elem.checked = false;
        lastSelectedBookingJobType = null;
    } else {
        lastSelectedBookingJobType = elem;
    }

    var jobType = '';
    var jobTypeRadios = document.getElementsByName('booking_job_type');
    for(var r = 0; r < jobTypeRadios.length; r++) {
        if(jobTypeRadios[r].checked){
            jobType = jobTypeRadios[r].value;
            break;
        }
    }

    var subPoDiv = document.getElementById('bookingSubPoSection');
    if(!subPoDiv) return;
    subPoDiv.style.display = jobType ? 'block' : 'none';

    var divs = subPoDiv.getElementsByTagName('div');
    for(var i = 0; i < divs.length; i++) {
        if(divs[i].className && divs[i].className.indexOf('bpo') !== -1){
            if(jobType && divs[i].className.indexOf(jobType) !== -1){
                divs[i].style.display = '';
            } else {
                divs[i].style.display = 'none';
                var inputs = divs[i].getElementsByTagName('input');
                for(var j = 0; j < inputs.length; j++){ inputs[j].checked = false; }
            }
        }
    }
    updateLivePreview();
}

var lastSelectedReactiveJobType = null; 
function toggleReactivePOOptions(elem) {
    if (lastSelectedReactiveJobType === elem) {
        elem.checked = false; 
        lastSelectedReactiveJobType = null;
    } else {
        lastSelectedReactiveJobType = elem; 
    }

    var jobType = '';
    var jobTypeRadios = document.getElementsByName('r_job_type'); 
    for(var r=0; r<jobTypeRadios.length; r++){
        if(jobTypeRadios[r].checked){ jobType = jobTypeRadios[r].value; break; }
    }

    var poSection = document.getElementById('r_poSection');
    if(!poSection) return;
    poSection.style.display = jobType ? 'block' : 'none';

    var divs = poSection.getElementsByTagName('div');
    for(var i=0; i<divs.length; i++){
        if(divs[i].className && divs[i].className.indexOf('rpo') !== -1){
            if(jobType && divs[i].className.indexOf(jobType) !== -1){
                divs[i].style.display = ''; 
            } else {
                divs[i].style.display = 'none'; 
                var inputs = divs[i].getElementsByTagName('input');
                for(var j=0; j<inputs.length; j++){ inputs[j].checked = false; }
            }
        }
    }
    updateLivePreview();
}
    
function processPendingPhoto() {
    var stored = localStorage.getItem('job_pack_transfer');
    if (stored) {
        try {
            var photoData = JSON.parse(stored);
            if (photoData && photoData.dataURL) {
                var entry = {
                    name: photoData.name || 'Annotated_Photo.jpg',
                    dataURL: photoData.dataURL
                };
                
                if (!tabPhotos[currentTab]) {
                    tabPhotos[currentTab] = [];
                }
                
                tabPhotos[currentTab].push(entry);
                refreshPreview();
                localStorage.removeItem('job_pack_transfer');
            }
        } catch (err) {
            console.error('Error loading pending photo:', err);
        }
    }
}

// Check on initial page load (handles newly opened tabs)
window.addEventListener('DOMContentLoaded', processPendingPhoto);

// Listen for live updates when the tab is already open
window.addEventListener('storage', function(e) {
    if (e.key === 'job_pack_transfer' && e.newValue) {
        processPendingPhoto();
    }
});

function getWeather() {
    var out = document.getElementById('weatherRes');
    var outReactive = document.getElementById('weatherResReactive');
    if(!out && !outReactive) return;

    if(out) out.innerHTML = "Loading weather...";
    if(outReactive) outReactive.innerHTML = "Loading weather...";

    var dNow = new Date(); 
    var todayStr = dNow.getFullYear() + "-" + 
                   ((dNow.getMonth()+1) < 10 ? '0' : '') + (dNow.getMonth()+1) + "-" + 
                   (dNow.getDate() < 10 ? '0' : '') + dNow.getDate(); 
    var url = "https://api.open-meteo.com/v1/forecast?latitude=-36.8485&longitude=174.7633&daily=temperature_2m_max,temperature_2m_min,weathercode,precipitation_probability_max&timezone=Pacific/Auckland";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.daily) {
                var html = ""; 
                var d = data.daily;
                var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];

                for (var i = 0; i < 7; i++) {
                    var t = d.time[i].split("-"); 
                    var dateObj = new Date(t[0], t[1]-1, t[2]);
                    var isToday = (d.time[i] === todayStr);
                    var weather = interpretWeatherCode(d.weathercode[i]); 
                    var rainChance = d.precipitation_probability_max[i];

                    html += "<div class='day-box " + (isToday ? "today" : "") + "'>" +
                            "<span class='day-name'>" + days[dateObj.getDay()] + "</span>" +
                            "<div class='date-label'>" + t[2] + "/" + t[1] + "</div>" +
                            "<div class='icon'>" + weather.icon + "</div>" +
                            "<div style='font-size:7.5pt;font-weight:bold;height:24px;'>" + weather.label + "</div>" +
                            "<div style='font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;'>" + rainChance + "%<br>Rain</div>" +
                            "<div class='temp-stack'>" +
                                "<span class='t-max'>" + Math.round(d.temperature_2m_max[i]) + "°</span>" +
                                "<span class='t-min'>" + Math.round(d.temperature_2m_min[i]) + "°</span>" +
                            "</div>" +
                        "</div>"; 
                }

                if(out) out.innerHTML = html;
                if(outReactive) outReactive.innerHTML = html; 
            } else {
                if(out) out.innerHTML = "Weather unavailable";
                if(outReactive) out.innerHTML = "Weather unavailable";
            }
        })
        .catch(err => {
            if(out) out.innerHTML = "Weather Error";
            if(outReactive) out.innerHTML = "Weather Error";
        });
}

function interpretWeatherCode(code) {
    var c = parseInt(code); 
    if (c === 0) return { icon: "☀", label: "Sunny" };
    if (c <= 3) return { icon: "⛅", label: "Partly Cloudy" };
    if (c >= 45 && c <= 48) return { icon: "☁", label: "Foggy" };
    if (c >= 51 && c <= 67) return { icon: "🌧", label: "Rain" };
    if (c >= 80 && c <= 82) return { icon: "🌧", label: "Showers" };
    if (c >= 95) return { icon: "🌩", label: "Stormy" };
    return { icon: "☁", label: "Cloudy" }; 
}

function downloadRescuePlan() {
    window.open("/projects/job-pack-maker/templates/Rescue_Plan_Template.docx", "_blank");
}

function toggleEGDPMenu() {
    var menu = document.getElementById('egdpMenu'); 
    var other = document.getElementById('bpMenu');
    if (other) other.style.display = 'none';
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block'; 
}

function toggleReactiveBPMenu() {
    var menu = document.getElementById('reactiveBpMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

function downloadEGDP(type) {
    var url = (type === 'Normal') 
        ? "/projects/job-pack-maker/templates/EGDP_Template_Normal.docx"
        : "/projects/job-pack-maker/templates/EGDP_Template_Complex.docx";
    window.open(url, "_blank");
    document.getElementById('egdpMenu').style.display = 'none'; 
}

function handleFileList(files){
    if(!files) return; 
    for(var i=0; i<files.length; i++){
        (function(file){
            var entry = { name: file.name || "unknown", dataURL: null };
            try {
                resizeImage(file, 1200, 1200, function(compressedData){
                    entry.dataURL = compressedData;
                    getCurrentPhotos().push(entry);
                    refreshPreview();
                });
             } catch(err){
                alert("Cannot preview file: " + entry.name); 
            }
        })(files[i]); 
    }
}

function resizeImage(file, maxWidth, maxHeight, callback) {
    var reader = new FileReader(); 
    reader.onload = function(e) {
        var img = new Image(); 
        img.onload = function() {
            var canvas = document.createElement("canvas"); 
            var ctx = canvas.getContext("2d");
            var width = img.width;
            var height = img.height; 
            if (width > height) {
                if (width > maxWidth) {
                    height *= maxWidth / width; 
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width *= maxHeight / height; 
                    height = maxHeight;
                }
            }
            canvas.width = width; 
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);
            var compressed = canvas.toDataURL("image/jpeg", 0.7);
            callback(compressed);
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file); 
}

function addPreview(entry){
    var preview = document.getElementById('preview');
    if (!preview) return;

    var div = document.createElement('div');
    div.className = 'thumb';

    var img = document.createElement('img');
    img.src = entry.dataURL || "";
    img.alt = entry.name;

    var btn = document.createElement('button');
    btn.className = 'removeBtn';
    btn.innerHTML = '×'; 
    btn.onclick = function(e){
        e.stopPropagation();
        var photos = getCurrentPhotos();
        for(var i=0; i<photos.length; i++){
            if(photos[i].name === entry.name && photos[i].dataURL === entry.dataURL){
                photos.splice(i, 1);
                break;
            }
        }
        refreshPreview();
    };

    div.appendChild(img);
    div.appendChild(btn);
    preview.appendChild(div);
}

var lastSelectedJobType = null; 
function togglePOOptions(elem) {
    if (lastSelectedJobType === elem) {
        elem.checked = false; 
        lastSelectedJobType = null;
    } else {
        lastSelectedJobType = elem; 
    }

    var jobType = '';
    var jobTypeRadios = document.getElementsByName('job_type'); 
    for(var r=0; r<jobTypeRadios.length; r++){
        if(jobTypeRadios[r].checked){ jobType = jobTypeRadios[r].value; break; }
    }

    var poSection = document.getElementById('poSection');
    if(!poSection) return;
    poSection.style.display = jobType ? 'block' : 'none';

    var divs = document.getElementsByTagName('div');
    for(var i=0; i<divs.length; i++){
        if(divs[i].className && divs[i].className.indexOf('po') !== -1){
            if(jobType && divs[i].className.indexOf(jobType) !== -1){
                divs[i].style.display = ''; 
            } else {
                divs[i].style.display = 'none'; 
                var inputs = divs[i].getElementsByTagName('input');
                for(var j=0; j<inputs.length; j++){ inputs[j].checked = false; }
            }
        }
    }
    updateLivePreview();
}

function escapeHtml(text) {
    return text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}
function trim(str) { return str.replace(/^\s+|\s+$/g,''); }

function clearCurrentTab() {
    if (!confirm("Clear all fields and photos from this tab?")) return;

    var tabContent = document.getElementById(currentTab + "_content");
    if (!tabContent) return;

    var elements = tabContent.getElementsByTagName("*");
    for (var i = 0; i < elements.length; i++) {
        var el = elements[i];
        if (el.tagName === "TEXTAREA") el.value = "";
        if (el.tagName === "INPUT") {
            if (el.type === "text") el.value = "";
            if (el.type === "radio" || el.type === "checkbox") el.checked = false;
        }
    }

    tabPhotos[currentTab] = [];
    refreshPreview();

    if (currentTab === "job_creator_tab") {
        document.getElementById("poSection").style.display = "none";
        lastSelectedJobType = null;
    }
    if (currentTab === "reactive_tab") {
        document.getElementById("r_poSection").style.display = "none";
        lastSelectedReactiveJobType = null;
    }
    if (currentTab === "bookings_tab") {
        var bookingTypes = ['cctv', 'flushing', 'sucker', 'hydro', 'tc', 'service_locate'];
        for (var b = 0; b < bookingTypes.length; b++) {
            safeRemoveLocalStorage('BookingSubject_' + bookingTypes[b]);
        }

        selectedBookingType = '';
        lastSelectedBookingButton = null;
        lastSelectedBookingJobType = null;
        ['cctv_fields', 'flushing_fields', 'hydro_fields', 'sucker_fields', 'tc_fields', 'service_locate_fields'].forEach(function(id) {
            document.getElementById(id).style.display = "none";
        });
        document.getElementById("bookingPoSection").style.display = "none";
        var bookingSubPo = document.getElementById("bookingSubPoSection");
        if (bookingSubPo) bookingSubPo.style.display = "none";

        var buttons = document.getElementById("bookings_tab_content").getElementsByTagName("input");
        for (var k = 0; k < buttons.length; k++) {
            if (buttons[k].className.indexOf("pressed") > -1) {
                buttons[k].className = "topButton";
            }
        }
        var subject = document.querySelector(".BookingSubjectTest");
        if (subject) {
            subject.value = "";
            subject.placeholder = "Enter email subject";
        }
    }
    updateLivePreview();
}

function openURL(url) {
    window.open(url, '_blank');
}

function generateEmailData() {
    var emailMap = { 
        'Coordinator A': 'coordinator-a@example.com', 
        'Coordinator B': 'coordinator-b@example.com', 
        'Coordinator C': 'coordinator-c@example.com', 
        'Coordinator D': 'coordinator-d@example.com', 
        'Coordinator E': 'coordinator-e@example.com', 
        'Coordinator F': 'coordinator-f@example.com' 
    }; 
    var bodyContent = "";
    var targetEmail = "";
    var baseSubject = '';

    if (currentTab === 'job_creator_tab') {
        baseSubject = document.getElementById('email_subject').value;
    } else if (currentTab === 'reactive_tab') {
        baseSubject = document.getElementById('email_subject_reactive_mirror').value;
    } else if (currentTab === 'bookings_tab') {
        baseSubject = document.getElementById('email_subject_bookings_mirror').value;
        if (selectedBookingType) {
            safeSetLocalStorage('BookingSubject_' + selectedBookingType, baseSubject);
        }
    } 

    if (currentTab === 'job_creator_tab') {
        bodyContent = "<p>Hi team</p><p>Please see details below for the task today:</p>"; 
        var fields=['NOTE','Task(s)','Depth(s)','Fault(s)','Access','Pipe(s)','Repair(s)','Services','Manhole(s)','Excavation_method(s)','Customer(s)','TMP','Reinstatement(s)'];
        for (var i = 0; i < fields.length; i++) {
            var id = fields[i]; 
            var elem = document.getElementById(id);
            if (elem && trim(elem.value) !== '') {
                var val = escapeHtml(trim(elem.value)); 
                val = val.replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
                var displayLabel = fields[i];
                if (displayLabel === 'Excavation_method(s)') displayLabel = 'Excavation Method';
                bodyContent += '<div><strong>' + displayLabel + ':</strong><br>' + EMAIL_INDENT + val + '</div><br>'; 
            }
        }

        var poMakers = document.getElementsByName('po_maker'); 
        var selectedPO = '';
        for (var k = 0; k < poMakers.length; k++) { if (poMakers[k].checked) { selectedPO = poMakers[k].value; break; } }
        var posRequired = document.getElementById('POs_Required') ? document.getElementById('POs_Required').value : ''; 
        if (selectedPO !== '' || trim(posRequired) !== '') { 
            var poLine = selectedPO ? '<strong>@'+selectedPO+'</strong> ' : '';
            poLine += 'can we please have PO(s) for the following supplier(s):'; 
            bodyContent += '<br><div>' + poLine + '<br>';
            if (trim(posRequired) !== '')
                bodyContent += EMAIL_INDENT + escapeHtml(trim(posRequired)).replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
            bodyContent += '</div>'; 
        }
        if (selectedPO !== '' && emailMap[selectedPO]) targetEmail = emailMap[selectedPO]; 

    } else if (currentTab === 'reactive_tab') {
        bodyContent = "<p>Hi team</p><p>Please see details below for the task today:</p>"; 
        var rFields=[
            {id: 'r_NOTE', label: 'NOTE'},
            {id: 'r_Task', label: 'Task(s)'},
            {id: 'r_KPI_Onsite', label: 'KPI Onsite'},
            {id: 'r_KPI_Service_Restore', label: 'KPI Service Restore'},
            {id: 'r_Line', label: 'Line(s)'},
            {id: 'r_Manhole', label: 'Manhole(s)'},
            {id: 'r_Access', label: 'Access'},
            {id: 'r_Customer', label: 'Customer(s)'}
        ]; 
        for (var idx = 0; idx < rFields.length; idx++) {
            var rElem = document.getElementById(rFields[idx].id); 
            if (rElem && trim(rElem.value) !== '') {
                var rVal = escapeHtml(trim(rElem.value)); 
                rVal = rVal.replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
                bodyContent += '<div><strong>' + rFields[idx].label + ':</strong><br>' + EMAIL_INDENT + rVal + '</div><br>'; 
            }
        }
		
		window.addEventListener('message', function(event) {
    // Ensure message comes from the Paint App domain
    if (event.origin !== window.location.origin) return;

    if (event.data && event.data.type === 'ADD_JOB_PACK_PHOTO') {
        var entry = { 
            name: event.data.name || 'Annotated_Photo.jpg', 
            dataURL: event.data.dataURL 
        };
        
        // Ensure the array for the active tab exists
        if (!tabPhotos[currentTab]) {
            tabPhotos[currentTab] = [];
        }
        
        // Strictly append the new photo to the array so multiple photos pile up
        tabPhotos[currentTab].push(entry);
        
        // Refresh thumbnail previews and live email draft preview instantly
        refreshPreview();
    }
});

        var rPoMakers = document.getElementsByName('r_po_maker'); 
        var rSelectedPO = '';
        for (var pk = 0; pk < rPoMakers.length; pk++) { if (rPoMakers[pk].checked) { rSelectedPO = rPoMakers[pk].value; break; } }
        var rPosRequired = document.getElementById('r_POs_Required') ? document.getElementById('r_POs_Required').value : ''; 
        if (rSelectedPO !== '' || trim(rPosRequired) !== '') { 
            var rPoLine = rSelectedPO ? '<strong>@'+rSelectedPO+'</strong> ' : '';
            rPoLine += 'can we please have PO(s) for the following supplier(s):'; 
            bodyContent += '<div>' + rPoLine + '<br>';
            if (trim(rPosRequired) !== '')
                bodyContent += EMAIL_INDENT + escapeHtml(trim(rPosRequired)).replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
            bodyContent += '</div><br>'; 
        }
        if (rSelectedPO !== '' && emailMap[rSelectedPO]) targetEmail = emailMap[rSelectedPO]; 

    } else {
        var selectedType = selectedBookingType;
        if (selectedType === 'service_locate') {
            var slNoteElem = document.getElementById('sl_Note'); 
            var slVal = slNoteElem ? escapeHtml(trim(slNoteElem.value)) : '';
            bodyContent = slVal.replace(/(?:\r\n|\r|\n)/g,'<br>');

            var bPoMakers = document.getElementsByName('booking_po_maker'); 
            var bSelectedPO = ''; 
            for (var m = 0; m < bPoMakers.length; m++) { if (bPoMakers[m].checked) { bSelectedPO = bPoMakers[m].value; break; } }
            var bPosRequired = document.getElementById('Booking_POs_Required') ? document.getElementById('Booking_POs_Required').value : '';
            if (bSelectedPO !== '' || trim(bPosRequired) !== '') { 
                var bPoLine = bSelectedPO ? '<br><br><strong>@'+bSelectedPO+'</strong> ' : '<br><br>';
                bPoLine += 'can we please have PO(s) for the following supplier(s):'; 
                bodyContent += '<div>' + bPoLine + '<br>';
                if (trim(bPosRequired) !== '')
                    bodyContent += EMAIL_INDENT + escapeHtml(trim(bPosRequired)).replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
                bodyContent += '</div>'; 
            }
            if (bSelectedPO !== '' && emailMap[bSelectedPO]) targetEmail = emailMap[bSelectedPO]; 
        } else if (selectedType) {
            var dynamicHeaderName = "CCTV"; 
            if(selectedType === "flushing") dynamicHeaderName = "Flushing";
            if(selectedType === "hydro") dynamicHeaderName = "Hydro excavation";
            if(selectedType === "sucker") dynamicHeaderName = "Sucker Truck";
            if(selectedType === "tc") dynamicHeaderName = "TC"; 
            bodyContent = "<p>Hi team,<br><br> Can we please get a booking made for " + dynamicHeaderName + ". Details are below.</p>"; 
            targetEmail = "team@example.com";

            var bFields = [];
            if (selectedType === 'cctv' || selectedType === 'flushing') {
                bFields = ['Note', 'Date', 'Time', 'Line(s)', 'Manhole_Accessible', 'In-Conjunction', 'Customer(s)', 'Access', 'Contractor_Preferred']; 
            } else if (selectedType === 'hydro' || selectedType === 'sucker') {
                bFields = ['Note', 'Date', 'Time', 'Size', 'Type', 'Hose_length_required', 'Contractor_Preferred']; 
            } else if (selectedType === 'tc') {
                bFields = ['Note', 'Date', 'Time', 'TMP', 'No_Parkers_Required', 'Contractor_Preferred']; 
            }

            for (var f = 0; f < bFields.length; f++) {
                var bId = 'hdn_' + selectedType + '_' + bFields[f]; 
                var bElem = document.getElementById(bId);
                if (bElem && trim(bElem.value) !== '') {
                    var bVal = escapeHtml(trim(bElem.value)); 
                    bVal = bVal.replace(/(?:\r\n|\r|\n)/g,'<br>' + EMAIL_INDENT);
                    var labelDisplay = bFields[f].replace(/_/g, ' ');
                    bodyContent += '<div><strong>' + labelDisplay + ':</strong><br>' + EMAIL_INDENT + bVal + '</div>'; 
                }
            }
        }
    }

    var selectedPhotos = getCurrentPhotos();
    if (selectedPhotos.length > 0) {
        bodyContent += '<br><div><b>Attached Photos:</b><br>'; 
        for (var p = 0; p < selectedPhotos.length; p++){
            bodyContent += '<img src="'+selectedPhotos[p].dataURL+'" style="width:200px;height:200px;object-fit:cover;margin:5px;"><br>'; 
        }
        bodyContent += '</div><br>';
    }

    return {
        to: targetEmail || '',
        subject: trim(baseSubject) !== '' ? trim(baseSubject) : 'Task Details',
        body: bodyContent
    };
}

function updateLivePreview() {
    var data = generateEmailData();
    document.getElementById('previewTo').innerText = data.to !== "" ? data.to : '(Resolved on send)';
    document.getElementById('previewSubject').innerText = data.subject;
    document.getElementById('previewBody').innerHTML = data.body !== "" ? data.body : '<em style="color:#888;">Fill out form details on the left to see live preview...</em>';
}

function SubmitPhoto() {
    var selectedPhotos = getCurrentPhotos();
    
    if (currentTab === 'bookings_tab' && !selectedBookingType) {
        alert("Please select a booking type before creating an email.");
        return;
    }

    if (currentTab === 'bookings_tab' && selectedBookingType === 'service_locate') {
        var bookingJobTypeSelected = false;
        var bookingJobTypes = document.getElementsByName('booking_job_type');
        for (var i = 0; i < bookingJobTypes.length; i++) {
            if (bookingJobTypes[i].checked) { bookingJobTypeSelected = true; break; }
        }
        if (!bookingJobTypeSelected) {
            alert("Please select which department (SW or WW) is making the PO before creating a Service Locate email.");
            return;
        }

        var bookingPoMakerSelected = false;
        var poMakers = document.getElementsByName('booking_po_maker');
        for (var j = 0; j < poMakers.length; j++) {
            if (poMakers[j].checked) { bookingPoMakerSelected = true; break; }
        }
        if (!bookingPoMakerSelected) {
            alert("Please select who is making the PO before creating a Service Locate email.");
            return;
        }
    }

    if (selectedPhotos.length === 0 && !confirm("No photos selected. Continue?")) return;

    var data = generateEmailData();
    var btn = document.getElementById('createEmailBtn');

    // Switch button to Loading state with animated dots
    btn.value = 'Loading.';
    btn.disabled = true;

    var dotCount = 1;
    var loadingInterval = setInterval(function() {
        dotCount = (dotCount % 3) + 1;
        btn.value = 'Loading' + '.'.repeat(dotCount);
    }, 400);

    // Convert data URLs to cid: references for reliable inline embedding without attachments
    var submissionBody = data.body;
    for (var p = 0; p < selectedPhotos.length; p++) {
        submissionBody = submissionBody.split('src="' + selectedPhotos[p].dataURL + '"').join('src="cid:photo_' + p + '"');
    }

    var formData = new FormData();
    formData.append('action', 'create_email');
    formData.append('to', data.to);
    formData.append('subject', data.subject);
    formData.append('body', submissionBody);

    for (var p = 0; p < selectedPhotos.length; p++) {
        formData.append('photos[]', selectedPhotos[p].dataURL);
    }

    function handleBlobResponse(response) {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.blob().then(blob => {
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Job_Draft_' + new Date().toISOString().slice(0, 10) + '.eml';
            document.body.appendChild(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        });
    }

    // PRIMARY ATTEMPT: Try standard FormData request
    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Primary request failed with status ' + response.status);
        return response;
    })
    .then(handleBlobResponse)
    .catch(err => {
        console.warn('Primary FormData method blocked or failed, switching to JSON fallback...', err);
        
        // BACKUP ATTEMPT: If blocked by iFastNet, retry automatically using JSON payload
        var payload = {
            action: 'create_email',
            to: data.to,
            subject: data.subject,
            body: submissionBody,
            photos: selectedPhotos.map(function(p) { return p.dataURL; })
        };

        return fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(response => {
            if (!response.ok) throw new Error('Fallback JSON request also failed');
            return response;
        })
        .then(handleBlobResponse);
    })
    .catch(err => {
        alert('Failed to generate email draft.');
        console.error(err);
    })
    .finally(() => {
        clearInterval(loadingInterval);
        btn.value = 'Create Email Draft';
        btn.disabled = false;
    });
}

function toggleBPMenu() {
    var menu = document.getElementById('bpMenu'); 
    var other = document.getElementById('egdpMenu');
    if (other) other.style.display = 'none'; 
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

function downloadTemplate(type) {
    var url = ""; 
    switch(type) {
        case 'Hydro': url = "/projects/job-pack-maker/templates/CBP_Template.docx"; break;
        case 'Digger': url = "/projects/job-pack-maker/templates/CBP_Digger_Template.docx"; break;
        case 'Hand-Dig': url = "/projects/job-pack-maker/templates/CBP_Hand_Dig_Template.docx"; break;
        case 'CSE': url = "/projects/job-pack-maker/templates/CBP_CSE_Template.docx"; break;
    }
    document.getElementById('bpMenu').style.display = 'none';
    window.open(url, '_blank');
}

function downloadCSE() {
    window.open("/projects/job-pack-maker/templates/CSE_Permit_Template.docx", "_blank"); 
}

window.onload = onLoad;
</script>

    
    
    

<form id="app-form" onsubmit="return false;">
<div class="app-container">

    <!-- LEFT SIDE: APP INPUTS -->
    <div class="app-left">
<p class="jpm-back"><a href="/projects/job-pack-maker/">Back to home page</a></p>
        <h1 style="font-size:1.5em;margin:0.83em 0">Job Pack Creator</h1>
        <p>All fields optional. Select photos to embed below.</p>
        <hr><br>

        <div class="tab-container">
            <button type="button" id="job_creator_tab_btn" class="tab-button active" onclick="switchTab('job_creator_tab')">Planned</button>
            <button type="button" id="reactive_tab_btn" class="tab-button" onclick="switchTab('reactive_tab')">Reactive</button>
            <button type="button" id="bookings_tab_btn" class="tab-button" onclick="switchTab('bookings_tab')">Bookings</button>
        </div>

        <!-- PLANNED TAB -->
        <div id="job_creator_tab_content" class="section-content active">
           <strong>Clear All Inputs &amp; Photos</strong><br><br>
           <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
           <hr>

           <strong>Quick Links:</strong><br><br>
            <div class="quick-links">
                <input type="button" value="GIS" title="ArcGIS" onclick="flashButton(this); openURL(&quot;https://www.arcgis.com/apps/webappviewer/index.html?id=6392eb30762a47d393b18d986dc40e04&quot;)" class="topButton">
                <input type="button" value="BUD" title="Before U Dig" onclick="flashButton(this); openURL(&quot;https://onecall.beforeudig.co.nz/ngen.web//Account/Login?returnUrl=%2Fngen.web%2FHome&quot;)" class="topButton">
                <input type="button" value="WS" title="WorkSafe" onclick="flashButton(this); openURL(&quot;https://services.worksafe.govt.nz/notifications/triage/&quot;)" class="topButton">
                <input type="button" value="RP" title="Download Rescue Plan Template" onclick="flashButton(this); downloadRescuePlan()" class="topButton">
            </div>

            <div class="quick-links" style="margin-bottom:25px;">
                <div style="display:inline-block; vertical-align:top; position:relative;">
                    <input type="button" value="BP" title="Download Briefing Plan Templates" onclick="flashButton(this); toggleBPMenu()" class="topButton">
                    <div id="bpMenu" style="display:none; position: absolute; background:white; border:1px solid #ccc; z-index:10; margin-top:2px;">
                        <div class="bpOption" onclick="flashButton(this); downloadTemplate('Hydro')">Hydro Template</div>
                        <hr><div class="bpOption" onclick="flashButton(this); downloadTemplate('Digger')">Digger Template</div>
                        <hr><div class="bpOption" onclick="flashButton(this); downloadTemplate('Hand-Dig')">Hand-Dig Template</div>
                        <hr><div class="bpOption" onclick="flashButton(this); downloadTemplate('CSE')">CSE Template</div>
                    </div>
                </div>

                <div style="display:inline-block; vertical-align:top; position:relative;">
                    <input type="button" value="EGDP" title="Download Excavation &amp; Ground Disturbance Template" onclick="flashButton(this); toggleEGDPMenu()" class="topButton">
                    <div id="egdpMenu" style="display:none; position: absolute; background:white; border:1px solid #ccc; z-index:10; margin-top:2px; box-shadow: 1px 5px 5px grey;">
                        <div class="bpOption" onclick="flashButton(this); downloadEGDP('Normal')">Normal Template</div>
                        <hr><div class="bpOption" onclick="flashButton(this); downloadEGDP('Complex')">Complex Template</div>
                    </div>
                </div>

                <input type="button" value="CSE" title="Download CSE Permit Template" onclick="flashButton(this); downloadCSE()" class="topButton">
                <input type="button" value="GM" title="GeoMaps" onclick="flashButton(this); openURL(&quot;https://geomapspublic.aucklandcouncil.govt.nz/viewer/index.html&quot;)" class="topButton">
            </div>
            <hr><br>

            <div class="weather-card">
                <span class="weather-title">Auckland Weekly Forecast</span>
                <input type="button" value="Refresh" class="btn-refresh-weather" onclick="getWeather()">
                <div id="weatherRes" class="weather-container"><div class="day-box today"><span class="day-name">Sun</span><div class="date-label">15/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">49%<br>Rain</div><div class="temp-stack"><span class="t-max">21°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Mon</span><div class="date-label">16/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">39%<br>Rain</div><div class="temp-stack"><span class="t-max">22°</span><span class="t-min">16°</span></div></div><div class="day-box "><span class="day-name">Tue</span><div class="date-label">17/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">49%<br>Rain</div><div class="temp-stack"><span class="t-max">22°</span><span class="t-min">16°</span></div></div><div class="day-box "><span class="day-name">Wed</span><div class="date-label">18/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Showers</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">82%<br>Rain</div><div class="temp-stack"><span class="t-max">18°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Thu</span><div class="date-label">19/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">19%<br>Rain</div><div class="temp-stack"><span class="t-max">20°</span><span class="t-min">13°</span></div></div><div class="day-box "><span class="day-name">Fri</span><div class="date-label">20/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">25%<br>Rain</div><div class="temp-stack"><span class="t-max">19°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Sat</span><div class="date-label">21/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">21%<br>Rain</div><div class="temp-stack"><span class="t-max">19°</span><span class="t-min">14°</span></div></div></div>
            </div>
            <hr><br>

            <div class="field">
            <strong>Email Subject:</strong><br>
            <input type="text" id="email_subject" placeholder="Enter email subject">
            </div>
            <hr><br>

            <div class="field">
            <strong>Is this a SW or WW job?</strong><br>
            <input type="radio" name="job_type" id="SW" value="SW" onclick="togglePOOptions(this)"> <label for="SW">SW</label>
            <input type="radio" name="job_type" id="WW" value="WW" onclick="togglePOOptions(this)"> <label for="WW">WW</label>
            </div>

            <div class="field" id="poSection" style="display:none;">
            <strong>Who is making the POs?</strong><br>
            <div class="po WW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator A" value="Coordinator A"> <label for="Coordinator A">Coordinator A</label></div>
            <div class="po WW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator B" value="Coordinator B"> <label for="Coordinator B">Coordinator B</label></div>
            <div class="po WW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator C" value="Coordinator C"> <label for="Coordinator C">Coordinator C (Works till 11:00am)</label></div>
            <div class="po WW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator D" value="Coordinator D"> <label for="Coordinator D">Coordinator D</label></div>
            <div class="po SW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator E" value="Coordinator E"> <label for="Coordinator E">Coordinator E</label></div>
            <div class="po SW" style="display: none;"><input type="radio" name="po_maker" id="Coordinator F" value="Coordinator F"> <label for="Coordinator F">Coordinator F</label></div>
            <br>
            <strong>POs Required:</strong><br>
            <textarea id="POs_Required" placeholder="Enter required POs…"></textarea>
            </div>
            <br><hr>

            <div class="areaTitle">Job Key Points</div>
            <strong>NOTE:</strong><div class="field"><textarea id="NOTE" placeholder="Enter important points relevant to the job"></textarea></div>
            <strong>Task(s):</strong><div class="field"><textarea id="Task(s)" placeholder="Brief description of the job"></textarea></div>
            <strong>Depth(s):</strong><div class="field"><textarea id="Depth(s)" placeholder="i.e. 1.5m"></textarea></div>
            <strong>Fault(s):</strong><div class="field"><textarea id="Fault(s)" placeholder="i.e. Dislodged pipe"></textarea></div>
            <strong>Access:</strong><div class="field"><textarea id="Access" placeholder="i.e. Easy access on road berm"></textarea></div>
            <strong>Pipe(s):</strong><div class="field"><textarea id="Pipe(s)" placeholder="i.e. 150mm EW"></textarea></div>
            <strong>Repair(s):</strong><div class="field"><textarea id="Repair(s)" placeholder="i.e. spot repair"></textarea></div>
            <strong>Services:</strong><div class="field"><textarea id="Services" placeholder="i.e. Vector, Chorus"></textarea></div>
            <strong>Manhole(s):</strong><div class="field"><textarea id="Manhole(s)" placeholder="i.e. M/H 1312083"></textarea></div>
            <strong>Excavation Method(s):</strong><div class="field"><textarea id="Excavation_method(s)" placeholder="i.e. Hydro"></textarea></div>
            <strong>Customer(s):</strong><div class="field"><textarea id="Customer(s)" placeholder="Your Name - 000 000 0000"></textarea></div>
            <strong>TMP:</strong><div class="field"><textarea id="TMP" placeholder="i.e. Shoulder closure"></textarea></div>
            <strong>Reinstatement(s):</strong><div class="field"><textarea id="Reinstatement(s)" placeholder="i.e. hotmix"></textarea></div>
            <hr>
            <strong>Clear All Inputs &amp; Photos</strong><br><br>
            <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
        </div>

        <!-- REACTIVE TAB -->
        <div id="reactive_tab_content" class="section-content">
           <strong>Clear All Inputs &amp; Photos</strong><br><br>
           <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
           <hr>
           <strong>Quick Links:</strong><br><br>
           <div>
               <div class="quick-links" style="margin-bottom: 10px;">
                   <input type="button" value="GIS" title="ArcGIS" onclick="flashButton(this); openURL(&quot;https://www.arcgis.com/apps/webappviewer/index.html?id=6392eb30762a47d393b18d986dc40e04&quot;)" class="topButton">
                   <input type="button" value="WS" title="WorkSafe" onclick="flashButton(this); openURL(&quot;https://services.worksafe.govt.nz/notifications/triage/&quot;)" class="topButton">
                   <div style="display:inline-block; position:relative;">
                       <input type="button" title="Download CSE Briefing Plan Template" value="CSE BP" onclick="flashButton(this); toggleReactiveBPMenu()" class="topButton">
                       <div id="reactiveBpMenu" style="display:none; position:absolute; background:white; border:1px solid #ccc; z-index:10; margin-top:2px; box-shadow: 1px 5px 5px grey;">
                           <div class="bpOption" onclick="flashButton(this); downloadTemplate('CSE')">CSE Template</div>
                       </div>
                   </div>
                   <input type="button" title="WasteWater KPIs" value="WW KPIS" onclick="flashButton(this); openURL(&quot;https://app.powerbi.com/groups/me/reports/346f98ac-257c-4ae8-a984-6a058a1239c0/ReportSectionf05a98abc0ceb21f3b9e?experience=power-bi&quot;)" class="topButton">
               </div>
               <div class="quick-links" style="margin-bottom:20px;">
                   <input type="button" title="Download CSE Permit Template" value="CSE" onclick="flashButton(this); downloadCSE()" class="topButton">
                   <input type="button" title="Download Rescue Plan Template" value="RP" onclick="flashButton(this); downloadRescuePlan()" class="topButton">
                   <input type="button" title="GeoMaps" value="GM" onclick="flashButton(this); openURL(&quot;https://geomapspublic.aucklandcouncil.govt.nz/viewer/index.html&quot;)" class="topButton">
                   <input type="button" title="StormWater KPIs" value="SW KPIS" onclick="flashButton(this); openURL(&quot;https://swkpis.free.nf/?i=2&quot;)" class="topButton">
               </div>
           </div>
           <br><hr><br>

           <div class="weather-card">
               <span class="weather-title">Auckland Weekly Forecast</span>
               <input type="button" value="Refresh" class="btn-refresh-weather" onclick="getWeather()">
               <div id="weatherResReactive" class="weather-container"><div class="day-box today"><span class="day-name">Sun</span><div class="date-label">15/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">49%<br>Rain</div><div class="temp-stack"><span class="t-max">21°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Mon</span><div class="date-label">16/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">39%<br>Rain</div><div class="temp-stack"><span class="t-max">22°</span><span class="t-min">16°</span></div></div><div class="day-box "><span class="day-name">Tue</span><div class="date-label">17/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">49%<br>Rain</div><div class="temp-stack"><span class="t-max">22°</span><span class="t-min">16°</span></div></div><div class="day-box "><span class="day-name">Wed</span><div class="date-label">18/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Showers</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">82%<br>Rain</div><div class="temp-stack"><span class="t-max">18°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Thu</span><div class="date-label">19/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">19%<br>Rain</div><div class="temp-stack"><span class="t-max">20°</span><span class="t-min">13°</span></div></div><div class="day-box "><span class="day-name">Fri</span><div class="date-label">20/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">25%<br>Rain</div><div class="temp-stack"><span class="t-max">19°</span><span class="t-min">14°</span></div></div><div class="day-box "><span class="day-name">Sat</span><div class="date-label">21/11</div><div class="icon">🌧</div><div style="font-size:7.5pt;font-weight:bold;height:24px;">Rain</div><div style="font-size:7.5pt;color:#005a9e;border-top:1px solid #ccc;">21%<br>Rain</div><div class="temp-stack"><span class="t-max">19°</span><span class="t-min">14°</span></div></div></div>
           </div>
           <br><hr><br>

            <div class="field">
                <strong>Email Subject:</strong><br>
                <input type="text" id="email_subject_reactive_mirror" placeholder="Enter email subject">
            </div>
            <hr><br>

            <div class="field">
            <strong>Is this a SW or WW job?</strong><br>
            <input type="radio" name="r_job_type" id="r_SW" value="SW" onclick="toggleReactivePOOptions(this)"> <label for="r_SW">SW</label>
            <input type="radio" name="r_job_type" id="r_WW" value="WW" onclick="toggleReactivePOOptions(this)"> <label for="r_WW">WW</label>
            </div>

            <div class="field" id="r_poSection" style="display:none;">
            <strong>Who is making the POs?</strong><br>
            <div class="rpo WW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-a" value="Coordinator A"> <label for="r-coord-a">Coordinator A</label></div>
            <div class="rpo WW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-b" value="Coordinator B"> <label for="r-coord-b">Coordinator B</label></div>
            <div class="rpo WW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-c" value="Coordinator C"> <label for="r-coord-c">Coordinator C (Works till 11:00am)</label></div>
            <div class="rpo WW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-d" value="Coordinator D"> <label for="r-coord-d">Coordinator D</label></div>
            <div class="rpo SW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-e" value="Coordinator E"> <label for="r-coord-e">Coordinator E</label></div>
            <div class="rpo SW" style="display: none;"><input type="radio" name="r_po_maker" id="r-coord-f" value="Coordinator F"> <label for="r-coord-f">Coordinator F</label></div>
            <br>
            <strong>POs Required:</strong><br>
            <textarea id="r_POs_Required" placeholder="Enter required POs…"></textarea>
            </div>
            <br><hr><br>

            <div class="areaTitle">Job Key Points</div>
            <strong>NOTE:</strong><div class="field"><textarea id="r_NOTE" placeholder="Enter important points relevant to the job"></textarea></div>
            <strong>Task(s):</strong><div class="field"><textarea id="r_Task" placeholder="Brief description of the job"></textarea></div>
            <strong>KPI Onsite:</strong><div class="field"><textarea id="r_KPI_Onsite" placeholder="Enter KPI onsite details"></textarea></div>
            <strong>KPI Service Restore:</strong><div class="field"><textarea id="r_KPI_Service_Restore" placeholder="Enter service restore KPI"></textarea></div>
            <strong>Line(s):</strong><div class="field"><textarea id="r_Line" placeholder="Enter line details"></textarea></div>
            <strong>Manhole(s):</strong><div class="field"><textarea id="r_Manhole" placeholder="Enter manhole details"></textarea></div>
            <strong>Access:</strong><div class="field"><textarea id="r_Access" placeholder="Enter access requirements"></textarea></div>
            <strong>Customer(s):</strong><div class="field"><textarea id="r_Customer" placeholder="Enter customer details"></textarea></div>
            <hr>
            <strong>Clear All Inputs &amp; Photos</strong><br><br>
            <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
        </div>

        <!-- BOOKINGS TAB -->
        <div id="bookings_tab_content" class="section-content">
           <strong>Clear All Inputs &amp; Photos</strong><br><br>
           <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
           <hr>

           <strong>Quick Links:</strong><br><br>
            <div class="quick-links" style="margin-bottom:20px;">
                <input type="button" value="GIS" title="ArcGIS" onclick="flashButton(this); openURL(&quot;https://www.arcgis.com/apps/webappviewer/index.html?id=6392eb30762a47d393b18d986dc40e04&quot;)" class="topButton">
                <input type="button" value="GM" title="GeoMaps" onclick="flashButton(this); openURL(&quot;https://geomapspublic.aucklandcouncil.govt.nz/viewer/index.html&quot;)" class="topButton">
                <input type="button" value="SV" title="Google Street View" onclick="flashButton(this); openURL(&quot;https://www.google.com/maps&quot;)" class="topButton">
                <input type="button" value="WF" title="Weather Forecast" onclick="flashButton(this); openURL(&quot;https://www.metservice.com/towns-cities/regions/auckland/locations/auckland/7-days&quot;)" class="topButton">
            </div>
            <hr><br>

            <div class="field">
                <strong>Select Booking Type:</strong><br><br>
                <div class="booking-grid">
                    <input type="button" value="CCTV" class="topButton" onclick="handleBookingTypeChange('cctv', this)">
                    <input type="button" value="Flushing" class="topButton" onclick="handleBookingTypeChange('flushing', this)">
                    <input type="button" value="Sucker Truck" class="topButton" onclick="handleBookingTypeChange('sucker', this)">
                    <input type="button" value="Hydro" class="topButton" onclick="handleBookingTypeChange('hydro', this)">
                    <input type="button" value="TC" class="topButton" onclick="handleBookingTypeChange('tc', this)">
                    <input type="button" value="Service Locate" class="topButton" onclick="handleBookingTypeChange('service_locate', this)">
                </div>
            </div>
            <hr><br>

            <div class="field">
                <strong>Email Subject:</strong><br>
                <input type="text" id="email_subject_bookings_mirror" value="" class="BookingSubjectTest" placeholder="Enter email subject">
            </div>

            <div id="cctv_fields" style="display:none;">
                <hr>
                <div class="areaTitle">CCTV Booking Details</div>
                <strong>NOTE:</strong><div class="field"><textarea id="hdn_cctv_Note" placeholder="Enter important points relevant to the job"></textarea></div>
                <strong>Date:</strong><div class="field"><textarea id="hdn_cctv_Date" placeholder="i.e. 01/01/2025"></textarea></div>
                <strong>Time:</strong><div class="field"><textarea id="hdn_cctv_Time" placeholder="i.e. 09:00am"></textarea></div>
                <strong>Line(s):</strong><div class="field"><textarea id="hdn_cctv_Line(s)" placeholder="i.e. S/L 1234567"></textarea></div>
                <strong>Manhole Accessible:</strong><div class="field"><textarea id="hdn_cctv_Manhole_Accessible" placeholder="i.e. M/H 1234567"></textarea></div>
                <strong>In-Conjunction:</strong><div class="field"><textarea id="hdn_cctv_In-Conjunction" placeholder="i.e. Yes / No"></textarea></div>
                <strong>Customer(s):</strong><div class="field"><textarea id="hdn_cctv_Customer(s)" placeholder="000 000 0000"></textarea></div>
                <strong>Access:</strong><div class="field"><textarea id="hdn_cctv_Access" placeholder="i.e. Down the left side of the house"></textarea></div>
                <strong>Contractor Preferred:</strong><div class="field"><textarea id="hdn_cctv_Contractor_Preferred" placeholder="i.e. TDG / All Drains"></textarea></div>
            </div>

            <div id="flushing_fields" style="display:none;">
                <hr>
                <div class="areaTitle">Flusher Booking Details</div>
                <strong>NOTE:</strong><div class="field"><textarea id="hdn_flushing_Note" placeholder="Enter important points relevant to the job"></textarea></div>
                <strong>Date:</strong><div class="field"><textarea id="hdn_flushing_Date" placeholder="i.e. 01/01/2025"></textarea></div>
                <strong>Time:</strong><div class="field"><textarea id="hdn_flushing_Time" placeholder="i.e. 09:00am"></textarea></div>
                <strong>Line(s):</strong><div class="field"><textarea id="hdn_flushing_Line(s)" placeholder="i.e. S/L 1234567"></textarea></div>
                <strong>Manhole Accessible:</strong><div class="field"><textarea id="hdn_flushing_Manhole_Accessible" placeholder="i.e. M/H 1234567"></textarea></div>
                <strong>In-Conjunction:</strong><div class="field"><textarea id="hdn_flushing_In-Conjunction" placeholder="i.e. Yes / No"></textarea></div>
                <strong>Customer(s):</strong><div class="field"><textarea id="hdn_flushing_Customer(s)" placeholder="000 000 0000"></textarea></div>
                <strong>Access:</strong><div class="field"><textarea id="hdn_flushing_Access" placeholder="i.e. Down the left side of the house"></textarea></div>
                <strong>Contractor Preferred:</strong><div class="field"><textarea id="hdn_flushing_Contractor_Preferred" placeholder="i.e. TDG / All Drains"></textarea></div>
            </div>

            <div id="hydro_fields" style="display:none;">
                <hr>
                <div class="areaTitle">Hydro Booking Details</div>
                <strong>NOTE:</strong><div class="field"><textarea id="hdn_hydro_Note" placeholder="Enter important points relevant to the job"></textarea></div>
                <strong>Date:</strong><div class="field"><textarea id="hdn_hydro_Date" placeholder="i.e. 01/01/2025"></textarea></div>
                <strong>Time:</strong><div class="field"><textarea id="hdn_hydro_Time" placeholder="i.e. 09:00am"></textarea></div>
                <strong>Size:</strong><div class="field"><textarea id="hdn_hydro_Size" placeholder="i.e. Large"></textarea></div>
                <strong>Type:</strong><div class="field"><textarea id="hdn_hydro_Type" placeholder="i.e. Hydro Excavator / Mini Combo"></textarea></div>
                <strong>Hose length required:</strong><div class="field"><textarea id="hdn_hydro_Hose_length_required" placeholder="i.e. 60.0m"></textarea></div>
                <strong>Contractor Preferred:</strong><div class="field"><textarea id="hdn_hydro_Contractor_Preferred" placeholder="i.e. TDG / All Drains"></textarea></div>
            </div>

            <div id="sucker_fields" style="display:none;">
                <hr>
                <div class="areaTitle">Sucker Truck Booking Details</div>
                <strong>NOTE:</strong><div class="field"><textarea id="hdn_sucker_Note" placeholder="Enter important points relevant to the job"></textarea></div>
                <strong>Date:</strong><div class="field"><textarea id="hdn_sucker_Date" placeholder="i.e. 01/01/2025"></textarea></div>
                <strong>Time:</strong><div class="field"><textarea id="hdn_sucker_Time" placeholder="i.e. 09:00am"></textarea></div>
                <strong>Size:</strong><div class="field"><textarea id="hdn_sucker_Size" placeholder="i.e. Large"></textarea></div>
                <strong>Type:</strong><div class="field"><textarea id="hdn_sucker_Type" placeholder="i.e. Large Unit / Mini Combo"></textarea></div>
                <strong>Hose length required:</strong><div class="field"><textarea id="hdn_sucker_Hose_length_required" placeholder="i.e. 60.0m"></textarea></div>
                <strong>Contractor Preferred:</strong><div class="field"><textarea id="hdn_sucker_Contractor_Preferred" placeholder="i.e. TDG / All Drains"></textarea></div>
            </div>

            <div id="tc_fields" style="display:none;">
                <hr>
                <div class="areaTitle">TC Booking Details</div>
                <strong>NOTE:</strong><div class="field"><textarea id="hdn_tc_Note" placeholder="Enter important points relevant to the job"></textarea></div>
                <strong>Date:</strong><div class="field"><textarea id="hdn_tc_Date" placeholder="i.e. 01/01/2025"></textarea></div>
                <strong>Time:</strong><div class="field"><textarea id="hdn_tc_Time" placeholder="i.e. 09:00am"></textarea></div>
                <strong>TMP:</strong><div class="field"><textarea id="hdn_tc_TMP" placeholder="i.e. 2-way stop/go"></textarea></div>
                <strong>No Parkers Required?:</strong><div class="field"><textarea id="hdn_tc_No_Parkers_Required" placeholder="i.e. Yes, day before"></textarea></div>
            </div>

            <div class="field" id="bookingPoSection" style="display:none;">
                <hr><br>
                <strong>Is this a SW or WW job?</strong><br>
                <input type="radio" name="booking_job_type" id="b_SW" value="SW" onclick="toggleBookingPOOptions(this)"><label for="b_SW">SW</label>
                <input type="radio" name="booking_job_type" id="b_WW" value="WW" onclick="toggleBookingPOOptions(this)"><label for="b_WW">WW</label>
                
                <div id="bookingSubPoSection" style="display:none; margin-top:12px;">
                    <strong>Who is making the POs?</strong><br>
                    <div class="bpo WW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-a" value="Coordinator A"> <label for="b-coord-a">Coordinator A</label></div>
                    <div class="bpo WW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-b" value="Coordinator B"> <label for="b-coord-b">Coordinator B</label></div>
                    <div class="bpo WW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-c" value="Coordinator C"> <label for="b-coord-c">Coordinator C (Works till 11:00am)</label></div>
                    <div class="bpo WW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-d" value="Coordinator D"> <label for="b-coord-d">Coordinator D</label></div>
                    <div class="bpo SW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-e" value="Coordinator E"> <label for="b-coord-e">Coordinator E</label></div>
                    <div class="bpo SW" style="display: none;"><input type="radio" name="booking_po_maker" id="b-coord-f" value="Coordinator F"> <label for="b-coord-f">Coordinator F</label></div>
                    <br>
                    <strong>POs Required:</strong><br>
                    <textarea id="Booking_POs_Required" placeholder="Enter required POs…">Detection Services</textarea>
                </div>
            </div>

            <div id="service_locate_fields" style="display:none;">
                <hr>
                <div class="areaTitle">Service Locate Booking Details</div>
                <strong>Template:</strong><div class="field"><textarea id="sl_Note"></textarea></div>
            </div>
            <hr>
            <strong>Clear All Inputs &amp; Photos</strong><br><br>
            <input style="display: block; margin-bottom: 25px;" type="button" value="Clear All" class="topButton" onclick="clearCurrentTab()">
        </div>

        <!-- PHOTO SECTION -->
        <div class="photo-section">
            <h2 style="font-size:1.17em;margin-top:0;">📷 Select Photos</h2>
            <div class="photoDropZone" onclick="document.getElementById('fileInput').click();">
                <input type="button" value="📷 Browse Photos" class="topButton selectPhotoButton" onclick="event.cancelBubble=true; document.getElementById('fileInput').click();">
                <input type="file" id="fileInput" multiple="">
                <div style="margin-top:10px;color:#666;font-size:9.5pt;">
                    Drag &amp; drop or click to browse photos
                </div>
                <div id="preview"></div>
            </div>
        </div>

        <div style="font-size: 8.5pt; color: #666; text-align: center; margin-top: 20px; margin-bottom: 5px;">Email will save to Inbox</div>
        <input type="button" id="createEmailBtn" value="Create Email Draft" onclick="SubmitPhoto()" class="createEmailBtn">
    </div>

    <!-- RIGHT SIDE: LIVE EMAIL PREVIEW -->
    <div class="app-right">
        <div class="preview-pane-header">
            <span>✉️ Live Email Draft Preview</span>
        </div>
        
        <div class="email-meta-box">
            <div><strong>To:</strong> <span id="previewTo" style="color: #0078d4;">(Resolved on send)</span></div>
            <div style="margin-top: 5px;"><strong>Subject:</strong> <span id="previewSubject" style="font-weight: 600; color: #111;">Task Details</span></div>
        </div>

        <div id="previewBody" class="email-body-preview"><p>Hi team</p><p>Please see details below for the task today:</p></div>
    </div>

</div>
</form>




<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
