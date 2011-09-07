package com.acc.player  {
	
	import caurina.transitions.*;
	import caurina.transitions.properties.FilterShortcuts;
	import flash.display.*;
	import flash.text.*;
	import flash.events.*;
	import flash.media.*;
	import flash.utils.*;
	import flash.geom.Rectangle;
	import flash.net.*;
	
	public class VideoCls extends MovieClip {
		
		////// VIDEO MOVIE CLIPS //////
		var playBtn:MovieClip;
		var pauseBtn:MovieClip;
		var stopBtn:MovieClip;
		var videoBlackBox:MovieClip;
		var videoPreloader:MovieClip;
		var videoTitleTxt:TextField;
		var videoTimeDurationTxt:TextField;
		var videoTimeProgressTxt:TextField;
		var videoAdvertisementTxt:TextField;
		var videoThumb:MovieClip;
		var adThumb:MovieClip;
		var videoWidth:Number;
		var videoHeight:Number;
		var videoInterval;
		var videoStack:Array;
		var videoType:String;
		var ns:NetStream;
		var nsl:NetStream;
		var amountLoaded:Number;
		var duration:Number;
		var scrubInterval;
		
		var moviePlaying:Boolean;
		var liveFeedPlaying:Boolean;
		var feedServerPlaying:Boolean;
		
		// Create the video
		var video:Video;
		var player:Player;

		public function VideoCls(player_mc:MovieClip, obj:Player) {
			ns = obj.ns;
			nsl = obj.nsl;
			player = obj;
			
			// Create the video variables
			playBtn = player_mc.playBtn_mc;
			pauseBtn = player_mc.pauseBtn_mc;
			stopBtn = player_mc.stopBtn_mc;
			videoBlackBox = player_mc.videoBlackBox_mc;
			videoPreloader = player_mc.videoPreloader_mc;
			videoTitleTxt = player_mc.VideoTitle_txt;
			videoTimeDurationTxt = player_mc.videoTime_duration_txt;
			videoTimeProgressTxt = player_mc.videoTime_progress_txt;
			videoAdvertisementTxt = player_mc.advertisement_txt;
			videoThumb = player_mc.videoTrack_mc.videoThumb_mc;
			adThumb = player_mc.videoTrack_mc.advertiseThumb_mc;
			
			// Set the videoCls variables
			videoPreloader.visible = false;
			videoTitleTxt.text = "";
			videoTimeDurationTxt.text = "0:00";
			videoTimeProgressTxt.text = "0:00";
			playBtn.mouseChildren = false;
			playBtn.buttonMode = true;
			pauseBtn.mouseChildren = false;
			pauseBtn.buttonMode = true;
			videoThumb.mouseChildren = false;
			videoThumb.buttonMode = true;
			
			////// VIDEO VARS //////
			videoWidth = 500;
			videoHeight = 400;
			videoInterval = setInterval(videoStatus, 100);
			videoStack = [];
			videoType = "";
			
			// Create the video
			video = new Video(videoWidth, videoHeight);
			
			////// VIDEO CODE //////
			// Create the video, and attach it to the black box
			video.x = 0;
			video.y = 0;
			videoBlackBox.addChild(video);
			
			setVideoListeners();
			
			moviePlaying = false;
			liveFeedPlaying = false;
			feedServerPlaying = false;
		}
		
		public function setVideoListeners() {
			playBtn.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			playBtn.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			playBtn.addEventListener(MouseEvent.CLICK, playBtnClick);
			pauseBtn.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			pauseBtn.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			pauseBtn.addEventListener(MouseEvent.CLICK, pauseBtnClick);
			videoThumb.addEventListener(MouseEvent.MOUSE_OVER, btnOver);
			videoThumb.addEventListener(MouseEvent.MOUSE_OUT, btnOut);
			videoThumb.addEventListener(MouseEvent.MOUSE_DOWN, videoScrubberDown);
		}
		
		////// BTN OVER &amp; OUT FUNCTIONS //////
		public function btnOver(event:MouseEvent):void
		{
			event.currentTarget.gotoAndPlay("over");
		}
		
		public function btnOut(event:MouseEvent):void
		{
			event.currentTarget.gotoAndPlay("out");
		}
		
		public function playBtnClick(event:MouseEvent):void
		{
			var tempNS = (!feedServerPlaying) ? player.ns : player.nsl;
			tempNS.resume();
			moviePlaying = true;
			//Tweener.addTween(playBtn, {alpha:0, time:.5, transition:"easeOut"});
		}
		
		public function pauseBtnClick(event:MouseEvent):void
		{
			var tempNS = (!feedServerPlaying) ? player.ns : player.nsl;
			if (liveFeedPlaying || videoType == "ad") {
				return;
			}
			moviePlaying = false;
			tempNS.pause();
			//Tweener.addTween(playBtn, {alpha:.5, time:.5, transition:"easeIn"});
		}
		
		public function scrubTimeline():void
		{
			ns.seek(Math.floor((videoThumb.x / 340) * duration));
		}
		
		public function videoScrubberDown(event:MouseEvent):void
		{
			return;
			var bounds:Rectangle = new Rectangle(0,0,340,0);
			clearInterval(videoInterval);
			scrubInterval = setInterval(scrubTimeline, 10);
			videoThumb.startDrag(false, bounds);
			stage.addEventListener(MouseEvent.MOUSE_UP, stopScrubbingVideo);
		}
		
		public function stopScrubbingVideo(Event:MouseEvent):void
		{
			stage.removeEventListener(MouseEvent.MOUSE_UP, stopScrubbingVideo);
			clearInterval(scrubInterval);
			videoInterval = setInterval(videoStatus, 100);
			videoThumb.stopDrag();
		}
		
		public function myStatusHandler(event:NetStatusEvent):void
		{
			return;
			var tempNS:NetStream = (!feedServerPlaying) ? player.ns : player.nsl;
			//trace(event.info.code);
			switch(event.info.code)
			{
				case "NetStream.Buffer.Full":
					ns.bufferTime = 10;
					Tweener.addTween(videoPreloader, {alpha:0, time:.3});
				break;
				case "NetStream.Buffer.Empty":
					ns.bufferTime = 10;
					Tweener.addTween(videoPreloader, {alpha:1, time:.3});
				break;
				case "NetStream.Play.Start":
					ns.bufferTime = 10;
					Tweener.addTween(videoPreloader, {alpha:1, time:.3});
				break;
				case "NetStream.Seek.Notify":
					ns.bufferTime = 10;
					Tweener.addTween(videoPreloader, {alpha:1, time:.3});
				break;
				case "NetStream.Seek.InvalidTime":
					ns.bufferTime = 10;
					Tweener.addTween(videoPreloader, {alpha:1, time:.3});
				break;
				case "NetStream.Play.Stop":
					Tweener.addTween(videoPreloader, {alpha:0, time:.3});
					ns.pause();
					ns.seek(1);
				break;
			}
		}
		
		////// TIMELINE SCRUBBER //////
		public function videoStatus():void
		{
			var tempNS = (!feedServerPlaying) ? player.ns : player.nsl;
			if (!tempNS) {
				return;
			}
			amountLoaded = tempNS.bytesLoaded / tempNS.bytesTotal;
			//videoTrackDownload.width = amountLoaded * 340;
			//videoThumb.x = 0;
			if (videoType == "ad") {
				videoThumb.width = 0;
				adThumb.width = tempNS.time / duration * 510;
			}
			else {
				adThumb.width = 0;
				videoThumb.width = tempNS.time / duration * 510;
			}
			//videoTrackProgress.width = videoThumb.x;
			if (moviePlaying) {
				Tweener.addTween(playBtn, {alpha:0, time:.5, transition:"easeIn"});
			}
			else if (player.playerStarted) {
				Tweener.addTween(playBtn, {alpha:.7, time:.5, transition:"easeIn"});
			}
		}
		
		public function positionVideo():void
		{
			video.x = 0; // set the video's x to 0
			video.y = 0;  // set the video's y to 0
			video.width = 620;
			// var vidWidthDif = videoBlackBox.width - videoWidth;  // get the difference of the videoBlackBox's width and the video width - hold it in this variable
			// var vidHeightDif = videoBlackBox.height - videoHeight;  // get the difference of the videoBlackBox's height and video height - hold it in this variable
		}

	}
	
}
