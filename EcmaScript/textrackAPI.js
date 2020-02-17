"use script";

class TTrack{
    constructor(){
    };
    init(){
        var track = document.createElement("track");
        var videoElem = document.getElementsByTagName("video");
        track.kind="subtitles";
        track.label="Castellano";
        track.srclang="es";
        track.src="../EcmaScript/subtitles_es.vtt";
        videoElem[0].appendChild(track);
        track.addEventListener("load",function(){
           this.mode="showing";
           videoElem.textTracks[0].mode="showing";
        });
    }
}
let subs = new TTrack();
subs.init();